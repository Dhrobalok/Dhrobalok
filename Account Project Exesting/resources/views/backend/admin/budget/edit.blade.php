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
            <h3 class="block-title">Edit Budget</h3>
            <a class="btn btn-primary" href="{{ route('budgets.index') }}"> Back</a>
        </div>

        <form id="accounts_form_create" action="{{ route('budgets.update', $budget->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{$budget->name}}" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Select Project Label</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="level_id" name="level_id" required>
                        <option value=0>Please Select Project Label</option>
                        @foreach($levels as $level)
                        <option value={{ $level -> id}} {{ $level->id === $budget->level_id ? 'selected' : '' }}>{{ $level -> name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Start Date</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="js-flatpickr form-control bg-white" id="start_date" name="start_date" value="{{$budget->start_date}}" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>End Date</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="js-flatpickr form-control bg-white" id="end_date" name="end_date" value="{{$budget->end_date}}" required>
                </div>
            </div>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Cost</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cost" name="cost" value="{{$budget->cost}}" required>
                </div>
            </div>
            <!-- <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Select Status</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="status" name="status" required>
                        <option value="0" {{ $budget->status === 0 ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ $budget->status === 1 ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div> -->
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
