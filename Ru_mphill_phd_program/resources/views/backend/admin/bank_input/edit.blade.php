@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="block-content block-content-full">

        <div class="card border-info">
            <div class="card-header f-100 border-info">
                <b>Bank Input Update</b>
            </div>
            <div class="card-body">
                <div class="row form-group justify-content-center">
                    <div class="col-md-2 form-group"><label>Bank Account</label>
                        <select class="form-control" id="select_bank_account" name="select_bank_account">
                            @foreach($coas as $coa)
                                <option value = {{ $coa -> id}} {{ $voucher->transaction_coa_account === $coa->id ? 'selected' : '' }}>{{ $coa->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Voucher Date</label>
                        <input type="text" id="voucher_date" name="voucher_date"
                            class="js-flatpickr form-control bg-white" placeholder="Voucher Date"
                            value="{{ $voucher -> date }}" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Posted By</label>
                        <select class="form-control" id="posted_by" name="posted_by" id="posted_by">
                            <option value="{{ $voucher -> submitted_by }}" selected hidden>
                                {{ $voucher -> submitted_by }}
                            </option>
                            <option>abc</option>
                            <option>bcd</option>
                        </select>
                    </div>

                </div>
                <div id="add_new_container">
                    <form id="add_new_form">
                        <div class="row form-group">
                            <div class="col-md-2 form-group">
                                <input type="text" id="entry_date" name="entry_date"
                                    class="js-flatpickr form-control bg-white" placeholder="Entry Date" required>
                            </div>
                            <div class="col-md-2 form-group">
                                <select class="form-control" id="accounts" name="select_expense_account">
                                    <option value="0">Select Account</option>
                                </select>

                            </div>
                            <div class="col-md-4 form-group">
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
                                <input type="number" placeholder="Amount" id="amount" class="form-control"
                                    step="0.000001">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-2 form-group">
                                <button type="submit" class="btn btn-dark form-control">Add New</button>
                            </div>
                        </div>
                    </form>

                </div>
                <table class="table table-striped bg-white" id="all_records">
                    <thead>
                        <tr>
                            <th style="font-size:14px;" class="text-center">Date</th>
                            <th style="font-size:14px;" class="text-center">COA Name</th>
                            <th style="font-size:14px;" class="text-center">Description</th>
                            <th style="font-size:14px;" class="text-center">Type</th>
                            <th style="font-size:14px;" class="text-center">Amount</th>
                        </tr>
                    </thead>
                  
                    <tbody id="records_entry">
                    @php $row = 0; @endphp
                        @for($i = 0; $i < count($details); $i=$i + 1) <tr class="bg-white">
                            @php
                            $account_details = $details[$i] -> chart_of_account;
                            $row++;
                            @endphp
                            <tr id = "prev{{ $row }}">
                                <td class="text-center">
                                    {{ substr($details[$i] -> entry_date, 0, 10) }}
                                    <input type="hidden" name="entry_dates[]" value="{{ $details[$i] -> entry_date }}">
                                </td>
                                <td class="text-center">
                                    {{ $account_details -> name }}
                                    <input type="hidden" name="coa_ids[]" value="{{ $details[$i] -> coa_id }}">
                                </td>


                                <td class="text-center">
                                    <input type="text" class="form-control" name="descriptions[]"
                                        value="{{ $details[$i] -> description }}">
                                </td>
                                @php $type = $details[$i] -> debit_amount ? 'Debit' : 'Credit' ; @endphp
                                <td class="text-center">
                                    <select class="form-control" name="types[]">
                                        <option value="Debit" {{ $type == 'Debit' ? 'selected' : '' }}>Debit</option>
                                        <option value="Credit" {{ $type == 'Credit' ? 'selected' : '' }}>Credit</option>
                                    </select>

                                </td>

                                <td class="text-center">
                                    <input type="number" name="amount[]" class="form-control"
                                        value="{{ $details[$i] -> credit_amount + $details[$i] -> debit_amount }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" onclick="remove('prev{{ $row }}')">X</button>
                                </td>
                            </tr>
                            @endfor
                    </tbody>
                
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <button type="button" id="save_changes" class="btn btn-info form-control">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
window.Details = '';
$(document).ready(function() {
   var row_cnt = 0;
    $("#accounts").select2({

        ajax: {
            url: "{{ route('get-accounts') }}",
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
    $("#select_bank_account").select2({

        ajax: {
            url: "{{ route('get-accounts') }}",
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
</script>

<script>
$(document).ready(function() {
    var row_cnt = 0;
    $('#save_changes').click(function(e) {
        var bank_account = $('#select_bank_account').val();
        var voucher_date = $('#voucher_date').val();
        var posted_by = $('#posted_by').val();
        var transfer_method = $('#transfer_method').val();
        var cheque_number = $('#cheque_number').val();
        var coa_ids = document.getElementsByName('coa_ids[]');
        var entry_dates = document.getElementsByName('entry_dates[]');
        var amounts = document.getElementsByName('amount[]');
        var types = document.getElementsByName('types[]');
        var discriptions = document.getElementsByName('descriptions[]');
        var coa_ids_array = [coa_ids[0].value];
        var amounts_array = [];
        var description_array = [];
        var types_array = [];
        var coa_ids_array = [];
        var entry_dates_array = [];
        var debit_amount_total = 0;
        var credit_amount_total = 0;

        if (coa_ids.length == 0)
            alert('At least,one transaction include on voucher');
        else {
            for (var i = 0; i < discriptions.length; i++) {
                amounts_array.push(amounts[i].value);
                description_array.push(discriptions[i].value);
                types_array.push(types[i].value);
                if (types[i].value == 'Debit')
                    debit_amount_total += amounts[i].value;
                else
                    credit_amount_total += amounts[i].value;

                coa_ids_array.push(coa_ids[i].value);
                entry_dates_array.push(entry_dates[i].value);
            }
        }

        if (debit_amount_total == credit_amount_total) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('update-bank-input-master') }}",
                type: "POST",
                data: {
                    id: "{{ $voucher -> id }}",
                    bank_account: bank_account,
                    voucher_date: voucher_date,
                    posted_by: posted_by,
                    transfer_method: transfer_method,
                    cheque_number: cheque_number,
                    coa_ids: coa_ids_array,
                    descriptions: description_array,
                    types: types_array,
                    amounts: amounts_array,
                    entry_dates: entry_dates_array,
                },
                success: function(response) {
                    $.notify(response, 'success');
                }
            })
        }
        else
        {
            Swal.fire('Debit and Credit amount must be equal','','warning');
        }
    });

    $('#add_new_form').submit(function(e) {
        e.preventDefault();
        var account_name = $('#accounts option:selected').text();
        var amount = $('#amount').val();
        var particular = $('#particulars').val();
        var coa_id = $('#accounts').val();
        var entry_date = $('#entry_date').val();
        
        row_cnt++;
        var type = '';
        if ($('#type').val() == 'Debit') {
            type = '<option value = "Debit" selected>Debit</option>' +
                '<option value = "Credit">Credit</option>';
        } else {
            type = '<option value = "Debit">Debit</option>' +
                '<option value = "Credit" selected>Credit</option>';
        }
        var entry = '';
        entry += '<tr id = "'+row_cnt+'">' +
            '<td class = "text-center">' + entry_date +
            '<input type = "hidden" name = "entry_dates[]" value ="' + entry_date + '">' +
            '</td>' +
            '<td class = "text-center">' + account_name +
            '<input type = "hidden" name = "coa_ids[]" value =' + coa_id + '>' +
            '</td>' +
            '<td class = "text-center">' +
            '<input type="text" class="form-control" name = "descriptions[]" value="' + particular +
            '">' +
            '</td>' +
            '<td class = "text-center">' +
            '<select class = "form-control" name = "types[]">' +
            type +
            '</select>' +
            '</td>' +
            '<td class = "text-center">' +
            '<input type="number" name = "amount[]" class="form-control" value=' + amount + '>' +
            '</td>' +
            '<td class = "text-center">' +
            '<button class="btn btn-danger" onclick = "remove('+row_cnt+')">X</button>' +
            '</td>' +
            '</tr>';
        $('#records_entry').append(entry);
        $('#add_new_form')[0].reset();

    })
})
</script>
<script>
function remove(Id) {
    $('#' + Id).remove();
    
}
</script>

@endpush