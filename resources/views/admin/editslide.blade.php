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
                    <form class="form" action="{{route('editslide')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$x->id}}">
                        @include('mess')
                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <image src="{{asset('images/slide/'.$x->image)}}" style="max-height: 150px; margin: 10px;">
                            <input name="old_image" type="hidden" value="{{$x->image}}">
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="form-group">
                            <label>Liên kết:</label>
                            <select name="link" class="form-control">
                                <?php foreach (@$xs as $xx): ?>
                                    <?php if (@$xx->id == @$x->link): ?>
                                        <option value="{{@$xx->id}}" selected="true">{{@$xx->name}}</option>
                                    <?php else: ?>
                                        <option value="{{@$xx->id}}">{{@$xx->name}}</option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
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
                        <button type="submit" class="btn btn-default">Lưu lại</button>
                        <a href="{{route('slides')}}" class="btn btn-default">Hủy bỏ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection