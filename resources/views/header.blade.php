<div id="header">
    <div class="container">
        <div class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <ul id="topMenu" class="nav">
                    <li>
                        <a href="{{route('home')}}" style="padding: 0; margin: 0; left: 0;">
                            <img class="img-reponsive" width="100" src="{{asset('images/sys/'.@$sys_logo->value)}}"/>
                        </a>
                    </li>
                    <li style="margin: 20px;">
                        <span class="btn"><a href="{{route('allproduct')}}">Sản phẩm</a></span>
                    </li>
                    <li style="margin: 20px;">
                        <span class="btn"><a href="{{route('about')}}">Thông tin</a></span>
                    </li>
                    <li style="margin: 20px;">
                        <span class="btn"><a href="{{route('contact')}}">Liên hệ</a></span>
                    </li>
                    @if(Auth::check())
                    <li class="dropdown-mp" style="margin: 20px;">
                        <span class="dropbtn-mp btn">Tài khoản</span>
                        <span class="dropdown-content-mp-s">
                            <a href="{{route('profile')}}">{{Auth::user()->full_name}}</a><br>
                            <a href="{{route('logout')}}">Đăng xuất</a>
                        </span>
                    </li>
                    @else
                    <li class="dropdown-mp" style="margin: 20px;">
                        <span class="dropbtn-mp btn">Tài khoản</span>
                        <span class="dropdown-content-mp-s">
                            <a href="{{route('login')}}">Đăng nhập</a><br>
                            <a href="{{route('register')}}">Đăng ký</a>
                        </span>
                    </li>
                    @endif
                    <div class="row" style="margin: 20px; float:right;">
                        @if(Session::has('cart'))
                        <div class="dropdown-mp">
                            <button class="dropbtn-mp btn">Giỏ Hàng: {{Session('cart')->totalQty}} sản phẩm</button>
                            <div class="dropdown-content-mp">
                                @foreach ($product_cart as $product)
                                <a href="{{route('product-detail',@$product['item']['id'])}}" title="{{$product['item']['name']}} - {{number_format($product['item']['unit_price'])}}đ">
                                    <img class="img-reponsive" width="100" src="{{asset('images/product/'.$product['item']['image'])}}" alt="{{$product['item']['name']}}">
                                </a>
                                <span> X {{$product['qty']}}</span>
                                <span> = {{number_format($product['item']['unit_price']*$product['qty'])}}đ. </span>
                                <a class="btn" href="{{route('addtocart',$product['item']['id'])}}" title="Tăng 1"><i class="icon-plus"></i></a>
                                <a class="btn" href="{{route('reducecart',$product['item']['id'])}}" title="Giảm 1"><i class="icon-minus"></i></a>
                                <a class="btn" href="{{route('deletecart',$product['item']['id'])}}" title="Xóa tất"><i class="icon-remove icon-white"></i></a>
                                <hr>
                                @endforeach
                                <a class="btn" href="{{route('payment')}}">Tổng cộng: {{number_format(Session('cart')->totalPrice)}}đ. Thanh toán ngay!</a>
                            </div>
                        </div>
                        @else
                        <div class="dropdown" style="float:right;">
                            <button class="dropbtn btn">Giỏ Hàng: Trống</button>
                        </div>
                        @endif
                    </div>
                </ul>
            </div>
        </div>
        <div class="navbar">
            <?php echo @$sys_header->value; ?>
        </div>
    </div>
</div>
