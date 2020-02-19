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
var max_fields = 100;
var wrapper = $(".cont");
var add_button = $(".add_form");

var x = 1;
$(add_button).click(function(e) {
e.preventDefault();
if (x < max_fields) {
x++;
$(wrapper).append('<div><div class="row"><div class="col-xs-12 col-sm-2 col-md-2">\
<label>Inventory ID:</label>\
<input type="text" name="Inventory TransactionID[]">\
</div>    <div  class="col-xs-12 col-sm-2 col-md-2">\
<label>Quantity:</label>\
<input type="text" name="Quantity[]">\
</div>\
<div  class="col-xs-12 col-sm-2 col-md-2">\
<label>Product Name:</label>\
<input type="text" name="Product Name[]">\
</div>\
<div  class="col-xs-12 col-sm-2 col-md-2">\
<label>LotNo:</label>\
<input type="text" name="LotNo[]">\
</div>\
<div  class="col-xs-12 col-sm-2 col-md-2">\
<label>DatePacked:</label>\
<input type="text" name="DatePacked[]">\
</div><a href="#"  class="delete">Remove</a></div></div>'); 
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
<h1>Add Bill of Lading</h1>
<ol class="breadcrumb">
<li>
<a href="{{ route('admin.dashboard') }}">
<i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
Dashboard
</a>
</li>
<li><a href="#">Bill of Lading</a></li>
<li class="active">Add Bill of Lading</li>
</ol>
</section>
<div class="container">
<div class="row vertical-offset-50">
<div class="col-10 col-offset-1 mx-auto">
<div class="card ">
<div class="card-header bg-default text-center border-0 py-2">
<h3>Add Bill of Lading</h3>
</div>
<div class="card-body">
<!-- display all errors here -->
<form accept-charset="UTF-8" action="{{ url('updatebillslading') }}" method="post">
{{  csrf_field()  }}
<!-- CSRF Token -->
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" name="BillofLadingID" value="{{$ladingeditdat[0]->BillofLadingID}}">

<fieldset>
<table>

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6">

<label>Order:</label>
<select class="form-control" id="order_name" name="OrderID">
<option>select</option>

@foreach($orders_datas as $data)
@foreach($odrdetails_datas as $detail_data)
@foreach($cust_datas as $cust_data)
@if($data->CustomerID == $cust_data->CustomerID && $detail_data->OrderID == $data->OrderID)
<option name="order" value="{{$ladingeditdat[0]->OrderID}}" data-OrderID= "{{$data->OrderID}}" data-dilivery="{{$data->RequiredDate}}" data-diliverytime="{{$data->TimeIn}}" data-ShippedDate="{{$data->ShippedDate}}" data-LoadAt="{{$data->LoadAt}}" data-Truck="{{$data->Truck}}" data-ShipToPONumber="{{$data->ShipToPONumber}}" data-PalletsIn="{{$data->PalletsIn}}" data-PalletsOut="{{$data->PalletsOut}}" data-LoadNumber="{{$data->LoadNumber}}" data-Freight="{{$data->Freight}}" data-Instructions="{{$data->Instructions}}" data-TrailerLicense="{{$data->TrailerLicense}}" data-TrailerLicense="{{$data->TrailerLicense}}" data-OrderID
="{{$detail_data->OrderID}}" data-ProductID="{{$detail_data->ProductID}}" data-Quantity="{{$detail_data->Quantity}}" data-total="{{$detail_data->Total50LBBags}}">{{$cust_data->CompanyName}}</option>
@endif
@endforeach
@endforeach
@endforeach
</select>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Load Number:</label>
<input class="form-control" placeholder="Conatct Title" id="loadnumber" name="loadnumber" type="text"
value="{{$ladingeditdat[0]->LoadNumber}}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Schedule dilivery date:</label>
<input class="form-control" placeholder="Schedule dilivery date" name="Schedulediliverydate" id="dilivery" type="text"
value=""/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Scheduled Delivery Time:</label>
<input class="form-control" placeholder="Country" id="diliverytime" name="ScheduledDeliveryTime" type="text"
value=""/>
</div>

<div class="col-xs-12 col-sm-6 col-md-6">
<label>Ship Date:</label>
<input class="form-control" placeholder="Company Name" id="ShippedDate" name="ShipDate" type="text"
value="{{ $ladingeditdat[0]->ShipDate }}"/>
</div>

<div class="col-xs-12 col-sm-6 col-md-6">
<label>LoadAt:</label>
<input class="form-control" placeholder="Phone" name="loadat" id="LoadAt" type="text"
value="{{ $ladingeditdat[0]->LoadAt }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Trucking Company:</label>
<input class="form-control" placeholder="Trucking Company" id="Truck" name="TruckingCompany" type="text"
value="{{ $ladingeditdat[0]->TruckingCompany }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Truck Broker:</label>
<input class="form-control" placeholder="Truck Broker" name="TruckBroker" type="text"
value="{{ $ladingeditdat[0]->TruckBroker }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Driver:</label>
<input class="form-control" placeholder="Driver" name="Driver" type="text"
value="{{ $ladingeditdat[0]->Driver }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Driver License No:</label>
<input class="form-control" placeholder="Driver License No" name="DriverLicenseNo" type="text"
value="{{ $ladingeditdat[0]->DriverLicenseNo }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Ship To:</label>
<input class="form-control" placeholder="Ship To" name="ShipTo" type="text"
value="{{ $ladingeditdat[0]->ShipTo }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Customer PO No:</label>
<input class="form-control" placeholder="Customer PO No" name="CustomerPONo" type="text"
value=""/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Ship to PO No:</label>
<input class="form-control" placeholder="Ship to PO No" id="ShipToPONumber" name="ShiptoPONo" type="text"
value="{{ $ladingeditdat[0]->ShipToPONumber }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Recorder No:</label>
<input class="form-control" placeholder="Recorder No" name="RecorderNo" type="text"
value=""/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>KeepUnitAt:</label>
<input class="form-control" placeholder="Keep Unit At" name="KeepUnitAt" type="text"
value="{{ $ladingeditdat[0]->KeepUnitAt }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Del. Confirmation Number:</label>
<input class="form-control" placeholder="Del Confirmation Number" name="DelConfirmationNumber" id="freight" type="text"
value="{{ $ladingeditdat[0]->FreightRate }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Trailer License Number:</label>
<input class="form-control" placeholder="Trailer License Number" name="TrailerLicenseNumber" id="trailerlicense" type="text"
value="{{$ladingeditdat[0]->TrailerLicenseNumber}}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Total Pallets:</label>
<input class="form-control" placeholder="Total Pallets" name="TotalPallets" type="text"
value="{{ $ladingeditdat[0]->Total50LBBags }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Pallets In:</label>
<input class="form-control" placeholder="Pallets In" name="PalletsIn" id="PalletsIn" type="text"
value="{{ $ladingeditdat[0]->PalletsIn }}"/>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
<label>Pallets Out:</label>
<input class="form-control" placeholder="Pallets Out" name="PalletsOut" id="PalletsOut" type="text"
value="{{ $ladingeditdat[0]->PalletsOut }}"/>
</div>



<div class="col-xs-12 col-sm-6 col-md-6">
</div>
</div>
</div>


<div class="col-xs-12 col-sm-8 col-md-8">
<label>Delivery Instructions:</label>
<br>
<input type="text" class="form-control" placeholder="Delivery Instructions" id="Instructions" name="DeliveryInstructions" value="{{ $ladingeditdat[0]->DeliveryInstructions }}">
</input>
</div>
<div class="container" id="order_div" >
</div>

<div class="cont" style="margin-top: 20px;">
<button class="add_form btn btn-primary">Add Detail </span>
</button>
<div class="row">
<div class="col-xs-12 col-sm-2 col-md-2">
<label>Inventory ID:</label>
<input type="text" id="inventory" name="Inventory TransactionID[]">
</div> 

<div  class="col-xs-12 col-sm-2 col-md-2">
<label>Quantity:</label>
<input type="text" name="Quantity[]" onclick="myFunction()">
</div>
</div>
<div class ="row" id="inventory_div">
</div>

</div>


<div class="container" style="margin-top: 20px;">
<div class="row">
<input type="submit" value="Save" class="btn btn-primary" />
</div>
</div>

<div class="container" style="margin-top: 20px;">
<div class="row">
<a href="{{ URL('admin/billsofladinglist')}}" class="btn btn-danger">Cancel</a>
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

<script>
$(document).ready(function(){
$("#order_name").change(function(){
var webUrl = {!! json_encode(url('/')) !!}
var sd=$('#order_name :selected').val();
var dilivery=$('#order_name').find(':selected').data('dilivery');
var diliverytime=$('#order_name').find(':selected').data('diliverytime');
var ShippedDate=$('#order_name').find(':selected').data('shippeddate');
var LoadAt=$('#order_name').find(':selected').data('loadat');
var ShipToPONumber=$('#order_name').find(':selected').data('shiptoponumber');
var Truck=$('#order_name').find(':selected').data('truck');
var PalletsIn=$('#order_name').find(':selected').data('palletsin');
var PalletsOut=$('#order_name').find(':selected').data('palletsout');
var loadnumber=$('#order_name').find(':selected').data('loadnumber');
var Instructions=$('#order_name').find(':selected').data('instructions');
var trailerlicense=$('#order_name').find(':selected').data('trailerlicense');
var freight=$('#order_name').find(':selected').data('freight');
var ProductID=$('#order_name').find(':selected').data('productid');
var quantity=$('#order_name').find(':selected').data('quantity');
var total50Lbbags=$('#order_name').find(':selected').data('total');
var order=$('#order_name').find(':selected').data('orderid');
$('#dilivery').val(dilivery);
$('#diliverytime').val(diliverytime);
$('#ShippedDate').val(ShippedDate);
$('#LoadAt').val(LoadAt);
$('#ShipToPONumber').val(ShipToPONumber);
$('#Truck').val(Truck);
$('#PalletsIn').val(PalletsIn);
$('#PalletsOut').val(PalletsOut);
$('#loadnumber').val(loadnumber);
$('#Instructions').val(Instructions);
$('#trailerlicense').val(trailerlicense);
$('#freight').val(freight);
$('#ProductID').val(ProductID);
$('#quantity').val(quantity);
$('#total50Lbbags').val(total50Lbbags);
$.ajax({
url: webUrl + '/getorderid',
type: "POST",
data: {orderid: order},
dataType: 'json',
success: function (pro_id) {  
$.each(pro_id.pro_id, function (index, value)  
{   
console.log(pro_id.pro_id.length);
$('#order_div').append('<div class="row">\
<div class="col-xs-12 col-sm-4 col-md-4">\
<label>Product Name :</label><input type="text" value=" '+value.ProductID+'" readonly></div>\
<div class="col-xs-12 col-sm-4 col-md-4">\
<label>Quantity :</label><br><input type="text" value="'+value.Quantity+'"></div>\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label id="test123">Total Pallets :</label> <input type="text" value="'+value.	Total50LBBags+'">\
</div></div>');
});
}


});

});
});
</script>
<script>

function myFunction() {
var webUrl = {!! json_encode(url('/')) !!}
var inventory=$("#inventory").val()
$.ajax({
url: webUrl + '/inventoryid',
type: "POST",
data: {inventoryid: inventory},
dataType: 'json',
success: function (pro_id) {  
$.each(pro_id.pro_id, function (index, value)  
{   
console.log(pro_id.pro_id.length);
$('#inventory_div').append('<div class="row">\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label>Inventory ID :</label><input type="text" value=" '+value.InventoryTransactionID+'" readonly></div>\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label>Quantity :</label><input type="text" value=" '+value.Quantity+'" readonly></div>\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label>Product Name :</label><input type="text" value=" '+value.ProductID+'" readonly></div>\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label>LotNo :</label><br><input type="text" value="'+value.LotNo+'"></div>\
<div class="col-xs-12 col-sm-2 col-md-2">\
<label id="test123">Date Packed :</label> <input type="text" value=" '+value.TransactionDate+'">\<a href="#"  class="del">Remove</a>\
</div></div>');
});


}


});
$("#inventory_div").on("click", ".del", function(e) {
e.preventDefault();
$(this).parent().remove();
});  

}

</script>



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