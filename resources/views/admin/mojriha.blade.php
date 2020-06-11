@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                سامانه
                <small>مجریان</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/mojrian')}}"><i class="fa fa-users"></i> مجریان </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">مجریان</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($mojriha->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>نام مجری</td>
                                        <td>کد ملی</td>
                                        <td>نوع مجری</td>
                                        <td>پروانه اشتغال</td>
                                        <td>عضویت</td>
                                        <td>پایه اجرا</td>
                                        <td>زمان ثبت نام</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mojriha as $index => $mojri)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$mojri->user->name}}</td>
                                            <td>{{$mojri->user->ncode}}</td>
                                            <td>@if($mojri->type) <span class="btn btn-xs btn-success">حقوقی</span> @else <span class="btn btn-xs btn-warning">حقیقی</span> @endif</td>
                                            <td>{{$mojri->parvaneh}}</td>
                                            <td>{{$mojri->ozviat}}</td>
                                            <td>
                                                @if($mojri->pejra == 1)
                                                    <span class="btn btn-xs btn-danger">پایه سه</span>
                                                @elseif($mojri->pejra == 2)
                                                    <span class="btn btn-xs btn-warning">پایه دو</span>
                                                @elseif($mojri->pejra == 3)
                                                    <span class="btn btn-xs btn-success">پایه یک</span>
                                                @elseif($mojri->pejra == 4)
                                                    <span class="btn btn-xs btn-info">ارشد</span>
                                                @endif

                                            </td>
                                            <td>{{verta($mojri->created_at)}}</td>
                                            <td>
                                                <form action="{{url('cp/mojrian').'/'.$mojri->id.'/changeStatus'}}" method="post" style="display: inline">
                                                    @csrf
                                                    <button type="submit" @if($mojri->isActive) class="btn btn-danger btn-xs" @else class="btn btn-info btn-xs" @endif>
                                                        @if($mojri->isActive) <i class="fa fa-thumbs-down"></i> غیر فعال @else <i class="fa fa-thumbs-up"></i> فعال @endif</button>
                                                </form>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$mojri->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$mojri->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/mojrian/delete').'/'.$mojri->id}}"
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
                                                                        <h3>آیا از حذف {{ $mojri->user->name }} اطمینان
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
                                    <h3 class="alert alert-danger">مجری جدیدی ندارید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $mojriha->count() > 0 )
                                {{$mojriha->links()}}
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
