@extends('backend.admin.index')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="f-roboto">Pension Receiver Info</div>
            </div>
            <div class="col-md-6 text-right">
                @if($user -> status == 0)
                @can('approve pension')
                <button class="btn btn-info f-100" id="user_approve"><i class="fa fa-check mr-2"></i>Approve</button>
                @endcan
                @endif
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-right">
                <p class="f-100">Employee Name : </p>
            </div>
            <div class="col-md-4">
                <p class="f-100">{{ $user -> getEmployee -> name }}</p>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Grade</label>
            </div>
            <div class="col-md-4">
                <label>PayScale</label>
            </div>
            <div class="col-md-4">
                <label>Last Basic Salary</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> getGrade -> name }}</p>
            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> getPayScale -> name }}</p>
            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> last_basic_pay }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <label>Retire Date</label>
            </div>
            <div class="col-md-4">
                <label>Total Service Year</label>
            </div>
            <div class="col-md-4">
                <label>Pension Start Date</label>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 form-group">
                <p class="form-control bg-light">{{ date('Y-m-d',strtotime($user -> retd_date)) }}</p>
            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> total_service_year }}</p>

            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ date('Y-m-d',strtotime($user -> pension_start_date)) }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Percentage Basic Pay</label>
            </div>
            <div class="col-md-4">
                <label>Health Fee</label>
            </div>
            <div class="col-md-4">
                <label>Basic Pension Amount</label>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> percentage_basic_pay }}</p>
            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> health_fee }}</p>
            </div>
            <div class="col-md-4">
                <p class="form-control bg-light">{{ $user -> basic_pension_amount }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
@push('js')
<script>
$('#user_approve').click(function() {

    if (confirm('Are you sure to approve? ')) {
        const pension_user_id = "{{ $user -> id }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('admin.pension-user.approve') }}",
            type: "post",
            data: {
                pension_user_id: pension_user_id
            },
            success: function(message) {
                Swal.fire({
                    'title': message,
                    'icon': 'success'
                });
            }
        })
    }
});
</script>
@endpush