<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset('css/app.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <link href="{{ asset('css/home/style.css') }}?t={{time()}}" rel="stylesheet">
    <link rel="manifest" href="{{ asset('manifest.json') }}" >
    <link rel="icon" href="{{ asset('icon/favicon.ico') }}" size="48x48" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @livewireStyles
  </head>
  <body class="bg-slate-100">
    @include('component/headerhome')
    <div class="container mx-auto main-container mt-14">
      @if(session()->has('failed'))
      <div class="alert alert-warning alert-dismissible fade show mx-2" role="alert">
        {{ session('failed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @foreach ($archives as $archive)
      <div class="shadow-md rounded-md content-tbm bg-white mt-4">
        <div class="post-owner">
          <div class="owner-username px-2">
            <span class="align-baseline text-sm font-serif text-red-500"><span class="text-gray-500">By</span> {{ '@' . $archive->user->name }} </span>
          </div>
        </div>
        <div class="post-content p-1">
          @if ($archive->archive_type === 1)
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$archive->archive_origin}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @elseif($archive->archive_type === 2)
              <center><a href="{{ Storage::url('archiveimage/').$archive->archive_origin }}"><img src="{{ Storage::url('archiveimage/').$archive->archive_origin }}" alt="not found" width="275px"></a></center>
            @endif
        </div>
        @livewire('archive-caption', ['archive' => $archive])
      </div>
      @endforeach
      <div class="shadow-md rounded-md content-tbm bg-white">
        <div class="next-button py-2 mx-2">
            <center>
              {{ $archives->links() }}
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
        const reaction = document.getElementById("reaction-"+archiveId);
        reaction.innerHTML = parseInt(reaction.innerHTML) + 1;
        fetch('/api/usr/reaction/'+archiveId+"?token="+localStorage.getItem('token'), {method: 'POST'})
          .then(result => result.json());
      }
    </script>
  </body>
</html>
