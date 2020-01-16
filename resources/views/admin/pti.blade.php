@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Tasks
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('css/pages/todolist.css') }}"/>
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}">
<!-- end of page level css -->
<style>
    .datetimepicker-dropdown-bottom-left:before{
        right:inherit;
    }
    .todolist .row
    {
        display: block;
    }
    .todolist [class*="col-"] {
        float: none;
        display: inline-block;
        vertical-align: top;
    }
    .todolist .col-lg-9,.col-md-9
    {
        width:83%;
    }
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Add SSCC Unit</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Add SSCC Unit</li>
    </ol>
</section>
<!--section ends-->
 <form accept-charset="UTF-8" id="register_here" role="form" action="{{ url('admin/postpti') }}" method="post">
                            <!-- CSRF Token -->
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<section class="content pl-3 pr-3">
    <div class="row">
        <!-- To do list -->
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <div class="card todolist">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">
                        <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white"
                        data-l="true"></i>
                        Add SSCC Unit
                    </h4>
                </div>
                <div class="card-body nopadmar">
                    <div class="card-body">
                        <div class="scroller_height">
                            <div class="row list_of_items">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <lable>Select Grower:</lable>
                      <select name="grower" class="form-control">
                          <option value="">Piglets and Lechon Company</option>
                          
                      </select>
                  </div>

                  <div class="form-group">
                        <lable>Select Lot:</lable>
                      <select name="lot" class="form-control">
                        <option value="select">--select--</option>
                          <option value="sc">SC10111062019</option>
                          
                      </select>
                  </div>

                  <div class="form-group">
                        <lable>Select Product:</lable>
                      <select name="product" class="form-control">
                        <option value="select">--select--</option>
                          <option value="sc">item1</option>
                           <option value="sc">item1</option>
                           <option value="">item1</option>
                           <option value="">Lechon25 Kilos</option>
                           <option value="">LECHON 30</option>
                           <option value="">LECHON 40 Kilos</option>
                           <option value="">LECHON 50 </option>
                           <option value="">LECHON 60 TEST</option>

                        </select>
                  </div>

                  <div class="form-group">
                    <lable>Quantity to Print</lable>
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="smartphone" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Quantity to Print" name="quantitytoprint" type="text"
                        value="{!! old('HomePhone') !!}"/>
                    </div>
                </div>


            </div>
        </div>
        <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" />
    </div>
</div>
</div>
</section>
</form>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/tasklist.js') }}"></script>

<script>
    var currentDate = new Date();
    $(".datepicker").datetimepicker({
        startDate: currentDate,
        format: "yyyy/mm/dd",
        autoclose: true,
        time:false,
        pickerPosition: "bottom-right",
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
@stop