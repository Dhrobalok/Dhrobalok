

@extends('backend.admin.index')
@section('content')
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title text-center">Upadte Office </h3>
            {{-- <a class="btn btn-primary f-100"><i class ="fa fa-angle-left mr-2"></i>Back</a> --}}
        </div>
        @if ($department)

         <form  action="{{ url('update.office',$department->id) }}" method="post"> 
            @csrf
            
            
        
         

<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Department Name<span class = "text-danger"></span></label>
    </div>
    <div class="col-md-8">
         
        <input type = "text" class="form-control" id="name" name="name" value = "{{ $department->dept_name }}" >
       
    </div>
</div>



<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Office Type<span class = "text-danger"></span></label>
    </div>
    <div class="col-md-8">
         
        <input type = "text" class="form-control"  name="unit" value = "{{ $department->unit_name }}" >
       
    </div>
</div>



<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Office Code<span class = "text-danger"></span></label>
    </div>
    <div class="col-md-8">
         
        <input type = "text" class="form-control"  name="code" value = "{{ $department->office_code }}" >
       
    </div>
</div>



<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Serial Index<span class = "text-danger"></span></label>
    </div>
    <div class="col-md-8">
         
        <input type = "text" class="form-control"  name="index" value = "{{ $department->SRINDEX }}" >
       
    </div>
</div>



          
            
          
           
           

            <div class="row form-group justify-content-center">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save Change</button>
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

