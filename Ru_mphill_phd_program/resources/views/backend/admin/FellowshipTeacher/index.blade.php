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
           <p style="text-align:center;font-weight:bold;font-size:16px;">All Fellowship Teacher</p>

       </div>


    

  </div>
  
  <div class="block-header block-header-default">
     <h3 class="block-title">
         
    <a class="mr-2 btn f-100 btn-sm" href="{{ route('Teacher.create') }}"
    style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px;float:right;"><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Teacher"></i></a>

        {{-- <a class="mr-2 btn f-100 btn-sm" id = "decline_btn" 
                    href="#" data-target = "#decline" data-toggle = "modal"
                    style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                        class="fa fa-times mr-2"></i>Partial Payment </a> --}}
    </h3> 
    
 
   
    
</div>

<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Name</th>
                <th class="d-none d-sm-table-cell text-center">Email</th>
                <th class="d-none d-sm-table-cell text-center">Photo</th>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($teacher as $teaches )
           
                
            
            <tr>
                <td class="text-center">{{ $teaches->id }}</td>
                <td class="text-center">{{ $teaches->name }}</td>
                <td class="text-center">{{ $teaches->email }}</td>
                <td class="text-center"><img src = "{{ URL :: to($teaches ->image) }}" height = "100px" width = "100px"> </td>
            </tr>

            @endforeach
        </tbody>
    </table>
 </div>
</div>  
</div>
@endsection