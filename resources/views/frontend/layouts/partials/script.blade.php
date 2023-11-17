{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script
          type="module"
          src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
        ></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    const mobile_nav = document.querySelector(".mobile-navbar-btn");
    const nav_header = document.querySelector(".header");

    const toggleNavbar = () => {

        nav_header.classList.toggle("active");
    };

    mobile_nav.addEventListener("click", () => toggleNavbar());
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
</script>
<script>
       $('.team-slider').owlCarousel({
           loop: true,
           nav: false,
           autoplay: true,
           autoplayTimeout: 5000,
           smartSpeed: 450,
           margin: 20,
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 2
               },
               991: {
                   items: 3
               },
               1200: {
                   items: 3
               },
               1920: {
                   items: 3
               }
           }
       });
</script>
@stack('script') --}}
<script src="{{ asset('frontend/js/jquery.js')}}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.js')}}"></script>
<script src="{{ asset('frontend/js/appear.js')}}"></script>
<script src="{{ asset('frontend/js/parallax.min.js')}}"></script>
<script src="{{ asset('frontend/js/tilt.jquery.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.paroller.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.js')}}"></script>
<script src="{{ asset('frontend/js/wow.js')}}"></script>
<script src="{{ asset('frontend/js/nav-tool.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend/js/script.js')}}"></script>
