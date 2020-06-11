@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                مطالب
                <small>نظرات</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مطالب </a></li>
                <li class="active"><a href="{{url('cp/comments')}}"><i class="fa fa-comment"></i> نظرات </a></li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">نظرات</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($comments->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>فرستنده</td>
                                        <td>متن پیام</td>
                                        <td>عنوان مطلب</td>
                                        <td style="width: 160px">زمان ارسال</td>
                                        <td style="width: 65px;">وضعیت</td>
                                        <td style="width: 80px">پاسخ</td>
                                        <td style="width: 80px">حذف</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $index => $comment)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$comment->commenter->name}}</td>
                                            <td>{{$comment->body}}</td>
                                            <td>{{$comment->article->title}}</td>
                                            <td>{{verta($comment->created_at)}}</td>
                                            <td>
                                                <form action="{{url('cp/comments/accept').'/'.$comment->id}}" method="post">
                                                    @csrf
                                                    <button type="submit" @if($comment->accept) class="btn btn-danger btn-xs" @else class="btn btn-info btn-xs" @endif>
                                                        @if($comment->accept) <i class="fa fa-thumbs-down"></i> رد کردن @else <i class="fa fa-thumbs-up"></i> پذیرفتن @endif</button>
                                                </form>
                                            </td>
                                            <td>


                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                        data-target="#answer{{$comment->id}}"><i class="fa fa-comments"></i>
                                                    پاسخ دادن</button>
                                                <div class="modal fade " id="answer{{$comment->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/comments/answer').'/'.$comment->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">پاسخ دادن</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>متن پاسخ</label>
                                                                        <textarea class="form-control" rows="5" name="answer" placeholder="متن پاسخ"></textarea>
                                                                        @error('answer')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        <br/>
                                                                        <p class="label label-danger">ارسال پاسخ به منزله پذیرفتن نظر نیز می باشد</p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="pull-left">
                                                                        <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">لغو
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-success ">
                                                                            ارسال
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
                                            <td>
                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$comment->id}}"><i class="fa fa-trash"></i>
                                                    حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$comment->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/comments/delete').'/'.$comment->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف نظر</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف نظر {{ $comment->user->name }} اطمینان
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
                                    <h3 class="alert alert-danger">تا کنون نظری ارسال نشده است</h3>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer text-center">
                            @if( $comments->count() > 0 )
                                {{$comments->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
