<?php

namespace App\Http\Controllers;

use App\Models\GratuityUser;
use App\Models\Grade;
use App\Models\Employee;
use App\Models\Payscale;
use App\Models\PayscaleDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Gratuity;



/**
 * This controller is for gratuity creating, editing, viewing and deleting. This is for pending gratuities.
 */
class GratuityUserController extends Controller
{
    public function index()
    {

        /* $employee_id=Auth :: user() -> id;
        $employee_details=Employee::where('user_id',$employee_id)->first();
        $datework=Carbon::createFromDate($employee_details->joining_date);
        $now = Carbon::now();
        $testdate = $datework->diffInMonths($now);
        $month_varify=$testdate % 6;
        if($month_varify==0)
        {
            return "matching";
                   $yearName =$now->format('Y');
                   $monthName =$now->format('F');
                   $gratutity=new Gratuity;
                   $gratutity->employee_id=$employee_id;
                   $gratutity->contribution=$employee_details->payscale;
                   $gratutity->month=$monthName;
                   $gratutity->year=$yearName;
                   $gratutity->save();

          
        }
        else
        {
            return redirect()->back();
        }
        */
        
        /**
        * This function is used for showing/rendering all pending gratuity currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of gratuities.
        */
        $users = GratuityUser::all();
        return view('backend.admin.gratuity_user.index', compact('users'));
    }

    public function create()
    {
       // return "fsf";
         /**
        * This function is used for starting the saving process of a gratuity.
        * @param Required no parameters
        * @return Return a view object that show a gratuity info related form.
        */
          $grades = Grade::all();
          $employees = Employee::all();
          return view('backend.admin.gratuity_user.create', compact('grades','employees'));
    }

    public function get_payscales(Request $request)
    {
        /**
        * This function is used for fetching all payscales of a grade.
        * @param Required one  parameter called id(grade id).
        * @return Return array containing payscale id(index) and name;
        */
        $payscales = Payscale::where('grade_id', $request->get('id') )->get();
        $output = [];
        foreach( $payscales as $payscale )
        {
            $output[$payscale->id] = $payscale->name;
        }
        return $output;    
    }
    public function get_payscale_details(Request $request)
    {
        /**
        * This function is used for fetching all subsection/details of a payscale.
        * @param Required one  parameter called id.
        * @return Return array containing payscale detail id(index) and the chronological number of the detail in that payscale.
        */        
        $payscale_details = PayscaleDetails::where('pay_scale_id', $request->get('id') )->get();
        $output = [];
        foreach( $payscale_details as $paydet )
        {
            $output[$paydet->id] = $paydet->id;
        }
        return $output;    
    }

    public function store(Request $request)
    {
       // return $request;
        /**
        * This function is used for saving newly created pending gratuities.
        * @param Required all fields for database table gratuity_users.
        * @return Return NULL; But redirect to the index page of pending gratuities section.
        */
         $gratuity_user = new GratuityUser([
            'employee_id' => $request->employee_id,
            'retd_date' => $request->retd_date,
           'gratuity_date' => $request->gratuity_date,
           // 'status' => 0,
           // 'total_service_year' => $request->total_service_year,
            'grade_id' => $request->grade_id,
            'payscale_id' => $request->pay_scale_id,
            'payscale_detail_id' => $request->pay_scale_detail_id,
            'last_basic_pay' => $request->last_basic_pay,
            'status'=>0,
           // 'percentage_basic_pay' => $request->percentage_basic_pay,
            //'mandatory_pf_per_tk' => $request->mandatory_pf_per_tk,
            //'total_amount' => $request->total_amount,
        ]);
        $gratuity_user->save();
        return redirect()->route('admin.gratuity-users.index');
    }

    public function view($id)
    {
        /**
        * This function is used for viewing a specific pending gratuity entry
        * @param Required one parameter called id(gratuity entry id)
        * @return Return a view object that contains info about the gratuity entry.
        */
        $user = GratuityUser::find($id);
        $payscale_details = PayscaleDetails::where('pay_scale_id', $user->payscale_id)->get();
        $payscale_detail_index = 0;
        foreach($payscale_details as $paydet)
        {
            $payscale_detail_index++;
            if($paydet->id == $user->payscale_detail_id)
                break;
        }
        return view('backend.admin.gratuity_user.view', compact('user', 'payscale_detail_index'));
    }

    public function edit($id)
    {
        /**
        * This function is used for editing a specific pending gratuity entry
        * @param Required one parameter called id(gratuity entry id)
        * @return Return a view object that contains editable information for the gratuity entry.
        */
        $grades = Grade::all();
        $employees = Employee::all();
        $user = GratuityUser::find($id);
        $payscales = Payscale::where('grade_id', $user->grade_id)->get();
        $payscale_details = PayscaleDetails::where('pay_scale_id', $user->payscale_id)->get();
        return view('backend.admin.gratuity_user.edit', compact('grades', 'employees', 'user', 'payscales', 'payscale_details'));
    }

    public function update(Request $request, $id)
    {
        /**
         * This function is used for updating a specific pending gratuity entry.
         * @param Required all fields for the gratuity_user table in database, and the id of the entry.
         * @return Return Nothing; But redirect to pending gratuity entry index page.
        */
        $gratuity_user = GratuityUser::find($id);
        $gratuity_user->employee_id = $request->employee_id;
        $gratuity_user->retd_date = $request->retd_date;
        $gratuity_user->gratuity_date = $request->gratuity_date;
        $gratuity_user->total_service_year = $request->total_service_year;
        $gratuity_user->grade_id = $request->grade_id;
        $gratuity_user->payscale_id = $request->pay_scale_id;
        $gratuity_user->payscale_detail_id = $request->pay_scale_detail_id;
        $gratuity_user->last_basic_pay = $request->last_basic_pay;
        $gratuity_user->percentage_basic_pay = $request->percentage_basic_pay;
        $gratuity_user->total_amount = $request->total_amount;
        $gratuity_user->mandatory_pf_per_tk = $request->mandatory_pf_per_tk;
        $gratuity_user->save();
        return redirect()->route('admin.gratuity-users.index');
    }

    public function delete_gratuity(Request $request)
    {
        /**
        * This function is used to delete a specific pending gratuity.
        * @param Required one parameter called id(gratuity id).
        * @return Return Nothing;
        */
        GratuityUser :: where('id',$request -> id)->delete();
    }

    public function approvalPendingsUsers()
    {
        $users = GratuityUser::get();
        return view('backend.admin.gratuity_user.approval-pending',['users' => $users]);
    }

    public function approveGratuityUser(Request $request)
    {
       $gratuity_user_id = $request -> gratuity_user_id;
       $gratuity_user = GratuityUser :: find($gratuity_user_id);
       $gratuity_user -> status = 1;
       $gratuity_user -> save();
       $message = 'Gratuity user approved successfully';
       return $message;
    }
    public function completePayment(Request $request)
    {
        $user = GratuityUser :: find($request -> user_id);
        $user -> status = 2;
        $user -> save();
    }
    public function gratunity_download($generate_id)
    {
        return $generate_id;
        $company = CompanySettings :: find(1);

        $salary_generate = Gratuity :: where('employee_id',$generate_id)->get()->sum('contribution');

        $content = view('backend.admin.employee_management.employees.gratunity_download',['salary_generate' => $salary_generate,'company'=>$company]);
        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('payslip.pdf','D');
    }

}
