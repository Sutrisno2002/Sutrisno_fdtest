<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ cache('app_name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="{{ asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/switchery/switchery.min.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/dashboard/css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet">

    <style>
        .error-info {
            text-align: left;
            width: 100%;
            max-width: 600px;
        }

        .error-body {
            margin-bottom: 2rem;
        }
    </style>


    @livewireStyles

    @stack('style')
</head>

<body class="collapsed-sidebar">

    <!-- Page Container -->
    <div class="page-container">
        <div class="error-404">
            <div class="error-bg"></div>
            <div class="error-info">
                <div class="error-text">
                    <div class="error-header">
                        <h3>@yield('code')</h3>
                    </div>
                    <div class="error-body">
                        <p>@yield('message')</p>
                        <a href="javascript:void(0)" onclick="window.history.back()" class="btn bg-primary">
                            Kembali
                        </a>
                    </div>
                    <div class="error-footer">
                        <p>{{ cache('copyright') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /Page Container -->


    <!-- Javascripts -->
    <script src="{{ asset('assets/dashboard/vendor/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/concept.min.js') }}"></script>

</body>

</html>
