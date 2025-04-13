<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ cache('app_name') }}</title>
    <link rel="shortcut icon" href="{{ cache('favicon') }}" type="image/x-icon">

    <!-- Fonts -->
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/apexcharts/apexcharts.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/dashboard/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet">

    @livewireStyles

    @stack('style')
</head>

<body>

    <div class="page-container">
        <livewire:administrator::layouts.navbar />

        <livewire:administrator::layouts.sidebar />

        <div class="page-content">
            <div class="main-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('assets/dashboard/js/app.js') }}"></script>

    <script src="{{ asset('assets/dashboard/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/main.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/pages/dashboard.js') }}"></script>

    <script>
        // Dismiss remove modal after data successfully removed
        window.addEventListener('close-modal', function() {
            $('#remove-modal').modal('hide')
        })

        // Dismiss remove modal after data successfully removed
        window.addEventListener('hide-modal', function() {
            $('.modal').modal('hide')
        })

        document.addEventListener('livewire:init', () => {
            Livewire.hook('request', ({
                fail
            }) => {
                fail(({
                    status,
                    preventDefault
                }) => {
                    // console.log(status)
                    // preventDefault()
                })
            })
        })
    </script>
    @stack('script')
</body>

</html>
