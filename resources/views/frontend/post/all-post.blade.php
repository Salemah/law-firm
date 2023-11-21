{{-- @extends('frontend.master')

@section('title', 'Home Page')

@push('css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        /* .carousel  {
       height:40vh;
     } */

        .carousel img {
            width: 90%;
        }
        .programmes-top{
            width: 70vw;
            margin:50px auto;
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
            transition: .3s ease;
        }
        .programmes-data  p:hover{
            color: red;
        }
        .programmes-data img{
            width: 40%;
        }
        /* post-section */
        .post-section{
           background: #EEEDEF;
           text-align: center;
           padding: 30px 8%;
        }
        .post-section h2{
           font-family:  Roboto, Arial, Helvetica, sans-serif;
           font-weight: 700;
           font-size: 32px;
           line-height: 1.5;
           color: #E5A137 !important;
        }
        .post {
            overflow: hidden;
        }
        .post img{
            width: 90%;
            height: 200px;
            transition: 0.7s ease;
        }
        .post img:hover{
            transform: scale(1.09);

        }
        .post h4{
            font-weight: 600;
            font-size: 20px;
            height: 23vh;
            margin-bottom: 16px;

        }
        .post h4 a{
            text-decoration: none;
            color: black;
            cursor: pointer;
            transition: .3s ease;
        }
        .post h4 a:hover{
            color: rgb(9, 58, 164);

        }
        .post .date-time{
            font-size: 15px;
          font-weight: bold;
        }

        /* our-reach */
        .reach-section h2{
            font-size: 38px;
            font-weight: 700;
            line-height: 1.5;
            color: #564895;
        }
        .reach-content {
            padding: 40px 10px
        }
        .reach-content span i{
            font-size: 55px;
            color:#564895;
        }
        .reach-content span {
            font-size: 20px;
            font-weight: 400;
        }
        .reach-section-container h4{
            font-size: 24px;
            color: #564895;
            font-weight: 600;
            width: 80vw;
            margin: auto;

            padding: 15px 0px;
        }
        /* ca,paign-section */
        .card{
            border: none !important;
            background: #EEEDEF !important;
            padding-bottom:15px;
        }
        .reach-content-campaign{
            margin: 15px 0
        }
        .reach-content-campaign-content{
            min-height: 50vh;
        }
        .reach-content-campaign-content h5{
            font-size: 30px;
            font-weight: 500;
            line-height: 1.5;
            text-transform: capitalize;
        }
        .reach-content-campaign-content p{
            font-size: 18px;
            padding: 10px 5px
        }
        .reach-content-campaign-content a{
            font-size: 18px;
            padding: 10px 10px;
            border-radius: 30px;
            transition: .3s ease;
        }
        .reach-content-campaign-content a :hover{
            color: #564895 !important;
            background: black !important;
        }
    </style>
@endpush

@section('content')
    <main>
        <section class="section-hero mb-5">
                <div class="post-section">
                    <h2 class="py-2">All Post</h2>
                    <div class="container">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-12 col-md-3 p-3 mb-4">
                                    <div class="post">
                                        <img src="{{asset('image/post/'.$post->image)}}" alt="default-bg">
                                        <h4 class="pt-4">
                                            <a href="{{route('home.post.show',$post->id)}}">{{Str::limit($post->title,150)}}</a>
                                        </h4>
                                        <span class="date-time">{{Carbon\Carbon::parse($post->created_at)->format('M d, Y ')}}</span> <span class="date-time">| {{$post->category->name}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span style="padding-top: 20px">
                            {!!$posts->withQueryString()->links('pagination::bootstrap-5')!!}
                        </span>
                    </div>
                </div>
        </section>
    </main>



@endsection --}}

@extends('frontend.master')

@section('title', 'Home Page')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image:url({{asset('frontend/images/background/1.jpg')}})">
        <div class="auto-container">
            {{-- <h1>Our Blog</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Blog</li>
            </ul> --}}
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic">
                        @foreach ($posts as $post)
                            <!-- News Block -->
                            <div class="news-block">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{route('home.post.show',$post->id)}}"><img src="{{ asset('image/post/' . $post->image) }}"
                                                style="height: 70%" alt="" /></a>
                                        <div class="category">Law</div>
                                        <ul class="post-meta">
                                            <li><a href="{{route('home.post.show',$post->id)}}"><span
                                                        class="icon flaticon-timetable"></span>{{ Carbon\Carbon::parse($post->created_at)->format('M d, Y ') }}</a>
                                            </li>
                                            <li><a href="{{route('home.post.show',$post->id)}}"><span class="icon flaticon-email"></span>Comments
                                                    03</a></li>
                                            <li><a href="{{route('home.post.show',$post->id)}}"><span
                                                        class="icon flaticon-user-2"></span>Admin</a></li>
                                        </ul>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="{{route('home.post.show',$post->id)}}">{{Str::limit($post->title,250)}}</a></h4>
                                        {{-- <div class="text">{!!$post->description!!}</div> --}}
                                        <div class="btn-box">
                                            <a href="{{route('home.post.show',$post->id)}}" class="theme-btn btn-style-two"><span
                                                    class="txt">Learn More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="blog-detail.html"><img src="{{ asset('frontend/images/resource/news-2.jpg') }}"
                                            alt="" /></a>
                                    <div class="category">Business</div>
                                    <ul class="post-meta">
                                        <li><a href="blog-detail.html"><span class="icon flaticon-timetable"></span>August
                                                25, 2021</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-email"></span>Comments
                                                03</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-user-2"></span>Admin</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-detail.html">Definitive Guide to Make a Daily More Productive Working
                                            Flow.</a></h3>
                                    <div class="text">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable. </div>
                                    <div class="btn-box">
                                        <a href="blog-detail.html" class="theme-btn btn-style-two"><span
                                                class="txt">Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="blog-detail.html"><img src="{{ asset('frontend/images/resource/news-3.jpg') }}"
                                            alt="" /></a>
                                    <div class="category">Law</div>
                                    <ul class="post-meta">
                                        <li><a href="blog-detail.html"><span class="icon flaticon-timetable"></span>August
                                                25, 2021</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-email"></span>Comments
                                                03</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-user-2"></span>Admin</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-detail.html">The Start-Up Ultimate Guide to Make Your WordPress
                                            Journal.</a></h3>
                                    <div class="text">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable. </div>
                                    <div class="btn-box">
                                        <a href="blog-detail.html" class="theme-btn btn-style-two"><span
                                                class="txt">Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="blog-detail.html"><img src="{{ asset('frontend/images/resource/news-4.jpg') }}"
                                            alt="" /></a>
                                    <div class="category">Business</div>
                                    <ul class="post-meta">
                                        <li><a href="blog-detail.html"><span class="icon flaticon-timetable"></span>August
                                                25, 2021</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-email"></span>Comments
                                                03</a></li>
                                        <li><a href="blog-detail.html"><span class="icon flaticon-user-2"></span>Admin</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="blog-detail.html">Basic Rules of Running Web Morancy Business</a></h3>
                                    <div class="text">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable. </div>
                                    <div class="btn-box">
                                        <a href="blog-detail.html" class="theme-btn btn-style-two"><span
                                                class="txt">Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
            <span style="padding-top: 40px">
                {!! $posts->links() !!}
                </span>
                    <!--Post Share Options-->
                    {{-- <div class="styled-pagination text-center">
                        <ul class="clearfix">
                            <li class="prev"><a href="#"><span class="flaticon-back"></span> </a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#"><span class="flaticon-next-1"></span> </a></li>
                        </ul>
                    </div> --}}

                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">
                        <div class="sidebar-inner">

                            <!-- Search -->
                            <div class="sidebar-widget search-box">
                                <form method="post" action="https://html.designingmedia.com/counsel-law/contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value=""
                                            placeholder="Search ....." required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>

                            <!--Blog Category Widget-->
                            <div class="sidebar-widget sidebar-blog-category">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>Categories</h5>
                                    </div>
                                    <ul class="cat-list-two">
                                         @forelse ($categorys as $category)
                                        <li><a href="#">{{$category->name}}<span>(25)</span></a></li>
                                        @empty

                                        @endforelse
                                    </ul>
                                </div>
                            </div>

                            <!-- Popular Post Widget -->
                            <div class="sidebar-widget popular-posts">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>latest posts</h5>
                                    </div>
                                     @foreach ($ltposts as $postt)
                                        <article class="post">
                                            <figure class="post-thumb"><img
                                                    src="{{asset('image/post/'.$postt->image)}}"
                                                    alt=""><a href="{{route('home.post.show',$postt->id)}}" class="overlay-box"></a>
                                            </figure>
                                            <div class="text"><a href="{{route('home.post.show',$postt->id)}}">{{Str::limit($postt->title,30)}}</a></div>
                                            <div class="post-info">{{Carbon\Carbon::parse($postt->created_at)->format('M d, Y ')}}</div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tags Widget -->
                            {{-- <div class="sidebar-widget popular-tags">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>Tags</h5>
                                    </div>
                                    <a href="#">Cloud</a>
                                    <a href="#">Life style</a>
                                    <a href="#">Hosting</a>
                                    <a href="#">Business</a>
                                </div>
                            </div> --}}

                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </div>

    <!-- Facts Section three -->
    {{-- <section class="facts-section-three" style="background-image: url(images/background/1.jpg);">

        <div class="auto-container">
            <div class="fact-counter-style-three">
                <div class="row">
                    <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-briefcase"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="245">0</span><sup>+</sup>
                                    </div>
                                    <h4>Business Partners </h4>
                                    <div class="text">Indignation & dislike mens who <br> beguiled demoralized.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-balance"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="1879">0</span><sup>+</sup>
                                    </div>
                                    <h4>Cases Done</h4>
                                    <div class="text">Desire that they cannot foresee <br> the pain and trouble.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="icon"><span class="flaticon-trophy-2"></span></div>
                                <div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="3000" data-stop="350">0</span><sup>+</sup>
                                    </div>
                                    <h4>Awards Win</h4>
                                    <div class="text">These cases are perfect simple <br> & easy to distinguish.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Clients Section -->
    {{-- <section class="clients-section">
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
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/1.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/2.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/3.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/4.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/1.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/2.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/3.png') }}" alt=""></a></figure>
                        </li>
                        <li class="slide-item">
                            <figure class="image-box"><a href="#"><img
                                        src="{{ asset('frontend/images/clients/4.png') }}" alt=""></a></figure>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="image">
                    <img src="{{ asset('frontend/images/resource/cta.jpg') }}" alt="" />
                </div>
                <div class="content">
                    <h2>Speak With Our <br> Experts Today!</h2>
                    <a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Get a quote <i
                                class="arrow flaticon-right"></i></span></a>
                </div>
                <div class="hammer-image">
                    <img src="{{ asset('frontend/images/resource/hammer.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End CTA Section -->

@endsection
