<div class="container">
  <div class="header-tbm shadow-md bg-white bg-contain fixed top-0 left-0 right-0">
    <center>
      <a href="/home"><i class="fa fa-home float-left p-1 text-red-500" aria-hidden="true"></i></a>
      <span class="text-red-500 font-bold" style="font-family: 'Lobster';">TBM Archives</span>
      <i onclick="sidebarOpen()" class="fa fa-bars float-right p-1 text-red-500" id="navbar-open" aria-hidden="true"></i>
      <i onclick="sidebarClose()" class="fa fa-times float-right p-1 text-red-500" id="navbar-close" aria-hidden="true" style="display:none"></i>
    </center>
  </div>
  <div class="container-fluid fixed shadow-md bg-white right-0 left-0" id="tbm-sidebar" style="display:none; height:50%">
    <div class="tbm-sidebar">
      <div class="grid grid-rows-2">
        <div class="">
          <center>
            <button class="ext-sm text-gray-500 p-1 px-4 mx-1" type="button" name="button" onclick="sidebarClose()">Profile</button>
          </center>
        </div>
        <div class="">
          <center>
            <button class="ext-sm text-gray-500 p-1 px-4 mx-1" type="button" name="button" onclick="sidebarClose()">Logout</button>
          </center>
        </div>
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
