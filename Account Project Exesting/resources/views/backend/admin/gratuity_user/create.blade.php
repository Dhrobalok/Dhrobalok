@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<form id="gratuity_user_create" action="{{ route('admin.gratuity-users.store') }}" method="post">
    @csrf
    <input type="hidden" name="pay_scale_id" id="payscale_id">
    <input type="hidden" name="grade_id" id="grade_id">
    <input type="hidden" name="pay_scale_detail_id" id="payscale_detail_id">
    <div class="card">
        <div class="card-header">
            <div class="f-roboto"> Add New Gratuity User</div>
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
                    <input type="text" class="form-control" id="grade_name" name="grade_name" readonly>
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
                    <label>Gratuity Date</label>
                </div>
            </div>
            <div class="row text-center">

                <div class="col-md-4 form-group">
                    <input type="text" id="retd_date" name="retd_date" class="js-flatpickr form-control bg-white"
                        placeholder="Retire Date" required>
                </div>
              
                <div class="col-md-4">
                    <input type="text" id="gratuity_date" name="gratuity_date"
                        class="js-flatpickr form-control bg-white" placeholder="Gratuity Date" required>
                </div>
            </div>
            {{--  
            <div class="row">
                <div class="col-md-4">
                    <label>Percentage Basic Pay</label>
                </div>
                <div class="col-md-4">
                    <label>Madatory PF Per Taka</label>
                </div>
                <div class="col-md-4">
                    <label>Total Amount</label>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <input type="text" class="form-control" id="percentage_basic_pay" name="percentage_basic_pay"
                        required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="mandatory_pf_per_tk" name="mandatory_pf_per_tk"
                        required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly required>
                </div>
            </div>
             --}}
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
$('#mandatory_pf_per_tk').change(function() {
    var mandatory_pf_per_tk = $(this).val();
    var basic_pay = $('#last_basic_pay').val();
    var percentage = $('#percentage_basic_pay').val();
    var gratuity = Math.ceil((percentage / 100 * basic_pay) / 2 * mandatory_pf_per_tk);
    $('#total_amount').val(gratuity);
});
$('#percentage_basic_pay').change(function() {
    var mandatory_pf_per_tk = $('#mandatory_pf_per_tk').val();
    var basic_pay = $('#last_basic_pay').val();
    var percentage = $('#percentage_basic_pay').val();
    var gratuity = Math.ceil((percentage / 100 * basic_pay) / 2 * mandatory_pf_per_tk);
    $('#total_amount').val(gratuity);
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


</script>
@endpush