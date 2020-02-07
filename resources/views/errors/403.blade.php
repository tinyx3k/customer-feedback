<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Coophub Portal">
    <meta name="author" content="Kog3nt Inc">
    <meta name="keyword" content="Admin Coophub Portal">
    <title>{{ config('kog3nt.title') }}</title>
    <link rel="shortcut icon" href="{{url('/favicon.ico')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/favicon.ico')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{url('css/dashmix.min.css')}}">
  </head>
  <body>
    <div id="page-container">
      <main id="main-container">
        <div class="bg-image" style="background-image: url('media/photos/photo19@2x.jpg');">
          <div class="hero bg-white-75">
            <div class="hero-inner">
              <div class="content content-full">
                <div class="px-3 py-5 text-center">
                  <div class="row invisible" data-toggle="appear">
                    <div class="col-sm-6 text-center text-sm-right">
                      <div class="display-1 text-danger font-w700">403</div>
                    </div>
                    <div class="col-sm-6 text-center d-sm-flex align-items-sm-center">
                      <div class="display-1 text-muted font-w300">Error</div>
                    </div>
                  </div>
                  <h1 class="h2 font-w700 mt-5 mb-3 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300">Oops.. You just found an error page..</h1>
                  <h2 class="h3 font-w400 text-muted mb-5 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="450">We are sorry but you're not allowed to access this page.</h2>
                  <div class="invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="600">
                    <a class="btn btn-hero-secondary" href="{{ route('dashboard') }}">
                      <i class="fa fa-arrow-left mr-1"></i> Back to Dashboard
                    </a>
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
  </body>
</html>
