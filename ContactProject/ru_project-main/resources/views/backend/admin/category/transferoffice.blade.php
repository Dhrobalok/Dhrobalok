@extends('backend.admin.index')
<style>
    .select2
    {
     width: 100%;
     height: 100%;
    }
</style>
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 py-2">
        <div class="card">
            <div class="card-header p-1 ">
                <p class="p-4 m-0"  style="text-align: center;font-weight: bold;color:#0665d0;font-size:25px;">
                 
                    Employee Transfer </p>
    
            </div>
    
        </div>

    </div>

    @php
    //$office=App\Models\Profile::get();
    $office=DB::table('profiles')->select('salaryID','fullNameNew',)->orderBy('fullNameNew')->get();
    @endphp
 
    <div class="col-md-5">
        <div class="card">
            <div class="card-header" style="background-color:#00bfff;">
                <p class="p-0 m-0" style="text-align: center;font-weight: bold;color:white;">From</p>

            </div>

            <form class="p-0 m-0" action="{{ route('transfer.save') }}" method="post">
                @csrf

            <div class="form-group row justify-content-center py-4">
               

                <div class="col-md-7 py-2">
                   <select name="name" id="office_id" class="form-control select2">

                      <option value="">Select Employee</option>
                      @foreach ($office as $officeall)
                      @php
                        $name=Str::of($officeall->fullNameNew)->limit(110)->upper();
                      @endphp
                      <option value="{{ $officeall->salaryID }}">{{ $name }}</option>
                          
                      @endforeach
                   </select>

                    
                </div>

                  
                    


                <div class="col-md-7 py-4">

                    
                   
                   <input type="text" id="transfer" name="dept_name" class="form-control" placeholder="Department Name">
 
                     
                </div>

            </div>

            
               

              

            


        </div>

    </div>
    
  
 <div class="col-md-5 ">
     <div class="card ">
            <div class="card-header p-1" style="background-color:#00bfff;">
              <p class="p-2 m-0" style="text-align: center;font-weight: bold;color:white;">To</p>

            </div>
        
         

            
               
           
               

                
                 {{-- <div class="row justify-content-start">
                    <div class="col-md-1">
                        <label style="display: flex;">New&nbsp;Office<span class="text-danger">*</span></label>
                    </div>
                    
            
                </div> --}}
                 @php
                     $department=App\Models\Department::get();
                 @endphp

                 <div class="form-group row justify-content-center py-4 ">
                    <div class="col-md-8 py-2">
                       
            
                        <select name="newoffice"  class="form-control select2" id="department_id">
                       
                            <option value="">Select New Office</option>
                            @foreach ($department as $officeall)
                            @php
                                 $name=Str::of($officeall->dept_name)->limit(110)->upper();
                            @endphp
                                <option value="{{ $officeall->office_code }}">{{ $name }}</option>
                          
                           @endforeach
                            
                            
                         </select>
                       
                     </div>

                     <div class="col-md-8 py-4">
                        
            
                        <input type="text" name="dept_code" id="department_code" class="form-control" placeholder="Office Code" required>
                          
                        </div>
                     
                </div>

                
               

                

                    
                    
                     
                      
 
                     
                 

                   <div class="row justify-content-center py-2">
                      <button class="btn btn-primary">submit</button>

                   </div>
              </form>

            </div>

       



        </div>

    </div>

</div>
@endsection

@push('js')

<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>



<script>
    $('#office_id').on('change',function(){
       
        
   const office_id = $(this).val();
   $.ajax({
       url : "{{ route('fromoffice') }}",
       type : "get",
       data : { office_id : office_id },
       dataType:'json',
       success:function(res)
       {
         
           
        $('#transfer').val(res.department);
   
       }
   });
})
</script>

<script>
    $('#department_id').on('change',function(){
       
        
   const officeid = $(this).val();
 
  
   $.ajax({
       url : "{{ route('profile.officeid') }}",
       type : "get",
       data : { officeid : officeid },
       dataType:'json',
       success:function(res)
       {
        
     
        //    alert(res.sortprofile) sortdesignation
        $('#department_code').val(res.officeid);
      
     
        
       
     
       }
   });
})
</script>
    
@endpush
