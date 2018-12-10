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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="{{route('users')}}"><i class="fa fa-caret-square-o-up" style="color: #ffffff;"></i></a> Thông tin khách hàng
                </div>
                <div class="panel-body">
                    <p>
                        <span>Mã tài khoản: </span><strong> {{@$x->id}} </strong>
                    </p>
                    <p>
                        <span>Hoạt động: </span>
                        <?php
                        if (isset($x->remember_token) && $x->remember_token != "") {
                            echo '<i class="fa fa-circle" style="color:#42b72a;"></i> Đang hoạt động';
                        } else {
                            echo '<i class="fa fa-circle-o"></i> Gần nhất ' . @$x->updated_at;
                        }
                        ?>
                    </p>
                    <p>
                        <span>Token: </span><strong> {{@$x->remember_token}} </strong>
                    </p>
                    <p>
                        <span>Họ tên: </span><strong> {{@$x->full_name}} </strong>
                    </p>
                    <p>
                        <span>Email: </span><strong> {{@$x->email}} </strong>
                    </p>
                    <p>
                        <span>Số điện thoại: </span><strong> {{@$x->phone}} </strong>
                    </p>
                    <p>
                        <span>Địa chỉ: </span><strong> {{@$x->address}} </strong>
                    </p>
                    <p>
                        <span>Loại tài khoản: </span><strong> {{@$x->type}} </strong>
                    </p>
                    <p>
                        <span>Trạng thái: </span><strong> {{@$x->stt}} </strong>
                    </p>
                </div>
                <div class="panel-footer">
                    <p><span>Đã tạo:</span> {{@$x->created_at}}</p>
                    <p><span>Cập nhật:</span> {{@$x->updated_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection