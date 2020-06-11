@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                خدمات
                <small>سرویس های قابل ارائه</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="#"><i class="fa fa-server"></i>خدمات</a></li>
            </ol>
        </section>

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/services')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد خدمات</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="عنوان"/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>زیر عنوان</label>
                                    <input type="text" class="form-control" name="subTitle" placeholder="زیر عنوان"/>
                                    @error('subTitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>توضیحات</label>
                                    <textarea rows="7" class="form-control" name="body" placeholder="توضیحات"></textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>آیکون سرویس</label>
                                    <select class="form-control" name="icon">
                                        <option disabled selected>لطفا انتخاب کنید</option>
                                        <option value="linear-icon-pencil-ruler">pencil-ruler</option>
                                        <option value="linear-icon-pencil-ruler2">pencil-ruler2</option>
                                        <option value="linear-icon-users">users</option>
                                        <option value="linear-icon-users2">users2</option>
                                        <option value="linear-icon-wall">wall</option>
                                        <option value="linear-icon-apartment">apartment</option>
                                        <option value="linear-icon-home4">home</option>
                                        <option value="linear-icon-magic-wand">magic-wand</option>
                                        <option value="linear-icon-menu3">menu3</option>
                                    </select>
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>تصویر تیتر</label>
                                    <input type="file" id="imgFile" class="form-control" name="headerBanner"/>
                                    @error('headerBanner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <img id="imgPreview" src="{{asset('images/nia.jpg')}}"
                                         class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                </div>
                                <div class="form-group">
                                    <label>تصویر سرویس</label>
                                    <input type="file" id="imgFile2" class="form-control" name="picture"/>
                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <img id="imgPreview2" src="{{asset('images/nia.jpg')}}"
                                         class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                </div>

                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد سرویس</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">خدمات</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($services->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $index => $service)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$service->title}}</td>
                                            <td>{{verta($service->created_at)}}</td>
                                            <td>{{verta($service->updated_at)}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$service->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$service->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/services').'/'.$service->id.'/edit'}}"
                                                              method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">ویرایش سرویس</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>عنوان</label>
                                                                        <input type="text" class="form-control"
                                                                               name="title"
                                                                               placeholder="عنوان"
                                                                               value="{{$service->title}}"/>
                                                                        @error('title')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>زیر عنوان</label>
                                                                        <input type="text" class="form-control"
                                                                               name="subTitle"
                                                                               placeholder="زیر عنوان"
                                                                               value="{{$service->subTitle}}"/>
                                                                        @error('subTitle')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>آیکون </label>
                                                                        <select class="form-control"
                                                                                name="icon">
                                                                            <option disabled selected>لطفا انتخاب کنید
                                                                            </option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-pencil-ruler") selected
                                                                                @endif value="linear-icon-pencil-ruler">pencil-ruler</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-pencil-ruler2") selected
                                                                                @endif value="linear-icon-pencil-ruler2">pencil-ruler2</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-users") selected
                                                                                @endif value="linear-icon-users">users</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-users2") selected
                                                                                @endif value="linear-icon-users2">users2</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-wall") selected
                                                                                @endif value="linear-icon-wall">wall</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-apartment") selected
                                                                                @endif value="linear-icon-apartment">apartment</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-home4") selected
                                                                                @endif value="linear-icon-home4">home4</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-magic-wand") selected
                                                                                @endif value="linear-icon-magic-wand">magic-wand</option>
                                                                            <option
                                                                                @if($service->icon=="linear-icon-menu3") selected
                                                                                @endif value="linear-icon-menu3">menu3</option>
                                                                        </select>
                                                                        @error('icon')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        <div class="form-group">
                                                                            <label>تصویر تیتر</label>
                                                                            <input type="file" id="imgFile3" class="form-control" name="headerBanner"/>
                                                                                @error('headerBanner')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            <img id="imgPreview3" src="{{asset('images/services/').'/'.$service->headerBanner}}"
                                                                                 class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>تصویر سرویس</label>
                                                                            <input type="file" id="imgFile4" class="form-control" name="picture"/>
                                                                                @error('picture')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong class="text-danger">{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            <img id="imgPreview4" src="{{asset('images/services/').'/'.$service->picture}}"
                                                                                 class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                                                        </div>
                                                                    </div>
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
                                                        data-target="#delete{{$service->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$service->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/services/delete').'/'.$service->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف سرویس</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف {{ $service->title }} اطمینان
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
                                    <h3 class="alert alert-danger">شما باید برای خدمات از طریق پنل ایجاد خدمات
                                        جدید، ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $services->count() > 0)
                                {{$services->links()}}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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

        $(document).ready(function () {
            $("#imgFile3").change(function () {
                readURL3(this);
            });
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $("#imgFile4").change(function () {
                readURL4(this);
            });
        });

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview4').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
