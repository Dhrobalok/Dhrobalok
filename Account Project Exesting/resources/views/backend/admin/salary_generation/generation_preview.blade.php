@extends('backend.admin.index')
@section('content')

<div class="card bg-white border-0">

    <div class="card-body">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class = "f-100">{{ $company -> company_name  }}</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <h4 class = "f-100">{{ $company -> company_address  }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="f-100 text-center text-uppercase">Pre generated Salary Sheet for the month of {{ $month }}
                    {{ $year }}
                </h4>
                <input type="hidden" id="year" value="{{ $year }}">
                <input type="hidden" id="month" value="{{ $month }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered table-striped table-sm text-center text-black">
                    <thead>
                        <tr>

                            <th colspan="6">Addition</th>

                            <th colspan="6">Deduction</th>

                        </tr>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Employee</th>
                            <th>Basic</th>
                            <th>House Rent Allowance</th>
                            <th>Health Allowance</th>
                            <th>Education Allowance</th>
                            <th>Bonus</th>
                            <th>Total</th>
                            <th>Provident Fund</th>
                            <th>House Loan</th>
                          
                            <th>Total</th>
                            <th>Net</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 0; $grand_total = 0;@endphp
                        @foreach($employees as $employee)
                        @php $total_addition = 0; $total_deduction = 0; @endphp
                        @php
                            $pf_contribution=App\Models\EmployeePFContributionRate::where('employee_id',$employee->employee_id)->first();
                            
                       // $pf_contribution = $employee -> employee_info -> getEmployeePFAmount -> contributed_amount;
                        @endphp

                           
                        <tr>
                            @php
                               // $emplye=App\Models\Employee::find($employee->employee_id);
                                 $segments =  $employee -> employee_info -> segment_wise_amount;
                                 @endphp
                            @php $sl = $sl + 1;
                            // $pf=App\Models\EmployeePFContributionRate::get();
                            $salary=App\Models\EmployeePayScale::where('employee_id',$employee->employee_id)->first();
                           
                            //$employee -> employee_info -> cale_detailpayscale -> pays -> salary_amount;
                            $basic_salary=App\Models\PayScaleDetails::where('id',$salary->payscale_details_id)->first();
                           
                            $employee_info = $employee -> employee_info;
                           // $basic_salary = $employee_info -> payscale -> payscale_detail -> salary_amount;
                            $hasBonus = $employee_info -> hasBonus;
                            
                            $bonus = 0;
                            if(!is_null($hasBonus))
                            {
                                $bonus = ceil(($hasBonus -> bonus_percentage * $basic_salary->salary_amount) / 100.00);
                            }
                            $emi = $employee_info -> getMonthlyEMI ? $employee_info -> getMonthlyEMI  -> emi : 0;
                            $total_addition = $basic_salary->salary_amount + $segments[0] -> amount + $segments[1] -> amount +
                            $segments[2] -> amount + $bonus;

                            /*
                    
                            if (!$pf_contribution)
                             {
                                $total_deduction = $emi + 0;
                                
                            }
                            else {
                                $total_deduction = $emi + $pf_contribution->contributed_amount;
                                # code...
                            }
                           
                             */
                          


                              
                           
                            @endphp

                               
                            <td>{{ $sl }}</td>
                            <td>{{ $employee -> employee_info ->  name }}</td>
                            <td>{{ $basic_salary->salary_amount }}</td>

                            <td>{{ $segments[0] -> amount }}</td>
                            <td>{{ $segments[1] -> amount }}</td>
                            <td>{{ $segments[2] -> amount }}</td>
                            <td>{{ $bonus }}</td>
                            <td>{{ $total_addition }}</td>

                            @php
                        $pf_r=(10/100)*$basic_salary->salary_amount;
                        $pf_r_deduction = $emi + $pf_r;
                    @endphp

                    @if(!$pf_contribution)

                    <td style = "text-align:right">{{  $pf_r }}</td>
                    <td style = "text-align:right">{{ $emi }}</td>
                    
                    <td style = "text-align:right">{{ $total_deduction }}</td>
                    <td style = "text-align:right">{{ $total_addition - $pf_r_deduction }}</td>
                    @php $grand_total = $grand_total + ($total_addition - $pf_r_deduction); @endphp

                    @else
                    <td style = "text-align:right">{{ $pf_contribution->contributed_amount }}</td>
                    <td style = "text-align:right">{{ $emi }}</td>
                    
                    <td style = "text-align:right">{{ $total_deduction }}</td>
                    <td style = "text-align:right">{{ $total_addition - $total_deduction }}</td>
                    @php $grand_total = $grand_total + ($total_addition - $total_deduction); @endphp



                        
                    @endif
                   
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="11" style="text-align:right"><b>Grand Total </b></td>
                            <td><b>{{ $grand_total }}</b></td>
                            <input type="hidden" id="grand_total" value="{{ $grand_total }}">

                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="btn-group">
                    <button type = "button" class="btn  f-100 mr-2" style="background:#0000ee;color:white"
                        id="generate_salary">Generate</button>
                    

                    <a class="btn  f-100" style="background:#1dbf73;color:white" href = "{{ route('admin.salary.preview.download',['month' => $month,'year' => $year]) }}"
                        ><i class = "fa fa-file-pdf mr-2"></i>PDF</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('css')
<style>
.table td,
tr,
thead th {
    font-size: 18px;
}
</style>
@endpush
@push('js')
<script>
$('#generate_salary').click(function() {

    Swal.fire({
        title: 'Are you sure to procced on that action?',
        showCancelButton: true,
        confirmButtonText: 'Confirm',

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('admin.generate-salary') }}",
                type: "post",
                data: {
                    year: $('#year').val(),
                    month: $("#month").val(),
                    grand_total: $("#grand_total").val()
                },
                success: function(response) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
});
</script>
@endpush
@push('css')
<style>
.card {
    min-width: auto;

}

tr,
td,
th {
    font-size: 15px;
}
</style>
@endpush