@extends('layouts.public')
@section('content')

<section class="bg-gray-dark">
    <section class="section parallax-container" data-parallax-img="{{asset('images/parallax-1.jpg')}}"><div class="material-parallax parallax"><img src="{{asset('images/parallax-1.jpg')}}" alt="" style="display: block; transform: translate3d(-50%, 754px, 0px);"></div>
        <div class="parallax-content parallax-header">
            <div class="parallax-header__inner">
                <div class="parallax-header__content">
                    <div class="container">
                        <div class="row justify-content-sm-center">
                            <div class="col-md-10 col-xl-8">
                                <h2 class="heading-decorated">تماس با ما</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section class="section-md bg-default">
    <div class="container">
        <div class="row row-50">
            <div class="col-md-5 col-lg-4">
                <h4 class="heading-decorated">جزئیات تماس</h4>
                <ul class="list-sm contact-info">
                    <li>
                        <dl class="list-terms-inline">
                            <dt>آدرس</dt>
                            <dd>{{$contact_detail->address}}</dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="list-terms-inline">
                            <dt>تلفن ها</dt>
                            <dd>
                                <ul class="list-semicolon">
                                    <li><a href="{{'tel:'.$contact_detail->tel}}"><span class="ltr-text d-inline-block">{{$contact_detail->tel}}</span></a></li>
                                    <li><a href="{{'tel:'.$contact_detail->mobile}}"><span class="ltr-text d-inline-block">{{$contact_detail->mobile}}</span></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl class="list-terms-inline">
                            <dt>ساعات کاری</dt>
                            <dd>{{$contact_detail->time}}</dd>
                        </dl>
                    </li>
                    <li>
                        <ul class="list-inline-sm">
                            @foreach($social_icons as $icon)
                                <li>
                                    <a title="{{$icon->name}}" class="icon icon-xxs icon-primary fa fa-{{$icon->icon}}"
                                       href="{{$icon->url}}"></a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="heading-decorated">با ما در ارتباط باشید</h4>
                <!-- RD Mailform-->
                <form class="rd-mailform rd-mailform_style-1" method="post" action="{{url('sendMessage')}}">
                    @csrf
                    <div class="form-wrap form-wrap_icon linear-icon-man">
                        <input class="form-input" placeholder="نام شما" type="text" name="name">
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-wrap form-wrap_icon linear-icon-envelope">
                        <input class="form-input" placeholder="ایمیل شما" type="email" name="email">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-wrap form-wrap_icon linear-icon-telephone">
                        <input class="form-input" placeholder="تلفن شما" type="text" name="mobile">
                    </div>
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-wrap form-wrap_icon linear-icon-feather">
                        <textarea class="form-input" placeholder="پیام شما" name="body"></textarea>
                    </div>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="captcha">کد امنیتی</label> &nbsp;&nbsp;
                        <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                        @error('captcha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-wrap form-wrap_icon linear-icon-barcode">
                        <input class="form-input" placeholder="کد امنیتی" type="text" name="captcha">
                    </div>
                    <button class="button button-primary" type="submit">ارسال پیام</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        @if(\Session::has('type'))
        swal('{{\Session::get('msg')}}', ' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
        @endif
    })
</script>
@endsection
