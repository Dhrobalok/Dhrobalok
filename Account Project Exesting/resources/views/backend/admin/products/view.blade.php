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
                                <a class="custom-btn bg-primary border-0 mr-2" href="{{ route('admin.products.index') }}">Back</a>
                                <a class="custom-btn" href="{{ route('admin.products.edit',['product_id' => $product -> id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="f-roboto mb-4">Product Information</div>
                      <div class="row text-center">
                        <div class="col-md-12">
                          <img class = "rounded" src = "{{ asset($product -> product_image ? $product -> product_image : 'assets/media/various/placeholder.png') }}">
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Product Name</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $product -> product_name }}</p>
                        </div>
                        <div class="col-md-2">
                            <label>Product Scope</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $product -> product_type }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Internal Ref.</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $product -> internal_reference ? $product -> internal_reference : 'N/A' }}</p>
                        </div>
                        <div class="col-md-2">
                            <label>Bar Code</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">{{ $product -> bar_code ? $product -> bar_code : 'N/A'  }}
                                </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Customer Taxes</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">
                              @php $cnt = 0; @endphp
                             @foreach($product -> taxes as $product_tax)
                                
                               @if($product_tax -> taxinfo -> tax_scope == 'sales')
                                   @php $cnt++; @endphp
                                  {{ $product_tax -> taxinfo -> tax_name.','}}
                               @endif
                             @endforeach
                             @if($cnt == 0)
                               {{ 'N/A' }}
                             @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <label>Vendor Taxes</label>
                        </div>
                        <div class="col-md-4 pr-0">
                            <p class="f-100">
                            @php $cnt = 0; @endphp
                             @foreach($product -> taxes as $product_tax)
                               @if($product_tax -> taxinfo -> tax_scope == 'purchase')
                                  @php 
                                    $cnt++;
                                  @endphp
                                  {{ $product_tax -> taxinfo -> tax_name.','}}
                               @endif
                             @endforeach
                             @if($cnt == 0)
                               {{ 'N/A' }}
                             @endif
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Receivable A/C </label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                               {{ $product -> account_receivable ? $product -> income_account -> general_code." ".$product -> income_account -> name : 'N/A'}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <label>Payable A/C</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                            {{ $product -> account_payable ? $product -> expense_account -> general_code." ".$product -> expense_account -> name : 'N/A'}}
                            </p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label class="f-100">Price</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $product -> price." Tk." }}</p>
                        </div>
                        <div class="col-md-2">
                            <label class="f-100">Cost</label>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $product -> cost." Tk." }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
