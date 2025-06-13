<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Noble UI CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}

        <!-- Scripts -->
        @routes
        @vite(['resources/css/app.css','resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        <!-- Only load Vite assets here -->
       
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <!-- Noble UI JS -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>

        <!-- ApexCharts (CDN) -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ asset('assets/js/apexcharts.js') }}"></script>

        <!-- Datepicker (requires jQuery) -->
        <script src="{{ asset('assets/js/datepicker.js') }}"></script>

        <!-- Feather Icons -->
        <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    </body>
</html>
