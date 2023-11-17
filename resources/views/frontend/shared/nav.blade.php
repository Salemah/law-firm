{{--
        <header class="header">
            <img src="{{ asset('image/logo.png') }}" alt="logo" class="logo" />

            <nav class="navbar">
                <ul class="navbar-list">
                    <li><a class="navbar-link" href="#">Home</a></li>
                    <li><a class="navbar-link" href="#">About</a></li>
                    <li><a class="navbar-link" href="#">Services</a></li>
                    <li><a class="navbar-link" href="#">Gallery</a></li>
                    <li>
                        <a class="navbar-link" href="https://www.instagram.com/thapatechnical/"
                            target="_blank">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="mobile-navbar-btn">
                <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
                <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
            </div>
        </header>



     --}}
     @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp
{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('/image/dashboard/'.$dashboard_settings->logo) }}" style="width:40px" alt="logo"
                class="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.all.post')}}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.contact')}}">Contact</a>
                </li>

                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>


                        @endauth
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav> --}}


<header class="main-header header-style-one">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container clearfix">

            <div class="pull-left logo-box">
                {{-- <div class="logo"><a href="{{url('/')}}"><img src="{{ asset('frontend/images/logo.png')}}" alt="" title=""></a></div> --}}
                <div class="logo"><a href="{{url('/')}}"><img src="{{ asset('/image/dashboard/'.$dashboard_settings->logo) }}" style="width: 100%;height:70px" alt="" title=""></a></div>
            </div>

            <div class="nav-outer clearfix">
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li ><a href="{{url('/')}}">Home</a>
                                {{-- <ul>
                                    <li><a href="{{url('/')}}">Home Style One</a></li>
                                    <li><a href="{{url('/')}}">Home Style Two</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown"><a href="#">About</a>
                                <ul>
                                    <li><a href="about.html">About us</a></li>
                                    <li><a href="our_team.html">Our Team</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Cases</a>
                                <ul>
                                    <li><a href="case.html">Case Style 01</a></li>
                                    <li><a href="case-2.html">Case Style 02</a></li>
                                    <li><a href="case-3.html">Case Style 03</a></li>
                                    <li><a href="case-details.html">Case Detail</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Our Services</a>
                                <ul>
                                    <li><a href="services_style_01.html">Services Style 01</a></li>
                                    <li><a href="services_style_02.html">Services Style 02</a></li>
                                    <li><a href="corporate_law.html">Corporate Law</a></li>
                                    <li><a href="real_estate_law.html">Real Estate Law</a></li>
                                    <li><a href="insurance_law.html">Insurance Law</a></li>
                                    <li><a href="family_law.html">Family Law</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog</a>
                                <ul>
                                    <li><a href="{{route('home.all.post')}}">Our Blog</a></li>
                                    <li><a href="{{route('home.all.post')}}">Blog Detail</a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="contact.html">Contact us</a></li> --}}
                            <li>    @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>


                                @endauth
                        @endif</li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Menu End-->
                <div class="outer-box clearfix">

                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="contact.html" class="theme-btn btn-style-one"><span class="txt">Contact US</span></a>
                    </div>

                    <!-- Phone Box -->
                    <div class="phone-box">
                        <div class="box-inner">
                            <span class="icon flaticon-smartphone-1"></span>
                            Call US Today!
                            <strong>+61 3 8376 6284</strong>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                {{-- <a href="{{url('/')}}" title=""><img src="frontend/images/logo-small.png" alt="" title=""></a> --}}
                <a href="{{url('/')}}" title=""><img src="{{ asset('/image/dashboard/'.$dashboard_settings->logo) }}" style="width: 100%;height:70px" alt="" title=""></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->

                <!-- Main Menu End-->
                <div class="outer-box clearfix">

                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Contact US</span></a>
                    </div>

                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>

                </div>

            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="{{url('/')}}"><img src="frontend/images/logo-2.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
