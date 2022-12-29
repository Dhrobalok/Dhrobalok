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
       <h3 style = "text-align:center"><img src = "{{ URL :: to($company -> company_logo) }} " height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
       <h4 style = "text-align:center;line-height:20px">{{ $company -> company_address  }}</h4>

            <h3 style = "text-align:center;text-transform:uppercase">PRE GENERATED SALARY SHEET FOR THE MONTH OF  {{ $month }} {{ $year }}</h3>
       

        <table class="table">
            <thead>
                <tr>

                    <th colspan="6">Addition</th>

                    <th colspan="6">Deduction</th>

                </tr>
                <tr>
                    <th>Sl. No.</th>
                    <th>Employee Name</th>
                    <th>Basic Salary</th>
                    <th>House  Allowance</th>
                    <th>Health Allowance</th>
                    <th>Education Allowance</th>
                    <th>Bonus</th>
                    <th>Total</th>
                    <th>Provident Fund</th>
                    <th>House Loan</th>
                  
                    <th>Total</th>
                    <th>Net</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; $grand_total = 0;@endphp
                @foreach($employees as $employee)
                @php $total_addition = 0; $total_deduction = 0; @endphp
                @php
                 //$pf=App\Models\EmployeePFContributionRate::get();
                $pf_contribution = $employee -> employee_info -> getEmployeePFAmount -> contributed_amount;
                @endphp
                <tr>
                    @php $segments = $employee -> employee_info -> segment_wise_amount;@endphp
                    @php $sl = $sl + 1;
                    $basic_salary = $employee -> employee_info -> payscale -> payscale_detail -> salary_amount;

                    $employee_info = $employee -> employee_info;
                    $basic_salary = $employee_info -> payscale -> payscale_detail -> salary_amount;
                    $bonus = $employee_info -> hasBonus == null ? 0 : (($basic_salary * $employee_info ->
                    hasBonus -> bonus_percentage) / 100.00);
                    $emi = $employee_info -> getMonthlyEMI ? $employee_info -> getMonthlyEMI  -> emi : 0;
                   
                    $total_addition = $basic_salary + $segments[0] -> amount + $segments[1] -> amount +
                    $segments[2] -> amount + $bonus;
                    $total_deduction = $emi + $pf_contribution;
                    @endphp
                    <td>{{ $sl }}</td>
                    <td>{{ $employee -> employee_info ->  name }}</td>
                    <td style = "text-align:right">{{ $basic_salary }}</td>

                    <td style = "text-align:right">{{ $segments[0] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[1] -> amount }}</td>
                    <td style = "text-align:right">{{ $segments[2] -> amount }}</td>
                    <td style = "text-align:right">{{ $bonus }}</td>
                    <td style = "text-align:right">{{ $total_addition }}</td>
                    
                    <td style = "text-align:right">{{ $pf_contribution }}</td>
                    <td style = "text-align:right">{{ $emi }}</td>
                    
                    <td style = "text-align:right">{{ $total_deduction }}</td>
                    <td style = "text-align:right">{{ $total_addition - $total_deduction }}</td>
                    @php $grand_total = $grand_total + ($total_addition - $total_deduction); @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="11" style="text-align:right"><b>Grand Total </b></td>
                    <td><b>{{ $grand_total }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>