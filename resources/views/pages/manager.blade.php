@extends('layouts.public')
@section('content')
    <section class="bg-gray-dark">
        <section class="section parallax-container" data-parallax-img="images/parallax-1.jpg"><div class="material-parallax parallax"><img src="{{asset('images/parallax-1.jpg')}}" alt="" style="display: block; transform: translate3d(-50%, 777px, 0px);"></div>
            <div class="parallax-content parallax-header">
                <div class="parallax-header__inner">
                    <div class="parallax-header__content">
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-md-10 col-xl-8">
                                    <h2 class="heading-decorated">{{$manager->semat}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="section-lg bg-default">
        <div class="container">
            <!-- Profile Corporate-->
            <article class="profile-corporate"><img class="profile-corporate__image" src="{{asset('images/avatars').'/'.$manager->picture}}" alt="" width="980" height="980">
                <div class="profile-corporate__caption">
                    <h3 class="profile-corporate__title">{{$manager->name}}</h3>
                    <h4 class="profile-corporate__title text-left">سوابق تحصیلی:</h4>
                    <h6 class="profile-corporate__title text-left">{{$manager->tahsilat}}</h6>
                    <h4 class="profile-corporate__title text-left">سوابق حرفه ای:</h4>
                    <h6 class="profile-corporate__title text-left">{{$manager->savabegh}}</h6>
                    <p class="text-justify">{{$manager->description}}</p>
                </div>
            </article>
        </div>
    </section>
    <section class="section-lg bg-default text-center">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-lg-10 col-xl-8">
                    <!-- RD Mailform-->
                    <h3>ارسال پیام به {{$manager->semat}}</h3>
                    <hr>
                    <form class="rd-mailform rd-mailform_style-1" method="post" action="{{url('sendMessage')}}">
                        @csrf
                        <input type="hidden" value="{{$manager->id}}" name="manager_id">
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
