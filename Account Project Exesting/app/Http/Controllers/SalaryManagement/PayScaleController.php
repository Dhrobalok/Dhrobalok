<?php

namespace App\Http\Controllers\SalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayScale;
use App\Models\Grade;
use App\Rules\CheckNegativeNumber;
use App\Models\PayScaleDetails;
use App\Models\Employee;
use App\Rules\CheckGrade;
use App\Rules\CheckPayScale;
use App\Rules\CheckPayScaleDetail;
use App\Models\EmployeePayScale;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeType;

/**
 * This controller helps us to maintain employees payscale related information.
 * Here we just save or modify or delete a payscale.
 * This is just a sub part of salary management
 */
class PayScaleController extends Controller
{
    public function index()
    {
          /**
     * This function is used for showing/rendering all payscales currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of payscales.
     */
        $pay_scales = PayScale :: all();
        return view('backend.admin.employee_salary.payscale.index',['pay_scales' => $pay_scales]);
    }
    public function create()
    {
         /**
     * This function is used for starting the saving process of a payscale.
     * @param Required no parameters
     * @return Return a view object that describe a payscale info related form.
     */
        $grades = Grade :: where('status',1)->get();
        return view('backend.admin.employee_salary.payscale.create',['grades' => $grades]);
    }
    public function store(Request $request)
    {
          /**
     * This function is used for  saving newly created payscale.
     * @param Required five parameters called payscale name,start salary,end salary,number of increments & increment percentage.
     * @return void; Redirect to the index page of  employee's payscale section.
     */
        $request -> validate([
            'name' => ['required'],
            'start_salary' => ['required',new CheckNegativeNumber],
            'end_salary' => ['required',new CheckNegativeNumber],
            'increments_number' => ['required',new CheckNegativeNumber],
            'increment_percentage' => ['required',new CheckNegativeNumber]
        ]);
        
        $name = $request -> name;
        $start_salary = $request -> start_salary;
        $end_salary = $request -> end_salary;
        $increments_number = $request -> increments_number;
        $increment_percentage = $request -> increment_percentage;

        $newPayScale = new PayScale();
        $newPayScale -> name = $name;
        $newPayScale -> grade_id = $request -> grade_id;
        $newPayScale -> start_salary = $start_salary;
        $newPayScale -> end_salary = $end_salary;
        $newPayScale -> number_of_increments = $increments_number;
        $newPayScale -> increment_percentage = $increment_percentage;
        $newPayScale -> status = 1;
        $newPayScale -> save();

        $new_salary = $this -> adjust_amount(ceil($start_salary));

        for($i = 1; $i <= $increments_number; $i = $i + 1)
        {
            $newPayScaleDetail = new PayScaleDetails();
            $newPayScaleDetail -> pay_scale_id = $newPayScale -> id;
            $newPayScaleDetail -> salary_amount = $new_salary;
            $newPayScaleDetail -> save();
            $new_salary = $this -> adjust_amount(ceil($new_salary + (($new_salary * $increment_percentage) / 100.00)));
        }

        return redirect()->route('admin.salary-management.payscale.index')->with('success-message','PayScale Saved Successfully');

    }

    public function adjust_amount($amount)
    {
        /**
         * This function is used for adjusting fractional salary amount. Example : 12345 should be 12350.
         * @param Required fractional salary amount.[Example : 13455,16678.88 etc]
         * @return adjusted salary amount which are described in the above example.
         */
        $result = $amount;
        while($result % 10 != 0)
        {
            $result = $result + 1;
        }

        return $result;
    }

    public function view($pay_scale_id)
    {
         /**
     * This function is used for  viewing a specific payscale info
     * @param Required one parameter called payscale id
     * @return Return a view object that contains info about a specific payscale.
     */
        $payScale = PayScale :: find($pay_scale_id);
        return view('backend.admin.employee_salary.payscale.view',['payScale' => $payScale]);
    }
    public function edit($pay_scale_id)
    {
       $pay_scale = PayScale :: find($pay_scale_id);
       $grades = Grade :: where('status',1)->get();
       return view('backend.admin.employee_salary.payscale.edit',['grades' => $grades,'payScale' => $pay_scale]);
    }

    public function update(Request $request,$pay_scale_id)
    {
        
          /**
     * This function is used for  updating payscale information.
     * @param Required five parameters called payscale name,start salary,end salary,number of increments & increment percentage.
     * @return void; Redirect to the index page of  employee's payscale section.
     */
        $request -> validate([
            'name' => ['required'],
            'start_salary' => ['required',new CheckNegativeNumber],
            'end_salary' => ['required',new CheckNegativeNumber],
            'increments_number' => ['required',new CheckNegativeNumber],
            'increment_percentage' => ['required',new CheckNegativeNumber]
        ]);
        
        $name = $request -> name;
        $start_salary = $request -> start_salary;
        $end_salary = $request -> end_salary;
        $increments_number = $request -> increments_number;
        $increment_percentage = $request -> increment_percentage;
        $details_ids = $request -> ids;
        $salary_amount = $request -> salary_amount;
        $PayScale = PayScale :: find($pay_scale_id);
        $PayScale -> name = $name;
        $PayScale -> grade_id = $request -> grade_id;
        $PayScale -> start_salary = $start_salary;
        $PayScale -> end_salary = $end_salary;
        $PayScale -> number_of_increments = $increments_number;
        $PayScale -> increment_percentage = $increment_percentage;
        $PayScale -> status = $request -> status;
        $PayScale -> save();

        for($i = 0; $i < count($salary_amount); $i ++)
        {
            $detail = PayScaleDetails :: find($details_ids[$i]);
            $detail -> salary_amount = $salary_amount[$i];
            $detail -> save();
        }

        return redirect()->route('admin.salary-management.payscale.index')->with('success-message','PayScale Updated Successfully');
    }

    public function delete(Request $request)
    {
         /**
     * This function is used for  delete a specific payscale.
     * @param Required one  parameter called payscale id.
     * @return void.
     */
        $payScale = PayScale :: find($request -> pay_scale_id);
        $payScale -> delete();
    }

    public function set_employee_payscale($employee_id)
    {
        /**
         * This function is used for rendering the view page of employee payscale updation.
         * @param Required only one parameter called employee id.
         * @return view object contains employee previous payscale info.
         */
        $employee = Employee :: find($employee_id);
        $grades = Grade :: where('status',1)->get();
        $previousPayScale = EmployeePayScale :: 
                             where('employee_id',$employee -> id)
                           ->where('status',1)
                           ->first();
        $departments = Department :: all();
        $designations = Designation :: all();
        $types = EmployeeType :: all(); 
        
        return view('backend.admin.employee_salary.payscale.set_employee_payscale',['employee' => $employee,'grades' => $grades,'previous_payscale' => $previousPayScale,'departments' => $departments,
                     'designations' => $designations,'types' => $types]);
    }

    public function save_employee_payscale(Request $request,$employee_id)
    {
        /**
         * This function is used to save newly assigned payscale of an employee.
         * @param Required seven parameters called effective from,end to,provident percentage(pf_per),grade id, payscale id,detail id and employee id.
         * @return void. Redirects to employee payscale set up page with success message.
         */
        $request -> validate([
            'grade_id' => [new CheckGrade],
            'payscale_id' => [new CheckPayScale],
            'detail_id' => [new CheckPayScaleDetail]
        ]);

        $grade_id = $request -> grade_id;
        $payscale_id = $request -> payscale_id;
        $detail_id = $request -> detail_id;
        $effective_from = date('Y-m-d');
        $employee = Employee :: find($employee_id);

        $this -> DeactivePreviousPayScale($employee_id,$grade_id,$payscale_id);

        $newEmployeePayScale = new EmployeePayScale();
        $newEmployeePayScale -> employee_id = $employee_id;
        $newEmployeePayScale -> grade_id = $grade_id;
        $newEmployeePayScale -> payscale_id = $payscale_id;
        $newEmployeePayScale -> payscale_details_id = $detail_id;
        $newEmployeePayScale -> start_date = $effective_from;
        $newEmployeePayScale -> status = 1;
        $newEmployeePayScale -> save();
        return redirect()->route('admin.employee-management.employees.index')->with('success-message','Payscale updated successfully for '.$employee -> name);
    }

    public function DeactivePreviousPayScale($employee_id)
    {
        /**
         * This function is used to deactive previous payscale of an employee.
         * @param Required employee id.
         * @return void.
         */
        EmployeePayScale :: where('employee_id',$employee_id)
                          ->update(['status' => 0]);
    }
}
