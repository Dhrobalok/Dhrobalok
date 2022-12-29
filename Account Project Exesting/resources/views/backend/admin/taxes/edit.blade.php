@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.taxes.update',['tax_id' => $tax -> id]) }}" method="post">
                        @csrf
                        <div class="f-roboto mb-4">Tax Information</div>

                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Tax Name</label>
                            </div>
                            <div class="col-md-4 pr-0">
                                <input type="text" class="form-control" value="{{ $tax -> tax_name }}"
                                    placeholder="Tax Name" name="tax_name" required>
                            </div>
                            <div class="col-md-2">
                                <label>Tax Scope</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="tax_scope">
                                    @php $tax_scope = $tax -> tax_scope; @endphp
                                    @if($tax_scope == 'sales')
                                    <option value="sales" seleted hidden>Sales</option>
                                    @elseif($tax_scope == 'purchase')
                                    <option value="purchase" selected hidden>Purchase</option>
                                    @else
                                    <option value="none" selected hidden>None</option>
                                    @endif
                                    <option value="sales">Sales</option>
                                    <option value="purchase">Purchase</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Tax Computation</label>
                            </div>
                            <div class="col-md-4 pr-0">
                                <select class="form-control" id="tax_computation" name="tax_computation_type">
                                   @if($tax -> tax_computation_type == 'fixed')
                                   <option value="fixed" selected hidden>Fixed</option>
                                   @elseif($tax -> tax_computation_type == 'percentage')
                                   <option value="percentage" selected hidden>Percentage of Price</option>
                                   @else
                                   <option value="percentage_tax_included" selected hidden>Percentage of Price Tax Included</option>
                                   @endif
                                    <option value="fixed">Fixed</option>
                                    <option value="percentage">Percentage of Price</option>
                                    <option value="percentage_tax_included">Percentage of Price Tax Included</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-3 pr-0">
                                <input type="text" class="form-control" value = "{{ $tax -> amount }}" name="tax_rate" required>
                            </div>
                            <div class="col-md-1">
                                <label id="amount_suffix">{{ $tax -> tax_computation_type == 'fixed' ? 'Tk.' : '%' }}</label>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <label>Status</label>
                            </div>
                            <div class="col-md-4 pr-0">
                                <select class="form-control" name="status">
                                    @if($tax -> status == '1')
                                    <option value="1" selected hidden>Active</option>
                                    @else
                                    <option value="1" selected hidden>Deactive</option>
                                    @endif
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>

                        </div>

                        <ul class="nav nav-pills mb-4 mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-settings-tab" data-toggle="pill"
                                    href="#general-settings" role="tab" aria-controls="general-settings-tab"
                                    aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="advanced-settings-tab" data-toggle="pill"
                                    href="#advanced-settings" role="tab" aria-controls="advanced-settings"
                                    aria-selected="false">Advanced Settings</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="general-settings" role="tabpanel"
                                aria-labelledby="general-settings-tab">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Receivable Account</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="receivable_account">
                                           @if($tax -> receivable_account == NULL)
                                              <option value = 0 selected hidden>N/A</option>
                                           @endif
                                            @foreach($accounts as $account)
                                             @if($account -> id == $tax -> receivable_account)
                                            <option value="{{ $account -> id }}" selected hidden>{{ $account -> name.'('.$account -> general_code.')' }}</option>
                                             @else
                                             <option value="{{ $account -> id }}">{{ $account -> name.'('.$account -> general_code.')' }}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Payable Account</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="payable_account">
                                        @if($tax -> payable_account == NULL)
                                              <option value = 0 selected hidden>N/A</option>
                                           @endif
                                            @foreach($accounts as $account)
                                             @if($account -> id == $tax -> payable_account)
                                            <option value="{{ $account -> id }}" selected hidden>{{ $account -> name.'('.$account -> general_code.')' }}</option>
                                             @else
                                             <option value="{{ $account -> id }}">{{ $account -> name.'('.$account -> general_code.')' }}</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="advanced-settings" role="tabpanel"
                                aria-labelledby="advanced-settings-tab">
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <label class="f-100">Label on Invoices</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value = "{{ $tax -> label_on_invoice }}" name="label_on_invoice" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                           @if($tax -> is_including_price == 1)
                                           <input class="form-check-input" type="checkbox" value="1"
                                                name="is_including" id="includingPrice" checked>
                                            <label class="form-check-label" for="includingPrice">
                                                Included In Price
                                            </label>
                                           @else
                                           <input class="form-check-input" type="checkbox" value="1"
                                                name="is_including" id="includingPrice">
                                            <label class="form-check-label" for="includingPrice">
                                                Included In Price
                                            </label>
                                           @endif
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
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

@endsection
@push('css')
<style>
.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    background: #1dbf73;
}

.nav-pills .nav-link {
    background: #F8F8F8;
    padding: 5px 25px;
    margin-left: 8px;
    color: black;
    font-weight: 100;
    font-size: 20px;
}

.nav-pills .nav-link:hover {
    background: #1dbf73;
}

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
$('#tax_computation').on('change', function() {

    const value = $(this).val();
    if (value == 'fixed')
        $('#amount_suffix').text('Tk.');
    else
        $('#amount_suffix').text('%');
});
</script>
@endpush