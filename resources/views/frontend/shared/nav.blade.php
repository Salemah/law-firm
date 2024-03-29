@php
    $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
@endphp


<header class="main-header header-style-one">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container clearfix">

            <div class="pull-left logo-box">
                {{-- <div class="logo"><a href="{{url('/')}}"><img src="{{ asset('frontend/images/logo.png')}}" alt="" title=""></a></div> --}}
                <div class="logo"><a href="{{ url('/') }}"><img
                            src="{{ asset('/image/dashboard/' . $dashboard_settings->logo) }}"
                            style="width: 36vh;" alt="" title=""></a></div>
            </div>

            <div class="nav-outer clearfix">
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="{{ url('/') }}">Home</a>
                                {{-- <ul>
                                    <li><a href="{{url('/')}}">Home Style One</a></li>
                                    <li><a href="{{url('/')}}">Home Style Two</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown"><a href="#">About</a>
                                <ul>
                                    <li><a href="{{ route('home.aboutus') }}">About us</a></li>
                                    <li><a href="{{ route('home.ourteam') }}">Our Team</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('home.cases') }}">Cases</a>
                                {{-- <ul>
                                    <li><a href="case.html">Case Style 01</a></li>
                                    <li><a href="case-2.html">Case Style 02</a></li>
                                    <li><a href="case-3.html">Case Style 03</a></li>
                                    <li><a href="case-details.html">Case Detail</a></li>
                                </ul> --}}
                            </li>
                            <li><a href="{{ route('home.ourservice') }}">Our Services</a>

                            </li>
                            <li><a href="{{ route('home.all.post') }}">Articles</a>
                                {{-- <ul>
                                    <li><a href="{{route('home.all.post')}}">Our Blog</a></li>
                                    <li><a href="{{route('home.all.post')}}">Blog Detail</a></li>
                                </ul> --}}
                            </li>
                            {{-- <li><a href="contact.html">Contact us</a></li> --}}
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->hasAnyRole(['admin', 'superadmin', 'team']))
                                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                        @else
                                            <a href="{{ url('/user/dashboard') }}" class="nav-link">Dashboard</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="nav-link">Log in</a>


                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Menu End-->
                <div class="outer-box clearfix">

                    <!-- Btn Box -->
                    <div class="btn-box">
                        <a href="{{ route('home.contact') }}" class="theme-btn btn-style-one"><span
                                class="txt">Contact US</span></a>
                    </div>

                    <!-- Phone Box -->
                    <div class="phone-box">
                        <div class="box-inner">
                            <span class="icon flaticon-smartphone-1"></span>
                            Call US Today!
                            <strong>{{ $dashboard_settings->phone }}</strong>
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
                {{-- <a href="{{ url('/') }}" title=""><img
                        src="{{ asset('/image/dashboard/' . $dashboard_settings->logo) }}" style="width: 10vh;"
                        alt="" title=""></a> --}}
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
                        <a href="{{ route('home.contact') }}" class="theme-btn btn-style-two"><span
                                class="txt">Contact US</span></a>
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
            {{-- <div class="nav-logo"><a href="{{ url('/') }}"><img
                        src="{{ asset('/image/dashboard/' . $dashboard_settings->logo) }}"style="width: 5vh;" alt=""
                        title=""></a></div> --}}
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
