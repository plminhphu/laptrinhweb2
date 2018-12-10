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
                    <li class="active">Đăng ký</li>
                </ul>
                <div class="row">
                    <div class="span9">
                        <div class="well">
                            <h5>Đăng ký tài khoản</h5><br/>
                            <form action="{{route('register')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $err)
                                        <span>{{$err}}</span>
                                        @endforeach
                                    </div>
                                @endif
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                    <span>{{Session::get('message')}}</span>
                                </div>
                                @endif
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Họ tên:</label>
                                        <input class="span6" name="fullname" type="text" placeholder="Nhập họ tên" required="true" max="55">
                                    </div>
                                </div>
                                <div class="control-gro                                                                        up">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Email:</label>
                                        <input class="span6" name="email" type="email" placeholder="Nhập email" required="true">
                                    </div>
                                </div>
                                <div                                                class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Điện thoại:</label>
                                        <input class="span6" name="phone" type="tel" placeholder="Nhập số điện thoại" required="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Địa chỉ:</label>
                                        <input class="span6" name="address" type="text" placeholder="Nhập địa chỉ" required="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Mật khẩu:</label>
                                        <input class="span6" name="password" type="password" placeholder="Nhập mật khẩu" required="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="span2" style="text-align: left;">Nhập lại:</label>
                                        <input class="span6" name="repassword" type="password" placeholder="Nhập lại mật khẩu" required="true">
                                    </div>
                                </div>
                                <div class="controls">
                                    <label class="span2"></label>
                                    <button type="submit" class="span3 btn block">Đăng ký tài khoản</button>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <br><br>
                                        <a href="{{route('login')}}" style="text-decoration:underline">Đã có tài khoản!</a><br>
                                        <a href="{{route('repass')}}" style="text-decoration:underline">Quên mật khẩu?</a>
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
