@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="custom-btn bg-primary border-0 mr-2" href="{{ route('admin.taxes.index') }}">Back</a>
                                <a class="custom-btn" href="{{ route('admin.taxes.edit',['tax_id' => $tax -> id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="f-roboto mb-4">Tax Information</div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Tax Name</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $tax -> tax_name }}</p>
                        </div>
                        <div class="col-md-2">
                            <label>Tax Scope</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $tax -> tax_scope }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Tax Computation</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $tax -> tax_computation_type }}</p>
                        </div>
                        <div class="col-md-2">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-3 pr-0">
                            <p class="f-100">{{ $tax -> amount }}
                                {{ $tax -> tax_computation_type != 'fixed' ? '%' : 'Tk.' }}</p>
                        </div>
                        <div class="col-md-1">
                            <label id="amount_suffix"></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Status</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $tax -> status ? "Active" : "Deactive" }}</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Receivable Account</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $tax -> receivable_account ? App\Models\ChartOfAccount :: find($tax -> receivable_account) ->  name : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <label>Payable Account</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $tax -> payable_account ? App\Models\ChartOfAccount :: find($tax -> payable_account) -> name : 'N/A' }}
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label class="f-100">Label on Invoices</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $tax -> label_on_invoice }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                @if($tax -> is_including_price)
                                <input class="form-check-input" type="checkbox" value="1" name="is_including"
                                    id="includingPrice" checked>
                                @else
                                <input class="form-check-input" type="checkbox" value="1" name="is_including"
                                    id="includingPrice">
                                @endif
                                <label class="form-check-label" for="includingPrice">
                                    Included In Price
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
