@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                منو ها
                <small>منو بالا</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="#"><i class="fa fa-list"></i> منو بالا </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/headerMenu')}}" method="post">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد منو بالا</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>عنوان منو</label>
                                    <input type="text" class="form-control" name="title" placeholder="عنوان منو"/>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>منو والد</label>
                                    <select class="form-control" name="parent" style="height: 40px">
                                        <option value="0" selected>اصلی</option>
                                        @if($menu_count > 0)
                                            @foreach($items as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('parent')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>لینک منو</label>
                                    <input type="text" class="form-control" name="link" placeholder="لینک منو"/>
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد منو بالا</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">منوهای بالا</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($headerMenu->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان منو</td>
                                        <td>لینک</td>
                                        <td>والد</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($headerMenu as $index => $hm)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$hm->title}}</td>
                                            <td>{{$hm->link}}</td>
                                            <td>@if($hm->parent == 0) اصلی @else {{$hm->headerMenu->title}} @endif</td>
                                            <td>{{verta($hm->created_at)}}</td>
                                            <td>{{verta($hm->updated_at)}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$hm->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$hm->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/headerMenu').'/'.$hm->id.'/edit'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف منو</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>عنوان منو</label>
                                                                        <input type="text" class="form-control"
                                                                               name="title" placeholder="عنوان منو"
                                                                               value="{{$hm->title}}"/>
                                                                        @error('title')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>منو والد</label>
                                                                        <select class="form-control" name="parent" style="height: 40px">
                                                                            <option value="0" selected>اصلی</option>
                                                                            @if($menu_count > 0)
                                                                                @foreach($items as $item)
                                                                                    <option value="{{$item->id}}" @if($item->id==$hm->parent) selected @endif >{{$item->title}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                        @error('parent')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>لینک منو</label>
                                                                        <input type="text" class="form-control"
                                                                               name="link" placeholder="لینک منو"
                                                                               value="{{$hm->link}}"/>
                                                                        @error('link')
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
                                                        data-target="#delete{{$hm->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$hm->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/headerMenu/delete').'/'.$hm->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف منو بالا</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف {{ $hm->title }} اطمینان
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
                                    <h3 class="alert alert-danger">شما باید برای ایجاد منو بالا از طریق پنل ایجاد منو بالا
                                        جدید، منو ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $headerMenu->count() > 0)
                                {{$headerMenu->links()}}
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
