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
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="text-light">Hi, {{ Auth::user()->name }}</h2>
                        <p class="text-light">Welcome To Your Pofile</p>
                    </div>

                </div><!-- az-dashboard-one-title -->







                <div class="row row-sm mg-b-20 mg-lg-b-0">

                    <div class="col-lg-12 col-xl-12 mg-t-20 mg-lg-t-0">
                        <div class="card card-table-one">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="container rounded bg-white mt-5 mb-5">
                                <form method="POST" action="{{ route('user.update') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-3 border-right">
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                                    class="rounded-circle mt-5" width="150px"
                                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                                    class="font-weight-bold">{{ Auth::user()->name }}</span><span
                                                    class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
                                            </div>
                                        </div>
                                        <div class="col-md-9 border-right">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Profile Settings</h4>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-12"><label class="labels">Name</label><input
                                                            type="text" class="form-control" name="name"
                                                            placeholder="Name" value="{{ Auth::user()->name }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input
                                                            type="number" class="form-control" name="phone"
                                                            placeholder="enter phone number"
                                                            value="{{ Auth::user()->phone }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12"><label class="labels">Address</label><input
                                                            type="text" class="form-control" name="address"
                                                            placeholder="enter address line 1"
                                                            value="{{ Auth::user()->address }}">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Email</label><input type="email"
                                                            class="form-control" name="email" placeholder="enter email id"
                                                            value="{{ Auth::user()->email }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-md-12">
                                                        <label class="labels">Password</label>
                                                        <span class="fa fa-lock"></span>
                                                        <input type="password" name="password" class="form-control pass-key-reg" required
                                                            placeholder="Password">
                                                        <span class="show-reg ">SHOW</span>
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="labels">Proffession</label>
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control pass-key-reg" required placeholder="Confirm Password">
                                                        <span class="show-reg">SHOW</span>
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> --}}
                                                </div>

                                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                                        type="submit">Save Profile</button></div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4" >
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center experience">
                                                <span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i
                                                        class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                            <div class="col-md-12"><label class="labels">Experience in
                                                    Designing</label><input type="text" class="form-control"
                                                    placeholder="experience" value=""></div> <br>
                                            <div class="col-md-12"><label class="labels">Additional Details</label><input
                                                    type="text" class="form-control" placeholder="additional details"
                                                    value=""></div>
                                        </div>
                                    </div> --}}

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- card -->
            </div><!-- col-lg -->

        </div><!-- row -->
    </div><!-- az-content-body -->
    </div>
    </div><!-- az-content -->
</section >
@endsection
@section('script')
    <script>
        const pass_field = document.querySelector('.pass-key-reg');
        const showBtn = document.querySelector('.show-reg');
        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>
@endsection
