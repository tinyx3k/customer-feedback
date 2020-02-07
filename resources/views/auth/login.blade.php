<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Tango Theaters Rewards App Portal">
        <meta name="keyword" content="Tango Theaters Rewards App">
        <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <title>Tango Theatres Rewards App</title>
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
        <link rel="stylesheet" id="css-main" href="{{url('css/themes/xinspire.min.css')}}">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container">
            <main id="main-container">
                <div class="row no-gutters justify-content-center" style="background-color: #12145f;">
                    <div class="hero-static col-sm-11 col-md-9 col-xl-7 d-flex align-items-center p-2 px-sm-0">
                        <div class="block block-rounded block-transparent block-fx-shadow w-100 mb-0">
                            <div class="row no-gutters">
                                <div class="col-md-6 order-md-1 bg-white">
                                    <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                        <div class="mb-2 text-center">
                                            <a class="link-fx font-w700 font-size-h1" href="{{ route('dashboard') }}">
                                                <span class="text-dark">Rewards </span><span class="text-primary">Admin Login</span>
                                            </a>
                                            <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                                        </div>
                                        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-alt" id="login-username" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-alt" id="login-password" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-hero-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                </button>
                                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="javascript:void(0);">
                                                        <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Forgot password
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-0 bg-black-50 align-items-center d-none d-lg-flex">
                                    <img src="{{ asset('img/android_app/idm-2.jpg') }}" alt="" class="img-fluid">
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
        <script src="{{url('js/pages/op_auth_signin.min.js')}}"></script>
        @include('partials.dashmix._notify')
    </body>
</html>
