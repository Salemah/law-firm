@extends('frontend.master')

@section('title', 'Home Page')

@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        /* .carousel  {
           height:40vh;
         } */

         body{
            margin: 0;
            padding: 0;
         }
        .carousel-inner {
           height: 100vh;
        }

        /* .carousel img {
                width: 100%;
            } */

        .programmes-top {
            width: 70vw;
            margin: 50px auto;
            text-align: center;
            color: #015AA6;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.5;
            left: 1px;
        }

        .programmes {
            background-color: #F5CA7F;
            padding: 40px 40px;
        }

        .programmes-data {
            text-align: center;

        }

        .programmes-data p {
            font-size: 24px;
            line-height: 29px;
            font-weight: 700;
            transition: .3s ease;
        }

        .programmes-data p:hover {
            color: red;
        }

        .programmes-data img {
            width: 40%;
        }

        /* post-section */
        .post-section {
            background: #EEEDEF;
            text-align: center;
            padding: 30px 8%;
        }

        .post-section h2 {
            font-family: Roboto, Arial, Helvetica, sans-serif;
            font-weight: 700;
            font-size: 32px;
            line-height: 1.5;
            color: #E5A137 !important;
        }

        .post {
            overflow: hidden;
        }

        .post img {
            width: 90%;
            height: 200px;
            transition: 0.7s ease;
        }

        .post img:hover {
            transform: scale(1.09);

        }

        .post h4 {
            font-weight: 600;
            font-size: 20px;
            height: 23vh;
            margin-bottom: 16px;

        }

        .post h4 a {
            text-decoration: none;
            color: black;
            cursor: pointer;
            transition: .3s ease;
        }

        .post h4 a:hover {
            color: rgb(9, 58, 164);

        }

        .post .date-time {
            font-size: 15px;
            font-weight: bold;
        }

        /* our-reach */
        .reach-section h2 {
            font-size: 38px;
            font-weight: 700;
            line-height: 1.5;
            color: #564895;
        }

        .reach-content {
            padding: 40px 10px
        }

        .reach-content span i {
            font-size: 55px;
            color: #564895;
        }

        .reach-content span {
            font-size: 20px;
            font-weight: 400;
        }

        .reach-section-container h4 {
            font-size: 24px;
            color: #564895;
            font-weight: 600;
            width: 80vw;
            margin: auto;

            padding: 15px 0px;
        }

        /* ca,paign-section */
        .card {
            border: none !important;
            background: #EEEDEF !important;
            padding-bottom: 15px;
        }

        .reach-content-campaign {
            margin: 15px 0
        }

        .reach-content-campaign-content {
            min-height: 50vh;
        }

        .reach-content-campaign-content h5 {
            font-size: 30px;
            font-weight: 500;
            line-height: 1.5;
            text-transform: capitalize;
        }

        .reach-content-campaign-content p {
            font-size: 18px;
            padding: 10px 5px
        }

        .reach-content-campaign-content a {
            font-size: 18px;
            padding: 10px 10px;
            border-radius: 30px;
            transition: .3s ease;
        }

        .reach-content-campaign-content a :hover {
            color: #564895 !important;
            background: black !important;
        }
        .img-area img{
            width:50% !important;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
@endpush

@section('content')
    <main>
        <section class=" ">
            <div class="hero">
                @include('frontend.slider')
            </div>
            <div class="">
                <div class="container programmes-top">
                    <p>The Bangladesh Legal Aid and Services Trust (BLAST) was established in 1993 dedicated to providing
                        free legal services for the poor, with a Board of Trustees including eminent jurists, lawyers,
                        professionals, and former judges of the Bangladesh Supreme Court.</p>
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
                                <p>Laws & Cases</p>
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
                <h2 class="py-5">SEE THE LATEST</h2>
                <div class="container">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-12 col-md-3 p-3 mb-4">
                                <div class="post">
                                    <img src="{{ asset('image/post/' . $post->image) }}" alt="default-bg">
                                    <h4 class="pt-4">
                                        <a
                                            href="{{ route('home.post.show', $post->id) }}">{{ Str::limit($post->title, 150) }}</a>
                                    </h4>
                                    <span
                                        class="date-time">{{ Carbon\Carbon::parse($post->created_at)->format('M d, Y ') }}</span>
                                    <span class="date-time">| {{ $post->category->name }}</span>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-12 col-md-3 p-3 mb-4">
                                <div class="post">
                                    <img src="{{asset('image/Artboard-2-700x441.png')}}" alt="default-bg">
                                    <h4 class="pt-4">
                                        <a href="">রানা প্লাজা ধসের দশ বছর: ক্ষতিগ্রস্ত সকল শ্রমিক ও পরিবারের পূনর্বাসনসহ মামলার দ্রুত নিষ্পত্তি এবং যথাযথ ক্ষতিপূরণ প্রদানের দাবী জানাচ্ছে ব্লাস্ট</a>
                                    </h4>
                                    <span class="date-time">April 24th, 2023</span>| <span class="date-time">| Category</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-3 mb-4">
                                <div class="post">
                                    <img src="{{asset('image/Artboard-2-700x441.png')}}" alt="default-bg">
                                    <h4 class="pt-4">রানা প্লাজা ধসের দশ বছর: ক্ষতিগ্রস্ত সকল শ্রমিক ও পরিবারের পূনর্বাসনসহ মামলার দ্রুত নিষ্পত্তি এবং যথাযথ ক্ষতিপূরণ প্রদানের দাবী জানাচ্ছে ব্লাস্ট</h4>
                                    <span class="date-time">April 24th, 2023</span> <span class="date-time">| Category</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-3 mb-4">
                                <div class="post">
                                    <img src="{{asset('image/Artboard-2-700x441.png')}}" alt="default-bg">
                                    <h4 class="pt-4">রানা প্লাজা ধসের দশ বছর: ক্ষতিগ্রস্ত সকল শ্রমিক ও পরিবারের পূনর্বাসনসহ মামলার দ্রুত নিষ্পত্তি এবং যথাযথ ক্ষতিপূরণ প্রদানের দাবী জানাচ্ছে ব্লাস্ট</h4>
                                    <span class="date-time">April 24th, 2023  </span> <span class="date-time">| Category</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 p-3 mb-4">
                                <div class="post">
                                    <img src="{{asset('image/Artboard-2-700x441.png')}}" alt="default-bg">
                                    <h4 class="pt-4">রানা প্লাজা ধসের দশ বছর: ক্ষতিগ্রস্ত সকল শ্রমিক ও পরিবারের পূনর্বাসনসহ মামলার দ্রুত নিষ্পত্তি এবং যথাযথ ক্ষতিপূরণ প্রদানের দাবী জানাচ্ছে ব্লাস্ট</h4>
                                    <span class="date-time">April 24th, 2023</span>| <span class="date-time">Category</span>
                                </div>
                            </div> --}}

                    </div>
                    <span style="padding-top: 20px">
                        {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
                    </span>
                    <span style="padding-top: 20px">
                        <a href="{{ route('home.all.post') }}"><button style="background-color: #564895"
                                class="btn  text-light">view all <i
                                    class="fa-sharp fa-solid fa-arrow-up-right-from-square ml-2"></i></button> </a>
                    </span>
                </div>

            </div>
            <div class="container reach-section text-center py-5">
                <h2 class="py-5 ">OUR TEAM</h2>
                <div class="container reach-section-container">
                    {{-- <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="reach-content">
                                <span><i class="fa-solid fa-map-location"></i> 21 <br> District</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="reach-content">
                                <span><i class="fa-sharp fa-solid fa-users-line"></i> 2600 <br>
                                    + Pro Bono Lawyers</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="reach-content">
                                <span><i class="fa-sharp fa-solid fa-gavel"></i> 80000<br>
                                    + Legal Aid Cases</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="reach-content">
                                <span><i class="fa-solid fa-scale-balanced"></i> 162 <br> Public Interest Litigation</span>
                            </div>
                        </div>
                    </div>
                    <h4>BLAST seeks to reach out to this section of society, raising their awareness and understanding of
                        available rights, remedies and services, and seeking to ensure greater responsiveness to their needs
                        from within the justice system.</h4> --}}
                    <div class="reach-content-campaign">
                        @include('frontend.our-team')
                        {{-- <div class="container " style="margin-top:90px">
                            <div class="row ">
                                <div class="col-12 col-md-3  my-5">
                                    <div class="px-3">
                                        <div class="card reach-content-campaign-content">
                                            <img src="{{ asset('image/03-social-justice-400x194.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-5">
                                    <div class="px-3">
                                        <div class="card reach-content-campaign-content">
                                            <img src="{{ asset('image/03-social-justice-400x194.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-5">
                                    <div class="px-3">
                                        <div class="card reach-content-campaign-content">
                                            <img src="{{ asset('image/03-social-justice-400x194.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-5">
                                    <div class="px-3">
                                        <div class="card reach-content-campaign-content">
                                            <img src="{{ asset('image/03-social-justice-400x194.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div> --}}
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
