@extends('backend.admin.index')
@section('content')
<div class="container-fluid pb-4">
    <form method="post"
        action="{{ route('admin.salary-management.payscale.update',['pay_scale_id' => $payScale -> id]) }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <div class="f-roboto">PayScale Update</div>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin.salary-management.payscale.index') }}"
                                class="btn btn-primary text-white btn-sm f-100 mr-2"><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row form-group justify-content-center">
                    <div class="col-md-2">
                        <label>Name</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" value="{{ old('name',$payScale -> name) }}">
                        @if($errors -> has('name'))
                        <small>
                            <strong>
                                {{ $errors -> first('name') }}
                            </strong>
                        </small>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label>Grade</label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="grade_id">
                            <option value="{{ $payScale -> grade -> id }}" selected hidden>
                                {{ $payScale -> grade -> name }}</option>
                            @foreach($grades as $grade)
                            <option value={{ $grade -> id }}>{{ $grade -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group justify-content-center">
                    <div class="col-md-2">
                        <label>Start Salary</label>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="start_salary"
                            value="{{ old('start_salary',$payScale -> start_salary) }}">
                        @if($errors -> has('start_salary'))
                        <small>
                            <strong>
                                {{ $errors -> first('start_salary') }}
                            </strong>
                        </small>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label>End Salary</label>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="end_salary"
                            value="{{ old('end_salary',$payScale -> end_salary) }}">
                        @if($errors -> has('end_salary'))
                        <small>
                            <strong>
                                {{ $errors -> first('end_salary') }}
                            </strong>
                        </small>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <label>Number Of Increments</label>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="increments_number"
                            value="{{ old('increments_number',$payScale -> number_of_increments) }}" readonly>
                        @if($errors -> has('increments_number'))
                        <small>
                            <strong>
                                {{ $errors -> first('increments_number') }}
                            </strong>
                        </small>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <label>Increment(%)</label>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="increment_percentage"
                            value="{{ old('increment_percentage',$payScale -> increment_percentage) }}" readonly>
                        @if($errors -> has('increment_percentage'))
                        <small>
                            <strong>
                                {{ $errors -> first('increment_percentage') }}
                            </strong>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Status</label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="status">
                            <option value="{{ $payScale -> status }}" selected hidden>
                                {{ $payScale -> status ? "Active" : "Inactive" }}</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group justify-content-center">
                    <div class="col-md-12">
                        <table class="table table-striped table-sm table-bordered">
                            <thead class="text-center">
                                <th>SL. No</th>
                                <th>Salary Amount</th>

                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($payScale -> details as $detail)
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td>
                                        <input type="number" class="form-control text-center" name="salary_amount[]"
                                            value="{{ $detail -> salary_amount }}">
                                        <input type="hidden" name="ids[]" value={{ $detail -> id }}>
                                    </td>

                                </tr>
                                @php $i = $i + 1; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block f-100 text-white"
                            style="background:#1dbf73;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection