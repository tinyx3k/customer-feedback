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
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
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
                <div class="bg-image" style="background-image: url('media/photos/photo12@2x.jpg');">
                    <div class="row no-gutters justify-content-center bg-black-75">
                        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                            <div class="p-3 w-100">
                                <div class="mb-3 text-center">
                                    <a class="link-fx text-success font-w700 font-size-h1" href="index.html">
                                        <span class="text-dark">Payment</span><span class="text-success">Gateway</span>
                                    </a>
                                    <p class="text-uppercase font-w700 font-size-sm text-muted">Create New Account</p>
                                </div>
                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                                        <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <span><i class="icon-envelope-letter"></i></span>
                                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" required
                                                    autofocus placeholder="Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <span><i class="icon-screen-smartphone"></i>(+63)</span>
                                                    <input type="hidden" name="mobile_predefined" value="+63">
                                                    <input type="tel" maxlength="10" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control" required
                                                    autofocus placeholder="10-digit Mobile Number">
                                                </div>
                                                <div class="form-group">
                                                    <span><i class="icon-lock"></i></span>
                                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                                    required>
                                                </div>
                                                <div class="form-group">
                                                    <span><i class="icon-lock"></i></span>
                                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"
                                                    required>
                                                </div>
                                                <small class="text-muted">By clicking Create Account you agree to our <a href="#">Terms of Service</a> and <a href="#">Policy</a></small>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-hero-lg btn-hero-success">
                                                <i class="fa fa-fw fa-plus mr-1"></i> Create Account
                                                </button>
                                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="/login">
                                                        <i class="fa fa-sign-in-alt text-muted mr-1"></i> Sign In (If you already have an account)
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="{{url('js/dashmix.core.min.js')}}"></script>
        <script src="{{url('js/dashmix.app.min.js')}}"></script>
        <script src="{{url('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
        <script src="{{url('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{url('js/pages/op_auth_signup.min.js')}}"></script>
        @include('partials.dashmix._notify')
    </body>
</html>
