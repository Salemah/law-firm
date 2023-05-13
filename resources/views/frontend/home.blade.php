@extends('frontend.master')

@section('title', 'Home Page')

@push('css')
    <style>
        /* .carousel  {
       height:40vh;
     } */
        .carousel img {
            width: 90%
        }
        .programmes-top{
            width: 70vw;
            margin:30px auto;
            text-align: center;
            color: #015AA6;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.5;
            left: 1px;
        }
        .programmes{
            background-color: #F5CA7F;
            padding: 40px 40px;
        }
        .programmes-data{
            text-align: center;

        }
        .programmes-data  p{
            font-size: 24px;
            line-height: 29px;
            font-weight: 700;
        }
        .programmes-data img{
            width: 40%;
        }
    </style>
@endpush

@section('content')
    <main>
        <section class="section-hero mb-5">
            <div class="hero">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/My_Life_My_Rights_Jotirmoy_Deb.jpg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/Rape-Law-Reform-e1662269063745-1.jpeg') }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/stop_rape.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/stop_rape.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="">
                    <div class="container programmes-top">
                        <p>The Bangladesh Legal Aid and Services Trust (BLAST) was established in 1993 dedicated to providing free legal services for the poor, with a Board of Trustees including eminent jurists, lawyers, professionals, and former judges of the Bangladesh Supreme Court.</p>
                    </div>
                    <div class="programmes ">
                        <div class="row py-5">
                            <div class="col-6 col-md-3 mb-3">
                                <div class="programmes-data">
                                    <img src="{{ asset('image/Artboard-1-copyx-1-300x300.png') }}" alt="Legal Aid">
                                    <p>Legal Aid</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="programmes-data">
                                    <img src="{{ asset('image/Artboard-1x-300x300.png') }}" alt="Legal Aid">
                                    <p>Public Interest Litigation</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="programmes-data">
                                    <img src="{{ asset('image/Artboard-1-copy-3x-300x300.png') }}" alt="Legal Aid">
                                    <p>Capacity Building</p>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <div class="programmes-data">
                                    <img src="{{ asset('image/Artboard-1-copy-4x-300x300.png') }}" alt="Legal Aid">
                                    <p>Research</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="post-section">
                    <h1>SEE THE LATEST</h1>
                    <div class="">

                    </div>

                </div>
            </div>
        </section>
    </main>

    <!-- ========================================
          Our Service Section Start
    ========================================  -->
    {{-- <section class="section-services">
    <div class="hero">
        <p>Services section</p>
    </div>
</section> --}}

@endsection
