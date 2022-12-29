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
                    @if ($errors->any())

                    <div class="col-md-6 text-right">
                    <a class="mr-2 btn f-100 btn-sm"
                    style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                    class="fa fa-check mr-2"></i>Approved</a>
                  </div>




                  @elseif (!$errors->any())



                    <div class="col-md-6 text-right">
                   <a class="mr-2 btn f-100 btn-sm" href = "{{ route('AdvanceVoucherAproveConfirm',['voucher_id'=>$id]) }}"
                            style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                                class="fa fa-check mr-2"></i>Approve</a>
                    </div>


                    @endif


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
                $label = App\Models\Employee::where('user_id',$e_name->level_id)->first();
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


            <!-- advance voucher -->


 @endsection


