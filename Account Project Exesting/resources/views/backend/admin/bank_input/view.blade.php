@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="block-content block-content-full">
        <div class="card border-info">
          <div class="card-header f-100 border-info">
            <b>Bank Input</b>
          </div>
          <div class="card-body">
          <div class="row form-group justify-content-center">
            <div class="col-md-2">
                <label>Voucher No</label>
            </div>
            <div class="col-md-2 form-group bg-white">
                <label>{{ $voucher -> voucher_no }}</label>
            </div>
        </div>
        <div class="row form-group">

            <div class="col-md-2">
                <label>Submitted By</label>
            </div>
            <div class="col-md-3 form-group bg-white">
                <label>{{ $voucher -> submitted_by }}</label>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <label>Voucher By</label>
            </div>
            <div class="col-md-2 form-group bg-white">
                <label>{{ $voucher -> voucher_by }}</label>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-2">
                <label>Voucher Date</label>
            </div>
            <div class="col-md-3 form-group bg-white">
                <label>{{ substr($voucher -> date, 0, 10) }}</label>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <label>Transaction Method</label>
            </div>
            <div class="col-md-2 form-group bg-white">
                @php
                $transaction_info = App\Models\TransactionMethods :: find($voucher -> transaction_method_id)
                @endphp
                <label>{{ $transaction_info -> name }}</label>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-3 form-group bg-white">
                @php
                $status = App\Models\VoucherStatus :: find($voucher->status)
                @endphp
                <label class="text-center">{{ $status -> name}}</label>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                <label>Cheque Number</label>
            </div>
            <div class="col-md-2 form-group bg-white">

                <label>{{ $voucher -> cheque_no }}</label>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table table-striped bg-white">
                    <thead>
                        <tr>
                            <th style="font-size:14px;" class = "text-center">Date</th>
                            <th style="font-size:14px;" class = "text-center">COA Name</th>
                            <th style="font-size:14px;" class = "text-center">COA Code</th>
                            <th style="font-size:14px;" class = "text-center">Description</th>
                            <th style="font-size:14px;" class = "text-center">Debit</th>
                            <th style="font-size:14px;" class = "text-center">Credit</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                     @for($i = 0; $i < count($details); $i = $i + 1)
                     <tr class = "bg-white">
                     @php
                       $account_details =  $details[$i] -> chart_of_account;
                     @endphp
                      <td class = "text-center">{{ substr($details[$i] -> entry_date, 0, 10) }}</td>
                      <td class = "text-center">{{ $account_details -> name }}</td>
                      <td class = "text-center">{{ $account_details -> general_code }}</td>
                      <td class = "text-center">{{ $details[$i] -> description }}</td>
                      <td class = "text-center">{{ $details[$i] -> debit_amount }}</td>
                      <td class = "text-center">{{ $details[$i] -> credit_amount }}</td>
                      </tr>
                     @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
            </div>
        </div>
          </div>
        </div>
    </div>
</div>
@endsection