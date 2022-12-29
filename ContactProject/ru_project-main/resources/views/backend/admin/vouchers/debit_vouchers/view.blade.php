@extends('backend.admin.index')
@section('content')
<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
               <div class="row">
                   <div class="col-md-6">
                     <a class = "mr-4" href = "{{ route('admin.voucher.debit.index') }}" style = "color:blue;font-weight:500;font-size:22px"><i class = "fa fa-arrow-circle-left mr-2"></i>Back</a>
                   </div>
                   <div class="col-md-6 text-right">
                     <a class = "mr-2" href = "{{ route('admin.voucher.debit.edit',['id' => $voucher -> id]) }}" style = "color:blue;font-weight:500;font-size:22px"><i class = "fa fa-pencil-alt mr-2"></i>Edit</a>
                   </div>
               </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header f-roboto">
                <div class="row">
                    <div class="col-md-12">
                        <strong>Payment Voucher</strong>
                    </div>

                </div>

            </div>
            <div class="card-body">
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Basic Information</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher No : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> voucher_no }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher Date : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $voucher -> date }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher For : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $voucher -> vendor -> name }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Submitted By : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> submitted_by_info -> name }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Posted By : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> posted_by_info -> name }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Transaction Method : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        @php
                        $transaction_info = App\Models\TransactionMethods :: find($voucher -> transaction_method_id)
                        @endphp
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $transaction_info -> name }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Cheque Number : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> cheque ? $voucher -> cheque -> page_number : '' }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Status : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        @php
                        $status = App\Models\VoucherStatus :: find($voucher->status)
                        @endphp
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $status -> name }}</strong>
                    </div>
                </div>
                <hr>
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Voucher Accounting</strong>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <table class="table table-sm table-striped table-bordered text-center">
                            <thead>
                                <tr class = "text-black">
                                    <th style="font-size:14px;" class="text-center">COA Name</th>
                                    <th style="font-size:14px;" class="text-center">COA Code</th>
                                    <th style="font-size:14px;" class="text-center">Description</th>
                                    <th style="font-size:14px;" class="text-center">Debit</th>
                                    <th style="font-size:14px;" class="text-center">Credit</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($details); $i=$i + 1) <tr>
                                    @php
                                    $account_details = $details[$i] -> chart_of_account;
                                    @endphp
                                    <td class="text-center">{{ $account_details -> name }}</td>
                                    <td class="text-center">{{ $account_details -> general_code }}</td>
                                    <td class="text-center">{{ $details[$i] -> description }}</td>
                                    <td class="text-center">{{ $details[$i] -> debit_amount ? $details[$i] -> debit_amount : ''  }}</td>
                                    <td class="text-center">{{ $details[$i] -> credit_amount ? $details[$i] -> credit_amount : '' }}</td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Voucher Logs</strong>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <table class="table table-striped table-sm table-bordered text-center">
                            <thead>
                                <tr class = "text-black">
                                    <th style="font-size:14px;">Date</th>
                                    <th style="font-size:14px;">By</th>
                                    <th style="font-size:14px;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log -> created_at }}</td>
                                    @php
                                        $name=App\Models\Employee :: where('roll',$log -> user_id)->first();
                                    @endphp
                                    <td>{{  $name-> name }}</td>
                                    <td>{{ $log -> comment }}</td>
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
