<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="csrf-token" name="csrf-token" content="{{ csrf_token() }}"/>
    <title> @yield('title') </title>
    <!-- plugins:css -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/AdminStyles.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
    <link href="{{ asset('assets/global/iziToast/css/iziToast.css') }}" rel="stylesheet">
    @yield('styles')
  </head>
  <body>
    <div class="main-wrapper">
      @include('Admin.partials._navbar')
      <div class="">
        @include('Admin.partials._sidebar')
        <div class="">
          <div class="page-wrapper">
            @yield('container')
          </div>
          @include('Admin.partials._footer')
        </div>
      </div>
    </div>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{ asset('assets/global/iziToast/js/iziToast.js') }}"></script>
    <script src="{{asset('assets/js/AdminFuntion.js')}}"></script>
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/global/iziToast/js/iziToast.js') }}"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    @yield('scripts')
    <!-- endinject -->
    @include('Admin.partials._toaster-message')
  </body>
</html>