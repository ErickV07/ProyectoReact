<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="csrf-token" name="csrf-token" content="{{ csrf_token() }}" />
    <title>Principal</title>
    <!-- plugins:css -->
    <!-- Extra styles -->
    <!-- End layout styles la vistas blade-->
    <link rel="stylesheet" href="">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link href="{{ asset('assets/global/iziToast/css/iziToast.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
 <!-- inject:js -->
    <div class="content-wrapper">
        @yield('container')
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/global/iziToast/js/iziToast.js') }}"></script>
    <script src="{{ asset('assets/js/Funciones.js') }}"></script>
    @yield('scripts')
    <!-- endinject -->
</body>

</html>
