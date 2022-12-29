<!DOCTYPE html>
<html>

<head>
    <title>Salary Sheet</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        header:html_reportHeader;
        footer:html_reportFooter;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 30px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        border: 1px solid #000;
        padding: 2px;
        text-align: center;
        font-size: 12pt;
    }

    .footer {
        padding-top: 70px;
        width: 100%;
    }

    .footer tr td {
        text-align: right;
        width: 25%;
        font-size: 12pt;
        font-weight: bold;
    }

    .heading h3 {
        text-align: center;
        text-decoration: none;
        margin-bottom: 5px;

    }

    .heading p {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 12pt;
    }
   
    </style>
</head>

<body>
     <htmlpageheader name="reportHeader" style="display:none">
        <div>
            
            <h3 style = "text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
            <h4 style = "text-align:center;line-height:10px">{{ $company -> company_address  }}</h4>
            <h4 style = "text-align:center;text-transform:uppercase;line-height:10px">SALARY SHEET FOR THE MONTH OF  {{ $month }} {{ $year }}</h4>
        </div>
    </htmlpageheader>
    <htmlpagefooter name="reportFooter" style="display:none;">
        <div>
            @php
              date_default_timezone_set('Asia/Dhaka');
            @endphp
           <p style = "text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
    </htmlpagefooter>
    
    <div class="container">
      
    @php $grand_total = 0;$sl = 0; $total = 0;
         $inWord =  new \NumberToWords\NumberToWords();
         $inWord = $inWord-> getNumberTransformer('en');
    @endphp
    
     
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th colspan="6">Addition</th>
                    <th colspan="3">Deduction</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Sl. No.</th>
                    <th>Employee Name</th>
                    <th>{{ $type }}</th>
                    <th>Basic Salary</th>
                    <th>House Allowance</th>
                    <th>Health Allowance</th>
                    <th>Education Allowance</th>
                    <th>Bonus</th>
                    <th>Total</th>
                    <th>Provident Fund</th>
                    <th>House Loan</th>
                   
                    <th>Net Salary</th>
                </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                @php
              
                 $employees = $group -> employees;
                 
                @endphp
                @foreach($employees as $employee)
                @php
                $record = App\Models\EmployeeSalary :: where('salary_generate_id',$generate_id)
                                                      ->where('employee_id',$employee -> id)
                                                      ->first();
               
               

                @endphp
                @if(!is_null($record))
                <tr>
                    @php $sl = $sl + 1 @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ $employee -> name }}</td>
                    @if($type == 'Department')
                      <td>{{ $employee -> department -> name }}</td>
                    @elseif($type == 'Class')
                      <td>{{ $employee -> type -> name }}</td>
                    @endif
                    <td style = "text-align:right">{{ number_format($record -> basic_salary,2) }}</td>
                    @php 
                     $segments =  App\Models\EmployeeSalaryDetails :: where('salary_generate_id',$generate_id)
                                               ->where('employee_id',$record -> employee -> id)
                                               ->orderBy('segment_id','asc')
                                               ->get(); 
                                               $c=count($segments);
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
                     
                        <td style = "text-align:right">{{ number_format($segment -> amount,2)}}</td>
                     
                     
                     
                     @elseif($segment->segment_id==2) 
                     
                        
                         <td style = "text-align:right">{{ number_format($segment -> amount,2) }}</td> 
                     
                     
                     
                     
                     @elseif($segment->segment_id==3) 
                     
                        <td style = "text-align:right">{{  number_format($segment -> amount,2) }}</td>
                     
                     
                     
                     
                     @elseif($segment->segment_id==4) 
                     
                        @php
                        $amount3= $segment->amount;
                            
                        @endphp
                        
                     
                     
                     
                     
                     @elseif($segment->segment_id==5) 
                     @php
                     $amount4=$segment->amount;
                     @endphp
                     
                         
                        
                        <td style = "text-align:right">{{ number_format($amount3+ $amount4,2)}}</td>
                     
                     
                     
                        <td style = "text-align:right">{{ number_format($record -> total_add_amount,2) }}</td> 
                     
                     @elseif($segment->segment_id==6) 
                     
                        <td style = "text-align:right">{{ number_format($segment -> amount,2) }}</td>
                     
                     
                     
                     
                     @elseif($segment->segment_id==7) 
                     
                        <td style = "text-align:right">{{ number_format($segment -> amount,2) }}</td>
                     
                     
                       
                     
                     @elseif($segment->segment_id==8) 
                     
                        <td style = "text-align:right">{{ number_format($segment -> amount,2) }}</td>
                     
                     
                     
                     @endif  
                     
                     
                     
                     @endfor
                     
                     
                       
                     <td style = "text-align:right">{{ number_format($record -> total_deduction_amount,2) }}</td>
                     <td style = "text-align:right">{{ number_format($record -> net_amount,2) }} </td>

                    {{--  
                    <td style = "text-align:right;">{{ number_format($segments[0] -> amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($segments[1] -> amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($segments[2] -> amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($segments[3] -> amount + $segments[4] -> amount,2)  }}</td>
                    <td style = "text-align:right">{{ number_format($record -> total_add_amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($segments[6] -> amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($segments[7] -> amount,2)  }}</td>
                    <td style = "text-align:right">{{ number_format($record -> total_deduction_amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($record -> net_amount,2) }} </td>
                    --}}
                    @php
                       $total += $record -> net_amount;
                       $grand_total += $record -> net_amount;
                    @endphp
                </tr>
                @endif
                @endforeach
                @endforeach
                <tr>
                    <td colspan = "11" style = "font-weight:bold;text-align:left">InWords : {{ str_replace("-"," ",Str :: title($inWord -> toWords($total))) }} Taka Only</td>
                    <td style="text-align:right"><b>Total  </b></td>
                    <td class = "text-right"><b>{{ number_format($total,2) }}</b></td>
                </tr>
            </tbody>

        </table>
      
       <br>
      
    </div>
</body>

</html>