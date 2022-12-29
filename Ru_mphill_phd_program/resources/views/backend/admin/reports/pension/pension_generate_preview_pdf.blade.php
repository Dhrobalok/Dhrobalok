<!DOCTYPE html>
<html>

<head>
    <title>Pension Sheet</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
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
        padding: 2px;
        text-align: center;
        font-size: 10pt;
        padding-top:10px;
        border:1px solid black;
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
        <h4 style = "text-align:center;line-height:5px">Pension sheet for the month of {{ $month }} {{ $year }}({{ $message }})</h4>
      
        <table class="table">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Grade</th>
                    <th>PayScale</th>
                    <th>Last Basic Pay</th>
                    <th>Basic Pension</th>
                    <th>Health Allowance</th>
                    <th>Bonus</th>
                    <th>Total</th>
                </tr>
                
            </thead>
            <tbody>
                @php 
                   $grand_total = 0;
                @endphp
                @for($i = 0; $i < count($users); $i++)

                @php
                   $total = $users[$i] -> basic_pension_amount
                            + $users[$i] -> health_fee
                            + $bonus[$i];
                   $grand_total += $total;
                @endphp
                <tr style = "text-align:center">
                   <td>
                       {{ $users[$i] -> getEmployee -> name }}
                   </td>
                   <td>{{ $users[$i] -> getGrade -> name  }}</td>
                   <td>{{ $users[$i] -> getPayScale -> name  }}</td>
                   <td style = "text-align:right">{{ $users[$i] -> last_basic_pay }}</td>
                   <td style = "text-align:right">{{ $users[$i] -> basic_pension_amount }}</td>
                   <td style = "text-align:right">{{ $users[$i] -> health_fee }}</td>
                   <td style = "text-align:right">{{ $bonus[$i] }}</td>
                   <td style = "text-align:right">{{ $total }}</td>
                </tr>
                @endfor
                <tr>
                    <td colspan = "4" style = "text-align:right">
                         Total
                    </td>
                    <td style = "text-align:right">{{ $basic_pension_total }}</td>
                    <td style = "text-align:right">{{ $health_allowance_total }}</td>
                    <td style = "text-align:right">{{ $bonus_total }}</td>
                    <td style = "text-align:right">{{ $grand_total }}</td>
                </tr>
                <tr>
                    <td colspan = "8" style = "text-align:center;text-transform:uppercase;font-weight:700;font-size:14px;">
                        InWords : {{ $Inwords }}
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>