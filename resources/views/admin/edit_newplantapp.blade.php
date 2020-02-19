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
    <title>Plant Application | Tracebi Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <!-- <link href="{{ asset('css/pages/login2.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- styles of the page ends-->
    </head>
    @section('content')
    <body>
    <section class="content-header">
    <h1>Edit Plant Application</h1>
    <ol class="breadcrumb">
    <li>
    <a href="">
    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
    Dashboard
    </a>
    </li>
    <li><a href="#">Plant Application</a></li>
    <li class="active">Edit Plant Application</li>
    </ol>
    </section>
    <div class="container">
    <div class="row vertical-offset-50">
    <div class="col-10 col-offset-1 mx-auto">
    <div class="card ">
    <div class="card-header bg-default text-center border-0 py-2">
    <h3>Edit Plant Application</h3>
    </div>
    <div class="card-body">
    <!-- display all errors here -->
    <form accept-charset="UTF-8" action="{{ url('upadtenewapps') }}" method="post">
    {{  csrf_field()  }}
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="FarmFieldApplicationID" value="{{$newappeditdat[0]->FarmFieldApplicationID}}">
    <input type="hidden" name="FarmFieldApplicationTargetPestID" value="{{ $editpestnames[0]->FarmFieldApplicationTargetPestID }}">
    <fieldset>
    <div class="container">
    <div class="row">
    <label>Grower Field ID:</label>
    <select name="GrowerFieldID" class="form-control">
    <option>
    select
    </option>
    @foreach($applicationnew_data as $application)
    <option name="GrowerFieldID" value="{{ $newappeditdat[0]->FarmFieldPlantID }}">
    {{$application->FarmFieldName}}
    </option>
    @endforeach
    </select>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Pesticide Name:</label>
    <select name="PesticideName" class="form-control" id="application_name">
    <option>select</option>
    @foreach($pesticidesnew_data as $data)

    <option name="PesticideName" value="{{$newappeditdat[0]->PesticideID}}" data-single= "{{$data->PesticideID}}" data-singalword="{{$data->PesticideLabelSignalWord}}" data-oralnotification="{{$data->	WPSOralNotification}}"  data-toxicitycode="{{$data->Toxicity}}" data-gradient="{{$data->ActiveIndegrident}}" data-registration="{{$data->EPARegistrationNumber}}" data-entrylevel="{{$data->RestrictedEntryInterval}}" data-productrate="{{$data->ProductRate}}" data-productmesurment="{{$data->ProductMeasurementTypeID}}" data-productconsumed="{{$data->TotalProductConsumed}}" data-gpa_no="{{$data->GPA}}">
    {{$data->PesticideName}}
    </option>
    @endforeach
    </select>
    </div>
    <div class="container" id="application_dim" >
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Total Acres:</label>
    <input class="form-control" placeholder="TotalAcress" name="TotalAcres" type="text"
    value="{{$newappeditdat[0]->TotalAcres}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>DateTime Sprayed:</label>
    <input class="form-control" placeholder="Date Time Sprayed" name="DateTimeSprayed" type="text"
    value="{{$newappeditdat[0]->DateTimeSprayed}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Wind Speed:</label>
    <input class="form-control" placeholder="Wind Speed" name="WindSpeed" type="text"
    value="{{$newappeditdat[0]->WindSpeed}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Wind Direction:</label>
    <input class="form-control" placeholder="Wind Direction" name="WindDirection" type="text"
    value="{{$newappeditdat[0]->WindDirection}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Field Scheduled ReEnter Time:</label>
    <input class="form-control" placeholder="Field Scheduled ReEnter Time" name="FieldScheduledReEnterTime" type="text"
    value="{{$newappeditdat[0]->FieldScheduledReEnterTime}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>GPA To BE Used:</label>
    <input class="form-control" id="GPA" placeholder="GPA To BE Used" name="GPAToBEUsed" type="text"
    value="{{$newappeditdat[0]->GPAToBEUsed}}"/>
    </div>
    </div>

    <div class="container" style="margin-top: 20px;">
    <div class="row">
    <label>Comments:</label>
    <input class="form-control" placeholder="Comments" name="Comments" type="text"
    value="{{$newappeditdat[0]->Comments}}"/>
    </div>
    </div>
    
    <div class="container">
    <div class="row">
    <label>Pest Name:</label>
    <select name="petsname" id="petsname" class="form-control">
    <option>
    select
    </option>
    @foreach($pestnew_data as $pet_data)
    <option name= "petsname" data-id= "{{$pet_data->PestID}}" data-petsname= "{{$pet_data->PestName}}" value="{{$editpestnames[0]->PestID}}">
    {{$pet_data->PestName}}
    </option>
    @endforeach
    </select>
    </div>
    </div>
    <div class="container" id="pets_div" >
    </div>


    <div class="container" style="margin-top: 20px;">
    <div class="row">

    <input type="submit" value="Update" class="btn btn-primary" />


    <a href="{{ URL('admin/newplantapplicationlist')}}" class="btn btn-danger" style="margin-left: 10px;">Cancel</a>


    </div>
    </div>

    </fieldset>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>



    <script>
    $(document).ready(function(){
    $("#application_name").change(function(){
    var webUrl = {!! json_encode(url('/')) !!}
    var sd=$('#application_name :selected').val();
    var application=$('#application_name').find(':selected').data('single');
    var singalword=$('#application_name').find(':selected').data('singalword');
    var oralnotification=$('#application_name').find(':selected').data('oralnotification');
    var toxicitycode=$('#application_name').find(':selected').data('toxicitycode');
    var gradient=$('#application_name').find(':selected').data('gradient');
    var registration=$('#application_name').find(':selected').data('registration');
    var gradient=$('#application_name').find(':selected').data('entrylevel');
    var productrate=$('#application_name').find(':selected').data('productrate');
    var productmesurment=$('#application_name').find(':selected').data('productmesurment');
    var productconsumed=$('#application_name').find(':selected').data('productconsumed');
    var gpa=$('#application_name').find(':selected').data('gpa_no');
    var G_pa=$('#GPA').val(gpa);
    $('#application_dim').html('');
    $.ajax({
    url: webUrl + '/applicationdata',
    type: "POST",
    data: {applicationid: application},
    dataType: 'json',
    success: function (pro_id) {  
    $.each(pro_id.pro_id, function (index, value)  
    {   
    console.log(pro_id.pro_id.length);
    $('#application_dim').append('<div class="row">\
    <label>Common Name :'+value.	RestrictedUseData+'</label>\ </div>\
    <div class="row">\
    <label>PesticideLabelSignalWord :'+value.	PesticideLabelSignalWord+'</label>\ </div>\
    <div class="row">\
    <label id="test123">WPSOralNotification :'+value.WPSOralNotification+'</label></div>\
    <div class="row">\
    <label id="test123">Toxicity Code :'+value.Toxicity+'</label></div>\
    <div class="row">\
    <label id="test123">EPA Registration Number :'+value.EPARegistrationNumber+'</label></div>\
    <div class="row">\
    <label id="test123">Restricted Entry Interval :'+value.RestrictedEntryInterval+'</label></div>\
    <div class="row">\
    <label id="test123">Product Rate :'+value.ProductRate+'</label></div>\
    <div class="row">\
    <label id="test123">ProductMeasurementType :'+value.ProductMeasurementTypeID+'</label></div>\
    <div class="row">\
    <label id="test123">Total Product Consumed:'+value.	TotalProductConsumed+'</label></div>\
    <div class="row">\
    <label id="test123">Active Indegrident :'+value.ActiveIndegrident+'</label>\
    </div>');
    });
    }


    });
    });
    });

    </script>
    <script>
    $(document).ready(function(){
    $("#petsname").change(function(){
    var webUrl = {!! json_encode(url('/')) !!}
    var wrapper = $("#pets_div");
    var pets=$('#petsname').find(':selected').data('id');
    var petsname=$('#petsname').find(':selected').data('petsname');
    $('#pets_id').val(petsname);
    if ( $("#petsname option[value='" +petsname+ "']").length == 0 )
    {

    $(wrapper).append('<div class="row"><div class="col-xs-12 col-sm-6 col-md-6">\
    <label id="test123">PestName</label>\
    <input type="text" name="PestName" class="form-control" value="'+petsname+'" readonly><a href="#"  class="delete">Remove</a></div>\
    \
    </div>\
    ');
    }
    else
    {
    alert('already exist');
    }


    $(wrapper).on("click", ".delete", function() {
    $(this).parent().remove();


    });        

    });



    });


    </script> 


    </script>
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
