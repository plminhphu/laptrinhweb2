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
                    <a href="{{route('types')}}"><i class="fa fa-caret-square-o-up" style="color: #ffffff;"></i></a> Thông tin loại sản phẩm
                </div>
                <div class="panel-body">
                    <p>
                        <span>Mã loại sản phẩm: </span><strong> {{@$x->id}} </strong>
                    </p>
                    <p>
                        <span>Tên loại sản phẩm: </span><strong> {{@$x->name}} </strong>
                    </p>
                    <p>
                        <span>Mô tả: </span><span> <?php echo @$x->description; ?> </span>
                    </p>
                    <p>
                        <span>Trạng thái: </span><strong> {{@$x->stt}} </strong>
                    </p>
                    <p>
                        <p>Hình ảnh: </p>
                        <img style="max-width: 500px;" src="{{asset('images/type/'.$x->image)}}" alt="{{$x->name}}"/>
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