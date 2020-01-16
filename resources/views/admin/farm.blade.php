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
                        <form accept-charset="UTF-8" action="{{ url('admin/postfarm') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <fieldset>
								<table>
								  <tr>
								  	<td>
									<div class="container">
	                                  <div class="row">
	                                     <label>FieldID Number:</label>
	                                     <input class="form-control" placeholder="Pesticides Name" name="FieldIDNumber" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Legal Description:</label>
	                                     <input class="form-control" placeholder="Pesticides Name" name="LegalDescription" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Irrigation Source 2:</label>
	                                     <input class="form-control" placeholder="Irrigation Source 2" name="IrrigationSource2" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                            </td>
	                            <td>
									<div class="container">
	                                  <div class="row">
	                                     <label>Field Name</label>
	                                     <input class="form-control" placeholder="Pesticides Name" name="FieldName" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Total Acres:</label>
	                                     <input class="form-control" placeholder="Pesticides Name" name="TotalAcres" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>IrrigationSource3</label>
	                                     <input class="form-control" placeholder="Pesticides Name" name="IrrigationSource3" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                            </td>
	                             <td>

                                     <div class="container">
	                                  <div class="row">
                                       <lable>Select :</lable>
                                       @foreach($formfield_data as $data)
                                         <select name="Ounces" class="form-control">
                                         <option value="{{$data->SupplierID}}">{{$data->CompanyName}}</option>
                                         
                                        </select>
                                        @endforeach
                                     </div>
                                     </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Irrigation Source 1:</label>
	                                     <input class="form-control" placeholder="Irrigation Source1" name="IrrigationSource1" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Comments:</label>
	                                     <input class="form-control" placeholder="Comments" name="Comments" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                               
	                            </td>
								  </tr>
					           <tr>
								 	<td>
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <input type="submit" value="Save" class="btn btn-primary" />
                                   </div>
                               </div>
								</td>
								 <td>
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                     <a href="{{ URL('admin/pests')}}" class="btn btn-primary">SaveAddMore..</a>
                                   </div>
                                  </div>
								</td>
								<td>
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <a href="{{ URL('admin/pests')}}" class="btn btn-danger">Cancel</a>
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