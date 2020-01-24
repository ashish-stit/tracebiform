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
        <h1>Customer list</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Customer</a></li>
            <li class="active">Customer</li>
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
                             Customer List
                        </span>
                         <a href="{{ url('admin/addcustomer') }}" class="float-right btn btn-success">
                        <i class="fa fa-plus fa-fw"></i>Add Customer</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>Company Name</th>
                                    <th>Contact Name</th>
                                    <th>Address</th>
                                    <th>Contact Title</th>
                                    <th>City</th>
                                    <th>Region</th>
                                    <th>Postal Code</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>fax</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach ($customers as $customer)
                                    <tr>
                                        <td>{!!$customer->CompanyName!!}</td>
                                        <td>{!!$customer->ContactName!!}</td>
                                        <td>{!!$customer->Address!!}</td>
                                        <td>{!! $customer->ContactTitle !!}</td>
                                        <td>{!!$customer->City!!}</td>
                                        <td>{!!$customer->Region!!}</td>
                                        <td>{!!$customer->PostalCode!!}</td>
                                        <td>{!!$customer->Country!!}</td>
                                        <td>{!!$customer->Phone!!}</td>
                                        <td>{!!$customer->Fax!!}</td>
                                        <td>{!!$customer->Email!!}</td>
                                        
                                        <td>
                                            <a href="{{url('/admin/customer/edit/'.$customer->CustomerID)}}" class="btn btn-primary">Edit</a>
                                             <a href="{{url('/admin/customer/delete/'.$customer->CustomerID)}}" class="btn btn-danger">Delete</a>
                                           

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
