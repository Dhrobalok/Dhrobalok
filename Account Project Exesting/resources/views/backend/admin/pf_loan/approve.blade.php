@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="row form-group">
                <div class="col-lg-9"></div>
                <div class="col-lg-3">
                    <img src="{{ URL :: to($employee -> employee_photo) }}" height="150px" width="150px">
                </div>

            </div>

            <div class="row form-group">
                <div class="col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-header blue-color text-center f-100 text-bold">
                            <b>Basic Information</b>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Name : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> name }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Email : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> user_info -> email }}</label>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Mobile : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> mobile_no }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Department : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> department -> name }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Designation : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> designation -> name }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Registration No : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> employee_reg_id }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Type : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> type -> name }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Joining Date : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> joining_date }}</label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h6 class="f-100">Retired Date : </h6>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $employee -> retired_date }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-lg">
                        <div class="card-header text-center blue-color f-100">
                            <b>Others Information</b>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <label>Grade</label>
                                </div>
                                <div class="col-md-4">
                                    <label>Pay Scale</label>
                                </div>
                                <div class="col-md-4">
                                    <label>Basic Salary</label>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <label>{{ $employee -> payscale -> grade -> name }}</label>
                                </div>

                                <div class="col-md-4">
                                    <label><label>{{ $employee -> payscale -> payscale -> name }}</label></label>
                                </div>
                                <div class="col-md-4">
                                    <label><label>{{ $employee -> payscale -> payscale_detail -> salary_amount }}</label></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg">
                        <div class="card-header text-center blue-color f-100">
                            <b>Loan Information</b>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center form-group">
                                <div class="col-lg-3">
                                    <label><b>Loan Amount</b></label>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $loan -> loan_amount }} Tk.</label>
                                </div>
                            </div>
                            <div class="row justify-content-center form-group">
                                <div class="col-lg-3">
                                    <label><b>Loan Apple Date</b></label>
                                </div>
                                <div class="col-lg-6">
                                    <label>{{ $loan -> date }} </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-3">
                                    <button class="btn btn-primary f-100" type="button" id="approve">Approve</button>
                                </div>
                            </div>

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }

        })

        $.ajax({
            url: "{{ route('admin.pf-loan.approve-confirm') }}",
            type: "post",
            data: {
                loan_id: "{{ $loan -> id }}",
                user_id: "{{  Auth :: user() -> id }}"
            },
            success: function(response) {
                $.notify(response, 'success');
            }
        })
    })
})
</script>
@endpush