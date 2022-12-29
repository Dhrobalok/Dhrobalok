<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Models\SalaryGenerate;
use App\Models\Employee;
use App\Models\EmployeeType;
use NumberToWords\NumberToWords;
use App\Models\VoucherMaster;
use App\Models\ProvidentFundProcessDetail;
use App\Models\Ledger;
use App\Models\Department;
use App\Models\HouseBuildingLoan;
use App\Exports\EmployeesExport;
use App\Models\CostCenter;
use App\Models\ChartOfAccount;
use App\Models\Budget;
use App\Models\BudgetAccounting;
use App\Models\CompanySettings;
use App\Models\BudgetAllocation;
use App\Models\AccountCategory;
use App\Http\Controllers\Helper\HelperController;
use App\Models\CashBook;
use App\Models\BulkOrder;
use App\Models\CostCenterType;
use App\Models\ReconciliationReport;
use Excel;
use DB;
use Carbon\Carbon;
/**
 * This controller helps us to generate different types of reports.
 *
 */
class ReportManager extends Controller
{
    public function download_salary_sheet($generate_id)
    {

        /**
         * This function just generate the salary sheet for a specific month and year basis.
         * @param Required only one parameter called generate id.[When we generate a salary sheet for a specific month and year, system generate an id for that. It is called generate id].
         * @return downloadable salary sheet in pdf format.
         */
        $SalaryGeneration = SalaryGenerate :: find($generate_id);
        $records = EmployeeSalary :: where('salary_generate_id',$generate_id)->get();
        $month = $records[0] -> generate_info -> month;
        $year = $records[0] -> generate_info -> year;
        $record = EmployeeSalary :: where('salary_generate_id',$generate_id)->first();
        $grand_total=$record->net_amount;
        $Inwords = new NumberToWords();
        $Inwords = $Inwords->getNumberTransformer('en');
        $Inwords = $Inwords->toWords($grand_total);

        $company = CompanySettings :: find(1);
        /*
        $Inwords = new NumberToWords();
        $Inwords = $Inwords->getNumberTransformer('en');
        $Inwords = $Inwords->toWords($grand_total);
        */
        $content = view('backend.admin.reports.salary_report',['records' => $records,'month' => $month,'year' => $year,'grand_total' => $grand_total,'Inwords' => $Inwords,'generate_id' => $generate_id,'company' => $company]);

        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('salary-sheet-'.$month.'-'.$year.'.pdf','D');
    }

    public function view_salary_sheet($generate_id)
    {

        /**
         * This function just generate the salary sheet for a specific month and year basis.
         * @param Required only one parameter called generate id.[When we generate a salary sheet for a specific month and year, system generate an id for that. It is called generate id].
         * @return salary sheet in html format.
         */
        $SalaryGeneration = SalaryGenerate :: find($generate_id);
       // $grand_total = $SalaryGeneration -> grand_total_salary;
      
        $records = EmployeeSalary :: where('salary_generate_id',$generate_id)->get();
        $record = EmployeeSalary :: where('salary_generate_id',$generate_id)->first();
        $grand_total=$record->net_amount;
        $Inwords = new NumberToWords();
        $Inwords = $Inwords->getNumberTransformer('en');
        $Inwords = $Inwords->toWords($grand_total);
        $month = $records[0] -> generate_info -> month;
        $year = $records[0] -> generate_info -> year;
        $company = CompanySettings :: find(1);
        return view('backend.admin.reports.salary_sheet_view',['records' => $records,'month' => $month,'year' => $year,'Inwords' => $Inwords,'grand_total' => $grand_total,'generate_id' => $generate_id,'company' => $company]);
    }

    public function download_bank_advice($generate_id)
    {

        /**
         * This function just generate the bank advice for a specific month and year basis.
         * @param Required only one parameter called generate id.[When we generate a salary sheet for a specific month and year, system generate an id for that. It is called generate id].
         * @return downloadable bank advice in pdf format.
         */
        $SalaryGeneration = SalaryGenerate :: find($generate_id);
        $records = EmployeeSalary :: where('salary_generate_id',$generate_id)->get();
        $month = $records[0] -> generate_info -> month;
        $year = $records[0] -> generate_info -> year;
        $grand_total = $SalaryGeneration -> grand_total_salary;
        $Inwords = new NumberToWords();
        $Inwords = $Inwords->getNumberTransformer('en');
        $Inwords = $Inwords->toWords($grand_total);
        $content = view('backend.admin.reports.bank_advice',['records' => $records,'month' => $month,'year' => $year,'grand_total' => $grand_total,'Inwords' => $Inwords]);

        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('bank-advice-'.$month.'-'.$year.'.pdf','D');
    }

    public function trial_balance_report_start()
    {
        /**
         * This function is used to render trial balance report page and serve to the frontend for taking some parameters.
         * @param Required no parameters.
         * @return view object contains trial balance report query page.
         */
        $company = CompanySettings :: find(1);
        $accounts = Ledger :: distinct()  -> get(['coa_id']);
        return view('backend.admin.reports.accounts.trial_balance_report_start',['company' => $company,'accounts' => $accounts]);
        /*
        $bulk_order=BulkOrder::all();
     
        if($bulk_order)
        {
            session()->put('id',1);
            return view('backend.admin.reports.accounts.trial_balance_report_start',['company' => $company,'accounts' => $accounts,'bulk'=>$bulk_order]);

        }
        else
        {
            return view('backend.admin.reports.accounts.trial_balance_report_start',['company' => $company,'accounts' => $accounts]);

        } 


       // return view('backend.admin.reports.accounts.trial_balance_report_start',['company' => $company,'accounts' => $accounts,'bulk'=>$bulk_order]);
       */
    }

    public function  trial_balance_pdf(Request $request)
    {
  
        /**
         * This function takes two date and genearte trial balance report within that duration.
         * @param Required two parameters called start date and end date for which you want to generate trial balance report.
         * @return downloadable trial balance report in pdf format.
         */
        $company = CompanySettings :: find(1);

        $accounts = Ledger :: distinct()  -> get(['coa_id']);
        $bulk_order=BulkOrder::all();
        $content = view('backend.admin.reports.trial_balance',['accounts' => $accounts,'company' => $company,'bulk'=> $bulk_order]);
        $trial_balance = new \Mpdf\Mpdf(['margin_header' => -10]);
        $trial_balance -> WriteHtml($content);
        $trial_balance -> output('Trial-balance-report-at-'.now().'.pdf','D');
    }

    public function view_balance_sheet()
    {

        $types = array('Asset','Liability','Equity');
        $group_accounts = array();
        $filltered_accounts = array();
        $account_categories = AccountCategory :: all();
        $accounts = ChartOfAccount :: all();

        foreach($account_categories as $account_category)
        {
            if($account_category -> category_type == 'Asset')
             $group_accounts['Asset'][] = $account_category -> category_name;
            else if($account_category -> category_type == 'Liability')
             $group_accounts['Liability'][] = $account_category -> category_name;
            else if($account_category -> category_type == 'Equity')
             $group_accounts['Equity'][] = $account_category -> category_name;
        }



        foreach($accounts as $account)
        {
            for($i = 0; $i < 3; $i++)
            {
                $isFound = false;
                foreach($group_accounts[$types[$i]] as $category)
                {
                  if($account -> account_category -> category_name  == $category)
                  {
                     $filltered_accounts[$category][] = $account;
                     $isFound = true;
                     break;
                  }
                }

                if($isFound)
                 break;
            }
        }


        $company = CompanySettings :: find(1);
        return view('backend.admin.reports.accounts.balance_sheet_preview',['company' => $company,'group_accounts' => $group_accounts,
                     'filltered_accounts' => $filltered_accounts]);
    }

    public function generate_balance_sheet()
    {
        /**
         * This function takes two date and genearte  balance sheet report within that duration.
         * @param Required two parameters called start date and end date for which you want to generate trial balance report.
         * @return downloadable balance sheet report in pdf format.
         */

        $types = array('Asset','Liability','Equity');
        $group_accounts = array();
        $filltered_accounts = array();
        $account_categories = AccountCategory :: all();
        $accounts = ChartOfAccount :: all();

        foreach($account_categories as $account_category)
        {
            if($account_category -> category_type == 'Asset')
             $group_accounts['Asset'][] = $account_category -> category_name;
            else if($account_category -> category_type == 'Liability')
             $group_accounts['Liability'][] = $account_category -> category_name;
            else if($account_category -> category_type == 'Equity')
             $group_accounts['Equity'][] = $account_category -> category_name;
        }
        foreach($accounts as $account)
        {
            for($i = 0; $i < 3; $i++)
            {
                $isFound = false;
                foreach($group_accounts[$types[$i]] as $category)
                {
                  if($account -> account_category -> category_name  == $category)
                  {
                     $filltered_accounts[$category][] = $account;
                     $isFound = true;
                     break;
                  }
                }
                if($isFound)
                 break;
            }
        }
        $company = CompanySettings :: find(1);
        $content = view('backend.admin.reports.balance_sheet',['company' => $company,'group_accounts' => $group_accounts,'filltered_accounts' => $filltered_accounts]);
        $pdf = new \Mpdf\Mpdf(['margin_header' => -10]);
        $pdf -> WriteHtml($content);
        $pdf -> output('Balance-sheet-'.now().'.pdf','D');
    }

    public function individual_pf_start()
    {
        /**
         * This function is used to show individual provident fund report start page in where you can select the employee for which you want to generate provident fund report.
         *
         * @param Required no parameters.
         * @return view object contains individual provident fund report start page.
         */
        $employees = Employee :: all();
        return view('backend.admin.reports.individual_pf_report_start',['employees' => $employees]);
    }

    public function individual_pf_report(Request $request)
    {
        /**
         * This is the operational part for individual provident fund report section.
         * This function take the employee details and generate provident fund report for that employee in pdf format.
         * @param Required only one parameter called employee id.
         * @return downloadable provident fund report in pdf format.
         */
        $employee_id = $request -> employee_id;
        $employee = Employee :: find($employee_id);
        $records = ProvidentFundProcessDetail :: where('employee_id',$employee_id)->get();
        $content = view('backend.admin.reports.individual_pf_report',['records' => $records,'employee_info' => $employee]);
        $pf_report = new \Mpdf\Mpdf();
        $pf_report -> WriteHtml($content);
        $pf_report -> output(''.$employee -> name.'-pf.pdf','D');
    }

    public function providentFundReport()
    {
        /**
         * This function is used to show monthly provident fund report start page in where you can select the month for which you want to generate provident fund report.
         *
         * @param Required no parameters.
         * @return view object contains monthly provident fund report index page.
         */
        $employees = Employee :: all();
        return view('backend.admin.reports.provident_fund_report',['employees' => $employees]);
    }

    public function providentFundReportDownload(Request $request)
    {
         /**
         * This is the operational part for monthly provident fund report section.
         * This function takes year and month info and generate provident fund report for that month in pdf format.
         * @param Required two parameters called month & year.
         * @return downloadable provident fund report in pdf format.
         */
        $year = $request -> year;
        $month = $request -> month;
        $company = CompanySettings :: find(1);
        $records = ProvidentFundProcessDetail :: where('year',$year)
                                              ->where('month',$month)
                                              ->get();
        $content = view('backend.admin.reports.pf_report_pdf',['records' => $records,'year' => $year,'month' => $month,'company' => $company]);
        $pf_report = new \Mpdf\Mpdf(['margin_header' => -10]);
        $pf_report -> WriteHtml($content);
        $pf_report -> output('pf-report-'.now().'.pdf','D');
    }

    public function yearly_pf_start()
    {
         /**
         * This function is used to show yearly provident fund report start page in where you can select the month for which you want to generate provident fund report.
         *
         * @param Required no parameters.
         * @return view object contains yearly provident fund report index page.
         */
        return view('backend.admin.reports.yearly_pf_report_start');
    }

    public function yearly_pf_statement(Request $request)
    {
         /**
         * This is the operational part for yearly provident fund report section.
         * This function takes one parameter called year and generate provident fund report for that month in pdf format.
         * @param Required one parameter called year.
         * @return downloadable provident fund report in pdf format.
         */
        $year = $request -> year;
        $records = Employee :: all();
        $content = view('backend.admin.reports.yearly_pf_report',['records' => $records,'year' => $year]);
        $pf_report = new \Mpdf\Mpdf();
        $pf_report -> WriteHtml($content);
        $pf_report -> output('pf-report-'.$year.'.pdf','D');
    }

    public function dept_wise_pf_report_start()
    {
         /**
         * This function is used to show dept wise provident fund report index page.
         *
         * @param Required no parameters.
         * @return view object contains dept wise provident fund report index page.
         */
        return view('backend.admin.reports.dept_wise_pf_report_start');
    }

    public function dept_wise_pf_report(Request $request)
    {
        /**
         * This is the operational part for dept wise provident fund report section.
         * This function takes one parameter called year and generate provident fund report for that month in pdf format.
         * @param Required two parameters called year and month
         * @return downloadable provident fund report in pdf format.
         */
        $year = $request -> year;
        $month = $request -> month;
        $departments = Department :: all();
        $content = view('backend.admin.reports.department_wise_pf_report',['departments' => $departments,'year' => $year,'month' => $month]);
        $pf_report = new \Mpdf\Mpdf();
        $pf_report -> WriteHtml($content);
        $pf_report -> output('Dept-pf-'.$month.'-'.$year.'.pdf','D');
    }

    public function class_wise_pf_report_start()
    {
          /**
         * This function is used to show class wise provident fund report index page.
         *
         * @param Required no parameters.
         * @return view object contains class wise provident fund report index page.
         */
        return view('backend.admin.reports.class_wise_pf_report_start');
    }

    public function class_wise_pf_report(Request $request)
    {
        /**
         * This is the operational part for class wise provident fund report section.
         * This function takes one parameter called year and generate provident fund report for that month in pdf format.
         * @param Required two parameters called year and month
         * @return downloadable provident fund report in pdf format.
         */
        $classes = EmployeeType :: all();
        $year = $request -> year;
        $month = $request -> month;
        $content = view('backend.admin.reports.class_wise_pf_report',['employee_class' => $classes,'year' => $year,'month' => $month]);
        $pf_report = new \Mpdf\Mpdf();
        $pf_report -> WriteHtml($content);
        $pf_report -> output('Class-pf-'.$month.'-'.$year.'.pdf','D');
    }

    public function general_payroll_report_start()
    {
        /**
         * This function is used to render the payroll report index page.
         * @param Required no parameters.
         * @return view object contains index page of payroll report.
         */
        $employees = Employee :: all();
       return view('backend.admin.reports.payroll.general_report_start',['employees' => $employees]);
    }

    public function download_payroll_report(Request $request)
    {
        //return $request;
         /**
         * This is the operational part for general payroll report
         * This function takes three parameters and generate payroll report.
         * @param Required three parameters called year,month and report type
         * @return downloadable payroll report in pdf format.
         */
        $year = $request -> year;
        $month = $request -> month;
        $report_type = $request -> report_type;
        $salary_generate = SalaryGenerate :: where('year',$year)
                           ->where('month',$month)
                           ->first();
        $company = CompanySettings :: find(1);
        if($salary_generate == null)
        {
            $salary_sheet = new \Mpdf\Mpdf();
            $salary_sheet -> WriteHtml('<h5>No Salary Sheet Found</h5>');
            $salary_sheet -> output('Salary-Sheet-Not-Found-'.$month.'-'.$year.'.pdf','D');
        }
        $generate_id = $salary_generate -> id;
       if($report_type == 'salary_bill_dept')
       {
          // return "dept_wise";
           if($request -> item_id == 0)
           $groups = Department :: all();
           else
            $groups = Department :: where('id',$request -> item_id)->get();
           $type = 'Department';
           $grand_total = $salary_generate -> grand_total_salary;
           $content = view('backend.admin.reports.payroll.general_report_salary_bill_pdf',['groups' => $groups,'year' => $year,'month' => $month,'generate_id' => $generate_id,'company' => $company,'type' => $type]);
           $salary_sheet = new \Mpdf\Mpdf(['margin_header' => -10]);
           $salary_sheet -> WriteHtml($content);
           $salary_sheet -> output('Salary-Sheet-(Dept. Wise)'.$month.'-'.$year.'.pdf','D');
       }
       else if($report_type == 'salary_bill_class')
       {
          // return $request -> item_id ;
           if($request -> item_id == 0)
           $groups = EmployeeType :: all();
           else
           $groups = EmployeeType :: where('id',$request -> item_id)->get();
           $type = 'Class';
           $grand_total = $salary_generate -> grand_total_salary;
           $content = view('backend.admin.reports.payroll.general_report_salary_bill_pdf',['groups' => $groups,'year' => $year,'month' => $month,'generate_id' => $generate_id,'company' => $company,'type' => $type]);
           $salary_sheet = new \Mpdf\Mpdf(['margin_header' => -10]);
           $salary_sheet -> WriteHtml($content);
           $salary_sheet -> output('Salary-Sheet-(Class Wise)'.$month.'-'.$year.'.pdf','D');
       }
       else if($report_type == 'bank_advice_dept')
       {
        if($request -> item_id == 0)
         $groups = Department :: all();
        else $groups = Department :: where('id',$request -> item_id)->get();
        $type = 'Department';
        $grand_total = $salary_generate -> grand_total_salary;
        $content = view('backend.admin.reports.payroll.general_report_bank_advice',['groups' => $groups,'year' => $year,'month' => $month,'generate_id' => $generate_id,'company' => $company,'type' => $type]);
        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('Bank-Advice-(Dept. Wise)'.$month.'-'.$year.'.pdf','D');
       }
       else if($report_type == 'bank_advice_class')
       {
         if($request -> item_id == 0)
         $groups = EmployeeType :: all();
         else
         $groups = EmployeeType :: where('id',$request -> item_id)->get();
         $type = 'Class';
         $grand_total = $salary_generate -> grand_total_salary;
         $content = view('backend.admin.reports.payroll.general_report_bank_advice',['groups' => $groups,'year' => $year,'month' => $month,'generate_id' => $generate_id,'company' => $company,'type' => $type]);
         $salary_sheet = new \Mpdf\Mpdf();
         $salary_sheet -> WriteHtml($content);
         $salary_sheet -> output('Bank-Advice-(Class Wise)'.$month.'-'.$year.'.pdf','D');
       }
       else
       {
         $employee_id = $request -> item_id;
         $generate_info = EmployeeSalary :: where('salary_generate_id',$generate_id)
                          ->where('employee_id',$employee_id)
                          ->first();

         if($generate_info == null)
         {
            $salary_sheet = new \Mpdf\Mpdf();
            $salary_sheet -> WriteHtml('<h5>No Payslip Found</h5>');
            $salary_sheet -> output('payslip-Not-Found-'.$month.'-'.$year.'.pdf','D');
         }
         $content = view('backend.admin.employee_management.employees.pay_slip_download',['salary_generate' => $generate_info,'company' => $company]);
         $salary_sheet = new \Mpdf\Mpdf();
         $salary_sheet -> WriteHtml($content);
         $salary_sheet -> output('payslip-'.$month.'-'.$year.'-'.$employee_id.'.pdf','D');
       }

    }

    public function cash_book_report_start()
    {
        /**
         * This function is used to render the  cash book report index page.
         * @param Required no parameters.
         * @return view object contains index page of cash book reporting.
         */
        $company = CompanySettings :: find(1);
        $debit_entries = CashBook :: where('entry_position','Debit')->get();
        $credit_entries = CashBook :: where('entry_position','Credit')->get();
        $max_cnt = max([count($debit_entries),count($credit_entries)]);
        return view('backend.admin.reports.accounts.cash_book_report_start',['company' => $company,'debit_entries' => $debit_entries,'credit_entries' => $credit_entries,'max_cnt' => $max_cnt]);
    }

    public function cash_book_report_download(Request $request)
    {
        /**
         * This is the operational part for cash book report
         * This function takes two parameters and generate cash book report withing that period.
         * @param Required two parameters called start date and end date.
         * @return downloadable cash book report in pdf format.
         */
        $company = CompanySettings :: find(1);
        $debit_entries = CashBook :: where('entry_position','Debit')->get();
        $credit_entries = CashBook :: where('entry_position','Credit')->get();
        $max_cnt = max([count($debit_entries),count($credit_entries)]);
        $content =  view('backend.admin.reports.accounts.cash_book_report_pdf',['company' => $company,'debit_entries' => $debit_entries,'credit_entries' => $credit_entries,'max_cnt' => $max_cnt]);
        $pdf = new \Mpdf\Mpdf(['margin_header' => -10]);
        $pdf -> WriteHtml($content);
        $pdf -> output('Cashbook-report-'.date('Y/m/d').'.pdf','D');
    }

    public function export_employee_list_pdf()
    {
        /**
         * This function just generate employee list in pdf format.
         * @param Required no parameters.
         * @return downloadable employee list in pdf format.
         */
        $company = CompanySettings :: find(1);
        $employees = Employee :: all();
        $content = view('backend.admin.reports.employees.export_employee_list',['employees' => $employees,'company' => $company]);
        $employees_list = new \Mpdf\Mpdf();
        $employees_list -> WriteHtml($content);
        $employees_list -> output('employee-list.pdf','D');
    }

    public function export_employee_list_excel()
    {
        /**
         * This function just generate employee list in excel format.
         * @param Required no parameters.
         * @return downloadable employee list in excel format.
         */
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function costCenterReport()
    {
        /**
         * This function is used to render the cost center wise report index page.
         * @param Required no parameters.
         * @return view object contains index page of cost center wise reporting.
         */
        $costCenters = CostCenter :: all();
        return view('backend.admin.reports.cost-center.cost_center_index',['cost_centers' => $costCenters]);
    }
    public function costCenterReportGenerator(Request $request)
    {

        $report_type = $request -> report_type;
        $item_id = $request -> item_id;
        $start_date = $request -> start_date;
        $end_date = $request -> end_date;

        if($report_type == 'head')
        {
           $cost_head  = CostCenterType :: find($item_id);
           $name = $cost_head -> name;
           $cost_center_ids = array();

           foreach($cost_head -> getCostCenters as $cost_center)
             $cost_center_ids[] = $cost_center -> id;

           $records = Ledger :: whereBetween('voucher_date',[$start_date,$end_date])
             ->whereIn('cost_center_id',$cost_center_ids)
             ->orderBy('voucher_date','asc')
             ->get();
           return view('backend.admin.partial_pages.cost_center_report',['records' => $records,'name' => $name,'report_type' => $report_type,
             'start_date' => $start_date,'end_date' => $end_date]);

        }
        else if($report_type == 'code')
        {
            $cost_center = CostCenter :: find($item_id);
            $name = $cost_center -> name;
            $records = Ledger :: whereBetween('voucher_date',[$start_date,$end_date])
                             ->where('cost_center_id',$item_id)
                             ->orderBy('voucher_date','asc')
                             ->get();
            return view('backend.admin.partial_pages.cost_center_report',['records' => $records,'name' => $name,'report_type' => $report_type,
                         'start_date' => $start_date,'end_date' => $end_date]);
        }
    }

    public function costCenterReportPdf(Request $request)
    {
        /**
         * This is the operational part for cost center report
         * This function takes three parameters and generate cost center report within that period.
         * @param Required three parameters called start date,end date and cost center id.
         * @return downloadable cost center report in pdf format.
         */
        $report_type = $request -> report_type;
        $item_id = $request -> item_id;
        $start_date = $request -> start_date;
        $end_date = $request -> end_date;
        $company = CompanySettings :: find(1);

        if($report_type == 'head')
        {
           $cost_head  = CostCenterType :: find($item_id);
           $name = $cost_head -> name;
           $cost_center_ids = array();

           foreach($cost_head -> getCostCenters as $cost_center)
             $cost_center_ids[] = $cost_center -> id;

           $records = Ledger :: whereBetween('voucher_date',[$start_date,$end_date])
             ->whereIn('cost_center_id',$cost_center_ids)
             ->orderBy('voucher_date','asc')
             ->get();
           $content =  view('backend.admin.reports.cost-center.cost_center_report_pdf',['records' => $records,'name' => $name,'report_type' => $report_type,
             'start_date' => $start_date,'end_date' => $end_date,'company' => $company]);

        }
        else if($report_type == 'code')
        {
            $cost_center = CostCenter :: find($item_id);
            $name = $cost_center -> name;
            $records = Ledger :: whereBetween('voucher_date',[$start_date,$end_date])
                             ->where('cost_center_id',$item_id)
                             ->orderBy('voucher_date','asc')
                             ->get();
            $content =  view('backend.admin.reports.cost-center.cost_center_report_pdf',['records' => $records,'name' => $name,'report_type' => $report_type,
                         'start_date' => $start_date,'end_date' => $end_date,'company' => $company]);
        }

        $pdf = new \Mpdf\Mpdf(['margin_header' => -10]);
        $pdf -> WriteHtml($content);
        $pdf -> output('Cost-Center-Report-'.$start_date.'to'.$end_date.'.pdf','D');
    }

    public function house_building_loan_report()
    {
        /**
         * This function just generate house building loan list in pdf format.
         * @param Required no parameters.
         * @return downloadable house building loan list in pdf format.
         */
        $loans = HouseBuildingLoan :: all();
        $content = view('backend.admin.reports.house-loans.loans_pdf',['loans' => $loans]);
        $loans = new \Mpdf\Mpdf();
        $loans -> WriteHtml($content);
        $loans -> output('house-loans.pdf','D');

    }

    public function budget_control_start()
    {
        /**
         * This function is used to render the budget control report index page.
         * @param Required no parameters.
         * @return view object contains index page of budget control reporting.
         */
        $budgets = Budget :: all();
        return view('backend.admin.reports.budgets.control_start',['budgets' => $budgets]);
    }

    public function budget_control_pdf(Request $request)
    {
        /**
         * This is the operational part for budget control reporting.
         * This function takes three parameters and generate budget control report within that period.
         * @param Required three parameters called start date, end date and budget id.
         * @return downloadable budget control report in pdf format.
         */

        $budget = Budget :: find($request->budget_id);
        $budacs = BudgetAccounting::where('budget_id', $budget->id)->get();
        //return view('backend.admin.reports.budgets.control',['budacs' => $budacs, 'budget' => $budget, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        $content = view('backend.admin.reports.budgets.control',['budacs' => $budacs, 'budget' => $budget, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        $head_wise_report = new \Mpdf\Mpdf();
        $head_wise_report -> WriteHtml($content);
        $head_wise_report -> output('budget-control-report-'.$request->start_date.'to'.$request->end_date.'.pdf','D');
    }

    public function budget_check_report_start()
    {
        /**
         * This function is used to render the under process budget check report index page.
         * @param Required no parameters.
         * @return view object contains index page of budget check report.
         */
        $budgets = Budget :: all();
        return view('backend.admin.reports.budgets.check_start',['budgets' => $budgets]);
    }

    public function budget_check_report_pdf(Request $request)
    {
        /**
         * This is the operational part for under process budget check reporting.
         * This function takes three parameters and generate budget report in that month.
         * @param Required three parameters called month, year and budget id.
         * @return downloadable under process budget report for selected month in pdf format.
         */

        $month = date('m',strtotime($request -> month));
        $year = substr($request -> year, 2, 2);
        echo $month . '/' . $year;
        $date = date_create_from_format('m/y', $month.'/'.$year);
        //echo $date;
        $first_day_of_month = date_date_set($date, $request->year, $month, '01')->format('Y-m-d');;
        $last_day_of_month = $date->format('Y-m-t');
        echo $first_day_of_month;
        echo $last_day_of_month;
        $budget = Budget :: find($request->budget_id);
        $budacs = BudgetAccounting::where('budget_id', $budget->id)->get();
        $selected_budacs = collect();
        foreach($budacs as $budac)
        {
            if($budac->start_date <= $last_day_of_month && $first_day_of_month <= $budac->end_date)
            {
                $selected_budacs->add($budac);
            }

        }
        $content = view('backend.admin.reports.budgets.check',['budacs' => $selected_budacs, 'budget' => $budget, 'date' => $request->date]);
        $head_wise_report = new \Mpdf\Mpdf();
        $head_wise_report -> WriteHtml($content);
        $head_wise_report -> output('budget-check-report-'.$request->date.'.pdf','D');
    }

    public function downloadBudgetReport(Request $request)
    {
       $report_type = $request -> report_type;
       $entries = BudgetAllocation :: where('year',date('Y'))->get();
       $company = CompanySettings :: find(1);
       $content = view('backend.admin.reports.budgets.current_states_pdf',['entries' => $entries,'company' => $company]);
       $pdf = new \Mpdf\Mpdf();
       $pdf -> WriteHtml($content);
       $pdf -> output('Budget-current-states-'.date('Y').'.pdf','D');
    }
    public function reconciliationReport()
    {
        return view('backend.admin.reports.reconciliation.generated_report_query');
    }
    public function reconciliationReportDownload(Request $request)
    {
       $month = $request -> month;
       $year = $request -> year;
       $company = CompanySettings :: find(1);
       $bank_entries_additions = ReconciliationReport :: where('year',$year)
                   ->where('month',$month)
                   ->where('category','bank')
                   ->where('type','add')
                   ->orderBy('id','asc')
                   ->get();
        $bank_entries_deductions = ReconciliationReport :: where('year',$year)
                   ->where('month',$month)
                   ->where('category','bank')
                   ->where('type','deduct')
                   ->orderBy('id','asc')
                   ->get();

        $adj_balance_bank = ReconciliationReport :: where('month',$month)
                   ->where('year',$year)
                   ->where('category','bank')
                   ->where('type','none')
                   ->get();

        $cashbook_entries_additions = ReconciliationReport :: where('year',$year)
                    ->where('month',$month)
                    ->where('category','cashbook')
                    ->where('type','add')
                    ->orderBy('id','asc')
                    ->get();

        $cashbook_entries_deductions = ReconciliationReport :: where('year',$year)
                    ->where('month',$month)
                    ->where('category','cashbook')
                    ->where('type','deduct')
                    ->orderBy('id','asc')
                    ->get();
        $adj_balance_cashbook = ReconciliationReport :: where('month',$month)
                    ->where('year',$year)
                    ->where('category','cashbook')
                    ->where('type','none')
                    ->get();

        $data =array('bank_entries_additions' => $bank_entries_additions,'bank_entries_deductions' => $bank_entries_deductions,'company' => $company,
                     'adj_balance_bank' => $adj_balance_bank,'cashbook_entries_additions' => $cashbook_entries_additions,'cashbook_entries_deductions' => $cashbook_entries_deductions,
                     'adj_balance_cashbook' => $adj_balance_cashbook,'month' => $month,'year' => $year);
       $content = view('backend.admin.reports.reconciliation.final_report_pdf',$data);
       $pdf = new \Mpdf\Mpdf();
       $pdf -> WriteHtml($content);
       $pdf -> output('reconcilation-report.pdf','D');
    }
    
    public function profit_loss()
    {
       
        return view('backend.admin.reports.profit_loss_duration');
                     
    }

    public function profit_loss_duration(Request $request)
    {
       // return $request;
        $total=0;
        $p_s1=0;
        $p_s2=0;
        $total_p=0;
        $total_cost=0;
        $cost_total=0;
        $total_operating=0;
        $operating_total=0;
        $finencial=0;
        $finencial_p=0;
        $operatingincome_p=0;
        $operatingincome=0;
        $Contribution_p=0;
        $Contribution=0;
        $Other_Comprehensive_Income=0;
        $Other_Comprehensive_Income_p=0;
        $direct_expense=0;
        $direct_expense_p=0;
        $open_stock=0;
        $open_stock_p=0;
        $Royalty_for_Hard_Rock=0;
        $Royalty_for_Hard_Rock_p=0;
        $SalesRealized=0;
        $SalesRealized_p=0;
        $Closing_Stock=0;
        $Closing_Stock_p=0;
        $totald_r=0;
        $totald_r_p=0;
        $totald_r_s=0;
        $totald_r__s_p=0;
        $totald_r_s_stock=0;
        $totald_r_s_stock_p=0;
        $total_cost_sold=0;
        $total_cost_sold_p=0;     


        $year=Carbon::now()->year-1;

        $time=$request->to_year;
        $date = new Carbon( $time );
       // return $date->year;
      
        if($date->year==$year)
        {
            
            $sales1=DB::table('cash_books')
            ->where('coa_id',56)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales2=DB::table('cash_books')
             ->where('coa_id',56)
             
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');


            $sales3=DB::table('cash_books')
            ->where('coa_id',58)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales4=DB::table('cash_books')
             ->where('coa_id',58)
             
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');
   
            $sales5=DB::table('cash_books')
            ->where('coa_id',57)
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales6=DB::table('cash_books')
             ->where('coa_id',57)
             ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');
   
            $p_s1=$sales1+$sales2+$sales3+$sales4;
            $p_s2=$sales5+$sales6;
            $total_p=$p_s1-$p_s2;
   
             /* Total selles calculating End*/


          /* Total cost calculating */
          /*-----------------------------------  */

         $cost1=DB::table('cash_books')
         ->where('coa_id','>=',77)
         ->where('coa_id','<=',80)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)        
         ->sum('cash_amount');
 
          $cost2= $cost1=DB::table('cash_books')
          ->where('coa_id','>=',77)
          ->where('coa_id','<=',80)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)        
          ->sum('bank_amount');


         $direct_expense_p=$cost1+$cost2;
       /*-----------------------------------  */

         $opening_stock1=DB::table('cash_books')
         ->where('coa_id',82)
         
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)        
         ->sum('cash_amount');
 
         $opening_stock2=DB::table('cash_books')
          ->where('coa_id',82)
         
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)        
          ->sum('bank_amount');

          $open_stock_p=$opening_stock1+$opening_stock2;

        /*-----------------------------------  */

          $Royalty1=DB::table('cash_books')
          ->where('coa_id',83)
          
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)        
          ->sum('cash_amount');
  
          $Royalty2=DB::table('cash_books')
           ->where('coa_id',83)
          
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('bank_amount');
 
           $Royalty_for_Hard_Rock_p=$Royalty1+$Royalty2;

            /*-----------------------------------  */
           $Sales_Realized1=DB::table('cash_books')
           ->where('coa_id',84)
           
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('cash_amount');
   
           $Sales_Realized2=DB::table('cash_books')
            ->where('coa_id',84)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)        
            ->sum('bank_amount');

            $Sales_Realized_p=$Sales_Realized1+$Sales_Realized2;

            /*-----------------------------------  */

            $Closing_Stock1=DB::table('cash_books')
           ->where('coa_id',85)
           
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('cash_amount');
   
           $Closing_Stock2=DB::table('cash_books')
            ->where('coa_id',85)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)        
            ->sum('bank_amount');

            $Closing_Stock_p=$Closing_Stock1+$Closing_Stock2;
            


             $totald_r_p=$direct_expense_p+$Royalty_for_Hard_Rock_p;
             $totald_r_s_p=$totald_r_p-$Sales_Realized_p;
             $totald_r_s_stock_p=$totald_r_s_p+$open_stock_p;
             $total_cost_sold_p=$totald_r_s_stock_p-$Closing_Stock_p;
 




         /* Total cost calculating END */

         /*Total operating cost  */


         $operating_cost1=DB::table('cash_books')
         ->where('coa_id','>=',48)
         ->where('coa_id','<=',51)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('cash_amount');
 
         $operating_cost2=DB::table('cash_books')
         ->where('coa_id','>=',48)
         ->where('coa_id','<=',51)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('bank_amount');
         $total_operating=$operating_cost1+$operating_cost2;

         /*Total operating cost End*/

         /*Finencial Expenses */

         $finencial_cost1=DB::table('cash_books')
         ->where('coa_id','>=',63)
         ->where('coa_id','<=',65)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('cash_amount');
 
         $finencial_cost2=DB::table('cash_books')
         ->where('coa_id','>=',63)
         ->where('coa_id','<=',65)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('bank_amount');
         $finencial_p=$finencial_cost1+$finencial_cost2;
        
          /*Finencial Expenses End */

          /* Non- Operating Income */

          $operatingincome_cost1=DB::table('cash_books')
          ->where('coa_id','>=',67)
          ->where('coa_id','<=',75)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $operatingincome_cost2=DB::table('cash_books')
          ->where('coa_id','>=',67)
          ->where('coa_id','<=',75)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $operatingincome_p=$operatingincome_cost1+$operatingincome_cost2;



          /* Non- Operating Income End */

          /*  Contribution to BPP and WF  */

          $Contribution_to_BPP1=DB::table('cash_books')
          ->where('coa_id',60)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $Contribution_to_BPP2=DB::table('cash_books')
         
          ->where('coa_id',60)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $Contribution_p=$Contribution_to_BPP1+$Contribution_to_BPP2;
          

             /*  Contribution to BPP and WF End */


           /*  Other_Comprehensive_Income; */

           
          $Other_Comprehensive_Income1=DB::table('cash_books')
          ->where('coa_id',81)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $Other_Comprehensive_Income2=DB::table('cash_books')
         
          ->where('coa_id',81)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $Other_Comprehensive_Income_p=$Other_Comprehensive_Income1+ $Other_Comprehensive_Income2;


             /*  Other_Comprehensive_Income End */
          

        }

        else
        {
           //return "else section";
         
            /* Total selles calculating */
            $sales1=DB::table('cash_books')
            ->where('coa_id',56)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales2=DB::table('cash_books')
             ->where('coa_id',56)
             
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');


            $sales3=DB::table('cash_books')
            ->where('coa_id',58)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales4=DB::table('cash_books')
             ->where('coa_id',58)
             
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');
   
            $sales5=DB::table('cash_books')
            ->where('coa_id',57)
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('cash_amount');
    
             $sales6=DB::table('cash_books')
             ->where('coa_id',57)
             ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)
            
            ->sum('bank_amount');
   
            $p_s1=$sales1+$sales2+$sales3+$sales4;
            $p_s2=$sales5+$sales6;
            $total=$p_s1-$p_s2;
   
             /* Total selles calculating End*/
         
        
          /* Total cost calculating */
          /*-----------------------------------  */

          $cost3=DB::table('cash_books')
          ->where('coa_id','>=',77)
          ->where('coa_id','<=',80)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)        
          ->sum('cash_amount');
  
            $cost4=DB::table('cash_books')
           ->where('coa_id','>=',77)
           ->where('coa_id','<=',80)
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('bank_amount');
 
 
          $direct_expense=$cost3+$cost4;
        /*-----------------------------------  */
 
          $opening_stock3=DB::table('cash_books')
          ->where('coa_id',82)
          
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)        
          ->sum('cash_amount');
  
          $opening_stock4=DB::table('cash_books')
           ->where('coa_id',82)
          
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('bank_amount');
 
           $open_stock=$opening_stock3+$opening_stock4;
 
         /*-----------------------------------  */
 
           $Royalty3=DB::table('cash_books')
           ->where('coa_id',83)
           
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)        
           ->sum('cash_amount');
   
           $Royalty4=DB::table('cash_books')
            ->where('coa_id',83)
           
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)        
            ->sum('bank_amount');
  
            $Royalty_for_Hard_Rock=$Royalty3+$Royalty4;
 
             /*-----------------------------------  */
            $Sales_Realized3=DB::table('cash_books')
            ->where('coa_id',84)
            
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)        
            ->sum('cash_amount');
    
            $Sales_Realized4=DB::table('cash_books')
             ->where('coa_id',84)
            
             ->where('created_at','>=',$request->from_year)
             ->where('created_at','<=',$request->to_year)        
             ->sum('bank_amount');
 
             $Sales_Realized=$Sales_Realized3+$Sales_Realized4;
 
             /*-----------------------------------  */
 
             $Closing_Stock3=DB::table('cash_books')
            ->where('coa_id',85)
            
            ->where('created_at','>=',$request->from_year)
            ->where('created_at','<=',$request->to_year)        
            ->sum('cash_amount');
    
            $Closing_Stock4=DB::table('cash_books')
             ->where('coa_id',85)
            
             ->where('created_at','>=',$request->from_year)
             ->where('created_at','<=',$request->to_year)        
             ->sum('bank_amount');
 
             $Closing_Stock=$Closing_Stock3+$Closing_Stock4;


             $totald_r=$direct_expense+$Royalty_for_Hard_Rock;
             $totald_r_s=$totald_r-$Sales_Realized;
             $totald_r_s_stock=$totald_r_s+$open_stock;
             $total_cost_sold=$totald_r_s_stock-$Closing_Stock;

  

         /* Totall cost calculating  end*/

         /* Operating cost calcuate */
         $operating_cost3=DB::table('cash_books')
         ->where('coa_id','>=',48)
         ->where('coa_id','<=',51)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('cash_amount');
 
         $operating_cost4=DB::table('cash_books')
         ->where('coa_id','>=',48)
         ->where('coa_id','<=',51)
         ->where('created_at','>=',$request->from_year)
         ->where('created_at','<=',$request->to_year)
         
         ->sum('bank_amount');


         
         $operating_total=$operating_cost3+$operating_cost4;

         /* Operating cost calcuate end */


          /*Finencial Expenses */

          $finencial_cost3=DB::table('cash_books')
          ->where('coa_id','>=',63)
          ->where('coa_id','<=',65)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $finencial_cost4=DB::table('cash_books')
          ->where('coa_id','>=',63)
          ->where('coa_id','<=',65)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $finencial=$finencial_cost3+$finencial_cost4;
         
           /*Finencial Expenses End */

           /* Non- Operating Income */

           $operatingincome_cost3=DB::table('cash_books')
           ->where('coa_id','>=',67)
           ->where('coa_id','<=',75)
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)
           
           ->sum('cash_amount');
   
           $operatingincome_cost4=DB::table('cash_books')
           ->where('coa_id','>=',67)
           ->where('coa_id','<=',75)
           ->where('created_at','>=',$request->from_year)
           ->where('created_at','<=',$request->to_year)
           
           ->sum('bank_amount');
           $operatingincome=$operatingincome_cost3+$operatingincome_cost4;
 
          /* Non- Operating Income End */
          
            /* */

            
          $Contribution_to_BPP3=DB::table('cash_books')
          ->where('coa_id',60)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $Contribution_to_BPP4=DB::table('cash_books')
         
          ->where('coa_id',60)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $Contribution=$Contribution_to_BPP3+$Contribution_to_BPP4;


          /*Other Coprehensize income */

          $Other_Comprehensive_Income3=DB::table('cash_books')
          ->where('coa_id',81)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('cash_amount');
  
          $Other_Comprehensive_Income4=DB::table('cash_books')
         
          ->where('coa_id',81)
          ->where('created_at','>=',$request->from_year)
          ->where('created_at','<=',$request->to_year)
          
          ->sum('bank_amount');
          $Other_Comprehensive_Income=$Other_Comprehensive_Income3+ $Other_Comprehensive_Income4;


          /*Other Coprehensize income End */

          


        }

           $company = CompanySettings :: find(1);
        
           $content=view('backend.admin.reports.profit_loss',['company'=>$company,'total'=>$total,'total_p'=>$total_p,'total_cost'=>$total_cost,'cost_total'=>$cost_total,'total_operating'=>$total_operating,'operating_total'=>$operating_total,'financial'=>$finencial,'financial_p'=>$finencial_p,'operatingincome_p'=>$operatingincome_p,'operatingincome'=>$operatingincome,'Contribution'=>$Contribution,'Contribution_p'=>$Contribution_p,'Other_Comprehensive_Income'=>$Other_Comprehensive_Income,'Other_Comprehensive_Income_p'=>$Other_Comprehensive_Income_p,'total_cost_sold'=>$total_cost_sold,'total_cost_sold_p'=>$total_cost_sold_p]);
           $pdf = new \Mpdf\Mpdf();
       
           $pdf -> WriteHtml($content);
           $pdf -> output('Advance_Voucher.pdf','D');
    }



}
