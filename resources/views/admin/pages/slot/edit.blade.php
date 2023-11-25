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

        <form action="{{ route('admin.slot.update',$category->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
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
                                            <option value="{{ $team->id }}"
                                                @if ($category->team_id == $team->id) selected @endif>
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

                                    <label for="{{$category->day}}"> {{$category->day}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" value="{{$category->from_time}}" class="{{$category->day}}" name="from_time" />


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
@push('script')
    <script>
        $(document).ready(function() {
            var satutday = $("#satutdayRow");
            var satutdayx = 0;

            var sunday = $("#sundayRow");
            var sundayx = 0;

            var monday = $("#mondayRow");
            var mondayx = 0;

            var tuesday = $("#tuesdayRow");
            var tuesdayx = 0;

            var wednesday = $("#wednesdayRow");
            var wednesdayx = 0;

            var thursday = $("#thursdayRow");
            var thursdayx = 0;

            var friday = $("#fridayRow");
            var fridayx = 0;
            $("#add_document").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                satutdayx++;
                $(satutday).append('<div class="row mt-2 document-table-tr" id="document-table-tr-' +
                    satutdayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Saturday" name="from_time_saturday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentRemove(' +
                    satutdayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_sunday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                sundayx++;
                $(sunday).append('<div class="row mt-2 document-sunday-tr" id="document-sunday-tr-' +
                    satutdayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Sunday" name="from_time_sunday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentSundayRemove(' +
                    sundayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_monday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                mondayx++;
                $(monday).append('<div class="row mt-2 document-monday-tr" id="document-monday-tr-' +
                    mondayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Monday" name="from_time_monday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentmondayRemove(' +
                    mondayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_tuesday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                tuesdayx++;
                $(tuesday).append('<div class="row mt-2 document-tuesday-tr" id="document-tuesday-tr-' +
                    tuesdayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Tuesday" name="from_time_tuesday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentTuesdayRemove(' +
                    tuesdayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_wednesday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                wednesdayx++;
                $(wednesday).append(
                    '<div class="row mt-2 document-wednesday-tr" id="document-wednesday-tr-' +
                    wednesdayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Wednesday" name="from_time_wednesday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentWednesdayRemove(' +
                    wednesdayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_thursday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                thursdayx++;
                $(thursday).append('<div class="row mt-2 document-thursday-tr" id="document-thursday-tr-' +
                    thursdayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  thursday" name="from_time_thursday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentThursdayRemove(' +
                    thursdayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
            $("#add_friday").click(function() {
                let rowId = $(this).attr("ids");
                let dayName = $(this).attr("dayname");
                fridayx++;
                $(friday).append('<div class="row mt-2 document-friday-tr" id="document-friday-tr-' +
                    fridayx +
                    '">' +
                    '<div class="col-md-5 document">' +
                    ' <div class="form-group">' +
                    '<input type="time" class="form-control  Friday" name="from_time_friday[]" />' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-sm-1 ">' +
                    '<button type="button"  class=" btn btn-sm btn-danger " onclick="documentFridayRemove(' +
                    fridayx + ')">' +
                    'X' +
                    '</button>' +
                    '</div>' +
                    '</div>');
            });
        });


        function documentRemove(id) {
            $('#document-table-tr-' + id).remove();
        }

        function documentSundayRemove(id) {
            $('#document-sunday-tr-' + id).remove();
        }

        function documentmondayRemove(id) {
            $('#document-monday-tr-' + id).remove();
        }

        function documentTuesdayRemove(id) {
            $('#document-tuesday-tr-' + id).remove();
        }

        function documentWednesdayRemove(id) {
            $('#document-wednesday-tr-' + id).remove();
        }

        function documentThursdayRemove(id) {
            $('#document-thursday-tr-' + id).remove();
        }

        function documentFridayRemove(id) {
            $('#document-friday-tr-' + id).remove();
        }
    </script>
@endpush
