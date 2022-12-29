@extends('backend.admin.index')
@section('content')

<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title">New Teacher</h3>
            <a class="btn btn-primary f-100" href="{{ route('teacher.index') }}"><i class = "fa fa-angle-left mr-2"></i>Back</a>
        </div>

        <form  action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Teacher Name<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "text" class="form-control" id="name" name="name" value = "{{ old('name') }}" required>
                    @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Email<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "email" class="form-control" id="email" name="email" value = "{{ old('email') }}" required>
                    @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Designation<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "text" class="form-control" id="email" name="designation" value = "{{ old('email') }}" required>
                    @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Image<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control" id="general_code" name="image" value = "{{ old('general_code') }}" required>
                    {{-- @if($errors -> any('general_code') && !old('general_code'))
                      <strong class = "text-danger f-100">Account has must be a code.</strong>
                    @endif --}}
                </div>
            </div>
            {{-- <div class="row form-group justify-content-center"> 
                <div class="col-md-3">
                    <label>Company Code</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="company_code" name="company_code">
                </div>
            </div>
            --}}
           
           

            <div class="row form-group justify-content-center">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                </div>
                <div class="col-md-5">

                </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
@endsection