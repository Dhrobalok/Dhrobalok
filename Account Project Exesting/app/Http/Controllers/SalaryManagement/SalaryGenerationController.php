<?php

namespace App\Http\Controllers\SalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaryGenerate;
use Auth;
use App\Models\SegmentWiseSalaryDistribution;
use App\Models\EmployeeSalary;
use App\Models\Employee;
use App\Models\SalarySegment;
use App\Models\EmployeeSalaryDetails;
use App\Models\ProvidentFundContribution;
use App\Models\CompanySettings;
use App\Models\AccountSetup;
use App\Http\Controllers\Helper\HelperController;
use App\Models\EmployeePayScale;
use App\Models\EmployeePFContributionRate;
use App\Models\PayScaleDetails;
use App\Models\PFRecord;
use Carbon\Carbon;
use App\Models\Gratuity;


/**
 * This controller helps us to maintain salary generation proccess.
 *
 * This is just a sub part of salary management
 */
class SalaryGenerationController extends Controller
{
    public function index()
    {
        /**
         * This function is used for rendering all generated salary sheets.
         * @param Required no parameters.
         * @return view object contains a list salary sheets according to year and monthly basis.
         */
        $salary_sheets = SalaryGenerate :: all();
        return view('backend.admin.salary_generation.index',['salary_sheets' => $salary_sheets]);
    }

    public function generate_preview(Request $request)
    {

        //return $request;
        /**
         * This function is used for rendering pre generated salary sheet on the basis of year and month.
         * @param Required two parameters called the year & month for which you want to preview the salary sheet.
         * @return view page contains a table that describes pre-generated salary sheet for the specific month an year.
         */
        $employees = SegmentWiseSalaryDistribution :: select('employee_id')
                     ->groupBy('employee_id')
                     ->get();

        $year = $request -> year;
        $month = $request -> month;
        $company = CompanySettings :: find(1);
        return view('backend.admin.salary_generation.generation_preview',['employees' => $employees,'year' => $year,'month' => $month,'company' => $company]);
    }
    public function generate(Request $request)
    {
        
        $employee_id=Auth :: user() -> id;
        $employee_details=Employee::where('user_id',$employee_id)->first();
        $datework=Carbon::createFromDate($employee_details->joining_date);
        $now = Carbon::now();
        $testdate = $datework->diffInMonths($now);
        $month_varify=$testdate % 6;
        if($testdate>=6 && $month_varify==0)
        {
            
                   $yearName =$now->format('Y');
                   $monthName =$now->format('F');
                   $gratutity=new Gratuity;
                   $gratutity->employee_id=$employee_id;
                   $gratutity->contribution=$employee_details->payscale;
                   $gratutity->month=$monthName;
                   $gratutity->year=$yearName;
                   $gratutity->save();
          
        }
       
       
        /**
         * This function is mainly used to generate salary sheet on year and monthly basis.
         * @param Required two parameters called year and month for which you generate the salary sheets.
         * @return a warning message if salary sheet already generated for that specific month and year. Otherwise it generates salary sheet and return a success message in string format.
         */
        $helper = new HelperController();
        $account_setup = AccountSetup :: find(1);
        $pf_contribution_accounts = explode(",",$account_setup -> provident_fund_accounts);
        $salary_accounts = explode(",",$account_setup -> salary_accounts);
        $house_building_loan_accounts = explode(",",$account_setup -> house_build_loans_accounts);
        $employees = SegmentWiseSalaryDistribution :: select('employee_id')
                     ->groupBy('employee_id')
                     ->get();
        $year = $request -> year;
        $month = $request -> month;
        $total=$request -> grand_total;
        $already_generate = SalaryGenerate :: where('year',$year)
                            ->where('month',$month)
                            ->first();
        if($already_generate != null)
        {
            return 'Salary already generated';
        }
        $NewSalary = new SalaryGenerate();
        $NewSalary -> year = $year;
        $NewSalary -> month = $month;
        $NewSalary -> generate_date = date('Y/m/d');
        $NewSalary -> generated_by = Auth :: user() -> id;
        $NewSalary -> grand_total_salary = $total;
        $NewSalary -> save();
         /*
        $employee_id=Auth :: user() -> id;
        $employee_details=Employee::where('user_id',$employee_id)->first();
        $datework=Carbon::createFromDate($employee_details->joining_date);
        $now = Carbon::now();
        return $testdate = $datework->diffInYears($now);
        */

      //  return Carbon::now();

        $salary_generated_id = $NewSalary -> id;

        $total_payable_amount = 0;
        $gross_salary_total = 0;
        $total_pf_contribution = 0;
        $total_received_interest = 0;
        $total_loan_repayment = 0;
        $total_pf_r=0;
        $employee_c=0;
        $company_c=0;

        foreach($employees as $employee)
        {
              

           
            $salary=EmployeePayScale::where('employee_id',$employee->employee_id)->first();
            $basic_salary=PayScaleDetails::where('id',$salary->payscale_details_id)->first();
            $epc=new EmployeePFContributionRate;
          
            $epc->employee_id=$employee->employee_id;
            $epc->pf_contribution_rate = 10;
            $epc->contributed_amount=(10/100)*$basic_salary->salary_amount;
            $epc->save();

            $pfr=new PFRecord;
            
             $pfr->employee_id=$employee->employee_id;
             $pfr->month=$month;
             $pfr->year=$year;
             $employee_c=(10/100)*$basic_salary->salary_amount;
             $company_c=(8.33/100)*$basic_salary->salary_amount;
             $total_pf_r=$employee_c+$company_c;
             $pfr->p_f_amount=$total_pf_r;
             $pfr->save();


            $pf_contribution=EmployeePFContributionRate::where('employee_id',$employee->employee_id)->first();
           // $pf_contribution=EmployeePFContributionRate::where('employee_id',$employee->employee_id)->first();


           // $basic_salary = $employee_info -> payscale -> payscale_detail -> salary_amount;
            //$pf_contribution = $employee_info -> getEmployeePFAmount -> contributed_amount;
            $employee_info = $employee -> employee_info;

            $emi = $employee_info -> getMonthlyEMI;
            $hasBonus = $employee_info -> hasBonus;
            $bonus = 0;
            $emi_amount = 0;
            $bonus_segment_id = 0;
            if(!is_null($emi))
            {
                $emi_amount = $emi -> emi;
                $interest = $emi -> interest;
                $loan_repayment = $emi -> repayment;
                $total_received_interest += $interest;
                $total_loan_repayment += $loan_repayment;
                $emi -> status = 1;
                $emi -> save();
            }
            if($pf_contribution->contributed_amount != 0)
            {
                $new_pf_contribution = new ProvidentFundContribution();
                $new_pf_contribution -> employee_id  = $employee_info -> id;
                $new_pf_contribution -> month = $month;
                $new_pf_contribution -> year = $year;
                $employee_c=(10/100)*$basic_salary->salary_amount;
                $company_c=(8.33/100)*$basic_salary->salary_amount;
                $total_pf_r=$employee_c+$company_c;
                $new_pf_contribution -> pf_amount = $total_pf_r;
                //$new_pf_contribution -> pf_amount = $pf_contribution->contributed_amount * 2;
                $new_pf_contribution -> date = date('Y/m/d');
                $new_pf_contribution -> is_auto = 0;
                $new_pf_contribution -> save();

                $total_pf_contribution += $pf_contribution->contributed_amount;
            }
            if(!is_null($hasBonus))
            {
                $bonus = ceil(($basic_salary->salary_amount * $hasBonus -> bonus_percentage) / 100.00);
                $festival = $hasBonus -> getFestival;
                $bonus_segment_id =  $festival -> segment_id;
                $hasBonus -> status = 0;
                $hasBonus -> save();
                $festival -> status = 0;
                $festival -> save();
            }

            $added_amount = $this -> calculateAddAmount($employee_info) + $bonus;
            $deduction_amount = $this -> calculateDeductionAmount($employee_info) + $pf_contribution->contributed_amount + $emi_amount;

            $gross_salary_total += $added_amount;
            $total_payable_amount += ($added_amount - $deduction_amount) + $basic_salary->salary_amount;;
            $employee_salary = new EmployeeSalary();
            $employee_salary -> salary_generate_id = $salary_generated_id;
            $employee_salary -> employee_id = $employee_info -> id;
            $employee_salary -> department_id = $employee_info -> department -> id;
            $employee_salary -> class_id = $employee_info -> payScale -> grade_id;
            $employee_salary -> basic_salary = $basic_salary->salary_amount;
            $employee_salary -> employee_payscale_id = $employee_info -> payScale -> payscale_id;
            $employee_salary -> total_add_amount = $added_amount + $basic_salary->salary_amount;;
            $employee_salary -> total_deduction_amount = $deduction_amount;
            $employee_salary -> net_amount = ($added_amount - $deduction_amount) + $basic_salary->salary_amount;;
            $employee_salary -> save();

            foreach($employee -> employee_info -> segment_wise_amount as $segment)
            {
                $new_salary_detail = new EmployeeSalaryDetails();
                $new_salary_detail -> employee_salary_id = $employee_salary -> id;
                $new_salary_detail -> salary_generate_id = $NewSalary -> id;
                $new_salary_detail -> employee_id = $employee -> employee_info -> id;
                $new_salary_detail -> segment_id = $segment -> salary_segment_id;
                if($bonus_segment_id == $segment -> salary_segment_id)
                {
                    $new_salary_detail -> amount = $bonus;
                    $new_salary_detail -> save();
                    continue;
                }
                if($segment -> salary_segment_id == 7)
                {
                    $new_salary_detail -> amount  = $pf_contribution;
                    $new_salary_detail -> save();
                    continue;
                }
                if($segment -> salary_segment_id == 8)
                {
                    $new_salary_detail -> amount  = $emi_amount;
                    $new_salary_detail -> save();
                    continue;
                }

                $new_salary_detail -> amount = $segment -> amount;
                $new_salary_detail -> save();
            }
        }

        $UpdateNewsalary = SalaryGenerate :: find($salary_generated_id);
        $NewSalary -> grand_total_salary = $total_payable_amount;
        $NewSalary -> save();

        //Saving the salary amount as institute expense into the ledger
        $helper -> saveInLedgerWithoutVoucher($salary_accounts[0],$gross_salary_total,1);
        $helper -> saveInLedgerWithoutVoucher($salary_accounts[1],$total_payable_amount,0);
        //Save the transaction into the cashbook record for salary transaction
        $helper -> saveInCashBookWithoutVoucher($salary_accounts[0],$total_payable_amount,0,1);
        //...................................................
        //Saving the provident fund entries into the ledger for employer contribution
        $helper -> saveInLedgerWithoutVoucher($pf_contribution_accounts[0],$total_pf_contribution,1);
        $helper -> saveInLedgerWithoutVoucher($pf_contribution_accounts[1],$total_pf_contribution,0);

        //Saving the provident fund contribution entries into the ledger for the employees contribution
        $helper -> saveInLedgerWithoutVoucher($salary_accounts[1],$total_pf_contribution,0);

        //Now transfer the pf contribution from operational account to pf account
        $helper -> saveInLedgerWithoutVoucher($pf_contribution_accounts[2],$total_pf_contribution * 2,1);

        //Saving the interest receive and repayment entries into the ledger
        $helper -> saveInLedgerWithoutVoucher($house_building_loan_accounts[0],$total_received_interest,1);
        $helper -> saveInLedgerWithoutVoucher($house_building_loan_accounts[1],$total_received_interest,0);
        $helper -> saveInCashBookWithoutVoucher($house_building_loan_accounts[1],$total_received_interest,1,1);

        //Receive loan repayment entries
        $helper -> saveInLedgerWithoutVoucher($house_building_loan_accounts[0],$total_loan_repayment,1);
        $helper -> saveInLedgerWithoutVoucher($house_building_loan_accounts[3],$total_loan_repayment,0);
        $helper -> saveInCashBookWithoutVoucher($house_building_loan_accounts[3],$total_loan_repayment,1,1);

        return 'Salary successfully generated';
    }

    public function calculateAddAmount(Employee $employee)
    {
        /**
         * This function is used for calculating summation over addition type salary segments.
         * @param Required an employee instance.
         * @return calculated summend amount.
         */
        $segments = $employee -> segment_wise_amount;
        $amount = 0;

        foreach($segments as $segment)
        {
            $segment_info = SalarySegment :: find($segment -> salary_segment_id);
            if($segment_info -> type -> type == 'add')
              $amount += $segment -> amount;
        }

        return $amount;
    }
    public function calculateDeductionAmount(Employee $employee)
    {
        /**
         * This function is used for calculating summation over deduction type salary segments.
         * @param Required an employee instance.
         * @return calculated summend amount.
         */
        $segments = $employee -> segment_wise_amount;
        $amount = 0;

        foreach($segments as $segment)
        {
            if($segment -> salary_segment_id == 7 || $segment -> salary_segment_id == 8)
              continue;
            $segment_info = SalarySegment :: find($segment -> salary_segment_id);
            if($segment_info -> type -> type == 'deduction')
              $amount += $segment -> amount;
        }
        return $amount;
    }

    public function downloadPreviewSalaryPdf($month,$year)
    {
       // return "raj it jhfg";
        $employees = SegmentWiseSalaryDistribution :: select('employee_id')
        ->groupBy('employee_id')
        ->get();
        $company = CompanySettings :: find(1);
        $content =  view('backend.admin.salary_generation.preview_salary_sheet_pdf',['employees' => $employees,'month' => $month,'year' => $year,'company' => $company]);
        $pdf = new \Mpdf\Mpdf();
        $pdf -> WriteHtml($content);
        $pdf -> output('salary-sheet-preview-'.$month.'-'.$year.'.pdf','D');
    }
}
