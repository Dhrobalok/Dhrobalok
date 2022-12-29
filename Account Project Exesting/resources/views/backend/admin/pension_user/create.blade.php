@extends('backend.admin.index')

@section('content')
<!-- Page Content -->


        <form id="accounts_form_create" action="{{ route('admin.pension-users.store') }}" method="post">
            @csrf
            <input type = "hidden" name = "pay_scale_id" id = "payscale_id">
            <input type = "hidden" name = "grade_id" id = "grade_id">
            <input type = "hidden" name = "pay_scale_detail_id" id = "payscale_detail_id">
            <div class="card">
                <div class="card-header">
                   <div class = "f-roboto"> Add New Pension Receiver</div>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <select class="form-control" id="employee_id" name="employee_id" required>
                                <option value=0>Select Employee</option>
                                @foreach($employees as $employee)
                                <option value={{ $employee -> id}}>{{ $employee -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">

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
                    <div class="row text-center">
                     <div class="col-md-4">
                            <input type = "text" class="form-control" id="grade_name" name="grade_name" readonly>
                     </div>
                     <div class="col-md-4">
                            <input class="form-control" id="payscale_name" name="payscale_name" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="last_basic_pay" name="last_basic_pay" readonly required>
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
                    <div class="row text-center">
                   
                        <div class="col-md-4 form-group">
                            <input type="text" id="retd_date" name="retd_date"
                                class="js-flatpickr form-control bg-white" placeholder="Retire Date" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="total_service_year" name="total_service_year"
                                placeholder="Total Service Year" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="pension_start_date" name="pension_start_date"
                                class="js-flatpickr form-control bg-white" placeholder="Pension Start Date" required>
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
                            <input type="text" class="form-control" id="percentage_basic_pay"
                                name="percentage_basic_pay" required>                  
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="health_fee" name="health_fee" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="basic_pension_amount" name="basic_pension_amount" readonly required>
                        </div>
                    </div>
                    <div class="row text-center mt-3">
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary f-100 btn-sm">Save Record</button>
                        </div>
                    </div>
                </div>
            </div>
</form>
@endsection
@push('js')
<script>
// $(document).ready(function() {


$('#percentage_basic_pay').change(function() {
    var percentage = $(this).val();
    var basic_pay = $('#last_basic_pay').val();
    var pension_basic = (percentage / 100 * basic_pay) / 2;
    pension_basic = Math.ceil(pension_basic);
    $('#basic_pension_amount').val(pension_basic);

});

$('#employee_id').on('change',function(){
    const employee_id = $(this).val();
    $.ajax({
        url : "{{ route('ajax.get-employee-payscale') }}",
        type : "get",
        data : { employee_id : employee_id },
        success:function(res)
        {
           $('#grade_name').val(res['grade_name']);
           $('#payscale_name').val(res['payscale_name']);
           $('#last_basic_pay').val(res['last_salary']);
           $('#grade_id').val(res['grade_id']);
           $('#payscale_id').val(res['payscale_id']);
           $('#payscale_detail_id').val(res['payscale_detail_id']);
        }
    });
})
// });
</script>
@endpush