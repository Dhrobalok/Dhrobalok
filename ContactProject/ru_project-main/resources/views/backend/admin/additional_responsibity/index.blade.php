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
                 
                    ADDITIONAL&nbsp;RESPONSIBILITY </p>
    
            </div>
    
        </div>

    </div>
 
    <div class="col-md-5">
        <div class="card">
            <div class="card-header" style="background-color:#00bfff;">
                <p class="p-0 m-0" style="text-align: center;font-weight: bold;color:white;">From</p>

            </div>

            @php
               //$office=App\Models\Profile::get();
               $office=DB::table('departments')->select('office_code','dept_name')->distinct()->orderBy('dept_name')->get();
           @endphp

            <div class="form-group row justify-content-center py-4">
               

                <div class="col-md-7 py-2">
                   <select name="officename" id="profile_id" class="form-control select2">

                      <option value="">Select Office Name</option>
                      @foreach ($office as $officeall)
                      @php
                        $name=Str::of($officeall->dept_name)->limit(110)->upper();
                      @endphp
                      <option value="{{ $officeall->office_code }}">{{ $name }}</option>
                          
                      @endforeach
                   </select>

                    
                </div>

                  
                    


                <div class="col-md-7 py-4">

                    
                   
                    <select name="salaryid" id="salary_id" class="form-control select2">
                       
                        
                       
                    </select>
 
                     
                </div>

            </div>

            
               

              

            


        </div>

    </div>
    
  
 <div class="col-md-5 ">
     <div class="card ">
            <div class="card-header p-1" style="background-color:#00bfff;">
              <p class="p-2 m-0" style="text-align: center;font-weight: bold;color:white;">To</p>

            </div>
          <div> 
         

            <div class="form-group row justify-content-center py-2">
               
             <form class="p-0 m-0" action="{{ route('profile.save') }}" method="post">
                @csrf
               

                
                 <div class="row justify-content-center">
                    <div class="col-md-5">
                        <label style="display: flex;">New Office<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <label style="display: flex;">Designation<span class="text-danger">*</span></label>
                    </div>
                    
            
                </div>


                 <div class="row justify-content-center form-group">
                    <div class="col-md-5">
                        <input type="hidden" name="salary_id" id="salaryid">
            
                        <select name="newoffice"  class="form-control select2" id="disignation_id">
                       
                            <option value="">Select Office Name</option>
                            @foreach ($office as $officeall)
                            @php
                                 $name=Str::of($officeall->dept_name)->limit(110)->upper();
                            @endphp
                                <option value="{{ $officeall->office_code }}">{{ $name }}</option>
                          
                           @endforeach
                            
                            
                         </select>
                       
                     </div>
                     <div class="col-md-5">

                        <select name="degination" id="disignation_name" class="form-control select2">
                       
                        
                       
                        </select>
                            {{-- @php
                        
                             $degicnation=DB::table('designations')->select('name')->distinct()->orderBy('name')->get();
                          
                            @endphp
                            
                            <select name="degination"  id="" class="form-control select2">
                                <option value="">Select New Designation</option>
                             
                                 @foreach ($degicnation as $offices)
                                 @php
                                     $name=Str::of($offices->name)->limit(110)->upper();
                                 @endphp
                                  <option value="{{ $name }}">{{ $name }}</option> 
                                  @endforeach
                            </select> --}}
                     </div>
                     
                </div>

                
                

                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <label style="display: flex;">From Date<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <label style="display: flex;">To Date<span class="text-danger">*</span></label>
                    </div>
                    
            
                </div>


                 <div class="row justify-content-center form-group">
                    <div class="col-md-5">
            
                        <input id="name" type="date" class="form-control"  name="from"  placeholder="From" required>
                     </div>
                     <div class="col-md-5">
                        <input id="name" type="date" class="form-control" name="to" >
      
                     </div>
                     
                </div>


                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <label style="display: flex;">Mobile No<span class="text-danger"></span></label>
                    </div>
                    <div class="col-md-4">
                        <label style="display: flex;">Email<span class="text-danger"></span></label>
                    </div>
                    
            
                </div>

                <div class="row justify-content-center form-group">
                    <div class="col-md-5">
            
                        <input  type="text" class="form-control"  name="mobile" id="mobile"   required>
                     </div>
                     <div class="col-md-5">
                        <input  type="text" class="form-control" name="email" id="email"   required>
      
                     </div>
                     
                </div>

                <div class="row justify-content-start">
                    <div class="col-md-5">
                        <label style="display: flex; margin-left:39px;">Address<span class="text-danger"></span></label>
                    </div>
                   
                    
            
                </div>
              

                <div class="row justify-content-start form-group ">
                    <div class="col-md-5" style="margin-left:39px;">
            
                        <input  type="text" class="form-control"  name="adress" id="adress"   required>
                     </div>
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

<br><br>
<div class="card">
    <div class="card-body p-4">

        <div class="row justify-content-center">
    
            <div class="table-responsive">
                {{-- <br><br>
                <button class="btn btn-primary" style="float: right;">kbcbvhxbc</button> --}}
        
               
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th  class="text-center" >Office&nbsp;Name</th>
                            <th class="text-center">Full&nbsp;Name</th>
                            <th class="text-center">Designation</th>
                            
                            <th  class="text-center">From</th>
                            <th  class="text-center">To</th>
                            <th  class="text-center">Mobile&nbsp;No</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">SRINDEX</th>
                           
                            <th  class="text-center">Status</th>
                            <th  class="text-center" style="width:420px !important"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $addtion=App\Models\Addition::get();
                        @endphp
                         @foreach ($addtion as $addins)
                        <tr>
                           
                                
                           @php
                                 $date=date('Y-m-d');
                                 
                                $start=Carbon\Carbon::now();
                            // $start=Carbon\Carbon::parse($addins->to);
                            $profilename=App\Models\Profile::where('salaryID',$addins->salary_id)->first();
                            $departmentname=App\Models\Department::where('office_code',$addins->officeid)->first();
                           @endphp 
                           
                          
                                
                            {{-- $diffday=$start->diffInYears($end);
                             --}}
                           <td class="">{{ $addins->id }}</td>
                            
                            @if ($departmentname)
                              <td class="">{{ $departmentname->dept_name }}</td>

                            @else

                              <td class="">na</td>

                           @endif

                           @if ($profilename)
                           <td class="">{{ $profilename->fullNameNew }}</td>
                          
                               
                           @else
                           <td class="">na</td>
                               
                           
                               
                           @endif
                           
                           <td class=" ">{{$addins->designat }}</td>
                           
                           <td class="" >
                              <div class="" style="width: 100px;">
                                {{ $addins->from }}

                              </div>
                            
                            </td>
                           <td class="">
                            <div style="width:100px;">
                                {{ $addins->to }}

                            </div>
                            </td>
                           <td class="">{{$addins->mobile }}</td>
                           <td class="">{{ $addins->email }}</td>
                            <td class="">{{ $addins->SRINDEX }}</td>
                           {{-- <td class="p-0 m-0 text-center">{{ $addins->adress }}</td> --}}
                          
                           
                              @if($date<=$addins->to || $addins->to=="null") 
                              
                                
                                <td>
                                    <strong style="color: green;">Active</strong>
                                
                                </td>
        
                              @else

                              <td>
                                <strong style="color: red;">Inctive</strong>
                              </td>
                               
                                  
                              @endif
        
                              @php
                               $employee_id=Session::get('employeeid');
                          
                               $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                            
                                     $id=Session::get('rollno'); 
                                    //  $status=App\Models\User::where('id',$id)->first();
        
                                 
                   
                              @endphp
        
                              @if ($id==2)
                                <td>
                                    <div class="d-flex gap-3" style="width:220px !important">

                                        <a href="{{ url('extend',$addins->id) }}"><button class="btn btn-sm btn-alt-dark">Extend</button></a>&nbsp;
                                        <a href="{{ url('extend',$addins->id) }}"><button class="btn btn-sm btn-alt-dark">Disable</button></a>&nbsp;
                                        <a href="{{ url('edit',$addins->id) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit" ></i></a>&nbsp;
            
                                        <a href="{{ url('delete',$addins->id) }}" class="btn btn-sm btn-danger py-2"><i class="fas fa-trash" aria-hidden="true"></i></a>

                                    </div>
                                   
        
                                </td>
                             
                                  
                              
                              @else
        
                              
                            
                              <td>
                                  <div class="d-grid gap-3 " style="width:220px !important">
                                    @foreach ( $permission as  $permission_id )
                             @if($permission_id->permission_Id==2)
                            
                           

                            
                              <a href="{{ url('extend',$addins->id) }}"><button class="btn btn-sm btn-alt-dark">Extend</button></a>
                              <a href="{{ url('extend',$addins->id) }}"><button class="btn btn-sm btn-alt-dark">Disable</button></a>
                              <a href="{{ url('edit',$addins->id) }}" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit" ></i></a>
                             
                            
                              @endif
        
                              @if($permission_id->permission_Id==4)
                                                 
                                <a href="{{ url('delete',$addins->id) }}" class="btn btn-sm btn-danger py-2"><i class="fas fa-trash" aria-hidden="true"></i></a>
        
                              @endif
                             
                             
                              
                      
                               @endforeach  
                            </div>
                             </td>
                             @endif
                          
                        </tr>
                        @endforeach  
                    </tbody>
        
                </table>
        
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
     $('#profile_id').on('change',function(){
        
         
    const profile_id = $(this).val();
    $.ajax({
        url : "{{ route('profilefind') }}",
        type : "get",
        data : { profile_id : profile_id },
        dataType:'json',
        success:function(res)
        {

            
            
         
           var htmloption="<option value=''>--Please select--</option>";
           $.each(res,function(){
                $.each(this,function(k,v){
                    htmloption+="<option value='"+v.salaryID+"'>"+v.fullNameNew+"</option>";
                })
           })

           $('#salary_id').html(htmloption);
           
        
      
        }
    });
})
</script>


<script>
    $('#salary_id').on('change',function(){
       
        
   const profile_id = $(this).val();
 
  
   $.ajax({
       url : "{{ route('profile.salaryid') }}",
       type : "get",
       data : { profile_id : profile_id },
       dataType:'json',
       success:function(res)
       {
        
     
        //    alert(res.sortprofile) sortdesignation
        $('#salaryid').val(res.sortprofile);
        $('#mobile').val(res.mobile);
        $('#email').val(res.email);
        $('#adress').val(res.adress);
     
        
       
     
       }
   });
})
</script>

<script>
    $('#disignation_id').on('change',function(){
       
        
   const disignation_id = $(this).val();
 
  
   $.ajax({
       url : "{{ route('disignation.id') }}",
       type : "get",
       data : { disignation_id : disignation_id },
       dataType:'json',
       success:function(res)
       {
        
       
        var htmloption="<option value=''>--Please select--</option>";
           $.each(res,function(){
                $.each(this,function(k,v){
                    htmloption+="<option value='"+v.name+"'>"+v.name+"</option>";
                })
           })

           $('#disignation_name').html(htmloption);
       
        // $('#disignation_name').val(res.sortprofile);
        
        
       
     
       }
   });
})
</script>


{{-- <script>
    
    $(document).on('change','#salary_id',function(){
      
        

   let salary_id = $('#salary_id').val();
   
   
  
   
   $.ajax({
       url : "{{ route('profile.salaryid') }}",
       type : "get",
       data : { salary_id :salary_id },
      
       success:function(res)
       {
           $('#salary_id').val(res['teacher_name']);
        //    $('#name').val(res['teacher_name']);
        //    $('#designations').val(res['teacher_designation']);

       }

           
           
        
    //     //   var htmloption="<option value=''>--Please select--</option>";
    //     //   $.each(res,function(){
    //     //        $.each(this,function(k,v){
    //     //            htmloption+="<option value='"+k.salaryID+"'>"+v.fullNameNew+"</option>";
    //     //        })
    //     //   })

    //     //   $('#salary_id').html(htmloption);
          
       
     
    //    }
   });
})
</script> --}}


    
@endpush
