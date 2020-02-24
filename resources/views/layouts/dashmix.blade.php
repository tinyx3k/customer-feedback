<html lang="en">
    <head>
    	@include('partials.dashmix._head')
    	@yield('style')
    </head>
    <body>
        <div id="page-container" class="enable-page-overlay {{config('dashmix.sidenav')}} {{config('dashmix.side-scroll')}} {{config('dashmix.header')}} {{config('dashmix.header-style')}} {{config('dashmix.main-content')}} {{config('dashmix.footer')}}">
            @include('partials.dashmix._sidenav')
            @include('partials.dashmix._nav')
            <main id="main-container">
            {{-- @include('partials.dashmix._breadcrumb') --}}
                <div class="content">
                	@yield('content')
                </div>
            </main>
            {{-- @include('partials.dashmix._footer') --}}
        </div>
        @include('partials.dashmix._javascript')
        @include('partials.dashmix._helper')
        @yield('modal')
        @yield('scripts')
        @include('partials.dashmix._notify')
    </body>
</html>
