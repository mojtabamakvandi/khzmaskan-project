@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                مطالب
                <small>دسته بندی ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مطالب </a></li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">مطالب</h3>
                            <span class="pull-left">
                                <a class="btn btn-success" href="{{url('cp/articles/new')}}">مطلب جدید</a>
                            </span>
                        </div>
                        <div class="box-body table-responsive">
                            @if($articles->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان</td>
                                        <td>دسته بندی</td>
                                        <td>تگ ها</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $index => $article)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td><a target="_blank" href="{{url('/article').'/'.$article->id}}" >{{$article->title}}</a></td>
                                            <td>{{$article->category->name}}</td>
                                            <td>
                                                @if($article->tags!= null)
                                                    @foreach($article->tags as $tag)
                                                        <span class="badge badge-secondary" style="padding: 7px 7px;margin:0 7px 5px 7px">{{$tag->name}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{verta($article->created_at)}}</td>
                                            <td>{{verta($article->updated_at)}}</td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="{{url('cp/articles').'/'.$article->id.'/edit'}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </a>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$article->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$article->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/article/delete').'/'.$article->id}}"
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
                                                                    <h3>آیا از حذف {{ $article->name }} اطمینان
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
                            @if( $articles->count() > 0 )
                                {{$articles->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
