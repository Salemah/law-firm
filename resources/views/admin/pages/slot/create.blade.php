@extends('admin.dashboard.master')

@section('title', 'Slot')

@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
@endpush

@section('breadcumb')

    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slot</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slot</li>
                        <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white"
                                href="{{ route('admin.slot.index') }}">
                                <i class="fas fa-arrow-left"></i> back
                            </a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection

@section('content')
    <div class="">
        <!-- Alert -->
        @include('admin.dashboard.layouts.partials.alert')

        <form action="{{ route('admin.slot.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 my-4">
                                    <h1>Select Time</h1>
                                </div>

                                <div class="form-group col-12 mb-4">
                                    <label for="team_id"><b>User</b><span class="text-danger">*</span></label>
                                    <select name="team_id" id="team_id"
                                        class="custom-select @error('team_id') is-invalid @enderror">
                                        <option>--Select User--</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}">
                                                {{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('team_id')
                                        <span class="alert text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Saturday" name="days[1]" value="Saturday">
                                    <label for="Saturday"> Saturday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Saturday" name="from_time[1]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Sunday" name="days[2]" value="Sunday">
                                    <label for="Sunday"> Sunday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Sunday" name="from_time[2]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Monday" name="days[3]" value="Monday">
                                    <label for="Monday"> Monday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Monday" name="from_time[3]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Tuesday" name="days[4]" value="Tuesday">
                                    <label for="Tuesday"> Tuesday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Tuesday" name="from_time[4]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Wednesday" name="days[5]" value="Wednesday">
                                    <label for="Wednesday"> Wednesday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Wednesday" name="from_time[5]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Thursday" name="days[6]" value="Thursday">
                                    <label for="Thursday"> Thursday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Thursday" name="from_time[6]" />
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" id="Friday" name="days[7]" value="Friday">
                                    <label for="Friday"> Friday</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="Friday" name="from_time[7]" />
                                </div>




                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mb-5"></div>
    </div>

@endsection
