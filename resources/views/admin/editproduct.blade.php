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
                        <span class="input-group-addon"><strong>Chỉnh sửa :: {{$x->id}} - {{$x->name}}</strong> - <i class="fa  fa-info"></i></span>
                        <span class="input-group-addon right"></span>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form" action="{{route('editproduct')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$x->id}}">
                        @include('mess')
                        <div class="form-group">
                            <label>Tên loại:</label>
                            <input class="form-control" name="name" value="{{$x->name}}" type="text" placeholder="Nhập tên sản phẩm" >
                        </div>
                        <div class="form-group">
                            <label>Loại:</label>
                            <select name="id_type" class="form-control">
                                <?php foreach ($ts as $t): ?>
                                    <option value="{{$t->id}}"
                                    <?php
                                    if ($x->id_type == $t->id) {
                                        echo ' selected="true"';
                                    }
                                    ?>
                                            >{{$t->name}}</option>
                                        <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đơn giá:</label>
                            <input class="form-control" name="unit_price" type="number" value="{{$x->unit_price}}">
                        </div>
                        <div class="form-group">
                            <label>Giá sale:</label>
                            <input class="form-control" name="promotion_price" type="number" value="{{$x->promotion_price}}" >
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <image src="{{asset('images/product/'.$x->image)}}" style="max-height: 150px; margin: 10px;">
                            <input name="old_image" type="hidden" value="{{$x->image}}">
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="form-group">
                            <label>Đơn vị:</label>
                            <select name="unit" class="form-control">
                                <?php if ($x->unit == "cái"): ?>
                                    <option value="cái" selected="true">Cái</option>
                                    <option value="hộp">Hộp</option>
                                <?php else: ?>
                                    <option value="cái">Cái</option>
                                    <option value="hộp" selected="true">Hộp</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đánh dấu Hot:</label>
                            <select name="new" class="form-control">
                                <?php if ($x->new == "0"): ?>
                                    <option value="0" selected="true">Có</option>
                                    <option value="1">Không</option>
                                <?php else: ?>
                                    <option value="0">Có</option>
                                    <option value="1" selected="true">Không</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="stt" class="form-control">
                                <?php if ($x->stt == "ON"): ?>
                                    <option value="ON" selected="true">ON</option>
                                    <option value="OFF">OFF</option>
                                <?php else: ?>
                                    <option value="ON">ON</option>
                                    <option value="OFF" selected="true">OFF</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea id="demo" class="form-control ckeditor" name="description" placeholder="Nhập mô tả sản phẩm" rows="5">{{$x->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Lưu lại</button>
                        <a href="{{route('products')}}" class="btn btn-default">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection