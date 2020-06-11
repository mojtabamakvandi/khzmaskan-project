@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تایید آدرس ایمیل</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            لینک تاییدیه ایمیل با موفقیت ارسال شد
                        </div>
                    @endif

                    قبل از تلاش مجدد ابتدا ایمیل خود را چک کنید شاید برای شما ارسال شده باشد
                    و اگر ایمیل مورد نظر را نیافتید مجدد اقدام کنید,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">ارسال لینک تایید ایمیل</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
