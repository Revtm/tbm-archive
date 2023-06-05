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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="bg-slate-50">
    @include('component/header')
    <div class="container mx-auto login-container">
      <div class="login-box shadow-md rounded-md bg-white mt-20 lg:mt-16">
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
            <a class="text-sm" href="{{url('register')}}">Click here to register!</a>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if(session()->has('failed'))
            <div class="alert alert-warning alert-dismissible fade show my-1" role="alert">
              {{ session('failed') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
        </center>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
