<!DOCTYPE html>
<html>

<head>
    <title>Balance Sheet</title>
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
    .content-left
    {
        text-align:left;
        width:50%; 
    }
    .content-right
    {
        text-align:right;
        width:50%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">
            
            <p><b> Budget Report</b><p>From {{ $start_date }}  to {{ $end_date }}</p></p>
            <div style = "border-bottom:1px dotted black"></div>
        </div>
        
       <table class = "table">
        <thead>
          <tr>
             <th>Particulars</th>
             <th>Budget</th>
             <th>Actuals</th>
             <th>Variance</th>
          </tr>
        </thead>
        <tbody>
          @foreach($budacs as $budac)
             @php 
                $coa = App\Models\ChartOfAccount::find($budac->coa_id);
              @endphp
             <tr>
                    <td>{{ $coa->name }}</td>
                    <td>${{ $budac->cost }}</td>
                    <td>${{ $budac->spend}}</td>
                    <td>${{ $budac->cost - $budac->spend}}</td>
             </tr>
          @endforeach
          </tbody>
       </table>
    </div>
</body>

</html>