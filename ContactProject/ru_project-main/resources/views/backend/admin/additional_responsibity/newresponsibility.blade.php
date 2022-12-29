@extends('backend.admin.index')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 py-2">

        <div class="card">


        <div class="card-header p-0 m-0">
            <p style="text-align: center;color:#00bfff;margin-top:20px;"><span style="font-size: 25px;">Employee Information</span> </p>

        </div>

        @if (Session::has('message'))
        <div class="alert alert-info">
            <p style="text-align: center;">
                {{ Session::get('message') }}
            </p>

        </div>



        @endif

        @if (Session::has('message1'))
        <div class="alert alert-info">
            <p style="text-align: center;">
                {{ Session::get('message1') }}
            </p>

        </div>



        @endif

        <form  class="p-4" action="{{ route('Newresponsibility.add') }}" method="post">
            @csrf

            <div class="row justify-content-start">
                <div class="col-md-6">
                    <label style="display: flex;">Employee Type<span class="text-danger"></span></label>
                </div>

                <div class="col-md-4">
                    <label style="display: flex;">Department Name<span class="text-danger">*</span></label>
                </div>



            </div>


             <div class="row justify-content-start form-group">
                <div class="col-md-6">

                    <select name="" id="type_id" class="form-control">
                        <option value="">Select Type</option>

                        <option value="1">Teacher</option>
                        <option value="2">Officer</option>
                        <option value="3">Staff</option>

                    </select>
                   




                 </div>


                 @php
                 $departments=DB::table('departments')->select('office_code','dept_name')->distinct()->orderBy('dept_name')->get();
             @endphp

                  <div class="col-md-6">
                     <select name="dept_name" id="department_id" class="form-control select2" required>
                         <option value="">Select department name</option>
                         @foreach ($departments as $department)
                         @php
                         $name=Str::of($department->dept_name)->limit(110)->upper();
                       @endphp

                         <option value="{{ $department->dept_name}}">{{  $name }}</option>
                         @endforeach

                     </select>
                     {{-- <input type="text" name="dept_name" class="form-control" placeholder="Dept Name"> --}}
                  </div>

                  <input type="hidden" name="dept_code" id="office_id" class="form-control" placeholder="Department Code">


            </div>

            <div class="row justify-content-start p-0">
                <div class="col-md-6">
                    <label style="display: flex;">Full Name<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-4">
                    <label style="display: flex;">Designation<span class="text-danger">*</span></label>
                </div>


            </div>


             <div class="row justify-content-start form-group p-0">
                <div class="col-md-6 ">
                    <input type="text" name="fullNameNew" class="form-control" placeholder="Full Name" required>




                 </div>
                 <div class="col-md-6">
                  <select name="Designation" id="type" class="form-control select2">

                    <option value="">Please Select Option</option>

                  </select>
                    {{-- <input type="text" name="Designation" class="form-control" placeholder="Designation" required> --}}
                 </div>

            </div>



            <div class="row justify-content-start">
                 <div class="col-md-6">
                    <label style="display: flex;">Email<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-4">
                    <label style="display: flex;">Mobile No<span class="text-danger">*</span></label>
                </div>




            </div>



             <div class="row justify-content-start form-group">
                <div class="col-md-6">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>




                 </div>

                    <input type="hidden" name="dbuid" value="302" class="form-control" placeholder="id" required>



                    <div class="col-md-6">
                        <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No" required>
                     </div>


            </div>






            <div class="row justify-content-start">


                <div class="col-md-6">
                    <label>Employee Id<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-4">
                    <label style="display: flex;">Office Serial Index<span class="text-danger">*</span></label>
                </div>


            </div>


             <div class="row justify-content-start form-group">



                 <div class="col-md-6">
                    <input type="text" name="salaryID" id="salaryid" class="form-control" maxlength="8" placeholder="xxxxxxxx" required>


                 </div>


                 <div class="col-md-6">
                    <input type="text" name="officeSRINDEX" class="form-control" placeholder="Office Serial Index">
                </div>

            </div>






            {{-- <div class="row justify-content-start">

                <div class="col-md-6">
                    <label style="display: flex;">Department Name<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-4">
                    <label style="display: flex;">Department Code<span class="text-danger">*</span></label>
                </div>



            </div> --}}

{{--
             <div class="row justify-content-start form-group">




             <div class="col-md-6"> --}}





              {{-- </div>

            </div> --}}








            {{-- <div class="row justify-content-start">
                <div class="col-md-6">
                    <label style="display: flex;">Office Serial Index<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-4">
                    <label style="display: flex;">Job Status<span class="text-danger">*</span></label>
                </div>


            </div> --}}


            {{-- <div class="row justify-content-start form-group">
                <div class="col-md-6">
                    <input type="text" name="officeSRINDEX" class="form-control" placeholder="Office Serial Index">
                </div>


                <div class="col-md-6">
                    <input type="text" name="job_status" class="form-control" placeholder="Job Status">




                 </div>
            </div> --}}


            <div class="row justify-content-start">
                <div class="col-md-6">
                    <label style="display: flex;">Office Address<span class="text-danger">*</span></label>
                </div>



            </div>


             <div class="row justify-content-start form-group">
                <div class="col-md-12">
                    <input type="text" name="office_address" class="form-control" placeholder="Office Address">




                 </div>


            </div>


              <div class="row justify-content-center py-2">
                <button class="btn btn-primary">Submit</button>

              </div>
        </form>

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
        $('#office_id').val(res.officeid);
        $('#salaryid').val(res.officeid);





       }
   });
})
</script>

<script>
    $('#type_id').on('change',function(){


   const officeid = $(this).val();


   $.ajax({
       url : "{{ route('type.id') }}",
       type : "get",
       data : { officeid : officeid },
       dataType:'json',
       success:function(res)
       {

        var htmloption="<option value=''>Please Select Option</option>";
           $.each(res,function(){
                $.each(this,function(k,v){
                    htmloption+="<option value='"+v.name+"'>"+v.name+"</option>";
                })
           })

           $('#type').html(htmloption);


        //    alert(res.sortprofile) sortdesignation






       }
   });
})
</script>

@endpush
