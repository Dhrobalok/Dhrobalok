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

    <!-- Dynamic Table Full -->
    <div class="block-content block-content-full">

        <form id="accounts_form_create" action="{{ route('admin.pf-loan.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-2 form-group">
                    <label>Employee</label>
                </div>
                <div class="form-group" style="float:left;">
                    <select class="form-control" id="employee_id" name="employee_id" required>
                        <option value=0>Select Employee</option>
                        @foreach($employees as $employee)
                        <option value={{ $employee -> id}}>{{ $employee -> name }}</option>
                        @endforeach
                    </select>                
                </div>
            <!-- </div>
            <div class="row form-group justify-content-center"> -->
                <div class="col-md-2 form-group" style="float:right;">
                    <label>Date</label>
                </div>
                <div class="col-md-3 form-group" style="float:right;">
                    <input type="text" id="date" name="date" class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Loan Amount</label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="loan_amount" name="loan_amount" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection
@push('js')
@endpush