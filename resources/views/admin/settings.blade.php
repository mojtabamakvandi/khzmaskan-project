@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                تنظیمات
                <small>تنظیمات اصلی سایت</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="#"><i class="fa fa-cog"></i> تنظیمات</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{url('cp/settings')}}" method="post">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">تنظیمات اصلی سایت</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>تلفن</label>
                                            <input type="text" class="form-control" name="tel"
                                                   value="{{$settings->tel}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>موبایل</label>
                                            <input type="text" class="form-control" name="mobile"
                                                   value="{{$settings->mobile}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ایمیل</label>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{$settings->email}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>آدرس</label>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{$settings->address}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>زمان</label>
                                            <input type="text" class="form-control" name="time"
                                                   value="{{$settings->time}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>متن خوش آمد گویی</label>
                                            <input type="text" class="form-control" name="welcomeText"
                                                   value="{{$settings->welcomeText}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>متن سر تیتر</label>
                                            <input type="text" class="form-control" name="headerText"
                                                   value="{{$settings->headerText}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ویژگی 1</label>
                                            <input type="text" class="form-control" name="feature1"
                                                   value="{{$settings->feature1}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ویژگی 2</label>
                                            <input type="text" class="form-control" name="feature2"
                                                   value="{{$settings->feature2}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ویژگی 3</label>
                                            <input type="text" class="form-control" name="feature3"
                                                   value="{{$settings->feature3}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>تاریخچه</label>
                                            <input type="text" class="form-control" name="history"
                                                   value="{{$settings->history}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ویژگی 1 تاریخچه</label>
                                            <input type="text" class="form-control" name="historyFeature1"
                                                   value="{{$settings->historyFeature1}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ویژگی 2 تاریخچه</label>
                                            <input type="text" class="form-control" name="historyFeature2"
                                                   value="{{$settings->historyFeature2}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>تعداد مجری</label>
                                            <input type="text" class="form-control" name="mojritd"
                                                   value="{{$settings->mojritd}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>تعداد پروژه</label>
                                            <input type="text" class="form-control" name="projecttd"
                                                   value="{{$settings->projecttd}}"/>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>تیتر تماس با ما</label>
                                            <input type="text" class="form-control" name="contactTitle"
                                                   value="{{$settings->contactTitle}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>متن کلید خوش آمد گویی</label>
                                            <input type="text" class="form-control" name="btnWelcomeText"
                                                   value="{{$settings->btnWelcomeText}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>لینک دکمه خوش آمد گویی</label>
                                            <input type="text" class="form-control" name="btnWelcomeLink"
                                                   value="{{$settings->btnWelcomeLink}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>متن کپی رایت</label>
                                            <input type="text" class="form-control" name="copyRight"
                                                   value="{{$settings->copyRight}}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>ظرفیت</label>
                                            <input type="text" class="form-control" name="zarfiat"
                                                   value="{{$settings->zarfiat}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success">ثبت و بروزرسانی</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="{{url('cp/uploadLogo')}}" method="post" enctype="multipart/form-data"
                          accept-charset="UTF-8">
                        @csrf
                        <div class="box box-danger">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">لوگو انجمن</h3>
                            </div>
                            <div class="box-body">
                                <br/>
                                <br/>
                                <img id="imgPreview" src="{{asset('images').'/'.$settings->logoUrl}}"
                                     class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>فایل لوگو (PNG)</label>
                                    <input type="file" id="imgFile" name="logo" class="form-control"/>
                                </div>
                            </div>
                            <div class="box-footer text-left">
                                <button type="submit" class="btn btn-primary">آپلود و بروزرسانی</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#imgFile").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
