<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  </head>
  <body>
    <h1>Hello, {{ $LoggedUserInfo['name'] }}</h1><br>
    <a href="{{ route('logout') }}">Logout</a>
  </body>
</html>
