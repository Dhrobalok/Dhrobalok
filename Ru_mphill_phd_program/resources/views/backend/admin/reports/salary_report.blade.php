<!DOCTYPE html>
<html>

<head>
    <title>Salary Sheet</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 35px;
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
        font-size: 10pt;
    }

    .footer {
        padding-top: 70px;
        width: 100%;
    }

    .footer tr td {
        text-align: right;
        width: 25%;
        font-size: 10pt;
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
        font-size: 10pt;
    }
    </style>
</head>

<body>
    <div class="container">
    <h3 style = "text-align:center">{{ $company -> company_name  }}</h3>
       <h4 style = "text-align:center;line-height:20px">{{ $company -> company_address  }}</h4>

            <h3 style = "text-align:center;text-transform:uppercase">GENERATED SALARY SHEET FOR THE MONTH OF  {{ $month }} {{ $year }}</h3>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th colspan="6">Addition</th>
                 
                    <th colspan="6">Deduction</th>
                   
                </tr>
                <tr>
                    <th>Sl. No.</th>
                    <th>Employee Name</th>
                    <th>Basic</th>
                    <th>House Allowance</th>
                    <th>Health Allownce</th>
                    <th>Education Allownce</th>
                    <th>Bonus</th>
                    <th>Total</th>
                    <th>Provident Fund</th>
                    <th>House Loan</th>
                    
                    <th>Net Salary</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; @endphp
                @foreach($records as $record)
                @php
                $basic_salary = $record -> basic_salary;
                
                @endphp
                <tr>
                    @php $sl = $sl + 1 @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ $record -> employee -> name }}</td>
                    <td style = "text-align:right">{{ $record -> basic_salary }}</td>
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

   <td style = "text-align:right">{{$segment -> amount}}</td>



@elseif($segment->segment_id==2) 

   
    <td style = "text-align:right">{{ $segment -> amount }}</td> 




@elseif($segment->segment_id==3) 

   <td style = "text-align:right">{{ $segment -> amount }}</td>




@elseif($segment->segment_id==4) 

   @php
   $amount3= $segment->amount;
       
   @endphp
   




@elseif($segment->segment_id==5) 
@php
$amount4=$segment->amount;
@endphp

    
   
   <td style = "text-align:right">{{ $amount3+ $amount4}}</td>



   <td style = "text-align:right">{{ $record -> total_add_amount }}</td> 

@elseif($segment->segment_id==6) 

   <td style = "text-align:right">{{ $segment -> amount }}</td>




@elseif($segment->segment_id==7) 

   <td style = "text-align:right">{{ $segment -> amount }}</td>


  

@elseif($segment->segment_id==8) 

   <td style = "text-align:right">{{ $segment -> amount }}</td>



@endif  



@endfor


  
<td style = "text-align:right">{{ $record -> total_deduction_amount }}</td>
<td style = "text-align:right">{{ $record -> net_amount }} </td>

                     {{-- 
                    <td style = "text-align:right">{{ $segments[0] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[1] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[2] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[3] -> amount + $segments[4] -> amount  }}</td>
                    <td style = "text-align:right">{{ $record -> total_add_amount }}</td>
                    <td style = "text-align:right">{{ $segments[6] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[7] -> amount  }}</td>
                    <td style = "text-align:right">{{ $record -> total_deduction_amount }}</td>
                    <td style = "text-align:right">{{ $record -> net_amount }} </td> --}}

                </tr>
                @endforeach
                <tr>
                    <td colspan = "9" style = "text-align:left;font-weight:bold">In words : {{ $Inwords." taka only" }}</td>
                    <td colspan="2" style="text-align:right"><b>Total : </b></td>
                    <td><b>{{ $grand_total }}</b></td>
                </tr>
                

            </tbody>

        </table>


        <table class="footer">

        </table>
    </div>
</body>

</html>