<!DOCTYPE html>
<html>

<head>
    <title>Cash Book Report</title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
        header:html_reportHeader;
        footer:html_reportFooter;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 10px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 2px;
        text-align: center;
        font-size: 10pt;
        padding-top: 10px;
        border: 1px solid black;
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
<htmlpageheader name="reportHeader" style="display:none;">
<div>
    
        <p style="text-align:center;">
            <img src="{{ asset('public/company_pic/ru-logo.png') }}" height="50px"
            width="50px" >
        </p>
       
        <h3 style="text-align:center">Institute Of Biological Science</h3>
       
    
        <h4 style="text-align:center;line-height:5px">Cash Book</h4>
        <h4 style="text-align:center;line-height:5px">As at {{ date("F j, Y") }}</h4>
     </div>
    </htmlpageheader>
    <htmlpagefooter name="reportFooter" style="display:none;">
        <div>
            @php
              date_default_timezone_set('Asia/Dhaka');
            @endphp
           <p style = "text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
    </htmlpagefooter>

    @php
    $date = date('Y-m-d');
    @endphp
    <br><br>
    <div class="container">
       
        <table class="table">
            <thead>
                {{-- <tr style="text-align:center">
                    <th colspan="5">
                        Debit
                    </th>
                    <th colspan="5">
                        Credit
                    </th>
                </tr> --}}
                <tr style="text-align:center">
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>V. No</th>
                    <th>Submitted_by</th>
                    <th>Cash</th>
                    <th>Bank</th>
                    {{-- <th>Date</th>
                    <th>Particulars</th>
                    <th>V. No</th>
                    <th>Submitted_by</th>
                    <th>Cash</th>
                    <th>Bank</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($cashbook as $cashrecord)
                                        <tr>
                                        <td>{{ $cashrecord->transaction_date }}</td>
                                        <td>{{ $cashrecord->coaInfo -> name }}</td>
                                        @php
                                           $chequeid=App\Models\VoucherMaster::where('id',$cashrecord->voucher_id)->first();
                                           $employeename=App\Models\Employee::where('id',$chequeid->submitted_by)->first();
                                       @endphp
                                       <td>{{ $chequeid->voucher_no }}</td>
                                       <td>{{ $employeename->name }}</td>
                                        @if ($cashrecord->cash_amount)
                                        <td>{{ $cashrecord->cash_amount }}</td>
                                        <td></td>
                                            
                                        @else
                                        <td></td>
                                        <td>{{ $cashrecord->bank_amount }}</td>
                                        
                                        @endif
                                       
                                            </tr>
                                        @endforeach
                {{-- @for($i = 0; $i < $max_cnt; $i++) @if(isset($debit_entries[$i]) && $debit_entries[$i] ->
                    transaction_date == NULL)
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style = "text-align:right">{{ number_format($debit_entries[$i] -> cash_amount,2) }}</td>
                        <td style = "text-align:right">{{ number_format($debit_entries[$i] -> bank_amount,2) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style = "text-align:right">{{ number_format($debit_entries[$i] -> cash_amount,2) }}</td>
                        <td style = "text-align:right">{{ number_format($debit_entries[$i] -> bank_amount,2) }}</td>
                    </tr>
                    @elseif(isset($credit_entries[$i]) && $credit_entries[$i] -> transaction_date == NULL)
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style = "text-align:right">{{ number_format($credit_entries[$i] -> cash_amount,2) }}</td>
                        <td style = "text-align:right">{{ number_format($credit_entries[$i] -> bank_amount,2) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style = "text-align:right">{{ number_format($credit_entries[$i] -> cash_amount,2) }}</td>
                        <td style = "text-align:right">{{ number_format($credit_entries[$i] -> bank_amount,2) }}</td>
                    </tr>
                    @else
                    <tr class="text-center">
                        @if(isset($debit_entries[$i]))
                        <td>{{ $debit_entries[$i] -> transaction_date }}</td>
                        @if($debit_entries[$i] -> coa_id != NULL)
                        <td>To {{ $debit_entries[$i] -> coaInfo -> name }}</td>
                        @else
                        <td> By Balance b/d</td>
                        @endif
                        @php
                        $chequeid=App\Models\VoucherMaster::where('id',$debit_entries[$i]->voucher_id)->first();
                        $employeename=App\Models\Employee::where('id',$chequeid->submitted_by)->first();
                    @endphp
                    
                    <td>{{ $chequeid->voucher_no }}</td>
                    <td>{{ $employeename->name }}</td>
                        @if($debit_entries[$i] -> cash_amount != 0)
                        <td style = "text-align:right">{{ number_format($debit_entries [$i] -> cash_amount,2) }}</td>
                        @else
                        <td></td>
                        @endif
                        @if($debit_entries[$i] -> bank_amount != 0)
                        <td style = "text-align:right">{{ number_format($debit_entries [$i] -> bank_amount,2) }}</td>
                        @else
                        <td></td>
                        @endif
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                        @if(isset($credit_entries[$i]))
                        <td>{{ $credit_entries[$i] -> transaction_date }}</td>
                        @if($credit_entries[$i] -> coa_id != NULL)
                        <td>By {{ $credit_entries[$i] -> coaInfo -> name }}</td>
                        @else
                        <td>By Balance c/d</td>
                        @endif
                        @php
                        $chequeid=App\Models\VoucherMaster::where('id',$credit_entries[$i]->voucher_id)->first();
                        $employeename=App\Models\Employee::where('id',$chequeid->submitted_by)->first();
                    @endphp
                    
                    <td>{{ $chequeid->voucher_no }}</td>
                    <td>{{ $employeename->name }}</td>
                        @if($credit_entries[$i] -> cash_amount != 0)
                        <td style = "text-align:right">{{ number_format($credit_entries [$i] -> cash_amount,2) }}</td>
                        @else
                        <td></td>
                        @endif
                        @if($credit_entries[$i] -> bank_amount != 0)
                        <td style = "text-align:right">{{ number_format($credit_entries [$i] -> bank_amount,2) }}</td>
                        @else
                        <td></td>
                        @endif
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                    </tr>
                    @endif
                    @endfor --}}
            </tbody>
        </table>
    </div>
</body>

</html>