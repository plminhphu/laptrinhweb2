@extends('master')
@section('content')
<!-- Header End====================================================================== -->
<div id="carouselBlk">
    <?php if (@$sys_slide): ?>
        <div id="myCarousel" class="carousel slide">
            <div id="carouselBlk">
                <?php if (@$sys_slide->stt == "ON"): ?>
                    <div style="height: 220px;" id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $i = TRUE; ?>
                            @foreach($slides as $sl)
                            <div class="item <?php
                            if ($i == TRUE) {
                                echo "active";
                                $i = FALSE;
                            }
                            ?>">
                                <div class="content container" title="<?php echo @$sl->description; ?>">
                                    <a href="{{route('product-detail',@$sl->id)}}">
                                        <img class="img-reponsive" style="width: 95%; height: 200px;" src="{{asset('images/slide/'.$sl->image)}}" alt="{{route('product-detail',@$sl->id)}}"/>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                @include('menu')
                <!-- Sidebar end=============================================== -->
                <div class="span9">		
                    <div class="well well-small">
                        <h4>Mới nhất</h4>
                        <div class="row-fluid">
                            <div id="featured" class="carousel slide">
                                <div class="thumbnails">
                                    @foreach($new_product as $np)
                                    <div class="span3">
                                        <div class="thumbnail">
                                            @if($np->promotion_price>0)
                                            <i class="tag"></i>
                                            @endif
                                            <img style="height: 200px;" src="{{asset('images/product/'.$np->image)}}" alt="">						
                                            <div class="caption" style="height: 150px;">
                                                <a href="{{route('product-detail',@$np->id)}}"><h5><?php echo $np->name; ?></h5></a>
                                                <div style="margin-bottom: 30px;">
                                                    @if($np->promotion_price==0)
                                                    <span class="pull-left"><?php echo number_format($np->unit_price); ?>đ</span>
                                                    @else
                                                    <span class="pull-left"  style="text-decoration: line-through;"><?php echo number_format($np->unit_price); ?>đ</span>
                                                    <span class="pull-right"><?php echo number_format($np->promotion_price); ?>đ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Đang Sales</h4>
                    <ul class="thumbnails">
                        @foreach($sale_product as $sp)
                        <li class="span3">
                            <div class="thumbnail">
                                @if($sp->promotion_price>0)
                                <i class="tag"></i>
                                @endif
                                <img  style="height: 250px;" src="{{asset('images/product/'.$sp->image)}}"/>
                                <div class="caption" style="height: 120px;">
                                    <h5><?php echo $sp->name; ?></h5>
                                    <div style="margin-bottom: 30px;">
                                    </div>
                                    <h4 style="text-align:center">
                                        <a class="btn" href="{{route('product-detail',@$sp->id)}}"> <i class="icon-zoom-in"></i></a>
                                        <a class="btn" href="{{route('addtocart',@$sp->id)}}"><i class="icon-shopping-cart"></i></a>
                                        @if($sp->promotion_price==0)
                                        <a class="btn"><?php echo number_format($sp->unit_price); ?>đ</a>
                                        @else
                                        <a class="btn"><?php echo number_format($sp->promotion_price); ?>đ</a>
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="pagination">
                        <?php echo $sale_product->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection