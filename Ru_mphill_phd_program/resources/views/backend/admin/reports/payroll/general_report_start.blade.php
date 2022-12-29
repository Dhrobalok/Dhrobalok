@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class = "f-roboto">Payroll Report</div>
                </div>
                <div class="card-body bg-white">
                    <form method="post" action="{{ route('download-payroll-report') }}">
                        @csrf
                        <div class="row">
                          <div class="col-md-2">
                            <label>Year</label>
                          </div>
                          <div class="col-md-3">
                            <label>Month</label>
                          </div>
                          <div class="col-md-4">
                           <label>Report Type</label>
                          </div>
                          <div class="col-md-3" style = "display:none" id = "employee_label">
                           <label>Select Employee</label>
                          </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <select class="form-control" name="year">
                                    @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="month">
                                    @for($month = 1 ; $month <= 12; $month++) @php
                                        $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                        value="{{ $month_name }}">{{ $month_name }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="report_type" id = "report_type">
                                   <option value = "none">Select Type</option>
                                   <option value = "salary_bill_dept">Salary Bill(Dept. Wise)</option>
                                   <option value = "salary_bill_class">Salary Bill(Class Wise)</option>
                                   <option value = "bank_advice_dept">Bank Advice(Dept. Wise)</option>
                                   <option value = "bank_advice_class">Bank Advice(Class Wise)</option>
                                   <option value = "individual_payslip">Individual Payslip</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="item_id" id = "item_id">
                                  
                                </select>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                           <div class="col-md-7">
                              <button type = "submit" class = "btn btn-danger f-100"><i class = "fa fa-file-pdf mr-2"></i>Print</button>
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
   $(document).ready(function(){

       $('#report_type').on('change',function(){
           
           $.ajax({
               url : "{{ route('ajax.payroll-report-options') }}",
               type : "get",
               data:
               {
                   report_type : $('#report_type').val()
               },
               success:function(options)
               {
                   $('#item_id').html(options);
               }
           });
       });
   })
</script>
@endpush