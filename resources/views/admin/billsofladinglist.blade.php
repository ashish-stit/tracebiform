@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Bill Of Laddings List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
<link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>

@stop
<!-- end page css -->

{{-- Page content --}}
@section('content')

<section class="content-header">
<h1>Bill Of Laddings List</h1>
<ol class="breadcrumb">
<li>
<a href="{{ route('admin.dashboard') }}">
<i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
Dashboard
</a>
</li>
<li><a href="#"> Users</a></li>
<li class="active">Bill Of Laddings List</li>

</ol>
</section>
<!-- Main content -->
<section class="content pr-3 pl-3">
     @if(Session::has('msg'))
    <label class="alert-danger">{{session('msg')}}</label>
  @endif
<div class="row">
<div class="col-12">
<div class="card ">
<div class="card-header bg-warning text-white">
<span>
<i class="livicon" data-name="users-remove" data-size="18" data-c="#ffffff"
data-hc="#ffffff"></i>
Bill Of Laddings List
</span>
<a href="{{ url('admin/billsoflading') }}" class="btn btn-primary" style="margin-left: 850px;">Add Bill Of Laddings</a>
</div>
<div class="card-body">
<div class="table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-bordered" id="table">
<thead>
<tr class="filters">
<th>Load Number</th>
<th>Customer Name</th>
<th>Customer PO No</th>
<th>Ship To</th>
<th>Ship To PO Number</th>
<th>Ship Date</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($databilling as $data)
<tr>
<td>{{ $data->LoadNumber }}</td>
<td>{{ $getcustomername[0]->CompanyName }}</td>
<td>{{ $getcustpono[0]->PurchaseOrderNumber }}</td>
<td>{{ $data->ShipTo }}</td>

<td>{{ $data->ShipToPONumber }}</td>
<td>{{ $data->ShipDate }}</td>


<td>
<a href="{{ url('editbilling/'.$data->BillofLadingID) }}" class="btn btn-primary">Edit</a>
<a href="{{ url('deletebillslading/'.$data->BillofLadingID) }}" class="btn btn-danger">Delete</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>



@stop

{{-- page level scripts --}}
@section("footer_scripts")
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script>
$(document).ready(function () {
$('#table').DataTable();
});
</script>
@stop
