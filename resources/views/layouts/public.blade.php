<!DOCTYPE html>
<html class="wide wow-animation" lang="fa" dir="rtl">

<head>
    <title>انجمن سازندگان مسکن و ساختمان</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <meta name="theme-color" content="#f6d014">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/square.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('style')
</head>
<body>
<div id="page-loader">
    <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
    </div>
</div>
<!-- Page-->
<div class="page">
    <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar_corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                 data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                 data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed"
                 data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static"
                 data-lg-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
                 data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"
                 data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="60px"
                 data-lg-stick-up-offset="145px" data-xl-stick-up-offset="145px" data-xxl-stick-up-offset="145px"
                 data-body-class="rd-navbar-corporate-linked">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand rd-navbar-static--hidden">
                        <a class="brand-name" href="{{url('/')}}"><img src="{{asset('images').'/'.$info->logoUrl}}" alt="" width="151"
                                                                       height="44"></a>
                    </div>
                </div>
                <!-- RD Navbar Top Panel-->
                <div class="rd-navbar-top-panel rd-navbar-top-panel_extended">
                    <div class="rd-navbar-top-panel__main">
                        <div class="rd-navbar-top-panel__toggle rd-navbar-fixed__element-1 rd-navbar-static--hidden"
                             data-rd-navbar-toggle=".rd-navbar-top-panel__main"><span></span></div>
                        <div class="rd-navbar-top-panel__content">
                            <div class="rd-navbar-top-panel__content-top">
                                <div class="rd-navbar-top-panel__left">
                                    <p>{{$info->welcomeText}}</p>
                                </div>
                                <div class="rd-navbar-top-panel__right">
                                    <ul class="rd-navbar-items-list">
                                        <li>
                                            <ul class="list-inline-xxs">
                                                @if(!auth()->check())
                                                    <li><a href="#" data-toggle="modal"
                                                           data-target="#modalLogin">ورود</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modalRegister">ثبت
                                                            نام</a></li>
                                                @else
                                                    <li><img src="{{asset('images/avatars').'/'.auth()->user()->avatar}}"
                                                             style="border-radius: 50%;border:1px solid #fefefe; max-height: 50px;margin: 0;padding: 0">
                                                    </li>
                                                    <li><a href="{{url('profile')}}">{{auth()->user()->name}}</a></li>
                                                    <li>
                                                        <form action="{{route('logout')}}" method="post">@csrf
                                                            <button type="submit" class="btn btn-link"
                                                                    style="padding: 11px 0;">خروج
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="list-inline-xxs">
                                                @foreach($socials as $social)
                                                    <li>
                                                        <a title="{{$social->name}}" class="icon icon-xxs icon-primary fa fa-{{$social->icon}}"
                                                           href="{{$social->url}}"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="rd-navbar-top-panel__content-bottom rd-navbar-content_middle rd-navbar-content_justify">
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand rd-navbar-fixed--hidden">
                                    <a class="brand-name" href="{{url('/')}}"><img
                                            src="{{asset('images').'/'.$info->logoUrl}}" alt="" width="250"
                                            height="60"></a>
                                </div>
                                <ul class="list-bordered">
                                    <li>
                                        <div class="unit flex-row align-items-center unit-spacing-sm">
                                            <div class="unit-left"><span
                                                    class="icon icon-md icon-primary linear-icon-map-marker"></span>
                                            </div>
                                            <div class="unit-body">
                                                <dl class="list-terms-modern">
                                                    <dt>آدرس</dt>
                                                    <dd><a href="#">{{$info->address}}</a></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit flex-row align-items-center unit-spacing-sm">
                                            <div class="unit-left"><span
                                                    class="icon icon-md icon-primary linear-icon-telephone"></span>
                                            </div>
                                            <div class="unit-body">
                                                <dl class="list-terms-modern">
                                                    <dt>تلفن ها</dt>
                                                    <dd>
                                                        <ul class="list-semicolon">
                                                            <li><a href="{{'tel:'.$info->tel}}"><span
                                                                        class="ltr-text d-inline-block">{{$info->tel}}</span></a>
                                                            </li>
                                                            <li><a href="{{'tel:'.$info->mobile}}"><span
                                                                        class="ltr-text d-inline-block">{{$info->mobile}}</span></a>
                                                            </li>
                                                        </ul>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit flex-row align-items-center unit-spacing-sm">
                                            <div class="unit-left"><span
                                                    class="icon icon-md icon-primary linear-icon-clock3"></span></div>
                                            <div class="unit-body">
                                                <dl class="list-terms-modern">
                                                    <dt>ساعات کاری</dt>
                                                    <dd>{{$info->time}}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rd-navbar-bottom-panel rd-navbar-search-wrap">
                    <!-- RD Navbar Nav-->
                    <div class="rd-navbar-nav-wrap rd-navbar-search_not-collapsable">
                        <ul class="rd-navbar-items-list rd-navbar-search_collapsable">
                            <li>
                                <button class="rd-navbar-search__toggle rd-navbar-fixed--hidden"
                                        data-rd-navbar-toggle=".rd-navbar-search-wrap"></button>
                            </li>
                        </ul>
                        <!-- RD Search-->
                        <div class="rd-navbar-search rd-navbar-search_toggled rd-navbar-search_not-collapsable">
                            <form class="rd-search" action="{{url('search')}}" method="GET">
                                <div class="form-wrap" style="margin-top: 0">
                                    <input class="form-input" id="rd-navbar-search-form-input" type="text" name="search"
                                           autocomplete="off">
                                    <label class="form-label" for="rd-navbar-search-form-input">عبارت مورد جستجو</label>
                                </div>
                                <button class="rd-search__submit" type="submit"></button>
                            </form>
                            <div class="rd-navbar-fixed--hidden">
                                <button class="rd-navbar-search__toggle" data-custom-toggle=".rd-navbar-search-wrap"
                                        data-custom-toggle-disable-on-blur="true"></button>
                            </div>
                        </div>
                        <div class="rd-navbar-search_collapsable">
                            <ul class="rd-navbar-nav">
                                <li class="active"><a href="{{url('/')}}">خانه</a></li>
                                @foreach($header_menus as $h_menu)
                                    @if($h_menu->parent != 0)
                                        <li>
                                            <a href="{{$h_menu->HeaderMenu->link}}">{{$h_menu->HeaderMenu->title}}</a>
                                            <ul class="rd-navbar-dropdown">
                                                @foreach(\App\HeaderMenu::where('parent',$h_menu->parent)->get() as $subMenu)
                                                    <li>
                                                        <a href="{{$subMenu->link}}">{{$subMenu->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @elseif($h_menu->sub==0)
                                        <li>
                                            <a href="{{$h_menu->link}}">{{$h_menu->title}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
@yield('content')
<!-- Page Footer -->
    <footer class="footer-modern">
        <div class="container">
            <div class="footer-modern__layer footer-modern__layer_top">

                <a class="brand" href="{{url('/')}}"><img src="{{asset('images').'/'.$info->logoUrl}}" alt="" width="250"
                                                          height="60"></a>
                <ul class="list-nav">
                    <li class="active"><a href="{{url('/')}}">خانه</a></li>
                    @foreach($footer_menus as $f_menu)
                        <li><a href="{{$f_menu->link}}">{{$f_menu->title}}</a></li>
                    @endforeach
                </ul>
                <ul class="list-inline-xxs footer-modern__list">
                    @foreach($socials as $social)
                        <li>
                            <a title="{{$social->name}}" class="icon icon-xxs icon-primary fa fa-{{$social->icon}}" href="{{$social->url}}"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-modern__layer footer-modern__layer_bottom">
                <p class="rights">{{$info->copyRight}}</p>
                <ul class="list-bordered">
                    <li>
                        <dl class="list-terms-minimal">
                            <dt>آدرس</dt>
                            <dd>{{$info->address}}</dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="list-terms-minimal">
                            <dt>تلفن ها</dt>
                            <dd>
                                <ul class="list-semicolon">
                                    <li><a href="{{'tel:'.$info->tel}}"><span
                                                class="ltr-text d-inline-block">{{$info->tel}}</span></a></li>
                                    <li><a href="{{'tel:'.$info->mobile}}"><span
                                                class="ltr-text d-inline-block">{{$info->mobile}}</span></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="list-terms-minimal">
                            <dt>ایمیل</dt>
                            <dd><a href="{{'mailto:'.$info->email}}">{{$info->email}}</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<!-- Modal login window-->
<div class="modal fade" id="modalLogin" role="dialog">
    <div class="modal-dialog modal-dialog_custom">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
            <button class="close" type="button" data-dismiss="modal"></button>
            <div class="modal-dialog__content">
                <h5>فرم ورود</h5>
                <!-- RD Mailform-->
                <form action="{{route('login')}}" method="post" class="rd-mailform rd-mailform_responsive">
                    @csrf
                    <div class="form-wrap form-wrap_icon linear-icon-barcode">
                        <input class="form-input" type="text" name="username" data-constraints="@Required" value="{{old('username')}}"
                               style="text-align: left">
                        <label class="form-label">نام کاربری</label>
                    </div>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-wrap form-wrap_icon linear-icon-lock">
                        <input class="form-input" type="password" name="password" data-constraints="@Required"
                               style="text-align: left">
                        <label class="form-label">رمز عبور </label>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="button button-primary" type="submit">ورود</button>
                </form>
                <ul class="list-small">
                    <li><a href="{{route('password.request')}}">رمز عبور خود را فراموش کرده اید؟</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal register window-->
<div class="modal fade" id="modalRegister" role="dialog">
    <div class="modal-dialog modal-dialog_custom">
        <!-- Modal content-->
        <div class="modal-dialog__inner">
            <button class="close" type="button" data-dismiss="modal"></button>
            <div class="modal-dialog__content">
                <h5>فرم ثبت نام</h5>
                <!-- RD Mailform-->
                <form class="rd-mailform rd-mailform_responsive" method="post" action="{{route('userRegister')}}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-wrap form-wrap_icon linear-icon-user">
                        <input class="form-input" type="text" name="name" placeholder="نام و نام خانوادگی" value="{{old('name')}}">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-barcode">
                        <input class="form-input" type="text" name="ncode" placeholder="کد ملی" value="{{old('ncode')}}">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-user">
                        <input class="form-input" type="text" name="username" placeholder="نام کاربری" value="{{old('username')}}">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-lock">
                        <input class="form-input" type="password" name="password" placeholder="رمز عبور شما">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-lock">
                        <input class="form-input" type="password" name="password_confirmation" placeholder="تایید رمز عبور">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-envelope">
                        <input class="form-input" type="text" name="email" placeholder="ایمیل" value="{{old('email')}}">
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-telephone">
                        <input class="form-input" type="text" name="mobile" placeholder="تلفن همراه" value="{{old('mobile')}}">
                    </div>
                    <button class="button button-primary" type="submit">ثبت نام</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Global Mailform Output -->
<div class="snackbars" id="form-output-global"></div>
<!-- PhotoSwipe Gallery-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="بستن"></button>
                <button class="pswp__button pswp__button--share" title="اشتراک گذاری"></button>
                <button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>
                <button class="pswp__button pswp__button--zoom" title="بزرگ/کوچک نمایی"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
            <button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__cent"></div>
            </div>
        </div>
    </div>
</div>
<!-- Javascript-->
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script>
    $(document).ready(function () {
        @if(\Session::has('type'))
        swal('{{\Session::get('msg')}}', ' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
        @endif
    })
</script>
@yield('script')
</body>

</html>
