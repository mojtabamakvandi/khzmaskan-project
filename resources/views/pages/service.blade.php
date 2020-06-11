@extends('layouts.public')
@section('content')
    <section class="bg-gray-dark">
        <section class="section parallax-container" data-parallax-img="{{asset('images/services').'/'.$service->headerBanner}}"><div class="material-parallax parallax"><img src="{{asset('images/services').'/'.$service->headerBanner}}" alt="" style="transform: translate3d(-50%, 235px, 0px); display: block;"></div>
            <div class="parallax-content parallax-header">
                <div class="parallax-header__inner">
                    <div class="parallax-header__content">
                        <div class="container">
                            <div class="row justify-content-sm-center">
                                <div class="col-md-10 col-xl-8">
                                    <h2 class="heading-decorated">{{$service->title}}</h2>
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
            <div class="row justify-content-md-center row-30 row-md-50">
                <div class="col-md-11 col-lg-10 col-xl-6">
                    <h6 class="heading-decorated">{{$service->subTitle}}</h6>
                    <p>{{$service->body}}</p>
                </div>
                <div class="col-md-11 col-lg-10 col-xl-6"><img src="{{asset('images/services').'/'.$service->picture}}" alt="" width="652" height="491">
                </div>
            </div>
        </div>
    </section>
@endsection
