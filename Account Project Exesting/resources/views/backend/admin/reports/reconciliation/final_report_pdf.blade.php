<!DOCTYPE html>
<html>

<head>
    <title>Bank Reconciliation Report</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        footer:html_reportFooter;
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
<htmlpagefooter name="reportFooter" style="display:none;">
        <div>
            @php
              date_default_timezone_set('Asia/Dhaka');
            @endphp
           <p style = "text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
    </htmlpagefooter>
    <div class="container">
        <h3 style="text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px">Bank Reconciliation Statement</h4>
        <h4 style="text-align:center;line-height:5px;padding-bottom:20px"> {{ date('F', mktime(0,0,0, $month, 10)) }}, {{ $year }}</h4>
        <div class="content-center">
            <table class = "table">
                <tbody>
                  
                @if(isset($bank_entries_additions))
                   <tr>
                       <td style = "text-align:left">{{ isset($bank_entries_additions[0]) ? $bank_entries_additions[0] -> description : ''}}</td>
                       <td style = "text-align:right">BDT {{ number_format(isset($bank_entries_additions[0]) ? $bank_entries_additions[0] -> amount : 0,2) }}</td>
                   </tr>
                  
                   @for($i = 1; $i < count($bank_entries_additions); $i++)
                   
                   <tr>
                       <td style = "text-align:left"> {{ $i == 1 ? 'Add : ' : ''}} {{ $bank_entries_additions[$i] -> description }}</td>
                       <td style = "text-align:right">{{ number_format($bank_entries_additions[$i] -> amount,2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ $bank_entries_additions -> sum('amount') }}</td>
                   </tr>
                
                   <br>
                   <br>
                @endif
                @if(isset($bank_entries_deductions))
                  
                   @for($i = 0; $i < count($bank_entries_deductions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Deduct : ' : ''}} {{ $bank_entries_deductions[$i] -> description }}</td>
                       <td style = "text-align:right">{{ number_format($bank_entries_deductions[$i] -> amount,2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format($bank_entries_deductions -> sum('amount'),2) }}</td>
                   </tr>
                   
                   <br>
                   <br>
                @endif
                @if(isset($adj_balance_bank))
                   <tr>
                       <th style = "text-align:left;font-size:12pt">{{ isset($adj_balance_bank[0]) ? $adj_balance_bank[0] -> description : '' }}</th>
                       <th style = "text-align:right;font-size:12pt;border-bottom:2px solid black">BDT {{ number_format(isset($adj_balance_bank[0])? $adj_balance_bank[0] -> amount : 0,2) }}</th>
                   </tr>
                   <br>
                 @endif
                 @if(isset($cashbook_entries_additions))
                   <tr>
                       <td style = "text-align:left">{{ isset($cashbook_entries_additions[0])? $cashbook_entries_additions[0] -> description : ''}}</td>
                       <td style = "text-align:right">BDT {{ number_format(isset($cashbook_entries_additions[0])? $cashbook_entries_additions[0] -> amount : 0,2) }}</td>
                   </tr>
                  
                   @for($i = 1; $i < count($cashbook_entries_additions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 1 ? 'Add : ' : ''}} {{ $cashbook_entries_additions[$i] -> description }}</td>
                       <td style = "text-align:right">{{ number_format($cashbook_entries_additions[$i] -> amount,2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format($cashbook_entries_additions -> sum('amount'),2) }}</td>
                   </tr>
                   
                   <br>
                   <br>
                   @endif
                   @if(isset($cashbook_entries_deductions))
                   @for($i = 0; $i < count($cashbook_entries_deductions); $i++)
                   <tr>
                       <td style = "text-align:left"> {{ $i == 0 ? 'Deduct : ' : ''}} {{ $cashbook_entries_deductions[$i] -> description }}</td>
                       <td style = "text-align:right">{{ number_format($cashbook_entries_deductions[$i] -> amount,2) }}</td>
                   </tr>
                   @endfor
                   <tr>
                       <td style = "text-align:left"></td>
                       <td style = "text-align:right;border-top:1px solid black">BDT {{ number_format($cashbook_entries_deductions -> sum('amount'),2) }}</td>
                   </tr>
                   
                   <br>
                   <br>
                   @endif
                   @if(isset($adj_balance_cashbook))
                   <tr>
                       <th style = "text-align:left;font-size:12pt">{{ isset($adj_balance_cashbook[0])? $adj_balance_cashbook[0] -> description : ''}}</th>
                       <th style = "text-align:right;font-size:12pt;border-bottom:2px solid black">BDT {{ number_format(isset($adj_balance_cashbook[0])? $adj_balance_cashbook[0] -> amount : 0,2) }}</th>
                   </tr>
                   @endif
                </tbody>
            </table>
            <br>
            <table class = "footer">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    <th style = "border-top:1px solid black;width:40%;text-align:right">Signature Of Authority</th>
                    </tr>
                    
                </thead>
            </table>
        </div>
    </div>
</body>

</html>