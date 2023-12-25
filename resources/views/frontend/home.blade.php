@extends('frontend.master')

@section('title', 'Home Page')

@push('css')
@endpush

@section('content')
    @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp


    <!-- Banner Section -->
    <section class="banner-section ">
        <!-- Social Nav -->
        <ul class="social-nav">
            <li class="facebook"><a href="{{ $dashboard_settings->facebook }}"><span class="fa fa-facebook-f"></span></a></li>
            <li class="twitter"><a href="{{ $dashboard_settings->twitter }}"><span class="fa fa-twitter"></span></a></li>
            <li class="linkedin"><a href="{{ $dashboard_settings->linkedin }}"><span class="fa fa-linkedin"></span></a></li>
        </ul>
        <div class="main-slider-carousel owl-carousel owl-theme">

            @foreach ($sliders as $slider)
                <div class="slide" style="background-image: url({{ URL::asset('/image/slider/' . $slider->image) }});height: 100%;
width: 100%;
/* extended code */
background-size: cover;
background-repeat: no-repeat;
background-position: center center;">
                    <div class="auto-container">

                        <!-- Content Column -->
                        <div class="content-column">
                            <div class="inner-column">
                                <div class="title">{{ $slider->title }}
                                </div>
                                <h1>{{ $slider->shorttitle }}</h1>
                                <div class="text">{{ $slider->details }} .</div>
                                <div class="btns-box">
                                    <a href="{{ route('home.contact') }}" class="theme-btn btn-style-one"><span
                                            class="txt">Consultation <i class="arrow flaticon-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <!-- End Banner Section -->
    <!-- End Services Section -->

    <!-- Welcome Section -->
    <section class="welcome-section " style="background-image: url(images/background/pattern-1.png)">
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image titlt" data-tilt data-tilt-max="2">
                                <img src="{{ URL::asset('/image/welcome/' . $welcome->image) }}" alt="" />
                            </div>
                            {{-- <div class="case-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                1500<sup>+</sup>
                                <span>Successful <br> Cases</span>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ $welcome->name }}</h2>
                                <div class="text">{!! $welcome->description !!}</div>
                            </div>
                            <ul class="list-style-one">
                                @php
                                    $lists = explode(',', $welcome->point);
                                @endphp
                                @foreach ($lists as $list)
                                    <li>{{ $list }}</li>
                                @endforeach


                            </ul>
                            <div class="btns-box">
                                {{-- <a href="{{ route('home.contact') }}" class="theme-btn btn-style-two"><span
                                        class="txt">Get a quote
                                        <i class="arrow flaticon-right"></i></span></a> --}}
                                <a href="{{ route('home.aboutus') }}" class="theme-btn btn-style-three"><span
                                        class="txt">Read more
                                        <i class="arrow flaticon-right"></i></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->



    <!-- Practice Section -->
    <section class="practice-section " style="background-image: url(images/background/pattern-2.png)">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Our LEGAL PRACTICE Areas</h2>
            </div>
            <div class="inner-container">
                <div class="clearfix">
                    @foreach ($legalareas as $legalarea)
                        <!-- Practice Block -->
                        <div class="practice-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="{{ $legalarea->icon }}"></div>
                                <h5><a href="{{ route('home.ourservice.sub',$legalarea->id) }}">{{ $legalarea->name }}</a></h5>
                                <div class="text">{{ $legalarea->description }}</div>
                                <a class="arrow flaticon-right-arrow-3" href="{{ route('home.ourservice.sub',$legalarea->id) }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Practice Section -->
    <!-- Team Section -->
    <section class="team-section ">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Our Professional Team</h2>
            </div>
            <div class="row clearfix">
                @foreach ($teams as $team)
                    <div class="team-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ URL::asset('/image/team/' . $team->image) }}" alt="{{ $team->image }}" />
                            </div>
                            <div class="lower-box">
                                <h5><a href="{{ route('home.aboutus') }}">{{ $team->name }}</a></h5>
                                <div class="designation">{{ $team->positions }}</div>
                                <a class="arrow flaticon-right-arrow-3" href="{{ route('home.aboutus') }}"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->




    <!-- Testimonail Section -->
    <section class="testimonial-section " style="background-image: url(images/background/pattern-3.png)">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>What Our CLients Said</h2>
            </div>
            <div class="inner-container">
                <div class="single-item-carousel owl-carousel owl-theme">

                    @foreach ($clients as $client)
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="author-image">
                                    <img src="{{ URL::asset('/image/client/' . $client->image) }}" alt="" />
                                </div>
                                <span class="quote-icon flaticon-quote-1"></span>
                                <div class="text">{!! $client->description !!}</div>
                                <div class="name">{{ $client->name }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonail Section -->

    <!-- Clients Section -->
    <section class="clients-section ">
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
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/1.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/2.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/3.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/4.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/1.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/2.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/3.png"
                                        alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img src="frontend/images/clients/4.png"
                                        alt=""></a></figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
    <!-- Fluid Section One -->
    <section class="fluid-section-one mb-5 " >
        <div class="side-icon"><img src="frontend/images/icons/fluid-icon.png" alt="" /></div>
        <div class="outer-container clearfix">
            <!-- Image Column -->
            <div class="image-column clearfix" style="background-image:url(images/resource/image-1.jpg)">
                <div class="inner-column">
                    <div class="sec-title light">
                        <h2>Frequently asked <br> questions</h2>
                        {{-- <div class="text">Tonam rem aperiam, eaque ipsa quae ab illo inventoe veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo exercitationem ullam corporis.</div> --}}
                    </div>

                    <!-- Accordian Box -->
                    <ul class="accordion-box">

                        @foreach ($questions as $key => $qn)
                            <!-- Block -->
                            <li class="accordion block  @if ($key == 0) active-block @endif">
                                <div class="acc-btn @if ($key == 0) active @endif">
                                    <div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span
                                            class="icon icon-minus fa fa-minus"></span></div>{{ $qn->question }}
                                </div>
                                <div class="acc-content  @if ($key == 0) current @endif">
                                    <div class="content">
                                        <div class="accordian-text">{{ $qn->answer }}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach


                        {{-- <!-- Block -->
                        <li class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span
                                        class="icon icon-minus fa fa-minus"></span></div>fugiat quo voluptas nulla pariatu?
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="accordian-text">Dolor sit amet, consectetur, adipisci velit, sed quia non
                                        numuameius modi tempora incidunt ut labore et dolore magnam aliuam quaerat
                                        voluptatem.</div>
                                </div>
                            </div>
                        </li>

                        <!-- Block -->
                        <li class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"><span class="icon icon-plus flaticon-plus"></span> <span
                                        class="icon icon-minus fa fa-minus"></span></div>minima veniam, quis nostrum
                                exerci?
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="accordian-text">Dolor sit amet, consectetur, adipisci velit, sed quia non
                                        numuameius modi tempora incidunt ut labore et dolore magnam aliuam quaerat
                                        voluptatem.</div>
                                </div>
                            </div>
                        </li>
--}}
                    </ul>

                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Message Us</h2>
                    </div>

                    <!-- Default Form -->
                    <div class="default-form">
                             @if (session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                           <form method="post" action="{{ route('home.contact.message') }}" id="" method="POST">
                    @csrf
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-two" type="submit" name="submit-form"><span
                                            class="txt">Submit Now <i class="arrow flaticon-right"></i></span></button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- End Default Form -->

                </div>
            </div>
        </div>
    </section>
    <!-- Fluid Section One -->
    <!-- CTA Section -->
    {{-- <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="frontend/images/resource/cta.jpg" alt="" />
                </div>
                <div class="content">
                    <h2>Speak With Our <br> Experts Today!</h2>
                    <a href="{{ route('home.contact') }}" class="theme-btn btn-style-two"><span class="txt">Get a quote <i
                                class="arrow flaticon-right"></i></span></a>
                </div>
                <div class="hammer-image">
                    <img src="frontend/images/resource/hammer.png" alt="" />
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End CTA Section -->

@endsection
@section('script')

@endsection
