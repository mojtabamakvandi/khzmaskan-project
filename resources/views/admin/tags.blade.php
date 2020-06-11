@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                مطالب
                <small>برچسب ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مطالب </a></li>
                <li class="active"><a href="#"><i class="fa fa-area-chart"></i> برچسب ها </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/tags')}}" method="post">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد برچسب</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>نام برچسب</label>
                                    <input type="text" class="form-control" name="name" placeholder="نام دسته بندی"/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد برچسب</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">برچسب ها</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($tags->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>نام برچسب</td>
                                        <td>ایجاد کننده</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $index => $tag)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$tag->name}}</td>
                                            <td>{{$tag->user->name}}</td>
                                            <td>{{verta($tag->created_at)}}</td>
                                            <td>{{verta($tag->updated_at)}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$tag->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$tag->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/tag').'/'.$tag->id.'/edit'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">ویرایش برچسب</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>نام برچسب</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name" placeholder="نام برچسب"
                                                                               value="{{$tag->name}}"/>
                                                                        @error('name')
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
                                                        data-target="#delete{{$tag->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$tag->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/tag/delete').'/'.$tag->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف برچسب</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <h3>آیا از حذف {{ $tag->name }} اطمینان
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
                                    <h3 class="alert alert-danger">شما باید برای ایجاد برچسب از طریق پنل ایجاد برچسب
                                        جدید، برچسب ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $tags->count() > 0 )
                                {{$tags->links()}}
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
