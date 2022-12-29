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
            <p><b>EMPLOYEE PROVIDENT FUND SCHEME - Department Wise Report </b></p>
        </div>

        <div class="heading">
          <p><b>Report for the Period {{ $month }} {{ $year }}</b></p>
        </div>

   @foreach($departments as $dept)
       
        <div class="heading">
          <p style = "text-align:left;"><b>{{ $dept -> name }}</b></p>
        </div>
        @php $employees = $dept -> employees; @endphp

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
                 @endphp
                @foreach($employees as $employee)
                
                @php $pf_record = App\Models\ProvidentFundProcessDetail :: where('employee_id',$employee -> id)
                                   ->where('year',$year)
                                   ->where('month',$month)
                                   ->first();
                    
                @endphp
                @if($pf_record != null)
                @php $sl++; @endphp
                <tr>
                    
                    <td>{{ $sl }}</td>
                    <td>{{ str_pad( $employee-> id,4,'0',STR_PAD_LEFT) }}</td>
                    <td>{{ $employee -> payscale -> provident_fund_no }}</td>
                    <td>{{ $employee -> name }}</td>
                    <td>{{ $pf_record -> basic_pay }}</td>
                    <td>{{ $pf_record -> pf_amount }}</td>
                    <td>{{ $pf_record -> loan_amount }}</td>
                    <td>{{ $pf_record -> pf_amount - $pf_record -> loan_amount }}</td>
                   
                </tr>
                @php
                    $wages_total += $pf_record -> basic_pay;
                    $pf_con += $pf_record -> pf_amount;
                    $loan_total += $pf_record -> loan_amount;
                    $net_total += ($pf_record -> pf_amount - $pf_record -> loan_amount);
                    @endphp
                @endif
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                  <td><b>{{ number_format($wages_total) }}</b></td>
                  <td><b>{{ number_format($pf_con) }}</b></td>
                  <td><b>{{ number_format($loan_total) }}</b></td>
                  <td><b>{{ number_format($net_total) }}</b></td>
                </tr>
            </tbody>

        </table>
        
   @endforeach
    </div>
</body>

</html>