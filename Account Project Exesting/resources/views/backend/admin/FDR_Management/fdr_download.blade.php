<!DOCTYPE html>
<html>

<head>

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
        font-size: 10.5pt;
    }

    .footer {
        padding-top: 40px;
        width: 100%;
    }

    .footer tr {
        text-align:left;
        width: 25%;
        font-size: 10.5pt;
        font-weight: bold;
    }

    .heading p {
        text-align: center;
        margin-bottom: 0;
    }

    .heading h5 {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }

    .left {
        text-align: left;
        float: left;
        clear: none;
        width: 50%;
    }

    .right {
        text-align: right;
        float: right;
        clear: none;
        width: 50%;
    }

    .inline {
        clear: both;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
    }
    .text-normal
    {
        font-weight:normal;
    }

    </style>
</head>

<body>
    <div class="container">



        <h3 style="text-align:center"><img src = "{{ URL :: to($company -> company_logo)}}" height = "40px" width = "40px;">{{ $company -> company_name  }}</h3>
        <h4 style="text-align:center;line-height:5px">{{ $company -> company_address  }}</h4>

             <br>

             <h4 style="text-align:center;line-height:5px">TOTAL FDR</h4>


        <table class="table">


            <thead>
              <tr>

                <th scope="col">Bank Name</th>
                <th scope="col">FDR Number</th>
                <th scope="col">Create Date</th>
                <th scope="col">FDR Amount </th>
                <th scope="col">Interest </th>
                <th scope="col">Total Amount </th>
                <th scope="col">FDR Break</th>
              </tr>
            </thead>

            <tbody>
                @php
                    $total_interest=0;
                @endphp
                @foreach ($fdr as $item)


              <tr>

                <td>{{  $item->bank_name}}</td>
                <td>{{ $item->fdr_number }}</td>
                <td>{{ $item->creat_date }}</td>
                <td>{{ $item->fdr_amount }}</td>
                <td>{{ $total_interest=($item->interest_rate / 100) * $item->fdr_amount}}</td>
                <td>{{  $item->fdr_amount+$total_interest}}</td>
                <td>{{  $create_at_difference=Carbon\Carbon::createFromTimestamp(strtotime($item->expire_date))->diff(\Carbon\Carbon::now())->days}}<span style="color: red;font:bold;"> Days Left </span></td>
              </tr>
              @endforeach
            </tbody>
          </table>


    </div>
</body>

</html>
