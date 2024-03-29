

@extends('frontend.master')

@section('title', 'Articles')
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
                                    <div class="image" style="width: 70vh">
                                        <a href="{{route('home.post.show',$post->id)}}"><img src="{{ asset('image/post/' . $post->image) }}"
                                                style="height: 100%" alt="" /></a>
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
                                                    class="txt">Read More</span></a>
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
