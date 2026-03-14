<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <title>SurfsideMedia Admin</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom.css') }}">
    @stack('styles')
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                @include('admin.partials.sidebar')

                <div class="section-content-right">
                    @include('admin.partials.header')

                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                @yield('content')
                            </div>
                        </div>

                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 SurfsideMedia</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>   
    <script src="{{ asset('assets/admin/js/sweetalert.min.js') }}"></script>    
    <script src="{{ asset('assets/admin/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
