@extends('layouts.auth')
@section('content')
    <div class="login-box-body">
        <h3 class="login-box-msg">ورود</h3>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <label for="">نام کاربری</label>
                <input type="text" class="form-control" name="username" >
                <span class="fa fa-envelope form-control-feedback" style="color: #1a2226"></span>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <label for="">رمز عبور</label>
                <input type="password" class="form-control" name="password">
                <span class="fa fa-lock form-control-feedback" style="color: #1a2226"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" id="remember"> مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">ورود</button>
                    <br/>
                </div>
            </div>
        </form>
    </div>
@endsection
