{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @include('frontend.layouts.partials.style')
</head>
<body>
    @include('frontend.shared.nav')

    @yield('content')

    @include('frontend.shared.footer')

    @include('frontend.layouts.partials.script')
</body>
</html> --}}
<!DOCTYPE html>
<html>

<!-- Mirrored from html.designingmedia.com/counsel-law/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Nov 2023 15:27:12 GMT -->

<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp

    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Bellefair&amp;family=Open+Sans:wght@300;400;700;800&amp;family=Oswald:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon"
        href="@if ($dashboard_settings) {{ asset('image/dashboard/' . $dashboard_settings->favicon) }} @else {{ asset('image/AdminLTELogo.png') }} @endif "
        type="image/x-icon">
    <link rel="icon"
        href="@if ($dashboard_settings) {{ asset('image/dashboard/' . $dashboard_settings->favicon) }} @else {{ asset('image/AdminLTELogo.png') }} @endif "
        type="image/x-icon">


    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


</head>

<body class="hidden-bar-wrapper">

    <div class="page-wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader" style=" background-image:url({{ asset('../frontend/images/icons/preloader.svg') }})">
        </div> --}}

        <!-- Main Header-->
        @include('frontend.shared.nav')
        <!-- End Main Header -->

        @yield('content')




        @include('frontend.shared.footer')



    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>


    @include('frontend.layouts.partials.script')
</body>

<!-- Mirrored from html.designingmedia.com/counsel-law/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Nov 2023 15:27:32 GMT -->

</html>
