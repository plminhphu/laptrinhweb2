<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('dashboard')}}"><i class="fa fa-home"></i> Quản trị</a>
    </div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{route('home')}}"><i class="fa fa-university"></i> Trang web</a></li>
    </ul>
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo Auth::user()->full_name; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a ><i class="fa fa-user fa-fw"></i> Quyền <?php echo Auth::user()->type; ?></a>
                </li>
                <li><a href="{{route('profile_admin')}}"><i class="fa fa-gear fa-fw"></i> Tài khoản</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{route('logoutadmin')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
                <li>
                    <a href="{{route('dashboard')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a  href="{{route('types')}}"><i class="fa fa-tags"></i> Loại sản phẩm</a>
                </li>
                <li>
                    <a  href="{{route('products')}}"><i class="fa fa-heart-o"></i> Sản phẩm</a>
                </li>
                <li>
                    <a  href="{{route('slides')}}"><i class="fa fa-tv"></i> Trang Slide</a>
                </li>
                <li>
                    <a  href="{{route('users')}}"><i class="fa fa-user"></i> Tài khoản</a>
                </li>
                <li>
                    <a  href="{{route('customers')}}"><i class="fa fa-users"></i> Khách hàng</a>
                </li>
                <li>
                    <a  href="{{route('bills')}}"><i class="fa fa-paperclip"></i> Hóa đơn</a>
                </li>
                <li>
                    <a  href="{{route('system')}}"><i class="fa fa-cogs"></i> Cài đặt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>