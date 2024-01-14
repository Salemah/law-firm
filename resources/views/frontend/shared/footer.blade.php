@push('css')
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
.footer-description{

}
    </style> --}}
@endpush
@php
    $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
@endphp

<footer class="main-footer">
    <div class="auto-container">
        <!-- Widgets Section -->
        <div class="widgets-section">
            <!-- Scroll To Top -->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            <div class="row clearfix">

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
                                <div class="logo">
                                    <a href="{{URL('/')}}"><img src="{{ asset('/image/dashboard/'.$dashboard_settings->logo) }}" alt="" /></a>
                                </div>
                                <div class="text">{!!$dashboard_settings->about!!}</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    <li><a href="{{$dashboard_settings->facebook}}"><span class="fa fa-facebook-f"></span></a></li>
                                    <li><a href="{{$dashboard_settings->twitter}}"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="{{$dashboard_settings->linkedin}}"><span class="fa fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Useful links</h5>
                                <ul class="footer-list">
                                    <li><a href="{{URL('/')}}">Home</a></li>
                                    <li><a href="{{route('home.cases')}}">About Us</a></li>
                                    <li><a href="{{route('home.cases')}}">Case</a></li>
                                    <li><a href="{{route('home.all.post')}}">Articles</a></li>
                                    <li><a href="{{ route('home.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Big Column -->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
                                <h5>Office Info</h5>
                                <ul>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+61-3-8376-6284">{{$dashboard_settings->phone}}</a>
                                    </li>
                                    {{-- <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+00-9-0000-9999">+00 9 0000 9999</a>
                                    </li> --}}
                                    <li>
                                        <span class="icon flaticon-email-2"></span>
                                        <a href="mailto:{{$dashboard_settings->email}}">{{$dashboard_settings->email}}</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-maps-and-flags"></span>
                                        {{$dashboard_settings->address}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        {{-- <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h5>Subscribe Now</h5>

                                <div class="newsletter-form">
                                    <form method="post" action="https://html.designingmedia.com/counsel-law/contact.html">
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="Enter Email Address" required>
                                            <button type="submit" class="theme-btn btn-style-one"><span class="txt">Subscribe now <i class="arrow flaticon-right"></i></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">Copyright {{Carbon\Carbon::now()->format('Y')}}, {{$dashboard_settings->copyright}}. All Rights Reserved.</div>
        </div>
    </div>
</footer>
<!-- End of .container -->
