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
    <title>Purchase | Tracebi Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global level css -->
    <!-- page level css -->
    <!-- <link href="{{ asset('css/pages/login2.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .ranges li.active{
            color: #fff !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
  $(document).ready(function() {
    	var s = $("#rows").val();
        var max_fields = 100;
    	var wrapper = $(".cont");
    	var add_button = $(".add_form");

    	var x = Number(s);
        
        
    	$(add_button).click(function(e) {
        	e.preventDefault();
        	if (x < max_fields) {
            	x++;
              $(wrapper).append('<div><div class="row"><div  class="col-xs-12 col-sm-2 col-md-2"><label>Brand:</label><input type="text" name="brand[]"></div> <div  class="col-xs-12 col-sm-2 col-md-2"><label>Unit Price:</label><input type="text" name="unitprice[]"></div><div  class="col-xs-12 col-sm-2 col-md-2"><label>Quantity:</label> <input type="text" name="quantity[]"></div><div  class="col-xs-12 col-sm-2 col-md-2"><label>Pallet Type:</label> <input type="text" name="pallettype[]"></div><div class="col-xs-12 col-sm-2 col-md-2"><label>Product Code:</label><select  class="form-control" name="productcode[]">@foreach($Products_data as $data)<option value="{{$data->ProductID}}">{{$data->ProductCode}}</option>@endforeach </select></div>  <div class="col-xs-12 col-sm-1 col-md-1"> <label>Product Name:</label>    <select  class="form-control" name="productname[]">	@foreach($Products_data as $data)<option value="{{$data->ProductID}}">{{$data->ProductName}}</option>@endforeach  </select></div><a href="#"  class="delete">Remove</a></div></div>'); 
         } else {
               alert('You Reached the limits')
         }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

    
    <!-- styles of the page ends-->
</head>
@section('content')
<body>
    <section class="content-header">
        <h1>Add Purchase Order</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Purchase Order</a></li>
            <li class="active">Add Purchase Order</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Add Purchase Order</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('admin/updateorder') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="PurchaseOrderID" value="{{$editorder[0]->PurchaseOrderID}}" />
                                @foreach($purchase_data as $data)
                                   <input type="hidden" name="PurchasemultipleID[]" value="{{$data->PurchaseOrderID}}" />
                                   <input type="hidden" name="PurchasedetailID[]" value="{{$data->PurchaseOrderDetailID}}" />
                                   @endforeach
                            <fieldset>
								<table>
								 
									<div class="container">
	                                  <div class="row">
	                                  	<div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Purchase Order No:</label>
		                                     <input class="form-control" placeholder="Customer Code" name="purchaseordernumber" type="text"
		                                     value="{{$editorder[0]->PurchaseOrderNumber}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Load Number:</label>
		                                     <input class="form-control" placeholder="Conatct Title" name="loadnumber" type="text"
		                                     value="{{$editorder[0]->CustomerID}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Date Promised:</label>
		                                      <input class="form-control" placeholder="City" name="datepromised" type="date"
		                                     value="{{$editorder[0]->DatePromised}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Supplier:</label>
		                                     <input class="form-control" placeholder="Country" name="supply" type="text"
		                                     value="{{$editorder[0]->PurchaseOrderDescription}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-12 col-md-12">
		                                     <label>Suppliers:</label>
		                                  
		                                     <select name="suppliers" class="form-control">
		                                     	   @foreach($Suppliers_data as $data)
		                                     	<option value="{{$data->SupplierID}}" name="supplydata">
		                                     		{{$data->ContactName}}
		                                     	</option>
		                                     	@endforeach
		                                     </select>
		                                     
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Order Date:</label>
		                                     <input class="form-control" placeholder="Company Name" name="orderdate" type="date"
		                                     value="{{$editorder[0]->OrderDate}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Date Required:</label>
		                                     <input class="form-control" placeholder="Address" name="daterequired" type="date"
		                                     value="{{$editorder[0]->DateRequired}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
	                                     	 <label>Ship Date:</label>
		                                     <input class="form-control" placeholder="State" name="shipdate" type="date"
		                                     value="{{$editorder[0]->ShipDate}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>LoadAt:</label>
		                                     <input class="form-control" placeholder="Phone" name="loadat" type="text"
		                                     value="{{$editorder[0]->LoadAt}}"/>
	                                     </div>
	                                     <div class="col-xs-12 col-sm-12 col-md-12">
		                                     <label>Customer:</label>
		                                  
		                                     <select name="customer" class="form-control">
		                                     	   @foreach($customer_data as $data)
		                                     	<option value="{{$data->CustomerID}}" name="custdata">
		                                     		{{$data->ContactName}}
		                                     	</option>
		                                     	@endforeach
		                                     </select>
		                                     
	                                     </div>
	                                     <div class="col-xs-12 col-sm-12 col-md-12">
		                                     <label>Terms:</label>
		                                  
		                                     <select name="terms" class="form-control">
		                                     	   @foreach($Terms_data as $data)
		                                     	<option name="custdata">
		                                     		{{$data->TermName}}
		                                     	</option>
		                                     	@endforeach
		                                     </select>
		                                     
	                                     </div>
	                                     <div class="col-xs-12 col-sm-6 col-md-6">
	                                     </div>
	                                  </div>
	                                </div>
	                               
								<div class="bs-example">
							    <div class="accordion" id="accordionExample">
							        <div class="card">
							            <div class="card-header" id="headingOne">
							                <h2 class="mb-0">
							                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus"></i>Invoice Details</button>									
							                </h2>
							            </div>

							            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							            	<div class="row">
							              <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Invoice To Address:</label>
									         <input class="form-control" placeholder="Phone" name="invoicetoaddress" type="text"
									          value="{{$editorder[0]->Address}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Invoice To City:</label>
									         <input class="form-control" placeholder="Phone" name="invoicetocity" type="text"
									          value="{{$editorder[0]->City}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Invoice To Region:</label>
									         <input class="form-control" placeholder="Phone" name="invoicetoregion" type="text"
									           value="{{$editorder[0]->Region}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Invoice To Zip:</label>
									         <input class="form-control" placeholder="Phone" name="invoicetozip" type="text"
									           value="{{$editorder[0]->Zip}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Invoice To Phone:</label>
									         <input class="form-control" placeholder="Phone" name="invoicetophone" type="text"
									           value="{{$editorder[0]->Phone}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To Country:</label>
									         <input class="form-control" placeholder="Phone" name="shiptocountry" type="text"
									          value="{{$editorder[0]->ShipCountry}}"/>
								           </div>
								           
								       </div>
							            </div>
							        </div>
							        
							      
							    </div>
							</div>
								         
	                                      <div class="col-xs-12 col-sm-8 col-md-8">
		                                     <label>Ship To:</label>
		                                  
		                                     <select name="shipto" class="form-control">
		                                     	   @foreach($Suppliers_data as $data)
		                                     	<option value="{{$data->SupplierID}}" name="supplydata">
		                                     		{{$data->ContactName}}
		                                     	</option>
		                                     	@endforeach
		                                     </select>
		                                     
	                                     </div>
	                                     <div class="row">
	                                     	<div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship to Po No:</label>
									         <input class="form-control" placeholder="Phone" name="shiptopono" type="text"
									          value="{{$editorder[0]->ShipToPONumber}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Shipping Method:</label>
		                                    <select  class="form-control" name="shippingmethod">
		                                    	@foreach($Shipping_data as $data)
		                                     	<option value="{{$data->ShippingMethodID}}">{{$data->ShippingMethodName}}</option>
		                                     	@endforeach
		                                     </select>
	                                     </div> 
	                                     </div>               
	                                
	                           <div class="bs-example">
							    <div class="accordion" id="accordionShipping">
							        <div class="card">
							            <div class="card-header" id="ShipOne">
							                <h2 class="mb-0">
							                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus"></i>Shipping Details</button>									
							                </h2>
							            </div>

							            <div id="collapsetwo" class="collapse" aria-labelledby="ShipOne" data-parent="#accordionShipping">
							            	<div class="row">
							               <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To Phone:</label>
									         <input class="form-control" placeholder="Phone" name="shiptophone" type="text"
									           value="{{$editorder[0]->ShipPhone}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To Address:</label>
									         <input class="form-control" placeholder="Phone" name="shiptoaddress1" type="text"
									          value="{{$editorder[0]->ShipAddress}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To Address2</label>
									         <input class="form-control" placeholder="Phone" name="shiptoaddress2" type="text"
									           value="{{$editorder[0]->ShipAddress2}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To State:</label>
									         <input class="form-control" placeholder="Phone" name="shiptostate" type="text"
									           value="{{$editorder[0]->ShipRegion}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To City:</label>
									         <input class="form-control" placeholder="Phone" name="shiptocity" type="text"
									          value="{{$editorder[0]->ShipCity}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To PostalCode</label>
									         <input class="form-control" placeholder="Phone" name="shiptopostalcode" type="text"
									          value="{{$editorder[0]->ShipPostalCode}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Ship To Country:</label>
									         <input class="form-control" placeholder="Phone" name="shiptocountry" type="text"
									           value="{{$editorder[0]->ShipCountry}}"/>
								           </div>
								           
								       </div>
							            </div>
							        </div>
							        
							      <div class="col-xs-12 col-sm-6 col-md-6">
		                                     <label>Transpotation Broker:</label>
		                                    <select  class="form-control" name="Transpotation">
		                                    	@foreach($Shippers_data as $data)
		                                     	<option value="{{$data->ShipperID}}">{{$data->CompanyName}}</option>
		                                     	@endforeach
		                                     </select>
	                                     </div> 
                                        

                              <div class="bs-example">
							    <div class="accordion" id="detailsuser">
							        <div class="card">
							            <div class="card-header" id="userOne">
							                <h2 class="mb-0">
							                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus"></i></button>									
							                </h2>
							            </div>

							            <div id="collapsethree" class="collapse" aria-labelledby="userOne" data-parent="#detailsuser">
							            	<div class="row">
							               <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Confirm Number:</label>
									         <input class="form-control" placeholder="Phone" name="number" type="text"
									          value=""/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Freight Charge:</label>
									         <input class="form-control" placeholder="Phone" name="charge" type="text"
									          value="{{$editorder[0]->FreightCharge}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Freight Deductions:</label>
									         <input class="form-control" placeholder="Phone" name="deduction" type="text"
									          value="{{$editorder[0]->FreightDeductions}}"/>
								           </div>
								           <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Customer Rate:</label>
									         <input class="form-control" placeholder="Phone" name="customerrate" type="text"
									          value="{{$editorder[0]->CustomerRate}}"/>
								           </div>
								              <div class="col-xs-12 col-sm-6 col-md-6">
									         <label>Drop:</label>
									         <input class="form-control" placeholder="Phone" name="drop" type="text"
									          value="{{$editorder[0]->Drop}}"/>
								           </div>
								       </div>
							            </div>
							        </div>
							        
							    


                                        <div class="col-xs-12 col-sm-8 col-md-8">
                                        	  <label>Jacket Notes:</label>
                                        	  <br>
                                        	  <textarea class="form-control" placeholder="Jacket Notes" name="jacketnotes" value="{{$editorder[0]->JacketNotes}}">
	                                     </textarea>
	                                 </div>
                                 <div class="cont" style="margin-top: 20px;">
                                 	<input type="hidden" id="rows" value="{{$countdata}}"/>
							    <button class="add_form btn btn-primary">Add Item </span>
							    </button>
                                
							    <div class ="row">
                                       
                                       
	                                  @foreach($purchase_data as $pro_data)
								    <div  class="col-xs-12 col-sm-2 col-md-2">
								    	 <label>Brand:</label>
								      <input type="text" name="brand[]" value="{{$pro_data->Discount}}">
								    </div>
								    <div  class="col-xs-12 col-sm-2 col-md-2">
								    	 <label>Unit Price:</label>
								      <input type="text" name="unitprice[]" value="{{$pro_data->UnitPrice}}">
								    </div>
								    <div  class="col-xs-12 col-sm-2 col-md-2">
								    	 <label>Quantity:</label>
								      <input type="text" name="quantity[]" value="{{$pro_data->Quantity}}">
								    </div>
								    <div  class="col-xs-12 col-sm-2 col-md-2">
								    	 <label>Pallet Type:</label>
								      <input type="text" name="pallettype[]" value="{{$pro_data->PalletType}}">
								    </div>

								   
								    @for($i=0; $i< count($pro_data); $i++)
                                        <div class="col-xs-12 col-sm-2 col-md-2">
		                                     <label>Product Code:</label>
		                                    <select  class="form-control" name="productcode[]">
		                                    	@foreach($Products_data as $prodata)
		                                     	<option value="{{$prodata->ProductID}}">{{$prodata->ProductCode}}</option>
		                                     	@endforeach
		                                     </select>
	                                     </div> 
	                                       <div class="col-xs-12 col-sm-1 col-md-1">
		                                     <label>Product Name:</label>
		                                    <select  class="form-control" name="productname[]">
		                                    	@foreach($Products_data as $p_data)
		                                     	<option value="{{$p_data->ProductID}}">{{$p_data->ProductName}}</option>
		                                     	@endforeach
		                                     </select>
	                                     </div> 
	                                     
	                                     <a href="#"  class="delete">Remove</a>
	                                 
	                                     @endfor
                                         @endforeach
								</div>
								
							</div>
					           
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <input type="submit" value="Save" class="btn btn-primary" />
                                   </div>
                               </div>
								
								  <div class="container" style="margin-top: 20px;">
                                     <div class="row">
                                      <a href="{{ URL('purchase/list')}}" class="btn btn-danger">Cancel</a>
                                   </div>
                                 </div>
							   
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
<script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>


<!-- end of page level js-->
</body>
</html>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop