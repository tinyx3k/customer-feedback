<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->

        <div>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-dual mr-1 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-fw fa-user-circle"></i>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                        @if(auth()->user()->profile_image == null || auth()->user()->profile_image == '')
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="https://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}?s=160&d=retro" alt="">
                        @else
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('profile_images').'/'.auth()->user()->profile_image }}" alt="">
                        @endif
                        <div class="pt-2">
                            <a class="text-white font-w600" href="be_pages_generic_profile.html">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</a>
                        </div>
                    </div>
                    <div class="p-2">
                        @ability('Super Admin', [])
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="far fa-fw fa-user mr-1"></i> Profile
                        </a>      
                        @endability
                        <!-- END Side Overlay -->
                        @if (Auth::check())
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-sidebar-dark">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dark" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Search Application.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <!-- END Header Loader -->
</header>
