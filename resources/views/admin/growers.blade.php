@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Growers List
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
<h1>Growers List</h1>
<ol class="breadcrumb">
<li>
<a href="{{ route('admin.dashboard') }}">
<i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
Dashboard
</a>
</li>
<li><a href="#"> Users</a></li>
<li class="active">Growers List</li>

</ol>
</section>
<!-- Main content -->
<section class="content pr-3 pl-3">
<div class="row">
<div class="col-12">
<div class="card ">
<div class="card-header bg-warning text-white">
<span>
<i class="livicon" data-name="users-remove" data-size="18" data-c="#ffffff"
data-hc="#ffffff"></i>
Growers List
</span>
<a href="{{ url('admin/addgrowers') }}" class="btn btn-primary" style="margin-left: 920px;">Add Growers</a>
</div>
<div class="card-body">
<div class="table-responsive-lg table-responsive-sm table-responsive-md">
<table class="table table-bordered" id="table">
<thead>
<tr class="filters">
<th>ID</th>
<th>Company Name</th>
<th>Contact Name</th>
<th>Contact Title</th>
<th>Address</th>
<th>City</th>
<th>Region</th>
<th>Postal Code</th>
<th>Country</th>
<th>Phone</th>
<th>Home Page</th>
<th>Email</th>
<th>Company UCC Prefix</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($growers_data as $growers_data)
<tr>
<td>{{ $growers_data->SupplierID }}</td>
<td>{{ $growers_data->CompanyName }}</td>
<td>{{ $growers_data->ContactName }}</td>
<td>{{ $growers_data->ContactTitle }}</td>

<td>{{ $growers_data->Address }}</td>
<td>{{ $growers_data->City }}</td>
<td>{{ $growers_data->Region }}</td>
<td>{{ $growers_data->PostalCode }}</td>

<td>{{ $growers_data->Country }}</td>
<td>{{ $growers_data->Phone }}</td>
<td>{{ $growers_data->HomePage }}</td>
<td>{{ $growers_data->Email }}</td>
<td>{{ $growers_data->CompanyUCCprefix }}</td>

<td>
<a href="{{ url('delete_growers/'.$growers_data->SupplierID ) }}"><i class="fa fa-trash"></i></a>
<a href="{{url('admin/edit_growers/'.$growers_data->SupplierID) }}"><i class="fa fa-edit"></i></a>
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
