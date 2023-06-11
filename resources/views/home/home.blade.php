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
  </head>
  <body class="bg-slate-100">
    @include('component/header')
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
            <span class="align-baseline text-sm font-serif text-red-500"><span class="text-gray-500">By</span> {{ '@' . $archive->user->name }}</span>
          </div>
        </div>
        <div class="post-content p-1">
          @if ($archive->archive_type === 1)
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$archive->archive_origin}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          @endif
        </div>
        <div class="post-caption p-1">
          <div class="action-button">
            <button class="rounded-md bg-red-500 hover:bg-slate-400 active:bg-red-700 text-xs text-white p-1 px-3 mx-1" onclick="clickReaction({{$archive->id}})"><i class="fa fa-heart" aria-hidden="true"></i> MasyaAllah</button>
            <button class="rounded-md bg-blue-500 hover:bg-slate-400 active:bg-blue-700 text-xs text-white p-1 px-3 mx-1" onclick="copySource({{ "\"" .$archive->source. "\""}})" ><i class="fa fa-file" aria-hidden="true"></i> Source</button>
          </div>
          <div class="caption p-1">
            <p class="text-xs font-serif text-gray-400 likes-count" style="margin-bottom:0"><span id="reaction-{{$archive->id}}">{{$archive->likes}}</span> reactions</p>
            <p class="text-sm font-serif text-left text-gray-500" style="margin-bottom:2px">
              {{$archive->captions}}
            </p>
            <p class="text-xs font-serif text-gray-500 text-right post-date" style="margin-bottom:0">{{date("d M Y, H:i", strtotime($archive->created_at))}}</p>
          </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}?t={{time()}}"></script>
    <script>
      function copySource(source){
        navigator.clipboard.writeText(source);
        alert("Source copied: " + source);
      }

      function clickReaction(archiveId){
        const reaction = document.getElementById("reaction-"+archiveId);
        reaction.innerHTML = parseInt(reaction.innerHTML) + 1;
        fetch('/api/usr/reaction/'+archiveId, {method: 'POST'})
          .then(result => result.json())
          .then(jsonResult => {console.log(jsonResult)});
      }
    </script>
  </body>
</html>
