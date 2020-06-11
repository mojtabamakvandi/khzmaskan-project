@extends('layouts.public')
@section('content')
    <!-- Parallax header-->
    <section class="bg-gray-dark">
        <section class="section parallax-container" data-parallax-img="{{asset('images/parallax-1.jpg')}}"><div class="material-parallax parallax"><img src="{{asset('images/parallax-1.jpg')}} " alt="" style="transform: translate3d(-50%, 235px, 0px); display: block;"></div>
            <div class="parallax-content parallax-header">
                <div class="parallax-header__inner">
                    <div class="parallax-header__content">
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-md-10 col-xl-8">
                                    <h2 class="heading-decorated">{{auth()->user()->name}}</h2>
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
            <div class="row row-70 flex-lg-row-reverse">
                <div class="col-lg-7 col-xl-8 section-divided__main section-divided__main-left">
                    <!-- Post classic-->
                    <div class="section-sm">
                        @yield('profile')
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 section-divided__aside section__aside-left">
                    <!-- About-->
                    <section class="section-sm">
                        <div class="thumbnail-classic-minimal"><img class="rounded-circle" src="{{asset('images/avatars/').'/'.auth()->user()->avatar}}" alt="" width="210" height="210">
                            <div class="caption">
                                <p>{{auth()->user()->description}}</p>
                            </div>
                        </div>
                    </section>

                    <!-- Categories-->
                    <section class="section-sm">
                        <h6>منو کاربری</h6>
                        <ul class="list-xxs small">
                            <li><a href="{{url('profile/user')}}"><i class="fa fa-user"></i> اطلاعات کاربری</a> </li>
                            @if(\App\Person::where('user_id',auth()->user()->id)->count() > 0)
                            <li><a href="{{url('profile/mojri')}}"><i class="fa fa-building"></i> اطلاعات مجری</a> </li>
                            <li><a href="{{url('profile/documents')}}"><i class="fa fa-paperclip"></i> مستندات</a> </li>
                            <li><a href="{{url('profile/projects')}}"><i class="fa fa-server"></i> پروژه های من</a> </li>
                            @endif
                            <li><a href="{{url('profile/change-password')}}"><i class="fa fa-lock"></i> تغییر رمز عبور</a> </li>
                        </ul>
                    </section>
                    <!-- recent comments-->
                    <section class="section-sm">
                        <h6>دیدگاه‌های جدید</h6>
                        <ul class="list-xs">
                            @foreach(\App\Comment::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->take(5)->get() as $comment)
                                <li>
                                    <!-- Comment minimal-->
                                    <article class="comment-minimal">
                                        <p class="comment-minimal__author">{{auth()->user()->name}} در</p>
                                        <p class="comment-minimal__link"><a href="standard-post.html">{{$comment->article->title}}</a></p>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                    </section>
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
