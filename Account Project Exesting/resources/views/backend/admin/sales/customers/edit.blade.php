@extends('backend.admin.index')
@section('content')
<div class="container-fluid pl-0 pr-0 ml-0 mr-0 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="customer_info" action="{{ route('admin.sales.customers.update',['customer_id' => $customer -> id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="f-roboto mb-4">Customer Information</div>
                        <div class="row text-center mb-4">

                            <div class="col-md-12">
                                <img class="img-fluid img-thumbnail rounded-circle"
                                    src="{{ asset($customer -> photo_url ? $customer -> photo_url : 'assets/media/various/placeholder.png') }}"
                                    height="120px" width="150px;" id="customer_photo">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="file" id="file_upload_photo" hidden name="customer_photo">
                                @if($errors -> has('user_photo'))
                                <h4 class="non-valid">{{ $errors -> first('file_upload_photo') }}</h4>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 pr-0">
                                <input type="text" class="form-control" placeholder="Company Name / Individual Name"
                                    name="customer_name" value="{{ $customer -> name }}" required>
                            </div>
                            <div class="col-md-3">

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-1">
                                <label>Address</label>
                            </div>
                            <div class="col-md-5 pr-0">
                                <input type="text" class="form-control" placeholder="Street" name="street_name" required
                                    value="{{ $customer -> street }}">
                            </div>
                            <div class="col-md-1">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="phone_number"
                                    value="{{ $customer -> phone_number }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2 pr-0">
                                <input type="text" class="form-control" placeholder="City" name="city"
                                    value="{{ $customer -> city }}" required>
                            </div>
                            <div class="col-md-2 pr-0">
                                <input type="text" class="form-control" placeholder="State" name="state"
                                    value="{{ $customer -> state }}" required>
                            </div>
                            <div class="col-md-1 pr-0">
                                <input type="text" class="form-control" placeholder="ZIP" name="zip_code"
                                    value="{{ $customer -> zip_code }}" required>
                            </div>
                            <div class="col-md-1">
                                <label>Mobile</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="mobile_number"
                                    value="{{ $customer -> mobile_number }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-5 pr-0">
                                <select class="form-control" name="country">
                                    <option value="{{ $customer -> country }}" selected hidden>
                                        {{ $customer -> country }}</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label>Email</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="email_address"
                                    value="{{ $customer -> email_address }}">
                            </div>
                        </div>

                        <div class="row mb-2">

                            <div class="col-md-1">
                                <label>Tax ID</label>
                            </div>
                            <div class="col-md-5 pr-0">
                                <input type="text" class="form-control" placeholder="Tax ID" name="tax_id"
                                    value="{{ $customer -> tax_id }}">
                            </div>


                            <!-- update by rashed -->
                            <div class="col-md-1">
                                <label>Tin ID</label>
                            </div>
                            <div class="col-md-5 pr-0">
                                <input type="text" class="form-control" placeholder="Tax ID" name="tax_id"
                                    value="{{ $customer -> tin_id }}">
                            </div>

                            <div class="col-md-1">
                                <label>Bin ID</label>
                            </div>
                            <div class="col-md-5 pr-0">
                                <input type="text" class="form-control" placeholder="Tax ID" name="tax_id"
                                    value="{{ $customer -> bin_id }}">
                            </div>

                            <!-- update by rashed -->
                            <div class="col-md-1">
                                <label>Website</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="website"
                                    value="{{ $customer -> website }}">
                            </div>
                        </div>

                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="contact-addresses-tab" data-toggle="pill"
                                    href="#contact-addresses" role="tab" aria-controls="contact-addresses-tab"
                                    aria-selected="true">Contacts & Addresses</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="accounting-tab" data-toggle="pill" href="#accounting" role="tab"
                                    aria-controls="accounting" aria-selected="false">Accounting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="internal-notes-tab" data-toggle="pill" href="#internal-notes"
                                    role="tab" aria-controls="internal-notes-tab" aria-selected="true">Internal
                                    Notes</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="contact-addresses" role="tabpanel"
                                aria-labelledby="contact-addresses-tab">
                                <div class="row">
                                    <div class="col-md-12 ml-2">
                                        <button class="btn btn-info f-100" type="button" data-target="#newContacts"
                                            data-toggle="modal">ADD</button>
                                    </div>
                                </div>

                                <div class="row" id="contacts_addresses">
                                    @foreach($customer -> contact_addresses as $contact_address)
                                    <div class="col-md-4 mt-2 pr-0">
                                        <div class="card shadow-sm bg-light">
                                            <div class="card-body text-center">
                                                <input type="hidden" name="contacts_names[]"
                                                    value="{{ $contact_address -> name }}">
                                                <input type="hidden" name="contacts_job_position[]"
                                                    value="{{ $contact_address -> job_position }}">
                                                <input type="hidden" name="contacts_email[]"
                                                    value="{{ $contact_address -> email_address }}">
                                                <input type="hidden" name="contacts_mobile_number[]"
                                                    value="{{ $contact_address -> mobile_number ? $contact_address -> mobile_number : '-'  }}">
                                                <input type="hidden" name="contacts_phone_number[]"
                                                    value="{{ $contact_address -> phone_number ? $contact_address -> phone_number : '-' }}">
                                                <input type="hidden" name="contacts_street[]"
                                                    value="{{ $contact_address -> street ? $contact_address -> street : '-' }}">
                                                <input type="hidden" name="contacts_state[]"
                                                    value="{{ $contact_address -> state ? $contact_address -> state : '-' }}">
                                                <input type="hidden" name="çontacts_zip_code[]"
                                                    value="{{ $contact_address -> contacts_zip_code ? $contact_address -> contacts_zip_code : '-' }}">
                                                <input type="hidden" name="çontacts_city[]"
                                                    value="{{ $contact_address -> city ? $contact_address -> city : '-' }}">
                                                <input type="hidden" name="çontacts_country[]"
                                                    value="{{ $contact_address -> country ? $contact_address -> country :'-' }}">
                                                <input type="hidden" name="çontacts_internal_notes[]"
                                                    value="{{ $contact_address -> internal_notes ? $contact_address -> internal_notes : '-' }}">
                                                <input type="hidden" name="types[]"
                                                    value="{{ $contact_address-> contacts_type }}">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-danger" onclick="delete_record(this)"><i
                                                                class="fa fa-trash-alt"></i></button>
                                                    </div>
                                                </div>

                                                <p class="f-100">{{ $contact_address -> name  }}
                                                </p>
                                                <p class="f-100">{{ $contact_address -> job_position }}</p>
                                                <p class="f-100">{{ $contact_address -> email_address }}</p>
                                                <p class="f-100">{{ $contact_address -> zip_code }}
                                                    {{ $contact_address -> city }}</p>
                                                <p class="f-100">{{ $contact_address -> state }}
                                                    {{ $contact_address -> country }}</p>
                                                @if($contact_address -> mobile_number)
                                                <p class="f-100"> Mobile : {{ $contact_address -> mobile_number }}</p>
                                                @endif
                                                @if($contact_address -> phone_number)
                                                <p class="f-100"> Phone : {{ $contact_address -> phone_number }}</p>
                                                @endif
                                                <p class="f-100"> {{ $contact_address -> internal_notes }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="tab-pane fade" id="accounting" role="tabpanel" aria-labelledby="accounting-tab">

                                <div class="row text-black">
                                    <div class="col-md-6">
                                        <label style="font-size:20px">Bank Accounts</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="font-size:20px">Accounting Entries</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-2 pr-0">
                                        <label>Account Receivable</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="account_receivable">
                                            @foreach($accounts as $account)
                                            @if($customer -> account_receivable == $account -> id)
                                            <option value="{{ $account -> id }}" selected>
                                                {{ $account -> general_code." ".$account -> name }}</option>
                                            @else
                                            <option value="{{ $account -> id }}">
                                                {{ $account -> general_code." ".$account -> name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-2 pr-0">
                                        <label>Account Payable</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="account_payable">
                                            @foreach($accounts as $account)
                                            <option value="{{ $account -> id }}">
                                                {{ $account -> general_code." ".$account -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bank</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Account Number</label>
                                            </div>
                                        </div>
                                        <div id="bank_accounts">
                                            @foreach($customer -> bank_accounts as $bank_account)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="bank_ids[]">
                                                        @foreach($banks as $bank)
                                                        @if($bank_account -> id == $bank -> id)
                                                        <option value="{{ $bank -> id }}" selected>
                                                            {{ $bank -> bank_name }}
                                                        </option>
                                                        @else
                                                        <option value="{{ $bank -> id }}">{{ $bank -> bank_name }}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="account_number[]"
                                                        required value = "{{ $bank_account -> account_number }}">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type = "button" class = "btn btn-danger" onclick = "remove(this)"><i class = "fa fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="#" onclick="add_a_line()">Add a line</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="internal-notes" role="tabpanel"
                                aria-labelledby="internal-notes-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control"
                                            placeholder="Write some notes about that customer"
                                            name="internal_notes">{{ $customer -> note }}</textarea>
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

<div class="modal fade" id="newContacts" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="row">
                    <div class="col-md-12 ff-roboto">
                        <h4>Create Contact</h4>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="contact-tab" data-toggle="pill" href="#contact"
                                    role="tab" aria-controls="contact-tab" aria-selected="true">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="invoice-address-tab" data-toggle="pill" href="#invoice-address"
                                    role="tab" aria-controls="invoice-address" aria-selected="false">Invoice Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="delivery-address-tab" data-toggle="pill"
                                    href="#delivery-address" role="tab" aria-controls="delivery-address"
                                    aria-selected="false">Delivery Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="other-address-tab" data-toggle="pill" href="#other-address"
                                    role="tab" aria-controls="other-address" aria-selected="false">Other Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="private-address-tab" data-toggle="pill" href="#private-address"
                                    role="tab" aria-controls="private-address" aria-selected="false">Private Address</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="contact" role="tabpanel"
                                aria-labelledby="contact-tab">

                                <form id="contacts_form">
                                    <input type="hidden" name="address_type" value="contacts">
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Contact Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" required name="contacts_name">

                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" name="contacts_email" required>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_title">
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_phone">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="e.g. Sales Director"
                                                name="contacts_job_position" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_mobile">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Notes</label>
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" placeholder="Internal notes...."
                                                name="contacts_internal_notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3 text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="custom-btn"><i
                                                    class="fa fa-save mr-2"></i>Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="invoice-address" role="tabpanel"
                                aria-labelledby="invoice-address-tab">
                                <form id="invoice_address_form">

                                    <input type="hidden" name="address_type" value="invoice_address">
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Contact Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_name">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" name="contacts_email">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_title">
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_phone">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="e.g. Sales Director"
                                                name="contacts_job_position">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_mobile">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="street"
                                                name="contacts_street1">
                                        </div>

                                    </div>

                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" placeholder="City"
                                                name="contacts_city">
                                        </div>
                                        <div class="col-md-1 pr-0">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="contacts_state">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" placeholder="Zip"
                                                name="contacts_zip_code">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_country">
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" placeholder="Internal note.."
                                                name="contacts_internal_notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3 text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="custom-btn">Save & Exit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="delivery-address" role="tabpanel"
                                aria-labelledby="delivery-address-tab">

                                <form id="delivery_address_form">

                                    <input type="hidden" name="address_type" value="delivery_address">
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Contact Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_name">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" name="contacts_email">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_title">
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_phone">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="e.g. Sales Director"
                                                name="contacts_job_position">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_mobile">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="street"
                                                name="contacts_street1">
                                        </div>

                                    </div>

                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" placeholder="City"
                                                name="contacts_city">
                                        </div>
                                        <div class="col-md-1 pr-0">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="contacts_state">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" placeholder="Zip"
                                                name="contacts_zip_code">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_country">
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" placeholder="Internal note.."
                                                name="contacts_internal_notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3 text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="custom-btn">Save & Exit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="other-address" role="tabpanel"
                                aria-labelledby="other-address-tab">

                                <form id="other_address_form">

                                    <input type="hidden" name="address_type" value="other_address">
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Contact Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_name">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" name="contacts_email">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_title">
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_phone">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="e.g. Sales Director"
                                                name="contacts_job_position">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_mobile">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="street"
                                                name="contacts_street1">
                                        </div>

                                    </div>

                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" placeholder="City"
                                                name="contacts_city">
                                        </div>
                                        <div class="col-md-1 pr-0">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="contacts_state">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" placeholder="Zip"
                                                name="contacts_zip_code">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_country">
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" placeholder="Internal note.."
                                                name="contacts_internal_notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3 text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="custom-btn">Save & Exit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="private-address" role="tabpanel"
                                aria-labelledby="private-address-tab">

                                <form id="private_address_form">

                                    <input type="hidden" name="address_type" value="private_address">
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Contact Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_name">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control" name="contacts_email">
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_title">
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Mr.">Mr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_phone">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="e.g. Sales Director"
                                                name="contacts_job_position">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="contacts_mobile">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="street"
                                                name="contacts_street1">
                                        </div>

                                    </div>

                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" placeholder="City"
                                                name="contacts_city">
                                        </div>
                                        <div class="col-md-1 pr-0">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="contacts_state">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="text" class="form-control" placeholder="Zip"
                                                name="contacts_zip_code">
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="contacts_country">
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mr-3 ml-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control" placeholder="Internal note.."
                                                name="contacts_internal_notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="row ml-3 mr-3 text-center mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="custom-btn">Save & Exit</button>
                                        </div>
                                    </div>
                                </form>
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
@endpush
@push('js')
<script>
$('form').submit(function(e) {

    const contactsData = new FormData($(this)[0]);
    const form = $(this)[0];

    if (form.id != 'customer_info') {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('admin.sales.customer.contacts.save') }}",
            type: "post",
            data: contactsData,
            processData: false,
            contentType: false,
            success: function(res) {
                $('#contacts_addresses').append(res);
                form.reset();
                $('#newContacts').modal('hide');
            }
        });
    } else {


        //Customer data must be sent in same procedure
    }

});

function delete_record(ref) {
    $(ref).closest('.col-md-4').remove();
}

function add_a_line() {

    event.preventDefault();
    $.ajax({
        url: "{{ route('admin.sales.customer.bank-account.add') }}",
        type: "get",
        success: function(res) {
            $('#bank_accounts').append(res);
        }
    })
}

$(document).ready(function() {
    $('#customer_photo').on('click', function(e) {
        $('#file_upload_photo').trigger('click');
    });
    $(document).on("change", "#file_upload_photo", function() {

        var customer_photo = $('#file_upload_photo').prop('files')[0];
        var reader = new FileReader();
        reader.onload = function() {
            $("#customer_photo").attr("src", reader.result);
        }
        reader.readAsDataURL(customer_photo);
    });
});

function remove(row_ref)
{
     $(row_ref).closest('.row').remove();
}
</script>
@endpush
