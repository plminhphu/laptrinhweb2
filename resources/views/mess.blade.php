@if(count($errors)>0)
<div class="alert alert-danger alert-dismissable">
    <button class="close" aria-hidden="true" type="button" data-dismiss="alert"><i class="fa fa-caret-up"></i></button>
    @foreach($errors->all() as $err)
    <span>{{$err}}</span>
    @endforeach
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
    <button class="close" aria-hidden="true" type="button" data-dismiss="alert"><i class="fa fa-caret-up"></i></button>
    <span>{{Session::get('message')}}</span>
</div>
@endif
@if(Session::has('err'))
<div class="alert alert-success alert-dismissable">
    <button class="close" aria-hidden="true" type="button" data-dismiss="alert"><i class="fa fa-caret-up"></i></button>
    <span>{{Session::get('err')}}</span>
</div>
@endif