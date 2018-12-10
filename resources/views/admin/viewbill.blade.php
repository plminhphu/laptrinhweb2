@extends('admin_master')
@section('admin_content')
<div id="page-wrapper" style="min-height: 295px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="{{route('bills')}}"><i class="fa fa-caret-square-o-up" style="color: #ffffff;"></i></a> Thông tin hóa đơn
                </div>
                <div class="panel-body">
                    <p>
                        <span>Mã hóa đơn: </span><strong> {{@$b->id}} </strong>
                    </p>
                    <p>
                        <span>Mã khách hàng: </span><strong> <a href="{{route('viewcustomer',@$b->id_customer)}}">Xem KH {{@$b->id_customer}}</a> </strong>
                    </p>
                    <p>
                        <span>Ngày đặt hàng: </span><strong> {{@$b->date_order}} </strong>
                    </p>
                    <p>
                        <span>Tổng tiền: </span><strong> {{number_format(@$b->total)}}đ </strong>
                    </p>
                    <p>
                        <span>Hình thức thanh toán: </span><strong> {{@$b->payment}} </strong>
                    </p>
                    <p>
                        <span>Ghi chú: </span><p> {{@$b->note}} </p>
                    </p>
                    <p>
                        <span>Mã giảm giá: </span><strong> {{@$b->code}} </strong>
                    </p>
                    <p>
                        <span>Trạng thái: </span>
                        <?php if (@$b->stt == "0" || @$b->stt == ""): ?>
                            <strong> Đang chờ xác nhận </strong>
                        <?php endif; ?>
                        <?php if (@$b->stt == "1"): ?>
                            <strong> Đang giao hàng </strong>
                        <?php endif; ?>
                        <?php if (@$b->stt == "2"): ?>
                            <strong> Đã thanh toán </strong>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="panel-footer">
                    <p><span>Đã tạo:</span> {{@$b->created_at}}</p>
                    <p><span>Cập nhật:</span> {{@$b->updated_at}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a href="{{route('bills')}}"><i class="fa fa-caret-square-o-up" style="color: #ffffff;"></i></a> Chi tiết hóa đơn
                </div>
                <div class="panel-body">
                    <?php $j = 1; ?>
                    <?php foreach (@$bd as $i): ?>
                        <span>Số thứ tự: </span><strong> {{@$j}} </strong>
                        <ul>
                            <li><span>Sản phẩm: </span><strong> <a href="{{route('viewproduct',@$i->id)}}">Xem SP {{@$i->id_product}}</a> </strong></li>
                            <li><span>Số lượng: </span><strong> {{@$i->quantity}} </strong></li>
                            <li><span>Đơn giá: </span><strong> {{@number_format(@$i->unit_price)}} </strong></li>
                        </ul>
                        <?php $j++; ?>
                    <?php endforeach; ?>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection