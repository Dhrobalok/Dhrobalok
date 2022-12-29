<!DOCTYPE html>
<html>

<head>
    <title>Bank Advice</title>
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
        margin-top: 0;
        padding-top: 0;
    }
    

    p {
        font-size: 12pt;
        
    }
    td
    {
        font-size:5pt;
    }
    </style>
</head>

<body>
    <div class="container">
        <b>The Manager</b>
        <p style = "margin:0;
        padding:0px;">Sonali Bank Limited</p>
        <p style = "margin:0;
        padding:0px;">Rajshahi University Branch</p>
            <p style = "margin:0;
        padding-bottom:5px;">Rajshahi,6205</p>
            <p style = "margin:0;
        padding:0px;">Dear Sir,</p>
        <div class="heading">
            <p style = "padding-top:5px;"><b><u>Payment Advice from RU A/C # for the month of {{ $month }} {{ $year }}</u></b></p>
        </div>
        
            <p style = "margin:0;
        padding:0px;">Please make the payroll transfer from above account number to the below metioned account numbers towards employee salaries : </p>
       
        <table class="table">
            <thead>
                
                <tr>
                    <th>Sl. No.</th>
                    <th>Employee No.</th>
                    <th>Employee Name</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Bank Name</th>
                    <th>Branch Name</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 0; @endphp
                @foreach($records as $record)
              
                <tr>
                    @php $sl = $sl + 1 @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ str_pad($record -> employee -> id,4,'0',STR_PAD_LEFT) }}</td>
                    <td>{{ $record -> employee -> name }}</td>
                    <td>{{ str_pad($record -> employee -> account_no,15,'0',STR_PAD_LEFT) }}</td>
                    <td>{{ number_format($record -> net_amount) }} </td>
                    <td>{{ 'Sonali Bank' }}</td>
                    <td>{{ 'University Branch' }}</td>

                </tr>
                @endforeach
               
                <tr>
                <td></td>
                  <td></td>
                  <td>Total</td>
                  <td></td>
                  <td>{{ number_format($grand_total) }}</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align:center">
                            <p>In words : {{ $Inwords." taka only" }} </p>
                        </td>

                </tr>

            </tbody>

        </table>


        
             <p style = "margin:0;padding:0;margin-top:50px;">Yours Sincerely</p>
             <p style = "margin:0;padding:0"><b>for University Of Rajshahi</b></p>
           
    </div>
</body>

</html>