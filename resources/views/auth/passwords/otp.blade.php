@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>
                <br>
                <br>
                <div class="card-header">
                    <h4 class="card-title"> بازیابی رمز عبور</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('checkOTP') }}">
                        @csrf
                        {{session('otp')}}
                        <div class="form-group row">
                            <label for="otp" class="col-md-4 col-form-label text-md-right">کد یکبار مصرف</label>

                            <div class="col-md-6">
                                <input id="otp" type="text" placeholder="کد یکبار مصرف" class="form-input @error('otp') is-invalid @enderror" name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تایید کد یکبار مصرف
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
