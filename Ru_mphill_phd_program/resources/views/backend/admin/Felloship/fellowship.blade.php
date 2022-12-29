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
           <p style="text-align:center;font-weight:bold;font-size:16px;">Fellowship Bill Of IBSC</p>

       </div>


    

</div>
<form action="{{ route('fellowship.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if (\Session::has('danger'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('danger') !!}</li>
        </ul>
    </div>
@endif

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
        <select name="name" class="form-control" id="">
            @foreach ($employee as $allemployee )
            <option value={{$allemployee->name}}>{{$allemployee->name}}</option>
                
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="roll" class="form-control" id="">
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
    <div class="col-md-4">
        <label style="display: flex;">Year<span class="text-danger">*</span></label>
    </div>
    <div class="col-md-4">
        <label style="display: flex;">Month<span class="text-danger">*</span></label>
    </div>

    <div class="col-md-4">
        <label style="display: flex;">Rate<span class="text-danger">*</span></label>
    </div>


</div>

<div class="row form-group">
    <div class="col-md-4">
        <select class="form-control" name="year" required>
            <option value="">Select Year</option>
            @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                </option>
                @endfor
        </select>
    </div>
    <div class="col-md-4">
        <select class="form-control" name="month">
            <option value="">Select Month</option>
            <option value="1">AllMonth</option>
            
            @for($month = 1 ; $month <= 12; $month++) @php
                $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                value="{{ $month_name }}">{{ $month_name }}</option>
                @endfor
        </select>
    </div>

    <div class="col-md-4">
        <input type="text" class="form-control" name="rate" id="">
    </div>
    
    
</div>

<div class="row">

   

    <div class="col-md-4">
        <label style="display: flex;">AccountName<span class="text-danger">*</span></label>
    </div>

</div>

<div class="row form-group">
    <div class="col-md-4">
     <select name="account" id="" class="form-control">

        @foreach ( $chartofaccount as $chart)
        <option value="{{  $chart->id }}">{{  $chart->name }}</option>
            
        @endforeach
     </select>
    </div>

</div>





<div class="row">
                        
    <div class="col-md-4">
     <label style=" font-weight:bold;text-align:center; display:inline-block;">Signature Of Section Officer(Accounts)IBSc<span class="text-danger"></span></label>
    </div>
     
     <div class="col-md-3">
         <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Secretary IBSc<span class="text-danger"></span></label>

     </div>

     <div class="col-md-3">
        <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Director IBSc<span class="text-danger"></span></label>

    </div>
 </div>

 <div class="row">

    <div class="col-md-4">
        <input type="file" class="form-control" name="section_officer" id="" required>
    </div>

    <div class="col-md-2">
        <input type="file" class="form-control" name="secretary" id="" required>
    </div>

    <div class="col-md-4">
        <input type="file" class="form-control" name="director" id="" required>
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