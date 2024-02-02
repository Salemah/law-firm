@extends('admin.dashboard.master')

@section('title', 'Dashboard')



<!-- Content Wrapper. Contains page content -->
@section('breadcumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-3 ">
                    <div class="card bg-primary" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total Post</span>
                                    <span>Visitors Over Time</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-md-3 ">
                    <div class="card bg-warning" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total Post</span>
                                    <span>Visitors Over Time</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-md-3 ">
                    <div class="card bg-info" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total Post</span>
                                    <span>Visitors Over Time</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-md-3 ">
                    <div class="card bg-danger" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total Post</span>
                                    <span>Visitors Over Time</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6 col-md-3 ">
                    <div class="card bg-success" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total Post</span>
                                    <span>Visitors Over Time</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table border mb-0" id="APTtable">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle table">
                                            <th width="1%">#</th>

                                            <th class="">Client</th>
                                            <th class="">Consultant</th>
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
                <div class="col-12 col-md-6">
                    <div class="card mb-4"
                        style="box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">

                        <div class="card-body">
                            <h3 class="text-info">Case List</h3>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table border mb-0" id="table">
                                        <thead class="table-light fw-semibold bg-primary">
                                            <tr class="align-middle table">
                                                <th width="1%">#</th>
                                                <th width="50%">Name</th>
                                                <th width="24%">Legal Area</th>
                                                <th width="15%">Status</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mb-4"
                        style="box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
                        <div class="card-body">
                            <h3 class="text-info">Post List</h3>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table border mb-0" id="postTable">
                                        <thead class="table-light fw-semibold bg-info">
                                            <tr class="align-middle table">
                                                <th width="1%">#</th>
                                                <th width="50%">Name</th>
                                                <th width="24%">Category</th>
                                                {{-- <th width="15%">Status</th> --}}
                                                {{-- <th width="10%">Action</th> --}}
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->
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
              var dTable = $('#APTtable').DataTable({
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
                    type: "get"
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
                        data: 'team',
                        name: 'team',
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
                    url: "{{ route('admin.case.index') }}",
                    type: "get"
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
                        data: 'category',
                        name: 'category',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'status',
                        name: 'status'
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
            var dTable = $('#postTable').DataTable({
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
                    url: "{{ route('admin.post.index') }}",
                    type: "get"
                },
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'category',
                        name: 'category',
                        orderable: true,
                        searchable: true
                    },
                    // {data: 'status',           name: 'status'},
                    //only those have manage_user permission will get access

                    // {data: 'action', name: 'action', orderable: false, searchable: false}
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
            var url = '{{ route('admin.case.destroy', ':id') }}';
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
                    //location.reload();
                } // Error
            })
        }

        // Status Change Confirm Alert
        function showStatusChangeAlert(id) {
            event.preventDefault();
            swal({
                title: `Are you sure?`,
                text: "You want to update the status?.",
                buttons: true,
                infoMode: true,
            }).then((willStatusChange) => {
                if (willStatusChange) {
                    statusChange(id);
                }
            });
        };

        // Status Change
        function statusChange(id) {
            var url = '{{ route('admin.case.update.status', ':id') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    // Reloade DataTable
                    $('#table').DataTable().ajax.reload();
                    if (resp == "active") {
                        toastr.success('This status has been changed to Publish.');
                        return false;
                    } else {
                        toastr.error('This status has been changed to Un Publish.');
                        return false;
                    }
                }, // success end
                error: function(error) {
                    // location.reload();
                } // Error
            })
        }
    </script>
@endpush
