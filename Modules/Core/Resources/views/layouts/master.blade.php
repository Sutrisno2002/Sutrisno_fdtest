<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ cache('app_name') }}</title>

    <link rel="shortcut icon" href="{{ cache('favicon') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="{{ asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/vendor/animate.compat.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('assets/dashboard/css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet">

    <style>
        .cursor-pointer {
            cursor: pointer !important;
        }

        .cursor-grab {
            cursor: grab !important;
        }

        .logo-box {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
    </style>


    @livewireStyles

    @stack('style')
</head>

<body>

    <div class="page-container">

        {{-- Sidebar --}}
        {{-- @include('core::layouts.sidebar') --}}

        {{-- Settings --}}
        {{-- @include('core::layouts.settings') --}}

        <div class="page-content">
            @include('core::layouts.sidebar-nav')
            @include('core::layouts.navbar')

            <div class="page-inner no-page-title">
                {{-- Start Content --}}
                @yield('content')

                <div class="page-footer pt-3">
                    <p>Copyright {{ date('Y') }} &copy; {{ config('app.name', 'Laravel') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dashboard/js/app.js') }}"></script>
    @livewireScripts
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/concept.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

    @stack('script')
</body>

</html>
