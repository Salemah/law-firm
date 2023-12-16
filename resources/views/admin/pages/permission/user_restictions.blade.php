@extends('admin.dashboard.master')

@section('name', 'Team')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
    </style>
@endpush
@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
        });
    </script>
@endpush

@section('breadcumb')

    <div class="content-header ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Team</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
                        <li class="breadcrumb-item active">Team</li>
                        <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white"
                                href="{{ route('admin.team.index') }}">
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


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title text-center">User Permission List - {{ $user->name }}</h5>
                    </div>
                    <div class="card-block">
                        <form id="permission_update_form" action="{{ route('admin.user_restictions.update') }}"
                            method="post" class="form-horizontal">
                            @csrf
                            @if ($user)
                                <input type="hidden" name="id" value="{{ $user->id }}">
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Module Name</th>
                                            <th>Restictions <input type="checkbox" onclick="checkAll(this)">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissionCategorys as $key => $value)
                                            <tr
                                                style="background-color:#6C8BEF; color:white;text-align:center;text-transform:capitalize;font-weight:bolder;">
                                                <td colspan="3">{{ $key }}</td>
                                            </tr>
                                            @foreach ($value as $permissionCategory)
                                                <tr>
                                                    <td>{{ $permissionCategory->id }}</td>
                                                    <td>{{ $permissionCategory->title }}</td>
                                                    <td>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permission[]"
                                                                value="view {{ $permissionCategory->name }}"
                                                                @if (in_array("view $permissionCategory->name", $permissions)) checked @endif />

                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">View</span>
                                                        </label>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permission[]"
                                                                value="edit {{ $permissionCategory->name }}"
                                                                @if (in_array("edit $permissionCategory->name", $permissions)) checked @endif />
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Edit</span>
                                                        </label>
                                                        <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permission[]"
                                                                value="delete {{ $permissionCategory->name }}"
                                                                @if (in_array("delete $permissionCategory->name", $permissions)) checked @endif />
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Delete</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-success  mb-5">
                                    Update
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5"></div>
    </div>

@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.20.0/ckeditor.js"
        integrity="sha512-BcYkQlDTKkWL0Unn6RhsIyd2TMm3CcaPf0Aw1vsV28Dj4tpodobCPiriytfnnndBmiqnbpi2EelwYHHATr04Kg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for (var i = 0; i < cbs.length; i++) {
                if (cbs[i].type == 'checkbox') {
                    cbs[i].checked = bx.checked;
                }
            }
        }
        $(document).ready(function() {
            $('#permission_update_form').ajaxForm({

                success: function() {
                    location.reload();
                },

            });
        });
    </script>
    <script></script>
@endpush
