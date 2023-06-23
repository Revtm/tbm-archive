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
  </head>
  <body class="bg-slate-100">
    @include('component/headerhome')
    <div class="container mx-auto main-container mt-14">
      <form id="new-archive-form" action="/user/archive/edit/t/{{$archive->archive_type}}/i/{{$archive->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="grid {{$archive->archive_type === 1 ? 'grid-rows-2' : 'grid-rows-1'}} gap-2 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
          <div class="grid grid-rows-2">
            @if ($archive->archive_type === 1)
            <div class="">
              <span id="archive-yt-url-label">Youtube Url:</span>
            </div>
            <div class="grid grid-cols-1">
              <div class="">
                <input autocomplete="off" type="text" id="archive-yt-url" name="archive_yt_url" style="width:100%" class="yt-url-input accent-red-500 border rounded p-1" placeholder="https://www.youtube.com/watch?v=KbkyqccX8ss" value="{{ $archive->source }}">
                <input type="file" id="archive-image" name="archive_image" style="width:100%; display:none;" class="file-input accent-red-500 border rounded">
              </div>
            </div>
            @endif
          </div>
          <div class="grid grid-rows-2">
            <div class="">
              Sumber:
            </div>
            <div class="grid grid-cols-1">
              <div class="">
                <input autocomplete="off" type="text" name="archive_source" style="width:100%" class="source-input accent-red-500 border rounded p-1" placeholder="Original, youtube url, or social account" value="{{ $archive->source }}">
              </div>
            </div>
          </div>
        </div>

        <div class="shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
          <div class="grid grid-rows-1 gap-y-0">
            <div class="my-2">
              Caption Arsip:
            </div>
            <div class="">
              <textarea name="archive_caption" rows="3" style="width:100%" class="caption-input accent-red-500 border rounded p-1" placeholder="Bismillah...">{{ $archive->captions }}</textarea>
            </div>
          </div>
          <div class="grid grid-rows-2">
            <div class="">
              <button type="submit" name="button" style="width:100%" class="archive-button rounded-md bg-gray-500 text-sm text-white p-2 my-2">Perbarui</button>
            </div>
            <div class="">
              <button type="button" name="button" style="width:100%" class="archive-button rounded-md bg-red-500 text-sm text-white p-2 my-2" data-toggle="modal" data-target="#delete-message">Hapus</button>
            </div>
          </div>
        </div>
      </form>

      <div class="modal fade" id="delete-message" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kamu yakin?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Sekali dihapus maka arsip tidak dapat dikembalikan.
            </div>
            <div class="modal-footer">
              <button type="button" class="rounded-md bg-gray-500 text-sm text-white p-2" data-dismiss="modal">Batal</button>
              <form action="/user/archive/del/t/{{$archive->archive_type}}/i/{{$archive->id}}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="rounded-md bg-red-500 text-sm text-white p-2">Ya, hapus sekarang</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @if(session()->has('failed'))
      <div class="alert alert-warning alert-dismissible fade show mx-2" role="alert">
        {{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    </div>
    <script type="text/javascript">
    function onChangeYoutubeUrl(url) {
      document.getElementById("archive-yt-url").style.display = "block";
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
  </body>
</html>
