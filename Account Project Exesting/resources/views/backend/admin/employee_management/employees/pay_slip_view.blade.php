@extends('backend.admin.index')
@section('content')

@php $generate_info = $salary_generate -> generate_info;
     $employee_info = $salary_generate -> employee;
	 $basic_salary = $employee_info -> payscale -> payscale_detail -> salary_amount;
     $bonus = $employee_info -> hasBonus == null ? 0 : (($basic_salary * $employee_info -> hasBonus -> bonus_percentage) / 100.00);
     $loan = $employee_info -> has_home_loan == null ? 0 : $employee_info -> has_home_loan -> monthly_deduction;
@endphp
	<div class="container bg-white">
	
			<h4 class = "text-center f-100"><b><u>Pay Slip for the period of {{ $generate_info -> month }} {{ $generate_info -> year }}</u></b></h4>
			
		
		
		<table class="table table-bordered bg-light">
			<thead>
               
				<tr>
					<th style = "border:none"><b>Employee Reg No : </b></th>
					<th style = "border:none">{{ $employee_info -> employee_reg_id }}</th>
					<th style = "border:none"><b>Name : </b></th>
					<th style = "border:none">{{ $employee_info -> name }}</th>
				</tr>
				<tr style = "border:none">
					<th style = "border:none"><b>Department : </b></th>
					<th style = "border:none">{{ $employee_info -> department -> name }}</th>
					<th style = "border:none"><b>Designation : </b></th>
					<th style = "border:none">{{ $employee_info -> designation -> name }}</th>
				</tr>
				<tr style = "border:none">
					<th style = "border:none;"><b>Pay Date :</b> </th>
					<th style = "border:none">{{ date('Y-m-d') }}</th>
					<th style = "border:none"><b>Date of Joining :</b> </th>
					<th style = "border:none">{{ $employee_info -> joining_date }}</th>
				</tr>
				<tr style = "border:none">
					<th style = "border:none"><b>Account Number : </b></th>
					<th style = "border:none">{{ $employee_info -> account_no }}</th>
					
				</tr>
				
			</thead>
		</table>
          <br>
		  @php $segments = $salary_generate -> details; @endphp
		  @php $provident_fund = $employee_info -> provident_contribution;
        $provident_fund_amount = 0;
        if($provident_fund == null)
        $provident_fund_amount = 0;
        else if($provident_fund[0] -> is_auto == 1)
        $provident_fund_amount = $provident_fund[0] -> pf_amount;
        else if($provident_fund[0] -> month == $generate_info -> month  && $provident_fund[0] -> year == $generate_info -> year)
        $provident_fund_amount = $provident_fund[0] -> pf_amount;
    
        @endphp
		<table class="table bg-light">
			<thead>
               
				<tr>
					<th><b>Earnings</b></th>
					<th><b>Amount</b></th>
					<th><b>Deductions</b></th>
					<th><b>Amount</b></th>
				</tr>
				<tr>
					<th>Basic Salary</th>
					<th>{{ $salary_generate -> basic_salary }}</th>
					<th>Provident Fund</th>
					<th>{{ $provident_fund_amount }}</th>
					
				</tr>
				<tr>
					<th>House Rent Fee</th>
					<th>{{ $segments[0] -> amount }}</th>
					<th>Home Building Loan</th>
					<th>{{ $segments[7] -> amount }}</th>
					
				</tr>
				<tr>
					<th>Education Fee</th>
					<th>{{ $segments[2] -> amount }}</th>
					
				</tr>
				<tr>
					<th>Health Fee</th>
					<th>{{ $segments[1] -> amount }}</th>
					
				</tr>
				<tr>
					<th>Bonus</th>
					<th>{{ $bonus }}</th>
					<th></th>
					<th></th>
				</tr>
				
				<tr>
					<th><b>Total Earnings</b></th>
					<th><b>{{ $salary_generate -> total_add_amount }}</b></th>
					<th><b>Total Deductions</b></th>
					<th><b>{{ $salary_generate -> total_deduction_amount }}</b></th>
				</tr>
				<tr>
				<th></th>
				<th></th>
					<th colspan = "1"><b>Net Pay</b></th>
					
					<th><b>{{ $salary_generate -> net_amount }}</b></th>
				</tr>
			</thead>
		</table>
	</div>
@endsection