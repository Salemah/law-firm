@extends('frontend.user.master')
@section('content')
 <section class="content">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center justify-content-between">
            </div>
        </div>
        <div class="az-content az-content-dashboard">
            <div class="container">
                <div class="az-content-body">
                    <div class="main-body">

                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                        <!-- /Breadcrumb -->

                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                                class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4>{{ $user->name }}</h4>
                                                <p class="text-secondary mb-1">{{ $user->email }}</p>
                                                <p class="text-muted font-size-sm">{{ $user->address }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->phone }}
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Mobile</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->phone }}
                                            </div>
                                        </div>
                                        <hr> --}}
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                {{ $user->address }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a class="btn btn-info " target="__blank"
                                                    href="{{ route('user.profile.edit') }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
  </section>
@endsection
@section('script')
    <script>
        // new DataTable('#example');
        $('#example').DataTable({
            processing: true,
            responsive: true,
            serverSide: false,

        });
    </script>
@endsection
