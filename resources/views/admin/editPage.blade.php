@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                صفحات
                <small>صفحه جدید</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/pages')}}"><i class="fa fa-archive"></i> صفحات </a></li>
            </ol>
        </section>
        <form action="{{url('cp/pages').'/'.$page->id.'/edit'}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title"></h3>
                            </div>
                            <div class="box-body">
                                <h3>خلاصه مطلب</h3>
                                @error('brief')
                                <br/>
                                <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                @enderror
                                <textarea id="brief" name="brief" rows="10" cols="80">{{$page->brief}}</textarea>
                                <h3>متن مطلب</h3>
                                @error('body')
                                <br/>
                                <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                @enderror
                                <textarea id="body" name="body" rows="10" cols="80">{{$page->body}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ابزار ها</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" name="title" class="form-control" value="{{$page->title}}"/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>زیر عنوان</label>
                                    <input type="text" name="subTitle" class="form-control" value="{{$page->subTitle}}"/>
                                    @error('subTitle')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer">
                            <span class="pull-left"><button class="btn btn-warning"
                                                            type="submit">ویرایش و انتشار صفحه</button></span>
                                <span class="pull-right"><label><input type="checkbox"
                                                                       name="isActive" value="1" @if($page->isActive) checked @endif/> منتشر شود </label></span>
                            </div>
                        </div>

                        <br/>
                        <div class="box box-info">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">تصویر شاخص</h3>
                            </div>
                            <div class="box-body">
                                <br/>
                                <br/>
                                <img id="imgPreview" src="{{asset('images/pages').'/'.$page->picture}}"
                                     class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>تصویر شاخص</label>
                                    <input type="file" id="imgFile" name="picture" class="form-control"/>
                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            CKEDITOR.replace('brief');
            CKEDITOR.replace('body');
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#imgFile").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
