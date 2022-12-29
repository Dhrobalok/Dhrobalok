<!DOCTYPE html>
<html>

<head>
    <title>Trial Balance</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        header: html_reportHeader;
        footer: html_reportFooter;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 20px;
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
        padding-top: 10px;
        border: 1px solid black;
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
    <htmlpageheader name="reportHeader" style="display:none;">
        <div>
            <p style="text-align:center;">
                <img src="{{ asset('public/company_pic/ru-logo.png') }}" height="50px"
                width="50px" >
            </p>
           
            <h3 style="text-align:center">Institute Of Biological Science</h3>
            <h4 style="text-align:center;line-height:5px">Adjusted Trial Balance</h4>
            <h4 style="text-align:center;line-height:5px">As at {{ date("F j, Y") }}</h4>
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

        <table class="table">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Account</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>

            </thead>
            <tbody>
                @php
                $sl = 0; $credit_amount = 0; $debit_amount = 0;
                @endphp
                @foreach($accounts as $account)
                <tr>
                    @php $sl = $sl + 1;
                    $records = App\Models\Ledger :: where('coa_id',$account -> coa_id) -> get();
                    $debit_balance = $records -> sum('debit_amount');
                    $credit_balance = $records -> sum('credit_amount');
                    @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ $account -> coa_info -> name }}</td>
                    @if($debit_balance > $credit_balance)
                    @php
                    $debit_amount += ($debit_balance - $credit_balance);
                    @endphp
                    <td style="text-align:right">{{ number_format($debit_balance - $credit_balance,2) }}</td>
                    <td></td>
                    @elseif($debit_balance < $credit_balance) @php $credit_amount +=($credit_balance - $debit_balance);
                        @endphp <td>
                        </td>
                        <td style="text-align:right">{{ number_format($credit_balance - $debit_balance,2) }}</td>
                        @else
                        <td style="text-align:right">0</td>
                        <td style="text-align:right">0</td>
                        @endif
                </tr>
                @endforeach
                
                
                <tr>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td style="text-align:right">
                        <strong>
                            {{ number_format($debit_amount,2) }}
                            @if($debit_amount == $credit_amount)
                            <h6>------------------</h6>
                            <h6>------------------</h6>
                            @endif
                        </strong>
                    </td>
                    <td style="text-align:right">
                        <strong>
                            {{ number_format($credit_amount,2) }}
                            @if($debit_amount == $credit_amount)
                            <h6>------------------</h6>
                            <h6>------------------</h6>
                            @endif
                        </strong>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
