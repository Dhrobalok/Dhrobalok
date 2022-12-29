@extends('backend.admin.index')
@section('content')

<div class="container-fluid px-0 pb-4">
    @if(Session :: get('message'))
    <div class="alert alert-success f-100">
        {{ Session :: get('message') }}
    </div>
    @endif
    <div class="row form-group">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  f-roboto">
                    Segment Wise Distribution
                </div>
                <div class="card-body text-black">
                    <div class="row text-center pb-4">
                        <div class="col-md-12">
                            <div class="f-roboto">Employee Basic Information</div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Email Address : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee ->email }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Mobile No : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> mobile_no }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Identity No : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> employee_reg_id }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Type : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee ->name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Designation : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> designation -> name }}</label>
                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <div class="col-md-2">
                            <label>Department : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> department -> name }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Status : </label>
                        </div>
                        @if($employee -> status == 0)
                        <div class="col-md-3">
                            <label>Inactive</label>
                        </div>
                        @elseif($employee ->status == 1)
                        <div class="col-md-3">
                            <label>Active</label>
                        </div>
                        @else
                        <div class="col-md-3">
                            <label>Retired</label>
                        </div>
                        @endif
                    </div>
                    <div class="row  justify-content-center form-group">
                        <div class="col-md-2">
                            <label>Joining Date : </label>
                        </div>
                        <div class="col-md-4">
                            <label>{{ $employee -> joining_date }}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Retired Date : </label>
                        </div>
                        <div class="col-md-3">
                            <label>{{ $employee -> retired_date  }}</label>
                        </div>
                    </div>
                    @if($employee -> status != 1)
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <a class="btn" style="background-color:#1dbf73;font-family:'Gentium Basic'"
                                href="{{ route('admin.employee-management.employees.approve',['employee_id' => $employee -> id])}}">Approve</a>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row pb-4">
                        <div class="col-md-12 text-center">
                            <div class="f-roboto">PayScale & Grade Info</div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <label>Current PayScale</label>
                        </div>
                        <div class="col-md-4">
                            <label>Current Grade</label>
                        </div>
                        <div class="col-md-4">
                            <label>Current Salary</label>
                        </div>
                    </div>
                    @php $pay_scale = $employee -> payScale; @endphp
                    <div class="row text-center">
                        <div class="col-md-4">
                            <label
                                class="font-weight-bold">{{$pay_scale?$pay_scale->payscale->name:'N/A' }}</label>
                        </div>
                        <div class="col-md-4">
                            <label
                                class="font-weight-bold">{{$pay_scale?$pay_scale->grade->name:'N/A' }}</label>
                        </div>
                        <div class="col-md-4">
                            <label
                                class="font-weight-bold">{{ number_format($pay_scale?$pay_scale->payscale_detail->salary_amount:0) }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-roboto">Salary Segment Setup</div>
                        </div>
                    </div>
                    <form id="salary_distribution">

                        <input type="hidden" id="salary" name="salary" value="{{ $salary }}">
                        <input type="hidden" name="employee_id" value="{{ $employee -> id }}">
                        <input type="hidden" name="grade_id" value="{{ $employee -> payScale -> grade_id }}">
                        <input type="hidden" name="payscale_id" value="{{ $employee -> payScale -> payscale_id }}">
                        <div class="row pb-4">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-primary text-right f-100" style="display:none"
                                    id="copy_payscale">Copy PayScale</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm table-bordered table-striped table-vcenter">
                                    <thead>
                                        <tr class = "text-black">

                                            <th class="d-none d-sm-table-cell text-center">Segment Name</th>
                                            <th class="d-none d-sm-table-cell text-center">Amount</th>
                                            <th class="d-none d-sm-table-cell text-center">Type</th>
                                            <th class="d-none d-sm-table-cell text-center">% of Basic Salary</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($segments as $segment)
                                        @if($segment -> id > 3)
                                        @break;
                                        @endif
                                        <tr>
                                            <input type="hidden" name="ids[]" value="{{ $segment -> id }}">

                                            <td class="text-center">{{ $segment -> name }}</td>
                                            <td class="text-center"><input type="number" step="any" class="form-control"
                                                    name="amounts[]" id="amount{{$segment -> id }}" value="" required>
                                            </td>
                                            <td class="text-center">{{ $segment -> type -> type }} </td>
                                            @if($segment -> id > 1)
                                            <td class="text-center">N/A</td>
                                            @continue;
                                            @endif
                                            <td class="text-center"><input type="number" step="any" class="form-control"
                                                    id="{{$segment -> id }}" name="percent[]"
                                                    onchange="calculate_amount(this.id)" required></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-center pb-4 pt-4">
                            <div class="col-md-3">
                                <button type = "submit" id = "save" class = "btn  btn-block f-100 text-white" style = "background:#1dbf73">Save</button>
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
function calculate_amount(Id) {
    var percentage = $('#' + Id).val();
    var salary = $('#salary').val();
    var amount = (salary * percentage) / 100.00;
    $('#amount' + Id).val(amount);
}

$(document).ready(function() {
    $('#save').click(function(e) {
        e.preventDefault();
        const formData = new FormData($('#salary_distribution')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })

        $.ajax({
            url: "{{ route('admin.salary-segment.save-segment-amount') }}",
            type: "post",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $.notify('Record added successfully!!', 'success');
                $('#save').prop('disabled', true);
                $('#copy_payscale').css({
                    'display': ''
                });
            }
        });
    })

    $('#copy_payscale').click(function(e) {

        e.preventDefault();
        const formData = new FormData($('#salary_distribution')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        })

        $.ajax({
            url: "{{ route('admin.salary-segment.copy-payscale') }}",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $.notify('Pay scale successfully copied');
            }
        });

    });
})
</script>
@endpush
