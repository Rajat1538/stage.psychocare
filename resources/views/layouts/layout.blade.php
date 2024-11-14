<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ env("APP_NAME", "APP_NAME") }} Admin</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('public/images/form-logo_new.png') }}">
    @include('layouts.style')
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
    <!-- <script>
    var translations = @json([
        'title_required' => trans('validation.title_required'),
		''
        // Add more translation keys as needed
    ]);
</script> -->
    @include('layouts.script')
    @yield('scripts')
    <!-- <script src="{{ URL::asset('resources/admin-assets/plugins/global/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script> -->
    <!-- END CORE PLUGINS -->
    <!-- <script src="{{ URL::asset('resources/admin-assets/js/admin/pages/login.js') }}" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- <script>
        jQuery(document).ready(function () {
         Login.init();
     });
    </script> -->
    <!-- END JAVASCRIPTS -->
</body>

</html>