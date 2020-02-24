<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Rewards App Admin</title>
<meta name="description" content="Rewards App">
<meta name="author" content="Ralph">
<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{url('/favicon.ico')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{url('/favicon.ico')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/favicon.ico')}}">
<!-- END Icons -->
<!--PLUGINS-->
<link rel="stylesheet" href="{{url('js/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{url('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('js/plugins/sweetalert2/sweetalert2.min.css')}}">
<!--END PLUGINS-->
<!-- Stylesheets -->
<!-- Fonts and Dashmix framework -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
<link rel="stylesheet" id="css-main" href="{{url('css/dashmix.css')}}">
        <link rel="stylesheet" id="css-main" href="{{url('css/themes/xinspire.min.css')}}">
<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<!-- END Stylesheets -->
@yield('styles')