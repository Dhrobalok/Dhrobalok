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

        <form id="accounts_form_create" action="{{ route('admin.pf-contribution.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card border-info">
                <div class="card-header border-info">
                    <h4 class="text-center f-100">Provident Contribution Update</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>Employee</label>
                            <select class="form-control" id="employee_id" name="employee_id" required>
                                <option value=0>Select Employee</option>
                                @foreach($employees as $employee)
                                <option value={{ $employee -> id}}
                                    {{ $employee->id === $user->employee_id ? 'selected' : '' }}>{{ $employee -> name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group" style="float:right;">
                            <label>Date</label>
                            <input type="text" id="date" name="date" value="{{$user->date}}"
                                class="js-flatpickr form-control bg-white" placeholder="Select Date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>Provident Fund Amount</label>
                            <input type="text" class="form-control" id="pf_amount" name="pf_amount"
                                value="{{$user->pf_amount}}" required>
                        </div>
                        <div class="col-md-3">
                            <label>Month</label>
                            <input type="text" name="month" value="{{$user->month}}" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control" value="{{$user->year}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row  justify-content-center">
                        <div class="col-md-16">
                            <input class="form-check-input" type="checkbox" value="1" name="is_auto" <?= ( $user->is_auto === 1 ? "checked" : "") ?>
                                id="auto">
                            <label class="form-check-label" for="auto">
                                Use Auto <span style = "margin-left:5px;font-weight:bold">[By checking auto, you can not enter provident amount in each month.]</span>
                            </label>
                        </div>
                    </div>
                    <br><br>
                    <div class="row  justify-content-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button type="submit" class="f-100 btn btn-primary">Save</button>
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