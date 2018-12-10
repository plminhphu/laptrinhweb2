<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="{{asset('login/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/styles.css')}}">
</head>
<body>
    <div id="container">
        <form method="post" action="{{route('loginadmin')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="name">Email:</label>
            <input name="email" type="email">
            <label for="username">Mật khẩu:</label>
            <input name="password" type="password">
            <div id="lower">
                <input type="checkbox" checked="true"><label class="check" for="checkbox">Lưu mật khẩu</label>
                <input type="submit" value="OK">
                @include('mess')
            </div>
        </form>
    </div>
</body>
</html>
