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

<head>
    <title>Register | Tracebi Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <!-- <link href="{{ asset('css/pages/login2.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <!-- styles of the page ends-->
</head>
@section('content')
<body>
    <section class="content-header">
        <h1>User Update</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Growers</a></li>
            <li class="active">User Update</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>User Update</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('admin/userupdate') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <fieldset>

                             <div class="container">
                                <input type="hidden" name="userID" value="{{$users[0]->UserID }}" />
                                 <div class="row">
                                     <label>LoginName</label>
                                     <input class="form-control" placeholder="Login Name" name="LoginName" type="text"
                                     value="{{ $users[0]->LoginName }}"/>
                                 </div>
                             </div>

                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>FirstName</label>
                                <input class="form-control" placeholder="First Name" name="FirstName" type="text"
                                     value="{{ $users[0]->FirstName }}"/>
                                 </div>
                             </div>

                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>LastName</label>
                                <input class="form-control" placeholder="Last Name" name="LastName" type="text"
                                     value="{{ $users[0]->LastName }}"/>
                                 </div>
                             </div>

                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Title</label>
                                <input class="form-control" placeholder="Title" name="Fax" type="text"
                                     value="{{ $users[0]->Title }}"/>
                                 </div>
                             </div>

                                <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>City</label>
                                <input class="form-control" placeholder="City" name="ContactName" type="text"
                                     value="{{ $users[0]->City }}"/>
                                 </div>
                             </div>

                                <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Email:</label>
                                <input class="form-control" placeholder="Email" name="Email" type="text"
                                     value="{{ $users[0]->Email }}"/>
                                 </div>
                             </div>
                               
                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">

                                    <input type="submit" value="Update" class="btn btn-primary" />

                                    <a href="{{ URL('admin/growers')}}" class="btn btn-danger" style="margin-left: 10px;">Cancel</a>
                                    
                                  
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js-->
<script src="{{ asset('js/TweenLite.min.js') }}"></script>
<script src="{{ asset('vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/register2.js') }}" type="text/javascript"></script>
<!-- end of page level js-->
</body>
</html>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
