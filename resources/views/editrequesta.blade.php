<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Form requesta Edit</div>
        <div class="panel-body">
            <form class="form-horizontal" action=""  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $requesta->id }}">
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $requesta->nama }}" readonly>
                  </div>
                </div>
               

                <div class="form-group">
                  <label class="control-label col-sm-2">Nama Aplikasi:</label>
                  <div class="col-sm-10">          
                    <textarea class="form-control" name="aplikasi">{{ $requesta->aplikasi }}</textarea>
                  </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Penjelasan Singkat:</label>
                    <div class="col-sm-10">          
                      <textarea class="form-control" name="penjelasan">{{ $requesta->penjelasan }}</textarea>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">Lampiran: (Word/PDF/Gambar)</label>
                      <div class="col-sm-10">          
                        <textarea class="form-control" name="lampiran">{{ $requesta->lampiran }}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">Deadline: </label>
                      <div class="col-sm-10">          
                      <input type="date" name="countdown">
                      </div>
                      </div>
                    @foreach ($requesta->requirements as $requirement)
                    <div class="form-group">
                      <label class="control-label col-sm-2">Syarat: </label>
                      <input type="hidden" name="ids[]" value="{{ $requirement->id }}">
                      <div class="col-sm-8">          
                        <textarea class="form-control" name="syarat[]">{{ $requirement->syarat }}</textarea>
                      </div>
                    </div>
                    @endforeach

                    {{-- <div class="form-group">
                      <label class="control-label col-sm-2">Syarat:</label>
                       <div class="col-sm-10">          
                      <table class="col-sm-10" id="dynamic_field">  
                      <tr>  
                              <td><input type="text" name="syarat[]" placeholder="" class="form-control name_list" /></td>  
                              <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                          </tr> 
                      </table>
                    </div>
                    </div>  --}}


                <!-- <div class="form-group">
                  <label class="control-label col-sm-2">Foto:</label>
                  <div class="col-sm-10">          
                    <input type="file" name="foto">
                  </div>
                </div> -->
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
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
</html>