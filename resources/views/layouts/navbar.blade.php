<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/ukmads-logo-background.png') }}" alt="UKMads Logo"
                class="brand-image img-circle" style="width: 23px;">
            <span class="brand-text font-weight-bold">UKMads</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('advertisement.ads') }}" class="nav-link">Advertisement</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('event.events') }}" class="nav-link ">Events</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('aboutus') }}" class="nav-link ">About Us</a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav ml-auto">
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" id="login-btn" class="nav-link">Login</a>
                    </li>
                    <li class="ml-2 nav-item">
                        <a href="{{ route('register') }}" id="register-btn" class="nav-link">Register</a>
                    </li>
                </ul>
            @endauth
        </div>

    </div>
</nav>