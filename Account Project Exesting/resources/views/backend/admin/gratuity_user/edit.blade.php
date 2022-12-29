@extends('backend.admin.index')

@section('content')
<!-- Page Content -->


        <form id="accounts_form_create" action="{{ route('admin.pension-users.update',['id' => $user -> id] ) }}" method="post">
            @csrf
            @method('PATCH')
           
            <div class="card">
                <div class="card-header">
                   <div class = "f-roboto"> Update Pension Receiver Info</div>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <input class="form-control" id="employee_id" name="employee_id" value = "{{ $user -> getEmployee -> name }}" readonly>
                                
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
                            <input type = "text" class="form-control" id="grade_name" name="grade_name" value = "{{ $user -> getGrade -> name }}" readonly>
                     </div>
                     <div class="col-md-4">
                            <input class="form-control" id="payscale_name" name="payscale_name" value = "{{ $user -> getPayScale -> name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="last_basic_pay" name="last_basic_pay" value = "{{ $user -> last_basic_pay }}" readonly required>
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
                                class="js-flatpickr form-control bg-white" placeholder="Retire Date" value = "{{ $user -> retd_date }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="total_service_year" name="total_service_year" value = "{{ $user -> total_service_year }}"
                                placeholder="Total Service Year" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="pension_start_date" name="pension_start_date"
                                class="js-flatpickr form-control bg-white" placeholder="Pension Start Date" value = "{{ $user -> pension_start_date }}" required>
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
                                name="percentage_basic_pay" value = "{{ $user -> percentage_basic_pay }}" required>                  
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="health_fee" name="health_fee" value = "{{ $user -> health_fee }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="basic_pension_amount" name="basic_pension_amount" value = "{{ $user -> basic_pension_amount }}" readonly required>
                        </div>
                    </div>
                    <div class="row text-center mt-3">
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary f-100 btn-sm">Update Record</button>
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

</script>
@endpush