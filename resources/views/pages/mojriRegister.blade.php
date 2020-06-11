@extends('layouts.public')
@section('content')
    <section class="bg-gray-dark">
        <section class="section parallax-container" data-parallax-img="{{asset('images/bg-image-1.jpg')}}"><div class="material-parallax parallax"><img src="{{asset('images/bg-image-1.jpg')}} " alt="" style="transform: translate3d(-50%, 235px, 0px); display: block;"></div>
            <div class="parallax-content parallax-header">
                <div class="parallax-header__inner">
                    <div class="parallax-header__content">
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-md-10 col-xl-8">
                                    <h2 class="heading-decorated">عضویت در انجمن سازندگان <br/> مسکن و ساختمان استان خوزستان</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="section-md bg-default">
        <form action="{{url('newMojri')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-md-center row-10">
                    @if ($errors->any())
                        <div class="alert alert-danger col-md-9">
                            <ul style="columns: 3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row justify-content-md-center row-10">
                    <div class="col-md-3">
                        <label for="type">نوع عضویت</label>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox icheck" style="padding-right: 0">
                            <input type="radio" name="type" id="hoghooghi" value="1"> حقوقی&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="type" id="haghighi" value="0"> حقیقی
                        </div>

                    </div>
                </div>
                <div class="row justify-content-md-center row-10">
                    <div class="col-md-3">
                        <label for="name">نام و نام خانوادگی / نام شرکت </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-input" placeholder="نام و نام خانوادگی / نام شرکت" style="height: 40px" value="{{old('name')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center row-10">
                    <div class="col-md-3">
                        <label for="name">کد ملی / شناسه ملی</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="ncode" class="form-input" placeholder="کد ملی / شناسه ملی" style="height: 40px" value="{{old('ncode')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">شماره عضویت سازمان نظام مهندسی</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="ozviat" class="form-input" placeholder="شماره عضویت سازمان نظام مهندسی" style="height: 40px" value="{{old('ozviat')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">شماره پروانه</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="parvaneh" class="form-input" placeholder="شماره پروانه" style="height: 40px" value="{{old('parvaneh')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">شماره همراه</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="mobile" class="form-input" placeholder="شماره همراه" style="height: 40px" value="{{old('mobile')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        تلفن
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="tel" class="form-input" placeholder="تلفن" style="height: 40px" value="{{old('tel')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">آدرس</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="address" class="form-input" placeholder="آدرس" style="height: 40px" value="{{old('address')}}">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">ایمیل</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-input" placeholder="ایمیل" style="height: 40px" value="{{old('email')}}" >

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">اطلاعات فیش واریزی حق عضویت</div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره فیش</label>
                                    <input type="text" name="numFish" class="form-input" placeholder="شماره فیش" value="{{old('numFish')}}"/>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاریخ فیش</label>
                                    <input type="text" name="dtFish" class="form-input" placeholder="تاریخ فیش" value="{{old('dtFish')}}"/>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر روی پروانه</label>
                                    <input type="file" class="form-input" id="imgFile1" name="frontParvaneh" placeholder="تصویر روی پروانه" value="{{old('frontParvaneh')}}">

                                </div>
                                <img src="{{asset('images/nia.jpg')}}" id="imgPreview1" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر روی پروانه</label>
                                    <input type="file" class="form-input" id="imgFile2" name="backParvaneh" placeholder="تصویر روی پروانه" value="{{old('backParvaneh')}}">

                                </div>
                                <img src="{{asset('images/nia.jpg')}}" id="imgPreview2" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر فیش واریزی</label>
                                    <input type="file" class="form-input" id="imgFile3" name="fishBanki" placeholder="تصویر فیش واریزی" value="{{old('fishBanki')}}">

                                </div>
                                <img src="{{asset('images/nia.jpg')}}" id="imgPreview3" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">رمز عبور</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="password" class="form-input" style="height: 40px" placeholder="رمز عبور" >

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <label for="name">کد امنیتی</label>
                    </div>
                    <div class="col-md-6">
                        <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <input class="form-input" placeholder="کد امنیتی" type="text" name="captcha">

                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <button type="submit" class="button button-primary">ثبت نام</button>
                </div>
            </div>
        </form>

    </section>
@endsection
@section('script')
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#imgFile1").change(function () {
                readURL1(this);
            });
            $("#imgFile2").change(function () {
                readURL2(this);
            });
            $("#imgFile3").change(function () {
                readURL3(this);
            });
        });

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            @if(\Session::has('type'))
            swal('{{\Session::get('msg')}}', ' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
            @endif
        })
    </script>
@endsection
