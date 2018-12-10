@extends('master')
@section('content')
<div id="mainBody">
    <div class="container">
        <div class="row">
            @include('menu')
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Trang chủ</a> <span class="divider">/</span></li>
                    <li><a href="{{route('allproduct')}}">Sản phẩm</a> <span class="divider">/</span></li>
                    <li class="active"><?php echo $product_detail->name; ?></li>
                </ul>	
                <div class="row">	  
                    <div id="gallery" class="span3">
                        <a title="{{$product_detail->name}}">
                            <img src="{{asset('images/product/'.$product_detail->image)}}" style="width:100%" alt="{{$product_detail->name}}"/>
                        </a>
                    </div>
                    <div class="span6">
                        <h3><?php echo $product_detail->name; ?></h3>
                        <small><?php echo "Ngày: ". date(@Session::get('date')->value, strtotime($product_detail->updated_at)); ?></small>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <label class="control-label">
                                    @if($product_detail->promotion_price == 0)
                                    <p>Giá bán: <?php echo number_format($product_detail->unit_price); ?>{{@Session::get('unit')->value}}</p>
                                    @else
                                    <p>Giá bán: <s><?php echo number_format($product_detail->unit_price); ?></s>{{@Session::get('unit')->value}}<br></p>
                                    <p>Chỉ còn: <?php echo number_format($product_detail->promotion_price); ?>{{@Session::get('unit')->value}}</p>
                                    @endif
                                </label>    
                            </div>
                            <a class="btn" href="{{route('addtocart',$product_detail->id)}}"><i class="icon-shopping-cart"></i> Thêm vào giỏ hàng</a>
                        </form>
                    </div>
                    <div class="span9">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
                            <li><a href="#profile" data-toggle="tab">Sản phẩm liên quan</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4>
                                    <?php echo $product_detail->description; ?>
                                </h4>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="tab-pane  active" id="blockView">
                                    <div class="tab-pane" id="listView">
                                        @foreach($products as $p)
                                        <div class="row">	  
                                            <div class="span2">
                                                <img style="height: 100px;" src="{{asset('images/product/'.$p->image)}}" alt=""/>
                                            </div>
                                            <div class="" style="height: 150px;">
                                                <h3><a href="{{route('product-detail',@$p->id)}}"><?php echo $p->name; ?></a></h3>	
                                                <h4>Giá: <?php echo number_format($p->unit_price); ?>{{@Session::get('unit')->value}}</h4>
                                            </div>
                                        </div>
                                        <hr class="soft"/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> </div>
</div>
<!-- MainBody End ============================= -->
@endsection