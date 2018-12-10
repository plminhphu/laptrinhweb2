@extends('master')
@section('content')
<div id="mainBody">
    <div class="container">
        <div class="row">
            @include('menu')
            <div class="span9" id="mainCol">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Trang chủ</a> <span class="divider">/</span></li>
                    <li class="active">Thông tin</li>
                </ul>
                <?php echo @$sys_about->value; ?>
            </div>
        </div></div>
</div>
<!-- MainBody End ============================= -->
@endsection