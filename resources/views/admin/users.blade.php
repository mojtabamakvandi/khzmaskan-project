@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                سامانه
                <small>ثبت نامی ها</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="{{url('cp/registered')}}"><i class="fa fa-users"></i> ثبت نامی ها </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">ثبت نامی ها</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($users->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>آواتار</td>
                                        <td>نام کاربر</td>
                                        <td>کد ملی</td>
                                        <td>ایمیل</td>
                                        <td>همراه</td>
                                        <td>نام کاربری</td>
                                        <td>زمان ثبت نام</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td><img src="{{asset('images/avatars').'/'.$user->avatar}}" style="border-radius: 50%; width: 50px;height: auto"></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->ncode}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>{{verta($user->created_at)}}</td>
                                            <td>
                                                <form action="{{url('cp/user').'/'.$user->id.'/changeStatus'}}" method="post" style="display: inline">
                                                    @csrf
                                                    <button type="submit" @if($user->isActive) class="btn btn-danger btn-xs" @else class="btn btn-info btn-xs" @endif>
                                                        @if($user->isActive) <i class="fa fa-thumbs-down"></i> غیر فعال @else <i class="fa fa-thumbs-up"></i> فعال @endif</button>
                                                </form>
                                                <button class="btn btn-success btn-xs" type="button" data-toggle="modal"
                                                        data-target="#chpass{{$user->id}}"><i class="fa fa-user-secret"></i>
                                                    تغییر رمز عبور
                                                </button>
                                                <div class="modal fade" id="chpass{{$user->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/user').'/'.$user->id.'/changePass'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">تغییر رمز عبور</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>رمز عبور جدید</label>
                                                                        <input type="password" class="form-control"
                                                                               name="password" placeholder="رمز عبور جدید"/>
                                                                        @error('password')
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
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$user->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$user->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/user').'/'.$user->id.'/edit'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">ویرایش کاربر</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>نام و نام خانوادگی</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name" placeholder="نام و نام خانوادگی"
                                                                               value="{{$user->name}}"/>
                                                                        @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>کد ملی</label>
                                                                        <input type="text" class="form-control"
                                                                               name="ncode" placeholder="کد ملی"
                                                                               value="{{$user->ncode}}"/>
                                                                        @error('ncode')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>ایمیل</label>
                                                                        <input type="text" class="form-control"
                                                                               name="email" placeholder="ایمیل"
                                                                               value="{{$user->email}}"/>
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>شماره همراه</label>
                                                                        <input type="text" class="form-control"
                                                                               name="mobile" placeholder="شماره همراه"
                                                                               value="{{$user->mobile}}"/>
                                                                        @error('mobile')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>نام کاربری</label>
                                                                        <input type="text" class="form-control"
                                                                               name="username" placeholder="نام کاربری"
                                                                               value="{{$user->username}}"/>
                                                                        @error('username')
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
                                                        data-target="#delete{{$user->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$user->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/user/delete').'/'.$user->id}}"
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
                                                                        <h3>آیا از حذف {{ $user->name }} اطمینان
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
                                    <h3 class="alert alert-danger">کاربر جدیدی ندارید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $users->count() > 0 )
                                {{$users->links()}}
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
