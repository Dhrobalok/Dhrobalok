@extends('backend.admin.index')
@section('content')
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title text-center">Upadte Category </h3>
            {{-- <a class="btn btn-primary f-100"><i class ="fa fa-angle-left mr-2"></i>Back</a> --}}
        </div>
        @if ($allinformation)

         <form  action="{{ url('update.category',$allinformation->id) }}" method="post"> 
            @csrf
            
            
        
         

<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Type<span class = "text-danger">*</span></label>
    </div>
    <div class="col-md-8">
         <input type="hidden" name="category_id" value="{{ $allinformation->id }}">
        <input type = "text" class="form-control" id="name" name="type" value = "{{ $allinformation->category_name }}" >
        {{-- @if($errors -> any('name') && !old('name'))
          <strong class = "text-danger f-100">Account name required</strong>
        @endif --}}
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
            @endif
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>

@endsection
