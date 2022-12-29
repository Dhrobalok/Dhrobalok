@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-right">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class="custom-btn bg-primary border-0 mr-2"
                                    href="{{ route('admin.sales.vendors.index') }}">Back</a>
                                <a class="custom-btn"
                                    href="{{ route('admin.sales.vendors.edit',['vendor_id' => $vendor -> id]) }}">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center mb-4">
                        <div class="col-md-12">
                            <img class="img-fluid img-thumbnail rounded-circle"
                                src="{{ asset($vendor -> photo_url ? $vendor -> photo_url : 'assets/media/various/placeholder.png') }}"
                                height="120px" width="150px;" id="vendor_photo">
                        </div>
                    </div>

                    <div class="row mb-4 text-center">
                        <div class="col-md-12">
                            <p class="f-100 font-weight-bold text-black">{{ $vendor -> name  }}</p>
                        </div>
                    </div>
                    <div class="row mb-4 text-center">
                        <div class="col-md-12">
                            <div class="f-roboto">Basic Identity</div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-2">
                            <p class="f-100">Mobile</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> mobile_number }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="f-100">Phone</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> phone_number }}</p>
                        </div>
                    </div>
                    <div class="row text-center">

                        <div class="col-md-2">
                            <p>Email</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> email_address }}</p>
                        </div>
                        <div class="col-md-2">
                            <p>Tax ID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> tax_id }}</p>
                        </div>

                        <!-- update by rashed-->
                        <div class="col-md-2">
                            <p>Tin ID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> tin_id }}</p>
                        </div>

                        <div class="col-md-2">
                            <p>Bin ID</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor ->bin_id }}</p>
                        </div>

                        <!-- update by rashed-->
                    </div>
                    <div class="row text-center">

                        <div class="col-md-2">
                            <p>Country</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> country }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="f-100">Street</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> street }}</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-2">
                            <p class="f-100">City</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> city }}</p>
                        </div>
                        <div class="col-md-2">
                            <p>State</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> state  }}</p>
                        </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-md-2">
                            <p>Zip Code</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> zip_code }}</p>
                        </div>

                        <div class="col-md-2">
                            <p>Website</p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $vendor -> website }}</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-2">
                            <p>Internal Notes</p>
                        </div>
                        <div class="col-md-10">
                            <p>{{ $vendor -> internal_notes }}</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-roboto">Contacts Addresses</div>
                        </div>
                    </div>

                    @foreach($vendor -> contact_addresses as $contact_address)
                    <div class="card mb-2 mt-2 border-bottom-0 border-left-0 border-right-0">
                        <div class="card-body">

                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p class="font-weight-bold text-center text-black">{{ $contact_address -> name }}
                                    </p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <p class="f-100">Mobile</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> mobile_number }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="f-100">Phone</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> phone_number }}</p>
                                </div>
                            </div>
                            <div class="row text-center">

                                <div class="col-md-2">
                                    <p>Job Position</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> job_position }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>Email</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> email_address }}</p>
                                </div>

                            </div>
                            <div class="row text-center">

                                <div class="col-md-2">
                                    <p>Country</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> country }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="f-100">Street</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> street }}</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <p class="f-100">City</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> city }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p>State</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> state  }}</p>
                                </div>

                            </div>

                            <div class="row text-center">
                                <div class="col-md-2">
                                    <p>Zip Code</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> zip_code }}</p>
                                </div>

                                <div class="col-md-2">
                                    <p>Internal Notes </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="f-100">{{ $contact_address -> internal_notes }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Contacts Type</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="font-weight-bold text-black">
                                        {{ str_replace("_"," ",$contact_address -> contacts_type) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row text-center mb-4">
                        <div class="col-md-12">
                            <div class="f-roboto">Accounting</div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p class="f-roboto">Bank Accounts</p>
                        </div>
                        <div class="col-md-6">
                            <p class="f-roboto">Accounting Entries</p>
                        </div>
                    </div>
                    <div class="row text-center">
                      <div class="col-md-3">
                          <p>Bank Name</p>
                      </div>
                      <div class="col-md-3">
                          <p>Account Number</p>
                      </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            @foreach($vendor -> bank_accounts as $vendor_bank_account)
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{ $vendor_bank_account -> bankinfo -> bank_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $vendor_bank_account -> account_number }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Account Receivable</p>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $receivable_account = App\Models\ChartOfAccount :: find($vendor ->
                                    account_receivable);
                                    @endphp
                                    <p>{{  $receivable_account ? $receivable_account -> name .'('.$receivable_account -> general_code.')' : '-'  }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Account Payable</p>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $payable_account = App\Models\ChartOfAccount :: find($vendor -> account_payable);
                                    @endphp
                                    <p>{{  $payable_account ? $payable_account -> name .'('.$payable_account -> general_code.')' : '-'  }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
}
</style>
