@extends('frontend.master')

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
                            @foreach ($posts as $post )
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



@endsection
