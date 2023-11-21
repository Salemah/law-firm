@extends('frontend.master')

@section('title', 'About Us')
@section('content')
   <!-- Page Title -->
    <section class="page-title" style="background-image:url(images/background/1.jpg)">
    	<div class="auto-container">
			<h1>About Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{URL('/')}}">home</a></li>
				<li>About</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Case Section -->
	<section class="case-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="clearfix">

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<img src=" {{URL::asset('image/aboutus/'.$aboutus->image)}}" alt="" />
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>{{$aboutus->title}}</h2>
								<div class="text">{!!$aboutus->description!!}</div>
							</div>
							{{-- <div class="text-box">
								Nam libero tempore, cum soluta nobis est eligenioptio cumque nihil impedit quo minus id quod maxplaceat facere possimus, omnis voluptas.
								<a href="corporate_law.html" class="arrow flaticon-right"></a>
							</div> --}}
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Welcome Section -->

	<!-- Services Section Two -->
	<section class="services-section-two style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>What Make Us Unique</h2>
			</div>
			<div class="row clearfix">
@foreach ($uniques as $unique)
<div class="services-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="{{$unique->icon}}"></div>
						<h5><a href="corporate_law.html">{{$unique->title}}</a></h5>
						<div class="text">{!!$unique->description !!}</div>
						{{-- <a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a> --}}
					</div>
				</div>
@endforeach
				<!-- Services Block Two -->


				{{-- <!-- Services Block Two -->
				<div class="services-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon flaticon-law"></div>
						<h5><a href="corporate_law.html">Great Results</a></h5>
						<div class="text">Quis autem velo eum iure rerehen derit rui inea votasuam nihil molestia conseuatur vel illum</div>
						<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
					</div>
				</div>

				<!-- Services Block Two -->
				<div class="services-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon flaticon-marketing"></div>
						<h5><a href="corporate_law.html">Passionate People</a></h5>
						<div class="text">Quis autem velo eum iure rerehen derit rui inea votasuam nihil molestia conseuatur vel illum</div>
						<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
					</div>
				</div> --}}

			</div>
		</div>
	</section>
	<!-- End Services Section Two -->

	<!-- Team Section -->
	<section class="team-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Our Professional Team</h2>
			</div>
			<div class="row clearfix">

                @foreach ($teams as $team)
<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image" >
							<img src="{{URL::asset('/image/team/'.$team->image)}}" alt="{{$team->image}}" />
						</div>
						<div class="lower-box">
							<h5><a href="{{route('home.aboutus')}}">{{$team->name}}</a></h5>
							<div class="designation">{{$team->positions}}</div>
							<a class="arrow flaticon-right-arrow-3" href="{{route('home.aboutus')}}"></a>
						</div>
					</div>
				</div>
                @endforeach
				<!-- Team Block -->


				{{-- <!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-2.jpg" alt="" />
						</div>
						<div class="lower-box">
							<h5><a href="corporate_law.html">ALina Kevin</a></h5>
							<div class="designation">Senior Attorney</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>
				</div>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-3.jpg" alt="" />
						</div>
						<div class="lower-box">
							<h5><a href="corporate_law.html">Senior Attorney</a></h5>
							<div class="designation">Junior Attorney</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>
				</div>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="450ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-4.jpg" alt="" />
						</div>
						<div class="lower-box">
							<h5><a href="corporate_law.html">Polard Andrew</a></h5>
							<div class="designation">Financial Attorney</div>
							<a class="arrow flaticon-right-arrow-3" href="corporate_law.html"></a>
						</div>
					</div>
				</div> --}}

			</div>
		</div>
	</section>
	<!-- End Team Section -->

	<!-- Clients Section -->
	<section class="clients-section style-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>TRUSTED COMPANIES</h2>
				<div class="text">Nemo enim ipsam voluptatem quia voluptas sit asper aut odit aut fugit, sed quia consequuntur magni doloreos <br> qui ratione voluptatem sequi nesciunt aorro ruisea</div>
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



@endsection
