@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                مطالب
                <small>دسته بندی ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مطالب </a></li>
                <li class="active"><a href="#"><i class="fa fa-area-chart"></i> دسته بندی ها </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/categories')}}" method="post">
                        @csrf


                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد دسته بندی</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>نام دسته بندی</label>
                                    <input type="text" class="form-control" name="name" placeholder="نام دسته بندی"/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>والد دسته بندی</label>
                                    <select class="form-control select2" name="category_id" style="height: 40px">
                                        <option value="0" disabled selected>لطفا انتخاب کنبد</option>
                                        <option value="0">اصلی</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد دسته بندی</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">دسته بندی ها</h3>
                        </div>
                        <div class="box-body  table-responsive">
                            @if($categories->count() > 0)
                                <table class="table table-hover table-responsive table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>نام دسته بندی</td>
                                        <td>والد</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $index => $category)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$category->name}}</td>
                                            <td> @if($category->category_id >0 )
                                                    {{$category->category->name}}
                                                @else
                                                    اصلی
                                                @endif
                                            </td>
                                            <td>{{verta($category->created_at)}}</td>
                                            <td>{{verta($category->updated_at)}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$category->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$category->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/category').'/'.$category->id.'/edit'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف دسته بندی</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>نام دسته بندی</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name" placeholder="نام دسته بندی"
                                                                               value="{{$category->name}}"/>
                                                                        @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>والد دسته بندی</label>
                                                                        <select class="form-control" style="height: 40px"
                                                                                name="category_id">
                                                                            <option value="0" selected>اصلی</option>
                                                                            @foreach($categories as $cat)
                                                                                <option value="{{$cat->id}}
                                                                                @if($category->id==$cat->id) selected @endif
                                                                                    ">{{$cat->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('category_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
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
                                                        data-target="#delete{{$category->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$category->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/category/delete').'/'.$category->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف دسته بندی</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @if($count=\App\Article::where('category_id',$category->id)->count()==0)
                                                                        <h3>آیا از حذف {{ $category->name }} اطمینان
                                                                            دارید ؟</h3>
                                                                    @else
                                                                        <h3>دسته {{ $category->name }} حاوی مطلب است و
                                                                            نمی توانید آن را حذف کنید </h3>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="pull-left">
                                                                        @if($count > 0)
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">خیر
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger ">
                                                                                بله
                                                                            </button>
                                                                        @endif
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
                                    <h3 class="alert alert-danger">شما باید برای ایجاد مطالب از طریق پنل ایجاد دسته بندی
                                        جدید، دسته بندی ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $categories->count() > 0 )
                                {{$categories->links()}}
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
