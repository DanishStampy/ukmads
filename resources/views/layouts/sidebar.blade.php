<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/img/ukmads-logo.png" alt="UKMads logo" class="brand-image img-circle">
        <span class="brand-text font-weight-bold">UKMads</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @if(Route::has('login'))
                @auth
                    <div class="image">
                        <img src=" {{ asset('img/AvatarMaker.png') }} "
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> {{ ucfirst(Auth::user()->name) }} </a>
                    </div>
                @else
                    <div class="image">
                        <img src=" {{ asset('img/AvatarGuest.png') }} "
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> Guest </a>
                    </div>
                @endauth
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header bold-font">MENU</li>

                @if(Route::has('login'))
                    @auth

                        @if(Auth::user()->role == 'admin')

                            <li class="nav-item">
                                <a href=" {{ route("admin.pendingads") }} " class="nav-link">
                                    <i class="fas fa-tasks mr-2 "></i>
                                    <p class="">Pending</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" {{ route("admin.history") }} " class="nav-link">
                                    <i class="fas fa-history mr-2 "></i>
                                    <p class="">History</p>
                                </a>
                            </li>

                        @elseif(Auth::user()->role == 'advertiser')

                            <li class="nav-item">
                                <a href=" {{ route("advertiser.dashboard") }} "
                                    class="nav-link {{ (request()->routeIs('advertiser.dashboard') ? 'active' : '') }}">
                                    <i class="fas fa-house-user mr-2 "></i>
                                    <p class="">Dashboard</p>
                                </a>
                            </li>

                            {{-- For advertisement link --}}
                            <li
                                class="nav-item {{ (request()->routeIs('advertiser.createads') || request()->routeIs('advertiser.editads') ? 'menu-open' : '') }}">

                                <a href=" {{ route("advertiser.manageads") }} "
                                    class="nav-link {{ (request()->routeIs('advertiser.manageads') ? 'active' : '') }}">
                                    <i class="fas fa-bullhorn mr-2 "></i>
                                    <p class="">Advertisements</p>
                                </a>

                                @if( request()->routeIs('advertiser.createads'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href=""
                                                class="nav-link {{ (request()->routeIs('advertiser.createads') ? 'active' : '') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create new ads</p>
                                            </a>
                                        </li>
                                    </ul>
                                @elseif( request()->routeIs('advertiser.editads'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item disabled">
                                            <a href=""
                                                class="nav-link {{ (request()->routeIs('advertiser.editads') ? 'active' : '') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Update ads</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif

                            </li>

                            {{-- For event link --}}
                            <li
                                class="nav-item {{ (request()->routeIs('advertiser.createevents') || request()->routeIs('advertiser.editevent') ? 'menu-open' : '') }}">

                                <a href=" {{ route("advertiser.manageevents") }} "
                                    class="nav-link {{ (request()->routeIs('advertiser.manageevents') ? 'active' : '') }}">
                                    <i class="fas fa-calendar-week mr-2 "></i>
                                    <p class="">Events</p>
                                </a>

                                @if( request()->routeIs('advertiser.createevents'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href=""
                                                class="nav-link {{ (request()->routeIs('advertiser.createevents') ? 'active' : '') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create new event</p>
                                            </a>
                                        </li>
                                    </ul>
                                    @elseif( request()->routeIs('advertiser.editevent'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item disabled">
                                            <a href=""
                                                class="nav-link {{ (request()->routeIs('advertiser.editevent') ? 'active' : '') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Update event</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </li>

                            <li class="nav-item">
                                <a href=" {{ route("advertiser.draftlist") }} "
                                    class="nav-link {{ (request()->routeIs('advertiser.draftlist') ? 'active' : '') }}">
                                    <i class="fas fa-paste mr-2"></i>
                                    <p class="">Draft</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href=" {{ route("aboutus") }} "
                                    class="nav-link {{ (request()->routeIs('aboutus') ? 'active' : '') }}">
                                    <i class="fas fa-address-card mr-2 "></i>
                                    <p class="">About Us</p>
                                </a>
                            </li>

                        @endif

                    @else
                        <li class="nav-item">
                            <a href="{{ route('ads') }}" class="nav-link">
                                <i class="fas fa-bullhorn mr-2 "></i>
                                <p class="">Advertisements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('event') }}" class="nav-link">
                                <i class="fas fa-calendar-week mr-2 "></i>
                                <p class="">Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aboutus') }}"
                                class="nav-link {{ (request()->routeIs('aboutus') ? 'active' : '') }}">
                                <i class="fas fa-address-card mr-2"></i>
                                <p class="">About Us</p>
                            </a>
                        </li>
                    @endauth
                @endif


                <br>
                <br>
                <br>
                <li class="nav-header bold-font">ACCOUNT</li>

                @if(Route::has('login'))

                    @auth

                        <li class="nav-item">
                            <a data-toggle="modal" data-target="#Logout" class="nav-link" style="color: #fff; cursor: pointer;">
                                <i class="fas fa-sign-out-alt mr-2 "></i>
                                <p class="">Logout</p>
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a href=" {{ route("login") }} " class="nav-link">
                                <i class="fas fa-sign-in-alt mr-2 "></i>
                                <p class="">Login</p>
                            </a>
                        </li>

                        @if(Route::has("register"))

                            <li class="nav-item">
                                <a href=" {{ route("register") }} " class="nav-link">
                                    <i class="fas fa-share-square mr-2 "></i>
                                    <p class="">Register</p>
                                </a>
                            </li>

                        @endif
                    @endauth
                @endif

            </ul>
        </nav>
    </div>

    <!-- /.sidebar -->
</aside>

{{-- Log out modal --}}
<div class="modal fade" id="Logout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="LogoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="LogoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nope</button>

                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->role == "advertiser")
                            <a type="button" href="{{ route("advertiser.logout") }}" class="btn btn-danger">Yes</a>

                        @elseif(Auth::user()->role == "admin")
                            <a type="button" href="{{ route("admin.logout") }}" class="btn btn-danger">Yes</a>

                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</div>
{{-- END of log out modal --}}

<!-- Content Wrapper. Contains page content -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
