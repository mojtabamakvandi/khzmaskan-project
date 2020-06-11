@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                مطالب
                <small>پیام ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="{{url('cp/articles')}}"><i class="fa fa-archive"></i> مطالب </a></li>
                <li class="active"><a href="{{url('cp/messages')}}"><i class="fa fa-archive"></i> پیام ها </a></li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">پیام ها</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($messages->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>فرستنده</td>
                                        <td>ایمیل</td>
                                        <td>همراه</td>
                                        <td>متن پیام</td>
                                        <td>وضعیت پاسخ</td>
                                        <td>زمان ارسال</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $index => $message)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->mobile}}</td>
                                            <td>{{$message->body}}</td>
                                            <td>
                                                @if($message->answered==0)
                                                    <p class="text-red"> <i class="fa fa-ban fa-2x"></i></p>
                                                @elseif($message->answered==1)
                                                    <p class="text-green"> <i class="fa fa-comment fa-2x"></i></p>
                                                @else
                                                    <p class="text-yellow"> <i class="fa fa-envelope fa-2x"></i></p>
                                                @endif
                                            </td>
                                            <td>{{verta($message->created_at)}}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                                        data-target="#answer{{$message->id}}"><i class="fa fa-comments"></i> پیامک </button>
                                                <div class="modal fade " id="answer{{$message->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/message/sms/answer').'/'.$message->id}}"
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

                                                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal"
                                                        data-target="#answerEmail{{$message->id}}"><i class="fa fa-envelope"></i> ایمیل </button>
                                                <div class="modal fade " id="answerEmail{{$message->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/message/email/answer').'/'.$message->id}}"
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

                                                <button class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                        data-target="#delete{{$message->id}}"><i class="fa fa-trash"></i>
                                                    حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$message->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/messages/delete').'/'.$message->id}}"
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
                                                                    <h3>آیا از حذف پیام {{ $message->name }} اطمینان
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
                                    <h3 class="alert alert-danger">تا کنون پیامی ارسال نشده است</h3>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer text-center">
                            @if( $messages->count() > 0 )
                                {{$messages->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
