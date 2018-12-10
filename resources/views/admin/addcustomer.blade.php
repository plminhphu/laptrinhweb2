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
                        <span class="input-group-addon"><Strong>Thêm mới</Strong> - <i class="fa  fa-info"></i></span>
                        <span class="input-group-addon right"></span>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form" action="{{route('addcustomer')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('mess')
                        <div class="form-group">
                            <label>Họ tên:</label>
                            <input class="form-control" name="name" type="text" placeholder="Nhập họ tên" max="55">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" name="email" type="email" placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại:</label>
                            <input class="form-control" name="phone" type="tel" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input class="form-control" name="address" type="text" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="stt" class="form-control">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm mới</button>
                        <a href="{{route('customers')}}" class="btn btn-default">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection