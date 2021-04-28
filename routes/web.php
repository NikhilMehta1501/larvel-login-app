<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::post('save', [MainController::class, 'save'])->name('save');
Route::post('check', [MainController::class, 'check'])->name('check');
Route::get('logout', [MainController::class, 'logout'])->name('logout');


Route::group(['middleware'=>['AuthCheck']], function () {
    Route::get('login', [MainController::class, 'login'])->name('login');
    Route::get('signup', [MainController::class, 'signup'])->name('signup');
    Route::get('dashboard', [MainController::class, 'dashboard']);
});
