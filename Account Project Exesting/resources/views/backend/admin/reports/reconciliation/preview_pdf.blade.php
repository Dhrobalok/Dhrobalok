<!DOCTYPE html>
<html>

<head>
    <title>Bank Reconciliation Report</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "courier", Arial, Georgia;
    }


    .container {
        width: 100%;
    }


    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 2px;
        text-align: center;
        font-size: 12pt;
        padding-top: 10px;
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

    .content-center {
        margin-left:10%;
        margin-right:10%;
        width: 80%;
    }

    .content-right {
        float: right;
        width: 50%;
    }
    .table tbody tr .row-space
    {
        padding-top:50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h3 style="text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px">Bank Reconciliation Statement{{ $is_preview  == 1 ? '(Preview)' : '' }}</h4>
        <h4 style="text-align:center;line-height:5px;padding-bottom:20px"> {{ date('F', mktime(0,0,0, $month, 10)) }}, {{ $year }}</h4>
        <div class="content-center">
            <table class = "table">
                <tbody>
                   <tr>
                       <td style = "text-align:left">Cash balance as per bank statement</td>
                       <td style = "text-align:right">BDT {{ number_format($bank_end_balance,2) }}</td>
                   </tr>
                   @if(isset($bank_addition_descriptions))
                   @for($i = 0; $i < count($bank_addition_descriptions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Add : ' : ''}} {{ $bank_addition_descriptions[$i] }}</td>
                       <td style = "text-align:right">{{ number_format($bank_add_amounts[$i],2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format(array_sum($bank_add_amounts) + $bank_end_balance,2) }}</td>
                   </tr>
                   @endif
                   <br>
                   <br>
                   @if(isset($bank_deduction_descriptions))
                   @for($i = 0; $i < count($bank_deduction_descriptions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Deduct : ' : ''}} {{ $bank_deduction_descriptions[$i] }}</td>
                       <td style = "text-align:right">{{ number_format($bank_deduct_amounts[$i],2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format(array_sum($bank_deduct_amounts),2) }}</td>
                   </tr>
                   @endif
                   <br>
                   <br>
                   <tr>
                       <th style = "text-align:left;font-size:12pt">Adjusted cash balance</th>
                       <th style = "text-align:right;font-size:12pt;border-bottom:2px solid black">BDT {{ number_format($adjust_bank,2) }}</th>
                   </tr>
                   <br>
                   <tr>
                       <td style = "text-align:left">Cash balance as per CashBook</td>
                       <td style = "text-align:right">BDT {{ number_format($cashbook_end_balance,2) }}</td>
                   </tr>
                   @if(isset($cashbook_addition_descriptions))
                   @for($i = 0; $i < count($cashbook_addition_descriptions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Add : ' : ''}} {{ $cashbook_addition_descriptions[$i] }}</td>
                       <td style = "text-align:right">{{ number_format($cashbook_add_amounts[$i],2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format(array_sum($cashbook_add_amounts) + $cashbook_end_balance,2) }}</td>
                   </tr>
                   @endif
                   <br>
                   <br>
                   @if(isset($cashbook_deduction_descriptions))
                   @for($i = 0; $i < count($cashbook_deduction_descriptions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Deduct : ' : ''}} {{ $cashbook_deduction_descriptions[$i] }}</td>
                       <td style = "text-align:right">{{ number_format($cashbook_deduct_amounts[$i],2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format(array_sum($cashbook_deduct_amounts),2) }}</td>
                   </tr>
                   @endif
                   <br>
                   <br>
                   <tr>
                       <th style = "text-align:left;font-size:12pt">Adjusted cash balance</th>
                       <th style = "text-align:right;font-size:12pt;border-bottom:2px solid black">BDT {{ number_format($adjust_cashbook,2) }}</th>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>