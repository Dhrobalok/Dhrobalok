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

        <form id="accounts_form_create" action="{{ route('admin.pf-loan.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card border-info">
               <div class="card-header border-info f-100">
                 <b>Provident Fund Loan Update</b>
               </div>
              <div class="card-body">
              <div class="row">
                <div class="col-md-3 form-group">
                    <label>Employee Name</label>
                </div>
                <div class="form-group col-md-4">
                    <input type = "hidden" name = "employee_id" value = "{{ $user -> employee -> id }}">
                    <input type = "text" value = "{{ $user -> employee -> name }}" class = "form-control" readonly>          
                </div>
            <!-- </div>
            <div class="row form-group justify-content-center"> -->
                <div class="col-md-2 form-group" style="float:right;">
                    <label>Date</label>
                </div>
                <div class="col-md-3 form-group" style="float:right;">
                    <input type="text" id="date" name="date" value="{{$user->date}}" class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3 form-group">
                    <label>Loan Amount</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="loan_amount" name="loan_amount" value="{{$user->loan_amount}}" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
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