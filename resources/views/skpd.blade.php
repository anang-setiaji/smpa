<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beranda SKPD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="js/main.js"></script>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="http://36.67.25.4:8000/socket.io/socket.io.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="assets_dashboard/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="js/ionicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.0/ionicons.min.js"></script>
    <!-- Font Awesome JS -->
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
    {{-- <li class="dropdown" id="markasread" onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;"><i class= "fa fa-bell" ></i> Notifikasi
      <span class="badge" style="background-color:red;font-size:15px"> {{count(auth()->user()->unreadNotifications)}}</span></a>
      <ul class="dropdown-menu" style="background-color: #000; font-size: 20px">

        @forelse(auth()->user()->unreadNotifications as $notification)
        @include('.'.snake_case(class_basename($notification->type)))
        @empty
         <li><a href="">-tiada notifikasi-</a></li>

        @endforelse
      </ul>
    </li> --}}
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;">
      <i class= "fa fa-user" ></i>  {{ Auth::user()->name}}
      <span class="caret"></span></a>
      <ul class="dropdown-menu" style="background-color: #273c75; font-size: 20px">

        {{-- <li><a style="background-color:#273c75" href="/profile">Profil</a></li> --}}
       <li><a href="{{url('password')}}/change">Ganti Password</a></li>

        {{-- <li><a style="background-color:#273c75" href="/profile">Profil</a></li> --}}
        <li><a style="" href="{{ route('logout') }}" onclick="
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
   @if(Auth::user()->jabatan == 'user')
      <!-- Sidebar  -->
      <nav id="sidebar">
          <div class="sidebar-header">
            
              <h3>List Menu</h3>
          </div>

          <ul class="list-unstyled components">

            <li class="active" >
              <a href="/skpd"><i class="fa fa-home" style="font-size:24px;color:white;opacity:0.5;"></i>
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
          <li >
          <a href="/request"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Status Aplikasi</a>
          </li>
          <li >
          <a href="/inputrequest"><i class="fa fa-plus-square" style="font-size:24px;color:white;opacity:0.5;"></i> Pengajuan Aplikasi</a>
          </li>
          <li >
          <a href="/inputaplikasi"><i class="fas fa-pen-square"style="font-size:24px;color:white;opacity:0.5;"></i> Input Aplikasi</a>
          </li>
          <li >
            <a href="/chat"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat           
              <span class="badge unread-indicator" style="background-color:red;font-size:15px;width:20px;height:20px"></span>
            </a>       
          </li>
          


      </nav>
      @else
      <nav id="sidebar">
        <div class="sidebar-header">
          
            <h3>List Menu</h3>
        </div>

        <ul class="list-unstyled components">

          
          <li  >
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
          @if(count(auth()->user()->unreadNotifications) != 0)
          <li  onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})" >
              <a href="/requesta"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Pengajuan <span class="badge" style="background-color:red;font-size:16px;margin-left:7px"> {{count(auth()->user()->unreadNotifications)}}</span> </a>
          </li>
          @else
          <li >
            <a href="/requesta"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Pengajuan </a>
        </li>
        @endif
        <li>
          <a href="/aplikasi"><i class="fa fa-cogs" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Aplikasi</a>
      </li>
    
      <li  >
        <a href="/daftarskpd"><i class="fa fa-building" style="font-size:24px;color:white;opacity:0.5;"></i> SKPD</a>
    </li>
      <li>
        <a href="/admin"><i class="fa fa-user" style="font-size:24px;color:white;opacity:0.5;"></i> Admin</a>
    </li>
      <li  >
        <a href="/chats"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat</a>
    </li> 
          
              


      </nav>
      @endif

      <!-- Page Content  -->
      <div id="content">


        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#192a56"  >
              <div class="container-fluid">

                  <span class="caret"></span></a><a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" style="color:black"></i> Back </a>

                  <button type="button" id="sidebarCollapse" class="btn btn-default">
                      <i class="fa fa-align-left"></i>
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

    @if( Auth::user()->jabatan === 'admin' or Auth::user()->jabatan === 'programmer')
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
      @else
<div class="row">
  <div class="col-sm-4">
    <div class="small-box bg-green-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Status Aplikasi</h4>
      </div>
      <div class="icon">
        <i class="fa fa-laptop" style="font-size:72px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/request" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="small-box bg-aqua-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Pengajuan Aplikasi</h4>
      </div>
      <div class="icon">
        <i class="fa fa-plus" style="font-size:64px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/inputrequest" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></i></a>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="small-box bg-red-gradient">
      <div class="inner">
        <h3></h3>

        <h4>Input Aplikasi</h4>
      </div>
      <div class="icon">
        <i class="fa fa-pencil" style="font-size:72px;color:white;opacity:0.5;"></i>
      </div>
      <a href="/inputaplikasi" class="small-box-footer"><i class="fa fa-arrow-circle-right" style="font-size:24px;color:white;"></i></a>
    </div>
  </div>
@endif
  @foreach ($requ as $row)

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
@if ($percentage == '100')
<div class="col-sm-12">
  <div class="app-card">
    <div class="container-card">
      <a href="#"><img style="width:187px" src="uploads/{{ Auth::user()->foto}}" alt="cover" class="cover" /></a>
      <div class="hero">         
        <div class="details">
          <div class="title1"><i class="fa fa-cogs" style="font-size:40px;color:white;"></i> {{ $row->aplikasi }}</div>
          <div class="title2">{{ $row->nama }}</div> 
            
          
        </div> <!-- end details -->
      </div> <!-- end hero -->
      <div class="description">
        <div class="column1">
          <a href="http://{{$row->link}}" type="button" class="btn btn-primary btn-lg btn-block">LINK DEMO</a>
          
        </div> <!-- end column1 -->
        <div class="column2">
          @if ($row->maintenance == 'MAINTENANCE')
          <a href="" type="button" class="btn btn-danger" style="pointer-events:none">MAINTENANCE</a>
          @elseif ($row->maintenance == 'ACTIVE')
          <a href="" type="button" class="btn btn-success"  style="pointer-events:none" >Aktif</a>
          @elseif ($row->maintenance == 'NOT ACTIVE')
          <a href="" type="button" class="btn btn-secondary"  style="pointer-events:none" >Tidak Aktif</a>
          @else
          <a href="" type="button" class="btn btn-danger">ON PROGRESS</a>
          @endif
          <br><br>
         <p>{{ $row->penjelasan }}</p>

        </div> <!-- end column2 -->
      </div> <!-- end description -->
    </div> <!-- end container -->
  </div> <!-- end card -->

</div>
@else 
<div></div>
@endif
@endforeach


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

<script type="text/javascript">
$(document).ready(function () {
    
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

// function openForms() {
//   document.getElementById("myForm").style.display = "block";
// }
</script>
<script>
  const socket = io('http://36.67.25.4:8000/');
    socket.on('updateWarning', () => {
      console.log('masuk');
      getUpdate();
    });
    getUpdate();
</script>
</html>
