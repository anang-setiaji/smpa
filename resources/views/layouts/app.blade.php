<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMPA</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link href="assets_dashboard/style.css" rel="stylesheet" /> -->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background:url()">
<!-- <nav class="navbar navbar-default navbar-ststic-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('post.index')}}">Kelurahan Ranotana Weru</a>
    </div>
  </div>
</nav>
<div class="container"> -->
  <!-- <div class="panel panel-default">

  <div class="panel-heading" style="background-color:#000;height:60px;color:white">
<div class="col-md-10 col-md-offset-1" style="text-align:center;">

    <h4 style="font-weight:50">DATA PENDUDUK</h4>
</div>
</div>

<div class="panel-body">
    <div class="row">
      <div class="col-md-10 col-md-offset-1" style="text-align:center;">
<div class="container-fluid">
<br><br> -->
  @yield('content')
<!-- </div>
</div>
              </div>
            </div>
          </div>
        </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});


{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Post');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addPost',
      data: {
        '_token': $('input[name=_token]').val(),
        'nik': $('input[name=nik]').val(),
        'nama': $('input[name=nama]').val(),
        'gender': $('input[name=gender]').val(),
        'kk': $('input[name=kk]').val(),
        'alamat': $('input[name=alamat]').val(),
        'lingkungan': $('input[name=lingkungan]').val(),
        'kategori': $('input[name=kategori]').val()

      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.nik);
          $('.error').text(data.errors.nama);
          $('.error').text(data.errors.gender);
          $('.error').text(data.errors.kk);
          $('.error').text(data.errors.alamat);
          $('.error').text(data.errors.lingkungan);
          $('.error').text(data.errors.kategori);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          // "<td>" + data.id + "</td>"+
          "<td>" + data.nik + "</td>"+
          "<td>" + data.kk + "</td>"+
          "<td>" + data.nama + "</td>"+
          "<td>" + data.gender + "</td>"+
          "<td>" + data.alamat + "</td>"+
          "<td>" + data.lingkungan + "</td>"+
          "<td>" + data.kategori + "</td>"+
          "<td>" + data.created_at + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm'data-id='" + data.id + "' data-nik='" + data.nik + "'   data-kk='" + data.kk + "'data-nama='" + data.nama + "'data-gender='" + data.gender +"' data-alamat='" + data.alamat + "'data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "'  data-nik='" + data.nik + "' data-nama='" + data.nama + "'data-gender='" + data.gender + "' data-kk='" + data.kk + "'data-alamat='" + data.alamat + "'data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'> <span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'data-id='" + data.id + "' data-nik='" + data.nik + "' data-nama='" + data.nama + "'data-gender='" + data.gender +"' data-kk='" + data.kk + "'data-alamat='" + data.alamat + "'data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#nik').val('');
    $('#nama').val('');
    $('#gender').val('');
    $('#kk').val('');
    $('#alamat').val('');
    $('#lingkungan').val('');
    $('#kategori').val('');
  });

// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Update Post");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Post Edit');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#t').val($(this).data('nik'));
$('#b').val($(this).data('nama'));
$('#gen').val($(this).data('gender'));
$('#kx').val($(this).data('kk'));
$('#ala').val($(this).data('alamat'));
$('#lin').val($(this).data('lingkungan'));
$('#pen').val($(this).data('kategori'));

$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editPost',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'nik': $('#t').val(),
'nama': $('#b').val(),
'gender': $('#gen').val(),
'kk': $('#kx').val(),
'alamat': $('#ala').val(),
'lingkungan': $('#lin').val(),
'kategori': $('#pen').val(),

},
success: function(data) {
      $('.post' + data.id).replaceWith(" "+
      "<tr class='post" + data.id + "'>"+
      // "<td>" + data.id + "</td>"+
      "<td>" + data.nik + "</td>"+
      "<td>" + data.kk + "</td>"+
      "<td>" + data.nama + "</td>"+
      "<td>" + data.gender + "</td>"+
      "<td>" + data.alamat + "</td>"+
      "<td>" + data.lingkungan + "</td>"+
      "<td>" + data.kategori + "</td>"+
      "<td>" + data.created_at + "</td>"+
 "<td><button class='show-modal btn btn-info btn-sm'data-id='" + data.id + "'  data-nik='" + data.nik + "' data-kk='" + data.kk + "'data-nama='" + data.nama + "'data-gender='" + data.gender +"'data-alamat='" + data.alamat + "'data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'><span class='fa fa-eye'></span></button><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nik='" + data.nik + "'data-kk='" + data.kk + "' data-nama='" + data.nama + "'data-gender='" + data.gender + "'data-alamat='" + data.alamat + "'data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm'data-id='" + data.id + "'  data-nik='" + data.nik + "'data-kk='" + data.kk + "' data-nama='" + data.nama + "'data-gender='" + data.gender + "'data-alamat='" + data.alamat + "data-lingkungan='" + data.lingkungan + "'data-kategori='" + data.kategori + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
      "</tr>");
    }
  });
});


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete Post');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.nik').html($(this).data('nik'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deletePost',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
       $('.post' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#ti').text($(this).data('nik'));
  $('#by').text($(this).data('nama'));
  $('#ge').text($(this).data('gender'));
  $('#ky').text($(this).data('kk'));
  $('#al').text($(this).data('alamat'));
  $('#li').text($(this).data('lingkungan'));
  $('#pe').text($(this).data('kategori'));

  $('.modal-title').text('Show Post');
  });
</script>
</body>
</html>
