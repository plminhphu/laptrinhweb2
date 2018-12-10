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
                    <form class="form" action="{{route('addproduct')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('mess')
                        <div class="form-group">
                            <label>Tên loại:</label>
                            <input class="form-control" name="name" type="text" placeholder="Nhập tên sản phẩm" >
                        </div>
                        <div class="form-group">
                            <label>Loại:</label>
                            <select name="id_type" class="form-control">
                                <?php foreach ($ts as $t): ?>
                                <option value="{{$t->id}}">{{$t->name}}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đơn giá:</label>
                            <input class="form-control" name="unit_price" type="number">
                        </div>
                        <div class="form-group">
                            <label>Giá sale:</label>
                            <input class="form-control" name="promotion_price" type="number" value="0">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="form-group">
                            <label>Đơn vị:</label>
                            <select name="unit" class="form-control">
                                <option value="cái">Cái</option>
                                <option value="hộp">Hộp</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đánh dấu Hot:</label>
                            <select name="new" class="form-control">
                                <option value="0">Có</option>
                                <option value="1">Không</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="stt" class="form-control">
                                <option value="ON">ON</option>
                                <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea id="demo" class="form-control ckeditor" name="description" placeholder="Nhập mô tả sản phẩm" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm mới</button>
                        <a href="{{route('products')}}" class="btn btn-default">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection