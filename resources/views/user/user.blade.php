<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <title>{{ '@' . $user->name }}</title>
    <link href="{{ asset('css/app.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" href="{{ asset('icon/favicon.ico') }}" size="48x48" type="image/png">
    <link href="{{ asset('css/user/style.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @livewireStyles
  </head>
  <body class="bg-slate-100">
    @include('component/header')
    <div class="container mx-auto main-container mt-14">
      <div class="grid grid-rows-1 grid-cols-3 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600 mt-4">
        <div class="grid grid-rows-2">
          <div class="">
            <center><i class="fa fa-user-circle-o p-1 text-red-500" aria-hidden="true"></i></center>
          </div>
          <div class="">
            <center>{{ '@' . $user->name }}</center>
          </div>
        </div>
        <div class="grid grid-rows-2">
          <div class="">
            <center><i class="fa fa-paper-plane p-1 text-red-500" aria-hidden="true"></i></center>
          </div>
          <div class="">
            <center><span>{{$ownArchivesCount}}</span> Arsip</center>
          </div>
        </div>
        <div class="grid grid-rows-2">
          <div class="">
            <center>
              <i id="label-open-new-archive" class="fa fa-plus p-1 text-red-500" aria-hidden="true" onclick="onOpenNewArchiveTab()"></i>
              <i id="label-close-new-archive" style="display:none" class="fa fa-minus p-1 text-red-500" aria-hidden="true" onclick="onCloseNewArchiveTab()"></i>
            </center>
          </div>
          <div class="">
            <center>Tambah Arsip</center>
          </div>
        </div>
      </div>

      @include('component/newarchive')

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if(session()->has('info'))
      <div class="alert alert-primary alert-dismissible fade show mx-2" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if(session()->has('failed'))
      <div class="alert alert-warning alert-dismissible fade show mx-2" role="alert">
        {{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @foreach ($ownArchives as $archive)
      <div class="shadow-md rounded-md content-tbm bg-white">
        <div class="post-owner">
          <div class="owner-username px-2">
            <span class="align-baseline text-sm font-serif text-red-500"><span class="text-gray-500">By</span> {{ '@' . $user->name }}</span>
            <div class="dropdown float-right">
              <a href="#" role="button" id="dropdownUserArchive-{{ $archive->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h text-gray-500 p-2" aria-hidden="true"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserArchive-{{ $archive->id }}">
                <a class="dropdown-item" href="/user/{{$user->name}}/archive/edit/{{$archive->id}}">Ubah</a>
              </div>
            </div>
          </div>
        </div>
        <div class="post-content p-1">
          @if ($archive->archive_type === 1)
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$archive->archive_origin}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          @elseif($archive->archive_type === 2)
            <center><a href="{{ Storage::url('archiveimage/').$archive->archive_origin }}"><img src="{{ Storage::url('archiveimage/').$archive->archive_origin }}" alt="not found" width="275px"></a></center>
          @endif
        </div>
        @livewire('user-archive-caption', ['archive' => $archive])
      </div>
      @endforeach

      @if(count($ownArchives) == 0)
        <center class="mt-16">
          <div class="">
            <img src="{{asset('imgsvg/no_data.svg')}}" width="180px" alt="no_data">
          </div>
          <div class="mt-2 text-gray-500 text-sm">
            Masih kosong nihh</br>kuy tambah arsip baru!
          </div>
        </center>
      @endif

      <div class="shadow-md rounded-md content-tbm bg-white">
        <div class="next-button py-2 mx-2">
            <center>
              {{ $ownArchives->links() }}
            </center>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js?t={{time()}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
    @livewireScripts
    <script>
      function copySource(source){
        navigator.clipboard.writeText(source);
        alert("Source copied: " + source);
      }

      function clickReaction(archiveId){
        const reaction = document.getElementById("reaction-" + archiveId);
        reaction.innerHTML = parseInt(reaction.innerHTML) + 1;
        fetch('/api/usr/reaction/'+archiveId+"?token="+localStorage.getItem('token'), { method: 'POST' })
          .then(result => result.json());
      }

    </script>
  </body>
</html>
