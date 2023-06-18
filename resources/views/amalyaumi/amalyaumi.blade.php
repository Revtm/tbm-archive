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
    <div class="container mx-auto main-container mt-14">
      <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
        <div class="grid grid-rows-1">
          <div class="grid grid-cols-2">
            <div class="text-gray-500">Date</div><div class="text-gray-500">: {{date("d M Y")}}</div>
          </div>
          <div class="grid grid-cols-2">
            <div class="text-gray-500">Amal Yaumi Status </div><div>: {!!$amalYaumiMaster->status == 1 ? '<span class="text-green-500">Active</span>' : '<span class="text-yellow-500">Non Active</span>'!!}</div>
          </div>
          <div class="grid my-1">
            <span class="text-gray-500">Don't forget to say <span style="font-family: 'Lobster';">Bismillah</span> :)</span>
          </div>
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
        <div class="grid grid-rows-1 overflow-x-auto">
          <div class="">
            <div class="">
              <i class="fa fa-line-chart p-1 text-red-500" aria-hidden="true"></i> Last 7 Days Report
              <span id="open-text-report" class="text-red-500" onclick="onOpenReportTab()">(click to open)</span>
              <span id="close-text-report" class="text-red-500" onclick="onCloseReportTab()" style="display:none">(click to close)</span>
            </div>
            <div class="" id="amal-chart" style="display:none">
              <canvas id="myChart" height="200px" width="300px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
        <div class="m-1">
          Shalat Subuh (Jama'ah)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="subuh" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Shalat Dzuhur (Jama'ah)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="dzuhur" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
        <div class="m-1">
          Shalat Ashar (Jama'ah)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="ashar" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
        <div class="m-1">
          Shalat Magrib (Jama'ah)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="maghrib" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Shalat Isya (Jama'ah)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="isya" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Shalat Sunnah Dhuha
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="dhuha" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Shalat Sunnah Witir
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="witir" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Tilawah Al-Qur'an (min: 1 ayat)
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="read_quran" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Shodaqoh
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="shodaqoh" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Syukur
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="syukur" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1">
        <div class="m-1">
          Do'a for your Parent
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="doa_for_parent" value="off">
        </div>
      </div>
      <div class="grid grid-rows-1 grid-cols-2 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-1" style="margin-bottom: 4rem">
        <div class="m-1">
          Do'a for TBM
        </div>
        <div class="text-right">
          <input class="accent-red-500 m-2" type="checkbox" name="doa_for_friend" value="off">
        </div>
      </div>
    </div>
    <div class="container fixed shadow-md bg-white bg-contain bottom-0 left-0 right-0 p-2 md:p-4 z-10">
      <div class="grid grid-rows-1">
        <button type="button" name="button" style="width:100%" class="rounded-md bg-red-500 text-sm text-white p-2">Save</button>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
    <script type="text/javascript">

        var labels =  {{ Js::from($amalYaumiReport['labels']) }};
        var counts =  {{ Js::from($amalYaumiReport['counts']) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Amal',
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
  </body>
</html>
