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
                            <h4 class="mb-2"> <b>{{ $day }}</b></h4>
                            @foreach ($teams as $team)
                                <div class=""><button class="btn btn-sm btn-success my-2 appointment-modal"
                                        data-id="{{ $team->id }}"
                                        id="appointment-modal"
                                        title="Click To Appoinment">{{ Carbon\Carbon::parse($team->from_time)->format('g:i A') }}</button>
                                </div>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header " style="background-color: #E1A122;color:white;">
                    <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="row">
                    <div class="col-12 text-center " style="color: black;font-weight:bold;">
                        <p >CONSULTANT : <span id="team-name"></span></p>
                    </div>
                    <div class="col-6">
                        <p > DAY : <span id="day"  class="text-primary"></span></p>
                    </div>
                    <div class="col-6">
                        <p > TIME : <span id="time" class="text-primary"></span></p>
                    </div>
                     <div class="col-12 form-group">
                                    <textarea rows="4" name="message" class="form-control"  placeholder="Message" style="border:1px solid black"></textarea>
                                </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script>
        $(".appointment-modal").click(function() {
            let Id = $(this).data('id');
			// $('#hidden-id').removeAttr("disabled");
			// $('#hidden-id').val(Id);

             $.ajax({
                type: "GET",
                url: "{{route('home.slot.data')}}",
                dataType: 'json',
                data: { "id": Id },
                success: function (resp) {
                    console.log(resp.data.team.name);

                    $('#team-name').html(resp.data.team.name);
                    $('#day').html(resp.data.day);
                    $('#time').html(resp.time);
                   // Reloade DataTable
                    $('#exampleModal').modal('show');
                }, // success end
                error: function (error) {
                    location.reload();
                } // Error
            })

            // data-toggle="modal" data-target="#exampleModal"
        });
    </script>
@endsection
