<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ env("APP_NAME", "APP_NAME") }} Admin</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('public/images/favicon.ico') }}">
    @include('Auth.include.style')
    @yield('styles')
</head>
<body>
    @yield('content')
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
    @include('Auth.include.script')
    @yield('scripts')
    <script src="{{ URL::asset('resources/admin-assets/plugins/global/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
</body>
</html>