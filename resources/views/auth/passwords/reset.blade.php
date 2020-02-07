<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Traffic Genius Pro Portal">
        <meta name="keyword" content="Traffic Genius Pro">
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
                <div class="row no-gutters justify-content-center bg-body-dark">
                    <div class="hero-static col-sm-11 col-md-9 col-xl-7 d-flex align-items-center p-2 px-sm-0">
                        <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url({{url('media/photos/photo20@2x.jpg')}})">
                            <div class="row no-gutters">
                                <div class="col-md-6 order-md-1 bg-white">
                                    <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                                        <div class="mb-2 text-center">
                                            <a class="link-fx font-w700 font-size-h1" href="{{ route('dashboard') }}">
                                                <span class="text-dark">Traffic </span><span class="text-primary">Genius Pro</span>
                                            </a>
                                            <p class="text-uppercase font-w700 font-size-sm text-muted">Reset Password</p>
                                        </div>
                                        <form class="js-validation-signin" method="POST" action="{{ route('password.request') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" placeholder="New password" name="password" id="password" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" placeholder="Confirm new password" name="password_confirmation" id="password_confirmation" required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-hero-primary">
                                                    Reset Password
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-0 bg-black-50 d-flex align-items-center">
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
