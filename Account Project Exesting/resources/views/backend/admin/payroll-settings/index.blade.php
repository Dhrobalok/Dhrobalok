@extends('backend.admin.index')
@section('content')
<div class="container-fluid px-0 mb-4">
    <div class="card px-0 mb-4">
        <div class="card-header bg-white">
            <div class="f-roboto">Settings</div>
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form id="update_settings">
                <div class="row form-group">
                    <div class="col-md-12 text-right">
                        <button id="update_btn" class="btn f-100" style="background:blue;color:white"><i
                                class="fa fa-check mr-2"></i>Save
                            Changes</button>
                    </div>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Company Identity & Fiscal Year</div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <img class = "rounded-circle" src = "{{ URL :: to($company_info -> company_logo) }}" height = "150px" width = "150px" id = "company_logo">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <input type = "file" name = "company_logo" id = "file_upload_photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label style="font-size:18px;" class="pl-4">Company Name</label>
                    </div>
                    <div class="col-md-6">
                        <label style="font-size:18px;" class="pl-3">Address</label>
                    </div>
                </div>
                <div class="row pl-4 form-group">

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="company_name"
                            value="{{ $company_info -> company_name }}">
                    </div>

                    <div class="col-md-6">
                        <textarea class="form-control" rows="1"
                            name="company_address">{{ $company_info -> company_address }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label style="font-size:18px;" class="pl-4">Fiscal Year</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label style="font-size:18px;" class="pl-4">Last Day</label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="month">
                            <option value="{{ $company_info -> month }}" hidden selected>{{ $company_info -> month }}
                            </option>
                            @for($months = 1; $months <= 12; $months++) @php $month_name=date('F', mktime(0, 0, 0,
                                $months, 10));@endphp <option value="{{ $month_name  }}">{{ $month_name }}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="col-md-1 px-0">
                        <select class="form-control" name="day">
                            <option value="{{ $company_info -> day }}" selected hidden>{{ $company_info -> day }}
                            </option>
                            @for($day = 1; $day <= 31; $day++) <option value="{{ $day  }}">{{ $day }}</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mb-4 mt-2">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Salary Accouting Entry</div>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Credit Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($salary_accounts[0]);
                        @endphp
                        <select class="form-control" name="salary_debit_account" id="salary_debit_account">
                            <option value="{{ $salary_accounts[0] }}" selected>
                                {{ $account -> name }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Debit Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($salary_accounts[1]);
                        @endphp
                        <select class="form-control" name="salary_credit_account" id="salary_credit_account">
                            <option value="{{ $salary_accounts[1] }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Provident Fund Contribution Rule</div>
                    </div>

                </div>

                <div class="row px-0">
                    <div class="col-md-12">
                        <table class="table table-sm table-bordered table-striped text-black">
                            <tr class="text-center">
                                <th>PayScale</th>
                                <th>Grade</th>
                                <th>Salary Range</th>
                                <th>Rate(Min.)(%)</th>
                                <th>Rate(Max.)(%)</th>
                            </tr>
                            @foreach($pay_scales as $pay_scale)

                            @php
                            $isFound = 0;
                            $min_rate = 5;
                            $max_rate = 5;
                            foreach($provident_rules as $provident_rule)
                            {
                            if($provident_rule -> payscale_id == $pay_scale -> id && $provident_rule -> grade_id ==
                            $pay_scale -> grade_id)
                            {
                            $isFound = 1;
                            $min_rate = $provident_rule -> min_rate_percentage;
                            $max_rate = $provident_rule -> max_rate_percentage;
                            break;
                            }
                            }
                            @endphp

                            <input type="hidden" name="payscales[]" value="{{ $pay_scale -> id }}">
                            <input type="hidden" name="grades[]" value="{{ $pay_scale -> grade_id }}">

                            <tr class="text-center">
                                <td style="width:30%">{{ $pay_scale -> name }}</td>
                                <td style="width:30%;">{{ $pay_scale -> grade -> name }}</td>
                                <td style="width:30%">
                                    {{ number_format($pay_scale -> start_salary).' - '.number_format($pay_scale -> end_salary) }}
                                </td>
                                <td>
                                    <input type="number" min="5" name="min_rates[]" class="form-control text-center"
                                        value="{{ $min_rate  }}" required>
                                </td>

                                <td>
                                    <input type="number" max="25" name="max_rates[]" class="form-control text-center"
                                        value="{{ $max_rate }}" required>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Provident Fund Contribution Accouting</div>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Provident Fund Contribution</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pf_accounts[0]);
                        @endphp
                        <select class="form-control" name="pf_contribution_ac" id="pf_contribution_ac">
                            <option value="{{ $pf_accounts[0] }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Provident Fund Payable</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pf_accounts[1]);
                        @endphp
                        <select class="form-control" name="pf_payable_ac" id="pf_payable_ac">
                            <option value="{{ $pf_accounts[1] }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Provident Fund Bank</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pf_accounts[2]);
                        @endphp
                        <select class="form-control" name="pf_contribution_bank_ac" id="pf_contribution_bank_ac">
                            <option value="{{ $pf_accounts[2] }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Operational Bank</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pf_accounts[3]);
                        @endphp
                        <select class="form-control" name="pf_contribution_op_ac" id="pf_contribution_op_ac">
                            <option value="{{ $pf_accounts[3] }}" selected>
                                {{ $account -> name  }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">House Building Loan Accouting</div>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Cash Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($loan_accounts[0]);
                        @endphp
                        <select class="form-control" name="loan_given_ac" id="loan_given_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Interest Receivable Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($loan_accounts[1]);
                        @endphp
                        <select class="form-control" name="interest_rec_ac" id="interest_rec_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Interest Income</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($loan_accounts[2]);
                        @endphp
                        <select class="form-control" name="interest_income" id="interest_income">
                            <option value="{{ $account  -> id }}" selected>
                                {{ $account  -> name  }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Loan Process Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($loan_accounts[3]);
                        @endphp
                        <select class="form-control" name="loan_process_account" id="loan_process_account">
                            <option value="{{ $account  -> id }}" selected>
                                {{ $account  -> name  }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Pension Accouting</div>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Cash Account</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pension_accounts[0]);
                        @endphp
                        <select class="form-control" name="pension_cash_ac" id="pension_cash_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name  }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Pension Expense</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pension_accounts[1]);
                        @endphp
                        <select class="form-control" name="pension_expense_ac" id="pension_expense_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Accured Pension Liability</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($pension_accounts[2]);
                        @endphp
                        <select class="form-control" name="pension_liability_ac" id="pension_liability_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mb-4 mt-4">
                    <div class="col-md-12">
                        <div class="f-roboto pb-2 pt-2 bg-light pl-4">Gratuity Accouting</div>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Gratuity Expense</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($gratuity_accounts[0]);
                        @endphp
                        <select class="form-control" name="gratuity_expense_ac" id="gratuity_expense_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name  }}({{ $account -> general_code }})</option>
                        </select>
                    </div>

                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Gratuity Payable</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($gratuity_accounts[1]);
                        @endphp
                        <select class="form-control" name="gratuity_payable_ac" id="gratuity_payable_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Gratuity Bank</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($gratuity_accounts[2]);
                        @endphp
                        <select class="form-control" name="gratuity_bank_ac" id="gratuity_bank_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name  }}({{ $account -> general_code }})</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-4">
                        <label style="font-size:18px;" class="pl-4">Operational Bank</label>
                    </div>
                    <div class="col-md-5">
                        @php
                        $account = App\Models\ChartOfAccount :: find($gratuity_accounts[3]);
                        @endphp
                        <select class="form-control" name="gratuity_op_bank_ac" id="gratuity_op_bank_ac">
                            <option value="{{ $account -> id }}" selected>
                                {{ $account -> name }}({{ $account  -> general_code }})</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
    @push('js')
    <script>
    $('#update_settings').on('submit', function(e) {
        e.preventDefault();
        const updatedData = new FormData($(this)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('admin.settings.update') }}",
            type: "post",
            data: updatedData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#update_btn').text('Saving..');
            },
            success: function() {}
        }).done(function(response) {
            $('#update_btn').text('Save Changes');
            $.notify('<h6 class = "f-100">Successfully saved</h6>');
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $("#salary_credit_account").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#salary_debit_account").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $("#pf_contribution_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#pf_payable_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#pf_contribution_bank_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#pf_contribution_op_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#interest_income").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#loan_given_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#interest_rec_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#loan_process_account").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $("#pension_expense_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#pension_cash_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#pension_liability_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#gratuity_expense_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#gratuity_payable_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#gratuity_bank_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#gratuity_op_bank_ac").select2({

            ajax: {
                url: "{{ route('ajax.search-term-matched-accounts') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        '_token': "{{  csrf_token() }}"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
    $(document).ready(function() {
    
    $(document).on("change", "#file_upload_photo", function() {

        var profile_image = $('#file_upload_photo').prop('files')[0];
        var reader = new FileReader();
        reader.onload = function() {
            $("#company_logo").attr("src", reader.result);
        }
        reader.readAsDataURL(profile_image);
    });
});
    </script>
    @endpush