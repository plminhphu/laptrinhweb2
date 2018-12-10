@extends('admin_master')
@section('admin_content')
<div id="page-wrapper" style="min-height: 295px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-group input-group">
                        <span class="input-group-addon left"></span>
                        <span class="input-group-addon"><Strong>Chỉnh sửa tài khoản</Strong> - <i class="fa  fa-info"></i></span>
                        <span class="input-group-addon right"></span>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form" action="{{route('profile_admin')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('mess')
                        <div class="form-group">
                            <label>Họ tên:</label>
                            <input class="form-control" name="fullname" value="{{@$u->full_name}}" type="text" placeholder="Nhập họ tên" max="55">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại:</label>
                            <input class="form-control" name="phone" value="{{@$u->phone}}" type="tel" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input class="form-control" name="address" value="{{@$u->address}}" type="text" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại:</label>
                            <input class="form-control" name="repassword" type="password" placeholder="Nhập lại mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-default">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection