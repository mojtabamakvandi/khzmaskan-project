@extends('pages.profile')
@section('profile')
    <h3>اطلاعات کاربری</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('profile/user/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <lable>نام و نام خانوادگی / نام شرکت</lable>
                    <input type="text" name="name" class="form-input" placeholder="نام و نام خانوادگی / نام شرکت" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <lable>کد ملی / شناسه ملی</lable>
                    <input type="text" name="ncode" class="form-input" placeholder="کد ملی / شناسه ملی" value="{{$user->ncode}}">
                </div>
                <div class="form-group">
                    <lable>ایمیل</lable>
                    <input type="text" name="email" class="form-input" placeholder="ایمیل" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <lable>تلفن همراه</lable>
                    <input type="text" name="mobile" class="form-input" placeholder="تلفن همراه" value="{{$user->mobile}}">
                </div>
                <div class="form-group">
                    <lable>نام کاربری</lable>
                    <input type="text" name="username" class="form-input" placeholder="نام کاربری" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <lable>تصویر پروفایل</lable>
                    <input type="file" name="avatar" class="form-input" id="imgFile">
                </div>

                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input" placeholder="کد امنیتی">
                </div>

                <button type="submit" class="button button-primary">بروزرسانی</button>
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
            <img src="{{asset('images/nia.jpg')}}" id="imgPreview" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#imgPreview").hide();
            $("#imgFile").change(function () {
                readURL(this);
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imgPreview").fadeIn();
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
