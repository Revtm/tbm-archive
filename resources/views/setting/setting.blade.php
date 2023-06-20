<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <title>User Setting</title>
    <link href="{{ asset('css/app.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{ asset('icon/favicon.ico') }}" size="48x48" type="image/png">
    <link href="{{ asset('css/user/style.css') }}?t={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/setting/style.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="bg-slate-100">
    @include('component/header')
    <form class="setting-form" action="/setting" method="post">
      @csrf
      @method('POST')
      <div class="container mx-auto main-container mt-14">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-md font-serif text-gray-600 mt-4">
          <div class="m-1">
            <center><b>User Setting</b></center>
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
          <div class="m-1">
            Join Amal Yaumi
          </div>
          <div class="text-right">
            <label class="switch">
              <input type="checkbox" name="join_amal_yaumi" id="join-amal-yaumi">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="container fixed shadow-md bg-white bg-contain bottom-0 left-0 right-0 p-2 md:p-4 z-10">
        <div class="grid grid-rows-1">
          <button type="submit" name="button" style="width:100%" class="rounded-md bg-red-500 text-sm text-white p-2">Save</button>
        </div>
      </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js?t={{time()}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
          $("#join-amal-yaumi").prop("checked", {{$amalYaumiStatus}});
        });
    </script>
  </body>
</html>
