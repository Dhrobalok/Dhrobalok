<!DOCTYPE html>
<html>

<head>
    <title>Monthly Statement</title>
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
        margin-top: 10px;
        padding-top: 0;

    }

    p {
        font-size: 10pt;
    }
    </style>
</head>

<body>
    <div class="container">
        
        

        <div class="heading">
            <p><b>EMPLOYEE PROVIDENT FUND SCHEME - Yearly summary </b></p>
        </div>

        <div class="heading">
          <p><b>Statement for the Period {{ $year }}</b></p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Employee No.</th>
                    <th>Provident F. No.</th>
                    <th>Employee Name</th>
                    <th>Earned Wages</th>
                    <th>Provident Contribution</th>
                    <th>Loan Amount</th>
                    <th>Net</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; $wages_total = 0; $pf_con = 0; $loan_total = 0;
                    $net_total = 0;
                    $wages_grand_total = 0;
                    $pf_con_grand_total = 0; 
                    $loan_grand_total = 0;

                 @endphp
                @foreach($records as $record)
                @php
                $provident_info = App\Models\ProvidentFundProcessDetail :: where('employee_id',$record -> id)
                                      ->where('year',$year)
                                      ->get();
                
                @endphp
                
                @if(count($provident_info) > 0)
                <tr>
                    @php 
                    $sl = $sl + 1;
                    
                    $wages_total = $provident_info -> sum('basic_pay');
                    $pf_con = $provident_info -> sum('pf_amount');
                    $loan_total = $provident_info -> sum('loan_amount');
                    @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ str_pad( $record-> id,4,'0',STR_PAD_LEFT) }}</td>
                    <td>{{ $record -> payscale -> provident_fund_no }}</td>
                    <td>{{ $record -> name }}</td>
                    <td>{{ $wages_total }}</td>
                    <td>{{ $pf_con }}</td>
                    <td>{{ $loan_total }}</td>
                    <td>{{ $pf_con - $loan_total }}</td>

                    @php
                      $wages_grand_total += $wages_total;
                      $pf_con_grand_total += $pf_con;
                      $loan_grand_total += $loan_total;
                      $net_total += ($pf_con - $loan_total);
                    @endphp
                   
                </tr>
                @endif
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                  <td><b>{{ number_format($wages_grand_total) }}</b></td>
                  <td><b>{{ number_format($pf_con_grand_total) }}</b></td>
                  <td><b>{{ number_format($loan_grand_total) }}</b></td>
                  <td><b>{{ number_format($net_total) }}</b></td>
                </tr>
                
                
            </tbody>

        </table>


        <table class="footer">

        </table>
    </div>
</body>

</html>