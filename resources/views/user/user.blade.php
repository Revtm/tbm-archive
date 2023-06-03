<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster">
    <title>{{ '@' . $user->name }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  </head>
  <body class="bg-slate-50">
    @include('component/header')
    <div class="container mx-auto main-container">
      <div class="grid grid-rows-1 grid-cols-3 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
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
            <center><span>2</span> Archives</center>
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
            <center>New Archive</center>
          </div>
        </div>
      </div>

      @include('component/newarchive')

      <div class="shadow-md rounded-md content-tbm bg-white">
        <div class="post-owner grid grid-cols-12 gap-1 justify-start">
          <div class="owner-photo col-span-2 place-self-center">
            <div class="photo">
              <img class="photo-img rounded-full border outline-black" src="https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-12.jpg" alt="profile">
            </div>
          </div>
          <div class="owner-username col-span-3 place-self-center">
            <span class="inline-block align-baseline text-sm font-serif	text-gray-600">@Revantama</span>
          </div>
        </div>
        <div class="post-content">
          <iframe width="100%" height="300" src="https://www.youtube.com/embed/KbkyqccX8ss" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="post-caption p-1">
          <div class="action-button">
            <button class="rounded-md bg-red-500 hover:bg-slate-400 text-sm text-white p-1 px-4 mx-1">Liked</button>
            <button class="rounded-md bg-blue-500 text-sm text-white p-1 px-4 mx-1">Source</button>
          </div>
          <div class="caption p-1">
            <p class="text-xs font-serif text-gray-400 likes-count"><span>20.000</span> likes</p>
            <p class="text-sm font-serif text-justify text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
             </p>
            <p class="text-xs font-serif text-gray-500 text-right post-date">Jun 01, 2023</p>
          </div>
        </div>
      </div>

      <div class="shadow-md rounded-md content-tbm bg-white">
        <div class="post-owner grid grid-cols-12 gap-1 justify-start">
          <div class="owner-photo col-span-2 place-self-center">
            <div class="photo">
              <img class="photo-img rounded-full border outline-black" src="https://icon-library.com/images/no-profile-pic-icon/no-profile-pic-icon-12.jpg" alt="profile">
            </div>
          </div>
          <div class="owner-username col-span-3 place-self-center">
            <span class="inline-block align-baseline text-sm font-serif	text-gray-600">@Revantama</span>
          </div>
        </div>
        <div class="post-content">
          <img width="100%" src="https://cdn-cms.pgimgs.com/areainsider/2023/02/Alt-Text-Masjid-Istiqlal-Mengenal-Kemegahan-dan-Sejarah-Masjid-Paling-Terkenal.png">
        </div>
        <div class="post-caption p-1">
          <div class="action-button">
            <button class="bg-slate-400 hover:bg-red-500 rounded-md text-sm text-white p-1 px-4 mx-1">Like</button>
            <button class="rounded-md bg-blue-500 text-sm text-white p-1 px-4 mx-1">Source</button>
          </div>
          <div class="caption p-1">
            <p class="text-xs font-serif text-gray-400 likes-count"><span>20.000</span>  likes</p>
            <p class="text-sm font-serif text-justify text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
             </p>
            <p class="text-xs font-serif text-gray-500 text-right post-date">Jun 01, 2023</p>
          </div>
        </div>
      </div>
      <div class="next-button">
          <center><button class="shadow-md rounded-md bg-white hover:bg-red-500 text-sm text-gray-500 hover:text-white p-1 px-4 mx-1">Click Here For More Posts!</button></center>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
