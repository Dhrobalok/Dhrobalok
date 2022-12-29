@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h6>Reconciliation Report</h6>

    <!-- Dynamic Table Full -->
    <div class="block-content block-content-full">

        <form id="accounts_form_create" action="{{ route('admin.reconciliation.fetch') }}" method="post">
        @csrf
            <div class="card">
            <div class="row form-group justify-content-center" style="margin-top: 20px;">
                <div class="col-md-2 form-group">
                    <label>Account:</label>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="transaction_coa_id" name="transaction_coa_id">
                        <option value="0">Bank Account</option>
                    </select>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-2 form-group">
                    <label>Start Date</label>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" id="start_date" name="start_date" class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-2 form-group">
                    <label>End Date</label>
                </div>
                <div class="col-md-3 form-group">
                    <input type="text" id="end_date" name="end_date" class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Go</button>
                </div>
            </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection
@push('js')
<script>
$(document).ready(function(){
    $("#transaction_coa_id").select2({

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