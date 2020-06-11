@extends('layouts.public')
@section('content')
    <section class="bg-gray-dark">
        <section class="section parallax-container" data-parallax-img="{{asset('images/parallax-3.jpg')}}"><div class="material-parallax parallax"><img src="{{asset('images/parallax-3.jpg')}}" alt="" style="transform: translate3d(-50%, 315px, 0px); display: block;"></div>
            <div class="parallax-content parallax-header">
                <div class="parallax-header__inner">
                    <div class="parallax-header__content">
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-md-10 col-xl-8">
                                    <h2 class="heading-decorated">اخبار و اطلاعیه ها</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="bg-default section-md">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4 class="heading-decorated">خبر ها و اطلاعیه های انجمن </h4>
                </div>
            </div>
            <div class="row row-70">
                <div class="col-lg-5 col-xl-4 section-divided__aside section-divided__aside-left">
                    <!-- Search-->
                    <section class="section-sm section-style-1">
                        <h6>جستجو</h6>
                        <!-- RD Search-->
                        <form class="rd-search rd-mailform-inline-flex text-center" action="{{url('search')}}" method="GET">
                            <div class="form-wrap form-wrap_icon linear-icon-magnifier">
                                <label class="form-label rd-input-label" for="rd-search-form-input">عبارت مورد جستجو</label>
                                <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                            </div>
                            <button class="button button-primary" type="submit">برو!</button>
                        </form>
                    </section>

                    <!-- Categories-->
                    <section class="section-sm">
                        <h6>دسته بندی ها</h6>
                        <ul class="list-xxs small">
                            @foreach($categories as $category)
                                <li><a href="{{url('search/categories').'/'.$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </section>

                    <!-- Posts-->
                    <section class="section-sm">
                        <h6>آخرین مطالب</h6>
                        <ul class="list-sm">
                            @foreach(\App\Article::orderBy('id','desc')->take(3)->get() as $art)
                                <li>
                                    <!-- Post inline-->
                                    <article class="post-inline">
                                        <p class="post-inline__link"><a href="{{url('article').'/'.$art->id}}">{{$art->title}}</a></p>
                                        <div class="post-inline__header"><span class="post-inline__time">{{verta($art->created_at)}}</span><a class="post-inline__author meta-author" href="{{url('search/author').'/'.$art->user_id}}">توسط {{$art->user->name}}</a></div>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    @if($comments->count() > 0)
                    <!-- recent comments-->
                    <section class="section-sm">
                        <h6>دیدگاه‌های جدید</h6>
                        <ul class="list-xs">
                            @foreach($comments as $comment)
                            <li>
                                <!-- Comment minimal-->
                                <article class="comment-minimal">
                                    <p class="comment-minimal__author">{{$comment->user->name}} در</p>
                                    <p class="comment-minimal__link"><a href="{{url('article').'/'.$comment->article->id}}">{{$comment->article->title}}</a></p>
                                </article>
                            </li>
                            @endforeach
                        </ul>
                    </section>
                    @endif

                    @if($tags->count() > 0)
                    <!-- Tags-->
                    <section class="section-sm">
                        <h6>برچسب ها</h6>
                        <ul class="list-tags">
                            @foreach($tags as $tag)
                                <li><a href="{{url('search/tags').'/'.$tag->id}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </section>
                    @endif
                    @if($soci->count() > 0 )
                    <!-- Follow us-->
                    <section class="section-sm">
                        <h6>ما را دنبال کنید</h6>
                        <ul class="list-inline-sm">
                            @foreach($soci as $soc)
                                <li>
                                    <a title="{{$soc->name}}" class="icon icon-xxs icon-primary fa fa-{{$soc->icon}}"
                                       href="{{$soc->url}}"></a>
                                </li>
                            @endforeach
                        </ul>
                        {{--<h6>جدیدترین اخبار را روزانه دریافت کنید!</h6>
                        <!-- RD Mailform-->
                        <form class="rd-mailform rd-mailform_style-1 text-center rd-mailform-inline-flex" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="php/mail.php" novalidate="novalidate">
                            <div class="form-wrap form-wrap_icon linear-icon-envelope">
                                <input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" data-constraints="@Email @Required"><span class="form-validation"></span>
                                <label class="form-label rd-input-label" for="contact-email">لطفا ایمیل خود را وارد کنید</label>
                            </div>
                            <button class="button button-gray-dark" type="submit">دریافت</button>
                        </form>--}}
                    </section>
                    @endif
                </div>

                <div class="col-lg-7 col-xl-8 section-divided__main">
                    @if($articles->count() > 0)
                    @foreach($articles as $article)
                        <!-- Post classic-->
                            <div class="section-sm">
                                <article class="post-classic">
                                    <div class="post-classic-title post-classic-title-icon linear-icon-star">
                                        <h5><a href="{{url('article').'/'.$article->id}}">{{$article->title}}</a></h5>
                                    </div><img src="{{asset('images/articles/').'/'.$article->picture}}" alt="" width="886" height="668">
                                    <div class="post-classic-body">
                                        {!! $article->brief !!}
                                    </div>
                                    <div class="post-meta">
                                        <div class="group">
                                            <a href="{{url('article').'/'.$article->id}}">
                                                <time datetime="2017">{{verta($article->created_at)}}</time>
                                            </a>
                                            <a class="meta-author" href="{{url('search/author').'/'.$article->user_id}}">توسط {{$article->user->name}}</a>
                                            <a href="{{url('article').'/'.$article->id}}"> @if($article->comments->count() > 0) {{$article->comments->count()}} دیدگاه  @else  بدون دیدگاه @endif</a>
                                            <ul class="list-inline-tag">
                                                <li>دسته بندی: <a href="{{url('search/categories').'/'.$article->category_id}}">{{$article->category->name}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-classic-footer">
                                        <ul class="list-inline-sm">
                                            @foreach($soci as $soc)
                                                <li>
                                                    <a title="{{$soc->name}}" class="icon icon-xxs icon-primary fa fa-{{$soc->icon}}"
                                                       href="{{$soc->url}}"></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="button button-link" href="{{url('article').'/'.$article->id}}">بیشتر بخوانید</a>
                                    </div>
                                </article>
                            </div>
                    @endforeach
                    <!-- Pagination-->
                    <div class="section-sm">
                        <!-- Classic Pagination-->
                        <nav>
                            <ul class="pagination-classic">
                                {{$articles->links()}}
                            </ul>
                        </nav>
                    </div>
                        @else
                        <div class="alert alert-danger">
                            <p class="lead">خبر تازه ای نیست، پس از بروزرسانی مجددا مراجعه فرمایید</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
