<nav class="main-header navbar navbar-expand-md navbar-dark navbar-indigo">
    <div class="container">
        <a href="{{ url('/')}}" class="navbar-brand">
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
                <li class="nav-item">
                    <a href="{{ url('/')}}" class="nav-link ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('advertisement.ads')}}" class="nav-link">Advertisement</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('event.events')}}" class="nav-link">Events</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('aboutus')}}" class="nav-link">About Us</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a href="{{ route('login')}}" class="nav-link">Login</a>
                </li>
                <li class="ml-2 nav-item">
                    <a href="{{ route('register')}}" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
