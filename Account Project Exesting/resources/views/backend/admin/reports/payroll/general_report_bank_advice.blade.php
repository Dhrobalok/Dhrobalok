<!DOCTYPE html>
<html>

<head>
    <title>Bank Advice</title>
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
        padding-top: 5px;
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
        font-size: 12pt;
        
    }
    td
    {
        font-size:5pt;
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
    
    <div class="container">
        <b>The Manager</b>
        <p style = "margin:0;
        padding:0px;">Sonali Bank Limited</p>
        
            <p style = "margin:0;
        padding:0px;">Dear Sir,</p>
        <div class="heading">
            <p style = "padding-top:5px;"><b>Payment Advice from {{ $company -> company_name }} A/C # for the month of {{ $month }} {{ $year }}</b></p>
        </div>
        
            <p style = "margin:0;
        padding:0px;">Please make the payroll transfer from above account number to the below metioned account numbers towards employee salaries : </p>
        @php $grand_total = 0; @endphp
        <br>
        <table class="table">
            <thead>
                
                <tr>
                    <th>Sl. No.</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>{{ $type }}</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>InWords</th>
                </tr>
            </thead>
            <tbody>
            
            @php 
              $sl = 0;
              $total = 0;
            @endphp
            @foreach($groups as $group)
                @php  
                     $employees = $group -> employees;
                     $inWordConverter = new \NumberToWords\NumberToWords();
                     $inWordConverter = $inWordConverter->getNumberTransformer('en');
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
                    <td>{{ $employee -> employee_reg_id }}</td>
                    <td>{{ $employee -> name }}</td>
                    @if($type == 'Department')
                    <td>{{ $employee -> department -> name }}</td>
                    @elseif($type == 'Class')
                      <td>{{ $employee -> type -> name }}</td>
                    @endif
                    <td>{{ $employee -> account_no }}</td>
                    <td style = "text-align:right;font-weight:bold">{{ number_format($record -> net_amount,2) }} </td>
                    <td>{{ str_replace("-"," ",Str :: title($inWordConverter -> toWords(intval($record -> net_amount)))) }} Taka Only</td>
                   

                </tr>
                @php
                   $total += $record -> net_amount;
                   $grand_total += $record -> net_amount;
                @endphp
                @endif
                @endforeach
                @endforeach
                <tr>
                    <td colspan = "4" style = "font-weight:bold">
                        InWords : {{ str_replace("-"," ",Str :: title($inWordConverter -> toWords($total))) }} Taka And Zero Paisa Only
                    </td>
                    <td style = "font-weight:bold">Total</td>
                    <td style = "text-align:right;font-weight:bold">{{ number_format($total,2) }} </td>
                    <td></td>
                </tr>
             
            </tbody>

        </table>

        <br>
      


        
             <p style = "margin:0;padding:0;margin-top:50px;">Yours Sincerely</p>
             <p style = "margin:0;padding:0"><b>for {{ $company -> company_name }}</b></p>
           
    </div>
</body>

</html>