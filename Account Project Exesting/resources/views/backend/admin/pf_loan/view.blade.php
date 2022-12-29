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

        <form id="accounts_form_create" action="{{ route('admin.pf-loan.index') }}" method="get">
            <div class="card border-info">
               <div class="card-header border-info f-100">
                 <b>Provident Fund Loan</b>
               </div>
               <div class="card-body">
               <div class="row">
                <div class="col-md-3 form-group">
                    <label>Employee Name(ID)</label>
                </div>
                <div class="form-group" style="float:left; background-color:white;">
                    @foreach($employees as $employee)
                        @if($employee->id == $user->employee_id)
                        <label>{{$employee->name}}({{$employee->id}})</label>
                        @endif
                    @endforeach              
                </div>
            <!-- </div>
            <div class="row form-group justify-content-center"> -->
                <div class="col-md-2 form-group" style="float:right;">
                    <label>Date</label>
                </div>
                <div class="col-md-3 form-group" style="float:right; background-color:white;">
                    <label>{{$user->date}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Loan Amount</label>
                </div>
                <div class="col-md-3" style="background-color:white;">
                    <label>{{$user->loan_amount}}</label>
                </div>
            </div>
            <!-- <div class="row form-group justify-content-center">
                    <div class="col-md-3">
                        <label>Month</label>
                    </div>
                    <div class="col-md-3" style="background-color:white;">
                        <label>{{$user->month}}</label>
                    </div>
                </div>
                <div class="row form-group justify-content-center">
                    <div class="col-md-3">
                        <label>Year</label>
                    </div>
                    <div class="col-md-3" style="background-color:white;">
                        <label>{{$user->year}}</label>
                    </div>
                </div>
            </div> -->
            <div class="row form-group justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <button type="submit" class="f-100 btn btn-primary">OK</button>
                </div>
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
@endpush