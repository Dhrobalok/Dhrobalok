@extends('backend.admin.index')
<style>
     img
      {
        width: 90px;
        height: 70px;
       
        background: #fff;
        border-radius: 40px;
        position: relative;
      }
</style>
@section('content')

  <div>
    <div class="row justify-content-center">
        <div class="col-md-2 col-sm-3">
            <p style="margin-top: 50px;text-align:center;">
                <img src="{{ asset('public/company_pic/ru-logo.png') }}" alt="">
            </p>
       </div>

   

        <div class="col-lg-3">
            <h5 style="font-size:16px; font-weight:bold;text-align:center;">Institute&nbspof&nbspBiological&nbspSciences</h5>
            <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>
            <p style="font-size:16px; font-weight:bold;text-align:center;">Rajshahi-6205,Bangladesh</p>
            <p style="font-size:16px; font-weight:bold;text-align:center;">(To&nbspSubmitted&nbspto&nbspthe&nbspPh.D/M.Phill&nbspThesis)</p>
            <br><br>
            <p style="font-size:16px; font-weight:bold;text-align:center;display:inline-block;">Bill&nbspSubmitted&nbspby&nbspPh.D/M.Phill&nbspPrincipal&nbspSupervisor/Co-Supervisor</p>


           
                                      
            
       </div>
      
       <div class="col-md-2 col-sm-3">
        <p style="margin-top: 50px;text-align:center;">
            <img src="{{ asset('public/company_pic/download.png') }}" alt="">
        </p>
      </div>
          

        
    </div>

    @if (Session::has('msg'))
    <div class="alert alert-info">
        <p style="text-align: center;">
            {{ Session::get('msg') }}
        </p>
        
    </div>
    @endif

    <form action="{{ route('thesis.bill')}}" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="row">
        <div class="col-md-4">
            <label style="display: flex;">Name<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <label style="display: flex;">Designation<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <label style="display: flex;">Full Address<span class="text-danger">*</span></label>
        </div>

    </div>

    <div class="row form-group">
        <div class="col-md-4">
            
           <input type="text" class="form-control" id="teacher_name" name="name" readonly>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="designation" id="designations" readonly>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="adress" id="" required>
        </div>
        
    </div>


    <div class="row">
        <div class="col-md-4">
            <label style="display: flex;">Name of Fellow(Ph.D/M.Phill)<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <label style="display: flex;">Session<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <label style="display: flex;">Student Roll No<span class="text-danger">*</span></label>
        </div>

    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <select name="course" id="" class="form-control" required>
                @foreach ($user as $users)
                @php
                    $employee=App\Models\Employee::where('roll',$users->student_id)->first();
                @endphp
                <option value="{{ $employee->course }}">{{ $employee->course }}</option>
                    
                @endforeach
                
                
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="session" id="" required>
        </div>
        <div class="col-md-4">
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">select option</option>
                @foreach ($user as $users)
                
                  <option value="{{ $users->student_id }}">{{ $users->student_id}}</option>
                    
                @endforeach
                
            </select>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-4">
            <label style="display: flex;">Title of Ph.D/M.Phill Thesis<span class="text-danger">*</span></label>
        </div>

        <div class="col-md-4">
            <label style="display: flex;">Account Name<span class="text-danger">*</span></label>
        </div>
      

    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <input type="text" class="form-control" name="title" id="" required>
        </div>
      
        @php
            $account=App\Models\ChartOfAccount::get();
        @endphp
        <div>
            <select name="accountid" id="" class="form-control">
                <option value="">Select Option</option>
                @foreach ($account as $accountlist )
                <option value="{{ $accountlist->id }}">{{ $accountlist->name }}</option>
                    
                @endforeach
                
            </select>

        </div>
    
    </div>

    <div class="row">
    
       <div class="col-md-7">
        <label style=" font-weight:bold;text-align:center;">Description of work<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
       </div>
        
        <div class="col-md-1">
            <label style=" font-weight:bold;text-align:center;">Remuneration<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

        </div>
    </div>
   
       <div class="row">
        
            <div class="col-md-7">
                <label style="font-weight:bold;">Principal Supervisor<span class="text-danger"></span></label>
            </div>
            <div class="col-md-3">
               <input type="text" class="form-control" name="principal_money" placeholder="Taka" required>
            </div>
           
       </div>
        
        <div class="row">
            <div class="col-md-7">
            
             <label style="font-weight:bold;">Co-Supervisor<span class="text-danger"></span></label>
            </div>

            <div class="col-md-3">
                <input type="text" class="form-control" name="cosupervisor_money" placeholder="Taka" required>
             </div>

        </div>


        <div class="row">
           <div class="col-md-7">
            
            <label style="font-weight:bold;">Supervisor<span class="text-danger"></span></label>
           </div>

           <div class="col-md-3">
            <input type="text" class="form-control" name="supervisor_money" placeholder="Taka" required>
           </div>
        </div>

        <div class="row">
            <div class="col-md-7">
             
             <label style="font-weight:bold;">Submission date of Thesis<span class="text-danger"></span></label>
            </div>

            <div class="col-md-3">
             <input type="date" class="form-control" name="submission_date" placeholder="" required>
            </div>
        </div>

         <br><br><br><br>

        <div class="row">

             <div class="col-md-7">
                 <label style=" font-weight:bold;text-align:center;">Signature&nbspof&nbspExaminer/Supervisor<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                 <div class="row">
                    
                    <input type="file" class="form-control" style="width:50%;" name="e_s" placeholder="" required>
                
                 </div>
            </div>
                 
                 
            <div class="col-md-3">
                <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature&nbspof&nbspThe&nbspChairman&nbspof&nbspExamination&nbspCommittee<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                <div class="row">
                    
                    <input type="file" class="form-control" style="width:100%;" name="c_examcomite" placeholder="" required>
                
                 </div>

            </div>
  
    

         </div>

         <br><br>
         
   <div class="row">
       
       <p style="font-size:17px; display: flex;flex-direction:column; justify-content:center">Please&nbspPay&nbsp
       
       </p>

       

       
       <div class="col-md-2">
        <input type="text" class="form-control" name="taka" id="" placeholder="Taka" required>
       </div>

       <p style="font-size:17px; display: flex;flex-direction:column; justify-content:center">Only to Professor/Dr
       
       </p>

       <div class="col-md-6">
        <input type="text" class="form-control" id="name" name="teacher_name" readonly>
       </div>

   </div>



   <br><br><br><br>

   <div class="row">
    
    <div class="col-md-4">
     <label style=" font-weight:bold;text-align:center; display:inline-block;">Signature Of Section Officer(Accounts)IBSc<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
    </div>
     
     <div class="col-md-4">
         <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Secretary IBSc<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

     </div>

     <div class="col-md-4">
        <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Director IBSc<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

    </div>
 </div>

 <div class="row">

    <div class="col-md-4">
        <input type="file" class="form-control" name="section_officer" id="" required>
    </div>

    <div class="col-md-4">
        <input type="file" class="form-control" name="secretary" id="" required>
    </div>

    <div class="col-md-4">
        <input type="file" class="form-control" name="director" id="" required>
    </div>

 </div>
 <br><br>

 <div class="row text-center">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <button class="btn btn-primary f-100" onclick="update_permissions();">SUBMIT</button>
    </div>
</div>
</div>
        
</form>

</div> 


@endsection('content')
@push('js')
<script>
     $('#student_id').on('change',function(){
         
    const student_id = $(this).val();
    $.ajax({
        url : "{{ route('teacher.find') }}",
        type : "get",
        data : { student_id : student_id },
        success:function(res)
        {
          // designationsalert(res)
           $('#teacher_name').val(res['teacher_name']);
           $('#name').val(res['teacher_name']);
           $('#designations').val(res['teacher_designation']);
           
           
        
      
        }
    });
})
</script>


    
@endpush


<!-- start pauslip nav -->

