@extends('frontend.master')

@section('title', 'Contact')



@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL('/') }}">home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Map Section -->
    <section class="map-section">
        <div class="auto-container">
            <div class="inner-container">
                <!-- Map Boxed -->
                <div class="map-boxed">
                    <!-- Map Outer -->
                    <div class="map-outer">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.577083467783!2d90.36491607473114!3d23.869146978589537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c3fa88ad8595%3A0xc3e590dff0207152!2sUttara%20North!5e0!3m2!1sen!2sbd!4v1700236088848!5m2!1sen!2sbd"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Section -->

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="auto-container">

            @if (session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Send us a message</h2>
            </div>
            <!-- Contact Form -->
            <div class="contact-form">

                <!--Contact Form-->
                <form method="post" action="{{ route('home.contact.message') }}" id="" method="POST">
                    @csrf
                    <div class="row clearfix">

                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <input type="text" name="username" placeholder="Name" required>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Phone" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                            <button class="theme-btn btn-style-two" type="submit" name="submit-form"><span
                                    class="txt">Submit now <i class="arrow flaticon-right"></i></span></button>
                        </div>

                    </div>
                </form>

                <!--End Contact Form -->
            </div>
        </div>
    </section>
    <!-- End Contact Form Section -->

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Our Infromation</h2>
            </div>
            <div class="row clearfix">

                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-location-pin"></div>
                        <h5>Location</h5>
                        <div class="text">{{ $dashboardSettings->address }} </div>
                    </div>
                </div>

                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-smartphone"></div>
                        <h5>Phone</h5>
                        <ul class="info-list">
                            <li><a href="tel:{{ $dashboardSettings->phone }}">{{ $dashboardSettings->phone }}</a></li>
                            {{-- <li><a href="tel:+0-825-63596-471254">0-825-63596-471254</a></li> --}}
                        </ul>
                    </div>
                </div>

                <!-- Info Block -->
                <div class="info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon flaticon-email-3"></div>
                        <h5>Email</h5>
                        <ul class="info-list">
                            <li><a href="mailto:{{ $dashboardSettings->email }}">{{ $dashboardSettings->email }}</a></li>
                            {{-- <li><a href="mailto:info@counsellaw.com">info@counsellaw.com</a></li> --}}
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->




@endsection
