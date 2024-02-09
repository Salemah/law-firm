<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminvoice-admin-template.multipurposethemes.com/main-ltr/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 04:21:03 GMT -->

<head>
    @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"
        href="@if ($dashboard_settings) {{ asset('image/dashboard/' . $dashboard_settings->favicon) }} @else   https://adminvoice-admin-template.multipurposethemes.com/images/favicon.ico @endif">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>My Dashbord</title>

    @include('frontend.user.partial.style')
    @yield('css')

</head>

<body class="hold-transition light-skin sidebar-mini theme-ultraviolet onlywave">

    <div class="wrapper">

        <div class="art-bg"
            style="background-image: url({{ asset('userf/images/color-plate/theme-deepocean-dark.jpg') }})">
            <img src="{{ asset('userf/images/color-plate/theme-deepocean-dark.jpg') }}" alt=""
                class="art-img light-img">
            <img src="https://adminvoice-admin-template.multipurposethemes.com/images/art2.svg" alt=""
                class="art-img dark-img">
            <img src="https://adminvoice-admin-template.multipurposethemes.com/images/art-bg.svg" alt=""
                class="wave-img light-img">
            <img src="https://adminvoice-admin-template.multipurposethemes.com/images/art-bg2.svg" alt=""
                class="wave-img dark-img">
        </div>

        <header class="main-header">
           @include('frontend.user.partial.header')
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full clearfix position-relative">

                <!-- Left side column. contains the logo and sidebar -->
               @include('frontend.user.partial.sidebar')
                <!-- Main content -->
               @yield('content')
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
      @include('frontend.user.partial.footer')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->





    @include('frontend.user.partial.script')

</body>

<!-- Mirrored from adminvoice-admin-template.multipurposethemes.com/main-ltr/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2024 04:22:00 GMT -->

</html>
