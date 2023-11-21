@extends('frontend.master')

@section('title', 'Cases')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image:url(images/background/1.jpg)">
        <div class="auto-container">
            <h1>Case studies</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Case studies</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- case-style-three -->
    <section class="case-style-three bg-color-1">
        <div class="auto-container">
            <div class="row clearfix">

                @foreach ($cases as $case)
                    <div class="col-lg-4 col-md-6 col-sm-12 case-block">
                        <div class="case-block-two wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ URL::asset('/image/case/' . $case->image . '') }}" alt="">
                                    <div class="link"><a href="{{route('home.cases.details',$case->id)}}"><i class="flaticon-link"></i></a></div>
                                    <div class="overlay-layer"></div>
                                </figure>
                                <div class="lower-content">
                                    <div class="box">
                                        <div class="icon-box"><i class="{{ $case->legal->icon }}"></i></div>
                                        <p>Law Firm</p>
                                        <h4><a href="{{route('home.cases.details',$case->id)}}">{{ $case->legal->name }}</a></h4>
                                    </div>
                                    <div class="text">
                                        <p>{{ $case->name }}</p>
                                    </div>
                                    <div class="link"><a href="{{route('home.cases.details',$case->id)}}"><i class="flaticon-right"></i>Read
                                            More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!! $cases->links() !!}

            </div>
        </div>
    </section>
    <!-- case-style-three end -->



    <!-- Clients Section -->
    <section class="clients-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>TRUSTED COMPANIES</h2>
                <div class="text">Nemo enim ipsam voluptatem quia voluptas sit asper aut odit aut fugit, sed quia
                    consequuntur magni doloreos <br> qui ratione voluptatem sequi nesciunt aorro ruisea</div>
            </div>
            <div class="inner-container">
                <div class="sponsors-outer">
                    <!--Sponsors Carousel-->
                    <ul class="sponsors-carousel owl-carousel owl-theme">
                        @foreach ($companies as $company)
                            <li class="slide-item">
                                <figure class="image-box"><a href="#"><img
                                            src="{{ URL::asset('image/company/'.$company->image.'') }}" alt=""></a>
                                </figure>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    {{-- <!-- CTA Section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="{{ URL::asset('frontend/images/resource/cta.jpg') }}" alt="" />
                </div>
                <div class="content">
                    <h2>Speak With Our <br> Experts Today!</h2>
                    <a href="{{ route('home.contact') }}" class="theme-btn btn-style-two"><span class="txt">Get a quote <i
                                class="arrow flaticon-right"></i></span></a>
                </div>
                <div class="hammer-image">
                    <img src="{{ URL::asset('frontend/images/resource/hammer.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Section --> --}}

@endsection
