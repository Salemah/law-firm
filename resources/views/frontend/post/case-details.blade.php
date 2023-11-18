@extends('frontend.master')

@section('title', 'Cases Details')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url(images/background/1.jpg)">
    	<div class="auto-container">
			<h1 style="text-transform: uppercase;">{{$case->legal->name}}</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{URL('/')}}">home</a></li>
				<li style="text-transform: uppercase;">{{$case->legal->name}}</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Services Detail Section -->
	<section class="services-detail-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="image">

					<img src="{{URL::asset('/image/legalarea/'.$case->legal->image.'')}}" alt="" />
				</div>
				<div class="lower-content">
					<h2>{{$case->name}}</h2>
					<p>{!!$case->description!!}</p>
					{{-- <div class="row clearfix">
						<div class="column col-lg-3 col-md-6 col-sm-6">
							<ul class="list-style-one">
								<li>Velit esse quam nihilumi</li>
								<li>Qui dolorem eum fugiat</li>
							</ul>
						</div>
						<div class="column col-lg-3 col-md-6 col-sm-6">
							<ul class="list-style-one">
								<li>Nostrum exercitationem</li>
								<li>Reprehenderit qui nulla</li>
							</ul>
						</div>
						<div class="column col-lg-3 col-md-6 col-sm-6">
							<ul class="list-style-one">
								<li>Tempora incidunt utao</li>
								<li>Nihil molestiae conseua</li>
							</ul>
						</div>
						<div class="column col-lg-3 col-md-6 col-sm-6">
							<ul class="list-style-one">
								<li>Aspernatur aut odit aut</li>
								<li>Ratione voluptatem sea</li>
							</ul>
						</div>
					</div> --}}
					<div class="btn-box">
						<a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Consultation <i class="arrow flaticon-right"></i></span></a>
					</div>
					<!-- Consult Form -->
					<div class="consult-form">
						<div class="sec-title">
							<h2>Consult Now</h2>
						</div>
						<form method="post" action="https://html.designingmedia.com/counsel-law/contact.html">
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
									<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Submit now <i class="arrow flaticon-right"></i></span></button>
								</div>

							</div>
						</form>
						<!-- End Consult Form -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Services Detail Section -->

@endsection
