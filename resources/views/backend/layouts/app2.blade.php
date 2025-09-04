<!doctype html>
<html lang="en" 
    data-layout="vertical" 
    data-topbar="light" 
    data-sidebar="dark" 
    data-sidebar-size="lg" 
    data-sidebar-image="none" 
    data-preloader="disable" 
    data-theme="default" 
    data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Prince Enterprise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('backend/assets/js/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom Css -->
    <link href="{{ asset('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">
        @include('backend.layouts.topbar')
        @include('backend.layouts.sidebar')

        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            @include('backend.layouts.footer')
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins.js') }}"></script>

    <!-- ApexCharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('backend/assets/js/pages/dashboard-crm.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>
</html>
