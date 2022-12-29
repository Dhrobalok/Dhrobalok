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
        <form method="post" action="{{ route('admin.cheque-book.update',['id' => $chequeBook -> id]) }}">
            @csrf
            <div class="card border-info">
              <div class="card-header border-info f-100">
                 <b>Cheque Book Update</b>
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
                        value="{{ $chequeBook -> registration_date }}" class="js-flatpickr form-control bg-white"
                        placeholder="Registration Date">
                    @if($errors -> has('registration_date'))
                    <small><strong>{{ $errors -> first('registration_date') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="issued_by" placeholder="Issue By"
                        value="{{ $chequeBook -> issued_by }}">
                    @if($errors -> has('issued_by'))
                    <small><strong>{{ $errors -> first('issued_by') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="banks" name="banks">

                        <option value="{{ $chequeBook -> bank_id }}">{{ $chequeBook -> bank -> bank_name }}</option>
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
                        <option value="{{ $chequeBook -> account_no }}">{{ $chequeBook -> account -> name }}</option>
                    </select>
                    @if($errors -> has('account_no'))
                    <small><strong>{{ $errors -> first('account_no') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="cheque_book_no"
                        value="{{ $chequeBook -> chequebook_no }}" placeholder="Cheque Book No">
                    @if($errors -> has('cheque_book_no'))
                    <small><strong>{{ $errors -> first('cheque_book_no') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="cheque_book_pages"
                        placeholder="How many pages are there" value="{{ $chequeBook -> total_page_number }}" disabled>
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
                        value="{{ $chequeBook -> start_page_no }}">
                    @if($errors -> has('start_page'))
                    <small><strong>{{ $errors -> first('start_page') }}</strong></small>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="end_page" placeholder="End Page No"
                        value="{{ $chequeBook -> end_page_no }}">
                    @if($errors -> has('end_page'))
                    <small><strong>{{ $errors -> first('end_page') }}</strong></small>
                    @endif
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead class="bg-white text-center">
                            <th>SL. No</th>
                            <th>Cheque No</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < count($chequeBookPages); $i=$i + 1) @php $status=$chequeBookPages[$i] ->
                                status; @endphp
                                <tr class="bg-white text-center">
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                       <input type = "number" class = "form-control text-center" name = "chequebook_page[]" value = "{{ $chequeBookPages[$i] -> page_number }}">
                                       <input type = "hidden" name = "page_ids[]" value = {{ $chequeBookPages[$i] -> id }}>
                                    </td>
                                    <td>
                                        @if($status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @elseif($status == 0)
                                        <span class="badge badge-secondary">Inactive</span>
                                        @else
                                        <span class="badge badge-warning">Used</span>
                                        @endif
                                    </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>

            </div>
            @can('edit cheque')
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-info form-control">Save Changes</button>
                </div>
            </div>
            @endcan
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