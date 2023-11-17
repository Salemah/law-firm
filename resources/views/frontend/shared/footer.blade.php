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
{{-- <div class=" mt-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #45526e">

        <div class="container p-4 pb-0">

            <section class="">

                <div class="row">

                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 style="font-size: 25px" class="text-uppercase mb-4 font-weight-bold">
                            Company name
                        </h6>
                        <p style="font-size: 15px;">
                            {!! $dashboard_settings->about !!}
                        </p>
                    </div>


                    <hr class="w-100 clearfix d-md-none" />

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:
              18px">Products
                        </h6>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">MDBootstrap</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">MDWordPress</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">BrandFlow</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">Bootstrap Angular</a>
                        </p>
                    </div>


                    <hr class="w-100 clearfix d-md-none" />


                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:
              18px">
                            Useful links
                        </h6>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">Your Account</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">Become an Affiliate</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">Shipping Rates</a>
                        </p>
                        <p>
                            <a class="text-white" style="font-size:14px;text-decoration:none">Help</a>
                        </p>
                    </div>

                    <hr class="w-100 clearfix d-md-none" />


                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:
              18px">Contact
                        </h6>
                        <p style="font-size:14px;"><i class="fas fa-home mr-3"></i> {{ $dashboard_settings->address }}
                        </p>
                        <p style="font-size:14px;"><i class="fas fa-envelope mr-3"></i> {{ $dashboard_settings->email }}
                        </p>
                        <p style="font-size:14px;"><i class="fas fa-phone mr-3"></i> {{ $dashboard_settings->phone }}
                        </p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-3">

            <!-- Section: Copyright -->
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <!-- Copyright -->
                        <div class="p-3">
                            © 2020 Copyright:
                            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <!-- Facebook -->
                        <a href="{{ $dashboard_settings->facebook }}" class="btn btn-outline-light btn-floating m-1"
                            class="text-white" role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a href="{{ $dashboard_settings->twitter }}" class="btn btn-outline-light btn-floating m-1"
                            class="text-white" role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a href="{{ $dashboard_settings->linkedin }}" class="btn btn-outline-light btn-floating m-1"
                            class="text-white" role="button"><i class="fa-brands fa-linkedin"></i></a>

                        <!-- Instagram -->
                        <a href="{{ $dashboard_settings->instagram }}" class="btn btn-outline-light btn-floating m-1"
                            class="text-white" role="button"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
            <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->
</div> --}}
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
                                    <a href="index.html"><img src="frontend/images/footer-logo.png" alt="" /></a>
                                </div>
                                <div class="text">Quis autem vel eum iure reprehenderit aui ea voluptate velit esse molestiae consequatur, vel illum qui dolorem.</div>
                                <!-- Social Nav -->
                                <ul class="social-nav">
                                    <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Useful links</h5>
                                <ul class="footer-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact Us</a></li>
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
                                        <a href="tel:+61-3-8376-6284">+61 3 8376 6284</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-call-1"></span>
                                        <a href="tel:+00-9-0000-9999">+00 9 0000 9999</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-email-2"></span>
                                        <a href="mailto:Info@counsellawfirm.com">Info@counsellawfirm.com</a>
                                    </li>
                                    <li>
                                        <span class="icon flaticon-maps-and-flags"></span>
                                        21 King Street Melbourne, <br> 3000, Australia
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                                <h5>Subscribe Now</h5>
                                <div class="text">Quis autem vel eum iure reprehenderit aui ea voluptate.</div>
                                <div class="newsletter-form">
                                    <form method="post" action="https://html.designingmedia.com/counsel-law/contact.html">
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="Enter Email Address" required>
                                            <button type="submit" class="theme-btn btn-style-one"><span class="txt">Subscribe now <i class="arrow flaticon-right"></i></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">Copyright 2021, Counsel Law Firm. All Rights Reserved.</div>
        </div>
    </div>
</footer>
<!-- End of .container -->
