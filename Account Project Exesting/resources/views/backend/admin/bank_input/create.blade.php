@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    @if(Session :: get('message') != NULL)
    <div class="alert alert-success">
        {{ Session :: get('message') }}
        @php
        Session :: put('message',NULL);
        @endphp
    </div>
    @endif
    <div class="block-content block-content-full">
        <form id="expenditure_form">
            <div class="card border-info">
                <div class="card-header f-100 border-info">
                    <b>New Bank Input</b>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-2 form-group">
                            <label>Bank Account</label>
                            <select class="form-control" id="select_bank_account" name="select_bank_account">
                                <option value="0">Select Account</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Voucher Date</label>
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
                            <select class="form-control" id="posted_by" name="posted_by">
                                <option>abc</option>
                                <option>bcd</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                    </div>
                              
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <input type="text" id="entry_date" name="entry_date"
                                class="js-flatpickr form-control bg-white" placeholder="Entry Date" required>
                        </div>
                        <div class="col-md-2 form-group">
                            <select class="form-control" id="select_expense_account" name="select_expense_account">
                                <option value="0">Select Account</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <textarea rows="1" cols="8" class="form-control" placeholder="Add your particulars..."
                                id="particulars" name="particulars"></textarea>
                        </div>
                        <div class="col-md-2 form-group">
                            <select class="form-control" id="type">
                                <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="number" placeholder="Amount" id="amount" class="form-control" step="0.000001">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2 form-group">
                            <button type="button" class="form-control btn btn-primary" id="add_expenditure_entry">Add
                                New</button>
                        </div>
                    </div>
                    
                    <table class="table table-striped bg-white" id="all_records">
                        <thead>
                            <tr>
                                <th style="font-size:14px;">Date</th>
                                <th style="font-size:14px;">COA Name(Code)</th>
                                <th style="font-size:14px;">Description</th>
                                <th style="font-size:14px;">Type</th>
                                <th style="font-size:14px;">Amount</th>
                                <th style="font-size:14px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="entries">
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success form-control"
                                style="background-color:#008000">Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(function() {
    
    var row_cnt = 0;
    $("#select_bank_account").select2({

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
    $("#select_expense_account").select2({

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

    $('#add_expenditure_entry').click(function(e) {

        var account_name = $('#select_expense_account option:selected').text();
        var date = $('#entry_date').val();
        var coa_id = $('#select_expense_account').val();
        var amount = $('#amount').val();
        var particulars = $('#particulars').val();
        $(document).find('.help-block').remove();
        $(document).find('.form-control').removeClass('form-error');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('validate-entry') }}",
            type: "POST",
            data: {
                date: date,
                select_expense_account: coa_id,
                amount: amount,
                particulars: particulars
            },
            success: function(response) {
               
               
                var entry = '';
                row_cnt++;
                entry += '<tr id = "'+row_cnt+'">' +
                    '<td class = "text-center">' + date + '</td>' +
                    '<input type = "hidden" name = "entry_dates[]" value =' + date + '>' +
                    '<td class = "text-center">' + account_name + '</td>' +
                    '<input type = "hidden" name = "coa_ids[]" value =' + coa_id + '>' +
                    '<td class = "text-center">' + particulars + '</td>' +
                    '<input type = "hidden" name = "descriptions[]" value ="' +
                    particulars + '">' +
                    '<td class = "text-center">' + $('#type').val() + '</td>' +
                    '<input type = "hidden" name = "types[]" value =' + $('#type').val() +
                    '>' +
                    '<td class = "text-center">' + amount + '</td>' +
                    '<input type = "hidden" name = "amounts[]" value =' + amount + '>' +
                    '<td class = "text-center">' +
                    '<button class="btn btn-danger" type = "button" onclick = "remove('+row_cnt+')">X</button>' +
                    '</td>' +
                    '</tr>';
               
                     $('#particulars').val('');
                     $('#amount').val('');
                     $('#select_expense_account').val('');
                     $('#entry_date').val('');
                $('#entries').append(entry);
            },
            error: function(data) {
                var errors = data.responseJSON;
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        $('#' + key)
                            .closest('.form-control')
                            .addClass('form-error')
                        $('<span class="help-block"><strong>' +
                            value + '</strong></span>').insertAfter('#' + key);
                    });
                }
            }
        });
    });

    $('#expenditure_form').submit(function(e) {
        e.preventDefault();
        $(document).find('.help-block').remove();
        $(document).find('.form-control').removeClass('form-error');
        var entry_dates = document.getElementsByName('entry_dates[]');
        var coa_ids = document.getElementsByName('coa_ids[]');
        var amounts = document.getElementsByName('amounts[]');
        var types = document.getElementsByName('types[]');
        var descriptions = document.getElementsByName('descriptions[]');
        var coa_ids_array = [coa_ids[0].value];
        var amounts_array = [];
        var description_array = [];
        var dates_array = [];
        var types_array = [];
        var net_balance = 0;

        if (coa_ids.length == 0)
            alert('At least,one transaction include on voucher');
        else {
            for (var i = 0; i < descriptions.length; i++) {
                amounts_array.push(amounts[i].value);
                description_array.push(descriptions[i].value);
                types_array.push(types[i].value);
                dates_array.push(entry_dates[i].value);
                net_balance += (types[i].value == 'Debit' ? parseInt(amounts[i].value) : -parseInt(amounts[i].value));
            }

            if (net_balance == 0) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF_TOKEN': "{{ csrf_token() }}"
                    }
                });
                $.ajax({
                    url: "{{ route('save-bank-input') }}",
                    type: "POST",
                    data: {
                        coa_ids: coa_ids_array,
                        descriptions: description_array,
                        amounts: amounts_array,
                        types: types_array,
                        dates: dates_array,
                        posted_by: $("#posted_by").val(),
                        voucher_date: $("#voucher_date").val(),
                        bank_account: $("#select_bank_account").val(),
                    },
                    success: function(response) {
                        $.notify(response, 'success');
                        $('#expenditure_form')[0].reset();
                        $('#entries').html('');
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
            else
            {
                alert('Debit and Credit amount must be equal.');
            }
        }

    });
});

function remove(Id) {
    $('#' + Id).remove();
}
</script>

@endpush