<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\PayScale;
use App\Models\EmployeePayScale;
use App\Models\HouseBuildingLoan;
use App\Models\Employee;
use App\Models\ChartOfAccount;
use App\Models\ChequeBook;
use App\Models\ChequeBookPage;
use App\Models\PayScaleDetails;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\CostCenter;
use App\Models\CostCenterType;
use App\Models\CashBook;
use App\Models\Department;
use App\Models\EmployeeType;
use MathPHP\Finance;
/**
 * This controller helps us to maintain some ajax related operations.
 * Such as payscale list generation in html format, generation payscale details list generation in html format etc.
 */
class AjaxController extends Controller
{
    public function payscales(Request $request)
    {
       /**
        * This function is used to generate payscale list in html format. In details it convert a list of payscales into a list of options.[Example : <option>First Payscale</option> <option>Second Payscale</option> etc.]
        *@param Required only one parameter called grade id.
        *@return a list of payscale options in html format.
        */
        $grade = Grade :: find($request -> grade_id);
        $payscales = $grade -> payscales;
        return $this -> generate_payscales($payscales);
    }

    public function generate_payscales($data)
    {
        /**
        * This function is helper function to generate payscale options on the basis of list of payscales.
        *@param A list of payscales. 
        *
        *@return a list of payscale options in html format.
        */
        $options = '<option>Select Payscale</option>';

        foreach($data as $option)
        {
            $options .= '<option value = "'.$option -> id.'">'.$option -> name.'</option>';
        }

        return $options;
    }
    public function payscale_details(Request $request)
    {
         /**
        * This function is used to generate payscale details list in html format. In details it convert a list of payscales details into a list of options.[Example : <option>First Payscale Detail</option> <option>Second Payscale Detail</option> etc.]
        *@param Required only one parameter called payscale id.
        *@return a list of payscale details options in html format.
        */
        $payscale = PayScale :: find($request -> payscale_id);
        $details = $payscale -> details;
        return $this -> generate_payscale_details($details);
    }

    public function generate_payscale_details($data)
    {
        /**
        * This function is helper function to generate payscale details options on the basis of list of payscales detail.
        *@param A list of payscales details. 
        *
        *@return a list of payscale details options in html format.
        */
        $options = '<option>Select Basic Salary</option>';

        foreach($data as $option)
        {
            $options .= '<option value = "'.$option -> id.'">'.$option -> salary_amount.'</option>';
        }

        return $options;
    }
    public function loans(Request $request)
    {
        /**
         * This function helps us to find out all house building loan from the database. It works on the basis of searchTerm keyword which is provided from the user.
         * For account searching process, we use an js plugin called select2. For more details about select2, please visit at :
         * https://select2.org/.
         * @param Required only the search Term(Which describes loan reference no)
         * @return array of house building loans in json encoded format, which is used in select2 plugin data.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = HouseBuildingLoan :: all();
        else
        {
            $options = HouseBuildingLoan :: where('loan_ref_no','like','%'.$searchTerm.'%')
                                           ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> loan_ref_no);
        }
        return json_encode($data);
    }
    public function employees(Request $request)
    {
        /**
         * This function helps us to find out all employees from the database. It works on the basis of searchTerm keyword which is provided from the user.
         * For account searching process, we use an js plugin called select2. For more details about select2, please visit at :
         * https://select2.org/.
         * @param Required only the search Term(Which describes employee name)
         * @return array of employees in json encoded format, which is used in select2 plugin data.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = Employee :: all();
        else
        {
            $options = Employee :: where('name','like','%'.$searchTerm.'%')
                                           ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> name);
        }
        return json_encode($data);
    }

    public function get_accounts(Request $request)
    {
        $accounts = ChartOfAccount :: all();
        $applyType = $request -> applyType;
        return view('backend.admin.partial_pages.accounts_as_options',['accounts' => $accounts,'applyType' => $applyType]);
    }
    public function cheque_pages(Request $request)
    {
        //return $request;
        $account_id = $request -> credit_account;
        $bank_id = $request -> bank;
        $chequeBook = ChequeBook :: where('bank_id',$bank_id)
                      ->where('account_no',$account_id)
                      ->where('status',1)
                      ->first();
        if($chequeBook)
        {
            $pages = ChequeBookPage :: where('cheque_book_id',$chequeBook -> id)
                       ->where('status',ChequeBookStatus :: Active)
                       ->orderBy('id','ASC')
                       ->get();
            return view('backend.admin.partial_pages.cheque_pages_as_options',['pages' => $pages]);
        }
        else
        {
            return '<option value = "0">No cheque page available</option>';
        } 
    }
    public function add_transfer_entry()
    {
        $accounts = ChartOfAccount :: all();
        return view('backend.admin.partial_pages.add_transfer_entry',['accounts' => $accounts]);
    }
    public function getAccountsBasedOnSearchTerm(Request $request)
    {
        
          /**
         * This function helps us to find out all accounts from the database. It works on the basis of searchTerm keyword which is provided from the user.
         * For account searching process, we use an js plugin called select2. For more details about select2, please visit at :
         * https://select2.org/.
         * @param Required only the search Term(Which describes chart of account code no.)
         * @return array of chart of accounsts in json encoded format, which is used in select2 plugin data.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = ChartOfAccount::get();
        else
        {
            $options = ChartOfAccount :: where('description','like','%'.$searchTerm.'%')
                                       ->Orwhere('general_code','like','%'.$searchTerm.'%')
                                       ->Orwhere('name','like','%'.$searchTerm.'%')
                                       ->Orwhere('company_code','like','%'.$searchTerm.'%')
                                       ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> name.'('.$option -> general_code.')');
        }
        return json_encode($data);
    }

    public function calculateEMIList(Request $request)
    {
       $rate = $request -> rate;
       $principal_amount = $request -> principal_amount;
       $p_value = $principal_amount;
       $months = $request -> months;
       $emi = $request -> emi;
       $results = array();

       for($month = 1; $month <= $months; $month++)
       {
          $interest   = (-1.00) * Finance::ipmt($rate, $month, $months, $p_value,0);
          $principal_repay = (-1.00) * Finance::ppmt($rate, $month, $months, $p_value,0);
          $results[$month - 1]['month'] = $month;
          $results[$month - 1]['pm_begin'] = round($principal_amount,0);
          $results[$month - 1]['emi'] = $emi;
          $results[$month - 1]['interest'] = round($interest,0);
          $results[$month - 1]['repayment'] = round($principal_repay,0);
          $principal_amount -= $principal_repay;
          $results[$month - 1]['close_balance'] = round($principal_amount,0); 
       }
       return view('backend.admin.partial_pages.loan_payment_monthly_basis',['records' => $results]);
    }

    public function generateBudgetTable()
    {
        $accounts = ChartOfAccount :: all();
        return view('backend.admin.partial_pages.generate_budget_table',['accounts' => $accounts]);
    }

    public function getEmployeePayscale(Request $request)
    {
       
        $employee_id = $request -> employee_id;
        $employee = Employee :: find($employee_id);
        $payscale = $employee -> payScale;
        $grade_name = Grade :: find($payscale -> grade_id) -> name;
        $payscale_name = Payscale :: find($payscale -> payscale_id) -> name;
        $last_salary = PayScaleDetails :: find($payscale -> payscale_details_id) -> salary_amount;
        
        return array('grade_name' => $grade_name,'payscale_name' => $payscale_name,'last_salary' => $last_salary,
                      'grade_id' => $payscale -> grade_id,'payscale_id' => $payscale -> payscale_id,
                      'payscale_detail_id' => $payscale -> payscale_details_id);
    }

    public function getCostCenterOptions(Request $request)
    {
        $type = $request -> type;

        if($type == 'head')
            $options = CostCenterType :: all();
        else
            $options = CostCenter :: all();

        return view('backend.admin.partial_pages.generate_cost_center_options',['options' => $options]);
    }
    public function fetchCashBookRecords(Request $request)
    {
        $year = $request -> year;
        $month = $request -> month;
        $month_name=date('F', mktime(0, 0, 0,$month, 10));
        $prefix = $month > 9 ? "" : "0";
        $search_term = "".$year."-".$prefix.$month;
        $debit_entries  = CashBook :: where('transaction_date','like',$search_term.'%')
                    ->where('bank_amount','!=',0)
                    ->where('entry_position','Debit')
                    ->orderBy('transaction_date','asc')
                    ->get();
        $credit_entries  = CashBook :: where('transaction_date','like',$search_term.'%')
                    ->where('bank_amount','!=',0)
                    ->where('entry_position','Credit')
                    ->orderBy('transaction_date','asc')
                    ->get();

        $current_balance = $credit_entries -> where('coa_id',NULL)
                                    ->where('entry_position','Credit')
                                    ->sum('bank_amount');

        $max_cnt = max([count($debit_entries),count($credit_entries)]);
        $debit_sum = $debit_entries->sum('bank_amount');
        return view('backend.admin.partial_pages.cash_book_records_as_per_query',['debit_entries' => $debit_entries,'credit_entries' => $credit_entries,'year' => $year,'month' => $month_name,'debit_sum' => $debit_sum,'current_balance' => $current_balance,'max_cnt' => $max_cnt]);
        
    }
    public function cashBookAdjustmentEntry(Request $request)
    {
       return view('backend.admin.partial_pages.cashbook_adjustment_entry',['type' => $request -> type,'isBank' => $request -> isBank]);
    }

    public function getPayrollReportOptions(Request $request)
    {
        $report_type = $request -> report_type;
        if($report_type == 'bank_advice_dept' || $report_type == 'salary_bill_dept')
            $options = Department :: all();
        else if($report_type == 'bank_advice_class' || $report_type == 'salary_bill_class')
            $options = EmployeeType :: all();
        else if($report_type == 'individual_payslip')
            $options = Employee :: all();
         
        return view('backend.admin.partial_pages.payroll_report_options',['options' => $options]);
    }
}
