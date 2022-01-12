<nav class="main-header navbar navbar-expand-md navbar-dark navbar-indigo">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('img/ukmads-logo-background.png') }}" alt="UKMads Logo"
                class="brand-image img-circle" style="opacity: .8;">
            <span class="brand-text font-weight-bold">UKMads</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-2" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                {{-- <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link ">Home</a>
                </li> --}}
                <li class="nav-item links {{ (request()->routeIs('advertisement.ads') ? 'active-links' : '') }}">
                    <a href="{{ route('advertisement.ads') }}" class="nav-link links-item">Advertisement</a>
                </li>
                <li class="nav-item links {{ (request()->routeIs('event.events') ? 'active-links' : '') }}">
                    <a href="{{ route('event.events') }}" class="nav-link links-item">Events</a>
                </li>
                <li class="nav-item links {{ (request()->routeIs('aboutus') ? 'active-links' : '') }}">
                    <a href="{{ route('aboutus') }}" class="nav-link links-item">About Us</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            @auth
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">

                        @if(Auth::user()->role == 'advertiser')
                            <a href="{{ route('advertiser.dashboard') }}"
                                class="nav-link">Dashboard</a>

                        @elseif(Auth::user()->role == 'organizer')
                            <a href="{{ route('organizer.dashboard') }}"
                                class="nav-link">Dashboard</a>

                        @elseif(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                        @endif

                    </li>
                </ul>


            @else
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link links-item">Login</a>
                    </li>
                    <li class="ml-2 nav-item">
                        <a href="{{ route('register') }}" class="nav-link links-item">Register</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
