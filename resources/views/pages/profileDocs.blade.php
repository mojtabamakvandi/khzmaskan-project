@extends('pages.profile')
@section('profile')
    <h3>مستندات</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('profile/documents/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>عنوان سند</label>
                    <input type="text" class="form-input" name="title" placeholder="عنوان سند">
                </div>
                <div class="form-group">
                    <label>فایل سند</label>
                    <input type="file" class="form-input" name="doc" id="imgFile">
                </div>
                <img src="{{asset('images/nia.jpg')}}" id="imgPreview" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px">
                <br>
                <br>
                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input" placeholder="کد امنیتی">
                </div>

                <button type="submit" class="button button-primary">بارگزاری فایل</button>
            </form>
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
            <div class="row">
                @foreach($docs as $doc)
                    <div class="col-md-6 mb-3">
                        <span style="background-color: darkred;position: absolute;border-radius: 0 5px 0 5px;top: 0;right: 25px;padding: 5px;color: whitesmoke"><a href="{{url('profile/documents/delete').'/'.$doc->id}}">حذف</a> </span>
                        <a href="{{asset('images/documents').'/'.$doc->url}}" target="_blank">
                            <img src="{{asset('images/documents').'/'.$doc->url}}" style="width: 100%;height: auto;border-radius: 5px;border: 1px solid #ccc;padding: 5px;box-shadow: -5px 5px 5px #ccc;">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#imgPreview").hide();
            $("#imgFile").change(function () {

                readURL(this);
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
