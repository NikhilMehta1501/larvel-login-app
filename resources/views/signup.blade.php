<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <form action="{{route('save')}}" method="post">

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif

        @csrf
        <input class="form-control" type="text" name="name" placeholder="Name" value="{{old('name')}}">
        <span class="text-danger">@error('name') {{$message}} @enderror</span><br>
        <input class="form-control" type="text" name="email" placeholder="Email ID" value="{{old('email')}}">
        <span class="text-danger">@error('email') {{$message}} @enderror</span><br>
        <input class="form-control" type="password" name="password" placeholder="Password">
        <span class="text-danger">@error('password') {{$message}} @enderror</span><br>
        <input class="form-control" type="password" name="Cpassword" placeholder="Confirm Password">
        <span class="text-danger">@error('Cpassword') {{$message}} @enderror</span><br>
        <button class="btn btn-primary" type="submit" name="signup">Sign Up</button>
      </form><br>
      <a  href="{{route('login')}}">Log In</a>
  </div>

  </body>
</html>
