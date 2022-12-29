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
           <p style="text-align:center;font-weight:bold;font-size:16px;">Pay Bill</p>

       </div>
</div>
@if (Session::has('msg'))
    <div class="alert alert-info">
        <p style="text-align: center;">
            {{ Session::get('msg') }}
        </p>
        
    </div>
    @endif
<div class="block-content block-content-full">
    <div class="table-responsive">
        <form action="{{ route('pay.store') }}" method="POST">
            
            @csrf
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Name</th>
                <th class="d-none d-sm-table-cell text-center">Month</th>
                <th class="d-none d-sm-table-cell text-center">Year</th>
                <th class="d-none d-sm-table-cell text-center">Pay Section</th>
                <th class="d-none d-sm-table-cell text-center">Ship No.</th>
                <th class="d-none d-sm-table-cell text-center">Pay Amount</th>
                
                
            </tr>
        </thead>
        
        <tbody>
            
            @php
                $i=1;
            @endphp
            @foreach ($userall as $user)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td class="text-center">{{ $user->name }}</td>
            <input type="hidden" name="studentid[]" value="{{ $user->student_id }}">
          
            <td class="text-center">
                <select class="form-control" name="month[]">
                    <option value="">Select Month</option>
                    <option value="1">AllMonth</option>
                    
                    @for($month = 1 ; $month <= 12; $month++) @php
                        $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                        value="{{ $month_name }}">{{ $month_name }}</option>
                        @endfor
                </select>
            </td>

               <td class="text-center">
                <select class="form-control" name="year[]" required>
                    <option value="">Select Year</option>
                    @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                        </option>
                        @endfor
                </select>
            </td>

            

            <td class="text-center">
                <select name="paystate[]" id="" class="form-control" required>
                    <option value="">select option</option>
                    <option value="1">pay bill</option>
                    <option value="2">phd convertions</option>
                
               </select></td>

               <td class="text-center"><input type="text" class="form-control" name="shipnum[]" required></td>

            <td class="text-center"><input type="number" class="form-control" name="amount[]" placeholder="Taka" required></td>
        </tr>

            @endforeach
            
        
        </tbody>

        
        
    </table>
    <div class="row text-center">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <button class="btn btn-primary f-100" onclick="update_permissions();">Save Change</button>
        </div>
    </div>
    </div>

</form>
    </div>
</div>
</div>
@endsection