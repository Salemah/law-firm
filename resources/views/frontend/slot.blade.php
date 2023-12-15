@extends('frontend.master')

@section('title', 'Appointment Shedule')
@push('script')
@endpush
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
                                        data-id="{{ $team->id }}" id="appointment-modal"
                                        title="Click To Appoinment">{{ Carbon\Carbon::parse($team->from_time)->format('g:i A') }}</button>
                                </div>
                            @endforeach

                        </div>
                        <div>

                        </div>

                    </div>
                @endforeach
                <!-- Team Block -->



            </div>
        </div>
    </section>
    <!-- End Team Section -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="branch_insert_update" accept-charset="utf-8" enctype="multipart/form-data" method="post"
                class="form-horizontal validatable">
                @csrf
                <div class="modal-content">
                    <div class="modal-header " style="background-color: #E1A122;color:white;">
                        <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="slot_id" id="slot_id">
                        <input type="hidden" name="team_id" id="team_id">
                        <div class="row">
                            <div class="col-12 text-center " style="color: black;font-weight:bold;">
                                <p>CONSULTANT : <span id="team-name"></span></p>
                            </div>
                            <div class="col-6 text-center">
                                <p> DAY : <span id="day" class="text-primary"></span></p>
                            </div>
                            <div class="col-6 text-center">
                                <p> TIME : <span id="time" class="text-primary"></span></p>
                            </div>
                            <div class="col-12 form-group">
                                <textarea rows="4" name="message" class="form-control" placeholder="Message" style="border:1px solid black"></textarea>
                                <span class="text-danger" id="msg-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitForm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
        });
    </script>
    <script>
        $(".appointment-modal").click(function() {
            let Id = $(this).data('id');
            // $('#hidden-id').removeAttr("disabled");
            // $('#hidden-id').val(Id);

            $.ajax({
                type: "GET",
                url: "{{ route('home.slot.data') }}",
                dataType: 'json',
                data: {
                    "id": Id
                },
                success: function(resp) {
                  if(resp.status=='error'){
                     Swal.fire(
                            'Sorry',
                            'Sheduled Is Booked',
                            'error'
                        )
                  }
                  else{
                    $('#team-name').html(resp.data.team.name);
                    $('#slot_id').val(resp.data.id);
                    $('#team_id').val(resp.data.team_id);
                    $('#day').html(resp.data.day);
                    $('#time').html(resp.time);
                    // Reloade DataTable
                    $('#exampleModal').modal('show');}
                }, // success end
                error: function(error) {
                     location.reload();

                } // Error
            })

            // data-toggle="modal" data-target="#exampleModal"
        });

        $('body').on('click', '#submitForm', function() {
            var signupForm = $("#branch_insert_update");
            var formData = signupForm.serialize();
            $('#msg-errorr').html("");
            var url = '{{ route('appointment.save') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {

                    if (data.success) {
                        $('#exampleModal').modal('hide');
                        Swal.fire(
                            'Congratulations',
                            'Your Appointment Completed',
                            'success'
                        )
                    }
                },
                error: function(error) {
                    var obj = {
                        "message": "The message field is required.",
                        "errors": {
                            "message": ["The message field is required."]
                        }
                    };
                    var tt = obj[Object.keys(obj)[0]];
                    $('#msg-error').html(tt);

                }
            });
        });
    </script>
@endsection


