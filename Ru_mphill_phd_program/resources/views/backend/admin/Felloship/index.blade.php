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
<div class="card">
   
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
           <p style="text-align:center;font-weight:bold;font-size:16px;"></p>

       </div>
</div>

<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Name</th>
                <th class="d-none d-sm-table-cell text-center">Student_Id</th>
                <th class="d-none d-sm-table-cell text-center">FellowShip Report</th>
                <th class="d-none d-sm-table-cell text-center">Supervisor Report</th>
                
            </tr>
        </thead>

        <tbody>
            @php
                $i=1;
            @endphp
         
            @foreach ($allfellow as $teaches )
              @php
                  $student=App\Models\User::where('student_id',$teaches->roll)->first();
                  
              @endphp
                
            
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td class="text-center">{{ $student->name }}</td>
                <td class="text-center">{{ $student->student_id }}</td>
                 <td class="text-center"><a href="{{ route('fellowships.report',['student_id' => $student->student_id]) }}"><i class="fas fa-download"></i></a></td>
                 <td class="text-center"><a href="{{ route('ThesisBill.report',['student_id' => $student->student_id]) }}"><i class="fas fa-download"></i></a></td>
                
                
            </tr>

            @endforeach
        </tbody>
    </table>
 </div>
</div>  
@endsection