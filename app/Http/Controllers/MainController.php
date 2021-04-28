<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function save(Request $request)
    {
        $request->validate([
          'name' => 'required|alpha_num',
          'email' => 'required|email|unique:admins',
          'password' => 'required|min:8',
          'Cpassword' => 'required|same:password|min:8'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'New user added');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
      ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'No user found');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Incorrect Password');
            }
        }
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    public function dashboard()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];
        return view('dashboard', $data);
    }
}
