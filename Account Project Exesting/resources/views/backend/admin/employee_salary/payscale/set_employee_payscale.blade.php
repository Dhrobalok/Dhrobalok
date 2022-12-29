@extends('backend.admin.index')
@section('content')
<div class="container px-0 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="f-roboto">Configure Employee PayScale</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.employee-management.employees.index') }}"
                                    class="f-100 btn btn-info btn-sm"><i class="fa fa-arrow-left mr-2"></i>Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4 text-right">
                            <img src="{{ URL :: to($employee -> employee_photo) }}" height="200" width="200">
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Basic Information</div>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Name : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> name }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Email: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> user_info -> email }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Mobile : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> mobile_no }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Employee N<sup>0</sup>: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> employee_reg_id }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Gender : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ Str :: title($employee -> gender) }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Date Of Bitrh: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> date_of_birth }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">NID N<sup>0</sup> : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> nid_number }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">TIN N<sup>0</sup>: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> tin_number }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Division : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $employee -> getDivisionName ? $employee -> getDivisionName -> name : '-' }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Department: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> department ? $employee -> department -> name : '-' }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Section : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $employee -> getSectionName ? $employee -> getSectionName -> name : '-' }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Designation: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> designation ? $employee -> designation -> name : '-' }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Joining Date : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> joining_date  }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Retired Date: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> retired_date  }}</p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Bank Name : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $employee -> getBankName ? $employee -> getBankName -> bank_name : '-'  }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Account N<sup>0</sup>: </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee -> account_no  }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Payroll Information</div>
                        </div>
                    </div>
                    @php $employee_payscale = $employee -> payscale; @endphp
                    @if(isset($employee_payscale))
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Grade : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee_payscale ? $employee_payscale -> grade -> name : '-' }}</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <p class="f-100">Payscale : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">{{ $employee_payscale ? $employee_payscale -> payscale -> name : '-'  }}
                            </p>
                        </div>
                    </div>
                    <div class="row text-black">
                        <div class="col-md-2 text-right">
                            <p class="f-100">Basic : </p>
                        </div>
                        <div class="col-md-4">
                            <p class="f-100">
                                {{ $employee_payscale -> payscale_detail ? $employee_payscale -> payscale_detail ->  salary_amount : '-' }}
                                BDT</p>
                        </div>

                    </div>
                    @endif
                    <hr>
                    <div class="row text-center form-group">
                        <div class="col-md-12">
                            <div class="f-roboto">Assign New PayScale</div>
                        </div>
                    </div>
                    <form
                        action="{{ route('admin.salary-management.save-employee-payscale',['employee_id' => $employee -> id])}}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label>Grade</label>
                            </div>
                            <div class="col-md-4">
                                <label>PayScale</label>
                            </div>
                            <div class="col-md-4">
                                <label>Basic Salary</label>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col-md-4">
                                <select class="form-control" id="grade" name="grade_id">

                                    <option>Select Grade</option>
                                    @foreach($grades as $grade)
                                    <option value="{{ $grade -> id }}">{{ $grade -> name }}</option>
                                    @endforeach
                                </select>
                                @if($errors -> has('grade_id'))
                                <small><strong>{{ $errors -> first('grade_id') }}</strong></small>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="payscale_id" name="payscale_id">
                                    <option>Select Payscale</option>
                                </select>
                                @if($errors -> has('payscale_id'))
                                <small><strong>{{ $errors -> first('payscale_id') }}</strong></small>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="detail_id" name="detail_id">
                                    <option>Select Basic Salary</option>
                                </select>
                                @if($errors -> has('detail_id'))
                                <small><strong>{{ $errors -> first('detail_id') }}</strong></small>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block f-100"
                                    style="background:#1dbf73;color:white;font-size:18px;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$('#grade').on('change', function() {
    $.ajax({
        url: "{{ route('ajax.get-payscales') }}",
        type: "get",
        data: {
            grade_id: $('#grade').val()
        },
        success: function(result) {
            $('#payscale_id').html(result);
        }
    })
});
$('#payscale_id').on('change', function() {
    $.ajax({
        url: "{{ route('ajax.get-payscale-details') }}",
        type: "get",
        data: {
            payscale_id: $('#payscale_id').val()
        },
        success: function(result) {
            $('#detail_id').html(result);
        }
    })
});
</script>
@endpush