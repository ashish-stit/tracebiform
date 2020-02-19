	@extends('admin/layouts/default')

	{{-- Page title --}}
	@section('title')
	New Plant Application List
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
	<h1>New Plant Application List</h1>
	<ol class="breadcrumb">
	<li>
	<a href="{{ route('admin.dashboard') }}">
	<i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
	Dashboard
	</a>
	</li>
	<li><a href="#"> Users</a></li>
	<li class="active">New Plant Application List</li>

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
	New Plant Application List
	</span>
	<a href="{{ url('NewPlantApplication/form') }}" class="btn btn-primary" style="margin-left: 830px;">Add New Plant Application</a>
	</div>
	<div class="card-body">
	<div class="table-responsive-lg table-responsive-sm table-responsive-md">
	<table class="table table-bordered" id="table">
	<thead>
	<tr class="filters">

	<th>Pesticide Name</th>
	<th>Total Acres</th>
	<th>DateTime Sprayed</th>
	<th>Wind Speed</th>
	<th>Wind Direction</th>
	<th>Field Scheduled ReEnter Time</th>
	<th>GPA To BE Used</th>
	<th>Actual GPA Sprayed</th>
	<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	@foreach($applistview as $data)
	<tr>

	<td>{{ $data->PesticideName }}</td>
	<td>{{ $data->TotalAcres }}</td>
	<td>{{ $data->DateTimeSprayed }}</td>

	<td>{{ $data->WindSpeed }}</td>
	<td>{{ $data->WindDirection }}</td>
	<td>{{ $data->FieldScheduledReEnterTime }}</td>
	<td>{{ $data->GPAToBEUsed }}</td>

	<td>{{$data->ActualGPASprayed}}</td>


	<td>
	<a href="{{ url('admin/edit_newplantapp/'.$data->FarmFieldApplicationID) }}" class="btn btn-primary">Edit</a>
	<a href="{{ url('deletenewplantapp/'.$data->FarmFieldApplicationID) }}" class="btn btn-danger">Delete</a>
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
