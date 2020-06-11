@extends('layouts.public')
@section('content')

    <section class="section-sm bg-default">
        <div class="container post-single">
            <div class="post-single__header">
                <h4 class="heading-decorated heading-decorated_center">{{$article->title}}</h4>
                <div class="post-meta">
                    <div class="group">
                        <a href="#">
                            <time datetime="2017">{{verta($article->created_at)}}</time>
                        </a>
                        <a class="meta-author" href="{{url('search/author/').'/'.$article->user_id}}">
                            {{$article->user->name}}
                        </a>
                        <a href="{{url('search/author/').'/'.$article->user_id}}">@if($comment_count>0) {{$comment_count}} @else بدون @endif دیدگاه </a>&nbsp;&nbsp;
                        دسته بندی:
                        <ul class="list-inline-tag">
                            <li><a href="{{url('search/categories/').'/'.$article->category_id}}">{{$article->category->name}}</a></li>
                        </ul>
                        &nbsp;&nbsp;
                        برچسب ها
                        <ul class="list-inline-tag">
                            @foreach($article->tags as $tag)
                                <li><a href="{{url('search/tags/').'/'.$tag->id}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="post-single__body">
                <div class="figure-centered">
                    <a class="img-thumbnail-variant-1" href="{{asset('images/articles').'/'.$article->picture}}" data-photo-swipe-item="" data-size="800x600">
                        <figure><img src="{{asset('images/articles').'/'.$article->picture}}" alt="" width="800" height="600">
                        </figure>
                        <div class="caption"><span class="icon icon-lg linear-icon-magnifier"></span></div>
                    </a>
                </div>
                <br/>
                <br/>
                <div class="first-letter">{!! $article->body !!}</div>
                <br/>
                <br/>
                <br/>
                <br/>

            </div>
            <div class="post-single__aside">

                {{--<section class="section-sm">
                    <!-- Blurb minimal-->
                    <article class="blurb">
                        <div class="unit flex-sm-row unit-spacing-md">
                            <div class="unit__left"><img class="rounded-circle" src="images/post-author-109x109.jpg" alt="" width="109" height="109">
                            </div>
                            <div class="unit__body">
                                <h6 class="blurb__title">درباره نویسنده</h6>
                                <p class="small">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و</p>
                            </div>
                        </div>
                    </article>
                </section>--}}


                    @if($comment_count > 0)
                    <section class="section-sm">
                        <h5>{{$comment_count}}   دیدگاه   </h5>
                        @foreach($comments as $comment)
                            <div class="box-comment @if($comment->answer == 1) box-comment-reply @endif">
                                <div class="unit flex-sm-row unit-spacing-md">
                                    <div class="unit__left">
                                        {{--<div class="box-comment__icon"><span class="icon linear-icon-man"></span></div>--}}
                                        <img class="rounded-circle" src="{{asset('images/avatars').'/'.$comment->commenter->avatar}}" alt="" width="109" height="109">
                                    </div>
                                    <div class="unit__body">
                                        <div class="box-comment__body">
                                            <div class="box-comment__header">
                                                <div class="box-comment__header-left">
                                                    <p class="box-comment__title">{{$comment->commenter->name}}</p>
                                                    <time datetime="2017">{{verta($comment->created_at)}}</time>
                                                </div>
                                                {{--<div class="box-comment__header-right"><a href="#">پاسخ</a></div>--}}
                                            </div>
                                            <p>{{$comment->body}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                    @endif

                <section class="section-sm">
                    <h5>یک دیدگاه ارسال کنید</h5>
                    <!-- RD Mailform-->
                    @if(auth()->check())
                        <form class="rd-mailform rd-mailform_style-1 text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{url('article').'/'.$article->id.'/comment'}}" novalidate="novalidate">
                        @csrf
                        <div class="form-wrap form-wrap_icon linear-icon-feather">
                            <textarea class="form-input form-control-has-validation" placeholder="پیام شما" id="contact-message" name="body" data-constraints="@Required"></textarea><span class="form-validation"></span>
                        </div>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br/>
                        <div class="form-group">
                            <label for="captcha">کد امنیتی</label> &nbsp;&nbsp;
                            <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-wrap form-wrap_icon linear-icon-barcode">
                                <input class="form-input form-control-has-validation" placeholder="کد امنیتی" id="contact-name" type="text" name="captcha" data-constraints="@Required"><span class="form-validation"></span>
                            </div>
                        </div>
                        <button class="button button-primary" type="submit">ثبت دیدگاه</button>
                    </form>
                    @else
                        <h3 class="alert alert-info">برای ارسال دیدگاه باید وارد شوید ، <a href="{{url('login')}}"> ورود </a> </h3>
                    @endif
                </section>
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
