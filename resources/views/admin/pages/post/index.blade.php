@extends('admin.dashboard.master')

@section('title', 'Post')

@push('css')

    {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css" rel="stylesheet"> --}}


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
            <li class="breadcrumb-item active">Post</li>
            <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white" href="{{ route('admin.post.create') }}">
                <i class="fa fa-plus"></i> Create
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

       <div class="row">
           <div class="col-12 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table border mb-0" id="table">
                                    <thead class="table-light fw-semibold">
                                        <tr class="align-middle table">
                                            <th width="1%">#</th>
                                            <th width="50%">Name</th>
                                            <th width="24%">Category</th>
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
       </div>
   <div class="mb-5"></div>
</div>

@endsection
@push('script')

    
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>

        $(document).ready(function () {
            var searchable = [];
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });
            var dTable = $('#table').DataTable({
                order: [],
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
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
                    url: "{{route('admin.post.index')}}",
                    type: "get"
                },
                columns: [
                    {data: "DT_RowIndex",      name: "DT_RowIndex",       orderable: false,  searchable: false},
                    {data: 'title',             name: 'title',              orderable: true,   searchable: true},
                    {data: 'category',             name: 'category', orderable: true,   searchable: true},
                    {data: 'status',           name: 'status'},
                    //only those have manage_user permission will get access

                    {data: 'action', name: 'action', orderable: false, searchable: false}
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
            var url = '{{ route("admin.post.destroy",":id") }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                success: function (resp) {
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
                error: function (error) {
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
            var url = '{{ route("admin.post.update.status",":id") }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function (resp) {
                   // Reloade DataTable
                    $('#table').DataTable().ajax.reload();
                    if(resp == "active"){
                        toastr.success('This status has been changed to Publish.');
                        return false;
                    }else{
                        toastr.error('This status has been changed to Un Publish.');
                        return false;
                    }
                }, // success end
                error: function (error) {
                   // location.reload();
                } // Error
            })
        }
    </script>
@endpush
