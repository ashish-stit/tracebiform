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
        <h1>Item list</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Item</a></li>
            <li class="active">Item</li>
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
                             Item List
                        </span>
                         <a href="{{ url('product/additem') }}" class="float-right btn btn-success">
                        <i class="fa fa-plus fa-fw"></i>Add ItemList</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Crop/Plant Category Name</th>
                                    <th>Quantity Per Pallet</th>
                                    <th>Pallet Type</th>
                                    <th>Discontinued</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach ($products as $product)
                                    <tr>
                                        <td>{!!$product->ProductID!!}</td>
                                        <td>{!!$product->ProductCode!!}</td>
                                        <td>{!!$product->ProductName!!}</td>
                                        <td>{!!$product->CategoryName !!}</td>
                                        <td>{!!$product->QuantityPerPallet !!}</td>
                                        <td>{!!$product->PalletType!!}</td>
                                        <td>{!!$product->Discontinued!!}</td>
                                        <td>{!!$product->Brand!!}</td>
                                        <td>
                                            <a href="{{url('/item/product/edit/'.$product->ProductID)}}" class="btn btn-primary">Edit</a>
                                             <a href="{{url('/item/product/delete/'.$product->ProductID)}}" class="btn btn-danger">Delete</a>
                                           

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
