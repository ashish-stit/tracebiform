@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Deleted users
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
        <h1>Purchase Order list</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Purchase Order</a></li>
            <li class="active">Purchase Order</li>
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
                             Purchase Order List
                        </span>
                         <a href="{{ url('Purchase/orderadd') }}" class="float-right btn btn-success">
                        <i class="fa fa-plus fa-fw"></i>Add Purchase Order</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>Load Number</th>
                                    <th>Purchase Order Number</th>
                                    <th>Customer Name</th>
                                    <th>Ship To</th>
                                    <th>Ship To Po No</th>
                                    <th>Order Date</th>
                                    <th>Date Required</th>
                                    <th>Scheduling Shipping Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($order_data as $ord_data)
                                      <tr>
                                            <td>{{ $ord_data->LoadNumber }}</td>
                                            <td>{{ $ord_data->PurchaseOrderNumber }}</td>
                                            <td>{{ $ord_data->CustomerID }}</td>
                                            <td>{{ $ord_data->ShipToID }}</td>
                                            <td>{{ $ord_data->ShipToPONumber }}</td>
                                            <td>{{ $ord_data->OrderDate }}</td>
                                            <td>{{ $ord_data->DateRequired }}</td>
                                            <td>{{ $ord_data->ShipDate }}</td>
                                            
                                            <td>
                                            
                                             <a href="{{ url('admin/edit_ord/'.$ord_data->PurchaseOrderID) }}" class="btn btn-primary">Edit</a>
                                             <a href="{{ url('delete_ord/'.$ord_data->PurchaseOrderID) }}" class="btn btn-danger">Delete</a>
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
