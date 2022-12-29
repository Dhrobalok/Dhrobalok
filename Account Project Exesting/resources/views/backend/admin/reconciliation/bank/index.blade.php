@extends('backend.admin.index')
@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto">Bank Reconciliation</div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('backend.admin.index') }}" class="btn btn-primary text-white f-100"><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="reconcile_form" action="{{ route('admin.bank-reconciliation.save') }}" method="post">
                         @csrf
                         <input type = "hidden" id = "adj_balance_bank" name = "adj_balance_bank">
                         <input type = "hidden" id = "adj_balance_cashbook" name = "adj_balance_cashbook">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Year</label>
                            </div>
                            <div class="col-md-4">
                                <label>Month</label>
                            </div>
                            <div class="col-md-4">
                                <label>Bank Balance</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" name="year" id="year">
                                    @for($year = 2021; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                        </option>
                                        @endfor
                                </select>

                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="month" id="month">
                                    @for($months = 1; $months <= 12; $months++) @php $month_name=date('F', mktime(0, 0,
                                        0, $months, 10));@endphp <option value="{{ $months  }}">{{ $month_name }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="number" step="any" class="form-control" id="bank_ending_balance"
                                    name="bank_ending_balance">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="start_reconciliation" class="btn btn-info f-100">Go</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-12" id="cashbook_records">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <input type="hidden" value="" id="bank_current_balance">
                                        <div class="row">
                                            <div class="col-md-5 font-weight-normal">
                                                <p class="f-100">Cash balance as per the bank statement</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="f-100" id="cash_balance_as_per_bank"></p>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-sm f-100 mr-2" type="button"
                                                        onclick="addEntry('addition_bank','1','1')">Addition</button>
                                                    <button class="btn btn-danger btn-sm f-100" type="button"
                                                        onclick="addEntry('deduction_bank','0','1')">Deduction</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="addition_bank" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8 font-weight-normal">
                                                    <p class="f-100"
                                                        style="color:#1dbf73;font-weight-bold;font-size:20px;">Addition
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="deduction_bank" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8 font-weight-normal">
                                                    <p class="f-100" style="color:red;font-weight-bold;font-size:20px;">
                                                        Deduction</p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h4 class="f-100">Adjusted cash balance</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="f-100" id="adjusted_balance_bank"></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="hidden" id="cashbook_current_balance" value="" name = "cashbook_current_balance">
                                        <div class="row">
                                            <div class="col-md-5 font-weight-normal">
                                                <p class="f-100">Cash balance as per the cash book</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="f-100" id="balance_as_per_cashbook"></p>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <div class="btn-group">
                                                    <button class="btn btn-info btn-sm f-100 mr-2" type="button"
                                                        onclick="addEntry('addition_cashbook','1','0')">Addition</button>
                                                    <button class="btn btn-danger btn-sm f-100" type="button"
                                                        onclick="addEntry('deduction_cashbook','0','0')">Deduction</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="addition_cashbook" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8 font-weight-normal">
                                                    <p class="f-100"
                                                        style="color:#1dbf73;font-weight-bold;font-size:20px;">Addition
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="deduction_cashbook" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-8 font-weight-normal">
                                                    <p class="f-100" style="color:red;font-weight-bold;font-size:20px;">
                                                        Deduction</p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h4 class="f-100">Adjusted cash balance</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="f-100" id="adjusted_balance_cashbook"> 500</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 text-center">
                                <div class="btn-group">
                                    <button type="submit" id="submit_entries" class="btn btn-primary mr-2 f-100">Confirm
                                        & Save</button>
                                    <button type="submit" id="download" class="btn btn-danger f-100"><i
                                            class="fa fa-file-pdf mr-2"></i>Print</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$('#start_reconciliation').click(function() {

    const year = $('#year').val();
    const month = $('#month').val();
    const bank_current_balance = $('#bank_ending_balance').val();
    $('#bank_current_balance').val(bank_current_balance);
    $('#cash_balance_as_per_bank').text(bank_current_balance);
    $('#adjusted_balance_bank').text(bank_current_balance);

    $.ajax({
        url: "{{ route('ajax.fetch-cashbook-records') }}",
        type: "get",
        data: {
            year: year,
            month: month
        },
        success: function(cashbook_records) {
            $('#cashbook_records').html(cashbook_records);
        }
    }).done(function() {
        $('#balance_as_per_cashbook').text($('#curr_balance').val());
        $('#cashbook_current_balance').val($('#curr_balance').val());
        $('#adjusted_balance_cashbook').text($('#curr_balance').val());
    })
});

function addEntry(section_name, type, isBank) {
    $.ajax({
        url: "{{ route('ajax.cashbook-adjustment-entry') }}",
        type: "get",
        data: {
            type: type,
            isBank: isBank
        },
        success: function(new_entry) {
            $('#' + section_name).append(new_entry);
        }
    });
}

function remove_entry(ref) {
    $(ref).closest('.row').remove();
}

function changeAmount(isBank) {

    if (isBank == '1') {
        const additions = document.getElementsByName('addition_amounts_bank[]');
        const deductions = document.getElementsByName('deduction_amounts_bank[]');
        const sum = calculateSum(additions) - calculateSum(deductions);
        const current_balance = parseFloat($('#bank_current_balance').val());
        const updated_balance = current_balance + sum;

        $('#adjusted_balance_bank').text(updated_balance);
        $('#adj_balance_bank').val(updated_balance);
    } else {
        const additions = document.getElementsByName('addition_amounts_cashbook[]');
        const deductions = document.getElementsByName('deduction_amounts_cashbook[]');
        const sum = calculateSum(additions) - calculateSum(deductions);
        const current_balance = parseFloat($('#cashbook_current_balance').val());
        const updated_balance = current_balance + sum;

        $('#adjusted_balance_cashbook').text(updated_balance);
        $('#adj_balance_cashbook').val(updated_balance);
    }
}

function calculateSum(input) {
    var amount = 0;

    for (var i = 0; i < input.length; i++) {
        if (input[i].value != "") {
            amount += parseFloat(input[i].value);
        }
    }
    return amount;
}

$('#submit_entries').click(function(event) {

    event.preventDefault();
    const Data = new FormData($('#reconcile_form')[0]);

    if (confirm('Are you sure??')) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });


        $.ajax({
            url: "{{ route('admin.bank-reconciliation.save') }}",
            type: "post",
            data: Data,
            processData: false,
            contentType: false,
            success: function() {

            }
        }).done(function(res) {
            
            console.log(res);
            Swal.fire({
                'icon': 'success',
                'title': 'Reconciliation done'
            });
        });
    }
});

</script>
@endpush