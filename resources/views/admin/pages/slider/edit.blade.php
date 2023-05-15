@extends('admin.dashboard.master')

@section('title', 'Category')

@push('css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

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
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white" href="{{ route('admin.category.create') }}">
                <i class='bx bx-plus'></i> Create
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

   <form action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data" method="POST">
       @csrf
       @method('PUT')
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-body">
                       <div class="row">
                               <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                                   <label for="name"><b>Category Name</b><span class="text-danger">*</span></label>
                                   <input type="text" name="name" id="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{$category->name}}"
                                       placeholder="Enter Product Category Name">
                                   @error('name')
                                       <span class="alert text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>

                               <div class="form-group col-12 col-sm-12 col-md-6 mb-2">
                                   <label for="status"><b>Status</b><span class="text-danger">*</span></label>
                                   <select name="status" id="status"
                                           class="custom-select @error('status') is-invalid @enderror">
                                       <option >--Select Status--</option>
                                       <option value="1" selected {{$category->status == 1 ? 'selected': ''}}>Active</option>
                                       <option value="0" {{$category->status == 0 ? 'selected': ''}}>Inactive</option>
                                   </select>
                                   @error('status')
                                   <span class="alert text-danger" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                               </div>
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
