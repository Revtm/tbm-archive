<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <title>Amal Yaumi</title>
    <link href="{{ asset('css/app.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{ asset('icon/favicon.ico') }}" size="48x48" type="image/png">
    <link href="{{ asset('css/user/style.css') }}?t={{time()}}" rel="stylesheet">
    <link href="{{ asset('css/amalyaumi/style.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body class="bg-slate-100">
    @include('component/header')
    <form class="amal-yaumi-form" action="/amalyaumi" method="post">
      @csrf
      @method('POST')
      <div class="container mx-auto main-container mt-14">
        <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
          <div class="grid grid-rows-1">
            <div class="grid grid-cols-2">
              <div class="text-gray-500">Tanggal</div><div class="text-gray-500">: {{date("d M Y")}}</div>
            </div>
            <div class="grid grid-cols-2">
              <div class="text-gray-500">Status </div><div>: {!!$amalYaumiMaster->status == 1 ? '<span class="text-green-500">Active</span>' : '<span class="text-yellow-500">Non Active</span>'!!}</div>
            </div>
            <div class="grid my-1">
              @if($amalYaumiMaster->status == 1)
                <span class="text-gray-500">Jangan lupa baca <span style="font-family: 'Lobster';">Bismillah</span> yaa :)</span>
              @else
                <span class="text-gray-500">Jika kamu tertarik ikut program Amal Yaumi ini, silakan klik <a href="{{url('/setting')}}">di sini</a> :D</span>
              @endif
            </div>
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
          <div class="grid grid-rows-1 overflow-x-auto">
            <div class="">
              <div class="">
                <i class="fa fa-line-chart p-1 text-red-500" aria-hidden="true"></i> Laporan 7 hari terakhir
                <span id="open-text-report" class="text-red-500" onclick="onOpenReportTab()">(klik untuk buka)</span>
                <span id="close-text-report" class="text-red-500" onclick="onCloseReportTab()" style="display:none">(klik untuk tutup)</span>
              </div>
              <div class="" id="amal-chart" style="display:none">
                <canvas id="myChart" height="200px" width="300px"></canvas>
              </div>
            </div>
          </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if($amalYaumiMaster->status == 1 && count($amalYaumiRecent) > 0)
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
          <div class="m-1">
            Shalat Subuh (Jama'ah)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="subuh" id="subuh">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Shalat Dzuhur (Jama'ah)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="dzuhur" id="dzuhur">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
          <div class="m-1">
            Shalat Ashar (Jama'ah)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="ashar" id="ashar">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
          <div class="m-1">
            Shalat Magrib (Jama'ah)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="maghrib" id="maghrib">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Shalat Isya (Jama'ah)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="isya" id="isya">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Shalat Sunnah Dhuha
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="dhuha" id="dhuha">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Shalat Sunnah Witir
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="witir" id="witir">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Tilawah Al-Qur'an (min: 1 ayat)
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="read_quran" id="read_quran">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Shodaqoh
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="shodaqoh" id="shodaqoh">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            bersyukur
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="syukur" id="syukur">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
          <div class="m-1">
            Do'a untuk kedua orang tua
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="doa_for_parent" id="doa_for_parent">
          </div>
        </div>
        <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1" style="margin-bottom: 4rem">
          <div class="m-1">
            Do'a untuk saudara
          </div>
          <div class="text-right">
            <input class="accent-red-500 m-2" type="checkbox" name="doa_for_friend" id="doa_for_friend">
          </div>
        </div>
        @else
        <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1" style="margin-bottom: 4rem">
          <div class="m-1">
            @if($amalYaumiMaster->status == 1)
              Sistem masih memproses form amal yaumi kamu, sabar ya :)
            @else
              Status Amal Yaumi mu masih non-active nih  :(
            @endif
          </div>
        </div>
        @endif
      </div>
      <div class="container fixed shadow-md bg-white bg-contain bottom-0 left-0 right-0 p-2 md:p-4 z-10">
        <div class="grid grid-rows-1">
          <button type="submit" name="button" style="width:100%" class="rounded-md bg-red-500 text-sm text-white p-2">Simpan</button>
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
          $("#logout-form").prop("action", "/user/logout/auth?token=" + localStorage.getItem('token'));
        });
        var labels =  {{ Js::from($amalYaumiReport['labels']) }};
        var counts =  {{ Js::from($amalYaumiReport['counts']) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Dikerjakan',
                backgroundColor: 'rgb(220, 53, 69)',
                borderColor: 'rgb(220, 53, 69)',
                data: counts,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        function onOpenReportTab() {
          document.getElementById("close-text-report").style.display = "inline";
          document.getElementById("open-text-report").style.display = "none";
          document.getElementById("amal-chart").style.display = "block";
        }
        function onCloseReportTab() {
          document.getElementById("close-text-report").style.display = "none";
          document.getElementById("open-text-report").style.display = "inline";
          document.getElementById("amal-chart").style.display = "none";
        }
    </script>
    @if(count($amalYaumiRecent) > 0)
    <script type="text/javascript">
        $(document).ready(function () {
          $("#logout-form").prop("action", "/user/logout/auth?token=" + localStorage.getItem('token'));
          $("#subuh").prop("checked", {{$amalYaumiRecent[0]['subuh']}});
          $("#dzuhur").prop("checked", {{$amalYaumiRecent[0]['dzuhur']}});
          $("#ashar").prop("checked", {{$amalYaumiRecent[0]['ashar']}});
          $("#maghrib").prop("checked", {{$amalYaumiRecent[0]['maghrib']}});
          $("#isya").prop("checked", {{$amalYaumiRecent[0]['isya']}});
          $("#dhuha").prop("checked", {{$amalYaumiRecent[0]['dhuha']}});
          $("#witir").prop("checked", {{$amalYaumiRecent[0]['witir']}});
          $("#read_quran").prop("checked", {{$amalYaumiRecent[0]['read_quran']}});
          $("#shodaqoh").prop("checked", {{$amalYaumiRecent[0]['shodaqoh']}});
          $("#syukur").prop("checked", {{$amalYaumiRecent[0]['syukur']}});
          $("#doa_for_parent").prop("checked", {{$amalYaumiRecent[0]['doa_for_parent']}});
          $("#doa_for_friend").prop("checked", {{$amalYaumiRecent[0]['doa_for_friend']}});
        });
    </script>
    @endif
  </body>
</html>
