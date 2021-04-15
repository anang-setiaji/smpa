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
    <link rel="stylesheet" href="https://raw.githack.com/ridhowise/SiPA/master/public/assets_dashboard/style.css">

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

        <!-- <li><a href="#">CSS</a></li>
        <li><a href="#">Bootstrap</a></li> --> 
      </ul>
    </li>
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

          
          <li>
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
          <li class="active">
              <a href="/requesta"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Pengajuan</a>
          </li>
          <li  >
            <a href="/admin"><i class="fa fa-building" style="font-size:24px;color:white;opacity:0.5;"></i> SKPD</a>
        </li>
        <li >
          <a href="/aplikasi"><i class="fa fa-cogs" style="font-size:24px;color:white;opacity:0.5;"></i> Daftar Aplikasi</a>
      </li>
      <li>
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
                  <div class="panel-heading">Edit <b>{{ $request->aplikasi }}</b></div>
                  <div class="panel-body">
                      <form class="form-horizontal" action=""  method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="id" value="{{ $request->id }}">
                          
                          <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                              <div id="clockdiv">
                                <div><span id="day"></span><div class="smalltext">Hari</div></div>
                                <div><span id="hour"></span><div class="smalltext">Jam</div></div>
                                <div><span id="minute"></span><div class="smalltext">Menit</div></div>
                                <div><span id="second"></span><div class="smalltext">Detik</div></div>
                              </div>
                            </div>
                          </div>
                            
                     
                          
                        
                          <div id="checkbox">

                              @foreach ($request->requirements as $requirement)

                              <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <input type="hidden" name="ids[]" value="{{ $requirement->id }}">
                                <div class="col-sm-10">
                                <label class="contain"><h5>{{ $requirement->syarat }}</h5>
                                  @if($requirement->status === 'Done')
                                  <select name="select[]" style="pointer-events: none">
                                    <option {{$requirement->status === 'Done' ? 'selected' : ''}} value="Done">Done</option>
                                  </select>
                                  @else
                                  <select name="select[]">
                                    <option {{$requirement->status === 'Done' ? 'selected' : ''}} value="Done">Done</option>
                                    <option {{$requirement->status === 'On Progress' ? 'selected' : ''}} value="On Progress">On Progress</option>
                                    <option {{$requirement->status === 'To-Do' ? 'selected' : ''}} value="To-Do">To-Do</option>
                                  </select>
                                  @endif
                                {{-- @if($requirement->checkbox == 1)
                                  <input type="checkbox" name="checkbox[]" checked>
                                @else
                                  <input type="checkbox" name="checkbox[]">
                                @endif
                                  <span class="checkmark"></span>
                                </label> --}}
                              </div>
                              </div>
                              @endforeach
                              <br>
                            </div>
                              

                              
                          <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Submit</button>
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

      // Set the date we're counting down to
      var countDownDate = new Date("{{$request->countdown}} 00:00:00").getTime();
      
      // Update the count down every 1 second
      var x = setInterval(function() {
      
        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
          
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="countdown"
        document.getElementById("day").innerHTML = days ;
        document.getElementById("hour").innerHTML = hours ;
        document.getElementById("minute").innerHTML = minutes ;
        document.getElementById("second").innerHTML = seconds ;
          
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("clockdiv").innerHTML = 
          "Sudah lewat batas waktu";
          document.getElementById("clockdiv").style.color = "#000";
          document.getElementById("clockdiv").style.textAlign = "center";
          document.getElementById("checkbox").style.pointerEvents ="none";


        }
      }, 1);

</script>

</html>