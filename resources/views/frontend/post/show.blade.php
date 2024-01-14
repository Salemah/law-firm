@extends('frontend.master')

@section('title', 'Post Show')

@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image:url(images/background/1.jpg)">
        <div class="auto-container">
            <h1>Article Detail</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                <li>Article Detail</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <!-- Block Detail -->
                    <div class="blog-detail">
                        <div class="inner-box">
                            <div class="image">
                                <img src="images/resource/news-3.jpg" alt="" />
                                <div class="category">Business</div>
                                <ul class="post-meta">
                                    <li><span
                                            class="icon flaticon-timetable"></span>{{ Carbon\Carbon::parse($post->created_at)->format('M d, Y ') }}
                                    </li>
                                    <li><span class="icon flaticon-email"></span>Comments 03</li>
                                    <li><span class="icon flaticon-user-2"></span>Admin</li>
                                </ul>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $post->title }}.</h3>
                                <p>{!! $post->description !!}. </p>
                                {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
								<p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> --}}
                                @if ($post->quote)
                                    <blockquote>
                                        <span class="quote-icon flaticon-quote-1"></span>
                                        <div class="quote-text">"{!! $post->quote !!}”</div>
                                        <div class="quote-author">{{ $post->quoteby }}</div>
                                    </blockquote>
                                @endif

                                <p>{!! $post->snddescription !!}</p>
                                <div class="two-column">
                                    <div class="row clearfix">
                                        <!-- Column -->
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <div class="image">
                                                <img src="{{ asset('image/post/' . $post->scndimage) }}"
                                                    alt="{{ $post->scndimage }}" />
                                            </div>
                                        </div>
                                        <!-- Column -->
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <p>{!! $post->thddescription !!}.</p>
                                            {{-- <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.</p> --}}
                                        </div>
                                    </div>
                                </div>

                                <!-- Post Share Options-->
                                <div class="post-share-options">
                                    <div class="post-share-inner clearfix">
                                        {{-- <div class="pull-left tags">TAGS: <a href="#">Business,</a> <a
                                                href="#">Law,</a><a href="#">Technology</a></div> --}}
                                        <div class="tags pull-left">
                                            <div class="business">Category: <a href="#">Online Law</a>
                                                @foreach ($categories as $category)
                                                    <a href="#">{{ $category }},</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Author Box -->
                            <div class="blog-author-box">
                                <div class="author-inner">
                                    <div class="thumb"><img src="{{ asset('/image/user/'.$post->User->image) }}"
                                            alt=""></div>
                                    <h4 class="name">{{$post->User->name}}</h4>
                                    <div class="text">{!!$post->User->description!!}</div>
                                    <ul class="social-icon clearfix">
                                        <li><a href="{{$post->User->facebook}}"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="{{$post->User->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                        <li><a href="{{$post->User->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        {{-- <div class="comments-area">
                            <div class="group-title">
                                <h5>2 Comments</h5>
                            </div>

                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><img
                                            src="{{ asset('frontend/images/resource/author-9.jpg') }}" alt=""></div>
                                    <div class="comment-info clearfix"><strong>KEVIN MARTIN</strong>
                                        <div class="comment-time">20 APRIL, 2021</div>
                                    </div>
                                    <div class="text">Lorem ipsum is simply free text used by copytyping refreshing. Neque
                                        porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto
                                        beatae vitae dicta sunt explicabo.</div>
                                    <a class="theme-btn reply-btn" href="#">Reply Now <span
                                            class="arrow flaticon-right-arrow-1"></span></a>
                                </div>
                            </div>

                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><img
                                            src="{{ asset('frontend/images/resource/author-10.jpg') }}" alt="">
                                    </div>
                                    <div class="comment-info clearfix"><strong>SARAH ALBERT</strong>
                                        <div class="comment-time">20 APRIL, 2021</div>
                                    </div>
                                    <div class="text">Lorem ipsum is simply free text used by copytyping refreshing. Neque
                                        porro est qui dolorem ipsum quia quaed inventore veritatis et quasi architecto
                                        beatae vitae dicta sunt explicabo.</div>
                                    <a class="theme-btn reply-btn" href="#">Reply Now <span
                                            class="arrow flaticon-right-arrow-1"></span></a>
                                </div>
                            </div>

                        </div> --}}


                        <!-- Comment Form -->
                        {{-- <div class="comment-form">

                            <div class="group-title">
                                <h5>LEAVE A COMMENT</h5>
                            </div>

                            <!--Comment Form-->
                            <form method="post" action="https://html.designingmedia.com/counsel-law/blog.html">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Full Name" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea class="" name="message" placeholder="Your Message"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span
                                                class="txt">Send now</span></button>
                                    </div>

                                </div>
                            </form>

                        </div> --}}


                    </div>
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

                                        {{-- <li><a href="#">Life Style<span>(80)</span></a></li>
                                        <li><a href="#">Technology<span>(95)</span></a></li> --}}
                                    </ul>
                                </div>
                            </div>

                            <!-- Popular Post Widget -->
                            <div class="sidebar-widget popular-posts">
                                <div class="widget-content">
                                    <div class="sidebar-title">
                                        <h5>latest posts</h5>
                                    </div>
                                    @foreach ($posts as $post)
                                        <article class="post">
                                            <figure class="post-thumb"><img
                                                    src="{{asset('image/post/'.$post->image)}}"
                                                    alt=""><a href="{{route('home.post.show',$post->id)}}" class="overlay-box"></a>
                                            </figure>
                                            <div class="text"><a href="{{route('home.post.show',$post->id)}}">{{Str::limit($post->title,30)}}</a></div>
                                            <div class="post-info">{{Carbon\Carbon::parse($post->created_at)->format('M d, Y ')}}</div>
                                        </article>
                                    @endforeach


                                    {{-- <article class="post">
                                        <figure class="post-thumb"><img
                                                src="{{ asset('frontend/images/resource/post-thumb-2.jpg') }}"
                                                alt=""><a href="blog-detail.html" class="overlay-box"></a>
                                        </figure>
                                        <div class="text"><a href="blog-detail.html">Quis autem velo eum iure suam
                                                nihil</a></div>
                                        <div class="post-info">August 25, 2021</div>
                                    </article>

                                    <article class="post">
                                        <figure class="post-thumb"><img
                                                src="{{ asset('frontend/images/resource/post-thumb-3.jpg') }}"
                                                alt=""><a href="blog-detail.html" class="overlay-box"></a>
                                        </figure>
                                        <div class="text"><a href="blog-detail.html">Quis autem velo eum iure suam
                                                nihil</a></div>
                                        <div class="post-info">August 25, 2021</div>
                                    </article>--}}
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

    {{-- <!-- Facts Section three -->
    <section class="facts-section-three" style="background-image: url(images/background/1.jpg);">

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





@endsection
