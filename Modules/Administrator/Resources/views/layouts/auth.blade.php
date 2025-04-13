<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ cache('app_name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/switchery/switchery.min.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/dashboard/css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet">

    <style>
        .login-content {
            text-align: left
        }

        .login-box .login-body {
            width: 100%;
            max-width: 400px;
            float: unset;
        }

        small {
            font-size: 100%
        }
    </style>

    @livewireStyles

    @stack('style')
</head>

<body>
    <div class="page-container">
        <div class="login">
            <div class="login-bg"></div>
            <div class="login-content">
                <div class="login-box">
                    <div>
                        @yield('content')
                    </div>

                    <div class="login-footer">
                        <p>Copyright {{ date('Y') }} &copy; {{ config('app.name', 'Laravel') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dashboard/js/app.js') }}"></script>
    @livewireScripts
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/concept.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/pages/administrator.js') }}"></script>

    @stack('script')
</body>

</html>
