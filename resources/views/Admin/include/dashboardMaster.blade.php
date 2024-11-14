<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - {{ env("APP_NAME", "APP_NAME") }} Admin</title>

        <!-- BEGIN CSS FILES -->
        @include('Admin.include.style')
        @yield('styles')
        <!-- END CSS FILES -->
    <!-- endinject -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('resources/admin-asset/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('resources/admin-asset/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('resources/admin-asset/img/favicon-16x16.png') }}">
</head>

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search"></div>

    <div class="mobile-author-actions"></div>

       <!-- BEGIN HEADER -->
       @include('Admin.include.header')
        <!-- END HEADER -->
    <main class="main-content">
            <!-- BEGIN SIDEBAR -->
            @include('Admin.include.sidebar')
            <!-- END SIDEBAR -->
        <div class="" id="overlay_div"></div>
        <div class="contents">
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

</html>
