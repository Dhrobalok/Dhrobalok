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
        <h4 style="text-align:center;line-height:5px">Contribution Month/Year : {{$month}}/{{ $year }}</h4>
        <h4 style="text-align:center;line-height:5px">Bank Name : {{$bankname}}</h4>
      
        <h4 style="text-align:center;line-height:5px">Mature Date: {{ $enddate}}</h4>
        <h4 style="text-align:center;line-height:5px">FDR Number : {{$fdr_no}}</h4>
             
         <br>

        <table class="table">


            <thead>
              <tr>
                <th scope="col">Sl no</th> 
                             
                <th scope="col">Employee Name </th>
                <th scope="col">Contribution Amount</th>
                <th scope="col">Total Interest </th>
              
              </tr>
            </thead>

            <tbody>
                @php
                    $i=1;
                    $total_intersest=0;
                @endphp
                @foreach ($fdr as $item)
                @php
                   $employee_name=App\Models\Employee::where('id',$item->employee_id)->first();
                @endphp
                

              <tr>

                <td>{{  $i}}</td>
                <td>{{ $employee_name->name }}</td>
                <td>{{ $item->p_f_amount }}</td>
                <td>{{$item->interest_value }}</td>

                @php
                   $total_intersest=$item->interest_value+$total_intersest;
                @endphp
               
               
              
              </tr>
              
              @endforeach
            </tbody>

            <tr class="text-center">

                <td></td>
                <td></td>
                <td class="text-center"><strong>Total Contribution</strong> : <strong>{{ $fdr_amount }}</strong></td>
                <td class="text-center"><strong>Total </strong> : <strong>{{ $total_intersest }}</strong></td>

            </tr>

       
          </table>


    </div>
</body>

</html>
