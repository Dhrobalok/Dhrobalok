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

             <h4 style="text-align:center;line-height:5px"><span style="font:bold;">Sub:</span> Description of vat and income tax deduction from commission. </h4>

            <br>

        <table class="table">


            <thead>
              <tr>
                <th scope="col">Sl No.</th>

                <th scope="col">Customer Name</th>
                <th scope="col">Date</th>

                <th scope="col">Commission</th>
                <th scope="col">Vat</th>
                <th scope="col">Income Tax</th>


              </tr>


            </thead>

            <tbody>
                @php
                   $i = 0;
                @endphp

                @foreach ($bulk as $item)

              <tr>



               <td>{{ $i=$i+1 }}</td>


                @php
                $coustomer=App\Models\Customer::where('id',$item->customer_id)->first();
                @endphp

                <td>{{  $coustomer->name }}</td>



                <td> {{ $item->date }} </td>
                <td>{{  $item->commission }}</td>
                <td>{{  $item->vat }}</td>
                <td> {{ $item->incometax }} </td>





           </tr>
              @endforeach

            <br>


            </tbody>
          </table>


          {{--


          <table class = "footer">
            <thead>
                <tr>

                    <td style = "text-align:right">
                        <strong >Total=</strong>
                        <strong>{{ $total->total_pay }}</strong>


                    </td>
                  </tr>


            </thead>
        </table>
        --}}


    </div>
</body>

</html>
