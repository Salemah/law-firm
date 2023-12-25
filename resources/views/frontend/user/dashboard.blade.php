@extends('frontend.user.master')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, {{ Auth::user()->name }}</h2>
                        <p class="az-dashboard-text">Your web analytics Report.</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>Total Appointment</label>
                                <h6>{{ count($appointments) }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Pending Appointment</label>
                                <h6>{{ count($appointments->where('status', 'Pending')) }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Payment Pending Appointment</label>
                                <h6>{{ count($appointments->where('payment', '')) }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>Cancel Appointment</label>
                                <h6>{{ count($appointments->where('status', 'PCancel')) }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        {{-- <a href="#" class="btn btn-purple">Export</a> --}}
                    </div>
                </div><!-- az-dashboard-one-title -->







                <div class="row row-sm mg-b-20 mg-lg-b-0">

                    <div class="col-lg-12 col-xl-12 mg-t-20 mg-lg-t-0">
                        <div class="card card-table-one">
                            <h6 class="card-title">Appointment Data</h6>
                            {{-- <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric
                                had been calculated, so the old users metric is displayed.</p> --}}
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th >Sl</th>
                                            <th class="text-center">Consultant</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Payment</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($appointments as  $key=>$appointment)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $appointment->Team->name }}</td>
                                                <td class="text-center">{{ Carbon\Carbon::parse($appointment->Slot->from_time)->format('g:i A') }}</td>
                                                <td class="text-center">{{ Carbon\Carbon::parse($appointment->date)->format('d/m/y') }}</td>
                                                <td class="text-center">{{ $appointment->status }}</td>
                                                <td class="text-center">
                                                    @if ($appointment->payment)
                                                        <span>Paid</span>
                                                    @else
                                                        <strong style="color: red">DUE</strong>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger text-white" style="cursor:pointer" type="submit" onclick="showDeleteConfirm({{ $appointment->id }})" title="Delete"><i class="fa fa-trash"></i></a>
                                                    <a class="btn btn-sm btn-primary text-white" href="{{route('my.payment.option')}}" style="cursor:pointer" title="Payment"><i class="fa fa-money-bill mr-2"></i>Payment</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No Appointment Available</td>

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
            var url = '{{ route("my.appointment.delete",":id") }}';
            $.ajax({
                type: "get",
                url: url.replace(':id', id),
                success: function (resp) {
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
                error: function (error) {
                    // location.reload();
                } // Error
            })
        }
    </script>
@endsection
