<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>{{@$sys_title->value}}</title>
        <link rel="shortcut icon" href="{{asset('images/sys/'.@$sys_logo->value)}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{@$sys_title->value}}">
        <meta name="author" content="PL Minh Phú">
        <link id="callCss" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" media="screen"/>	
        <link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/base.css')}}" rel="stylesheet" media="screen"/>
        <link href="{{asset('css/mp.css')}}" rel="stylesheet"/>
    </head>
    <body>
        @include('header')
        @yield('content')
        @include('footer')
    </body>
    <link href="{{asset('js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
    <script src="{{asset('CKEditorStandardButton/ckeditor.js')}}"></script>
    <link href="{{asset('CKEditorStandardButton/ckeditor.css')}}" rel="stylesheet"/>
</html>