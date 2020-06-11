@extends('pages.profile')
@section('profile')
    <h3>اطلاعات مجری</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('profile/mojri/update')}}" method="post">
                @csrf
                <div class="form-group">
                    <lable>نوع عضویت</lable>

                    <br><br>
                    <input type="radio" name="type" @if($mojri->type == 1) checked @endif value="1"> حقوقی&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="type" @if($mojri->type == 0) checked @endif value="0"> حقیقی
                </div>
                <div class="form-group">
                    <lable>شماره پروانه</lable>
                    <input type="text" name="parvaneh" class="form-input" placeholder="شماره پروانه" value="{{$mojri->parvaneh}}">
                </div>
                <div class="form-group">
                    <lable>شماره عضویت</lable>
                    <input type="text" name="ozviat" class="form-input" placeholder="شماره عضویت" value="{{$mojri->ozviat}}">
                </div>
                <div class="form-group">
                    <lable>پایه اجرا</lable>
                    <select class="form-input" name="pejra">
                        <option value="0" selected disabled>لطفا انتخاب کنید</option>
                        <option value="1" @if($mojri->pejra == 1) selected @endif>پایه سه</option>
                        <option value="2" @if($mojri->pejra == 2) selected @endif>پایه دو</option>
                        <option value="3" @if($mojri->pejra == 3) selected @endif>پایه یک</option>
                        <option value="4" @if($mojri->pejra == 4) selected @endif>پایه ارشد</option>
                    </select>
                </div>
                <div class="form-group">
                    <lable>تاریخ شروع فعالیت</lable>
                    <input type="text" name="dtactive" class="form-input" placeholder="تاریخ شروع فعالیت" value="{{$mojri->dtactive}}">
                </div>
                <div class="form-group">
                    <lable>تاریخ صدور پروانه</lable>
                    <input type="text" name="dtsodoor" class="form-input" placeholder="تاریخ صدور پروانه" value="{{$mojri->dtsodoor}}">
                </div>
                <div class="form-group">
                    <lable>تاریخ اعتبار پروانه</lable>
                    <input type="text" name="etebar" class="form-input" placeholder="تاریخ اعتبار پروانه" value="{{$mojri->etebar}}">
                </div>
                <div class="form-group">
                    <lable>ظرفیت تعدادی</lable>
                    <input type="text" name="zarfiatTD" class="form-input" placeholder="ظرفیت تعدادی" value="{{$mojri->zarfiatTD}}">
                </div>
                <div class="form-group">
                    <lable>ظرفیت متراژی</lable>
                    <input type="text" name="zarfiatMetraj" class="form-input" placeholder="ظرفیت متراژی" value="{{$mojri->zarfiatMetraj}}">
                </div>


                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;

                <div class="form-group">
                    <lable>کد امنیتی</lable>
                    <input type="text" name="captcha" class="form-input">
                </div>

                <button type="submit" class="button button-primary">بروزرسانی</button>
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
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
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
