<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Admin Coophub Portal">
        <meta name="author" content="Kog3nt Inc">
        <meta name="keyword" content="Admin Coophub Portal">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>{{ config('kog3nt.title') }}</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{url('/favicon.ico')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{url('/favicon.ico')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('/favicon.ico')}}">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{url('css/dashmix.min.css')}}">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container">
            <main id="main-container">
                <div class="row justify-content-center">
                    <h2 class="content-heading mt-4">
                    <i class="fa fa-angle-right text-muted mr-1"></i> Before you can use <span class="text-info">Payment</span><span class="text-danger">Gateway</span>, you have to fill out the necessary important details below!
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- Validation Wizard -->
                        <div class="js-wizard-validation block block block-rounded block-bordered">
                            <!-- Step Tabs -->
                            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">1. Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#wizard-validation-step2" data-toggle="tab">2. Details</a>
                                </li>
                            </ul>
                            <!-- END Step Tabs -->
                            <!-- Form -->
                            <form class="js-wizard-validation-form" action="{{ route('register.details') }}" method="POST">
                                    {{ csrf_field() }}
                                <!-- Steps Content -->
                                <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                                    <!-- Step 1 -->
                                    <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                                        <div class="form-group">
                                            <label for="wizard-validation-firstname">First Name</label>
                                            <input class="form-control" type="text" id="wizard-validation-firstname" name="first_name" value="{{ old('first_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-lastname">Middle Name</label>
                                            <input class="form-control" type="text" id="wizard-validation-lastname" name="middle_name" value="{{ old('middle_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-lastname">Last Name</label>
                                            <input class="form-control" type="text" id="wizard-validation-lastname" name="last_name" value="{{ old('last_name') }}" required>
                                        </div>
                                    </div>
                                    <!-- END Step 1 -->
                                    <!-- Step 2 -->
                                    <div class="tab-pane" id="wizard-validation-step2" role="tabpanel">
                                        <div class="form-group">
                                            <label for="wizard-validation-address1">House #, Block, Street, Barangay</label>
                                            <input class="form-control" type="text" id="wizard-validation-address1" name="address1" value="{{ old('address1') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-city">City</label>
                                            <input class="form-control" type="text" id="wizard-validation-city" name="city" value="{{ old('city') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-province">Province</label>
                                            <input class="form-control" type="text" id="wizard-validation-province" name="address1" value="{{ old('address1') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-zipcode">Zip Code</label>
                                            <input class="form-control" type="text" id="wizard-validation-zipcode" name="zip_code" value="{{ old('zip_code') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wizard-validation-country">Country</label>
                                            <select class="form-control" id="wizard-validation-country" name="country" required>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- END Step 2 -->
                                </div>
                                <!-- END Steps Content -->
                                <!-- Steps Navigation -->
                                <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-secondary" data-wizard="prev">
                                            <i class="fa fa-angle-left mr-1"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-secondary" data-wizard="next">
                                            Next <i class="fa fa-angle-right ml-1"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                            <i class="fa fa-check mr-1"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Steps Navigation -->
                            </form>
                            <!-- END Form -->
                        </div>
                        <!-- END Validation Wizard Classic -->
                    </div>
                </div>
            </main>
        </div>
        <script src="{{url('js/dashmix.core.min.js')}}"></script>
        <script src="{{url('js/dashmix.app.min.js')}}"></script>
        <script src="{{url('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{url('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{url('js/plugins/jquery-validation/additional-methods.js')}}"></script>
        <script src="{{url('js/pages/be_forms_wizard.min.js')}}"></script>
    </body>
</html>
