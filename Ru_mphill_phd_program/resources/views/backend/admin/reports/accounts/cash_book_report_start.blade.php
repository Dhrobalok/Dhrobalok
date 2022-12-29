@extends('backend.admin.index')
@section('content')
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body bg-white">
                <div class="row text-right form-group">
                        <div class="col-md-12">
                           <div class="btn-group">
                               <a href = "{{ route('cash-book-report-download') }}" class = "btn btn-danger btn-sm f-100"><i class = "fa fa-print mr-2"></i>Print</a>
                           </div>
                        </div>
                    </div>
                    <div>
                        <p style="text-align:center;">
                            <img src="{{ asset('public/company_pic/ru-logo.png') }}" height="50px"
                            width="50px" >
                        </p>
                       
                        <h3 style="text-align:center">Institute Of Biological Science</h3>
                       
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black" style="line-height:5px;">Cash Book</h4>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black" style="line-height:5px">As at {{ date("F j, Y") }}</h4>
                        </div>
                    </div>
                   @php 
                     $total_debit_amount  = 0; $total_credit_amount = 0;
                   @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-vcenter table-sm text-black table-striped table-bordered">
                                <thead>
                                    {{-- <tr class = "text-center">
                                        <th colspan = "5">
                                            Debit
                                        </th>
                                        <th colspan = "5">
                                            Credit
                                        </th>
                                    </tr> --}}
                                    <tr class = "text-center">
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
                                   {{-- @for($i = 0; $i < $max_cnt; $i++)
                                   @if(isset($debit_entries[$i]) && $debit_entries[$i] -> transaction_date == NULL)
                                     <tr class = "text-center">
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>{{ number_format($debit_entries[$i] -> cash_amount,2) }}</td>
                                         <td>{{ number_format($debit_entries[$i] -> bank_amount,2) }}</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>{{ number_format($debit_entries[$i] -> cash_amount,2) }}</td>
                                         <td>{{ number_format($debit_entries[$i] -> bank_amount,2) }}</td>
                                     </tr>
                                   @elseif(isset($credit_entries[$i]) && $credit_entries[$i] -> transaction_date == NULL)
                                   <tr class = "text-center">
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>{{ number_format($credit_entries[$i] -> cash_amount,2) }}</td>
                                         <td>{{ number_format($credit_entries[$i] -> bank_amount,2) }}</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>{{ number_format($credit_entries[$i] -> cash_amount,2) }}</td>
                                         <td>{{ number_format($credit_entries[$i] -> bank_amount,2) }}</td>
                                     </tr>
                                   @else --}}
                                   {{-- <tr class = "text-center">
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
                                          <td>{{ number_format($debit_entries [$i] -> cash_amount,2) }}</td>
                                          
                                       @else
                                         <td></td>
                                       @endif
                                       @if($debit_entries[$i] -> bank_amount != 0)
                                          <td>{{ number_format($debit_entries [$i] -> bank_amount,2) }}</td>
                                          
                                         
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
                                      @php  $total_credit_amount += ($credit_entries [$i] -> cash_amount + $credit_entries [$i] -> bank_amount); @endphp
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
                                          <td>{{ number_format($credit_entries [$i] -> cash_amount,2) }}</td>
                                          
                                       @else
                                        <td></td>
                                       @endif
                                       @if($credit_entries[$i] -> bank_amount != 0)
                                          <td>{{ number_format($credit_entries [$i] -> bank_amount,2) }}</td>
                                       @else
                                         <td></td>
                                       @endif
                                       @else
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                      @endif --}}
                                   
                                   {{-- @endif
                                   @endfor --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
 <style>
     table tbody td,table thead th
     {
         font-size:15px;
     }
 </style>
@endpush