<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="portfolio">
    <meta name="author" content="Muhsin Azmal - DevPenguin">
    
    <!-- Title -->
    {{-- <title>{{ config('app.name') }}</title> --}}
    <title>{{ $user->name . ', ' . $user->professional_title}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&length=1&bold=true&rounded=true&background=000&color=fff">

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2-1?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <link href="{{ asset('backend_assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend_assets') }}/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend_assets') }}/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @stack('specific_css')

    <!-- Theme Styles -->
    <link href="{{ asset('backend_assets') }}/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('backend_assets') }}/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        @include('backend.partials.dashboard-sidebar')
        <div class="app-container">
            @include('backend.partials.dashboard-header')
            @yield('main_content')
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="{{ asset('backend_assets') }}/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/main.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/custom.js"></script>
    <script src="{{ asset('backend_assets') }}/js/pages/dashboard.js"></script>
    @include('sweetalert::alert')
    @stack('specific_js')
</body>
</html>