<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengajuan Aplikasi</title>
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
    <link href="assets_dashboard/style.css" rel="stylesheet" />

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
      <a class="navbar-brand" href="#"><img src="assets_dashboard/img/logo.png"></a>
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
    <div class="panel panel-default">
        <div class="panel-heading">List Data &nbsp;
        <a href="inputrequest" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Input Request</a>
        <a href="inputaplikasi" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Input Aplikasi</a>
  
      </div>
        <div class="panel-body">
        <div class="row">
           <div class="col-md-12">
            <div class="container-fluid">
              
              <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">

                <thead>
                  <tr>
                    <!-- {{-- <th>Nama SKPD</th> --}} -->
                    <th>Nama Aplikasi</th>
                    <th>Status</th>
                    <!-- <th>Penjelasan</th>
                    <th>Lampiran</th> -->
                    <th>Keterangan</th>
                    <th>Mulai</th>
                    <th>Deadline</th>
<!--                     <th>statuss</th>
 -->                <th>Link</th>
                    <th>Programmer</th>


                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                @foreach ($requ as $row)
                  <tr>
                    <!-- {{-- <td>{{ $row->nama }}</td> --}} -->
                    <td>{{ $row->aplikasi }}</td>
                    <td>
                      @if ($row->status === '0') 
                      <button type="button" class="btn btn-danger">Ditolak</button>
                      @elseif ($row->status === '1') 
                      <div class="btn-group">
                          <button type="button" class="btn btn-success">Diterima</button>
                          <a href="{{ url('uploads')}}/{{$row ->surat }}" download="{{$row->surat}}">
                            <button type="button" class="btn btn-primary">
                              <i class="glyphicon glyphicon-download">
                                
                              </i>
                          </a>
                        </button>
                        @if ($row->maintenance == 'MAINTENANCE')
                         <a href="" type="button" class="btn btn-danger">Maintenance</a>
                         @elseif ($row->maintenance == 'ACTIVE')
                         <a href="" type="button" class="btn btn-success">Active</a>
                         @elseif ($row->maintenance == 'NOT ACTIVE')
                         <a href="" type="button" class="btn btn-secondary">Not Active</a>
                         @endif
                          @elseif ($row->status === '2') 
                          <button type="button" class="btn btn-primary">Existed</button>
                        </button>
                        @if ($row->maintenance == 'MAINTENANCE')
                         <a href="" type="button" class="btn btn-danger">Maintenance</a>
                         @elseif ($row->maintenance == 'ACTIVE')
                         <a href="" type="button" class="btn btn-success">Active</a>
                         @elseif ($row->maintenance == 'NOT ACTIVE')
                         <a href="" type="button" class="btn btn-secondary">Not Active</a>
                         @endif
                      @else
                      <button class="buttonload"><i class="fa fa-spinner fa-spin"></i> Menunggu Persetujuan</button>
                      @endif
                    </td>
                    
                    <td>  
                    @if ($row->status === '1'  and $row->hapus === null)  
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-default"><i class="fa fa-eye" style="color:black"></i> Lihat Detail </a>
                    </div>
                    @elseif ($row->status === '1' and $row->hapus === 0)  
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-default"><i class="fa fa-eye" style="color:black"></i> Lihat Detail </a>
                    </div>
                    @elseif ($row->status === '1' and $row->hapus === 1) 
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-danger">Pengajuan Hapus Aplikasi</a>
                    </div>
                    @elseif ($row->status === '2'  and $row->hapus === null)  
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-default"><i class="fa fa-eye" style="color:black"></i> Lihat Detail </a>
                    </div>
                    @elseif ($row->status === '2' and $row->hapus === 0)  
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-default"><i class="fa fa-eye" style="color:black"></i> Lihat Detail </a>
                    </div>
                    @elseif ($row->status === '2' and $row->hapus === 1) 
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-danger">Pengajuan Hapus Aplikasi</a>
                    </div>
                    @elseif ($row->status === '0' and $row->hapus === null) 
                    {{ $row->keterangan }}
                    @elseif ($row->status === '0' and $row->hapus === 0) 
                    {{ $row->keterangan }}
                    @elseif ($row->status === '0' and $row->hapus === 1) 
                    <div class="btn-group">
                      <a href="proses/{{ $row->id }}" type="button" class="btn btn-danger">Pengajuan Hapus Aplikasi</a>
                    </div>
                    @else
                    <p>-</p>
                    @endif 
                    </td>
                    @if($row->status === '2')
                    <td>-</td>
                    @else
                    <td>{{ $row->created_at->format('Y-m-d')}}</td>
                    @endif
                    @if($row->status === '2')
                    <td>-</td>
                    @else
                    <td>{{ $row->countdown }}</td>
                    @endif

                    <td>  
                      @if ($row->link !== null) 
                      <div class="btn-group">
                        <a href="http://{{ $row->link }}" type="button" class="btn btn-primary">Link </a>
                      </div>
                      
                      @else
                      <p>-</p>
                      @endif 
                      </td>
                      <td> 
                      
                      {{$row->admin_name}}
                      <div class="btn-group">
                        <button onclick="openForm({{$row->admin_id}})" type="button" class="btn btn-success" ><i class="fa fa-comments" style="color:white"></i></button>
                      </div>
                    </td>

                <td>
                        <div class="btn-group">
                          @if($row->maintenance != null)
                          <a href="{{ url('editaplikasi')}}/{{$row ->id }}" type="button" class="btn btn-primary"><i class= "fa fa-pencil" ></i></a>
                          @else
                          @endif
                          {{-- <a href="editrequesta/{{ $row->id }}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> --}}
                          <a href="hapusrequest/{{ $row->id }}"type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                </div>
            </table>
            </div>
            </div>
            </div>
            </div>
        </div>
        <div style="text-align:center">
        {{ $requ->links() }}
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
