<!DOCTYPE html>
<html lang="en" data-sidenav-view="default">

<head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
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
        <div class="page-content">
            <main class="flex-grow p-6">
                <section class="pb-24 relative bg-gradient-to-t from-slate-50 to-white">
                    <div class="container">
                        <div class="mx-auto max-w-screen-xl">
                            <div class="mx-auto max-w-screen-sm text-center pb-16">
                                @yield('image')

                                <h1 class="mb-4 text-3xl tracking-tight font-extrabold lg:text-5xl text-primary">
                                    @yield('error_code')
                                </h1>
                                <p class="mb-4 text-lg font-light text-slate-500">
                                    @yield('error_message')
                                </p>
                                <a href="{{ url('/') }}" class="btn primary inline-flex items-center gap-1">
                                    <i class="bx bx-left-arrow-alt"></i> Kembali ke halaman utama
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
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
