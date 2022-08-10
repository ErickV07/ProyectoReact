<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="csrf-token" name="csrf-token" content="{{ csrf_token() }}"/>
    <title> @yield('title') </title>
    <!-- plugins:css -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
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
            <div class="content container-fluid">
            @yield('container')
          </div>
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
    <script src="{{asset('assets/global/iziToast/js/iziToast.js') }}"></script>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>

    @include('global_script')
    @yield('scripts')
    <!-- endinject -->
    @include('Admin.partials._toaster-message')
  </body>
</html>