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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	$(document).ready(function() {
    	var s = $("#rows").val();
        var max_fields = 100;
    	var wrapper = $(".container2");
    	var add_button = $(".add_form_field");

    	var x = Number(s);
        
        
    	$(add_button).click(function(e) {
        	e.preventDefault();
        	if (x < max_fields) {
            	x++;
              
              $(wrapper).append('<div><input type="text" name="quantity[]"/><select name="wrapper"> @foreach($supply_data as $supplies) <option value="{{$supplies->SupplyID}}">{{$supplies->SupplyID}}</option> @endforeach</select><a href="#"  class="delete">Remove</a></div>'); 
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





</head>
@section('content')
<body>
    <section class="content-header">
        <h1>Edit Products</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Products</a></li>
            <li class="active">Edit Products</li>
        </ol>
    </section>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Edit Products</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" action="{{ url('product/update') }}" method="post">
                            {{  csrf_field()  }}
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                           <input type="hidden" name="ProductID" value="{{$product_data[0]->ProductID  }}" />
                           @foreach($supply_data as $supp_data)
                           <input type="hidden" name="ProductmultipleID[]" value="{{$supp_data->ProductID  }}" />
                            <input type="hidden" name="ProductSupplyID[]" value="{{$supp_data->ProductSupplyID  }}" />
                           @endforeach
                           


                            <fieldset>

                            	<div class="container">
                                 <div class="row">
                                     <label>Product Code:</label>
                                     <input class="form-control" placeholder="Product Code" name="productcode" type="text"
                                     value="{{$product_data[0]->ProductCode}}"/>
                                 </div>
                             </div>

                             <div class="container">
                                 <div class="row">
                                     <label>Product Name:</label>
                                     <input class="form-control" placeholder="Company Name" name="productname" type="text"
                                     value="{{$product_data[0]->ProductName}}"/>
                                 </div>
                             </div>
				                    <div class="box-body">
				                        <div class="form-group">
				                            <label for="select-gear">Product Category:</label>
				                            <select id="select-gear" name="productcategory" class="form-control" placeholder="Product Category">
				                            	@foreach($categories as $catego)
				                               <option value="{{$catego->CategoryID}}">{{$catego->CategoryName}}</option>
				                               @endforeach
				                              </select>
				                        </div>
				                      <div class="box-body">
				                        <div class="form-group">
				                            <label for="select-gear">Product Type:</label>
				                            <select id="select-gear" name= "producttype" class="form-control" placeholder="Product Type">
				                                    @foreach($producttypes as $protypes)
				                              <option value="{{$protypes->ProductTypeID}}">{{$protypes->ProductTypeName}}</option>
				                                    @endforeach
				                              </select>
				                        </div>
				                    </div>

                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Quantity Per Pallet:</label>
                                <input class="form-control" placeholder="Quantity Per Pallet" name="quantityperpallet" type="text"
                                     value="{{$product_data[0]->QuantityPerPallet}}"/>
                                 </div>
                             </div>

                                <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Pallet Type:</label>
                                <input class="form-control" placeholder="Pallet Type" name="pallettype" type="text"
                                     value="{{$product_data[0]->PalletType}}"/>
                                 </div>
                             </div>
                              <label>Discontinued:</label>
                              <div class="card-body">
			                <div class="form-check abc-radio abc-radio-primary">
			                    <input class="form-check-input" type="radio" name="discontitued" id="radio1" value="1" checked>
			                    <label class="form-check-label" for="radio1">
			                        Yes
			                    </label>
			                </div>
			                <div class="form-check abc-radio abc-radio-primary">
			                    <input class="form-check-input" type="radio" name="discontitued" id="radio2" value="0">
			                    <label class="form-check-label" for="radio2">
			                        No
			                    </label>
			                </div>

                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Brand:</label>
                                <input class="form-control" placeholder="Brand" name="brand" type="text"
                                     value="{{$product_data[0]->Brand}}"/>
                                 </div>
                             </div>

                             <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Grade:</label>
                                <input class="form-control" placeholder="Grade" name="grade" type="text"
                                     value="{{$product_data[0]->Grade}}"/>
                                 </div>
                             </div>

                                <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Vendor UCC:</label>
                                <input class="form-control" placeholder="Vendor UCC" name="VendorUCC" type="text"
                                     value="{{$product_data[0]->VendorUCC}}"/>
                                 </div>
                             </div>

                               <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Weight:</label>
                                <input class="form-control" placeholder="Weight" name="weight" type="text"
                                     value="{{$product_data[0]->ProductWeight}}"/>
                                 </div>
                             </div>

                               <div class="container" style="margin-top: 20px;">
                                 <div class="row">
                                     <label>Retail UPC Code:</label>
                                <input class="form-control" placeholder="Retail UPC Code" name="retailcode" type="text"
                                     value="{{$product_data[0]->RetailUPCCode}}"/>
                                 </div>
                             </div>
           

						    <div class="container2" >
						    	
							<input type="hidden" id="rows" value="{{$countdata}}"/>
							
						    <button class="add_form_field btn btn-primary">Add Supply 
						      <span style="font-size:16px; font-weight:bold;"></span>
						    </button>
						     @foreach($supply_data as $data_suplys)
						    <div>
						 <input type="text" name="quantity[]" value="{{$data_suplys->Qry}}">
						    <select name="wraper[]">
						    <option value="{{$data_suplys->ProductID}}">{{$data_suplys->SupplyID}}</option>
						      </select>
						      <a href="#"  class="delete">Remove</a>
						    </div>
						     @endforeach
						    
						</div>





                              <div class="container" style="margin-top: 20px;">
                                 <div class="row">

                                    <input type="submit" value="Submit" class="btn btn-primary" />

                                     <a href="" class="btn btn-primary" style="margin-left: 10px;">Save and More...</a>

                                     
                                    <a href="{{ URL('Product/Itemselllist')}}" class="btn btn-danger" style="margin-left: 10px;">Cancel</a>
                                        
                                  
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
