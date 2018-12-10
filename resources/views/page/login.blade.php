@extends('master')
@section('content')
<div id="mainBody">
    <div class="container">
        <div class="row">
            @include('menu')
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Trang chủ</a> <span class="divider">/</span></li>
                    <li class="active">Đăng nhập</li>
                </ul>
                <div class="row">
                    <div class="span9">
                        <div class="well">
                            <h5>Đăng nhập</h5><br/>
                            <form action="{{route('login')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                        <span>{{$err}}</span>
                                        @endforeach
                                    </div>
                                @endif
                                @if(Session::has('alert'))
                                    <div class="alert alert-{{Session::get('alert')}}">
                                        <span>{{Session::get('message')}}</span>
                                    </div>
                                @endif
                                <div class="control-gro                                                                        up">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Email:</label>
                                        <input class="span6" name="email" type="email" placeholder="Nhập email" required="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Mật khẩu:</label>
                                        <input class="span6" name="password" type="password" placeholder="Nhập mật khẩu" required="true">
                                    </div>
                                </div>
                                <div class="controls">
                                    <label class="span2"></label>
                                    <button type="submit" class="span3 btn block">Đăng nhập</button>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <br><br>
                                        <span>Chưa có tài khoản? </span><a href="{{route('register')}}" style="text-decoration:underline">Đăng ký ngay.</a><br>
                                        <span>Quên mật khẩu? </span><a href="{{route('repass')}}" style="text-decoration:underline">Lấy lại mật khẩu.</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	

            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
@endsection
