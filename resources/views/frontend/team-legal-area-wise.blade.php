@extends('frontend.master')

@section('title', 'About Us')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>Our {{$sublegalarea->LegalArea->name}} Team</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL('/') }}">home</a></li>
                <li>{{$sublegalarea->LegalArea->name}} Team</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Our Professional Team</h2>
            </div>
            <div class="row clearfix">
                @foreach ($Teams as $team)
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
                <!-- Team Block -->



            </div>
        </div>
    </section>
    <!-- End Team Section -->





@endsection
