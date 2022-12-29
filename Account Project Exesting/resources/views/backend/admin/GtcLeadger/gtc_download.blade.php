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
        border: 1px solid #000;
    }
    .table td{
        border: 1px solid #000;
    }
    .table th{
        border: 1px solid #000;
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

             <h4 style="text-align:center;line-height:5px"><span style="font:bold;">Sub:</span>GTC Agreement</h4>

            <br>

        <table class="table">


            <thead>
              <tr>
                <th scope="col">Schedule No</th>

                <th scope="col">Title</th>

                <th colspan="2" scope="col">Contract Amount</th>

                <th colspan="2" scope="col">Remaining Blance</th>



              </tr>


            </thead>

            <tbody>
                @php
                        $s1=0;
                        $remainbdt=0;
                        $remainusd=0;
                    @endphp

                        @foreach($gtc_leadger as $key => $value)

                        <tr>

                            <td>{{ $s1=$s1+1 }}</td>
                            <td>{{ $value->title }}</>

                            </td>
                            <th>USD</th>
                            <th>BDT</th>


                            <th>Foreign Currency</th>
                            <th>Local Currency</th>
                        </tr>

                        <tr>
                              <td></td>
                              <td></td>
                        @if($value->currency==1)

                          <td>{{$value->amount}}</td>

                          <td></td>


                          <td>{{$value->amount-$value->total}}</td>
                          @php
                          $remainusd=($value->amount - $value->total)+$remainusd;
                          @endphp




                        @else
                            <td></td>
                            <td>{{ $value->amount}}</td>

                            <td></td>
                            <td>{{ $value->amount - $value->total}}</td>

                                @php
                                $remainbdt=($value->amount - $value->total)+$remainbdt;

                                @endphp

                        @endif


                        </tr>



                        @endforeach
                    </tbody>




         
                <tr class="text-center">
                   

                    <td><strong>TOTAL</strong></td>

                          <td></td>

                            <td>
                            <strong>
                                {{ $dollar }}
                            </strong>
                            {{--
                            

                                <!--strong style="margin-left:375px;">{{ $dollar }}</strong-->
                                 <strong style="margin-left:30px;">{{$bdt}}</strong>
                                 <strong style="margin-left:40px;">{{$remainusd}}</strong>
                                    <!--<strong style="margin-left:40px;">{{$remainbdt}}</strong>-->

                                    --}}

                            </td>


                            <td>

                            <strong>
                                 {{$bdt}}
                            </strong>
                               

                            </td>


                            <td>
                            <strong>
                                 {{$remainusd}}
                            </strong>
                                

                            </td>


                            <td>

                            <strong>
                                 {{$remainbdt}}
                            </strong>
                             

                            </td>



                  </tr>


            </thead>
        </table>





    </div>
</body>

</html>
