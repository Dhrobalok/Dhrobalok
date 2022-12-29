<!DOCTYPE html>
<html>

<head>
    <title>Provident Fund Report</title>
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
        margin-top: 10px;
        padding-top: 0;

    }

    p {
        font-size: 10pt;
    }
    </style>
</head>

<body>
<htmlpageheader name="reportHeader" style="display:none">
        <div>
            
            <h3 style = "text-align:center"><img src = "{{ URL :: to($company -> company_logo) }}" height = "50px" width = "50px">{{ $company -> company_name  }}</h3>
            <h4 style = "text-align:center;line-height:10px">{{ $company -> company_address  }}</h4>
            <p style = "text-transform:uppercase;text-align:center"><b>EMPLOYEE PROVIDENT FUND REPORT FOR THE MONTH OF {{ $month}} {{ $year }}</b></p>
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
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Employee Contribution</th>
                    <th>Company Contribution</th>
                    <th>Interest Rate</th>
                    <th>Interest Amount</th>
                    <th>Opening Balance</th>
                    <th>Closing Balance</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; @endphp
                @foreach($records as $record)
               
                <tr>
                    @php $sl = $sl + 1;
                       $employee = $record -> employee_info;
                    @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ $employee -> employee_reg_id }}</td>
                    <td>{{ $employee -> name  }}</td>
                    <td style = "text-align:right">{{ number_format($record -> pf_amount / 2,2) }}</td>
                    <td style = "text-align:right">{{ number_format($record -> pf_amount / 2,2) }}</td>
                    <td style = "text-align:right">{{ number_format($record ->pf_interest_rate,2) }} % </td>
                    <td style = "text-align:right">{{ number_format($record -> interest_amount,2) }}</td>
                    <td style = "text-align:right">{{ number_format($record -> opening_balance,2) }}</td>
                    <td style = "text-align:right">{{ number_format($record -> closing_balance,2) }}</td>
                   
                </tr>
                @endforeach
            </tbody>

        </table>

        <table class="footer">

        </table>
    </div>
</body>

</html>