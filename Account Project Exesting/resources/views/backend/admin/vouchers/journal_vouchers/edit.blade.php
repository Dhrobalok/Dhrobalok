@extends('backend.admin.index')
@section('content')
<div class="container-fluid">

    <div class="block-content block-content-full">

        <div class="card mb-2">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <a class="mr-4" href="{{ route('admin.voucher.journal.index') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="mr-2" href="{{ route('admin.voucher.journal.view',['id' => $voucher -> id]) }}"
                            style="color:blue;font-weight:500;font-size:22px"><i class="fa fa-eye mr-2"></i>View</a>
                    </div>
                </div>
            </div>
        </div>
        <form id="journal_voucher">
            <div class="card" id="create-tab">

                <div class="card-header f-100">
                    <div class="row">
                        <div class="col-md-8">
                            <strong class="f-roboto">Journal Voucher</strong>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" id="preview" style="color:blue"><strong>Preview</strong></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label>Voucher Date</label>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="text" id="voucher_date" name="voucher_date" required value = "{{ $voucher -> date }}"
                                class="js-flatpickr form-control bg-white" placeholder="Voucher Date">
                            <small>
                                @if($errors->has('voucher_date'))
                                <h5>{{ $errors -> first('voucher_date') }}</h5>
                                @endif
                            </small>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Posted By</label>
                        </div>
                        <div class="col-md-4 form-group">
                            <select class="form-control" id="posted_by" name="posted_by">

                                @foreach($employees as $employee)
                                @if($voucher ->posted_by == $employee -> id)
                                <option value="{{ $employee -> id }}" selected>{{ $employee -> name }}</option>
                                @else
                                <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-2">
                            <label>Submitted By</label>
                        </div>
                        <div class="col-md-4">
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
                    <div class="row text-right">
                        <div class="col-md-12 form-group">
                            <a href="#" class="font-weight-bold" style="color:blue" id="add_transaction">
                                Add New Transaction
                            </a>
                        </div>
                    </div>

                    <table class="table  table-striped table-bordered" id="all_records">
                        <thead>
                            <tr class="text-center text-black">
                                <th style="font-size:14px;">COA</th>
                                <th style="font-size:14px;">Description</th>
                                <th style="font-size:14px;">Type</th>
                                <th style="font-size:14px;">Amount</th>
                                <th style="font-size:14px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="entries">
                            @foreach($voucher -> voucher_details as $voucher_detail)
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
                                    <textarea class="form-control" rows="1" name="descriptions[]" required>{{ $voucher_detail -> description }}</textarea>
                                </td>
                                
                                <td style="width:15%">
                                    <select class="form-control" name="types[]">
                                        <option value = "{{ $voucher_detail -> credit_amount == 0 ? 'Debit' : 'Credit' }}" selected hidden>{{ $voucher_detail -> credit_amount == 0 ? 'Debit' : 'Credit' }}</option>
                                        <option value="Debit">Debit</option>
                                        <option value="Credit">Credit</option>
                                    </select>
                                </td>
                               
                                <td style="width:20%">
                                    <input type="number" class="form-control" name="amounts[]" required value = "{{ $voucher_detail -> credit_amount == 0 ? $voucher_detail -> debit_amount : $voucher_detail -> credit_amount }}">
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
                        <div class="col-md-2">
                            <button type="submit" class="btn btnl-block f-100"
                                style="background-color:blue;color:white">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                    <label class="f-roboto" style="font-size:25px;">Journal Voucher</label>
                </div>
            </div>
            <div class="row text-center text-black">
                <div class="col-md-12">
                    <label class="f-100" style="font-size:25px;">{{ $company_details -> company_name }}</label>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Prepared By : </strong><span id="prepared_by"></span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Date : </strong><span id="voucher_date_2"></span></p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-black text-center">
                                <th style="font-size:14px;">Account</th>
                                <th style="font-size:14px;">Description</th>
                                <th style="font-size:14px;">Debit</th>
                                <th style="font-size:14px;">Credit</th>
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
@push('js')
<script>
$(document).ready(function() {

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
                applyType: 1
            },
            success: function(options) {

                $('#entries').append(options);
            },
            error: function(data) {}
        });
    });

    $('#journal_voucher').submit(function(e) {

        e.preventDefault();
        if (confirm('Are you sure to post that voucher??')) {
            const voucherData = new FormData($(this)[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('admin.voucher.journal.update',['id' => $voucher -> id]) }}",
                type: "post",
                data: voucherData,
                contentType: false,
                processData: false,
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
                                value + '</strong></span>').insertAfter(
                                '#' +
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
$('#preview').click(function(e) {
    e.preventDefault();

    var amounts = document.getElementsByName('amounts[]');
    var descriptions = document.getElementsByName('descriptions[]')
    var coa_ids = document.getElementsByName('coa_ids[]');
    var types = document.getElementsByName('types[]');
    var total_amount = 0;

    for (i = 0; i < descriptions.length; i++) {
        total_amount += parseInt(amounts[i].value);
    }
    var all_records = '';
    for (i = 0; i < amounts.length; i++) {
        all_records += '<tr>' +
            '<td>' + coa_ids[i].options[coa_ids[i].selectedIndex].text + '</td>' +
            '<td>' + descriptions[i].value + '</td>';

        if (types[i].value == 'Credit') {
            all_records += '<td></td>' +
                '<td>' + amounts[i].value + '</td>' +
                '</tr>';
        } else {
            all_records += '<td>' + amounts[i].value + '</td>' +
                '<td></td>' +
                '</tr>';
        }
    }
    $('#voucher_entries').html('');
    $('#voucher_entries').append(all_records);
    $('#prepared_by').html($('#posted_by option:selected').text());
    $('#voucher_date_2').html($('#voucher_date').val());


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