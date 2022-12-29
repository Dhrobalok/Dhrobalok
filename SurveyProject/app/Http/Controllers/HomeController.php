<?php

namespace App\Http\Controllers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
use Session;
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
        //return "sfsdf";
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
       return "fdfsdfsd";
        /**
         * This function shows the employee dashboard.
         * @param Required no parameters.
         * @return view object contains employee dashboard content.
         */
        //return "fdfdfd";
          // return Auth :: user()->email;
          $emailid=Session::get('emailname');
          $userId=Employee::where('email',$emailid)->first();


     
     
      
        $types = EmployeeType :: all();
        $departments = Department :: all();
        $designations = Designation :: all();
       // $employee = Employee :: where('roll
        
        
        $employee=Employee::where('roll',$userId->roll)->first();
        $interest_rate = LoanType :: find(2);
        $current_payscale = $employee -> payscale;
        $salary_amount= $employee -> payscale;
       
        return view('frontend.profile',['employee' => $employee]);
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
