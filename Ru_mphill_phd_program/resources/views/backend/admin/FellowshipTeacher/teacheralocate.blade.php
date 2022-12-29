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
           <p style="text-align:center;font-weight:bold;font-size:16px;">Student List</p>

       </div>


    

  </div>
  <div class="block-header block-header-default mb-4">
    <h3 class="block-title"></h3>
    <a class="btn btn-primary f-100" href="{{ route('teacher.alocation') }}"><i class = "fa fa-angle-left mr-2"></i>Back</a>
</div>
  
  {{-- <div class="block-header block-header-default">
     <h3 class="block-title">
         
    <a class="mr-2 btn f-100 btn-sm" href="{{ route('Teacher.create') }}"
    style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px;float:right;"><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Teacher"></i></a> 

        {{-- <a class="mr-2 btn f-100 btn-sm" id = "decline_btn" 
                    href="#" data-target = "#decline" data-toggle = "modal"
                    style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                        class="fa fa-times mr-2"></i>Partial Payment </a> 
    </h3> 
    
 
   
    
</div> --}}


<div class="block-content block-content-full">
    <div class="table-responsive">

    <form action="{{ route('alocate.confirm') }}" method="post">
        @csrf
        
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Student Roll</th>
                <th class="d-none d-sm-table-cell text-center">Student Name</th>
                <th class="d-none d-sm-table-cell text-center">Student Email</th>
                <th class="d-none d-sm-table-cell text-center"> </th>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($user as $teaches )
           
            @php
            $studentcheck=App\Models\Teacheralocate::where('student_id',$teaches->student_id)
            
            ->first();
        @endphp  
            
            <tr>
                @if(!$studentcheck)
                <td class="text-center">{{ $teaches->student_id }}</td>
                <td class="text-center">{{ $teaches->name }}</td>
                <td class="text-center">{{ $teaches->email }}</td>
                
                
                
                 <input type="hidden" name="teacherid" value="{{$teacher_id}}">
                    <td class="text-center"> <label class="checkbox-inline px-2 f-color">
                        <input type="checkbox" name="studentid[]" value="{{ $teaches->student_id }}" ></label>
                     </td>
                         
                
                {{-- @else
                <td class="text-center"> <label class="checkbox-inline px-2 f-color">
                    <input type="checkbox" name="studentid[]" value="{{ $teaches->student_id }}"></label>
                 </td>
                     <input type="hidden" name="teacherid" value="{{$teacher_id}}"> --}}
                     
                 @endif
                    
               </tr>

            @endforeach
           
        </tbody>
    </table>
    <div class="row text-center">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <button class="btn btn-primary f-100" onclick="update_permissions();">Save Changes</button>
        </div>
    </div>
</div>

</form>
</div>  
</div>
</div>




@endsection