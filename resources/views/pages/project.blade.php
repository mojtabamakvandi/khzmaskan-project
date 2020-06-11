@extends('layouts.public')
@section('content')
    <section class="section-md bg-default">
        <div class="container post-strict">
            <div class="row row-70">
                <div class="col-sm-12 text-center">
                    <h4 class="heading-decorated">{{$project->title}}</h4>
                    <div class="post-strict__header"> <span class="post-strict__time">{{verta($project->created_at)}}</span><a class="post-strict__author meta-author" href="#"> توسط {{$project->user->name}} </a></div>
                </div>
                {{--<div class="col-sm-12">
                    <div class="slick-gallery">
                        <!-- Slick Carousel-->
                        <div class="carousel-parent slick-initialized slick-slider" data-arrows="true" data-loop="false" data-dots="true" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-photo-swipe-gallery="gallery">
                            <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" aria-disabled="false" style="">Previous</button>
                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track" role="listbox" style="opacity: 1; width: 9450px; transform: translate3d(8100px, 0px, 0px);">
                                    @foreach($images as $index => $image)
                                        <div class="item slick-slide" style="width: 1350px;" data-slick-index="{{$index}}" aria-hidden="true" tabindex="-1" role="option" aria-describedby="{{'slick-slide0'.$index}}">
                                            <img src="{{asset('images/projects/gallery').'/'.$image->src}}" alt="" width="1200" height="800">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" data-role="none" class="slick-next slick-arrow slick-disabled" aria-label="Next" role="button" aria-disabled="true" style="">Next</button>
                        </div>


                        <div class="child-carousel slick-initialized slick-slider" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="true" data-dots="true" data-swipe="true" data-items="3" data-sm-items="3" data-md-items="4" data-lg-items="6" data-xl-items="6" data-slide-to-scroll="0">
                            <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" aria-disabled="false" style="">Previous</button>
                            <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 1575px; transform: translate3d(225px, 0px, 0px);">
                                    @foreach($images as $index => $image)
                                        <div class="item slick-slide" style="width: 225px;" data-slick-index="{{$index}}" aria-hidden="true" tabindex="-1" role="option" aria-describedby="{{'slick-slide1'.$index}}">
                                            <img src="{{asset('images/projects/gallery').'/'.$image->src}}" alt="" width="1200" height="800">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" data-role="none" class="slick-next slick-arrow slick-disabled" aria-label="Next" role="button" aria-disabled="true" style="">Next</button>
                        </div>
                    </div>
                </div>--}}
                <section class="col-md-12">
                    <div class="container-fluid container-flex">
                        <div class="row no-gutters" data-photo-swipe-gallery="gallery">
                            @foreach($images as $index => $image)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!-- Thumb creative-->
                                <div class="thumb-creative thumb-creative_no-cover">
                                    <div class="thumb-creative__inner">
                                        <div class="thumb-creative__front">
                                            <figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="{{asset('images/projects/gallery').'/'.$image->src}}" alt="" width="652" height="491">
                                            </figure>
                                        </div>
                                        <div class="thumb-creative__back">
                                            <figure class="thumb-creative__image-wrap"><img class="thumb-creative__image" src="{{asset('images/projects/gallery').'/'.$image->src}}" alt="" width="652" height="491">
                                            </figure>
                                            <div class="thumb-creative__content">
                                                <a class="link-icon icon-md linear-icon-plus" href="{{asset('images/projects/gallery').'/'.$image->src}}" data-photo-swipe-item="" data-size="1200x800"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                {{--<div class="col-sm-12">
                    <div class="slick-gallery">
                        <!-- Slick Carousel-->
                        <div class="slick-slider carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-photo-swipe-gallery="gallery">
                            <div class="item"><img src="{{asset('images/project-category-1-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-2-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-3-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-4-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-5-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-6-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-7-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                        </div>
                        <div class="slick-slider child-carousel" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="3" data-sm-items="4" data-md-items="5" data-lg-items="6" data-xl-items="6" data-slide-to-scroll="1">
                            <div class="item"><img src="{{asset('images/project-category-1-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-2-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-3-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-4-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-5-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-6-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                            <div class="item"><img src="{{asset('images/project-category-7-original-1200x800.jpg')}}" alt="" width="1200" height="800">
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="col-sm-12">
                    <div class="row row-40">
                        <div class="col-md-8 col-lg-5">
                            <ul class="list-sm">
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>بودجه نهایی</dt>
                                        <dd>{{$project->boodje}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>متراژ</dt>
                                        <dd>{{$project->metraj}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>نوع قرارداد</dt>
                                        <dd>{{$project->contract}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>مالک</dt>
                                        <dd>{{$project->malek}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>طراحان</dt>
                                        <dd>{{$project->tarah}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>ناظران</dt>
                                        <dd>{{$project->nazer}}</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl class="list-terms-inline">
                                        <dt>مکان</dt>
                                        <dd>{{$project->location}}</dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7">
                            {!!$project->body!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
