@extends('admin.dashboard.master')

@section('title', 'Appointment')

@push('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        #table_filter,
        #table_paginate {
            float: right;
        }

        .dataTable {
            width: 100% !important;
            margin-bottom: 20px !important;
        }

        .table-responsive {
            overflow-x: hidden !important;
        }
    </style>
@endpush

@section('breadcumb')

    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Appoitnment</li>
                        {{-- <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white"
                                href="{{ route('admin.case.create') }}">
                                <i class="fa fa-plus"></i> Create
                            </a></li> --}}
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

        <div class="row">
            <div class="form-group col-6 col-sm-4 col-md-4 mb-2">
                <label for="consultant"><b>Select Consultant</b><span class="text-danger">*</span></label>
                <select name="consultant" id="consultant" class="custom-select ">
                    <option value="">--Select Consultant--</option>

                </select>

            </div>
            <div class="col-12 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table border mb-0" id="table">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle table">
                                            <th width="1%">#</th>

                                            <th class="">Client</th>
                                            <th class="">Time</th>
                                            <th class="">Date</th>
                                            <th class="">Status</th>
                                            <th class="">Meet</th>

                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5"></div>
    </div>

@endsection
@push('script')
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(document).ready(function() {

            var searchable = [];
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            var consultant = $("#consultant").val();
            var dTable = $('#table').DataTable({
                order: [],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                processing: true,
                responsive: true,
                serverSide: true,
                language: {
                    processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
                },
                scroller: {
                    loadingIndicator: false
                },
                pagingType: "full_numbers",
                // dom: "<'row'<'col-sm-2'l><'col-sm-7 text-center'B><'col-sm-3'f>>tipr",
                ajax: {
                    url: "{{ route('admin.team-appointment.index') }}",
                    type: "get",
                     data:{
                            'consultant':consultant,
                         }
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'time',
                        name: 'time',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'date',
                        name: 'date',
                        orderable: true,
                        searchable: true
                    },

                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'meet',
                        name: 'meet',
                        orderable: false,
                        searchable: false
                    },
                    //only those have manage_user permission will get access

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });
        });

        // delete Confirm
        function showDeleteConfirm(id) {
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    deleteItem(id);
                }
            });
        };

        // Delete Button
        function deleteItem(id) {
            var url = '{{ route('admin.team-appointment.destroy', ':id') }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    // Reloade DataTable
                    $('#table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        toastr.success(resp.message);
                    } else if (resp.errors) {
                        toastr.error(resp.errors[0]);
                    } else {
                        toastr.error(resp.message);
                    }
                }, // success end
                error: function(error) {
                    // location.reload();
                } // Error
            })
        }
        $('#consultant').select2({
            ajax: {
                url: '{{ route('admin.team.search') }}',
                dataType: 'json',
                type: "POST",
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function(data) {
                    console.log();
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                value: item.id,
                                id: item.id,
                            }
                        })
                    };
                }
            }
        });
         $(document).on('change', '#consultant', function() {

                $('#table').DataTable().draw(true);
                 alert($("#consultant").val());
            });
    </script>
@endpush
