<form id="new-archive-form" style="display: none" action="/user/archive" method="post" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="grid grid-rows-3 gap-2 grid-cols-1 shadow-md rounded-md user-profile bg-white text-sm font-serif text-gray-600">
    <div class="grid grid-rows-2">
      <div class="">
        Archive Type:
      </div>
      <div class="grid grid-cols-2">
        <div class="">
          <input type="radio" name="archive_type" class="accent-red-500" onclick="onTypeYoutube()" value="1" checked> Youtube Video</input>
        </div>
        <div class="">
          <input type="radio" name="archive_type" class="accent-red-500" onclick="onTypeImage()" value="2"> Gambar Poster <span style="font-size:7pt; padding:1px" class="bg-blue-500 text-white rounded-full"> new! </span></input>
        </div>
      </div>
    </div>
    <div class="grid grid-rows-2">
      <div class="">
        <span id="archive-yt-url-label">Youtube Url:</span>
        <span id="archive-image-label" style="display:none">Unggah (png/jpg max 600 KB):</span>
      </div>
      <div class="grid grid-cols-1">
        <div class="">
          <input autocomplete="off" type="text" id="archive-yt-url" name="archive_yt_url" style="width:100%" class="yt-url-input accent-red-500 border rounded p-1" placeholder="https://www.youtube.com/watch?v=KbkyqccX8ss" value="{{ old('archive_yt_url') }}">
          <input type="file" id="archive-image" name="archive_image" style="width:100%; display:none;" class="file-input accent-red-500 border rounded">
        </div>
      </div>
    </div>
    <div class="grid grid-rows-2">
      <div class="">
        Sumber:
      </div>
      <div class="grid grid-cols-1">
        <div class="">
          <input autocomplete="off" type="text" name="archive_source" style="width:100%" class="source-input accent-red-500 border rounded p-1" placeholder="Original, youtube url, atau social account" value="{{ old('archive_source') }}">
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
        <textarea name="archive_caption" rows="3" style="width:100%" class="caption-input accent-red-500 border rounded p-1" placeholder="Bismillah...">{{ old('archive_caption')}}</textarea>
      </div>
    </div>
    <div class="grid grid-rows-1">
      <div class="">
        <button type="submit" name="button" style="width:100%" class="archive-button rounded-md bg-red-500 text-sm text-white p-2 my-3">Arsipkan!</button>
      </div>
    </div>
  </div>
</form>

<script>
function onTypeYoutube() {
  document.getElementById("archive-yt-url").style.display = "block";
  document.getElementById("archive-image").style.display = "none";
  document.getElementById("archive-yt-url-label").style.display = "block";
  document.getElementById("archive-image-label").style.display = "none";
}

function onTypeImage() {
  document.getElementById("archive-yt-url").style.display = "none";
  document.getElementById("archive-image").style.display = "block";
  document.getElementById("archive-yt-url-label").style.display = "none";
  document.getElementById("archive-image-label").style.display = "block";
}

function onOpenNewArchiveTab() {
  document.getElementById("new-archive-form").style.display = "block";
  document.getElementById("label-open-new-archive").style.display = "none";
  document.getElementById("label-close-new-archive").style.display = "block";
}
function onCloseNewArchiveTab() {
  document.getElementById("new-archive-form").style.display = "none";
  document.getElementById("label-open-new-archive").style.display = "block";
  document.getElementById("label-close-new-archive").style.display = "none";
}
</script>
