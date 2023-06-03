<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  </head>
  <body class="bg-slate-50">
    @include('component/header')
    <div class="container mx-auto login-container">
      <div class="login-box shadow-md rounded-md bg-white">
        <center>
          <div class="container p-3">
            <span class="text-gray-500 text-lg font-bold" style="font-family: 'Dancing Script';">Bismillah</span>
            <form action="/user/login/auth" method="post">
              @csrf
              @method('POST')
              <input type="email" name="email" class="email-input accent-red-300 border rounded-md p-2 my-2" placeholder="email">
              <input type="password" name="password" class="password-input accent-red-300 border rounded-md p-2 my-2" placeholder="password">
              <button type="submit" name="submit" class="login-button rounded-md bg-red-500 text-sm text-white p-2 my-2">Login</button>
            </form>
          </div>
        </center>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
