
@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pests List
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
    <h1>Single List</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Single</a></li>
        <li class="active">Single List</li>
        
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
                       Single List
                    </span>

                    <a href="{{ URL('wharehouse/single') }}" class="float-right btn btn-success">
                        <i class="fa fa-plus fa-fw"></i>Inventory single</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Lot No</th>
                                        <th>GTIN</th>
                                        <th>Pallet Type</th>
                                        <th>Transaction Date</th>
                                        <th>Grower Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                 @foreach ($single_data as $single)
                                    <tr>
                                        <td>{!!$single->InventoryTransactionID!!}</td>
                                        <td>{!!$single->InventoryTransactionTypeName!!}</td>
                                        <td>{!!$single->ProductName!!}</td>
                                        <td>{!!$single->Quantity!!}</td>
                                         <td>{!!$single->LotNo!!}</td>
                                        <td>{!!$single->GTIN!!}</td>
                                        <td>{!!$single->PalletType!!}</td>
                                        <td>{!!$single->TransactionDate!!}</td>
                                        <td>{!!$single->GrowerName!!}</td>
                                       
                                        
                                        <td>
                                            <a href="{{url('/admin/single/edit/'.$single->InventoryTransactionID)}}" class="btn btn-primary">Edit</a>
                                             <a href="{{url('admin/single/delete/'.$single->InventoryTransactionID)}}" class="btn btn-danger">Delete</a>
                                           

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