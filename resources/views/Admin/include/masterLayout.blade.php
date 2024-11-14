<!DOCTYPE html>
<?php
// print_r(Request::segment(3));
// exit;
?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') - {{ env("APP_NAME", "APP_NAME") }} Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta content="{{ csrf_token() }}" name="csrf-token"/>
    <!-- BEGIN CSS FILES -->
    @include('Admin.include.style')
    @yield('styles')
    <!-- END CSS FILES -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('resources/admin-asset/img/apple-touch-icon.png') }}">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('resources/admin-asset/img/favicon-32x32.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('resources/admin-asset/img/favicon-16x16.png') }}"> --}}
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('resources/front-asset/images/favicon.ico') }}" />

    <link rel="manifest" href="{{ URL::asset('resources/admin-asset/img/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ URL::asset('resources/admin-asset/img/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search"></div>

    <div class="mobile-author-actions"></div>
        <input type="hidden" id="current_user" value="{{ Auth::user()->id }}" />
       <!-- BEGIN HEADER -->
       @include('Admin.include.header')
        <!-- END HEADER -->
    <main class="main-content">
            <!-- BEGIN SIDEBAR -->
            @include('Admin.include.sidebar')
            <!-- END SIDEBAR -->
        <div class="contents" id="js-master-content">
            {{-- @include('Admin.include.errorMessage') --}}
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
       <!-- BEGIN FOOTER -->
        @include('Admin.include.footer')
        <!-- END FOOTER -->
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        @include('Admin.include.script')
        @yield('scripts')
        <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
