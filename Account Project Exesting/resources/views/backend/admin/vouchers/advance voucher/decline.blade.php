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
                        <a class="mr-2 btn f-100 btn-sm" id = "decline_btn"
                            href="#" data-target = "#decline" data-toggle = "modal"
                            style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                                class="fa fa-times mr-2"></i>Decline</a>
                    </div>


                </div>
            </div>
        </div>
        <div class="card">




            <div class="card-header f-roboto">
                <div class="row">


                    <div class="col-md-12">
                        <strong>Advance Voucher</strong>
                    </div>

                </div>

            </div>




            <div class="card-body">
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Advance Basic Information</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher No : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">AV/0{{ $advance -> budget_id }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher Date : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $advance -> created_at }}</strong>
                    </div>
                </div>

                @php
                $e_name=App\Models\Budget::where('id',$advance->budget_id)->first();

                @endphp

                @php
                $label = App\Models\Employee::find($e_name->level_id);
               @endphp
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Submitted By : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $label ->name }}</strong>
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
                                    <th style="font-size:14px;" class="text-center">Budget Name</th>

                                    <th style="font-size:14px;" class="text-center">Description</th>
                                    <th style="font-size:14px;" class="text-center">Amount</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach($advangebudget as  $value)

                                    <td class="text-center">{{ $value -> budget_name }}</td>
                                    <td class="text-center">{{ $value->description }}</td>
                                    <td class="text-center">{{ $value->cost }}</td>

                                    </tr>

                             @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


            <!-- advance voucher decline comment-->

            <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="f-100" style="font-size:20px;color:#1dbf73">Decline Confirmation</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                           <form id = "decline_confirm">
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
     $('#decline_confirm').on('submit',function(e){

          e.preventDefault();
          var comment = $('#comment').val();
          if(comment == '')
           comment = 'Voucher Declined';

         $.ajaxSetup({
             headers:
             {
                 'X-CSRF-Token' : "{{ csrf_token() }}"
             }
         });
         $.ajax({
             url : "{{ route('VoucherDeclineComment',['voucher_id' => $id]) }}",
             type : "post",
             data:{
                 comment : comment
             },
             success:function(message)
             {
                $('#decline').modal('hide');
                $('#decline_btn').text('Declined');
             }
         })
     });
 </script>
 @endpush
