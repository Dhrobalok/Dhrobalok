@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    <div class="block-content block-content-full">
        <form method="post" action="{{ route('admin.salary-management.payscale.store') }}">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class = "f-roboto">New Pay Scale</div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href = "{{ route('admin.salary-management.payscale.index') }}" class = "btn btn-info text-white btn-sm f-100"><i class = "fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row form-group justify-content-center">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                                value="{{ old('start_salary') }}">
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
                            <input type="number" class="form-control" name="end_salary" value="{{ old('end_salary') }}">
                            @if($errors -> has('end_salary'))
                            <small>
                                <strong>
                                    {{ $errors -> first('end_salary') }}
                                </strong>
                            </small>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group justify-content-center">

                        <div class="col-md-2">
                            <label>Number Of Increments</label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="increments_number"
                                value="{{ old('increments_number') }}">
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
                                value="{{ old('increment_percentage') }}">
                            @if($errors -> has('increment_percentage'))
                            <small>
                                <strong>
                                    {{ $errors -> first('increment_percentage') }}
                                </strong>
                            </small>
                            @endif
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
</div>
@endsection