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
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="https://smpa-chat.herokuapp.com/socket.io/socket.io.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://rawcdn.githack.com/ridhowise/SiPA/3a0d4b873f5d5db84f4ee86a01914ff9cc8d139f/style.css">

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
      <a class="navbar-brand" href="#"><img src="https://rawcdn.githack.com/ridhowise/SiPA/6784f72a4be2f11859329ec81de5d49609acbfde/public/assets_dashboard/img/logo.png"></a>
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
        <li><a style="background-color:#162e46" href="{{ route('logout') }}" onclick="
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

          
          <li  >
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
        <li class="active" >
            <a href="/request"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Status Aplikasi</a>
        </li>
        <li >
          <a href="/chat"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat           
            <span class="badge unread-indicator" style="background-color:red;font-size:15px;width:20px;height:20px"></span>
          </a>

      </li>
              


      </nav>

      <!-- Page Content  -->
      <div id="content">


        <nav class="navbar navbar-expand-lg navbar-light bg-light"  >
              <div class="container-fluid">
                

                  <span class="caret"></span></a><a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" style="color:black"></i> Back </a>

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
    
              
              <div class="container-fluid">
                <div class="panel panel-default">
                  <div class="panel-heading">Ubah Password</div>
                  <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            {{-- <h3>Change Password</h3> --}}
                            <div class="col-md-12">
                                @if (session('status'))
                                    <p class="alert alert-success">{{ session('status') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                                <form class="form-horizontal" method="POST" action="{{url('password/change')}}">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                        <label for="current_password">Password lama</label>
                                        <input id="current_password" type="password" class="form-control" name="current_password" required placeholder="Masukkan password lama">
                                        @if ($errors->has('current_password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                     
                                    <div class="form-group">
                                        <label for="password">Password baru</label>
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password baru">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                     
                                    <div class="form-group">
                                        <label for="password-confirm">Konfirmasi Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                     
                                    <div class="form-group">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
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

<script type="text/javascript">
  $(document).ready(function () {
      const socket = io('https://smpa-chat.herokuapp.com');
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
  
  // function openForms() {
  //   document.getElementById("myForm").style.display = "block";
  // }
  </script>

</html>
