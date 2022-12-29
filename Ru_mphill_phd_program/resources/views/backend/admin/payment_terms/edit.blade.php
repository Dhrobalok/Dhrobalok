@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.payment-terms.update',['terms_id' => $term -> id]) }}" method="post">
                        @csrf
                        <div class="f-roboto mb-4">Payment Term Information</div>

                        <div class="row mb-4">
                            <div class="col-md-2">
                                <label>Payment Term</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="payment_term_name"
                                    value="{{ $term -> name }}" required>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>Description on the Invoice</label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Payment term explanation for the customers"
                                    rows="4"
                                    name="description_on_invoice">{{ $term -> description_on_invoice }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-2">
                            <label>Status</label>
                          </div>
                          <div class="col-md-4">
                            <select class = "form-control" name = "status">
                              <option value = "{{ $term -> status }}" selected hidden>{{ $term -> status ? "Active" : "Deactive" }}</option>
                              <option value = "1">Active</option>
                              <option value = "0">Deactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="f-roboto">Define Rules</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table bg-light text-black">
                                    <thead>
                                        <tr>
                                            <th>Due Type</th>
                                            <th>Percentage/Amount</th>
                                            <th>Number Of Days</th>
                                            <th>Options</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="rules">
                                       @foreach($term -> details as $term_detail)
                                        <tr class="text-center">
                                            <td>
                                                <select class="form-control" name="due_types[]">
                                                    <option value="{{ $term_detail -> due_type }}" hidden selected>{{ $term_detail -> due_type }}</option>
                                                    <option value="Percentage">Percentage</option>
                                                    <option value="Fixed">Fixed</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="amounts[]" step="any"
                                                    value="{{ $term_detail -> amount }}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="days_array[]" step="1"
                                                    value="{{ $term_detail -> number_of_days }}">
                                            </td>
                                            <td>
                                                <select class="form-control" name="options_array[]">
                                                    <option value="{{ $term_detail -> option }}" selected hidden>{{ $term_detail -> option }}</option>
                                                    <option value="days after the invoice date">days after the invoice
                                                        date</option>
                                                    <option value="days after the end of the invoice month">days after
                                                        the end of the invoice month</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a onclick="remove_rule(this)" class="btn btn-danger text-white"><i
                                                        class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" onclick="define_new_rule()">Define New</a>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-12 text-center">
                                <button class="custom-btn" type="submit"><i class="fa fa-save mr-2"></i>Save
                                    Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.admin.payment_terms.term-type-modal')
@endsection
@push('css')
<style>
.modal-header .close {
    outline: none;
}

.form-control,
.form-control:focus {
    border: none;
    border-radius: 0px;
    border-bottom: 2px solid #e5e5e5;
    box-shadow: none;
    padding: 0px;
}
</style>
@endpush
@push('js')
<script>
function define_new_rule() {
    event.preventDefault();
    $('#term-type-modal').modal('show');
}

function saveNewRule() {
    const type = $('#due_type').val();
    const amount = $('#amount').val();
    const days = $('#days').val();
    const option_text = $('#option option:selected').text();
    const option_value = $('#option').val();

    $.ajax({
        url: "{{ route('admin.payment-terms.new-rule') }}",
        type: "get",
        data: {
            type: type,
            amount: amount,
            days: days,
            option_value: option_value,
            option_text: option_text
        },
        success: function(content) {
            $('#rules').append(content);
        }
    });
}

function remove_rule(ref) {
    event.preventDefault();
    $(ref).closest('tr').remove();
}
</script>
@endpush