@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <style>
        .imageBox{
            padding: 5px;
            border: 1px solid #bbb;
            margin-bottom: 30px;
            border-radius: 5px;
            box-shadow: -5px 10px 10px rgba(0,0,0,0.3) ;
        }
        .imageProject{
            width: 100%;
            height: auto;
            margin: 0 auto;
            border-radius: 5px;

        }
        .imageDelete{
            padding: 5px 10px;
            background-color: darkred;
            color: white;
            position: absolute;
            bottom: 36px;
            right: 21px;
            border-radius: 0 0 5px 0 ;
            transition: 0.3s;
        }
        .imageDelete:hover {
            background-color: red;
            color: whitesmoke;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                پروژه ها
                <small>گالری پروژه</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="{{url('cp/projects')}}"><i class="fa fa-calculator"></i> پروژه ها </a></li>
                <li class="active"><a href="#"><i class="fa fa-image"></i> گالری پروژه </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">افزودن تصاویر</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{url('cp/projects/gallery/upload').'/'.$project->id}}"
                                  class="dropzone"
                                  enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                <div class="dz-message" data-dz-message><h3>تصاویر را اینجا بکشید یا کلیک کنید</h3></div>
                                <input type="file" name="files" multiple style="display: none">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">تصاویر موجود</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                @foreach($images as $image)
                                <div class="col-md-4">
                                    <div class="imageBox">
                                        <img src="{{asset('images/projects/gallery').'/'.$image->src}}" class="imageProject" style=""/>
                                        <form action="{{url('cp/projects/gallery/delete').'/'.$image->id}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn imageDelete">حذف</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/dropzone.min.js')}}"></script>
@endsection
