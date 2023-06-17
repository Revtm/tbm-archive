<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}?t={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/login/style.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{ asset('icon/favicon.ico') }}" size="48x48" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style media="screen">
      img{
        display: inline;
      }
    </style>
  </head>
  <body class="bg-slate-100">
    @include('component/header')
    <div class="container mx-auto login-container">
      <div class="login-box shadow-md rounded-md bg-white mt-20 lg:mt-16">
        <center>
          <div class="container p-3">
            <span class="text-gray-500 text-lg font-bold" style="font-family: 'Dancing Script';">Bismillah</span>
            <form action="/register" method="post">
              @csrf
              @method('POST')
              <input type="text" autocomplete="off" name="username" class="email-input accent-red-300 border rounded-md p-2 my-2" placeholder="username" required>
              <input type="email" autocomplete="off" name="email" class="email-input accent-red-300 border rounded-md p-2 my-2" placeholder="email" required>
              <input type="password" name="password" autocomplete="off" class="password-input accent-red-300 border rounded-md p-2 my-2" placeholder="password" required>
              <span id="capt-image">
                {!! captcha_img() !!}
              </span>
              <span> <i class="fa fa-refresh" id="reload-capt" aria-hidden="true"></i></span>
              <input type="text" autocomplete="off" name="validation-word" class="email-input accent-red-300 border rounded-md p-2 my-2" placeholder="type the validation word above" required>
              <button type="submit" name="submit" class="login-button rounded-md bg-red-500 text-sm text-white p-2 my-2">Register</button>
            </form>
            <a class="text-sm" href="{{url('/')}}">Click here to Login!</a>
            @if(session()->has('failed'))
            <div style="text-align: left;" class="alert alert-warning alert-dismissible fade show my-1" role="alert">
              <ul class="list-disc">
                @foreach(session('failed')->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
        </center>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js?t={{time()}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      $('#reload-capt').click(function () {
          $.get('/api/capt/reload', {}, function (data, textStatus, jqXHR) {
    				$("#capt-image").html(data.capt);
    			});
      });
    });
  </script>
  </body>
</html>
