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
        <h1>Update Customer</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Customer</a></li>
            <li class="active">Update Customer</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Update Customer</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('admin/updatecustomer') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name=CustomerID value="{{$customer_data[0]->CustomerID }}" />

                            <fieldset>
								<table>
								  <tr>
								  	<td>
									<div class="container">
	                                  <div class="row">
	                                     <label>Customer Code:</label>
	                                     <input class="form-control" placeholder="Customer Code" name="customercode" type="text"
	                                     value="{{$customer_data[0]->CustomerCode }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Conatact Title:</label>
	                                     <input class="form-control" placeholder="Conatct Title" name="contacttitle" type="text"
	                                     value="{{$customer_data[0]->ContactTitle }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>City:</label>
	                                     <input class="form-control" placeholder="City" name="city" type="text"
	                                     value="{{$customer_data[0]->City }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Country:</label>
	                                     <input class="form-control" placeholder="Country" name="country" type="text"
	                                     value="{{$customer_data[0]->Country }}"/>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
	                                     <label>Email:</label>
	                                     <input class="form-control" placeholder="Email" name="email" type="text"
	                                     value="{{$customer_data[0]->Email }}"/>
	                                  </div>
	                                </div>
	                            </td>
	                            <td>
									<div class="container">
	                                  <div class="row">
	                                     <label>Company Name</label>
	                                     <input class="form-control" placeholder="Company Name" name="companyname" type="text"
	                                     value="{{$customer_data[0]->CompanyName }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Address:</label>
	                                     <input class="form-control" placeholder="Address" name="address" type="text"
	                                     value="{{$customer_data[0]->Address }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>State</label>
	                                     <input class="form-control" placeholder="State" name="state" type="text"
	                                     value="{{$customer_data[0]->Region }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Phone:</label>
	                                     <input class="form-control" placeholder="Phone" name="phone" type="text"
	                                     value="{{$customer_data[0]->Phone }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Create date:</label>
	                                     <input class="form-control" placeholder="Create date" name="data" type="text"
	                                     value="{{$customer_data[0]->CreatedDate }}"/>
	                                  </div>
	                                </div>
	                            </td>
	                             <td>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Contact Name:</label>
	                                     <input class="form-control" placeholder="Contact Name" name="contact" type="text"
	                                     value="{{$customer_data[0]->ContactName }}"/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Address 2:</label>
	                                     <input class="form-control" placeholder="Address 2" name="address2" type="text"
	                                     value="{{$customer_data[0]->Address2 }}"/>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
	                                     <label>Postal Code:</label>
	                                     <input class="form-control" placeholder="Postal Code" name="postalcode" type="text"
	                                     value="{{$customer_data[0]->PostalCode }}"/>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
	                                     <label>Fax:</label>
	                                     <input class="form-control" placeholder="Fax" name="fax" type="text"
	                                     value="{{$customer_data[0]->Fax }}"/>
	                                  </div>
	                                </div>
	                               
	                            </td>
								  </tr>
					           <tr>
								 	<td>
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <input type="submit" value="Update" class="btn btn-primary" />
                                   </div>
                               </div>
								</td>
								<td>
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <a href="{{ URL('customer/list')}}" class="btn btn-danger">Cancel</a>
                                   </div>
                                 </div>
							    </td>
								 </tr>
						   </table>
                            
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