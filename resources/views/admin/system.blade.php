@extends('admin_master')
@section('admin_content')
<div id="page-wrapper" style="min-height: 295px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-cogs"></i> Cài đặt hệ thống
        </div>
        <div class="panel-body row">
            @include('mess')
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$logo->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$logo->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn:
                                <?php if (@$logo->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$logo->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$logo->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$logo->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('syslogo')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <image src="{{asset('images/sys/'.@$logo->value)}}" class="img-reponsive" style="width: 100px;">
                                <input name="old_image" type="hidden" value="{{@$logo->image}}">
                                <input class="form-control" name="image" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$title->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$title->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn:
                                <?php if (@$title->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$title->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$title->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$title->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('systitle')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <input class="form-control" name="value" type="text" value="{{@$title->value}}">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$slide->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$slide->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn:
                                <?php if (@$slide->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$slide->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$slide->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$slide->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$type->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$type->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn:
                                <?php if (@$type->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$type->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$type->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$type->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$payment->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$payment->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn: 
                                <?php if (@$payment->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$payment->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$payment->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$payment->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('syspayment')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <image src="{{asset('images/sys/'.@$payment->value)}}" class="img-reponsive" style="width: 100px;">
                                <input name="old_image" type="hidden" value="{{@$payment->image}}">
                                <input class="form-control" name="image" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt mạng xã hội</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-body">
                        <form class="form" action="{{route('syssocial')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>{{@$facebook->name}}:</label>
                                <input class="form-control" name="facebook" type="text" value="{{@$facebook->value}}">
                            </div>
                            <div class="form-group">
                                <label>{{@$instagram->name}}:</label>
                                <input class="form-control" name="instagram" type="text" value="{{@$instagram->value}}">
                            </div>
                            <div class="form-group">
                                <label>{{@$google->name}}:</label>
                                <input class="form-control" name="google" type="text" value="{{@$google->value}}">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$header->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$header->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn: 
                                <?php if (@$header->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$header->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$header->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$header->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('sysheader')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea id="demo" class="form-control ckeditor" name="value">{{@$header->value}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$footer->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$footer->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn: 
                                <?php if (@$footer->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$footer->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$footer->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$footer->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('sysfooter')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea id="demo" class="form-control ckeditor" name="value">{{@$footer->value}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$about->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$about->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn: 
                                <?php if (@$about->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$about->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$about->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$about->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('sysabout')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea id="demo" class="form-control ckeditor" name="value">{{@$about->value}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="timeline-badge primary" style="color: #ffffff; padding: 10px; border: 2px solid #707070; border-radius: 10px 10px 0 0; margin-top: 20px;">
                    <strong>Cài đặt {{@$contact->name}}</strong>
                </div>
                <div class="timeline-panel" style="padding: 10px; background-color: #D7D7D7; border: 2px solid #707070; border-radius: 0 0 10px 10px;">
                    <div class="timeline-heading">
                        <p>
                            <small class="text-muted">{{@$contact->comment}}</small>
                        </p>
                        <h4 class="timeline-title"> 
                            <span>Tùy chọn: 
                                <?php if (@$contact->stt == "OFF"): ?>
                                    <a href="{{route('sysstt',@$contact->id)}}"><i class="fa fa-eye-slash"></i> đang ẩn</a>
                                <?php endif; ?>
                                <?php if (@$contact->stt == "ON"): ?>
                                    <a href="{{route('sysstt',@$contact->id)}}"><i class="fa fa-eye"></i> đang hiện</a>
                                <?php endif; ?>
                            </span>
                        </h4>
                    </div>
                    <div class="timeline-body">
                        <form class="form" action="{{route('syscontact')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea id="demo" class="form-control ckeditor" name="value">{{@$contact->value}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Cài đặt</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection