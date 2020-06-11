<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/skins/skin-blue.min.css')}}">
    @yield('style')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini">پنل</span>
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('images/avatars').'/'.auth()->user()->avatar}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('images/avatars').'/'.auth()->user()->avatar}}" class="img-circle" alt="User Image">
                                <p>
                                    {{auth()->user()->name}}
                                    <small>مدیر وب سایت</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#mdlchgpswd">تغییر رمز عبور</button>

                                </div>
                                <div class="pull-right">
                                    <form action="{{url('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-flat">خروج</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">پنل</li>
                <li class="active"><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> <span>داشبورد</span></a></li>
                <li class="header">مطالب</li>
                <li><a href="{{url('cp/categories')}}"><i class="fa fa-area-chart"></i> دسته بندی </a></li>
                <li><a href="{{url('cp/tags')}}"><i class="fa fa-tags"></i> تگ ها </a></li>
                <li><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مقاله ها </a></li>
                <li><a href="{{url('cp/pages')}}"><i class="fa fa-archive"></i> صفحات </a></li>
                <li><a href="{{url('cp/comments')}}"><i class="fa fa-comment"></i> نظرات </a></li>
                <li><a href="{{url('cp/messages')}}"><i class="fa fa-envelope"></i> پیام ها </a></li>
                <li class="header">سامانه</li>
                <li><a href="{{url('cp/registered')}}"><i class="fa fa-users"></i> <span>ثبت نامی ها</span></a></li>
                <li><a href="{{url('cp/mojrian')}}"><i class="fa fa-users"></i> <span>مجریان</span></a></li>
                <li><a href="{{url('cp/projects')}}"><i class="fa fa-calculator"></i> <span>پروژه ها</span></a></li>
                <li><a href="{{url('cp/services')}}"><i class="fa fa-server"></i> <span>خدمات</span></a></li>

                {{--<li><a href="{{url('cp/payments')}}"><i class="fa fa-dollar"></i> <span>پرداخت های آنلاین</span></a></li>--}}
                <li class="header">تنظیمات</li>
                <li><a href="{{url('cp/settings')}}"><i class="fa fa-gear"></i> <span>تنظیمات</span></a></li>
                <li><a href="{{url('cp/slider')}}"><i class="fa fa-sliders"></i> <span>اسلایدر</span></a></li>
                <li><a href="{{url('cp/socials')}}"><i class="fa fa-hacker-news"></i> <span>شبکه های اجتماعی</span></a></li>
                <li><a href="{{url('cp/headerMenu')}}"><i class="fa fa-list"></i> <span>منو بالا</span></a></li>
                <li><a href="{{url('cp/footerMenu')}}"><i class="fa fa-list"></i> <span>منو پایین</span></a></li>
            </ul>
        </section>
    </aside>
    @yield('content')
    <div class="modal modal-warning fade " id="mdlchgpswd" style="display: none">
        <div class="modal-dialog">
            <form action="{{url('chgPswrd')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">تغییر رمز عبور</h4>
                    </div>
                    <div class="modal-body">
                        <p>از برابری رمز عبور و تکرار آن اطمینان حاصل کنید</p>
                        <div class="form-group">
                            <label for="password">رمز عبور جدید</label>
                            <input type="password" name="password" class="form-control"
                                   placeholder="رمز عبور جدید ( حداقل 6 کاراکتر باشد )">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                        @enderror
                        <div class="form-group">
                            <label for="password_confirmation">تکرار رمز عبور
                                جدید</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control"
                                   placeholder="تکرار رمز عبور جدید">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                            <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">بستن
                            </button>
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <footer class="main-footer text-left">
        <strong> &copy; 2019 <a href="http://jpjavan.ir">تیم فنی سالمون</a> & <a href="http://jpjavan.ir">مجتبی
                مکوندی</a></strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        @if(\Session::has('type'))
            swal('{{\Session::get('msg')}}', ' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
        @endif
    })
</script>
@yield('script')

</body>
</html>
