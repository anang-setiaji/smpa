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
        <div class="panel-heading">Form Biodata Edit</div>
        <div class="panel-body">
            <form class="form-horizontal" action=""  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $profile->id }}">
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}">
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2">Jabatan:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jabatan" value="{{ Auth::user()->jabatan}}">
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="control-label col-sm-2">email:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="{{ $profile->email }}" >
                </div>
              </div> -->

                <!-- <div class="form-group">
                  <label class="control-label col-sm-2">Foto:</label>
                  <div class="col-sm-10">
                    <input type="file" name="{{ $profile->foto }}">
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
</body>
</html>
