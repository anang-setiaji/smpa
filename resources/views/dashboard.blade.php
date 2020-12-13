<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="assets_dashboard/style.css" rel="stylesheet">
      <link rel="stylesheet" href="js/ionicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.0/ionicons.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://smpa-chat.herokuapp.com"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> --}}
</head>
<body>
<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0;border-radius: 0;border:0;width:100%;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
      data-target="#navbar-collapse-main">
        <span class="sr-only">Toogle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="assets_dashboard/img/logo.png"></a>
    </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-main">


        <ul class="nav navbar-nav navbar-right">
          <ul class="nav navbar-nav">
    <li class="active"><!-- <a href="#">Home</a></li> -->
   <!--  <li><a href="#">Profil</a></li> -->
   <!--  <li><a href="#"></a></li> -->
    <!-- <li><a href="#">Kontak</a></li>  -->

    {{-- <notification :unreads="{{auth()->user()->unreadNotifications}}"></notification> --}}
    
    <li class="dropdown" id="markasread" onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;"><i class= "fa fa-bell" ></i> Notifikasi
      <span class="badge" style="background-color:red;font-size:15px"> {{count(auth()->user()->unreadNotifications)}}</span></a>
      <ul class="dropdown-menu" style="background-color: #000; font-size: 20px">

        {{-- <li><a style="background-color:#162e46" href="/profile">Profile</a></li> --}}
        @forelse(auth()->user()->unreadNotifications as $notification)
        @include('.'.snake_case(class_basename($notification->type)))
        @empty
         <li><a href="">-tiada notifikasi-</a></li>

        {{-- <li><a style="" href="">{{$notification->type}}</a></li> --}}
        @endforelse
      </ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;">
      <i class= "fa fa-user" ></i>  {{ Auth::user()->name}}
      <span class="caret"></span></a>
      <ul class="dropdown-menu" style="background-color: #273c75; font-size: 20px">

        {{-- <li><a style="background-color:#273c75" href="/profile">Profil</a></li> --}}
        <li><a style="background-color:#273c75" href="{{ route('logout') }}" onclick="
        event.preventDefault();
        document.getElementById('logout-form').submit()
        " >Logout</a></li>
        <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
          {{ csrf_field() }}
        </form>
        <!-- <li><a href="#">CSS</a></li>
        <li><a href="#">Bootstrap</a></li> -->
      </ul>
    </li>
  </ul>

        <!-- <li><a href="{{ route('logout') }}" onclick="
        event.preventDefault();
        document.getElementById('logout-form').submit()
        " >Logout</a></li>
        <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
          {{ csrf_field() }}
        </form> -->
      </ul>
  </div>
</div>
</nav>
  <div class="wrapper">

      <!-- Sidebar  -->
      <nav id="sidebar">
          <div class="sidebar-header">
            
              <h3>List Menu</h3>
          </div>

          <ul class="list-unstyled components">

            <li class="active" >
              <a href="/dashboard"><i class="fa fa-home" style="font-size:24px;color:white;opacity:0.5;"></i>
                 Home </a>
              {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                  <!-- <li>
                      <a href="#">apa</a>
                  </li>
                  <li>
                      <a href="#">aja</a>
                  </li>
                  <li>
                      <a href="#">boleh</a>
                  </li> -->
              </ul> --}}
          </li>
          <li  >
              <a href="/requesta"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Pengajuan</a>
          </li>
          <li  >
            <a href="/admin"><i class="fa fa-building" style="font-size:24px;color:white;opacity:0.5;"></i> SKPD</a>
        </li>
        <li>
          <a href="/aplikasi"><i class="fa fa-cogs" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Aplikasi</a>
      </li>
      
      <li  >
        <a href="/chats"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat           
          <span class="badge unread-indicator" style="background-color:red;font-size:15px;width:20px;height:20px"></span>
        </a>    
      </li> 


      </nav>


      <!-- Page Content  -->
      <div id="content">


        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#192a56"  >
              <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="btn btn-default">
                      <i class="fa fa-align-left"></i>
                      <span>Toggle Sidebar</span>
                  </button>
              </div>
            </nav>


<br>
<div class="container">
    @if(Session::has('alert'))
    <div class="alert alert-{{Session::get('style')}} alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{Session::get('alert')}}</strong>{{Session::get('msg')}}
    </div>
    @endif
    
<div class="row">
  <div class="col-sm-4">
    <div class="small-box bg-aqua-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Daftar Pengajuan</h4>
      </div>
      <div class="icon">
        <i class="fa fa-laptop" style="font-size:64px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/requesta" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></i></a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="small-box bg-green-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Daftar SKPD</h4>
      </div>
      <div class="icon">
        <i class="fa fa-building" style="font-size:72px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/admin" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="small-box bg-purple-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Daftar Aplikasi</h4>
      </div>
      <div class="icon">
        <i class="fa fa-cog" style="font-size:72px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/aplikasi" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></a>
    </div>
  </div>
  
  <h1 style="text-align:center;margin-top:200px"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Project Timeline</h1>
  <section class="timeline" style="margin-top:30px">
    <ul>    
      <!-- more list items here -->
       @if(auth()->user()->jabatan == 'admin')

          @foreach ($requ->sortBy('countdown') as $row)

          <?php 
          $currentChecked = 0;
          foreach($row->requirements as $r) {
            if($r->status === 'Done') {
              $currentChecked++;
            }
          }
          $total = count($row->requirements);
          $percentage = ($currentChecked/$total) * 100;
          
      ?>
<?php
$fdate = date("Y-m-d");
$tdate = $row->countdown;
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = date_diff($datetime1, $datetime2);
$days = $interval->format("%r%a");
?>
@if ($percentage < 100 AND $days > 0)
<li>
  <div>
    <time><a href="" style="font-size:15px;background-color:#192a56;" type="button" class="btn btn-info">{{$days}} Hari</a></time>
    <br>
          <h1></h1>
          <h3><b>{{$row->aplikasi}}</b></h3> 
          <h4><b>{{$row->nama}}</b></h4> 
          Deadline : {{$row->countdown}}
  </div>
</li>

        @endif
        @endforeach
        @else
        @foreach ($prog->sortBy('countdown') as $row)

          <?php 
          $currentChecked = 0;
          foreach($row->requirements as $r) {
            if($r->status === 'Done') {
              $currentChecked++;
            }
          }
          $total = count($row->requirements);
          $percentage = ($currentChecked/$total) * 100;
          
      ?>
<?php
$fdate = date("Y-m-d");
$tdate = $row->countdown;
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime1->diff($datetime2);
$days = $interval->format("%r%a");
?>
@if ($percentage < 100 AND $days > 0)
<li>
  <div>
    <time><a href="" style="font-size:15px;background-color:#192a56;" type="button" class="btn btn-info">{{$days}} Hari</a></time>
    <br>
          <h1></h1>
          <h3><b>{{$row->aplikasi}}</b></h3> 
          <h4><b>{{$row->nama}}</b></h4> 
          Deadline : {{$row->countdown}}
  </div>
</li>

        @endif
        @endforeach
        @endif
      </ul>
    </section>


</div>

  <button class="open-button" onclick="openForm()"><i class="fa fa-comments" style="font-size:30px;color:white"></i></button>

    <div class="col-sm-6" 
    style="position: fixed;
    bottom: 1px;
    right: 28px;
    z-index:11;">
      <div class="cards">
        
          <div class="chat-popup" id="myForm">
            <form action="" class="form-container">
          <div class="cards-body" id="app">
            <chat-app :user="{{auth()->user()}}"></chat-app>

          </div>
          <br>
          <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>

        </form>
      </div>
      </div>
    </div>
    <button class="open-button" onclick="openForm()"><i class="fa fa-comments" style="font-size:30px;color:white"></i>

      <span class="badge unread-indicator" 
      style="background-color:red;font-size:25px;width:30px;height:30px;color: white;border: none;cursor: pointer;opacity: 1;position: fixed;bottom: 23px;right: 48px;z-index:8;border-radius:50%">
      </span>
    
    </button>

    <div class="col-sm-6" 
    style="position: fixed;
    bottom: 1px;
    right: 28px;
    z-index:11;">
      <div class="cards">
        
          <div class="chat-popup" id="myForm">
            <form action="" class="form-container">
          <div class="cards-body" id="app">
            <chat-app :user="{{auth()->user()}}"></chat-app>

          </div>
          <br>
          <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>

        </form>
      </div>
      </div>
    </div>
    <div id="popupImg">
      <a href="#">tutup</a>
      <img src="" />
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://raw.githubusercontent.com/webdevmatics/webdevforum/master/public/js/main.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    const socket = io('localhost:3000');
    socket.on('updateWarning', () => {
      console.log('masuk');
      getUpdate();
    });
    getUpdate();
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $('#popupImg a').on('click', function(ev){
      ev.preventDefault();
      $('#popupImg').hide();
    });
});

function getUpdate() {
  fetch('/getupdate').then((res) => res.json()).then((data) => {
    const indicators = $('.unread-indicator');
    if(data.messages_count) {
      indicators.show().text(data.messages_count);
    } else {
      indicators.hide();
    }
  });
}

function openForm(id) {
  const form = document.getElementById("myForm")
  if(id) {
    const cItem = document.getElementsByClassName(id + '-contact-item');
    cItem[0].click(); 
  }
  form.style.display = "block"
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}


function isElementInViewport(el) {
  var rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}
var items = document.querySelectorAll(".timeline li");
 
// code for the isElementInViewport function
 
function callbackFunc() {
  for (var i = 0; i < items.length; i++) {
    if (isElementInViewport(items[i])) {
      items[i].classList.add("in-view");
    }
  }
}
 
window.addEventListener("load", callbackFunc);
window.addEventListener("scroll", callbackFunc);
</script>

</html>
