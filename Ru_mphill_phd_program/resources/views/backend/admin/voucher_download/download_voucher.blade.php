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

    #agrani_bank
    {
        width: 50px;
        height: 40px;
       
        background: #fff;
        
        
        
    }

    </style>
</head>

<body>
    <div class="container">

        @php $voucher_type = $voucher -> voucher_type -> description; @endphp
        <p style="font-weight:bold;text-align:center;">Institute Of Biological Science</p>
            <div class="row">
                
                    <p style="text-align: center;"><img id="agrani_bank" style="text-align: center;" src="{{ asset('public/company_pic/ru-logo.png') }}" alt=""></p>
                   

                         
                
                 <p style="text-align: center">Rajshahi University </p>
            </div>
        
        @if($voucher_name==1)
        <h3 style="text-align:center">Receive Voucher</h3>

        @elseif ($voucher_name==4)
        <h3 style="text-align:center">Payment Voucher</h3>

        @endif




        <table class="table" style="border:none">

            <tbody>
                <tr style="border:none">
                    <td style="border:none;text-align:left;font-size:15px;">
                        <strong>Voucher No :</strong> {{ $voucher -> voucher_no }}
                    </td>
                    <td style="border:none;font-size:15px;">
                        <strong>Date :</strong> {{ date('Y-m-d',strtotime($voucher -> date)) }}
                    </td>
                </tr>

                {{-- <tr style="border:none;">
                    <td style="border:none;text-align:left;font-size:15px;">
                        @if($voucher_type == 'Debit Voucher')
                        <strong>Vendor Name :</strong> {{ $voucher -> vendor -> name }}
                        @elseif($voucher_type == 'Credit Voucher')
                        <strong>Customer Name :</strong> {{ $voucher -> customer -> name}}
                        @endif
                    </td>
                </tr> --}}
            </tbody>
        </table>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>A/C Code No</th>

                    <th>Amount</th>


                </tr>
            </thead>
            <tbody>
                @php
                 $sl = 0;

                @endphp
                @foreach($voucher -> voucher_details as $voucher_detail)
                <tr>
                    @php $sl = $sl + 1;
                         $account = $voucher_detail -> coaInfo;
                    @endphp;
                    <td>{{ $sl }}</td>
                    <td>{{ date('Y-m-d',strtotime($voucher -> date)) }}</td>
                    <td>{{ $account -> name }}</td>
                    <td>{{ $account -> general_code }}</td>
                    @if($debit)
                    <td style = "text-align:right">{{ $voucher_detail -> debit_amount ? number_format($voucher_detail -> debit_amount,2) : ''}}</td>

                    @else

                    <td style = "text-align:right">{{ $voucher_detail -> credit_amount ? number_format($voucher_detail -> credit_amount,2) : ''}}</td>
                    @endif
                </tr>
                @endforeach
                <tr>
                    <td colspan = "4" style = "text-align:left">
                        <strong>InWords :  {{ $Inwords }}</strong>



                    </td>
                    <td style = "text-align:right">
                        <strong >Total=</strong>
                        <strong>{{ number_format($total_amount,2) }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class = "footer">
            <thead>
                <tr>
                    <th class = "text-normal">{{ $voucher -> posted_by_info -> name }}</th>
                    <th class = "text-normal">
                        @php $isComma = 0; @endphp
                        @foreach($voucher -> getApprovers as $approver)
                           @if($isComma)
                             {{ ',' }}
                           @endif
                           {{-- {{ $approver -> getApproverInfo -> name  }} --}}
                           @php $isComma = 1; @endphp
                        @endforeach
                    </th>
                </tr>
                <tr>
                <th>Voucher Initiated By</th>
                {{-- <th>Voucher Approved By</th> --}}
                </tr>
            </thead>
        </table>
        @php
          $cheque = $voucher -> cheque;
        @endphp
        @if(isset($cheque))
        <br>
        <table class = "table" style = "border:1px solid black;padding-top:60px;">
          <thead>
              {{-- <tr>
                  <th style = "border:none;padding-top:25px;">
                      <h2 style = "text-align:left;padding-left:60px;">{{ $cheque -> getChequeBookInfo -> bank -> bank_name }}</h2>
                  </th>
                  <th style = "border:none;font-weight:normal;text-align:right;padding-right:30px;font-size:16px;">
                       {{  $cheque -> page_number }}
                  </th>
              </tr> --}}
              <tr>
                  <th style = "text-align:left;border:none;padding-top:25px;"></th>
                  <th style = "font-weight:normal;text-align:right;border:none;padding-right:30px;color:black;font-size:16px;">
                    DATE : {{ date('Y-m-d',strtotime($voucher -> date)) }}
                  </th>
              </tr>
              <tr>
                {{-- <th style = "border:none;text-align:left;padding-left:20px;">Pay To <span style = "font-weight:normal;font-size:16px;">
                  @if($voucher_type == 'Debit Voucher')
                    {{ $voucher -> vendor -> name }}
                  @elseif($voucher_type == 'Credit Voucher')
                    {{ $voucher -> customer -> name }}
                  @endif
                </span></th> --}}
                <th style = "border:none;font-weight:normal"></th>
              </tr>

              <tr>
                <th style = "border:none;text-align:left;padding-left:20px;padding-top:10px;">The Sum of Taka <span style = "font-weight:normal;font-size:16px;">{{ $Inwords }}</span></th>
                <th>
                   Tk. {{ number_format($total_amount,2) }}/=
                </th>
                <th style = "border:none"></th>
              </tr>
              <tr>
                <th style = "border:none;text-align:left;padding-left:20px;padding-top:10px;">A/C No. <span style = "font-weight:normal;font-size:16px;">{{ $voucher -> transaction_account -> general_code }}</span></th>
                <th style = "border:none;">

                </th>
              </tr>
              <tr>
                {{-- <th style = "border:none;text-align:left;padding-left:20px;padding-bottom:10px;">{{ $company -> company_name }}</th> --}}
                <th style = "border:none;">

                </th>
              </tr>
              <tr>
                <th style = "border:none;text-align:left;padding-left:20px;padding-bottom:40px;"></th>
                <th style = "border:none;font-weight:normal;border-top:1px solid black">
                  Please Sign Above This Line
                </th>
              </tr>
          </thead>
       </table>
       @endif
       <table  style = "padding-top:70px;">
           <thead>
                <tr>
                <th style = "border:none;text-align:left;padding-left:20px;padding-bottom:10px;">Print Date & Time : {{ now() }}</th>
                </tr>
           </thead>
       </table>
    </div>
</body>

</html>
