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
        <h1>Add Pestcides</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Pestcides Users</a></li>
            <li class="active">Add Pestcides</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Add Pestcides</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('admin/postpesticides') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <fieldset>

                             <div class="container">
                                 <div class="row">
                                     <label>Pestcides Name</label>
                                     <input class="form-control" placeholder="Pesticides Name" name="PestcidesName" type="text"
                                     value=""/>
                                 </div>
                             </div>

                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Pre Hervest Interval</label>
                                     <input class="form-control" placeholder="prehervestinterval" name="hervestinterval" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Toxicity</label>
                                     <input class="form-control" placeholder="Toxicity" name="toxicity" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Product Rate</label>
                                     <input class="form-control" placeholder="Product Rate" name="productrate" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Applicatior Name</label>
                                     <input class="form-control" placeholder="Applicator Name" name="applicatorname" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>GPA</label>
                                     <input class="form-control" placeholder="GPA" name="gpa" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Nozzel Setup</label>
                                     <input class="form-control" placeholder="Nozzel Setup" name="nozelsetup" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Rate listed Per</label>
                                     <input class="form-control" placeholder="Rate listed Per" name="ratelistedper" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Pesticide Label Signal Word</label>
                                     <input class="form-control" placeholder="Pesticide Label Signal Word" name="pesticidelabel" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Epa Registration Number</label>
                                     <input class="form-control" placeholder="Epa Registration Number" name="epanumber" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                               <div class="form-group">
                                   <lable>Select :</lable>
                                      <select name="Ounces" class="form-control">
                                        <option value="select">Dry Ounces</option>
                                          <option value="sc">Fluid Ounces</option>
                                          
                                      </select>
                               </div>
                                <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Certification Number</label>
                                     <input class="form-control" placeholder="Certification Number" name="certficationnumber" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Concetration</label>
                                     <input class="form-control" placeholder="Certification Number" name="concetration" type="text"
                                     value=""/>
                                 </div>
                             </div>
                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Spraying Instruction</label>
                                     <input class="form-control" placeholder="Spraying Instruction" name="sprayinginstruction" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Active Intergrident</label>
                                     <input class="form-control" placeholder="Active Intergrident" name="intergrident" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>WPS Oral Notification</label>
                                     <input class="form-control" placeholder="WPS Oral Notification" name="notification" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Resticated Entry Interval</label>
                                     <input class="form-control" placeholder="Resticated Entry Interval" name="interval" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Total product Consume</label>
                                     <input class="form-control" placeholder="Total product Consume" name="consume" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Rate listed Per</label>
                                     <input class="form-control" placeholder="Rate listed Per" name="ratelisted" type="text"
                                     value=""/>
                                 </div>
                             </div> 
                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Spray Rig</label>
                                     <input class="form-control" placeholder="Spray Rig" name="sprayrig" type="text"
                                     value=""/>
                                 </div>
                             </div> 

                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">

                                    <input type="submit" value="Save" class="btn btn-primary" />
                                    <!-- <a href="{{ URL('admin/pests')}}" class="btn btn-primary">Cancel</a> -->
                                  
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