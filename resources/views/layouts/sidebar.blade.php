<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-wrapper elevation-4" style="background-color:#290576 ; color:#808191;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light" style="color:#F3ECFF">UKMads</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host-overflow os-host-overflow-y ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @if(Route::has('login'))
                @auth
                    <div class="image">
                        <img src=" {{ asset('img/AvatarMaker.png') }} "
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info" style="color:#F3ECFF">
                        <a href="#" class="d-block"  style="color:#F3ECFF"> {{ Auth::user()->name }} </a>
                    </div>
                @else
                <div class="image">
                    <img src=" {{ asset('img/AvatarGuest.png') }} "
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block" style="color:#808191;"> Guest </a>
                </div>
                @endauth
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
                <li class="nav-header" style="color:#F3ECFF">MENU</li>

                @if(Route::has('login'))
                    @auth

                        @if(Auth::user()->role == 'admin')

                            <li class="nav-item">
                                <a href=" {{ route("admin.pendingads") }} " class="nav-link">
                                    <i class="fas fa-tasks mr-2"  style="color:#F3ECFF"></i>
                                    <p  style="color:#F3ECFF">Pending</p>
                                </a>
                            </li>
                            <li class="nav-item" >
                                <a href=" {{ route("admin.history") }} " class="nav-link">
                                    <i class="fas fa-history mr-2"  style="color:#F3ECFF"></i>
                                    <p  style="color:#F3ECFF">History</p>
                                </a>
                            </li>

                        @elseif(Auth::user()->role == 'advertiser')

                            <li class="nav-item">
                                <a href=" {{ route("advertiser.manageads") }} " class="nav-link">
                                    <i class="fas fa-bullhorn mr-2" style="color:#F3ECFF"></i>
                                    <p style="color:#F3ECFF">Advertisements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" {{ route("advertiser.manageevents") }} " class="nav-link">
                                    <i class="fas fa-calendar-week mr-2" style="color:#F3ECFF"></i>
                                    <p style="color:#F3ECFF">Events</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" {{ route("advertiser.dashboard") }} " class="nav-link">
                                    <i class="fas fa-address-card mr-2"  style="color:#F3ECFF"></i>
                                    <p  style="color:#F3ECFF">About Us</p>
                                </a>
                            </li>

                        @endif

                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-bullhorn mr-2"  style="color:#F3ECFF"></i>
                                <p  style="color:#F3ECFF">Advertisements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-calendar-week mr-2"  style="color:#F3ECFF"></i>
                                <p  style="color:#F3ECFF">Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"  style="color:black">
                                <i class="fas fa-address-card mr-2"  style="color:#F3ECFF"></i>
                                <p  style="color:#F3ECFF">About Us</p>
                            </a>
                        </li>
                    @endauth
                @endif



                <li class="nav-header"  style="color:#F3ECFF">ACCOUNT</li>

                @if(Route::has('login'))

                    @auth

                        @if(Auth::user()->role == "advertiser")
                            <li class="nav-item">
                                <a href="{{ route("advertiser.logout") }}" class="nav-link">
                                    <i class="fas fa-sign-out-alt mr-2"  style="color:#F3ECFF"></i>
                                    <p  style="color:#F3ECFF">Logout</p>
                                </a>
                            </li>
                        @elseif(Auth::user()->role == "admin")
                            <li class="nav-item">
                                <a href="{{ route("admin.logout") }}" class="nav-link">
                                    <i class="fas fa-sign-out-alt mr-2" style="color:#F3ECFF"></i>
                                    <p style="color:#F3ECFF">Logout</p>
                                </a>
                            </li>
                        @endif

                    @else

                        <li class="nav-item">
                            <a href=" {{ route("login") }} " class="nav-link">
                                <i class="fas fa-sign-in-alt mr-2" style="color:#F3ECFF"></i>
                                <p style="color:#F3ECFF">Login</p>
                            </a>
                        </li>

                        @if(Route::has("register"))

                            <li class="nav-item">
                                <a href=" {{ route("register") }} " class="nav-link">
                                    <i class="fas fa-share-square mr-2" style="color:#F3ECFF"></i>
                                    <p style="color:#F3ECFF">Register</p>
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
