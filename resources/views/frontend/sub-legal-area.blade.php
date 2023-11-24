@extends('frontend.master')

@section('title', 'Our Service')

@push('css')
@endpush

@section('content')




    <section class="page-title" style="background-image:url({{ URL::asset('frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>{{$legal->name}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ URL('/') }}">home</a></li>
                <li>{{$legal->name}}</li>
            </ul>
        </div>
    </section>




    <!-- Practice Section -->
    <section class="practice-section" style="background-image: url({{URL::asset('frontend/images/background/pattern-2.png')}})">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Our LEGAL PRACTICE Areas {{$legal->name}} </h2>
            </div>
            <div class="inner-container">
                <div class="clearfix">
                    @foreach ($legalareas as $legalarea)
                        <!-- Practice Block -->
                        <div class="practice-block col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="{{ $legalarea->icon }}"></div>
                                <h5><a href="{{ route('home.ourteam.area.wise',$legalarea->id) }}">{{ $legalarea->name }}</a></h5>
                                <div class="text">{{ $legalarea->description }}</div>
                                <a class="arrow flaticon-right-arrow-3"
                                    href="{{ route('home.ourteam.area.wise',$legalarea->id) }}"></a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- End Practice Section -->






@endsection
@section('script')

@endsection
