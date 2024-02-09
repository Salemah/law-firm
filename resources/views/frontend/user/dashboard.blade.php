@extends('frontend.user.master')
@section('css')
    <style>
        .pull-up {
            min-height: 120px !important;
        }

        .text-uppercase {

            color: blue;
        }
    </style>
@endsection
@section('content')
    <section class="content">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center justify-content-between">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-12">
                <div class="box box-body pb-10 bl-4 border-info pull-up">
                    <h6 class="text-uppercase">Total Appointment</h6>
                    <div class="d-flex justify-content-between">
                        <span class=" font-size-30">{{ count($appointments) }}</span>
                        <span class="font-size-30 text-info mdi mdi-city"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="box box-body pb-10 bl-4 border-primary pull-up">
                    <h6 class="text-uppercase">Pending Appointment</h6>
                    <div class="d-flex justify-content-between">
                        <span class=" font-size-30">{{ count($appointments->where('status', 'Pending')) }}</span>
                        <span class="font-size-30 text-primary mdi mdi-seal"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="box box-body pb-10 bl-4 border-danger pull-up">
                    <h6 class="text-uppercase">Payment Pending Appointment</h6>
                    <div class="d-flex justify-content-between">
                        <span class=" font-size-30">{{ count($appointments->where('payment', '')) }}</span>
                        <span class="font-size-30 text-danger mdi mdi-city"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="box box-body pb-10 bl-4 border-warning pull-up">
                    <h6 class="text-uppercase">Cancel Appointment</h6>
                    <div class="d-flex justify-content-between">
                        <span class=" font-size-30">{{ count($appointments->where('status', 'PCancel')) }}</span>
                        <span class="font-size-30 text-warning mdi mdi-home"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Appointment Data</h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
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
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($appointment->Slot->from_time)->format('g:i A') }}
                                            </td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($appointment->date)->format('d/m/y') }}</td>
                                            <td class="text-center">{{ $appointment->status }}</td>
                                            <td class="text-center">
                                                @if ($appointment->payment)
                                                    <span>Paid</span>
                                                @else
                                                    <strong style="color: red">DUE</strong>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-danger text-white" style="cursor:pointer"
                                                    type="submit" onclick="showDeleteConfirm({{ $appointment->id }})"
                                                    title="Delete"><i class="fa fa-trash"></i></a>
                                                <a class="btn btn-sm btn-primary text-white"
                                                    href="{{ route('my.payment.option') }}" style="cursor:pointer"
                                                    title="Payment"><i class="fa fa-money-bill mr-2"></i>Payment</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Appointment Available</td>

                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Daily Inquery</h4>
                    </div>
                    <div class="box-body">
                        <div id="flotPie2" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Booking Status</h4>
                    </div>
                    <div class="box-body">
                        <div id="bookingstatus"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Revenue</h4>
                    </div>
                    <div class="box-body">
                        <div id="revenue"></div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="box card-inverse bg-img"
                    style="background-image: url({{ asset('userf/images/gallery/full/2.jpg') }}); padding-top: 275px">
                    <div class="flexbox align-items-center px-20" data-overlay="4">
                        <div class="flexbox align-items-center mr-auto">
                            <a href="#">
                                <img class="avatar avatar-xl avatar-bordered"
                                    src="{{ asset('userf/images/avatar/4.jpg') }}" alt="">
                            </a>
                            <div class="pl-10 d-none d-md-block">
                                <h5 class="mb-0"><a class="hover-primary text-white" href="#">Roben Clark</a>
                                </h5>
                                <span>Agent of Property</span>
                            </div>
                        </div>

                        <ul class="flexbox flex-justified text-center py-20">
                            <li class="px-10">
                                <span class="opacity-60">Inquery</span><br>
                                <span class="font-size-20">9.6K</span>
                            </li>
                            <li class="px-10">
                                <span class="opacity-60">Sold</span><br>
                                <span class="font-size-20">9845</span>
                            </li>
                            <li class="pl-10">
                                <span class="opacity-60">Tweets</span><br>
                                <span class="font-size-20">8456</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Recent Properties</h4>
                    </div>
                    <div class="box-body p-0">
                        <div class="media-list media-list-hover media-list-divided">

                            <a class="media media-single" href="#">
                                <img class="w-80 rounded" src="{{ asset('userf/images/gallery/thumb-sm/1.jpg') }}"
                                    alt="...">
                                <div class="media-body">
                                    <h6>4 BHK Diva Street, Sea View</h6>
                                    <small class="text-fader">By Johen</small>
                                </div>
                            </a>

                            <a class="media media-single" href="#">
                                <img class="w-80 rounded" src="{{ asset('userf/images/gallery/thumb-sm/2.jpg') }}"
                                    alt="...">
                                <div class="media-body">
                                    <h6>2 BHK Pilo Street, Moon View</h6>
                                    <small class="text-fader">By Mical</small>
                                </div>
                            </a>

                            <a class="media media-single" href="#">
                                <img class="w-80 rounded" src="{{ asset('userf/images/gallery/thumb-sm/3.jpg') }}"
                                    alt="...">
                                <div class="media-body">
                                    <h6>5 BHK Jeksan Street, Sky View</h6>
                                    <small class="text-fader">By Klasan</small>
                                </div>
                            </a>

                            <a class="media media-single" href="#">
                                <img class="w-80 rounded" src="{{ asset('userf/images/gallery/thumb-sm/4.jpg') }}"
                                    alt="...">
                                <div class="media-body">
                                    <h6>1 BHK Moon Street, Mountain View</h6>
                                    <small class="text-fader">By Smith</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center bt-3 border-light p-2">
                        <a class="text-uppercase d-block font-size-14" href="#">See all recent
                            posts</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-12">

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Quick Email</h4>
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div>
                                <textarea class="textarea b-1 p-10 w-p100" placeholder="Message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="float-right btn btn-primary" id="sendEmail"> Send
                            <i class="fa fa-paper-plane-o"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
