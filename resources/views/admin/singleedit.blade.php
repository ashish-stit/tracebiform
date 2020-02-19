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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>

@section('content')
<body>
    <section class="content-header">
        <h1>Edit Single</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Single</a></li>
            <li class="active">Edit Single</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Edit Single</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('admin/singlesave') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <fieldset>
								<table>
								  <tr>
								  	<td>
								 <div class="container">
	                                 <div class="row">
                                     <lable>Inventory Transaction Type:</lable>
                                         <select name="InventoryTransactionTypeID" class="form-control">
                                         @foreach($TransactionType as $Type)
                                         <option value="{{$Type->InventoryTransactionTypeID}}" name="InventoryTransactionTypeID">{{$Type->InventoryTransactionTypeName}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="container">
	                                  <div class="row">
	                                     <label>Retail UPC Code:</label>
	                                     <input class="form-control" placeholder="Retail UPC Code" id="upccode" name="RetailUPCCode" type="text"
	                                     value="" readonly>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
	                                     <label>Quantity:</label>
	                                     <input class="form-control" placeholder="Quantity" id="qty" name="qty" type="text"
	                                     value="" readonly>
	                                  </div>
	                                </div>
	                                
	                                <div class="container">
	                                  <div class="row">
	                                     <label>WareHouse Location:</label>
	                                     <input class="form-control" placeholder="WareHouse Location" name="WareHouseLocation" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
	                                     <label>CreatedBy:</label>
	                                     <input class="form-control" placeholder="Created By" name="CreatedBy" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
									
	                            </td>
	                             <td>
	                                <div class="container">
	                                  <div class="row">
                                       <lable>Product Name :</lable>
                                         <select name="Owner" id="pro_name" class="form-control" >
                                         	<option>select</option>
                                         @foreach($product_data as $data)
                                             <option name="ProductID" value= "{{$data->ProductID}}" data-pallet="{{$data->PalletType}}" data-weight="{{$data->ProductWeight}}"  data-mydata="{{$data->QuantityPerPallet}}" data-upccode="{{$data->RetailUPCCode}}"data-single="{{$data->ProductID}}">{{$data->ProductName}}</option>
                                         @endforeach
                                       </select>
                                      
                                     </div>
                                     </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>GTIN:</label>
	                                     <input class="form-control" placeholder="GTIN" name="GTIN" type="text"
	                                     value=""/>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
                                       <lable>Grower Name/Owner :</lable>
                                       <select class="form-control">
                                          @foreach($supplier_data as $data)
                                         <option value="">{{$data->ContactName}}</option>
                                         @endforeach
                                      </select>
                                     </div>
                                     </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Pallet Type:</label>
	                                     <input class="form-control" placeholder="Pallet Type" id="pallet" name="PalletType" type="text"
	                                     value="" readonly>
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
								
	                            <td>
									<div class="container">
	                                  <div class="row">
	                                     <label>Weight</label>
	                                   
	                                     <input id="test" class="form-control" placeholder="Weight" name="Weight" type="text"
	                                     value="" readonly>
	                                  </div>
	                                </div>
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Packing Facility/Supplier:</label>
	                                      <select name="SupplierID" class="form-control">
                                         @foreach($supplier_data as $data)
                                         <option name= "SupplierID" value="{{$data->SupplierID}}">{{$data->ContactName}}</option>
                                         @endforeach
                                        </select>
	                                  </div>
	                                </div>
	                                 <div class="container">
	                                  <div class="row">
                                       <lable>Lot No:</lable>
                                         <select name="LotNo" class="form-control">
                                         	@foreach($Getlotno_data as $data)
                                         <option value="{{$data->LotNo}}" name="LotNo">{{$data->LotNo}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                </div>

                                      
	                                <div class="container">
	                                  <div class="row">
	                                     <label>Transaction Date</label>
	                                     <input class="form-control" placeholder="Transaction Date" name="TransactionDate" type="date"
	                                     value=""/>
	                                  </div>
	                                </div>
	                            </td>
	                              </tr>
                                    <tr>
                                    	<td>
                                   <div class="container" id="row_dim" >
                                   
	                                  <!-- <div class="row">
	                                     <label>Supply</label>
	                                     <select class="form-control">
	                                        <option>
	                                       
	                                        </option>
	                                     </select>
	                                  </div>
	                                  <div class="row">
	                                     <label id="test123">Quantity</label>
	                                     <input type="text" name="" class="form-control" value="">
	                                  </div> -->
	                                
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
                                      <a href="{{ URL('admin/frmlist')}}" class="btn btn-danger">Cancel</a>
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
<script>
$(document).ready(function(){
  $("#pro_name").change(function(){
   var webUrl = {!! json_encode(url('/')) !!}
   var sd=$('#pro_name :selected').val();
   var weight=$('#pro_name').find(':selected').data('weight');
    var quantity=$('#pro_name').find(':selected').data('mydata');
    var upccode=$('#pro_name').find(':selected').data('upccode');
    var pallet=$('#pro_name').find(':selected').data('pallet');
    var single=$('#pro_name').find(':selected').data('single');
   $('#row_dim').html('');
   var id=$('#test').val(weight);
    var qty=$('#qty').val(quantity);
    var code=$('#upccode').val(upccode);
    var pallet=$('#pallet').val(pallet);
	    $.ajax({
	    url: webUrl + '/getquantitydata',
	    type: "POST",
	    data: {singleid: single},
	    dataType: 'json',
    	success: function (pro_id) {  
     	$.each(pro_id.pro_id, function (index, value)  
                {   
                    console.log(pro_id.pro_id.length);
                    $('#row_dim').append('<div class="row">\
	                                     <label>Supply</label>\
	                                     <select class="form-control" name="supp[]">\
	                                        <option name="supp[]" value="'+value.SupplyID+'">\
	                                        '+value.SupplyID+' </option>\
	                                     </select>\
	                                  </div>\
	                                  <div class="row">\
	                                    <label id="test123">Quantity</label>\
	                                    <input type="text" id="" name="qry[]" class="form-control" value="'+value.Qry+'"></div>');
                });
     }

             
       });
  });
});
	
</script>
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