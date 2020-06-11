@extends('layouts.public')
@section('content')
    <!-- Swiper-->
    <section>
        <div class="swiper-container swiper-slider swiper-slider_fullheight bg-gray-dark" data-simulate-touch="false" data-loop="true" data-autoplay="5000">
            <div class="swiper-wrapper">

                @foreach($slider as $slide)
                    <div class="swiper-slide" data-slide-bg="{{'images/sliders/'.$slide->src}}">
                        <div class="swiper-slide-caption text-left">
                            <div class="container">
                                <div class="row justify-content-center justify-content-xxl-start">
                                    <div class="col-lg-10 col-xxl-6">
                                        <h1 data-caption-animate="fadeInUpSmall">{{$slide->title}}</h1>
                                        <h5 class="font-weight-normal" data-caption-animate="fadeInUpSmall" data-caption-delay="200">{{$slide->subtitle}}</h5><a class="button button-primary" data-caption-animate="fadeInUpSmall" data-caption-delay="350" href="{{$slide->btnLink}}">{{$slide->btnText}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Swiper Pagination-->
            <div class="swiper-pagination"></div>
            <!-- Swiper Navigation-->
            <div class="swiper-button-prev linear-icon-chevron-right"></div>
            <div class="swiper-button-next linear-icon-chevron-left"></div>
        </div>
    </section>

    <section class="section-xs section-cta bg-accent text-center text-md-left">
        <div class="container">
            <div class="row row-30 justify-content-between align-items-center">
                <div class="col-12 col-md-8">
                    <h4>{{$data->headerText}}</h4>
                </div>
                <div class="col-12 col-md-4 text-md-right"><a class="button button-primary" href="{{$data->btnWelcomeLink}}">{{$data->btnWelcomeText}}</a></div>
            </div>
        </div>
    </section>
    <!-- Impressive Features-->
    <section class="section-md bg-gray-lighter">
        <div class="container">
            <div class="row justify-content-md-center flex-lg-row-reverse align-items-lg-center justify-content-lg-between row-50">
                <div class="col-md-9 col-lg-6">
                    <h4 class="heading-decorated">چرا ما را انتخاب کنید</h4>

                    <!-- Blurb minimal-->
                    <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                            <div class="unit-left">
                                <div class="blurb-minimal__icon"><span class="icon linear-icon-rocket"></span></div>
                            </div>
                            <div class="unit-body">
                                <p class="blurb__title heading-6"><a href="#">{{$data->feature1}}</a></p>
                            </div>
                        </div>
                    </article>
                    <!-- Blurb minimal-->
                    <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                            <div class="unit-left">
                                <div class="blurb-minimal__icon"><span class="icon linear-icon-equalizer"></span></div>
                            </div>
                            <div class="unit-body">
                                <p class="blurb__title heading-6"><a href="#">{{$data->feature2}}</a></p>
                            </div>
                        </div>
                    </article>
                    <!-- Blurb minimal-->
                    <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                            <div class="unit-left">
                                <div class="blurb-minimal__icon"><span class="icon linear-icon-arrow-down-square"></span></div>
                            </div>
                            <div class="unit-body">
                                <p class="blurb__title heading-6"><a href="#">{{$data->feature3}}</a></p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-7 col-lg-5">
                    <figure class="image-sizing-1"><img src="{{asset('images/blog-image-1-886x668.jpg')}}" alt="" width="886" height="668">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- About us-->
    <section class="bg-default object-wrap">
        <div class="section-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="heading-decorated">تاریخچه ما</h4>
                        <p>{{$data->history}}</p>
                        <div class="row row-30">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <!-- Blurb minimal-->
                                <article class="blurb blurb-minimal">
                                    <div class="unit flex-row unit-spacing-md">
                                        <div class="unit-left">
                                            <div class="blurb-minimal__icon"><span class="icon linear-icon-menu3"></span></div>
                                        </div>
                                        <div class="unit-body">
                                            <p class="blurb__title heading-6"><a href="#">{{$data->historyFeature1}}</a></p>

                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <!-- Blurb minimal-->
                                <article class="blurb blurb-minimal">
                                    <div class="unit flex-row unit-spacing-md">
                                        <div class="unit-left">
                                            <div class="blurb-minimal__icon"><span class="icon linear-icon-users2"></span></div>
                                        </div>
                                        <div class="unit-body">
                                            <p class="blurb__title heading-6"><a href="#">{{$data->historyFeature2}}</a></p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <!-- Linear progress bar-->
                                <div class="progress-linear progress-linear-modern">
                                    <div class="progress-header">
                                        <p>سازندگان ذیصلاح</p><span class="progress-value">{{$data->mojritd}}</span>
                                    </div>
                                    <div class="progress-bar-linear-wrap">
                                        <div class="progress-bar-linear"></div>
                                    </div>
                                </div>
                                <!-- Linear progress bar-->
                                <div class="progress-linear progress-linear-modern">
                                    <div class="progress-header">
                                        <p>پروژه ها</p><span class="progress-value">{{$data->projecttd}}</span>
                                    </div>
                                    <div class="progress-bar-linear-wrap">
                                        <div class="progress-bar-linear"></div>
                                    </div>
                                </div>
                                <!-- Linear progress bar-->
                                <div class="progress-linear progress-linear-modern">
                                    <div class="progress-header">
                                        <p>ظرفیت موجود</p><span class="progress-value">{{$data->zarfiat}}</span>
                                    </div>
                                    <div class="progress-bar-linear-wrap">
                                        <div class="progress-bar-linear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url({{asset('images/bg-image-1.jpg')}});"></div>
    </section>
    <!-- Our Services-->
    <section class="section-md bg-gray-lighter text-center">
        <div class="container">
            <h4 class="heading-decorated">خدمات ما</h4>
            <div class="row row-50 justify-content-md-center justify-content-lg-start">
                @foreach($services as $service)
                <div class="col-md-6 col-xl-4">
                    <!-- Blurb circle-->
                    <article class="blurb blurb-minimal">
                        <div class="unit flex-row unit-spacing-md">
                            <div class="unit-left">
                                <div class="blurb-minimal__icon"><span class="{{ 'icon '.$service->icon }}"></span></div>
                            </div>
                            <div class="unit-body">
                                <p class="blurb__title heading-6"><a href="{{url('service').'/'.$service->id}}">{{$service->title}}</a></p>
                                <p>{{$service->subTitle}}</p>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--cta-->
    <!-- Call to Action-->
    <section class="section-md bg-accent bg-image text-center" style="background-image: url({{asset('images/bg-image-8.jpg')}});">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-11 col-lg-9 col-xl-8">
                    <h4 class="heading-decorated">{{$data->contactTitle}}</h4><a class="button button-primary" href="{{url('contactUs')}}">تماس با ما</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects-->
    <section class="section-lg bg-default text-center">
        <div class="container">
            <h4 class="heading-decorated">پروژه های ما</h4>
            <div class="row row-30">
                @foreach($projects as $project)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!-- Thumb creative-->
                    <div class="thumb-creative">
                        <div class="thumb-creative__inner">
                            <div class="thumb-creative__front">
                                <figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="{{asset('images/projects').'/'.$project->imgSrc}}" alt="" width="480" height="361">
                                </figure>
                                <div class="thumb-creative__content">
                                    <h6>{{$project->title}}</h6>
                                </div>
                            </div>
                            <div class="thumb-creative__back">
                                <figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="{{asset('images/projects').'/'.$project->imgSrc}}" alt="" width="480" height="361">
                                </figure>
                                <div class="thumb-creative__content">
                                    <h6 class="thumb-creative__title"><a href="{{url('projects').'/'.$project->id}}">{{$project->title}}</a></h6>
                                    <a class="button button-link" href="{{url('projects').'/'.$project->id}}">مشاهده پروژه</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Executive managers-->
    @if($managers_count > 0)
    <section class="section-md bg-default text-center">
        <div class="container">
            <h4 class="heading-decorated">ارکان انجمن</h4>
            <div class="row row-50">
                @foreach($managers as $manager)
                    <div class="col-md-4 col-lg-3">
                        <!-- Thumb flat-->
                        <article class="thumb-flat"><img class="thumb-flat__image" src="{{asset('images/avatars').'/'.$manager->picture}}" alt="" width="418" height="315">
                            <div class="thumb-flat__body">
                                <p class="heading-6"><a href="{{url('manager'.'/'.$manager->id)}}">{{$manager->name}}</a></p>
                                <p class="thumb-flat__subtitle">{{$manager->semat}}</p>
                                <p>{{substr($manager->description,0,50)}}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- get a quote-->
    <section class="bg-gray-lighter object-wrap">
        <div class="section-lg">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-5">
                        <h4 class="heading-decorated">ارتباط با ما</h4>
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
        </div>
        <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-left bg-image" style="background-image: url({{asset('images/bg-image-1.jpg')}});"></div>
    </section>
    <!-- Posts-->
    @if($articles_count > 0)
    <section class="section-md bg-default">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4 class="heading-decorated">اخبار جدید </h4>
                </div>
            </div>
            <div class="row row-60">
                <!-- Owl Carousel-->
                <div class="owl-carousel" data-items="1" data-sm-items="2" data-xl-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-margin="30" data-mouse-drag="true" data-loop="true" data-autoplay="true">
                    @foreach($articles as $article)
                        <div class="owl-item">
                            <!-- Post classic-->
                            <article class="post-classic post-minimal"><img src="{{asset('images/articles').'/'.$article->picture}}" alt="" width="418" height="315">
                                <div class="post-classic-title">
                                    <h6><a href="{{url('article').'/'.$article->id}}">{{$article->title}}</a></h6>
                                </div>
                                <div class="post-meta">
                                    <div class="group">
                                        <a href="{{url('article').'/'.$article->id}}">
                                            <time datetime="2017">{{verta($article->created_at)}}</time>
                                        </a><a class="meta-author" href="{{url('article').'/'.$article->id}}">توسط {{$article->user->name}}</a></div>
                                </div>
                                <div class="post-classic-body">
                                    <p>{!!$article->brief!!}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{--<!--testimonials-->
    <section class="section-lg bg-image context-dark text-center" style="background-image: url({{asset('images/bg-image-2.jpg')}});">
        <div class="container">
            <h4 class="heading-decorated">آنچه مردم می گویند</h4>
            <!-- Owl Carousel-->
            <div class="owl-carousel" data-items="1" data-stage-padding="15" data-loop="true" data-margin="30" data-dots="true" data-nav="true">
                <div class="item">
                    <!-- Quote default-->
                    <div class="quote-default">
                        <div class="quote-default__image"><img src="{{asset('images/benedict-arnold-120x120.jpg')}}" alt="" width="120" height="120">
                        </div>
                        <div class="quote-default__text">
                            <p class="q">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف</p>
                        </div>
                        <p class="quote-default__cite">جان اسنو</p>
                    </div>
                </div>
                <div class="item">
                    <!-- Quote default-->
                    <div class="quote-default">
                        <div class="quote-default__image"><img src="{{asset('images/benedict-arnold-120x120.jpg')}}" alt="" width="120" height="120">
                        </div>
                        <div class="quote-default__text">
                            <p class="q">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای</p>
                        </div>
                        <p class="quote-default__cite">تونی استارک</p>
                    </div>
                </div>
                <div class="item">
                    <!-- Quote default-->
                    <div class="quote-default">
                        <div class="quote-default__image"><img src="{{asset('images/benedict-arnold-120x120.jpg')}}" alt="" width="120" height="120">
                        </div>
                        <div class="quote-default__text">
                            <p class="q">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف</p>
                        </div>
                        <p class="quote-default__cite">جان اسنو</p>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

@endsection
