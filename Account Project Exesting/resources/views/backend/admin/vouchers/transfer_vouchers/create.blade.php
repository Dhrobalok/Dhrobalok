@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="block-content block-content-full">
    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-md-6">
                    <a class="mr-4" href="{{ route('admin.voucher.transfer.index') }}"
                        style="color:blue;font-weight:500;font-size:22px"><i
                            class="fa fa-arrow-circle-left mr-2"></i>Back</a>
                </div>

            </div>
        </div>
    </div>
        <form id="save_transfer_voucher">
            @csrf
            <div class="card" id="create-tab">
                <div class="card-header f-roboto">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>Transfer Voucher / Contra Voucher</strong>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" id="preview" style="color:blue"><strong>Preview</strong></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <?php $row_cnt = 0; ?>
                    <div class="row">

                        <div class="col-md-2 form-group">
                            <label>Voucher Date</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" id="voucher_date" name="voucher_date"
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
                                <option value="{{ $logged_employee -> id }}" selected hidden>
                                    {{ $logged_employee -> name }}</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2 form-group">
                            <label>Payment Method</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" id="transfer_method" name="transfer_method">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Submitted By</label>
                        </div>
                        <div class="col-md-5 form-group">
                            <select class="form-control" id="submitted_by" name="submitted_by">
                                <option value="{{ $logged_employee -> id }}" selected hidden>
                                    {{ $logged_employee -> name }}</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                                @endforeach
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
                                <th style="font-size:14px;">Debit Account</th>
                                <th style="font-size:14px;">Credit Account</th>
                                <th style="font-size:14px;">Description</th>
                                <th style="font-size:14px;">Amount</th>
                                <th style="font-size:14px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="entries">

                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block f-100"
                                style="background-color:blue;color:white">Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card" id="preview-tab" style="display:none">
            <div class="card-body">
                <div class="row text-right">
                    <div class="col-md-12">
                        <a href="#" id="back"><i class="fa fa-angle-left mr-2"></i>Back</a>
                    </div>
                </div>
                <div class="row text-center text-black">
                    <div class="col-md-12">
                        <label class="f-roboto" style="font-size:25px;">Transfer Voucher</label>
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
window.Details = '';
$(document).ready(function() {


    $('#save_transfer_voucher').submit(function(e) {
        e.preventDefault();
        $(document).find('.help-block').remove();
        $(document).find('.form-control').removeClass('form-error');
        const voucherData = new FormData($(this)[0]);

        if (confirm('Are you sure to post that voucher?')) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('admin.voucher.transfer.store') }}",
                type: "post",
                data: voucherData,
                processData:false,
                contentType:false,
                success: function(message) {
                    $('#save_transfer_voucher')[0].reset();
                    $('#entries').html('');
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

    $('#add_transaction').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('ajax.add-transfer-entry') }}",
            type: "get",
            data: {},
            success: function(entry) {

                $('#entries').append(entry);
            },
            error: function(data) {}
        })
    });
});

function remove(child_ref) {

    event.preventDefault();
    $(child_ref).closest('tr').remove();
}
$('#preview').click(function(e) {
    e.preventDefault();

    var transfer_from = document.getElementsByName('transfer_from[]');
    var transfer_to = document.getElementsByName('transfer_to[]');
    var amounts = document.getElementsByName('amounts[]');
    var descriptions = document.getElementsByName('descriptions[]');

    var all_records = '';
    for (i = 0; i < amounts.length; i++) {
        all_records += '<tr>' +
            '<td>' + transfer_from[i].options[transfer_from[i].selectedIndex].text + '</td>' +
            '<td>' + descriptions[i].value + '</td>';

        all_records += '<td></td>' +
            '<td>' + amounts[i].value + '</td>' +
            '</tr>';
        all_records += '<tr>' +
            '<td>' + transfer_to[i].options[transfer_to[i].selectedIndex].text + '</td>' +
            '<td>' + descriptions[i].value + '</td>';
        all_records += '<td>' + amounts[i].value + '</td>' +
            '<td></td>' +
            '</tr>';
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