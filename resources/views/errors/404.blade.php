@extends('layouts.public')
@section('content')
<section class="bg-gray-dark text-center">
    <section class="section parallax-container" data-parallax-img="images/bg-image-2.jpg"><div class="material-parallax parallax"><img src="{{asset('images/bg-image-2.jpg')}}" alt="" style="transform: translate3d(-50%, 217px, 0px); display: block;"></div>
        <div class="parallax-content parallax-header parallax-light">
            <div class="parallax-header__inner">
                <div class="parallax-header__content">
                    <div class="container">
                        <div class="row justify-content-sm-center">
                            <div class="col-md-10 col-xl-8">
                                <h2>صفحه مورد نظر پیدا نشد</h2>
                                <h2>لطفا مجددا تلاش کنید</h2>
                                <a class="button button-black" href="{{url('/')}}">بازگشت</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
