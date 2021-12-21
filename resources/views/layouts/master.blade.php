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
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Styles -->

    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

    <!-- -- Custom CSS File -- -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/customize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/my-login.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">

@include('layouts.header')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color:#F3ECFF">
        <!-- Content Header (Page header) -->
        <div class="content-header" style="background-color:#F3ECFF">
            <div class="container-fluid" >
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" >
                            @yield('title', 'Page Title')
                            <small>@yield('subtitle')</small>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title', 'Page Title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content" style="background-color:#F3ECFF">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')

</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('scripts')

</body>
</html>
