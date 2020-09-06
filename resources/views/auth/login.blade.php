@extends('layouts.app')

@section('content')

<link rel="icon" href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/691b25cd-a6c2-4bc0-ae71-52c1d069a5ca/ddstsi0-7ea3f4d3-4297-4eb2-9260-3c7beb9edd36.png/v1/fill/w_894,h_894,strp/black_sipa_by_ridhoteamviny_ddstsi0-pre.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTI4MCIsInBhdGgiOiJcL2ZcLzY5MWIyNWNkLWE2YzItNGJjMC1hZTcxLTUyYzFkMDY5YTVjYVwvZGRzdHNpMC03ZWEzZjRkMy00Mjk3LTRlYjItOTI2MC0zYzdiZWI5ZWRkMzYucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.MhjhmRUiwxzBdn9ZapIL2ss7D6SFdu7zRwWvBNeX_gU" type="image/gif" sizes="16x16">
<div class="container">
    <div class="row" style="margin-top:23vh">
        
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default" style="height:0vh;width:auto;opacity: 1;">
                <div class="panel-heading" style="text-align: center;background-color:#337ab7;color:#fff">   
                    <img src="{{asset('assets_home/img/person.png')}}"
                    style="width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        position: absolute;
                        top: -50px;
                        left: calc(50% - 50px);">
                           
                    <img class="card-img-top" src="{{asset('assets_home/img/logo.png')}}" class="img-responsive" style="width:7%;opacity:0"/>
                    <h2> SMPA</h2>
                    <h4 style="opacity:0.8">Sistem Manajemen Pengembangan Aplikasi</h4>
                    {{-- <h5> Pemeritah Kabupaten Minahasa Tenggara </h5> --}}
                </div>                <div class="panel-body" style="margin-top: 5%; margin-bottom: 5%">
                    
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label"></label>

                            <div class="col-md-6 col-md-offset-3">
                                <input style="border:solid 2px #c0c0c0"placeholder="username" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom:5%;">
                            <label for="password" class="col-md-6 control-label"></label>

                            <div class="col-md-6 col-md-offset-3">
                                <input style="border:solid 2px #c0c0c0"placeholder="password" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>

                        
                        <div class="form-group">
                            {{-- <div class="col-md-4 col-md-offset-4"> --}}
                                <button type="submit" class="btn btn-primary  btn-block">
                                    Login
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
