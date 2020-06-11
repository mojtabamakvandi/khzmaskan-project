@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                پروژه ها
                <small>پروژه جدید</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/projects')}}"><i class="fa fa-archive"></i> پروژه ها </a></li>
            </ol>
        </section>
        <form action="{{url('cp/projects/new')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title"></h3>
                            </div>
                            <div class="box-body">
                                <h3>توضیح پروژه</h3>
                                @error('body')
                                <br/>
                                <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                @enderror
                                <textarea id="body" name="body" rows="10" cols="80">متن پروژه ...</textarea>
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
                                    <input type="text" name="title" class="form-control"/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>بودجه</label>
                                    <input type="text" name="boodje" class="form-control"/>
                                    @error('boodje')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>متراژ</label>
                                    <input type="text" name="metraj" class="form-control"/>
                                    @error('metraj')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>انتخاب مجری</label>
                                    <select class="form-control" name="person_id" style="height: 40px">
                                        <option value="0" selected disabled>مجری را انتخاب کنید</option>
                                        @foreach(\App\Person::where('isActive',1)->get() as $mojri)
                                            <option value="{{$mojri->id}}">{{$mojri->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('person_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>نوع قرارداد</label>
                                    <input type="text" name="contract" class="form-control"/>
                                    @error('contract')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>مالک</label>
                                    <input type="text" name="malek" class="form-control"/>
                                    @error('malek')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>طراحان</label>
                                    <input type="text" name="tarah" class="form-control"/>
                                    @error('tarah')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>ناظران</label>
                                    <input type="text" name="nazer" class="form-control"/>
                                    @error('nazer')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>مکان پروژه</label>
                                    <input type="text" name="location" class="form-control"/>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer">
                            <span class="pull-left"><button class="btn btn-success"
                                                            type="submit">ایجاد و انتشار پروژه</button></span>
                                <span class="pull-right"><label><input type="checkbox"
                                                                       name="status"/> منتشر شود </label></span>
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
                                <img id="imgPreview" src="{{asset('images/nia.jpg')}}"
                                     class="img img-responsive img-bordered-sm" style="margin:0 auto;"/>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>تصویر شاخص</label>
                                    <input type="file" id="imgFile" name="imgSrc" class="form-control"/>
                                    @error('imgSrc')
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
