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
        <div class="preloader" style=" background-image:url({{ asset('../frontend/images/icons/preloader.svg') }})">
        </div>

        <!-- Main Header-->
        @include('frontend.shared.nav')
        <!-- End Main Header -->

        @yield('content')



    <!-- CTA Section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="{{ URL::asset('frontend/images/resource/cta.jpg')}}" alt="" />
                </div>
                <div class="content">
                    <h2>Speak With Our <br> Experts Today!</h2>
                    <a href="{{ route('home.contact') }}" class="theme-btn btn-style-two"><span class="txt">Get a quote <i
                                class="arrow flaticon-right"></i></span></a>
                </div>
                <div class="hammer-image">
                    <img src="{{ URL::asset('frontend/images/resource/hammer.png')}}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section -->
 <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
        @include('frontend.shared.footer')



    </div>
    <!-- Messenger Chat Plugin Code -->



    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>


    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100499722787165");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    @include('frontend.layouts.partials.script')
</body>

<!-- Mirrored from html.designingmedia.com/counsel-law/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Nov 2023 15:27:32 GMT -->

</html>
