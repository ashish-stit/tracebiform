@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Register Page
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    

{{-- Page content --}}

<!DOCTYPE html>
<html>
@section('content')
<body>
	{!!Form::open(array('url'=>'admin/userupdate'))!!}
	<form accept-charset="UTF-8" id="register_here" role="form" action="{{ url('admin/userupdate') }}" method="post">
                            <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
	   <input class="form-control" placeholder="E-mail" name="email" type="email"
                                value="{{$users->email}}"/>
        <input type="hidden" name="userID" value="{{$users->id}}">

          <input type="submit" value="Update" class="btn btn-primary btn-block btn-lg" />
	</body>
	{!! Form::close() !!}
</html>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop