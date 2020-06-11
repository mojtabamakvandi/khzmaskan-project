@extends('pages.profile')
@section('profile')
    <h3>تغییر رمز عبور</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('profile/changePassword')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>رمز عبور فعلی</label>
                    <input type="password" name="oldpass" class="form-input" placeholder="رمز عبور فعلی">
                </div>
                <div class="form-group">
                    <label>رمز عبور جدید</label>
                    <input type="password" name="password" class="form-input" placeholder="رمز عبور جدید">
                </div>
                <div class="form-group">
                    <label>تکرار رمز عبور جدید</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="تکرار رمز عبور جدید">
                </div>

                <br>
                <br>
                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input" placeholder="کد امنیتی">
                </div>

                <button type="submit" class="button button-primary">تغییر رمز عبور</button>
            </form>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="text-center">
                <i class="fa fa-5x fa-lock"></i>
            </div>

        </div>
    </div>
@endsection
