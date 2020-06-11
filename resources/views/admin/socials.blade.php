@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                منو ها
                <small>شبکه های اجتماعی</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active"><a href="#"><i class="fa fa-list"></i>شبکه های اجتماعی</a></li>
            </ol>
        </section>

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{url('cp/socials')}}" method="post">
                        @csrf
                        <div class="box box-success">
                            <div class="box-header bg-purple-gradient">
                                <h3 class="box-title">ایجاد شبکه اجتماعی</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>عنوان شبکه اجتماعی</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="عنوان شبکه اجتماعی"/>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>لینک شبکه اجتماعی</label>
                                    <input type="text" class="form-control" name="url" placeholder="لینک شبکه اجتماعی"/>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>آیکون شبکه اجتماعی</label>
                                    <select class="form-control" name="icon">
                                        <option disabled selected>لطفا انتخاب کنید</option>
                                        <option value="facebook">facebook</option>
                                        <option value="whatsapp">whatsapp</option>
                                        <option value="google-plus">google-plus</option>
                                        <option value="telegram">telegram</option>
                                        <option value="instagram">instagram</option>
                                        <option value="pinterest-p">pinterest-p</option>
                                    </select>
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="box-footer text-left">
                                <button class="btn btn-success" type="submit">ایجاد شبکه اجتماعی</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">شبکه های اجتماعی</h3>
                        </div>
                        <div class="box-body table-responsive">
                            @if($socials->count() > 0)
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>عنوان</td>
                                        <td>لینک</td>
                                        <td>آیکون</td>
                                        <td>ایجاد</td>
                                        <td>ویرایش</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($socials as $index => $social)
                                        <tr>
                                            <td>{{++$index}}</td>
                                            <td>{{$social->name}}</td>
                                            <td>{{$social->url}}</td>
                                            <td><i class="{{'fa fa-'.$social->icon}}"></i></td>
                                            <td>{{verta($social->created_at)}}</td>
                                            <td>{{verta($social->updated_at)}}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" type="button" data-toggle="modal"
                                                        data-target="#edit{{$social->id}}"><i class="fa fa-edit"></i>
                                                    ویرایش
                                                </button>
                                                <div class="modal fade " id="edit{{$social->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/socials').'/'.$social->id.'/edit'}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف شبکه اجتماعی</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>عنوان شبکه اجتماعی</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name"
                                                                               placeholder="عنوان شبکه اجتماعی"
                                                                               value="{{$social->name}}"/>
                                                                        @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>لینک شبکه اجتماعی</label>
                                                                        <input type="text" class="form-control"
                                                                               name="url"
                                                                               placeholder="لینک شبکه اجتماعی"
                                                                               value="{{$social->link}}"/>
                                                                        @error('url')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong
                                                                                class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>آیکون شبکه اجتماعی</label>
                                                                        <select class="form-control"
                                                                                name="icon">
                                                                            <option disabled selected>لطفا انتخاب کنید
                                                                            </option>
                                                                            <option
                                                                                @if($social->icon=="facebook") selected
                                                                                @endif value="facebook">facebook</option>
                                                                            <option
                                                                                @if($social->icon=="whatsapp") selected
                                                                                @endif  value="whatsapp">whatsapp</option>
                                                                            <option
                                                                                @if($social->icon=="google-plus") selected
                                                                                @endif  value="google-plus">google-plus
                                                                            </option>
                                                                            <option
                                                                                @if($social->icon=="telegram") selected
                                                                                @endif  value="telegram">telegram</option>
                                                                            <option
                                                                                @if($social->icon=="instagram") selected
                                                                                @endif  value="instagram">instagram
                                                                            </option>
                                                                            <option
                                                                                @if($social->icon=="pinterest-p") selected
                                                                                @endif  value="pinterest-p">pinterest-p
                                                                            </option>
                                                                        </select>
                                                                        @error('icon')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong class="text-danger">{{ $message }}</strong>
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
                                                        data-target="#delete{{$social->id}}"><i
                                                        class="fa fa-trash"></i> حذف
                                                </button>
                                                <div class="modal fade " id="delete{{$social->id}}"
                                                     style="display: none">
                                                    <div class="modal-dialog">
                                                        <form action="{{url('cp/socials/delete').'/'.$social->id}}"
                                                              method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">حذف شبکه اجتماعی</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>آیا از حذف {{ $social->title }} اطمینان
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
                                    <h3 class="alert alert-danger">شما باید برای ایجاد شبکه اجتماعی از طریق پنل ایجاد شبکه اجتماعی
                                        جدید، شبکه اجتماعی ایجاد کنید</h3>
                                </div>
                            @endif

                        </div>
                        <div class="box-footer text-center">
                            @if( $socials->count() > 0)
                                {{$socials->links()}}
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
