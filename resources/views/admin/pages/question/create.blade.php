@extends('admin.dashboard.master')

@section('title', 'Question')

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
            <li class="breadcrumb-item active">Question</li>
            <li class="breadcrumb-item active"><a class="btn btn-sm btn-success text-white" href="{{ route('admin.question.index') }}">
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

   <form action="{{ route('admin.question.store') }}" enctype="multipart/form-data" method="POST">
       @csrf
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-body">
                       <div class="row">
                               <div class="form-group col-12 col-sm-12 col-md-12 mb-2">
                                   <label for="question"><b>Question Name</b><span class="text-danger">*</span></label>

                                       <textarea  class="form-control " placeholder="Enter  Question Name" name="question" id="question" cols="30" rows="5"></textarea>
                                   @error('question')
                                       <span class="alert text-danger" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>

                               <div class="form-group col-12 col-sm-12 col-md-12 mb-2">
                                   <label for="answer"><b>Question Name</b><span class="text-danger">*</span></label>
                                  <textarea name="answer" class="form-control " placeholder="Enter  Answer" id="answer" cols="30" rows="5"></textarea>
                                   @error('question')
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
