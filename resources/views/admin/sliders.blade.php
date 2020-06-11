@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                مطالب
                <small>اسلایدر ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="#"><i class="fa fa-sliders"></i> اسلایدر ها </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/slider')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد اسلاید</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>عنوان اسلاید</label>
                                    <input type="text" class="form-control" name="title" placeholder="عنوان اسلاید"/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>زیر عنوان اسلاید</label>
                                    <input type="text" class="form-control" name="subtitle"
                                           placeholder="زیر عنوان اسلاید"/>
                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>متن کلید</label>
                                    <input type="text" class="form-control" name="btnText" placeholder="متن کلید"/>
                                    @error('btnText')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>لینک کلید</label>
                                    <input type="text" class="form-control" name="btnLink" placeholder="لینک کلید"/>
                                    @error('btnLink')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>تصویر اسلاید</label>
                                    <input type="file" id="imgFile" name="picture" class="form-control"/>
                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <img id="imgPreview" src="{{asset('images/nia.jpg')}}"
                                     class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>

                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد اسلاید</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">اسلاید ها</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($sliders->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>تصویر</td>
                                        <td>عنوان اسلاید</td>
                                        <td>زیر عنوان</td>
                                        <td>متن کلید</td>
                                        <td>لینک کلید</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $index => $slider)
                                        <tr>
                                            <td><br/>{{++$index}}</td>
                                            <td><img src="{{asset('images/sliders').'/'.$slider->src}}"
                                                     class="img-responsive img-thumbnail"
                                                     style="width: 100px;height: auto"/></td>
                                            <td><br/>{{$slider->title}}</td>
                                            <td><br/>{{$slider->subtitle}}</td>
                                            <td><br/>{{$slider->btnText}}</td>
                                            <td><br/>{{$slider->btnLink}}</td>
                                            <td><br/>{{verta($slider->created_at)}}</td>
                                            <td><br/>{{verta($slider->updated_at)}}</td>
                                            <td><br/>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$slider->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$slider->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/slider').'/'.$slider->id.'/edit'}}"
                                                              method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">ویرایش اسلاید</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>عنوان اسلاید</label>
                                                                        <input type="text" class="form-control"
                                                                               name="title" placeholder="عنوان اسلاید"
                                                                               value="{{$slider->title}}"/>
                                                                        @error('title')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>زیر عنوان اسلاید</label>
                                                                        <input type="text" class="form-control"
                                                                               name="subtitle"
                                                                               placeholder="زیر عنوان اسلاید"
                                                                               value="{{$slider->subtitle}}"/>
                                                                        @error('subtitle')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>متن کلید</label>
                                                                        <input type="text" class="form-control"
                                                                               name="btnText" placeholder="متن کلید"
                                                                               value="{{$slider->btnText}}"/>
                                                                        @error('btnText')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>لینک کلید</label>
                                                                        <input type="text" class="form-control"
                                                                               name="btnLink" placeholder="لینک کلید"
                                                                               value="{{$slider->btnLink}}"/>
                                                                        @error('btnLink')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>تصویر اسلاید</label>
                                                                        <input type="file" id="imgFile2" name="picture"
                                                                               class="form-control"/>
                                                                        @error('picture')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <strong
                                                                                    class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <img id="imgPreview2"
                                                                         src="{{asset('images/sliders').'/'.$slider->src}}"
                                                                         class="img img-responsive img-bordered-sm"
                                                                         style="margin:0 auto;"/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="pull-left">

                                                                        <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">لغو
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-warning ">
                                                                            بروزرسانی
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$slider->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$slider->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/slider/delete').'/'.$slider->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف اسلاید</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف {{ $slider->name }} اطمینان
                                                                        دارید ؟</h3>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="pull-left">
                                                                        <button type="button"
                                                                                class="btn btn-primary"
                                                                                data-dismiss="modal">خیر
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger ">
                                                                            بله
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <h3 class="alert alert-danger">شما باید برای ایجاد اسلاید از طریق پنل ایجاد اسلاید
                                        جدید، اسلاید ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $sliders->count() > 0 )
                                {{$sliders->links()}}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('script')
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

        $(document).ready(function () {
            $("#imgFile2").change(function () {
                readURL2(this);
            });
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
