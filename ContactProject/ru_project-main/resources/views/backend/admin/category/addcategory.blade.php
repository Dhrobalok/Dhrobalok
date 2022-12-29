@extends('backend.admin.index')
@section('content')


<div class="content">
    <div class="card">
        @php
            $name=App\Models\Categor::where('id',$category)->first();
        @endphp
        <div class="card-header">
            <p style="text-align: center;font-size:25px;">{{  Str::upper(Str::limit($name->category_name)) }} TELEPHONE NUMBER</p>

        </div>

    </div>


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title"></h3>
            {{-- <a class="btn btn-primary f-100"><i class ="fa fa-angle-left mr-2"></i>Back</a> --}}
        </div>

         <form  action="{{ route('cinformation.store') }}" method="post"> 
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Office Name<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type="hidden" name="category_id" value="{{ $category }}">
                    <input type = "text" class="form-control" id="name" name="officename" value = "{{ old('name') }}" required>
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Office Type<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    {{-- <input type="hidden" name="category_id" value="{{ $category }}"> --}}
                    <input type = "text" class="form-control" id="name" name="officeno" value = "{{ old('name') }}" required>
                    {{-- @if($errors -> any('name') && !old('name'))
                      <strong class = "text-danger f-100">Account name required</strong>
                    @endif --}}
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Cell No<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "text" class="form-control"   name="cell_no" required autocomplete="cell_no" autofocus>
                    @if($errors->has('cell_no'))
                     <div class="error">{{ $errors->first('cell_no') }}</div>
                    @endif
                </div>
            </div>
            
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Email<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="general_code" name="email" value = "{{ old('general_code') }}" required>
                   
                </div>
            </div>
           
           

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
