<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#000" />
        <title>Psychocare Health Pvt. Ltd. </title>
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('resources/front-asset/images/favicon.ico') }}" />
        @include('Front.Layout.styles')
		@yield('styles')
    </head>

    <body>

        @include('Front.Layout.header')
		@yield('content')
		@include('Front.Layout.footer')
        @include('Front.Layout.script')
		@yield('scripts')
    </body>
</html>
