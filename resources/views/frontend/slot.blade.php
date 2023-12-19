@extends('frontend.master')

@section('title', 'Appointment Shedule')
@section('css')
    <style>
        .wrapper {
            /* max-width: 18rem;
                        padding: 0 0.5rem;
                        margin-left: auto;
                        margin-right: auto;
                        padding-top: 4rem; */
        }

        .wrapper label {
            font-size: 0.75rem;
            font-weight: 400;
            display: block;
            margin-bottom: 0.5rem;
            color: #000000;
            border: 1px solid #d98a02;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
        }

        input {
            font-family: 'Roboto', sans-serif;
            display: block;
            border: none;
            border-radius: 0.25rem;
            border: 1px solid transparent;
            line-height: 1.5rem;
            padding: 0;
            font-size: 1rem;
            color: #607D8B;
            width: 100%;
            margin-top: 0.5rem;
        }

        input:focus {
            outline: none;
        }

        #ui-datepicker-div {
            display: none;
            background-color: #fff;
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
            margin-top: 0.25rem;
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .ui-datepicker-calendar thead th {
            padding: 0.25rem 0;
            text-align: center;
            font-size: 0.75rem;
            font-weight: 400;
            color: #78909C;
        }

        .ui-datepicker-calendar tbody td {
            width: 2.5rem;
            text-align: center;
            padding: 0;
        }

        .ui-datepicker-calendar tbody td a {
            display: block;
            border-radius: 0.25rem;
            line-height: 2rem;
            transition: 0.3s all;
            color: #546E7A;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .ui-datepicker-calendar tbody td a:hover {
            background-color: #E0F2F1;
        }

        .ui-datepicker-calendar tbody td a.ui-state-active {
            background-color: #009688;
            color: white;
        }

        .ui-datepicker-header a.ui-corner-all {
            cursor: pointer;
            position: absolute;
            top: 0;
            width: 2rem;
            height: 2rem;
            margin: 0.5rem;
            border-radius: 0.25rem;
            transition: 0.3s all;
        }

        .ui-datepicker-header a.ui-corner-all:hover {
            background-color: #ECEFF1;
        }

        .ui-datepicker-header a.ui-datepicker-prev {
            left: 0;
            background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
            background-repeat: no-repeat;
            background-size: 0.5rem;
            background-position: 50%;
            transform: rotate(180deg);
        }

        .ui-datepicker-header a.ui-datepicker-next {
            right: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
            background-repeat: no-repeat;
            background-size: 10px;
            background-position: 50%;
        }

        .ui-datepicker-header a>span {
            display: none;
        }

        .ui-datepicker-title {
            text-align: center;
            line-height: 2rem;
            margin-bottom: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            padding-bottom: 0.25rem;
        }

        .ui-datepicker-week-col {
            color: #78909C;
            font-weight: 400;
            font-size: 0.75rem;
        }
    </style>
@endsection
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
    <section class="team-section" style="background-image: url({{URL::asset('frontend/images/background/pattern-2.png')}})">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <img class="mt-1" style="width: 30vh; border-radius:20px" src="{{ URL::asset('/image/team/' . $team->image) }}" alt="{{ $team->image }}" />
                <h2>{{ $team->name }}</h2>

            </div>
              <section class="team-section my-2">
        <div class="auto-container">

        </div>
    </section>
            <input type="hidden" value="{{ $team->id }}" name="team_id" id="team_id">
            <div class="row ">
                {{-- @foreach ($orders as $day => $teams)
                    <div class="team-block col-3">
                        <div>
                            <h4 class="mb-2"> <b>{{ $day }}</b></h4>
                            @foreach ($teams as $team)
                                <div class="">
                                    <button class="btn btn-sm btn-success my-2 appointment-modal"
                                        data-id="{{ $team->id }}" id="appointment-modal" title="Click To Appoinment"
                                        @php
                                                $formattedDate = ''; @endphp
                                        @foreach ($appointments as $appointment)
                                         @php
                                              $currentDate = Carbon\Carbon::now();

                                                // Find the next occurrence of the specified day name
                                                $nextDate = $currentDate->next($team->day);

                                                // If the next occurrence is today and it has already passed, get the occurrence for next week
                                                if ($nextDate->isPast()) {
                                                    $nextDate = $currentDate->next($team->day);
                                                }

                                                // Format the date as per your requirements
                                                $formattedDate = $nextDate->format('d-m-Y');
                                         @endphp
                                         @if ($appointment->date == $formattedDate && $team->from_time == $appointment->time)
                                             disabled
                                         @endif @endforeach>

                                        {{ Carbon\Carbon::parse($team->from_time)->format('g:i A') }}
                                        {{ $formattedDate }}</button>
                                </div>
                            @endforeach
                        </div>
                        <div>
                        </div>
                    </div>
                @endforeach --}}
                <!-- Team Block -->
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="col-8">
                         <label style="color:black">Select Date</label>
                        <div class="wrapper">
                            <label for="datepicker" id="label ">Click here to Pick a Date
                                <input type="text" id="datepicker" autocomplete="off">
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn " style="background: #E1A122" id="submitFormm">Search</button>
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="row p-1" id="tst">

                    </div>

                </div>



            </div>
        </div>
    </section>
    <section class="team-section my-5">
        <div class="auto-container">

        </div>
    </section>
    <!-- End Team Section -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="hidden" name="slot_id" id="slot_id">
                        <input type="hidden" name="team_idd" id="team_idd">
                        <input type="hidden" name="aptDate" id="aptDate">
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
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
        });

        $('body').on('click', '#submitFormm', function() {
            var date = $("#datepicker").datepicker({
                dateFormat: 'dd,MM,yyyy'
            }).val();
            var teamId = $("#team_id").val();
            var url = '{{ route('home.appointment.check') }}';
            var appendString = "";
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    "date": date,
                    "teamId": teamId
                },
                success: function(obj) {
                    if (obj.data.length == 0) {
                        Swal.fire(
                            'Sorry',
                            'No Shedule Available',
                            'warning'
                        );
                    } else {
                        for (var i = 0; i < obj.data.length; i++) {
                            var pp = new Date('7/10/2013 ' + obj.data[i].from_time).toLocaleTimeString()
                                .replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
                            console.log();
                            appendString += '<div class="col-4 col-sm-6">' +
                                '<button class="btn my-2 appointment-modal" style="background: #E1A122"' +
                                'data-id="' + obj.data[i].id +'"'+
                                'data-apt="' + obj.aptDate +'"'+
                                'id="appointment-modal" title="Click To Appoinment">' + pp +
                                '</button>' +
                                '</div>';
                        }
                    }
                    $('#tst').empty().append(appendString);
                },
                error: function(error) {}
            });

        });
         $('body').on('click', '.appointment-modal', function() {
            let Id = $(this).data('id');
            let aptDates = $(this).data('apt');
            $.ajax({
                type: "GET",
                url: "{{ route('home.slot.data') }}",
                dataType: 'json',
                data: {
                    "id": Id,
                    "aptDate": aptDates,

                },
                success: function(resp) {
                    if (resp.status == 'error') {
                        Swal.fire(
                            'Sorry',
                            'Sheduled Is Booked',
                            'error'
                        );
                         $('#tst').empty();
                    } else {
                        $('#team-name').html(resp.data.team.name);
                        $('#slot_id').val(resp.data.id);
                        $('#team_idd').val(resp.data.team_id);
                        $('#day').html(resp.data.day);
                        $('#time').html(resp.time);
                        $('#aptDate').val(aptDates);
                        // Reloade DataTable
                        $('#exampleModal').modal('show');
                    }
                }, // success end
                error: function(error) {
                    location.reload();

                } // Error
            })

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
        // $("#appointment-modal").click(function() {


        //     // data-toggle="modal" data-target="#exampleModal"
        // });

    </script>
@endsection
