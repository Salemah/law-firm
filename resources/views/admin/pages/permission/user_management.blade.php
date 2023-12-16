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

                    <div class="card-body">
                        <div class="table-responsive" id="tab">
                            <table id="user_table" class="table table-striped table-bordered table-hover"
                                style="border: solid 1px rgba(255, 193, 193, 0.1);">
                            </table>

                        </div>
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
        $(document).ready(function() {
            $('.dropify').dropify();
            $('#legal_area_id').select2();

            $('#sub_legal_area_id').select2();
        });

        $('#user_table').DataTable({
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
            ajax: {
                url: "{{ route('admin.user_management.data') }}",
                type: 'GET',
                cache: false
            },
            columns: [{
                    title: 'SL',
                    data: 'id',
                    name: 'id'
                },
                {
                    title: 'Name',
                    data: 'name',
                    name: 'name'
                },
                {
                    title: 'Email',
                    data: 'email',
                    name: 'email'
                },
                // { title: 'User Name', data: 'username', name: 'username' },
                // { title: '{{ __('messages.Company') }}', data: 'company_id', name: 'company_id' },
                // { title: '{{ __('messages.Branch') }}', data: 'branch_id', name: 'branch_id' },
                // { title: '{{ __('messages.Ware house') }}', data: 'warehouse_id', name: 'warehouse_id' },
                {
                    title: 'User Role',
                    data: 'type',
                    name: 'type'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    </script>
    <script></script>
@endpush
