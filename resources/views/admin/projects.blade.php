@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                پروژه ها
                <small>پروژه های اعضا</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/projects')}}"><i class="fa fa-product-hunt"></i> پروژه ها </a></li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">پروژه ها</h3>
                            <span class="pull-left">
                                <a class="btn btn-success" href="{{url('cp/projects/new')}}">پروژه جدید</a>
                            </span>
                        </div>
                        <div class="box-body table-responsive">
                            @if($projects->count() > 0)
                                <table class="table table-hover  table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان</td>
                                        <td>مجری</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>تصاویر</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $index => $project)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td><a target="_blank" href="{{url('/projects').'/'.$project->id}}" >{{$project->title}}</a></td>
                                            <td>{{$project->person->user->name}}</td>
                                            <td>{{verta($project->created_at)}}</td>
                                            <td>{{verta($project->updated_at)}}</td>
                                            <td><a href="{{url('cp/projects/gallery/add').'/'.$project->id}}" class="btn btn-info btn-sm">گالری تصاویر پروژه</a> </td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="{{url('cp/projects').'/'.$project->id.'/edit'}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </a>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$project->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$project->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/projects/delete').'/'.$project->id}}"
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
                                                                    <h3>آیا از حذف {{ $project->title }} اطمینان
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
                                    <h3 class="alert alert-danger">شما باید برای ایجاد پروژه از طریق پنل ایجاد پروژه
                                        ، پروژه ایجاد کنید</h3>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer text-center">
                            @if( $projects->count() > 0 )
                                {{$projects->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
