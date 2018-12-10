@extends('admin_master')
@section('admin_content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-heart-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{@$p}} sản phẩm</div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <a href="{{route('products')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết các sản phẩm</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{@$u}} tài khoản</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('users')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết các tài khoản</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{@$c}} khách hàng</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('customers')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết các khách hàng</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-paperclip fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{@$b}} hóa đơn</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('bills')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết các hóa đơn</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-blue">
                <a href="{{route('slides')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Cài đặt trang slide show</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-blue">
                <a href="{{route('types')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Cài đặt loại sản phẩm</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-blue">
                <a href="{{route('system')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Cài đặt hệ thống</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-blue">
                <a href="{{route('bills')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Cài đặt thông tin trang</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection