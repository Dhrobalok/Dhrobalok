@extends('backend.admin.index')
@section('content')
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
<div class="row">
    <div class="col-md-12">
        <h5 style="font-size:16px; font-weight:bold;text-align: center;">Institute&nbspof&nbspBiological&nbspSciences</h5>
        <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>


    </div>

        <div class="col-md-12">
            <p style="text-align: center; ">
                <img src="{{ asset('public/company_pic/ru-logo.png') }}" alt="">
            </p>
       </div>

       <div class="col-md-12">
           <p style="text-align:center;font-weight:bold;font-size:16px;">Payslip Add</p>

       </div>


    

</div>
<form action="{{route('payslip.add')}}" method="post">
    @csrf

<div class="row">
    <div class="col-md-3">
        <label style="display: flex;">Name<span class="text-danger">*</span></label>
    </div>

    <div class="col-md-3">
        <label style="display: flex;">Roll<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Session<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Course<span class="text-danger">*</span></label>
    </div>

</div>

<div class="row form-group">
    <div class="col-md-3">
        <select name="name" class="form-control" id="" required>
            @foreach ($employee as $allemployee )
            <option value={{$allemployee->name}}>{{$allemployee->name}}</option>
                
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="roll" class="form-control" id="" required>
            @foreach ($employee as $allemployee )
            <option value={{ $allemployee->student_id }}>{{$allemployee->student_id}}</option>
                
            @endforeach
        </select>
       
    </div>

    <div class="col-md-3">
        <input type="text" class="form-control" name="session" id="" required>
    </div>
    <div class="col-md-3">
        <select  id="" class="form-control" name="course"  required>
            <option value="Mphill">Mphill</option>
            <option value="Phd">Phd</option>
        </select>
    </div>
    
</div>

<div class="row">
    <div class="col-md-3">
        <label style="display: flex;">Admission Fee<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Tution Fee<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Registration Fee<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Library Fee<span class="text-danger">*</span></label>
    </div>

</div>

<div class="row form-group">
    <div class="col-md-3">
        <input type="text" class="form-control" name="admission_fee" id="" required>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="tution_fee" id="" required>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="registration_fee" id="" required>
    </div>

    <div class="col-md-3">
        <input type="text" class="form-control" name="library_fee" id="" required>
    </div>
    
</div>


<div class="row">
    <div class="col-md-3">
        <label style="display: flex;">Laboratory Fee<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Migration Fee<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Seat Rent<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-3">
        <label style="display: flex;">Course Work Fee<span class="text-danger">*</span></label>
    </div>

</div>

<div class="row form-group">
    <div class="col-md-3">
        <input type="text" class="form-control" name="laboratory_fee" id="" required>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="migration_fee" id="" required>
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" name="seat_rate" id="" required>
    </div>

    <div class="col-md-3">
        <input type="text" class="form-control" name="course_work_fee" id="" required>
    </div>
    
</div>


<div class="row">
    <div class="col-md-4">
        <label style="display: flex;">Course Transfer Fee<span class="text-danger">*</span></label>
    </div>

    <div class="col-md-4">
        <label style="display: flex;">Other Fee<span class="text-danger">*</span></label>
    </div>
    

</div>

<div class="row form-group">
    <div class="col-md-4">
        <input type="text" class="form-control" name="course_t_fee" id="" required>
    </div>

    <div class="col-md-4">
        <input type="text" class="form-control" name="others" id="" required>
    </div>
  
</div>



 <br><br>

 <div class="row justify-content-center">

    <div >
        <button class="btn btn-primary" style="text-align: center">Submit</button>

    </div>
   

 </div>
</form>

@endsection