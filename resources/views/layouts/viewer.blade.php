<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UKMads') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

    <!-- -- Custom CSS File -- -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/my-login.css') }}">

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('img/ukmads-logo-background.png')}}" type="image/x-icon">

    {{-- AOS Package --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">

        @include('layouts.navbar')

        <!-- Content Wrapper. Contains page content -->
        @if(Request::path() != '/')

        <div class="content-wrapper" style="margin-top: 60px">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 my-4 title-page" style="font-size: 50px" >
                                @yield('title')
                                <small>@yield('subtitle')</small>
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @else

        <div >
            @yield('content')
        </div>
        @endif

        @include('layouts.footer-view')

    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- AOS JS Package --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            easing: 'ease-out'
        });
    </script>


    {{-- Loader page script --}}
    <script>
        function next() {
            $(".loaderpage").animate({height: "0"}, 200);
            $("#img-loading").fadeOut(180)
            // var x = document.getElementsByTagName("BODY")[0];
            // x.style.overflow = "auto";
        }

        $(window).on("load", function () {
            setTimeout(next, 1000);
        });
    </script>

    @stack('scripts')

</body>

</html>
