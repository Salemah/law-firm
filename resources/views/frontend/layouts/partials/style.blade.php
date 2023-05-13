
{{-- boostrap cdn --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
{{-- boostrap cdn end --}}
<style>
    @import url("https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@400;500;600;700&display=swap");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Work Sans", sans-serif;
    }

    html {
        font-size: 62.5%;
        /* 1rem = 10px */
        overflow-x: hidden;
    }

    body {
        overflow-x: hidden;
    }

    .header {
        padding: 0 8%;
        height: 10rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #e7f5ff;
    }

    .header .logo {
        height: 3rem;
    }

    .navbar-list {
        display: flex;
        gap: 4.8rem;
        list-style: none;
    }

    .navbar-link:link,
    .navbar-link:visited {
        display: inline-block;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 2rem;
        font-weight: 500;
        color: #212529;
        transition: all 0.3s;
    }

    .navbar-link:hover,
    .navbar-link:active {
        color: #364fc7;
    }

    .mobile-navbar-btn {
        display: none;
        background: transparent;
        cursor: pointer;
    }

    .mobile-nav-icon {
        width: 4rem;
        height: 4rem;
        color: #212529;
    }

    .mobile-nav-icon[name="close-outline"] {
        display: none;
    }

    /* ===========================================
Hero and Service Section Start
======================================= */
    /* .section-hero,
    .section-services {
        padding: 9.6rem 0;
        background-color: #a5d8ff;
        height: 60vh;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-services {
        background: #f3f0ff;
    }

    .section-hero p,
    .section-services p {
        font-size: 3.2rem;
    } */

    /* ===========================================
Responsive Codes
======================================= */

    /* 980px  */
    @media (max-width: 62em) {
        .mobile-navbar-btn {
            display: block;
            z-index: 999;
            border: 3px solid #212529;
            color: #212529;
        }

        .header {
            position: relative;
        }

        .header .logo {
            width: 40%;
        }

        .navbar {
            /* display: none; */
            width: 100%;
            height: 100vh;
            background: #e7f5ff;
            position: absolute;
            top: 0;
            left: 0;

            display: flex;
            justify-content: center;
            align-items: center;

            /* to get the tranisition  */
            transform: translateX(100%);
            transition: all 0.5s linear;

            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .navbar-list {
            flex-direction: column;
            align-items: center;
        }

        .active .navbar {
            transform: translateX(0);
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .active .mobile-navbar-btn .mobile-nav-icon[name="close-outline"] {
            display: block;
        }

        .active .mobile-navbar-btn .mobile-nav-icon[name="menu-outline"] {
            display: none;
        }
    }

    /* Below 560px  */
    @media (max-width: 35em) {
        .header {
            padding: 0 2.4rem;
        }

        .header .logo {
            width: 60%;
        }
    }

</style>

@stack('css')
