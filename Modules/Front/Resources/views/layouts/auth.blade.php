<!DOCTYPE html>
<html lang="en" data-sidenav-view="default">

<head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ cache('app_name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ cache('favicon') }}">

    <link rel="stylesheet" href="{{ asset('assets/panel/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/animate.compat.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/node-snackbar@latest/dist/snackbar.min.css" />


    <script src="{{ asset('assets/panel/js/config.js') }}"></script>
    <script src="{{ asset('assets/panel/js/head.js') }}"></script>

    @livewireStyles
    @stack('style')

</head>

<body>
    <div class="bg-gradient-to-r from-blue-200 to-blue-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
        <div class="h-screen w-screen flex justify-center items-center">
            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script defer src="{{ asset('assets/panel/js/app.js') }}"></script>
    <script defer src="{{ asset('assets/panel/js/main.js') }}"></script>

    @stack('script')
</body>


</html>
