@extends('frontend.master')

@section('title', 'Appointment Shedule')
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{ URL::asset('frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1> Appointment Shedule</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL('/') }}">home</a></li>
                <li>Appointment Shedule</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ $team->name }}</h2>
            </div>
            <div class="row clearfix">
                @foreach ($orders as $day => $teams)
                    <div class="team-block col-3">
                        <div>
                            <h4  class="mb-2"> <b>{{ $day }}</b></h4>
                            @foreach ($teams as $team)
                                <div class=""><button class="btn btn-sm btn-success my-2" title="Click To Appoinment">{{ Carbon\Carbon::parse($team->from_time)->format('g:i A') }}</button></div>
                            @endforeach

                        </div>
                        <div>

                        </div>
                        {{-- <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ URL::asset('/image/team/' . $team->image) }}" alt="{{ $team->image }}" />
                            </div>
                            <div class="lower-box">
                                <h5><a href="{{ route('home.view.shedule',$team->id) }}">{{ $team->name }}</a></h5>
                                <div class="designation">{{ $team->positions }}</div>
                                <a class="arrow flaticon-right-arrow-3" href="{{ route('home.view.shedule',$team->id) }}"></a>
                            </div>
                        </div> --}}
                    </div>
                @endforeach
                <!-- Team Block -->



            </div>
        </div>
    </section>
    <!-- End Team Section -->





@endsection
