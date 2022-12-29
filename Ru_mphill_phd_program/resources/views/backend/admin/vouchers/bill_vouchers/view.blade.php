@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="block-content block-content-full">
         
         <div class="card border-info">
           <div class="card-header border-info f-100">
              <b>Online Bill</b>
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
                <label>{{ $voucher -> date }}</label>
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
                            
                            <th style="font-size:14px;">Description</th>
                            <th style="font-size:14px;">Amount</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     @for($i = 0; $i < count($debits); $i = $i + 1)
                     <tr class = "bg-white">
                    
                    
                      <td class = "text-center">{{ $debits[$i] -> description }}</td>
                      <td class = "text-center">{{ $debits[$i] -> debit_amount }}</td>
                      </tr>
                     @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table table-striped bg-white">
                    <thead>
                        <tr>
                            <th style="font-size:14px;">Approved/Rejected By</th>
                            <th style="font-size:14px;">Comment</th>
                            <th style="font-size:14px;">Status</th>
                            <th style="font-size:14px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>

                            <td>{{ App\Models\User :: find($log -> user_id) -> name }}</td>
                            <td>{{ $log -> comment }}</td>
                            <td>{{ App\Models\VoucherStatus :: find($log -> status) -> name }}</td>
                            <td>{{ $log -> created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
           </div>
         </div>
    </div>
</div>
@endsection
