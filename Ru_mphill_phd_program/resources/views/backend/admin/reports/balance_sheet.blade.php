<!DOCTYPE html>
<html>

<head>
    <title>Balance Sheet</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        header:html_reportHeader;
        footer:html_reportFooter;
    }

    .body {
        font-family: "courier", Arial, Georgia;
    }


    .container {
        width: 100%;
        padding-top:20px;
    }


    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 2px;
        text-align: center;
        font-size: 9pt;
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

    .content-left {
        float: left;
        width: 50%;
    }

    .content-right {
        float: right;
        width: 50%;
    }
    </style>
</head>

<body>
<htmlpageheader name="reportHeader" style="display:none;">
<div>
    <div>
        <p style="text-align:center;">
            <img src="{{ asset('public/company_pic/ru-logo.png') }}" height="50px"
            width="50px" >
        </p>
       
        <h3 style="text-align:center">Institute Of Biological Science</h3>
        <h4 style="text-align:center;line-height:5px">Adjusted Trial Balance</h4>
        <h4 style="text-align:center;line-height:5px">As at {{ date("F j, Y") }}</h4>
    </div>
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
    @php
    $date = date('Y-m-d');
    @endphp
    <div class="container">
        <div class="content-left">
            <table>
                <tbody>
                    <tr>
                        <td><strong>ASSETS</strong></td>
                    </tr>
                    @php $assets_grand_total = 0; @endphp
                    @foreach($group_accounts['Asset'] as $asset_category)
                    @php $total_assets = 0; @endphp
                    <tr>
                        <td style="font-weight:bold">{{ $asset_category }}</td>
                    </tr>
                    @if(isset($filltered_accounts[$asset_category]))
                    @foreach($filltered_accounts[$asset_category] as $account)
                    @php
                    $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                    $debit_balance = $records -> sum('debit_amount');
                    $credit_balance = $records -> sum('credit_amount');
                    $balance = $debit_balance - $credit_balance;
                    $total_assets += $balance;
                    $assets_grand_total += $balance;
                    @endphp

                    <tr>
                        <td style="width:75%;padding-left:20px; text-align:left">{{ $account -> name }}</td>
                        @if($balance >= 0)
                        <td style="width:25%;text-align:right">{{ number_format($balance,2) }}</td>
                        @else
                        <td style="width:25%;text-align:right">({{ number_format(-$balance,2) }})</td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td style="width:75%;padding-left:20px; text-align:left">Total {{ $asset_category }}</td>
                       
                        <td style="width:25%;text-align:right;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($total_assets,2) }}</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td style="width:75%;text-align:left;font-weight:bold">Total assets </td>
                       
                        <td style="width:25%;text-align:right;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($assets_grand_total,2) }}</td>
                    </tr>
                </tbody>
            </table>
            <table class = "footer">
                <thead>
                    <tr>
                        <th style = "text-align:center;width:40%;border-top:1px solid black">Authority Signature</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="content-right">
            <table>
                <tbody>
                    <tr>
                        <td><strong>LIABILITIES AND SHAREHOLDERS' EQUITY</strong></td>

                    </tr>
                    @php $liability_grand_total = 0; @endphp
                    @foreach($group_accounts['Liability'] as $liability_category)
                    @php $total_liability = 0; @endphp
                    <tr>
                        <td style="font-weight:bold">{{ $liability_category }}</td>
                    </tr>
                    @if(isset($filltered_accounts[$liability_category]))
                    @foreach($filltered_accounts[$liability_category] as $account)
                    @php
                    $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                    $debit_balance = $records -> sum('debit_amount');
                    $credit_balance = $records -> sum('credit_amount');
                    $balance = $debit_balance - $credit_balance;
                    $total_liability += $balance;
                    $liability_grand_total += $balance;
                    @endphp

                    <tr>
                        <td style="width:75%;padding-left:20px; text-align:left">{{ $account -> name }}</td>
                        @if($balance >= 0)
                        <td style="width:25%;text-align:right">{{ number_format($balance,2) }}</td>
                        @else
                        <td style="width:25%;text-align:right">({{ number_format(-$balance,2) }})</td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td style="width:75%;padding-left:20px; text-align:left">Total {{ $liability_category }}</td>
                       
                        <td style="width:25%;text-align:right;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($total_liability,2) }}</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td style="width:75%;text-align:left;font-weight:bold">Total liabilities </td>
                       
                        <td style="width:25%;text-align:right;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($liability_grand_total,2) }}</td>
                    </tr>
                    @foreach($group_accounts['Equity'] as $equity_category)
                    @php $total_liability = 0; @endphp
                    <tr>
                        <td style="font-weight:bold">{{ $equity_category }}</td>
                    </tr>
                    @if(isset($filltered_accounts[$equity_category]))
                    @foreach($filltered_accounts[$equity_category] as $account)
                    @php
                    $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                    $debit_balance = $records -> sum('debit_amount');
                    $credit_balance = $records -> sum('credit_amount');
                    $balance = $debit_balance - $credit_balance;
                    $total_liability += $balance;
                    $liability_grand_total += $balance;
                    @endphp

                    <tr>
                        <td style="width:75%;padding-left:20px; text-align:left">{{ $account -> name }}</td>
                        @if($balance >= 0)
                        <td style="width:25%;text-align:right">{{ number_format($balance,2) }}</td>
                        @else
                        <td style="width:25%;text-align:right">({{ number_format(-$balance,2) }})</td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                    <tr>
                        <td style="width:75%;text-align:left;font-weight:bold">Total liabilities and shareholder's equity </td>
                       
                        <td style="width:25%;text-align:right;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($liability_grand_total,2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>