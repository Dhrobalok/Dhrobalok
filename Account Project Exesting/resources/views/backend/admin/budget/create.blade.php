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
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Create New Budget</h3>
            <a class="btn btn-primary" href="{{ route('budgets.index') }}"> Back</a>
        </div>

        <form id="accounts_form_create" action="{{ route('budgets.store') }}" method="post">
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Name</label>
                </div>
                <div class="col-md-8">
                    <textarea class="form-control" id="name" name="name" required></textarea>
                   <input type="hidden" value="01">
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Select Project Label</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="level_id" name="level_id" required>
                        <option value=0>Please Select Label</option>
                        @foreach($levels as $level)
                        <option value={{ $level -> id}}>{{ $level -> name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Start Date</label>
                </div>
                <div class="col-md-8">
                    <input type="datetime-local" id="start_date" name="start_date" class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>End Date</label>
                </div>
                <div class="col-md-8">
                    <input type="datetime-local" class="js-flatpickr form-control bg-white" placeholder="Select Date" id="end_date" name="end_date" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Cost</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cost" name="cost" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Select Status</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="status" name="status" required>
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
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
