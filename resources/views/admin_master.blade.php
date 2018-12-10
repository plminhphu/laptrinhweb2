<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>ADMIN || {{@$sys_title->value}}</title>
        <link rel="shortcut icon" href="{{asset('images/sys/'.@$sys_logo->value)}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{@$sys_title->value}}">
        <meta name="author" content="PL Minh Phú">
        <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/css/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/css/timeline.css')}}" rel="stylesheet">
        <link href="{{asset('css/css/startmin.css')}}" rel="stylesheet">
        <link href="{{asset('css/css/morris.css')}}" rel="stylesheet">
        <link href="{{asset('css/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            @include('admin_header')
            @yield('admin_content')
        </div>
        <script src="{{asset('js/js/jquery.min.js')}}"></script>
        <script src="{{asset('js/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('js/js/raphael.min.js')}}"></script>
        <script src="{{asset('js/js/morris.min.js')}}"></script>
        <script src="{{asset('js/js/morris-data.js')}}"></script>
        <script src="{{asset('js/js/startmin.js')}}"></script>
        <script src="{{asset('CKEditorFullColor/ckeditor.js')}}"></script>
        <link href="{{asset('CKEditorFullColor/ckeditor.css')}}" rel="stylesheet"/>
    </body>
</html>
