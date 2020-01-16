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
    <title>Register | Tracebi Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <!-- <link href="{{ asset('css/pages/login2.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <!-- styles of the page ends-->
</head>
@section('content')
<body>
    <div class="container">
        <div class="row vertical-offset-50">
            <div class="col-10 col-offset-1 mx-auto">
                <div class="card ">
                    <div class="card-header bg-default text-center border-0 py-2">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        <!-- display all errors here -->
                        <form accept-charset="UTF-8" id="register_here" role="form" action="{{ route('register2') }}" method="post">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <fieldset>

                              <div class="form-group">
                                  <select name="type" class="form-control">
                                  <option value="select">--Select--</option>
                                  <option value="DISTRIBUTOR">DISTRIBUTOR</option>
                                  <option value="GROWER">GROWER</option>
                                  <option value="SUPPLIER">SUPPLIER</option>
                              </select>
                              </div>

                                <div class="form-group">
                                  <select name="reference" class="form-control">
                                  <option value="select">--Select--</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                              </select>
                              </div>

                              <div class="form-group">
                                  <select name="refrence" class="form-control">
                                  <option value="select">--Select--</option>
                                  <option value="super_admin">Super Admin</option>
                                  <option value="distributor_administrator">Distributor Administrator</option>
                                  <option value="Supplier Administor">supplier_administor</option>
                              </select>
                              </div>

                          

                          <!--   <div class="form-group">
                                <div class=" input-group ">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="UserType Name" name="usertypename" type="text"
                                           value="{!! old('usertypename') !!}"/>
                                </div>
                            </div> -->




                            <div class="form-group">
                                <div class=" input-group ">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Login Name" name="login_name" type="text"
                                    value="{!! old('login_name') !!}"/>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                <div class=" input-group ">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="First Name" name="first_name" type="text"
                                    value="{!! old('first_name') !!}"/>
                                </div>
                                <div class="help-block">
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->first('last_name', 'has-error') }}">
                                <div class="input-group">
                                    <div class="input-group-append">
                                     <span class="input-group-text"><i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                                 </div>
                                 <input class="form-control" placeholder="Last Name" name="last_name" type="text"
                                 value="{!! old('last_name') !!}"/>
                             </div>
                             <div class="help-block">
                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->first('email', 'has-error') }}">
                            <div class="input-group ">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                                </div>
                                <input class="form-control" placeholder="E-mail" name="email" type="email"
                                value="{!! old('email') !!}"/>
                            </div>
                            <div class="help-block">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->first('email_confirm', 'has-error') }}">
                            <div class="input-group ">
                                <div class="input-group-append">
                                   <span class="input-group-text"><i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                               </div>
                               <input class="form-control" placeholder="Confirm E-mail" name="email_confirm"
                               type="email" value="{!! old('email_confirm') !!}"/>
                           </div>
                           <div class="help-block">
                            {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group  {{ $errors->first('password', 'has-error') }}">
                        <div class="input-group ">
                            <div class="input-group-append">
                                <span class="input-group-text"> <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password" name="password" type="password"
                            value=""/>
                        </div>
                        <div class="help-block">
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group  {{ $errors->first('password_confirm', 'has-error') }}">
                        <div class="input-group ">
                            <div class="input-group-append">
                               <span class="input-group-text"><i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                           </div>
                           <input class="form-control" placeholder="Confirm Password" name="password_confirm"
                           type="password" value=""/>
                       </div>
                       <div class="help-block">
                        {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="title" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Title" name="title" type="text"
                        value="{!! old('title') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Title Of Courtesy" name="courtesy" type="text"
                        value="{!! old('courtesy') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Birth Date" name="birthdate" type="date"
                        value="{!! old('birthdate') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Hire Date" name="hiredate" type="date"
                        value="{!! old('hiredate') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Address" name="address" type="text"
                        value="{!! old('address') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="City" name="city" type="text"
                        value="{!! old('city') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Region" name="Region" type="text"
                        value="{!! old('Region') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Postal Code" name="postal" type="text"
                        value="{!! old('postal') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Country" name="country" type="text"
                        value="{!! old('country') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="smartphone" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Home Phone" name="HomePhone" type="text"
                        value="{!! old('HomePhone') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Extension" name="Extension" type="text"
                        value="{!! old('Extension') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Notes" name="Notes" type="text"
                        value="{!! old('Notes') !!}"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" input-group ">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="livicon" data-name="date" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i></span>
                        </div>
                        <input class="form-control" placeholder="Reports To" name="ReportsTo" type="text"
                        value="{!! old('ReportsTo') !!}"/>
                    </div>
                </div>





                <div class="form-group">
                    <label>
                        <input id="activate" name="activate" type="checkbox" value="1"
                        class="minimal-blue" {!! old('terms')?"checked='checked'":"" !!}>
                        <span style="font-size: 14px;">I agree for terms & conditions</span>
                    </label>
                    <br>
                </div>
                <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" />
            </fieldset>
        </form>
    </div>
</div>
</div>
</div>
</div>
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