@extends('pages.profile')
@section('profile')
    @if($projects->count() > 0)

    <div class="row">
        <div class="col-md-12 table-responsive">
            <h3>پروژه های من</h3>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان پروژه</th>
                        <th>مالک</th>
                        <th>وضعیت</th>
                        <th>گالری پروژه</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $index => $project)
                        <tr>
                            <td>{{++$index}}</td>
                            <td><a href="{{url('projects').'/'.$project->id}}"> {{$project->title}} </a></td>
                            <td>{{$project->malek}}</td>
                            <td>
                                @if($project->status=="on")
                                    <span class="btn btn-success btn-sm">تایید شده</span>
                                @else
                                    <span class="btn btn-danger btn-sm">در انتظار تایید</span>
                                @endif
                            </td>
                            <td>@if($project->status!="on")<a href="{{url('profile/projects/gallery').'/'.$project->id}}" class="btn btn-info btn-sm">گالری تصاویر پروژه</a>@endif</td>
                            <td>
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
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
                                                    <h4 class="modal-title"></h4>
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
                                @if($project->status!="on")
                                <a class="btn btn-warning btn-sm" href="{{url('profile/projects/edit').'/'.$project->id}}"><i class="fa fa-edit"></i>
                                    ویرایش
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <br>
    <button type="button" class="btn btn-success" id="btnAdd">افزودن پروژه جدید</button>
    <button type="button" class="btn btn-danger" id="btnClose">انصراف و بستن</button>
    <form action="{{url('profile/projects/new')}}" method="post" enctype="multipart/form-data" id="frmNewProject">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <lable>عنوان پروژه</lable>
                <input type="text" name="title" class="form-input" placeholder="عنوان پروژه">
            </div>
            <div class="form-group">
                <label>توضیحات پروژه</label>
                <textarea id="description" name="body" rows="10" cols="80">متن توضیح پروژه ...</textarea>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <lable>بودجه ساخت پروژه</lable>
                    <input type="text" name="boodje" class="form-input" placeholder="بودجه ساخت پروژه">
                </div>
                <div class="form-group">
                    <lable>متراژ پروژه</lable>
                    <input type="text" name="metraj" class="form-input" placeholder="متراژ">
                </div>
                <div class="form-group">
                    <lable>قرارداد</lable>
                    <input type="text" name="contract" class="form-input" placeholder="قرارداد">
                </div>
                <div class="form-group">
                    <lable>مالک</lable>
                    <input type="text" name="malek" class="form-input" placeholder="مالک">
                </div>
                <div class="form-group">
                    <lable>طراحان</lable>
                    <input type="text" name="tarah" class="form-input" placeholder="طراحان">
                </div>
                <div class="form-group">
                    <lable>ناظران</lable>
                    <input type="text" name="nazer" class="form-input" placeholder="ناظران">
                </div>
                <div class="form-group">
                    <lable>آدرس</lable>
                    <input type="text" name="location" class="form-input" placeholder="آدرس">
                </div>



                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input" placeholder="کد امنیتی">
                </div>

                <button type="submit" class="button button-primary">ثبت پروژه جدید</button>

        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="form-group">
                    <lable>تصویر شاخص پروژه</lable>
                    <input type="file" name="imgSrc" class="form-input" id="imgFile">
                </div>
            <img src="{{asset('images/nia.jpg')}}" id="imgPreview" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
        </div>
    </div>
    </form>
@endsection
@section('script')
    <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('description');
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#frmNewProject").hide();
            $("#btnClose").hide();
            $("#imgPreview").hide();
            $("#imgFile").change(function () {
                readURL(this);
            });
            $("#btnAdd").click(function () {
                $("#frmNewProject").fadeIn();
                $("#btnClose").fadeIn();
                $("#btnAdd").hide();
            });
            $("#btnClose").click(function () {
                $("#frmNewProject").hide();
                $("#btnClose").hide();
                $("#btnAdd").fadeIn();
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imgPreview").fadeIn();
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
