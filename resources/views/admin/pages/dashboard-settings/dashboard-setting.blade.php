@extends('admin.dashboard.master')

@section('title', 'Dashboard Settings')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;

        }
    </style>
@endpush

@section('breadcumb')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard-setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard-setting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


@endsection
@section('content')
@include('admin.dashboard.layouts.partials.alert')
<form action="{{ route('admin.dashboard-setting.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 mb-2">
                            <label for="system_title">System Title<span class="text-danger">*</span></label>
                            <input type="text" name="system_title" id="system_title"
                                class="form-control "
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->title : old('system_title') }} "
                                placeholder="Enter System Title">
                            @error('system_title')
                                <span class="alert alert-dark" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror
                        </div>
                        <input type="hidden" name="id"
                            value="{{ isset($DashboardSetting) ? $DashboardSetting->id : ' ' }}">

                        <div class="form-group col-6 col-sm-6 col-md-6 mb-2">
                            <label for="logo">Upload Logo<span class="text-danger">*</span></label>
                            <input type="file" id="logo" data-height="290"
                                @if ($DashboardSetting) data-default-file="{{ asset('image/dashboard/' . $DashboardSetting->logo) }}" @endif
                                class="dropify form-control @error('logo') is-invalid @enderror" name="logo">
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-6 mb-2">
                            <label for="favicon">Upload Favicon<span class="text-danger">*</span></label>
                            <input type="file" id="favicon" data-height="290"
                                @if ($DashboardSetting) data-default-file="{{ asset('image/dashboard/' . $DashboardSetting->favicon) }}" @endif
                                class="dropify form-control @error('favicon') is-invalid @enderror" name="favicon">
                            @error('favicon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->phone : old('phone') }} "
                                placeholder="Enter Phone No......">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->email : old('email') }} "
                                placeholder="Enter System Title">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                            <label for="facebook">Facebook<span class="text-danger">*</span></label>
                            <input type="text" name="facebook" id="facebook"
                                class="form-control @error('facebook') is-invalid @enderror"
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->facebook : old('facebook') }} "
                                placeholder="Enter System Title">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                            <label for="linkedin">Linkedin<span class="text-danger">*</span></label>
                            <input type="text" name="linkedin" id="linkedin"
                                class="form-control @error('linkedin') is-invalid @enderror"
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->linkedin : old('linkedin') }} "
                                placeholder="Enter System Title">
                            @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                            <label for="twitter">Twitter<span class="text-danger">*</span></label>
                            <input type="text" name="twitter" id="twitter"
                                class="form-control @error('twitter') is-invalid @enderror"
                                value="{{ isset($DashboardSetting) ? $DashboardSetting->twitter : old('twitter') }} "
                                placeholder="Enter System Title">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="10" cols="40"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Address...">{{ isset($DashboardSetting) ? $DashboardSetting->address : old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label for="copyright">Address</label>
                            <textarea name="copyright" id="copyright" rows="10" cols="40"
                                class="form-control @error('copyright') is-invalid @enderror" placeholder="Copyright...">{{ isset($DashboardSetting) ? $DashboardSetting->copyright : old('copyright') }}</textarea>
                            @error('copyright')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" cols="40"
                                class="form-control @error('description') is-invalid @enderror" placeholder="Description...">{{ isset($DashboardSetting) ? $DashboardSetting->about : old('about') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-sm btn-primary">{{ isset($DashboardSetting) ? 'Update' : 'Create' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
<div class="mb-5"></div>




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
