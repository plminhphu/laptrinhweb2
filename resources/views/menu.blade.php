<div id="sidebar" class="span3">
    <?php if (@$sys_type): ?>
        <ul id="sideManu" class="nav nav-tabs nav-stacked">
            @foreach($product_type as $type)
            <li class="">
                <a href="{{route('product-type',$type->id)}}"><?php echo $type->name; ?></a>
            </li>
            @endforeach
        </ul>
    <?php endif; ?>
    @foreach($product_sugesst as $p)
    <div class="thumbnail">
        @if($p->promotion_price>0)
        <i class="tag"></i>
        @endif
        <img src="{{asset('images/product/'.@$p->image)}}" alt="<?php echo $p->name; ?>"/>
        <div class="caption">
            <h6><a href="{{route('product-detail',@$p->id)}}"><?php echo @$p->name; ?></a></h6>
        </div>
    </div>
    @endforeach
    <div class="thumbnail">
        <div class="caption">
            <h5>Phương thức thanh toán</h5>
            <?php if (@$sys_payment): ?>
                <img src="{{asset('images/sys/'.@$sys_payment->value)}}" alt="Payments Methods">
            <?php endif; ?>
        </div>
    </div>
</div>