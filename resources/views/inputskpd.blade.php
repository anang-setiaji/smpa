<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://rawcdn.githack.com/ridhowise/SiPA/6c5569c4137b797e021be6e35fbd28d3036e38ab/public/assets_dashboard/style.css">

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
      <a class="navbar-brand" href="#"><img src="https://i.ibb.co/sb0J0M5/logo.png"></a>
    </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-main">


        <ul class="nav navbar-nav navbar-right">
          <ul class="nav navbar-nav">
    <li class="active"><!-- <a href="#">Home</a></li> -->
   <!--  <li><a href="#">Profil</a></li> -->
   <!--  <li><a href="#"></a></li> --> 
    <!-- <li><a href="#">Kontak</a></li>  -->
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px !important;background-color: #273c75; color:#fff;"><i class= "fa fa-user" ></i> {{ Auth::user()->name}}
      <span class="caret"></span></a>
      <ul class="dropdown-menu" style="background-color: #162e46; font-size: 20px">

        {{-- <li><a style="background-color:#162e46" href="/profile">Profile</a></li> --}}
       <li><a href="{{url('password')}}/change">Ganti Password</a></li>

        <li><a style="" href="{{ route('logout') }}" onclick="        event.preventDefault();
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

          
          <li  >
            <li >
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
        <li onclick="markNotificationAsRead({{count(auth()->user()->unreadNotifications)}})" >
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


      <!-- Page Content  -->
      <div id="content">


        <nav class="navbar navbar-expand-lg navbar-light bg-light"  >
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
    
              
              <div class="container-fluid">
                <div class="panel panel-default">
        <div class="panel-heading">Form SKPD</div>
        <div class="panel-body">
          @error('password')
          <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Password harap diisi</div>
          @enderror
          @error('foto')
          <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Foto diisi dengan format png atau jpg</div>
          @enderror
          @error('name')
          <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Name Harap disi</div>
          @enderror
          @error('email')
          <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Username harap diisi</div>
          @enderror
            <form class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label class="control-label col-sm-2">Username:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama SKPD:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" >
                  </div>
                </div>
                <div class="form-group" style="display:none">
                  <label class="control-label col-sm-2">PROFILE:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="profile_image" value="https://i1.wp.com/uxindonesia.org/wp-content/uploads/2019/03/user-kosong.png?resize=150%2C150"  >
                  </div>
                </div>
             
                    <input type="hidden" name="jabatan" value="user">
                 
                <div class="form-group">
                  <label class="control-label col-sm-2">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Logo SKPD:</label>
                  <div class="col-sm-10">         
                    
                    <!-- actual upload which is hidden -->
                    <input type="file" id="actual-btn" class="hidden" name="foto"/>                                
                    <!-- our custom upload button -->
                    <label for="actual-btn" 
                    style="background-color:#337ab7;
                    color: white;
                    padding: 0.7rem;
                    font-family: sans-serif;
                    border-radius: 0.3rem;
                    cursor: pointer;
                    ">Pilih File</label>
                    
                    <!-- name of file chosen -->
                    <span id="file-chosen" style="margin-left: 0.3rem;
                    font-family: sans-serif;">       
                    </span>                              
                  </div>
                  
                </div> 
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" onclick="return confirm('Apakah data sudah benar dan lengkap?');">Submit</button>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
</script>
<script type="text/javascript">

  const actualBtn = document.getElementById('actual-btn');
  
  const fileChosen = document.getElementById('file-chosen');
  
  actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
  });
  </script>
</html>
