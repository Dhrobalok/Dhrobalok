<!DOCTYPE html>
<html>

<head>
    <title>Head Wise Report</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "courier", Arial, Georgia;
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
        padding: 2px;
        text-align: center;
        font-size: 9pt;
        padding-top:10px;
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
        <div class="heading">
            
            <p><b>Report for {{ $head -> name }}</b><p>From {{ $start_date }}  to {{ $end_date }}</p></p>
            <div style = "border-bottom:1px solid black"></div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>Account Code</th>
                    <th>Particular</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
                
            </thead>
            <tbody>
                @php 
                 $sl = 0; $credit_amount = 0; $debit_amount = 0;
                @endphp
                @foreach($records as $record)
              
                <tr>
                    @php $sl = $sl + 1 @endphp;
                    @php $credit_amount += $record -> credit_amount;
                         $debit_amount += $record -> debit_amount;
                    @endphp
                    <td>{{ $sl }}</td>
                    <td>{{ $record -> generation_date }}</td>
                    <td>{{ $record -> coa_info -> name }}</td>
                    <td>{{ $record -> coa_info -> general_code }}</td>
                    <td>{{ $record -> voucher_detail -> description }}</td>
                     @if($record -> debit_amount != 0)
                    <td>{{ $record -> debit_amount }}</td>
                    @else <td></td>
                    @endif
                    @if($record -> credit_amount != 0)
                    <td>{{ $record -> credit_amount }}</td>
                    @else <td></td>
                    @endif
                   
                </tr>
                @endforeach
                <tr>
                  <td colspan = "4" style = "border-bottom:1px solid black">
                  </td>
                </tr>
               
            </tbody>

        </table>
        <br>
        <table class = "table">
         <thead>
         <tr>
            <th>Debit Amount</th>
            <th>Credit Amount</th>
          </tr>
           <tr>
            <th>{{ $debit_amount }}</th>
            <th>{{ $credit_amount }}</th>
          </tr>
         </thead>
          
         
        </table>


        <table class="footer">

        </table>
    </div>
</body>

</html>