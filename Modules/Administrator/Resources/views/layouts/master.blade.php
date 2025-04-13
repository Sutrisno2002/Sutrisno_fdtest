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
    <div class="flex wrapper">
        <livewire:administrator::layouts.sidebar />

        <div class="page-content">
            <livewire:administrator::layouts.navbar />

            <main class="flex-grow p-6">
                @yield('content')
            </main>

            <x-common::utils.footer />
        </div>
    </div>

    <x-common::utils.customizer />

    @livewireScripts
    <script defer src="{{ asset('assets/panel/js/app.js') }}"></script>
    <script defer src="{{ asset('assets/panel/js/main.js') }}"></script>

    @stack('script')
</body>


</html>
