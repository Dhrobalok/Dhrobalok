@extends('backend.admin.index')
@section('content')
<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('admin.voucher.generated') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>
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
                        <strong class="f-roboto">Basic Information</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher No : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">AV/0{{ $budgetdetails -> budget_id }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Voucher Date : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $generet -> created_at }}</strong>
                    </div>
                </div>
                @php
                $level_id=App\Models\Budget::where('id',$generet->budget_id)->first();
               @endphp
               @php
                 $e_name=App\Models\Employee::where('user_id',$level_id->level_id)->first();
               @endphp

                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Submitted By : </strong>
                    </div>
                    <div class="col-md-7 bg-white">


                 <strong class="f-100 font-weight-normal"style="font-size:18px;">{{ $e_name -> name }}</strong>
                    </div>
                </div>



                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Status : </strong>
                    </div>
                    <div class="col-md-7 bg-white">

                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $generet -> generated_status }}</strong>
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
                                @foreach ( $details as $detail)

                                    <td class="text-center">{{ $detail -> budget_name }}</td>
                                    <td class="text-center">{{ $detail -> description }}</td>
                                    <td class="text-center">{{$detail -> cost  }}</td>

                                    </tr>


                                    @endforeach
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

