@extends('pages.profile')
@section('style')
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <style>
        .imageBox{
            padding: 5px;
            border: 1px solid #bbb;
            margin-bottom: 30px;
            border-radius: 5px;
            box-shadow: -5px 10px 10px rgba(0,0,0,0.3) ;
        }
        .imageProject{
            width: 100%;
            height: auto;
            margin: 0 auto;
            border-radius: 5px;

        }
        .imageDelete{
            padding: 5px 10px;
            background-color: darkred;
            color: white;
            position: absolute;
            bottom: 36px;
            right: 31px;
            border-radius: 0 0 5px 0 ;
            transition: 0.3s;
        }
        .imageDelete:hover {
            background-color: red;
            color: whitesmoke;
        }
    </style>
@endsection
@section('profile')
    <div class="content-wrapper">
        <h3>گالری پروژه <span class="pull-right"><a href="{{url('profile/projects')}}" class="btn btn-danger">بازگشت</a></span></h3>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <br>
                    <br>
                    <form action="{{url('cp/projects/gallery/upload').'/'.$project->id}}"
                          class="dropzone"
                          enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <div class="dz-message" data-dz-message><h3 class="text-center">تصاویر را اینجا بکشید یا کلیک کنید</h3></div>
                    </form>
                    <br>
                    <br>
                    <br>
                </div>

                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header bg-purple-gradient">
                            <h3 class="box-title">تصاویر موجود</h3>
                            <br>
                            <br>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                @foreach($images as $image)
                                    <div class="col-md-3">
                                        <div class="imageBox">
                                            <img src="{{asset('images/projects/gallery').'/'.$image->src}}" class="imageProject" style=""/>
                                            <form action="{{url('cp/projects/gallery/delete').'/'.$image->id}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn imageDelete">حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/dropzone.min.js')}}"></script>
@endsection
