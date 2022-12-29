<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeSalary;
use App\Models\LoanType;
use App\Models\ProvidentFundRule;
use App\Models\PayScaleDetails;
use App\Models\CompanySettings;
use Carbon\Carbon;
use Auth;
use App\Models\GratuityUser;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * This function shows the home page content..
         * @param Required no parameters.
         * @return view object contains home page content.
         */
        return redirect() -> route('employee-dashboard');
        return view('home');
    }
    public function employee_dashboard()
    {
       
        /**
         * This function shows the employee dashboard.
         * @param Required no parameters.
         * @return view object contains employee dashboard content.
         */
        $userId = Auth :: user() -> id;

        $retird=GratuityUser::select('retd_date')->where('employee_id',$userId)->first();
        if($retird)
        {
            $employee_details=Employee::where('user_id',$userId)->first();
            $datework=Carbon::createFromDate($employee_details->joining_date);
            $testdate=$datework->diffInYears($retird->retd_date);
            $now = Carbon::now();
        }
     
      
        $types = EmployeeType :: all();
        $departments = Department :: all();
        $designations = Designation :: all();
        $employee = Employee :: where('user_id',$userId)->first();
        $interest_rate = LoanType :: find(2);
        $current_payscale = $employee -> payscale;
        $salary_amount= $employee -> payscale;
        //$employee -> payScale ->payscale_details_id;
       // $salary_amount=PayScaleDetails::find($employee -> payScale ->payscale_details_id)->salary_amount;
        //return $salary_amount;
        //$provident_rule =ProvidentFundRule::where('payscale_id',$employee -> payScale ->payscale_id)->first() ;

        //return view('frontend.profile',['employee' => $employee,'types' => $types,'departments' => $departments,'designations' => $designations,'interest_rate' => $interest_rate,'current_payscale' => $current_payscale,
                   // 'provident_rule' => $provident_rule,'salary_amount'=>$salary_amount]);
        return view('frontend.profile',['employee' => $employee,'types' => $types,'departments' => $departments,'designations' => $designations,'interest_rate' => $interest_rate,'current_payscale' => $current_payscale,'salary_amount'=>$salary_amount]);
    }
    public function download_payslip($generate_id)
    {
       // return $generate_id;
        
        /**
         * This function generates payslip for a specific month of a specific employee.
         * We use a laravel package called Mpdf for pdf generation. For more details please visit at:
         * https://mpdf.github.io/
         * @param Required only one parameter called generate id which involves monthly generated salary sheets.
         * @return a downloadable payslip in pdf format.
         */
        $company = CompanySettings :: find(1);

        $salary_generate = EmployeeSalary :: where('salary_generate_id',$generate_id)->first();

        $content = view('backend.admin.employee_management.employees.pay_slip_download',['salary_generate' => $salary_generate,'company'=>$company]);
        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('payslip.pdf','D');
    }
    public function download_gratunity($generate_id)
    {
       // return $generate_id;
        /**
         * This function generates payslip for a specific month of a specific employee.
         * We use a laravel package called Mpdf for pdf generation. For more details please visit at:
         * https://mpdf.github.io/
         * @param Required only one parameter called generate id which involves monthly generated salary sheets.
         * @return a downloadable payslip in pdf format.
         */
        $company = CompanySettings :: find(1);

        $salary_generate = EmployeeSalary :: where('salary_generate_id',$generate_id)->first();

        $content = view('backend.admin.employee_management.employees.pay_slip_download',['salary_generate' => $salary_generate,'company'=>$company]);
        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('payslip.pdf','D');
    }
    public function view_payslip($generate_id)
    {
         /**
         * This function shows payslip for a specific month of a specific employee.
         * @param Required only one parameter called generate id which involves monthly generated salary sheets.
         * @return view object contains the payslip for a specific time period.
         */
        $salary_generate = EmployeeSalary :: find($generate_id);
        return view('backend.admin.employee_management.employees.pay_slip_view',['salary_generate' => $salary_generate]);
    }
}
