<!DOCTYPE html>
<html lang="en">
<head>
  <title>Progress</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://rawcdn.githack.com/anang-setiaji/smpa/dec02092223f537e9b5100fed42309e3c1dbdcbc/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://36.67.25.4:8000/socket.io/socket.io.js"></script>

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
    @if(auth()->user()->jabatan == 'user')

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
        <li class="" >
            <a href="/request"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Status Aplikasi</a>
        </li>
        <li >
            <a href="/inputrequest"><i class="fa fa-plus-square" style="font-size:24px;color:white;opacity:0.5;"></i> Pengajuan Aplikasi</a>
            </li>
            <li >
            <a href="/inputaplikasi"><i class="fas fa-pen-square"style="font-size:24px;color:white;opacity:0.5;"></i> Input Aplikasi</a>
            </li>
        <li >
          <a href="/chat"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat</a>
      </li>    

              


      </nav>
      @else 
    
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
        @endif
      <!-- Page Content  -->
      <div id="content" style="min-height:120vh">


        <nav class="navbar navbar-expand-lg navbar-light bg-light"  >
              <div class="container-fluid">
                <span class="caret"></span></a><a href="{{ url()->previous() }}" class="btn btn-default"><i class="fa fa-arrow-left" style="color:black"></i> Back </a>

                  <button type="button" id="sidebarCollapse" class="btn btn-default">
                      <i class="fa fa-align-left"></i>
                                        </button>

              </div>
            </nav>


<br>


    <div class="request">
<div class="container-fluid">
    @if(Session::has('alert'))
    <div class="alert alert-{{Session::get('style')}} alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>    
        <strong>{{Session::get('alert')}}</strong>{{Session::get('msg')}}
    </div>
    @endif

    
    

     
        <?php 
            $currentChecked = 0;
            foreach($request->requirements as $r) {
              if($r->status === 'Done') {
                $currentChecked++;
              }
            }
            $total = count($request->requirements);
            $percentage = ($currentChecked/$total) * 100;
            
        ?>
       
      <div class="col-sm-12">
        <div class="app-card" style="padding:0px">
          <div class="container-card" style="height:500px">
            <a href="#"><img style="width:187px" src="../uploads/smpa.png" alt="cover" class="cover" /></a>
            <div class="hero">         
              <div class="details">
                <div class="title1"><i class="fa fa-cogs" style="font-size:40px;color:white;"></i> {{ $request->aplikasi }}</div>
                <div class="title2">{{ $request->nama }}</div> 
                  
                
              </div> <!-- end details -->
            </div> <!-- end hero -->
            <div class="description">
              <div class="column1">
                
                <a href="http://{{$request->link}}" type="button" class="btn btn-primary btn-lg btn-block">LINK DEMO</a>
              
                <div></div>
               
              </div> <!-- end column1 -->
              <div class="column2">
                @if ($request->maintenance == 'MAINTENANCE')
            <a href="" type="button" class="btn btn-danger" style="pointer-events:none">MAINTENANCE</a>
            @elseif ($request->maintenance == 'ACTIVE')
            <a href="" type="button" class="btn btn-success"  style="pointer-events:none" >Aktif</a>
            @elseif ($request->maintenance == 'NOT ACTIVE')
            <a href="" type="button" class="btn btn-secondary"  style="pointer-events:none" >Tidak Aktif</a>
            <br>
           
            Alasan tidak aktif : {{$request->alasan}} <br> Tanggal tidak aktif : {{$request->kapan}}
            
            @else
            <a href="" type="button" class="btn btn-danger">ON PROGRESS</a>
            @endif 
                <br><br>
                TOTAL PROGRESS
                @if($percentage > 0)
                <div class="w3-section w3-grey">
                <div class="w3-container w3-padding-small w3-indigo w3-center" style="width:{{$percentage}}%">{{$percentage}}%</div>
                </div>
               @else
               <div class="w3-section w3-grey">
                <div class="w3-container w3-padding-small w3-grey w3-center" style="width:{{$percentage}}%">{{$percentage}}%</div>
                </div>
               @endif
              </div> <!-- end column2 -->
            </div> <!-- end description -->
          </div> <!-- end container -->
        </div> <!-- end card -->
        @if($request->hapus === 1)
        <div class="col-sm-12" style="background-color:#192a56;color:white;text-align:center;padding:30px">
         <h3>PENGAJUAN PENGHAPUSAN APLIKASI OLEH PROGRAMMER </h3>
         <br>
         <div class="btn-group">
           <a href="../hapusrequest/{{ $request->id }}"type="button" class="btn btn-danger">HAPUS <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
         </div>
         <div class="btn-group">
           <a href="../cancel/{{ $request->id }}"type="button" class="btn btn-info">TOLAK  </span></a>
         </div>
       </div>
       @else 
       @endif
      </div>
      <div id="checkbox">
          <div class="col-sm-12">
          <div class="container-fluid">                  
        <div class="table-responsive">
          <table style="background-color:white" class="table table-bordered table-hover">

            <thead>
              <tr>
                <!-- {{-- <th>Nama SKPD</th> --}} -->
                <th style="">Fitur</th>

                <th style="">Komentar</th>
                <th style="width:240px;text-align:center">Status {{$done}}</th>

              </tr>
            </thead>
          <tbody>
          @foreach ($request->requirements as $requirement)
          <tr>
          <td>
          <div class="form-group">
            <label class="control-label col-sm-2"></label>
            <input type="hidden" name="ids[]" value="{{ $requirement->id }}">
            <div class="col-sm-10">
            <label class="contain"><h4>{{ $requirement->syarat }}  </h4>

              {{-- <span class="checkmark"></span> --}}
            </label>
          </div>
          </div>
          </td>
          <td>
            @if(auth()->user()->jabatan === 'user' )
          <a href="../comment/{{ $requirement->id }}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></a>
        @else
        @endif
            {{$requirement->comment}} 
          
        </td>
          @if ($requirement->status === 'On Progress') 
          <td style="background-color:#F7CA18;text-align:center">
          <h4 style="color:white;"> {{$requirement->status}}</h4>
          </td> 
          @elseif ($requirement->status === 'Done')
          <td style="background-color:#03C674;text-align:center">
            <h4 style="color:white">{{$requirement->status}}</h4>
          </td>
          @else 
          <td style="background-color:#e74c3c;text-align:center">
            <h4 style="color:white">{{$requirement->status}}</h4>
          </td>
          
            @endif
          </td>
        </tr>

          @endforeach
          <br>
        
        
          
        </div>
      </tbody>
    </div>
</table>
</div>
</div>

</div>
 
<div class="request">
           
<div class="col-md-6">
  <div class="container-fluid">
    
  <div class="centers">

@if($request->status == 1)
  <div class="card" style="width:100%;height:350px">
    <div class="additional">
      <div class="user-card">
        <div class="percent center">
          Statistik
        </div>             
      </div>
      <div class="more-info">
        <h3 style="color:white">Fitur</h3>
        
        @foreach ($request->requirements as $requirement)
        <div class="coords">
        <label class="contain"><h4>{{ $requirement->syarat }}</h4>
                        
        </div>
        @endforeach
       
      </div>
    </div>
    <div class="general" style="right:35%">

      <div style="width: 500px;height: 500px;margin-top:50px">
        <canvas id="myChart"></canvas>
    </div>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["TO-DO", "ON PROGRESS", "DONE"],
				datasets: [{
					label: '# Progress',
					data: [{{$todo}}, {{$onprogress}},{{$done}}],
					backgroundColor: [
					'#e74c3c',
					'#F7CA18',
					'#03C674'
					
					],
					borderColor: [
					'#8b0000',
					'#FFFF00',
					'#006400'
					
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
</script>
    </div>
  </div>
 

  @else
    <div></div>
    @endif
    
        
  
              <div>
            </div>
            </div>
        
    </div>
</div>

@if($percentage < 100)
  <div class="col-md-6" style="padding:30px">
  <div id="clockdiv" style="width:100%;height:330px;background-color:white;padding:70px;font-size:70px">
    <div><span id="day"></span><div class="smalltext">Hari</div></div>
    <div><span id="hour"></span><div class="smalltext">Jam</div></div>
    <div><span id="minute"></span><div class="smalltext">Menit</div></div>
    {{-- <div><span id="second"></span><div class="smalltext">Detik</div></div> --}}
  </div>
</div>
@else
<div></div>
@endif
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
})
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
          document.getElementById("day").innerHTML = "0" ;
          document.getElementById("hour").innerHTML = "0" ;
          document.getElementById("minute").innerHTML = "0" ;
          document.getElementById("second").innerHTML = "0" ;
        }
      }, 1);
    
</script>

</html>
