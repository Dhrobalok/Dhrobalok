@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
<div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-md-6">
                    <a class="mr-4" href="{{ route('admin.voucher.expenditure.index') }}"
                        style="color:blue;font-weight:500;font-size:22px"><i
                            class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                </div>
                <div class="col-md-6 text-right">
                    <a class="mr-2" href="{{ route('admin.voucher.expenditure.view',['id' => $voucher -> id]) }}"
                        style="color:blue;font-weight:500;font-size:22px"><i class="fa fa-eye mr-2"></i>View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card" id="create-tab">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-md-8">
                    <strong class="f-roboto mt-3">Expenditure Voucher</strong>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" id="preview">
                        Preview</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <form id="expenditure_voucher_form">

                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Vendor Name </label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="voucher_for" id="voucher_for">
                            <option value=" {{ $voucher -> vendor_id }}" selected> {{ $voucher -> vendor ? $voucher -> vendor -> name : '' }}</option>
                            @foreach($vendors as $vendor)
                            <option value="{{ $vendor -> id }}">{{ $vendor -> name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <?php $row_cnt = 0; ?>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Voucher Date</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" id="voucher_date" name="voucher_date" value = "{{ $voucher -> date }}"
                            class="js-flatpickr form-control bg-white" placeholder="Voucher Date" required>
                        <small>
                            @if($errors->has('voucher_date'))
                            <h5>{{ $errors -> first('voucher_date') }}</h5>
                            @endif
                        </small>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Posted By</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="posted_by" name="posted_by">
                           
                            @foreach($employees as $employee)
                            @if($voucher -> posted_by == $employee -> id)
                            <option value="{{ $employee -> id }}" selected>{{ $employee -> name }}</option>
                            @else
                            <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Paid By</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <select class="form-control" id="paid_by" name="paid_by">
                            <option value = "{{ $voucher -> transaction_method_id }}" selected hidden>{{ $voucher -> transaction_method_id == 1 ? 'Cash' : 'Bank' }}</option>
                            <option value="1">Cash</option>
                            <option value="2">Bank</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Submitted By</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="submitted_by" name="submitted_by">
                          
                            @foreach($employees as $employee)
                            @if($voucher -> submitted_by == $employee -> id)
                            <option value="{{ $employee -> id }}" selected>{{ $employee -> name }}</option>
                            @else
                            <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Bank Name</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <select class="form-control" id="bank_name" name="bank_name">
                            <option value="0">Select Bank</option>
                            @foreach($banks as $bank)
                            @if($used_bank_id == $bank -> id)
                            <option value="{{ $bank -> id }}" selected>{{ $bank -> bank_name }}</option>
                            @else
                            <option value="{{ $bank -> id }}">{{ $bank -> bank_name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Cheque Number</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <select class="form-control" id="cheque_number" name="cheque_number" value = "{{ $voucher -> cheque ? $voucher -> cheque -> page_number : '' }}">

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Debit Account</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="debit_account" name="debit_account">
                            <option value="{{ $voucher -> transaction_coa_account }}" selected>{{ $voucher -> transaction_account -> name }}</option>
                        </select>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 form-group text-right">
                        <a href="#" id="add_transaction">Add
                            New Transaction</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="all_records">
                    <thead>
                        <tr class="text-center text-black">
                            <th style="font-size:14px;">Account</th>
                            <th style="font-size:14px;">Description</th>
                            <th style="font-size:14px;">Amount</th>
                            <th style="font-size:14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="entries">
                    @foreach($voucher -> voucher_details as $voucher_detail)
                        @if($voucher_detail -> coa_id == $voucher -> transaction_coa_account)
                        @continue
                        @endif
                        <tr>
                            <td style="width:30%">
                                <select class="form-control" name="coa_ids[]">
                                    @foreach($accounts as $account)
                                    @if($voucher_detail -> coa_id == $account -> id)
                                    <option value="{{ $account -> id }}" selected>{{ $account -> name }}</option>
                                    @else
                                    <option value="{{ $account -> id }}">{{ $account -> name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </td>
                            <td style="width:35%">
                                <textarea class="form-control" rows="1" name="descriptions[]"
                                    required> {{ $voucher_detail -> description }}</textarea>
                            </td>

                            <td style="width:20%">
                                <input type="number" class="form-control" name="amounts[]"
                                    value="{{ $voucher_detail -> debit_amount }}" required>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger" onclick="remove(this)"><i
                                        class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block f-100"
                            style="background-color:blue;color:white">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card" id="preview-tab" style="display:none">
        <div class="card-body">
            <div class="row text-right">
                <div class="col-md-12">
                    <a href="#" id="back"><i class="fa fa-angle-left mr-2"></i>Back</a>
                </div>
            </div>
            <div class="row text-center text-black">
                <div class="col-md-12">
                    <label class="f-roboto" style="font-size:25px;">Expenditure Voucher</label>
                </div>
            </div>
            <div class="row text-center text-black">
                <div class="col-md-12">
                    <label class="f-100" style="font-size:25px;">{{ $company_details -> company_name }}</label>
                </div>
            </div>
            <div class="row text-center text-black form-group">
                <div class="col-md-12">
                    <label class="f-100" style="font-size:20px;">{{ $company_details -> company_address }}</label>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Voucher No : </strong>{{ $voucher -> voucher_no }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Date : </strong><span id="voucher_date_2"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Paid By : </strong><span id="paid_by_2"></span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Cheque No : </strong><span id="cheque_no"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Paid To : </strong><span id="paid_to"></span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Prepared By : </strong><span id="prepared_by"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <table class="table table-striped table-sm table-bordered bg-white">
                        <thead>
                            <tr class="text-black text-center">
                                <th>Account</th>
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                            </tr>
                        </thead>
                        <tbody id="voucher_entries">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
<style>
td,
th,
.dataTables_info,
.page-link,
.form-control {
    font-size: 18px;
    font-family: 'Gentium Basic';
}

.block-title,
a {
    font-size: 18px;
    font-family: 'Gentium Basic';
    color: blue;
    font-weight: bolder;
}

.btn-outline-primary {
    font-size: 15px;
    font-family: 'Gentium Basic';
    margin-left: 2px;
}

input.custom-checkbox {
    transform: scale(1.5);
    margin-right: 9%;
    margin-top: 5%;
}

label,
h5 {
    font-family: 'Gentium Basic'
}

.list-group {
    font-family: 'Gentium Basic';
    font-size: 20px;
    line-height: 14px;
    background: white;
}
</style>

@endpush
@push('js')
<script>
$(document).ready(function() {

    $("#debit_account").select2({

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


    $('#add_transaction').click(function(e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('ajax.get-accounts') }}",
            type: "get",
            data: {
                applyType: 0
            },
            success: function(options) {

                $('#entries').append(options);
            },
            error: function(data) {}
        });
    });

    $('#expenditure_voucher_form').submit(function(e) {
        e.preventDefault();
        $(document).find('.help-block').remove();
        $(document).find('.form-control').removeClass('form-error');
        const voucherData = new FormData($(this)[0]);

        if (confirm('Are you sure to post that voucher?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('admin.voucher.expenditure.update',['id' => $voucher]) }}",
                type: "post",
                data: voucherData,
                processData: false,
                contentType: false,
                success: function(message) {
                    showSuccessWindow(message);
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    if ($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function(key, value) {
                            $('#' + key)
                                .closest('.form-control')
                                .addClass('form-error')
                            $('<span class="help-block"><strong>' +
                                value + '</strong></span>').insertAfter('#' +
                                key);
                        });
                    }
                }
            });
        }
    });
});

function remove(child_ref) {

    event.preventDefault();
    $(child_ref).closest('tr').remove();
}

$('#bank_name').on('change', function() {

    const bank_id = $(this).val();
    if (bank_id == 0)
        return;
    $.ajax({
        url: "{{ route('ajax.cheque-pages') }}",
        type: "get",
        data: {
            bank: bank_id,
            credit_account: $('#debit_account').val()
        },
        success: function(options) {
            $('#cheque_number').html(options);
        }
    })
})

$('#preview').click(function(e) {
    e.preventDefault();

    var amounts = document.getElementsByName('amounts[]');
    var descriptions = document.getElementsByName('descriptions[]')
    var coa_ids = document.getElementsByName('coa_ids[]');
    var total_amount = 0;

    for (i = 0; i < descriptions.length; i++) {
        total_amount += parseInt(amounts[i].value);
    }
    var all_records = '';
    all_records += '<tr>' +
        '<td>' + $('#debit_account option:selected').text() + '</td>' +
        '<td>Expense</td>' +
        '<td></td>' +
        '<td>' + total_amount + '</td>' +
        '</tr>';
    for (i = 0; i < amounts.length; i++) {
        all_records += '<tr>' +
            '<td>' + coa_ids[i].options[coa_ids[i].selectedIndex].text + '</td>' +
            '<td>' + descriptions[i].value + '</td>' +
            '<td>' + amounts[i].value + '</td>' +
            '<td></td>' +
            '</tr>';
    }
    $('#voucher_entries').html('');
    $('#voucher_entries').append(all_records);
    $('#prepared_by').html($('#posted_by option:selected').text());
    $('#voucher_date_2').html($('#voucher_date').val());
    $('#paid_to').html($('#voucher_for option:selected').text());
    $('#paid_by_2').html($('#paid_by option:selected').text());
    $('#cheque_no').html($('#cheque_number option:selected').text());

    $('#preview-tab').css({
        'display': ''
    });
    $('#create-tab').css({
        'display': 'none'
    })
})

$('#back').click(function(e) {

    e.preventDefault();
    $('#preview-tab').css({
        'display': 'none'
    });
    $('#create-tab').css({
        'display': ''
    });
});
</script>

@endpush