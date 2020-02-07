<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header justify-content-lg-center">
        <!-- Logo -->
        <a class="link-fx font-size-md text-dual" href="/">
            <span class="text-white-75">{{ auth()->user()->hasRole('Super Admin') ? 'Super Admin Dashboard': 'ICFMPA Admin' }}</span>
        </a>
        <!-- END Logo -->
        <!-- Options -->
        <div class="d-lg-none">
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-times-circle"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
    </div>
    <!-- END Side Header -->
    <!-- Side Actions -->
    <!-- END Side Actions -->
    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-heading">Navigation</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('dashboard') }}">
                    <i class="nav-main-link-icon si si-home"></i>
                    <span class="nav-main-link-name">Home</span>
                </a>
            </li>
            @ability('Super Admin', [])
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-users"></i>
                    <span class="nav-main-link-name">User Management</span>
                </a>
                <ul class="nav-main-submenu">
                    @ability('Super Admin', 'view_user')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('user.index') }}">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Users</span>
                        </a>
                    </li>
                    @endability
                    @ability('Super Admin', 'view_role')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('role.index') }}">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">Roles</span>
                        </a>
                    </li>
                    @endability
                    @ability('Super Admin', 'view_permission')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('permission.index') }}">
                            <i class="nav-main-link-icon si si-lock"></i>
                            <span class="nav-main-link-name">Permissions</span>
                        </a>
                    </li>
                    @endability
                    @ability('Super Admin', 'view_role_permission')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('role_permission.index') }}">
                            <i class="nav-main-link-icon si si-user-following"></i>
                            <span class="nav-main-link-name">Role Permissions</span>
                        </a>
                    </li>
                    @endability
                </ul>
            </li>
            @endability
            @ability('Super Admin', [])
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-handbag"></i>
                    <span class="nav-main-link-name">Item Management</span>
                </a>
                <ul class="nav-main-submenu">
                    @ability('Super Admin', 'view_user')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('item.index') }}">
                            <i class="nav-main-link-icon si si-layers"></i>
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                    @endability
                    @ability('Super Admin', 'view_role')
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('item.create') }}">
                            <i class="nav-main-link-icon si si-plus"></i>
                            <span class="nav-main-link-name">Add New Item</span>
                        </a>
                    </li>
                    @endability
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-bar-chart"></i>
                    <span class="nav-main-link-name">Records/Reports</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('customer.report') }}">
                            <i class="nav-main-link-icon si si-users"></i>
                            <span class="nav-main-link-name">Customers</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('item.report') }}">
                            <i class="nav-main-link-icon si si-layers"></i>
                            <span class="nav-main-link-name">Items</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('redeem.report') }}">
                            <i class="nav-main-link-icon si si-star"></i>
                            <span class="nav-main-link-name">Redeems</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endability
            <li class="nav-main-heading">Personal</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('profile') }}">
                    <i class="nav-main-link-icon si si-moustache"></i>
                    <span class="nav-main-link-name">Profile</span>
                </a>
                <a class="nav-main-link" href="{{ route('change.password') }}">
                    <i class="nav-main-link-icon si si-key"></i>
                    <span class="nav-main-link-name">Change Password</span>
                </a>
                <a href="{{ route('profile.image') }}" class="nav-main-link">
                    <i class="nav-main-link-icon si si-camera"></i>
                    <span class="nav-main-link-name">Change Profile Image</span>
                </a>
                <a class="nav-main-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-main-link-icon si si-logout"></i>
                    <span class="nav-main-link-name">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>