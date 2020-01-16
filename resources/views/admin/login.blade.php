<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <!-- end of global level css -->
    <!-- page level css -->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/advbuttons.css') }}" />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/login.css') }}" />
    <link href="{{ asset('vendors/iCheck/css/square/blue.css') }}" rel="stylesheet"/>

     <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .dropzone .dz-preview .dz-image img {
            width :100%;
        }
    </style>
    <!-- end of page level css -->

    <style>

        .help-block {
            color: #a94442;
        }

        .change_link .btn-warning {
            color: #fff;
        }

        #wrapper label {
            color: rgb(64, 92, 96);
            font-weight: 700;
        }
    </style>

</head>

<body>
<div class="container">
    <div class="row my-3">
        <div class="col-12 mx-auto">
            <div id="notific">
                @include('notifications')
            </div>
        </div>
    </div>
    <div class="row vertical-offset-100">
        <!-- Notifications -->
        <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4 mx-auto">

            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toforgot"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="login_form"
                              class="my-3">
                            <h3 class="black_bg">
                                <img src="{{ asset('img/logo.png') }}" alt="josh logo">
                                <br>Log In</h3>
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email" class="uname control-label"> <i
                                            class="livicon" data-name="mail" data-size="16" data-loop="true"
                                            data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                    E-mail
                                </label>
                                <input id="email" name="email" type="email" placeholder="E-mail"
                                       value="{!! old('email') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon"
                                                                                                       data-name="key"
                                                                                                       data-size="16"
                                                                                                       data-loop="true"
                                                                                                       data-c="#3c8dbc"
                                                                                                       data-hc="#3c8dbc"></i>
                                    Password
                                </label>
                                <input id="password" name="password" type="password" placeholder="Enter a password"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="remember-me" id="remember-me" value="remember-me"
                                           class="square-blue"/>
                                    Keep me logged in
                                </label>
                            </div>
                            <p class="login button">
                                <input type="submit" value="Log In" class="btn btn-success"/>
                            </p>
                            <p class="change_link">
                                <a href="#toforgot">
                                    <button type="button"
                                            class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot
                                        password
                                    </button>
                                </a>
                                <a href="#toregister">
                                    <button type="button" id="signup"
                                            class="btn btn-responsive botton-alignment btn-success btn-sm"
                                            style="float:right;">Sign Up
                                    </button>
                                </a>
                            </p>
                            <div class="row">
                                <div class="col-lg-12 text-center social_login mb-3">
                                    <a class="btn btn-block btn-social btn-facebook" href="{{ url('/facebook') }}">
                                        <i class="fab fa-facebook-f"></i> Sign in with Facebook
                                    </a>
                                    <a class="btn btn-block btn-social btn-google-plus" href="{{ url('/google') }}">
                                        <i class="fab fa-google-plus-g"></i> Sign in with Google
                                    </a>
                                    <a class="btn btn-block btn-social btn-linkedin" href="{{ url('/linkedin') }}">
                                        <i class="fab fa-linkedin-in"></i> Sign in with LinkedIn
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="register" class="animate form">
                        <form action="{{ route('admin.signup') }}" autocomplete="on" method="post" role="form"
                              id="register_here">
                            <h3 class="black_bg my-3">
                                <br>User Registration</h3>
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                           
                    <div class="form-group">
                        <div class="input-group-append radius_left">
                            <select id="select24" name="type" >
                                <option value="">--Select--</option>
                                
                                    <option value="dist">DISTRIBUTIOR</option>
                                    <option value="gr">GROWER</option>
                                    <option value="su">SUPPLIER</option>
                                
                            </select>
                            <div class="input-group-append">
                                <!--<button class="btn btn-light" type="button" data-select2-open="single-append-text">-->
                                <span class="input-group-text border_radius"><span class="fa fa-search"></span></span>
                                <!--</button>-->
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="input-group-append radius_left">
                            <select id="select24" name="reference">
                                <option value="">--Reference--</option>
                                
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                
                            </select>
                            <div class="input-group-append">
                                <!--<button class="btn btn-light" type="button" data-select2-open="single-append-text">-->
                                <span class="input-group-text border_radius"><span class="fa fa-search"></span></span>
                                <!--</button>-->
                            </div>
                        </div>
                    </div>

                      <div class="form-group {{ $errors->first('login_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="login_name" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Login Name
                                </label>
                                <input id="login_name" name="login_name" required type="text" placeholder="John"
                                       value="{!! old('login_name') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('login_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            
                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="password1" class="youpasswd">
                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Password
                                </label>
                                <input id="password1" name="password" required type="password" placeholder="Password"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="password_confirm" class="youpasswd">
                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Confirm Password
                                </label>
                                <input id="password_confirm" name="password_confirm" required type="password"
                                       placeholder="Confirm Password"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                      
                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="first_name" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    First Name
                                </label>
                                <input id="first_name" name="first_name" required type="text" placeholder="John"
                                       value="{!! old('first_name') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="last_name" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Last Name
                                </label>
                                <input id="last_name" name="last_name" required type="text" placeholder="Doe"
                                       value="{!! old('last_name') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                             <div class="form-group {{ $errors->first('title', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="title" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Title
                                </label>
                                <input id="title" name="title" required type="text" placeholder="John"
                                       value="{!! old('title') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="form-group {{ $errors->first('courtesy', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="courtesy" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Title of courtesy
                                </label>
                                <input id="courtesy" name="courtesy" required type="text" placeholder="John"
                                       value="{!! old('courtesy') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('courtesy', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>



                                   <!-- IP mask -->
                         <div class="form-group">
                        <label>Birth Date</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                 <span class="input-group-text">  <i class="livicon" data-name="laptop" data-size="16" data-c="#555555" data-hc="#555555" data-loop="true"></i>
                           </span> </div>
                            <input type="text" name="birthdate" class="form-control" data-mask="99/99/9999" placeholder="MM/DD/YYYY"/>
                        </div>
                        <!-- /.input group -->
                    </div>
                     <div class="form-group">
                        <label>Hire Date</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                 <span class="input-group-text">  <i class="livicon" data-name="laptop" data-size="16" data-c="#555555" data-hc="#555555" data-loop="true"></i>
                           </span> </div>
                            <input type="text" name="hiredate" class="form-control" data-mask="99/99/9999" placeholder="MM/DD/YYYY"/>
                        </div>
                        <!-- /.input group -->
                    </div>
                        <!-- /.form group -->




                             <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="address" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Address
                                </label>
                                <input id="title" name="address" required type="text" placeholder="John"
                                       value="{!! old('address') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="city" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    City
                                </label>
                                <input id="courtesy" name="city" required type="text" placeholder="John"
                                       value="{!! old('city') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>







                             <div class="form-group {{ $errors->first('postalcode', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="postalcode" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Postalcode
                                </label>
                                <input id="title" name="postalcode" required type="text" placeholder="John"
                                       value="{!! old('postalcode') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('postalcode', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="country" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Country
                                </label>
                                <input id="courtesy" name="country" required type="text" placeholder="John"
                                       value="{!! old('country') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                       



                         <div class="form-group {{ $errors->first('homephone', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="homephone" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Homephone
                                </label>
                                <input id="title" name="homephone" required type="text" placeholder="John"
                                       value="{!! old('homephone') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('homephone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="form-group {{ $errors->first('extension', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="extension" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Extension
                                </label>
                                <input id="extension" name="extension" required type="text" placeholder="John"
                                       value="{!! old('extension') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('extension', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->first('notes', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="notes" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Notes
                                </label>
                                <input id="notes" name="notes" required type="text" placeholder="John"
                                       value="{!! old('notes') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('notes', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="form-group {{ $errors->first('region', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="region" class="youmail">
                                    <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Notes
                                </label>
                                <input id="region" name="region" required type="text" placeholder="John"
                                       value="{!! old('region') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('region', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                    <div class="form-group">
                        <div class="input-group-append radius_left">
                            <select id="select24" >
                                <option value="" name="reportto">--Reports To--</option>
                                
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                
                            </select>
                            <div class="input-group-append">
                                <!--<button class="btn btn-light" type="button" data-select2-open="single-append-text">-->
                                <span class="input-group-text border_radius"><span class="fa fa-search"></span></span>
                                <!--</button>-->
                            </div>
                        </div>
                    </div>

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email1" class="youmail">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    E-mail
                                </label>
                                <input id="email1" name="email" value="{!! old('email') !!}" required type="email"
                                       placeholder="mysupermail@mail.com"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('email_confirm', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email_confirm" class="youmail">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Confirm E-mail
                                </label>
                                <input id="email_confirm" name="email_confirm" required type="email"
                                       placeholder="mysupermail@mail.com" value="{!! old('email_confirm') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            <p class="signin button">
                                <input type="submit" class="btn btn-success" value="Sign Up"/>
                            </p>
                            <p class="change_link">
                                <a href="#tologin" class="to_register">
                                    <button type="button"
                                            class="btn btn-responsive botton-alignment btn-warning btn-sm">Back
                                    </button>
                                </a>
                            </p>
                        </form>
                    </div>
                    <div id="forgot" class="animate form">
                        <form action="{{ url('admin/forgot-password') }}" autocomplete="on" method="post" role="form"
                              id="reset_pw">
                            <h3 class="black_bg my-3">
                                <img src="{{ asset('img/logo.png') }}" alt="josh logo"><br>Forgot Password</h3>
                            <p style="font-size:14px !important;">
                                Enter your email address below and we'll send a special reset password link to your
                                inbox.
                            </p>

                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                <label style="margin-bottom:0px;" for="email2" class="youmai">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc"
                                       data-hc="#3c8dbc"></i>
                                    Your email
                                </label>
                                <input id="email2" name="email" required type="email" placeholder="your@mail.com"
                                       value="{!! old('email') !!}"/>
                                <div class="col-sm-12">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <p class="login button">
                                <input type="submit" value="Reset Password" class="btn btn-success"/>
                            </p>
                            <p class="change_link">
                                <a href="#tologin" class="to_register">
                                    <button type="button"
                                            class="btn btn-responsive botton-alignment btn-warning btn-sm">Back
                                    </button>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/frontend/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/pages/datepicker.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
<script>
<!--livicons-->
<script src="{{ asset('js/raphael.min.js') }}"></script>
<script src="{{ asset('js/livicons-1.4.min.js') }}"></script>
<script src="{{ asset('vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/login.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('vendors/dropzone/js/dropzone.js') }}" ></script>
    <script>
        var FormDropzone = function() {
            return {
                //main function to initiate the module
                init: function() {
                    Dropzone.options.myDropzone = {
                        init: function() {
                            this.on("success", function(file,responseText) {
                                var obj = jQuery.parseJSON(responseText);
                                file.id = obj.id;
                                file.filename = obj.filename;
                                // Create the remove button
                                var removeButton = Dropzone.createElement("<button style='margin: 10px 0 0 15px;'>Remove file</button>");

                                // Capture the Dropzone instance as closure.
                                var _this = this;

                                // Listen to the click event
                                removeButton.addEventListener("click", function(e) {
                                    // Make sure the button click doesn't submit the form:
                                    e.preventDefault();
                                    e.stopPropagation();

                                    $.ajax({
                                        url: "file/delete",
                                        type: "DELETE",
                                        data: { "id" : file.id, "_token": '{{ csrf_token() }}' }
                                    });
                                    // Remove the file preview.
                                    _this.removeFile(file);
                                });

                                // Add the button to the file preview element.
                                file.previewElement.appendChild(removeButton);

                            });

                        }
                    }
                }
            };
        }();
        jQuery(document).ready(function() {

            FormDropzone.init();
        });
    </script>
<!-- end of global js -->
</body>
</html>
