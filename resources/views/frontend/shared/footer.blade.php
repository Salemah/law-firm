@push('css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
.footer-description{

}
    </style>
@endpush
@php
$dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
@endphp
<div class=" my-5">
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #45526e"
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 style="font-size: 25px" class="text-uppercase mb-4 font-weight-bold">
                Company name
              </h6>
              <p style="font-size: 15px;">
                {!!$dashboard_settings->about!!}
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:
              18px">Products</h6>
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
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
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

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold" style="font-size:
              18px">Contact</h6>
              <p style="font-size:14px;"><i class="fas fa-home mr-3"></i> {{$dashboard_settings->address}}</p>
              <p style="font-size:14px;"><i class="fas fa-envelope mr-3"></i> {{$dashboard_settings->email}}</p>
              <p style="font-size:14px;"><i class="fas fa-phone mr-3"></i> {{$dashboard_settings->phone}}</p>
              {{-- <p style="font-size:14px;"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> --}}
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
                <a class="text-white" href="https://mdbootstrap.com/"
                   >MDBootstrap.com</a
                  >
              </div>
              <!-- Copyright -->
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
              <!-- Facebook -->
              <a
              href="{{$dashboard_settings->facebook}}"
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-facebook-f"></i
                ></a>

              <!-- Twitter -->
              <a
              href="{{$dashboard_settings->twitter}}"
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-twitter"></i
                ></a>

              <!-- Google -->
              <a
              href="{{$dashboard_settings->linkedin}}"
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fa-brands fa-linkedin"></i></a>

              <!-- Instagram -->
              <a
              href="{{$dashboard_settings->instagram}}"
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-instagram"></i
                ></a>
            </div>
            <!-- Grid column -->
          </div>
        </section>
        <!-- Section: Copyright -->
      </div>
      <!-- Grid container -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
