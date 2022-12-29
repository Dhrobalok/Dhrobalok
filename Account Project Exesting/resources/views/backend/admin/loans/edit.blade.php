@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
  <form id = "loan_application">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
              <div class="card-header bg-light">
                 <div class="row">
                     <div class="col-md-8">
                         <div class = "f-roboto">Application Details</div>
                     </div>
                     @if($loan -> status != 2)
                     <div class="col-md-4 text-right">
                         <button type = "submit" class = "btn f-100 btn-primary btn-sm"><i class = "fa fa-check mr-2"></i>Marked As Checked</button>
                     </div>
                     @endif
                 </div>
               </div>
                <div class="card-body">
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <img src="{{ URL :: to($employee -> employee_photo) }}" height="150px" width="150px"
                                class="rounded-circle">
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-roboto">Employee Basic Identity</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Name : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> name }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Email : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> user_info -> email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Department : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> department -> name }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Designation : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> designation -> name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Mobile No : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> mobile_no }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Registration : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> employee_reg_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <p class="f-100"> Joining Date : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> joining_date }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Retired Date: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> retired_date }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            <p class="f-100"> Class : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> type -> name }}</p>
                        </div>

                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-roboto">PayScale & Grade Info</h4>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <p class="f-100"> PayScale </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100"> Grade </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100"> Basic Pay </p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <p class="f-100"> {{ $employee -> payscale -> payscale -> name }} </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100"> {{ $employee -> payscale -> grade -> name }} </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100"> {{ $employee -> payscale -> payscale_detail -> salary_amount }} </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4 class="f-roboto">Loan Application Details</h4>
                        </div>
                    </div>
                    <div class="row mb-1">

                        <div class="col-md-3 text-right">
                            <p class="f-100"> Loan Amount</p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control text-center" step="any" id="loan_amount"
                                value="{{ $loan -> base_amount }}">
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">EMI</p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" step="any" id="emi"
                                value="{{ $loan -> emi_amount }}">
                        </div>
                    </div>
                    <div class="row mb-1">

                        <div class="col-md-3 text-right">
                            <p class="f-100"> Tenure Year(s)</p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control text-center" step="any" id="tenure_year"
                                value="{{ $loan -> tenure_year }}">
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">Total Payable Amount</p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" step="any" id="total_payable"
                                value="{{ $loan -> total_amount }}">
                        </div>
                    </div>
                    <div class="row mb-4">

                        <div class="col-md-3 text-right">
                            <p class="f-100">Interest Rate</p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control text-center" step="any" id="interest_rate"
                                value="{{ $loan -> interest_rate }}">
                        </div>

                    </div>
                    <div class="row text-center mb-2">
                        <div class="col-md-12">
                            <button type="button" class="f-100 btn btn-sm btn-primary" id="calculate_emi">Calculate
                                EMI</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="distributions" style = "max-height:400px; overflow:scroll">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@push('js')
<script>
$(document).ready(function() {
    $('#calculate_emi').on('click', function() {

        var P = $('#loan_amount').val();
        var N = $('#tenure_year').val();
        var R = $('#interest_rate').val();

        if (P != 0 && N != 0) {

            var interest = R / 1200.00;
            var term = N * 12;
            var top = Math.pow((1 + interest), term);
            var bottom = top - 1;
            var ratio = top / bottom;
            var EMI = P * interest * ratio;
            var Total = EMI * term;
            $('#emi').val(Math.ceil(EMI));
            $('#total_payable').val(Math.ceil(Total));
        }

        $.ajax({
            url: "{{ route('ajax.calculate-emi-list') }}",
            type: "get",
            data: {
                rate: interest,
                principal_amount : P,
                months : term,
                emi : Math.ceil(EMI)
            },
            success:function(content)
            {
               $('#distributions').html(content)
            }
        })
    });


    $('#loan_application').submit(function(e) {
        e.preventDefault();
        var EMI = $('#emi').val();
        var P = $('#loan_amount').val();
        var R = $('#interest_rate').val();
        var loan_id = "{{ $loan -> id }}";
        var payable_amount = $('#total_payable').val();

        var N = $('#tenure_year').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('admin.loan.update') }}",
            type: "post",
            data: {
                EMI: EMI,
                P: P,
                R: R,
                payable_amount: payable_amount,
                N: N,
                loan_id: loan_id
            },
            success: function(response) {
                alert(response);

            }
        })
    });
})
</script>
@endpush