<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Horizontal Layout | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- Plugins css -->
    <link href="{{asset('backend/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- App css -->
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('frontend/bulma/css/bulma.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/bulma/custom.css')}}">

    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    {{-- Tailwind Css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom_css.css') }}" rel="stylesheet">

    <!-- Sweet Alert-->
    <link href="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}

    @yield('header')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->


        @if (url()->current() == route('payment'))
        @yield('content')
        @include('user.layouts.footer')
        @elseif(url()->current() == route('payment'))
        @yield('content')
        @include('user.layouts.footer')
        @else
        @include('user.layouts.navbar')
        @yield('content')
        @include('user.layouts.footer')
        @endif

        <!-- end Topbar -->



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

    <script src="{{asset('backend/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{asset('backend/assets/js/pages/dashboard-2.init.js')}}"></script>

    <!-- App js-->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('backend/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('backend/assets/js/pages/sweet-alerts.init.js')}}"></script>

    @yield('footer')

</body>

</html>