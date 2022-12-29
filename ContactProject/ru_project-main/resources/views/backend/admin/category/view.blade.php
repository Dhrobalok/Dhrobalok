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
        {{-- <h5 style="font-size:16px; font-weight:bold;text-align: center;">Institute&nbspof&nbspBiological&nbspSciences</h5> --}}
        <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>


    </div>

        <div class="col-md-12">
            <p style="text-align: center; ">
                <img src="{{ asset('company_pic/ru-logo.png') }}" alt="">
            </p>
       </div>

       <div class="col-md-12">
           <p style="text-align:center;font-weight:bold;font-size:16px;">Category Information</p>

       </div>

       <div class="col-md-12">
        {{-- <p style="float:left;font-weight:bold;font-size:16px;"><a href="{{ route('category.create') }}">New Category</a></p> --}}

      </div>

      <div class="block-content block-content-full">
        <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Id</th>
                    <th class="d-none d-sm-table-cell text-center">Office Name</th>
                    <th class="d-none d-sm-table-cell text-center">Office No</th>
                    <th class="d-none d-sm-table-cell text-center">Type</th>
                    <th class="d-none d-sm-table-cell text-center">Cell.No</th>
                    <th class="d-none d-sm-table-cell text-center">Email</th>
                    {{-- <th class="d-none d-sm-table-cell text-center">FellowShip Report</th>
                    <th class="d-none d-sm-table-cell text-center">Supervisor Report</th> --}}
                    
                </tr>
            </thead>
            @if ($allinformation)
            @php
                $i=1
            @endphp
            
                @php
                    $categoryname=App\Models\Categor::where('id',$allinformation->category_id)->first()
                @endphp
            
           
                
           
            <tbody>
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center">{{ $allinformation->officename }}</td>
                    <td class="text-center">{{ $allinformation->officeno }}</td>
                    <td class="text-center">{{$categoryname->category_name  }}</td>
                    <td class="text-center">{{ $allinformation->cell_no }}</td>
                    <td class="text-center">{{ $allinformation->email }}</td>

                </tr>
            </tbody>
            @endif
            
            </table>
    </div>
@endsection
