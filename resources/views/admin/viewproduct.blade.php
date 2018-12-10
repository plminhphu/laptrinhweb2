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
                    <a href="{{route('products')}}"><i class="fa fa-caret-square-o-up" style="color: #ffffff;"></i></a> Thông tin sản phẩm
                </div>
                <div class="panel-body">
                    <p>
                        <span>Mã sản phẩm: </span><strong> {{@$x->id}} </strong>
                    </p>
                    <p>
                        <span>Tên sản phẩm: </span><strong> {{@$x->name}} </strong>
                    </p>
                    <p>
                        <span>Loại sản phẩm: </span><strong> <a href="{{route('viewtype',@$x->id_type)}}">Xem loại SP {{@$x->id_type}}</a> </strong>
                    </p>
                    <p>
                        <span>Mô tả: </span><span> <?php echo @$x->description; ?> </span>
                    </p>
                    <p>
                        <span>Đơn giá: </span><strong> {{@$x->unit_price}} </strong>
                    </p>
                    <p>
                        <span>Giá sale: </span><strong> {{@$x->promotion_price}} </strong>
                    </p>
                    <p>
                        <span>Đơn vị tính: </span><strong> {{@$x->unit}} </strong>
                    </p>
                    <p>
                        <span>Hot: </span><strong> {{@$x->new}} </strong>
                    </p>
                    <p>
                        <span>Trạng thái: </span><strong> {{@$x->stt}} </strong>
                    </p>
                    <p>
                        <p>Hình ảnh: </p>
                        <img style="max-width: 500px;" src="{{asset('images/product/'.$x->image)}}" alt="{{$x->name}}"/>
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