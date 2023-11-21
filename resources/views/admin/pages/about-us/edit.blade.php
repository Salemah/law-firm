@extends('admin.dashboard.master')

@section('title', 'About Us')

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
                        <li class="breadcrumb-item active">About Us</li>
                        <li class="breadcrumb-item active">Edit</li>
                        <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white"
                                href="{{ route('admin.aboutus.index') }}">
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

        <form action="{{ route('admin.aboutus.update', $post->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12  col-md-6 mb-2">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input type="file" id="image"
                                        data-default-file="{{ asset('image/aboutus/' . $post->image) }}"
                                        data-height="290"class="dropify form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                                    <label for="title"><b>Name</b><span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ $post->title }}" placeholder="Enter About Us Name">
                                    @error('title')
                                        <span class="alert text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="10" cols="40"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Description..."> {{ $post->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
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

        });
        CKEDITOR.replace('description', {
            toolbarGroups: [{
                    "name": "styles",
                    "groups": ["styles"]
                },
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },

                {
                    "name": "paragraph",
                    "groups": ["list", "blocks"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                },
                {
                    "name": "links",
                    "groups": ["links"]
                },
                {
                    "name": "insert",
                    "groups": ["insert"]
                },

                {
                    "name": "undo",
                    "groups": ["undo"]
                },
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Source,contact_person_phone,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
        });

    </script>
    <script></script>
@endpush
