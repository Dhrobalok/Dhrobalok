@extends('backend.admin.index')
@section('content')

<div class="container-fluid">
    <div class="card border-0">
       
        <div class="card-body">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class = "f-100">{{ $company -> company_name  }}</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <h4 class = "f-100">{{ $company -> company_address  }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="f-100 text-center text-uppercase">Generated Salary Sheet for the month of {{ $month }}
                    {{ $year }}
                </h4>
                <input type="hidden" id="year" value="{{ $year }}">
                <input type="hidden" id="month" value="{{ $month }}">
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">

                    <table class="table table-sm table-bordered table-striped bg-white text-center text-black">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="6">Addition</th>

                                <th colspan="6">Deduction</th>

                            </tr>
                            <tr>
                                <th style = "font-size:18px;">Sl. No.</th>
                                <th>Employee Name</th>
                                <th>Basic</th>
                                <th>House Rent Allownce</th>
                                <th>Health Allownce</th>
                                <th>Education Allownce</th>
                                <th>Bonus</th>

                                <th>Total</th>
                                <th>Provident Fund</th>
                                
                                <th>House Building Loan</th>
                                
                               
                                <th>Net Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 0; @endphp
                            @foreach($records as $record)
                            @php
                            $basic_salary = $record -> basic_salary;
                            $bonus = $record -> employee -> hasBonus == null ? 0 : (($basic_salary * $record -> employee
                            -> hasBonus -> bonus_percentage) / 100.00);
                            $loan = $record -> employee -> has_home_loan == null ? 0 : $record -> employee ->
                            has_home_loan -> monthly_deduction;

                            @endphp
                            <tr>
                                @php $sl = $sl + 1;
                                 @endphp
                                <td>{{ $sl }}</td>
                                <td>{{ $record -> employee -> name }}</td>
                                <td>{{ $record -> basic_salary }}</td>
                                @php 
                                  $segments = App\Models\EmployeeSalaryDetails::where('salary_generate_id',$generate_id)
                                               ->where('employee_id',$record -> employee -> id)
                                               ->orderBy('segment_id','asc')
                                               ->get();
                                              // dd($segments);
                                           
                                               $c=count($segments);
                                              // $t=$c;
                                
                                               
                                            
                                @endphp
                              
                                   
                             @for($i=0;$i<$c;$i++)

                                 @php
                                     $id=$i+1;
                                    $segment = App\Models\EmployeeSalaryDetails::where('salary_generate_id',$generate_id)
                                               ->where('segment_id',$id)
                                               
                                               ->first();
                                              // dd($segment->segment_id);
                                              
                                           
                                 @endphp
                           
                                           
                                           
                                               
                                            
                                
                             @if($segment->segment_id==1) 
                                
                                    <td>{{$segment -> amount}}</td>
                                
                            

                            @elseif($segment->segment_id==2) 
                                
                                    
                                     <td>{{ $segment -> amount }}</td> 
                                
                               
                            

                                @elseif($segment->segment_id==3) 
                                
                                    <td>{{ $segment -> amount }}</td>


                                    
                               
                               

                                 @elseif($segment->segment_id==4) 
                                
                                    @php
                                    $amount3= $segment->amount;
                                        
                                    @endphp
                                    
                                
                               
                             

                                @elseif($segment->segment_id==5) 
                                @php
                                $amount4=$segment->amount;
                                @endphp
                                
                                     
                                    
                                    <td>{{ $amount3+ $amount4}}</td>

                                    <td>{{ $record -> total_add_amount }}</td> 
                                
                               

                                

                                @elseif($segment->segment_id==6) 
                                
                                    <td>{{ $segment -> amount }}</td>
                                
                               
                                

                                @elseif($segment->segment_id==7) 
                                
                                    <td>{{ $segment -> amount }}</td>
                                
                               
                                   

                                @elseif($segment->segment_id==8) 
                                
                                    <td>{{ $segment -> amount }}</td>
                                

                             
                                @endif  
                                
                               
                        
                                @endfor

                                
                                   
                                <td>{{ $record -> total_deduction_amount }}</td>
                                <td>{{ $record -> net_amount }} </td>
                                
                                    
                                {{--  
                                    <td>{{ $segments[0] -> amount }}</td>
                               <td>{{ $segments[1] -> amount }}</td>
                               <td>{{ $segments[2] -> amount }}</td>
                               <td>{{ $segments[3] -> amount + $segments[4] -> amount }}</td>
                            

                                
                                <td>{{ $record -> total_add_amount }}</td>
                                <td>{{ $segments[5] -> amount }}</td>
                                <td>{{ $segments[5] -> amount }}</td>
                                <td>{{ $record -> total_deduction_amount }}</td>
                                <td>{{ $record -> net_amount }} </td>
                                    
                                    
                               --}} 

                               
                                 
                            
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="9" class = "text-left font-weight-bold">Inwords : {{ $Inwords." taka only" }}</td>
                                <td colspan="2" style="text-align:right"><b>Grand Total : </b></td>
                                <td><b>{{ $grand_total }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
 <style>
   .card
   {
       min-width:auto;
       
   }
   tr,td,th
   {
       font-size:18px;
   }
 </style>
@endpush