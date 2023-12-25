@extends('frontend.user.master')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, {{ Auth::user()->name }}</h2>
                        <p class="az-dashboard-text">Payment Option</p>
                    </div>

                </div><!-- az-dashboard-one-title -->
                <div class="row row-sm mg-b-20 mg-lg-b-0">
                    <div class="col-lg-12 col-xl-12 mg-t-20 mg-lg-t-0">
                        <div class="card card-table-one">
                            <h6 class="card-title">Payment Option</h6>
                            {{-- <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric
                                had been calculated, so the old users metric is displayed.</p> --}}
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Account</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Branch</th>
                                            <th class="text-center">Routing No</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as  $key=>$appointment)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $appointment->name }}</td>
                                                <td class="text-center">{{ $appointment->account_no }}</td>
                                                <td class="text-center">{{ $appointment->type }}</td>
                                                <td class="text-center">{{ $appointment->branch }}</td>
                                                <td class="text-center">
                                                    {{ $appointment->routing_no }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger text-white" style="cursor:pointer"
                                                        type="submit" onclick="showDeleteConfirm({{ $appointment->id }})"
                                                        title="Delete">Payment Now</a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No Option Available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div><!-- table-responsive -->
                        </div><!-- card -->
                    </div><!-- col-lg -->

                </div><!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        // new DataTable('#example');
        $('#example').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,

        });
        // delete Confirm
        function showDeleteConfirm(id) {
            //event.preventDefault();


            $('#exampleModal').modal('show')
        //     swal({
        //         title: `Are you sure you want to delete this record?`,
        //         text: "If you delete this, it will be gone forever.",
        //         buttons: true,
        //         dangerMode: true,
        //     }).then((willDelete) => {
        //         if (willDelete) {
        //             deleteItem(id);
        //         }
        //     });
         };

        // Delete Button
        function deleteItem(id) {
            var url = '{{ route('my.appointment.delete', ':id') }}';
            $.ajax({
                type: "get",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    // Reloade DataTable
                    location.reload();
                    $('#example').DataTable().ajax.reload();
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
    </script>
@endsection
