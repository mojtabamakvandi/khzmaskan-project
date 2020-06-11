@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                مطالب
                <small>صفحات سایت</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/pages')}}"><i class="fa fa-archive"></i> صفحات </a></li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">صفحات</h3>
                            <span class="pull-left">
                                <a class="btn btn-success" href="{{url('cp/pages/new')}}">صفحه جدید</a>
                            </span>
                        </div>
                        <div class="box-body table-responsive">
                            @if($pages->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان</td>
                                        <td>ایجاد کننده</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $index => $page)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td><a target="_blank" href="{{url('/pages').'/'.$page->id}}" >{{$page->title}}</a></td>
                                            <td>{{$page->user->name}}</td>
                                            <td>{{verta($page->created_at)}}</td>
                                            <td>{{verta($page->updated_at)}}</td>
                                            <td>
                                                <form action="{{url('cp/pages').'/'.$page->id.'/changeStatus'}}" method="post" style="display: inline">
                                                    @csrf
                                                    <button type="submit" @if($page->isActive) class="btn btn-danger btn-xs" @else class="btn btn-info btn-xs" @endif>
                                                        @if($page->isActive) <i class="fa fa-thumbs-down"></i> غیر فعال @else <i class="fa fa-thumbs-up"></i> فعال @endif</button>
                                                </form>
                                                <a class="btn btn-warning btn-xs" href="{{url('cp/pages').'/'.$page->id.'/edit'}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </a>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$page->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$page->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/pages/delete').'/'.$page->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف مطلب</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف {{ $page->name }} اطمینان
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
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <h3 class="alert alert-danger">شما باید برای ایجاد مطالب از طریق پنل ایجاد مطلب
                                        ، مطلب ایجاد کنید</h3>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer text-center">
                            @if( $pages->count() > 0 )
                                {{$pages->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
