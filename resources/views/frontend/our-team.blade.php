@push('css')
<style>
    .img-area img{
        border-radius: 60px 20px 60px 20px !important;
    }
</style>
@endpush

<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="sec-heading text-center">

                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-slider owl-carousel">

                            @foreach ($teams as $team)
                                <div class="single-box text-center">
                                    <div class="img-area"><img alt="" style="height: 220px;" class="img-fluid move-animation" src="{{ asset('image/team/' . $team->image) }}"></div>
                                    <div class="info-area">
                                        <h4>{{$team->name}}</h4>
                                        <p>{!!$team->details!!}.</p>
                                    </div>
                                </div>
                            @endforeach


                        <div class="single-box text-center">
                            <div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/vmCM14qL/2.png"></div>
                            <div class="info-area">
                                <h4>Person's Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
                            </div>
                        </div>
                        <div class="single-box text-center">
                            <div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/TYTxWM9S/3.png"></div>
                            <div class="info-area">
                                <h4>Person's Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
                            </div>
                        </div>
                        <div class="single-box text-center">
                            <div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/593GTHB7/4.png"></div>
                            <div class="info-area">
                                <h4>Person's Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
                            </div>
                        </div>
                        <div class="single-box text-center">
                            <div class="img-area"><img alt="" class="img-fluid move-animation" src="https://i.postimg.cc/tJCrp53r/5.png"></div>
                            <div class="info-area">
                                <h4>Person's Name</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, ullam.</p><a href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
