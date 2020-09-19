<!DOCTYPE html>
<html lang="en">
<head>
  <title>Input </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
          
        </li>
        <li>
            <a href="/request"><i class="fa fa-laptop" style="font-size:24px;color:white;opacity:0.5;"></i> Status Aplikasi</a>
        </li>
        <li >
          <a href="/chat"><i class="fa fa-comments" style="font-size:24px;color:white;opacity:0.5;"></i> Chat</a>
      </li>  
              


      </nav>


      <!-- Page Content  -->
      <div id="content">


        <nav class="navbar navbar-expand-lg navbar-light bg-light"  >
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
    
              
              <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">Form request</div>
                    <div class="panel-body">
                      @error('aplikasi')
                      <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Nama Aplikasi harap diisi</div>
                      @enderror
                      @error('penjelasan')
                      <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Penjelasan harap diisi</div>
                      @enderror
                      @error('lampiran')
                      <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Lampiran harap diisi</div>
                      @enderror
                      @error('countdown')
                      <div style="color:white;font-size:16px;border-radius:15px" class="alert alert-danger">Deadline harap diisi</div>
                      @enderror
                        <form class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                              <label class="control-label col-sm-2">Nama SKPD:</label>
                              <div class="col-sm-10">
                                <input type="text" style="width:400px; height:30px;"  name="nama" value="{{ Auth::user()->name}}" readonly>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="control-label col-sm-2">Nama Aplikasi:</label>
                              <div class="col-sm-10">          
                                <textarea class="form-control" name="aplikasi"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2">Penjelasan singkat:</label>
                              <div class="col-sm-10">          
                                <textarea class="form-control" name="penjelasan"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2">Lampiran (PDF):</label>
                              <div class="col-sm-10">          
                                <input type="file" name="lampiran">
                              </div>
                            </div> 
            
                            <div class="form-group">
                            <label class="control-label col-sm-2">Fitur :</label>
                             <div class="col-sm-10">          
                            <table class="col-sm-10" id="dynamic_field">  
                            <tr>  
                                    <td><input type="text" name="syarat[]" placeholder="" class="form-control name_list" /></td>  
                                    <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                                </tr> 
                            </table>
                          </div>
                                      </div> 
                          <div class="form-group">
                          <label class="control-label col-sm-2">Deadline: </label>
                          <div class="col-sm-10">          
                          <input type="date" name="countdown">
                          </div>
                          </div>
                           
                            
                            <!-- <div class="form-group">
                              <label class="control-label col-sm-2">Foto:</label>
                              <div class="col-sm-10">          
                                <input type="file" name="foto">
                              </div>
                            </div> -->
                            <div class="form-group">        
                              <div class="col-sm-offset-2 col-sm-10">
                                <button style="background-color:#337ab7;color:white;"type="submit" class="btn btn-default">Submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){      
                  var postURL = "<?php echo url('addmore'); ?>";
                  var i=1;  
            
            
                  $('#add').click(function(){  
                       i++;  
                       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="syarat[]" placeholder="" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
                  });  
            
            
                  $(document).on('click', '.btn_remove', function(){  
                       var button_id = $(this).attr("id");   
                       $('#row'+button_id+'').remove();  
                  });  
                  });  
            </script>
            

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

</html>