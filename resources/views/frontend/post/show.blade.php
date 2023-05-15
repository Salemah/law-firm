@extends('frontend.master')

@section('title', 'Post Show')

@push('css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        /* .carousel  {
       height:40vh;
     } */
     .post img{
        width: 50%;
     }
     .post-title a{
       text-decoration: none;
       color: black;
       margin: 20px 0;
     }
     .post-title span{
       text-align: left !important;
       font-weight: bold
     }
     .post-description{
        margin: 40px 0;
     }
     .post-description p{
        font-size: 17px;
    line-height: 1.95;
    text-align: left;
     }
     .close-btn i{
        font-size: 27px;
     }


    </style>
@endpush

@section('content')
    <main>
        <section class="section-hero mb-5">
                <div class="post-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12   text-center text-md-end">
                                <a class="close-btn text-danger" href="{{ url('/') }}">
                                    <i class="mt-3 fa-solid fa-xmark"></i>
                                </a></li>
                              </div>
                            <div class="col-12 col-md-12 p-3 mb-4 text-center">
                                <div class="post">
                                    <img src="{{asset('image/post/'.$post->image)}}" alt="default-bg">
                                    <hr>
                                    <div class="post-title">
                                        <h4 class="pt-4">
                                            <a href="">{{$post->title}}</a>
                                        </h4>
                                        <span class="date-time">{{Carbon\Carbon::parse($post->created_at)->format('M d, Y ')}} | {{$post->category->name}}</span>
                                    </div>
                                    <div class="post-description">
                                        <p>{!!$post->description!!}</p>
                                    </div>
                                    <div class="social-icon">
                                        <div class="col-md-12   text-center text-md-start">
                                            <!-- Facebook -->
                                            <a href="{{$dashboardSettings->facebook}}" class="btn btn-outline-light btn-floating m-1 bg-primary "role="button"><i class="fab fa-facebook-f"></i></a>
                                            <a href="{{$dashboardSettings->twitter}}" class="btn btn-outline-light btn-floating m-1 bg-info "role="button"><i class="fab fa-twitter"></i></a>
                                          </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>



@endsection
