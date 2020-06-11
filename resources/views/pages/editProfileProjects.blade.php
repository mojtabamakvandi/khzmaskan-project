@extends('pages.profile')
@section('profile')
    <h3>ویرایش پروژه <span class="pull-right"><a href="{{url('profile/projects')}}" class="btn btn-danger">بازگشت</a></span></h3>
<br/>
<br/>
    <form action="{{url('profile/projects/').'/'.$project->id.'/update'}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <lable>عنوان پروژه</lable>
                <input type="text" name="title" class="form-input" placeholder="عنوان پروژه" value="{{$project->title}}">
            </div>
            <div class="form-group">
                <label>توضیحات پروژه</label>
                <textarea id="description" name="body" rows="10" cols="80">{{$project->body}}</textarea>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <lable>بودجه ساخت پروژه</lable>
                    <input type="text" name="boodje" class="form-input" placeholder="بودجه ساخت پروژه" value="{{$project->boodje}}">
                </div>
                <div class="form-group">
                    <lable>متراژ پروژه</lable>
                    <input type="text" name="metraj" class="form-input" placeholder="متراژ" value="{{$project->metraj}}">
                </div>
                <div class="form-group">
                    <lable>قرارداد</lable>
                    <input type="text" name="contract" class="form-input" placeholder="قرارداد" value="{{$project->contract}}">
                </div>
                <div class="form-group">
                    <lable>مالک</lable>
                    <input type="text" name="malek" class="form-input" placeholder="مالک" value="{{$project->malek}}">
                </div>
                <div class="form-group">
                    <lable>طراحان</lable>
                    <input type="text" name="tarah" class="form-input" placeholder="طراحان" value="{{$project->tarah}}">
                </div>
                <div class="form-group">
                    <lable>ناظران</lable>
                    <input type="text" name="nazer" class="form-input" placeholder="ناظران" value="{{$project->nazer}}">
                </div>
                <div class="form-group">
                    <lable>آدرس</lable>
                    <input type="text" name="location" class="form-input" placeholder="آدرس" value="{{$project->location}}">
                </div>



                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input" placeholder="کد امنیتی">
                </div>

                <button type="submit" class="button button-primary">بروزرسانی</button>

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
            <img src="{{asset('images/projects/').'/'.$project->imgSrc}}" id="imgPreview" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
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
            $("#imgFile").change(function () {
                readURL(this);
            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
