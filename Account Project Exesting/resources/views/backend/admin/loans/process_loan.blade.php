@extends('backend.admin.index')
@section('content')
<div class="container-fluid mb-4">
    <div class="block-content block-content-full">
        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('admin.loan.waiting.index') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-info btn-sm f-100" id="mark_as_complete_btn"><i
                                class="fa fa-check mr-2"></i>Mark As Complete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header f-roboto">
                <div class="row">
                    <div class="col-md-12">
                        <strong>House Building Loan</strong>
                    </div>

                </div>

            </div>
            <div class="card-body">
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Loan Information</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Loan Ref. : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $loan -> loan_ref_no }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Apply Date : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $loan -> created_at }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Employee Name : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal"
                            style="font-size:18px;">{{ $loan -> employee_info -> name  }}</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Principal Amount : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $loan -> base_amount }}
                            /=</strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-5 text-right">
                        <strong class="f-100 text-black" style="font-size:18px;">Payable Amount : </strong>
                    </div>
                    <div class="col-md-7 bg-white">
                        <strong class="f-100 font-weight-normal" style="font-size:18px;">{{ $loan -> total_amount }}
                            /=</strong>
                    </div>
                </div>



                <hr>
                <div class="row text-center mb-3">
                    <div class="col-md-12">
                        <strong class="f-roboto">Journal Entries</strong>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <table class="table table-sm table-striped table-bordered text-center">
                            <thead>
                                <tr class="text-black">
                                    <th style="font-size:14px;" class="text-center">COA Name</th>
                                    <th style="font-size:14px;" class="text-center">A/C Code</th>

                                    <th style="font-size:14px;" class="text-center">Debit</th>
                                    <th style="font-size:14px;" class="text-center">Credit</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $account_info = App\Models\ChartOfAccount :: find($accounts[3]);
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $account_info-> name  }}</td>
                                    <td>{{ $account_info -> general_code }}</td>
                                    <td>{{ $loan -> base_amount }}</td>
                                    <td></td>
                                </tr>
                                @php
                                $account_info = App\Models\ChartOfAccount :: find($accounts[0]);
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $account_info-> name  }}</td>
                                    <td>{{ $account_info -> general_code }}</td>
                                    <td></td>
                                    <td>{{ $loan -> base_amount }}</td>

                                </tr>
                                @php
                                $account_info = App\Models\ChartOfAccount :: find($accounts[1]);
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $account_info-> name  }}</td>
                                    <td>{{ $account_info -> general_code }}</td>
                                    <td>{{ $loan -> total_amount - $loan -> base_amount }}</td>
                                    <td></td>
                                </tr>
                                @php
                                $account_info = App\Models\ChartOfAccount :: find($accounts[2]);
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $account_info-> name  }}</td>
                                    <td>{{ $account_info -> general_code }}</td>
                                    <td></td>
                                    <td>{{ $loan -> total_amount - $loan -> base_amount }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$('#mark_as_complete_btn').click(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    })
    $.ajax({
        url: "{{ route('admin.loan.process.complete') }}",
        type: "post",
        data: {
            loan_id: "{{ $loan -> id }}"
        }
    }).done(function() {

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Loan entries successfully saved in the system',
            showConfirmButton: false,
            timer: 3000
        })
    });
});
</script>
@endpush