@extends('backend.admin.index')
@section('content')
<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('admin.approve.index') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="mr-2 btn f-100 btn-sm" id = "approve_btn"
                            href="#" data-target = "#approve" data-toggle = "modal"
                            style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                                class="fa fa-check mr-2"></i>Approve</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            


            <div class="card-header f-roboto">
                <div class="row">

                       
                    <div class="col-md-12">
                        <strong>{{ $voucher -> voucher_type -> description }}</strong>
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

                {{-- @if($voucher -> type == 4 || $voucher -> type == 2)
                 <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Vendor Name : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> vendor ? $voucher -> vendor -> name : '' }}</strong>
                    </div>
                </div> 
                @elseif($voucher -> type == 1)
                {{-- <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Customer Name : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $voucher -> customer -> name }}</strong>
                    </div>
                </div> 
                @endif --}}
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
                                <tr class="text-black">
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
                                    <td class="text-center">
                                        {{ $details[$i] -> debit_amount ? $details[$i] -> debit_amount : ''  }}</td>
                                    <td class="text-center">
                                        {{ $details[$i] -> credit_amount ? $details[$i] -> credit_amount : '' }}</td>
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
                                <tr class="text-black">
                                    <th style="font-size:14px;">Date</th>
                                    <th style="font-size:14px;">By</th>
                                    <th style="font-size:14px;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    @php
                                        $name=App\Models\Employee :: where('roll',$log -> user_id)->first();
                                    @endphp
                                    <td>{{ $log -> created_at }}</td>
                                    <td>{{ $name -> name }}</td>
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

<div class="modal fade" id="approve" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="f-100" style="font-size:20px;color:#1dbf73">Approve Confirmation</div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
               <form id = "approve_confirm">
                   <div class="row form-group">
                       <div class="col-md-12">
                           <textarea class = "form-control" rows = "4" placeholder = "Write down notes if any. It helps the accountant to correct the voucher." id = "comment"></textarea>
                       </div>
                   </div>
                   <div class="row text-center">
                       <div class="col-md-12">
                         <button type = "submit" style = "border:2px solid #1dbf73;color:#1dbf73;"  class = "btn f-100">CONFIRM</button>
                       </div>
                   </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $('#approve_confirm').on('submit',function(e){

         e.preventDefault();
         var comment = $('#comment').val();
         if(comment == '')
          comment = 'Voucher Approved';

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ route('admin.voucher.approve.confirm',['voucher_id' => $voucher -> id]) }}",
            type : "post",
            data:{
                comment : comment
            },
            success:function(message)
            {
               $('#approve').modal('hide');
               $('#approve_btn').text('Approved');
            }
        })
    });
</script>
@endpush
