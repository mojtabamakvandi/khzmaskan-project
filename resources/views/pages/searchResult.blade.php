@extends('layouts.public')
@section('content')
    <section class="section-lg bg-default">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- RD Search-->
                    <form class="rd-search rd-mailform-inline-flex" action="{{url('search')}}" method="GET">
                        <div class="form-wrap form-wrap_icon linear-icon-magnifier">
                            <label class="form-label rd-input-label" for="rd-search-form-input">عبارت مورد جستجو</label>
                            <input class="form-input" id="rd-search-form-input" type="text" name="search" autocomplete="off">
                        </div>
                        <button class="button button-primary" type="submit">برو!</button>
                    </form>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            @if($count==0)
                <div class="text-center">
                    <div class="alert alert-warning">
                        <h3>متاسفانه یافت نشد</h3>
                    </div>
                </div>
            @else
                <div class="rd-search-results">
                    <div id="search-results">

                        <ol class="search-list">
                            @foreach($results as $result)
                                <li class="search-list-item">
                                    <h6 class="search_title"><a target="_top" href="{{url('article').'/'.$result->id}}" class="search_link">{{$result->title}}</a></h6>
                                    <p class="match">{{$result->subTitle}}</p>
                                    {!! $result->brief !!}
                                </li>
                            @endforeach
                        </ol>

                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
