@extends('backend.admin.index')
@section('content')
<div class="container px-0 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body bg-white">
                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a href="{{ route('download-balance-sheet') }}" class="btn btn-sm btn-danger f-100"><i
                                        class="fa fa-file-pdf mr-2"></i>Print</a>
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
                            <h4 class="f-100 text-black" style="line-height:5px;">Balance Sheet</h4>
                        </div>
                    </div>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <h4 class="f-100 text-black" style="line-height:5px">As at {{ date("F j, Y") }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="f-100 font-weight-bold" style="font-size:19px;">ASSETS</h5>
                            @php $assets_grand_total = 0; @endphp
                            @foreach($group_accounts['Asset'] as $asset_category)
                              @php $total_assets = 0; @endphp
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="f-100 text-black font-weight-bold"
                                        style="line-height:0.5px;font-size:20px;">{{ $asset_category }}</h5>
                                </div>
                            </div>


                            @if(isset($filltered_accounts[$asset_category]))
                            @foreach($filltered_accounts[$asset_category] as $account)
                              @php
                                $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                                $debit_balance = $records -> sum('debit_amount');
                                $credit_balance = $records -> sum('credit_amount');
                                $balance = $debit_balance - $credit_balance;
                                $total_assets += $balance;
                                $assets_grand_total += $balance;
                              @endphp

                            <div class="row">
                                <div class="col-md-8">
                                    <h5 style="font-size:20px;" class="ml-4">{{ $account -> name }}</h5>
                                </div>
                                @if($balance >= 0)
                                <div class="col-md-4 text-right">
                                    <h5 style="font-size:20px;">{{ number_format($debit_balance - $credit_balance,2) }}</h5>
                                </div>
                                @else
                                <div class="col-md-4 text-right">
                                    <h5 style="font-size:20px;">({{ number_format(-$balance,2) }})</h5>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @endif
                            <div class="row">
                                <div class="col-md-8">
                                  <h5 style="font-size:20px;" class = "pl-4">Total {{ $asset_category }}</h5>
                                </div>
                                <div class="col-md-4 text-right">
                                   <h5 style="font-size:20px;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($total_assets,2) }}</h5>
                                </div>
                            </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-8">
                                  <h5 style="font-size:20px;font-weight:bold">Total assets</h5>
                                </div>
                                <div class="col-md-4 text-right">
                                   <h5 style="font-size:20px;border-top:2px double black;border-bottom:2px solid black">{{ number_format($assets_grand_total,2) }}</h5>
                                </div>
                            </div>

 <div class="row">

                 <div class="col-md-8">
                    <h5 class="f-100 font-weight-bold" style="font-size:19px;">LIABILITIES AND SHAREHOLDERS'
                        EQUITY</h5>
                    @php $liability_grand_total = 0; @endphp
                    @foreach($group_accounts['Liability'] as $liability_category)
                      @php $total_liability = 0; @endphp
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="f-100 text-black font-weight-bold"
                                style="line-height:0.5px;font-size:20px;">{{ $liability_category }}</h5>
                        </div>
                    </div>
                    @if(isset($filltered_accounts[$liability_category]))
                    @foreach($filltered_accounts[$liability_category] as $account)
                      @php
                        $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                        $debit_balance = $records -> sum('debit_amount');
                        $credit_balance = $records -> sum('credit_amount');
                        $balance = $debit_balance - $credit_balance;
                        $total_liability += $balance;
                        $liability_grand_total += $balance;
                      @endphp
                      <div class="row">
                        <div class="col-md-8">
                            <h5 style="font-size:20px;" class="ml-4">{{ $account -> name }}</h5>
                        </div>
                        @if($balance >= 0)
                        <div class="col-md-4 text-right">
                            <h5 style="font-size:20px;">{{ number_format($debit_balance - $credit_balance,2) }}</h5>
                        </div>
                        @else
                        <div class="col-md-4 text-right">
                            <h5 style="font-size:20px;">({{ number_format(-$balance,2) }})</h5>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                          <h5 style="font-size:20px;" class = "pl-4">Total {{ $liability_category }}</h5>
                        </div>
                        <div class="col-md-4 text-right">
                           <h5 style="font-size:20px;border-top:2px solid black;border-bottom:2px solid black">{{ number_format($total_liability,2) }}</h5>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-8">
                          <h5 style="font-size:20px;font-weight:bold">Total liabilities</h5>
                        </div>
                        <div class="col-md-4 text-right">
                           <h5 style="font-size:20px;border-top:2px double black;border-bottom:2px solid black">{{ number_format($liability_grand_total,2) }}</h5>
                        </div>
                    </div>
                    @foreach($group_accounts['Equity'] as $equity_category)
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="f-100 text-black font-weight-bold"
                                style="line-height:0.5px;font-size:20px;">{{ $equity_category }}</h5>
                        </div>
                    </div>
                    @if(isset($filltered_accounts[$equity_category]))
                    @foreach($filltered_accounts[$equity_category] as $account)
                      @php
                        $records = App\Models\Ledger :: where('coa_id',$account -> id) -> get();
                        $debit_balance = $records -> sum('debit_amount');
                        $credit_balance = $records -> sum('credit_amount');
                        $balance = $debit_balance - $credit_balance;
                        $total_liability += $balance;
                        $liability_grand_total += $balance;
                      @endphp
                      <div class="row">
                        <div class="col-md-8">
                            <h5 style="font-size:20px;" class="ml-4">{{ $account -> name }}</h5>
                        </div>
                        @if($balance >= 0)
                        <div class="col-md-4 text-right">
                            <h5 style="font-size:20px;">{{ number_format($debit_balance - $credit_balance,2) }}</h5>
                        </div>
                        @else
                        <div class="col-md-4 text-right">
                            <h5 style="font-size:20px;">({{ number_format(-$balance,2) }})</h5>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                    <div class="row">
                        <div class="col-md-8">
                          <h5 style="font-size:20px;font-weight:bold">Total liabilities and shareholder's equity</h5>
                        </div>



               </div>

            </div>               <div class="col-md-4 text-right">
                                   <h5 style="font-size:20px;border-top:2px double black;border-bottom:2px solid black">{{ number_format($liability_grand_total,2) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
