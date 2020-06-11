<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ورود | سازندگان مسکن و ساختمان</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/square.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .form-control{
            background: rgba(255,255,255,0.2);
            color: #1a2226;
            border: 1px dotted #1a2226;
            text-align: center;
        }
        .login-box-body{
            color: #1a2226;
            background: rgba(255,255,255,0.1);
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>سازندگان مسکن و ساختمان</b></a>
    </div>
    @yield('content')
</div>

<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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
</body>
</html>
