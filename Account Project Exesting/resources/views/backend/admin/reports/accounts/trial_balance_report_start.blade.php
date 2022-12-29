@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body bg-white">
                <div class="row text-right form-group">
                        <div class="col-md-12">
                           <div class="btn-group">
                               <a href = "{{ route('download-trial-balance') }}" class = "btn btn-danger f-100"><i class = "fa fa-print mr-2"></i>Print</a>
                           </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black">{{ $company -> company_name  }}</h4>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black" style="line-height:5px;">Adjusted Trial Balance</h4>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black" style="line-height:5px">As at {{ date("F j, Y") }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-vcenter table-sm text-black table-striped table-bordered">
                                <thead>
                                    <tr class = "text-center">
                                        <th>SL. No</th>
                                        <th>Account Name</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $sl = 0; $credit_amount = 0; $debit_amount= 0;
                                     $netbill=0;
                                   
                                    @endphp
                                    @foreach($accounts as $account)
                                    <tr class = "text-center">
                                        @php $sl = $sl + 1;
                                        $records = App\Models\Ledger :: where('coa_id',$account -> coa_id) -> get();
                                        $debit_balance = $records -> sum('debit_amount');
                                        $credit_balance = $records -> sum('credit_amount');
                                        @endphp
                                        <td>{{ $sl }}</td>
                                        <td>

                                            {{ $account -> coa_info -> name }}

                                        </td>




                                        @if($debit_balance > $credit_balance)
                                        @php
                                        $debit_amount += ($debit_balance - $credit_balance);
                                        @endphp
                                        <td>{{ number_format($debit_balance - $credit_balance,2) }}</td>
                                        <td></td>
                                        @elseif($debit_balance < $credit_balance) @php $credit_amount +=($credit_balance
                                            - $debit_balance); @endphp <td>
                                            </td>
                                            <td>{{ number_format($credit_balance - $debit_balance,2) }}</td>
                                            @else
                                            <td>0</td>
                                            <td>0</td>
                                            @endif

                                   </tr>
                                    @endforeach
                                    
                                    {{--
                                   
                                    @if( Session::get('id'))
                                    
                                  

                                     @foreach($bulk as $value)
                                     <tr class="text-center">
                                         @php
                                         
                                        $debit_amount=$value->net_bill+$debit_amount; 
                                         @endphp
                                         <td>{{ $sl=$sl+1 }}</td>

                                        <td>
                                            {{$value->agreement_name}} selling
                                        </td>

                                        <td>
                                            {{$value->net_bill}}
                                        </td>
                                        <td></td>
                                     </tr>


                                     @endforeach

                                   
                                 
                                  

                                   
                                   @endif
                                   
                                   --}}


                                    <tr class = "text-center">
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td>
                                            <strong>

                                              
                                                 {{ number_format($debit_amount,2) }}
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ number_format($credit_amount,2) }}

                                            </strong>
                                        </td>
                                    </tr>
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
