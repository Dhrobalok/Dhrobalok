<!DOCTYPE html>
<html>

<head>
    <title>Cost Center Report</title>
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

    .text-center {
        text-align: center;
    }

    .text-black {
        color: black;
    }
    .text-bold
    {
        font-weight:700;
    }
    </style>
</head>

<body>
<htmlpageheader name="reportHeader" style="display:none;">
<div>
        <h3 style="text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px">{{ $company -> company_address }}</h4>
        <h4 style="text-align:center;line-height:5px">Cost Center Report</h4>
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
       
        <table class="table">
            <tbody>
                <tr style="border:none">
                    <td style="border:none;text-align:left;font-size:15px;">
                        <strong>Cost Center {{ $report_type == 'head' ? 'Head' : '' }} : {{ $name }}</strong>
                    </td>
                    <td style="border:none;font-size:15px;text-align:right">
                        <strong>From : {{ $start_date  }} to {{ $end_date }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr class="text-center text-black">
                    <th>Date</th>
                    @if($report_type == 'head')
                    <th>Cost Center</th>
                    @endif
                    <th>Particulars</th>
                    <th>Voucher Type</th>
                    <th>Voucher No</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
            @php $voucher = $record -> voucher; @endphp
            <tr class="text-center">
                <td>{{ date('Y-m-d',strtotime($record -> voucher_date)) }}</td>
                @if($report_type == 'head')
                <td>{{ $record -> getCostCenterInfo -> name }}</td>
                @endif
                <td>{{ $record -> coa_info -> name }}</td>
                <td>{{ $voucher ? $voucher -> voucher_type -> code : ''}}</td>
                <td>{{ $voucher ? $voucher -> voucher_no : '' }}</td>
                <td style = "text-align:right">{{ $record -> debit_amount ? $record -> debit_amount  : '' }}</td>
                <td style = "text-align:right">{{ $record -> credit_amount ? $record -> credit_amount : '' }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan = "{{ $report_type == 'head' ? 5 : 4 }}" style = "text-align:right;font-weight:bold">Total</td>
                <td style = "text-align:right;font-weight:bold" class = "text-bold">{{ $records -> sum('debit_amount') }}</td>
                <td style = "text-align:right;font-weight:bold" >{{ $records -> sum('credit_amount') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</body>

</html>