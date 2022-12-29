<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvidentFundProcess;
use App\Models\ProvidentFundContribution;
use App\Models\ProvidentFundLoan;
use App\Models\ProvidentFundProcessDetail;
use App\Models\Employee;
use App\Models\EmployeePayScale;
use Auth;
use Illuminate\Support\Facades\DB;

/**
 * This controller helps us to process a provident fund.
 */
class ProvidentFundProcessController extends Controller
{
    public function save_pf_process(Request $request)
    {


        /**
         * This function is used to process a provident fund.
         * @param Required five parameters called employee id,interest rate,month,year and user id.
         * @return success message in string format.
         */
        $employee_id = $request -> employee_id;

        $employee = Employee :: find($employee_id);
        $employee_rate = $request ->e_rate;
        $company_rate = $request ->c_rate;
        $month = $request ->month;
        $year = $request ->year;
        $process_by = Auth :: user() -> id;
        $process_date = date('Y/m/d');

        $pf_contribution = ProvidentFundContribution :: where('employee_id',$employee_id)
                                    ->where('year',$year)
                                    ->where('month',$month)
                                    ->first();
        if(is_null($pf_contribution))
         return 'Employee has no contribution within that year and month';

/*
        $newProvidentFundProcess = new ProvidentFundProcess();
        $newProvidentFundProcess -> process_date = $process_date;
        $newProvidentFundProcess -> process_by = $process_by;
        $newProvidentFundProcess -> e_rate =  $employee_rate;
        $newProvidentFundProcess -> c_rate =  $company_rate;
        $newProvidentFundProcess -> year = $year;
        $newProvidentFundProcess -> month = $month;
        return $newProvidentFundProcess->save();
        */

           $newProvidentFundProcess = ProvidentFundProcess :: create([
            'process_date' => $process_date,
            'process_by'=>$process_by,
            'e_rate'=>$employee_rate,
            'c_rate' => $company_rate,
            'year' => $year,
            'month' => $month,



       ]);








        //Get the info about the employee and payscale
        $employee = Employee :: find($employee_id);
       // return $employee->id;


        $employee_payscale =  EmployeePayScale::where('employee_id',$employee->id)->first();
       // $employee_payscale = $employee -> payscale;



        //Get the loan details
        $pf_loan = ProvidentFundLoan :: where('employee_id',$employee_id)
                                        ->where('status',1)
                                        ->first();
        //Get the last transaction
        $last_entry =  ProvidentFundProcessDetail :: where('employee_id',$employee_id)
                                                   ->orderBy('id','DESC')
                                                   ->first();

        $pf_amount =  $pf_contribution == null ? 0 : $pf_contribution -> pf_amount;

        $opening_balance = $last_entry == null ? 0 : $last_entry -> closing_balance;
        $loan_amount = $pf_loan == null ? 0 : $pf_loan -> loan_amount;
        $closing_balance = ($opening_balance + $pf_amount) - $loan_amount;

        $newDetails = new ProvidentFundProcessDetail();
        $newDetails -> employee_id = $employee_id;
        $newDetails -> pf_process_id = $newProvidentFundProcess -> id;
        $newDetails -> employee_payscale_id =  $employee_payscale -> id;
        $newDetails -> basic_pay = $employee_payscale -> payscale_detail -> salary_amount;
        $newDetails -> pf_amount = $pf_amount;
        $newDetails -> year = $year;
        $newDetails -> month = $month;
        $newDetails -> loan_amount = $loan_amount;
        $newDetails -> e_rate = $employee_rate;
        $newDetails -> c_rate = $company_rate;
        $newDetails -> opening_balance = $opening_balance;
        $newDetails -> closing_balance = $closing_balance;
        $newDetails -> pf_date = $pf_contribution -> date;
        $e_interest_amount = round(($closing_balance * $employee_rate) / 1200.00,2);
        $c_interest_amount=  round(($closing_balance * $company_rate) / 1200.00,2);
        $newDetails -> interest_amount= $e_interest_amount+ $c_interest_amount;
        $newDetails->save();

        return 'Provident fund processed successfully';
    }
}
