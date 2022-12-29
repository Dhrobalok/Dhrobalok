<!DOCTYPE html>
<html>

<head>
    <title>Pay Slip</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        footer:html_reportFooter;
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
    .table tbody tr th {
        border: 1px solid #000;
        padding: 2px;
        text-align: center;
        font-size: 11pt;
        font-weight: 700;
    }

    .footer {
        padding-top: 70px;
        width: 100%;

    }

    .footer tr th {
        text-align: center;
        width: 25%;
        font-size: 11pt;
        padding-bottom: 10px;

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
<htmlpagefooter name="reportFooter" style="display:none;">
        <div>
            @php
              date_default_timezone_set('Asia/Dhaka');
            @endphp
           <p style = "text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
    </htmlpagefooter>
    @php $generate_info = $salary_generate -> generate_info;
    $employee_info = $salary_generate -> employee;
    $basic_salary = $employee_info -> payScale -> payscale_detail -> salary_amount;
    $inWord =  new \NumberToWords\NumberToWords();
    $inWord = $inWord-> getNumberTransformer('en');
  
    @endphp
    <div class="container">
    <h3 style = "text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
            <h4 style = "text-align:center;line-height:20px">{{ $company -> company_address  }}</h4>
            <h4 style = "text-align:center;text-transform:uppercase">Pay Slip</h4>

        <table class="table" style = "border:1px solid black">
            <thead>

                <tr style="border:none;">
                    <th style="border:none;text-align:left;padding-left:20px;padding-top:20px;"><b>Employee ID : </b></th>
                    <th style="border:none;text-align:left;padding-top:20px;">{{ $employee_info -> user_id }}</th>
                    <th style="border:none;text-align:left;padding-top:20px;"><b>Name : </b></th>
                    <th style="border:none;text-align:left;padding-top:20px;">{{ $employee_info -> name }}</th>
                </tr>
                <tr style="border:none">
                    <th style="border:none;text-align:left;padding-left:20px;"><b>Department : </b></th>
                    <th style="border:none;text-align:left">{{ $employee_info -> department -> name }}</th>
                    <th style="border:none;text-align:left"><b>Designation : </b></th>
                    <th style="border:none;text-align:left">{{ $employee_info -> designation -> name }}</th>
                </tr>
                
                <tr style="border:none">
                    <th style="border:none;text-align:left;padding-left:20px;"><b>Pay Date :</b> </th>
                    <th style="border:none;text-align:left">{{ date('Y-m-d') }}</th>
                    <th style="border:none;text-align:left"><b>Date of Joining :</b> </th>
                    <th style="border:none;text-align:left">{{ $employee_info -> joining_date }}</th>
                </tr>
                <br>
                <tr style="border:none">
                    <th style="border:none;text-align:left;padding-left:20px;padding-bottom:20px;"><b>Account Number : </b></th>
                    <th style="border:none;text-align:left;padding-bottom:20px;">{{ $employee_info -> account_no }}</th>
                    <th style="border:none;text-align:left;padding-bottom:20px;"><b>Payslip Period : </b></th>
                    <th style="border:none;text-align:left;padding-bottom:20px;">{{ $generate_info -> month }} , {{ $generate_info -> year }}</th>
                </tr>

            </thead>
        </table>
        <br>
        @php 
          $segments = $salary_generate -> details; 
                  
        @endphp
           
         <table class="table">
            @foreach ($segments as $segment )
            
            <thead>

                <tr >
                    <th><b>Earnings</b></th>
                    <th><b>Amount</b></th>
                    <th><b>Deductions</b></th>
                    <th><b>Amount</b></th>
                </tr>
                <tr>
                    <th>Basic Salary</th>
                    <th style = "text-align:right">{{ number_format($salary_generate -> basic_salary,2) }}</th>
                    <th>Provident Fund</th>
                    <th style = "text-align:right">{{ number_format($segment -> amount,2) }}</th>
                </tr>
                <tr>
                    <th>House Allowance</th>
                    <th style = "text-align:right">{{ number_format($segment -> amount,2) }}</th>
                    <th>Home Building Loan</th>
                    <th style = "text-align:right">{{ number_format($segment -> amount,2) }}</th>
                </tr>
                <tr>
                    <th>Education Allowance</th>
                    <th style = "text-align:right">{{ number_format($segment-> amount,2) }}</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Health Allowance</th>
                    <th style = "text-align:right">{{ number_format($segment -> amount,2) }}</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Bonus</th>
                    <th style = "text-align:right">{{ number_format($segment -> amount + $segment -> amount,2)  }}</th>
                    <th></th>
                    <th></th>
                </tr>
                @endforeach

                <tr>
                    <th><b>Total Earnings</b></th>
                    <th style = "text-align:right"><b>{{ number_format($salary_generate -> total_add_amount,2) }}</b></th>
                    <th><b>Total Deductions</b></th>
                    <th style = "text-align:right"><b>{{ number_format($salary_generate -> total_deduction_amount,2) }}</b></th>
                </tr>
                <tr>
                    <th colspan = "2" style = "font-weight:bold">
                        InWords : {{ str_replace("-"," ",Str :: title($inWord -> toWords($salary_generate -> net_amount))) }} Taka And Zero Paisa Only
                    </th>
                    
                    <th colspan="1" style = "text-align:right"><b>Net</b></th>

                    <th style = "text-align:right"><b>{{ number_format($salary_generate -> net_amount,2) }}</b></th>
                </tr>
            </thead>
        </table>
        <table class="footer">
            <tr>
                <th style="text-align:left">
                    <p>Employee Signature -----------------</p>
                </th>
            </tr>
        </table> 
    </div>
</body>

</html>