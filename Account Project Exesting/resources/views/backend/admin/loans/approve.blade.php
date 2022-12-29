@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header bg-light">
                    <div class="row">
                       
                        <div class="col-md-7">
                           <a class = "btn f-100 btn-info" href = "{{ route('admin.loan.pending-loans') }}"><i class = "fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                        <div class="col-md-5 text-right">
                            <button type="button" id="approve" class="btn f-100 btn-primary"><i
                                    class="fa fa-check mr-2"></i>I agree & approved</button>
                        </div>
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
                            <p class="f-100"> Loan Amount : </p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $loan -> base_amount }} Tk.</p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">EMI : </p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $loan -> emi_amount }} Tk.</p>
                        </div>
                    </div>
                    <div class="row mb-1">

                        <div class="col-md-3 text-right">
                            <p class="f-100"> Tenure Year(s) : </p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $loan -> tenure_year }} Yrs</p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">Total Payable Amount : </p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $loan -> total_amount }} Tk.</p>
                        </div>
                    </div>
                    <div class="row mb-4">

                        <div class="col-md-3 text-right">
                            <p class="f-100">Interest Rate : </p>
                        </div>
                        <div class="col-md-3">
                            <p class="f-100">{{ $loan -> interest_rate }} % </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(function() {
    $('#approve').click(function() {

        if (confirm('Are you sure to approve??')) {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            })

            $.ajax({
                url: "{{ route('admin.loan.approve-confirm') }}",
                type: "post",
                data: {
                    loan_id: "{{ $loan -> id }}",
                    user_id: "{{  Auth :: user() -> id }}"
                },
                success: function(response) {
                    $.notify(response, 'success');
                }
            });
        }
    })
})
</script>
@endpush