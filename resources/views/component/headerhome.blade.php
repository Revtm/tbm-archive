<div class="container">
  <div class="header-tbm shadow-md bg-white bg-contain fixed top-0 left-0 right-0 p-3 md:p-5 z-10">
    <center>
      @if(isset($user))
      <a href="{{url('user/' . $user->name)}}"><i class="fa fa-user-circle-o float-left p-1 text-red-500" aria-hidden="true"></i></a>
      @endif
      <span class="text-red-500 font-bold" style="font-family: 'Lobster';">TBM Archives</span>
      @if(isset($user))
      <i onclick="sidebarOpen()" class="fa fa-bars float-right p-1 text-red-500" id="navbar-open" aria-hidden="true"></i>
      <i onclick="sidebarClose()" class="fa fa-times float-right p-1 text-red-500" id="navbar-close" aria-hidden="true" style="display:none"></i>
      @endif
    </center>
  </div>
  @if(isset($user))
  <div class="container-fluid fixed shadow-md bg-white right-0 left-0 m-0 z-10" id="tbm-sidebar" style="display:none; height:50%">
    <div class="tbm-sidebar">
      <div class="grid grid-rows-3">
        <div class="">
          <center>
            <a href="{{url('user/' . $user->name)}}" class="text-sm text-gray-500 p-1 px-4 mx-1" type="button" name="button">Profile</a>
          </center>
        </div>
        <div class="">
          <center>
            <a href="{{url('/amalyaumi')}}" class="text-sm text-gray-500 p-1 px-4 mx-1" type="button" name="amal-yaumi">Amal Yaumi <span style="font-size:6pt; padding:1px" class="bg-blue-500 text-white rounded-full">new!</span></a>
          </center>
        </div>
        <div class="">
          <center>
            <form action="/user/logout/auth" method="post">
              @csrf
              @method('POST')
              <button class="text-sm text-gray-500 p-1 px-4 mx-1" type="submit" name="logout">Logout</button>
            </form>
          </center>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
<div class="modal fade" id="new-feature-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Developer Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>InsyaAllah</p>
      </div>
    </div>
  </div>
</div>

<script>
function sidebarOpen() {
  document.getElementById("tbm-sidebar").style.width = "100%";
  document.getElementById("tbm-sidebar").style.display = "block";
  document.getElementById("navbar-open").style.display = "none";
  document.getElementById("navbar-close").style.display = "";
}

function sidebarClose() {
  document.getElementById("tbm-sidebar").style.display = "none";
  document.getElementById("navbar-open").style.display = "";
  document.getElementById("navbar-close").style.display = "none";
}
</script>
