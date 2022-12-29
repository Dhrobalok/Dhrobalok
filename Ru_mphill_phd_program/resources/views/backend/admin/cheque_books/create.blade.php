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
        <form method="post" action="{{ route('admin.cheque-book.store') }}">
            @csrf
              <div class="card border-info">
                <div class="card-header border-info f-100">
                  <b>New Cheque Book</b>
                </div>
                <div class="card-body">
                <div class="row">
                <div class="col-md-4">
                    <label>Registration Date</label>
                </div>
                <div class="col-md-4">
                    <label>Issue By</label>
                </div>
                <div class="col-md-4">
                    <label>Bank Name</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="text" id="registration_date" name="registration_date"
                        class="js-flatpickr form-control bg-white" placeholder="Registration Date"
                        value="{{ old('registration_date') }}">
                    @if($errors -> has('registration_date'))
                    <small><strong>{{ $errors -> first('registration_date') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="issued_by" placeholder="Issue By"
                        value="{{ old('issued_by') }}">
                    @if($errors -> has('issued_by'))
                    <small><strong>{{ $errors -> first('issued_by') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="banks" name="banks">
                        <option value="0">--Select Bank--</option>
                    </select>
                    @if($errors -> has('account_no'))
                    <small><strong>{{ $errors -> first('account_no') }}</strong></small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Account Number</label>
                </div>
                <div class="col-md-4">
                    <label>Cheque Book No</label>
                </div>
                <div class="col-md-4">
                    <label>Total Pages</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <select class="form-control" id="account_no" name="account_no">
                        <option value="0">--Select Account--</option>
                    </select>
                    @if($errors -> has('account_no'))
                    <small><strong>{{ $errors -> first('account_no') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="cheque_book_no" value="{{ old('cheque_book_no') }}" placeholder = "Cheque Book No">
                    @if($errors -> has('cheque_book_no'))
                    <small><strong>{{ $errors -> first('cheque_book_no') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="cheque_book_pages" placeholder = "How many pages are there"
                        value="{{ old('cheque_book_pages') }}">
                    @if($errors -> has('cheque_book_pages'))
                    <small><strong>{{ $errors -> first('cheque_book_pages') }}</strong></small>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Cheque Book Start Page</label>
                </div>
                <div class="col-md-4">
                    <label>Cheque Book End Page</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="number" class="form-control" name="start_page" placeholder="Start Page No"
                        value="{{ old('start_page') }}">
                    @if($errors -> has('start_page'))
                    <small><strong>{{ $errors -> first('start_page') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="end_page" placeholder="End Page No"
                        value="{{ old('end_page') }}">
                    @if($errors -> has('end_page'))
                    <small><strong>{{ $errors -> first('end_page') }}</strong></small>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-info form-control">Save</button>
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

    $("#banks").select2({

        ajax: {
            url: "{{ route('admin.banks.get-banks-info') }}",
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

    $("#account_no").select2({

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
});
</script>
@endpush