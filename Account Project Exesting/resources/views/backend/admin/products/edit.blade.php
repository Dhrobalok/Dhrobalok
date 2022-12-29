@extends('backend.admin.index')
@section('content')
@php 
  $taxes_ids = array();
   foreach($product -> taxes as $product_tax)
   {
       $taxes_ids[] = $product_tax -> tax_id;
   }
@endphp

<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action = "{{ route('admin.products.update',['product_id' => $product -> id]) }}" method = "post" enctype="multipart/form-data">
                      @csrf
                        <div class="f-roboto mb-4">Product Information</div>
                        <div class="row text-center mb-4">

                            <div class="col-md-12">
                                <img class="img-fluid img-thumbnail"
                                    src="{{ asset($product -> product_image ? $product -> product_image : 'assets/media/various/placeholder.png') }}" height="120px"
                                    width="150px;" id="product_image">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="file" id="file_upload_photo" hidden name="product_image">
                                @if($errors -> has('user_photo'))
                                <h4 class="non-valid">{{ $errors -> first('file_upload_photo') }}</h4>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 pr-0">
                                <input type="text" class="form-control" placeholder="Product Name" name = "product_name" value = "{{ $product -> product_name  }}" required>
                            </div>

                        </div>
                    

                        <ul class="nav nav-pills mb-4 mt-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-infomartion-tab" data-toggle="pill"
                                    href="#general-infomartion" role="tab" aria-controls="general-infomartion-tab"
                                    aria-selected="true">General Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="purchase-tab" data-toggle="pill"
                                    href="#purchase" role="tab" aria-controls="purchase"
                                    aria-selected="false">Purchase</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="accounting-tab" data-toggle="pill" href="#accounting" role="tab"
                                    aria-controls="accounting" aria-selected="false">Accounting</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="general-infomartion" role="tabpanel"
                                aria-labelledby="general-infomartion-tab">
                                <div class="row mt-4">
                                    <div class="col-md-2">
                                        <label>Product Type</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name = "product_type">
                                            <option value = "{{ $product -> product_type }}" hidden selected>{{ ucwords($product -> product_type) }}</option>
                                            <option value="consumable">Consumable</option>
                                            <option value="services">Services</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Sales Price</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" step="any" min="1" value="{{ $product -> price }}" name = "product_price" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <!-- <div class="col-md-2">
                                        <label>Product Category</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control">
                                            <option value="all">All</option>
                                            <option value="saleable">Saleable</option>
                                            <option value="expenses">Expenses</option>
                                        </select>
                                    </div> -->
                                    <div class="col-md-2">
                                        <label>Internal Ref.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name = "internal_ref" value = "{{ $product -> internal_reference }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Customer Taxes</label>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <select class="form-control" name = "customer_taxes[]" id = "customer_taxes" multiple="multiple">
                                            @foreach($taxes as $tax)
                                              @if(in_array($tax -> id,$taxes_ids) && $tax -> tax_scope == 'sales')
                                              <option value = "{{ $tax -> id }}" selected>{{ $tax -> tax_name }}</option>
                                              @elseif($tax -> tax_scope == 'sales')
                                              <option value = "{{ $tax -> id }}">{{ $tax -> tax_name }}</option>
                                              @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                <div class="col-md-2">
                                        <label>BarCode</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name = "product_bar_code" value = "{{ $product -> bar_code }}">
                                    </div>

                                    <div class="col-md-2">
                                        <label>Cost</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" step="any" value="{{ $product -> cost }}" name = "cost">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                  
                                </div>
                            </div>
                            <div class="tab-pane fade" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="row text-black">
                                    <div class="col-md-2">
                                        <label style="font-size:20px">Vendor Bills</label>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Vendor Taxes</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name  = "vendor_taxes[]" id = "vendor_taxes" multiple = "multiple" style = "width:100%">
                                          
                                            @foreach($taxes as $tax)
                                              @if(in_array($tax -> id,$taxes_ids) && $tax -> tax_scope == 'purchase')
                                              <option value = "{{ $tax -> id }}" selected>{{ $tax -> tax_name }}</option>
                                              @elseif($tax -> tax_scope == 'purchase')
                                              <option value = "{{ $tax -> id }}">{{ $tax -> tax_name }}</option>
                                              @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="accounting" role="tabpanel" aria-labelledby="accounting-tab">

                                <div class="row text-black">
                                    <div class="col-md-6">
                                        <label style="font-size:20px">Receivables</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-size:20px">Payables</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                      <label>Income Account</label>
                                    </div>
                                    <div class="col-md-4 pr-0">
                                         <select class="form-control" name ="income_account">
                                            @if($product -> account_receivable == NULL)
                                              <option value = "0" selected hidden>N/A</option>
                                            @endif
                                            @foreach($accounts as $account)
                                             @if($product -> account_receivable == $account -> id)
                                            <option value = "{{ $account -> id }}" selected>{{ $account -> general_code }} {{ $account -> name }}</option>
                                            @elseif($product -> account_receivable != NULL)
                                            <option value = "{{ $account -> id }}">{{ $account -> general_code }} {{ $account -> name }}</option>
                                            @else
                                            <option value = "0" selected>N/A</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                       <label>Expense Account</label>
                                    </div>
                                    <div class="col-md-4 pr-0">
                                         <select class="form-control" name = "expense_account">
                                            @if($product -> account_payable == NULL)
                                              <option value = "0" selected hidden>N/A</option>
                                            @endif
                                            @foreach($accounts as $account)
                                             @if($product -> account_payable == $account -> id)
                                            <option value = "{{ $account -> id }}" selected>{{ $account -> general_code }} {{ $account -> name }}</option>
                                             @else
                                            <option value = "{{ $account -> id }}">{{ $account -> general_code }} {{ $account -> name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
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

.custom-btn {
    display: inline-block;
    padding: 3px 15px !important;
    background: #1dbf73;
    font-family: 'Gentium Basic';
    color: white;
    font-weight: 700;
    font-size: 18px;
    border-radius: 3px;
    border: 1px solid #1dbf73;
    box-shadow: none;
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
    margin-top: 0px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice
{
    background-color:white;
    border:none;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice
{
    color:black;
    font-family:'Gentium Basic';
    font-size:17px;
}
</style>
@endpush
@push('js')
<script>

$(document).ready(function() {
    $('#product_image').on('click', function(e) {
        $('#file_upload_photo').trigger('click');
    });
    $(document).on("change", "#file_upload_photo", function() {

        var product_image = $('#file_upload_photo').prop('files')[0];
        var reader = new FileReader();
        reader.onload = function() {
            $("#product_image").attr("src", reader.result);
        }
        reader.readAsDataURL(product_image);
    });
});

$(document).ready(function(){
    $('#customer_taxes').select2();
    $('#vendor_taxes').select2();
})
</script>
@endpush



