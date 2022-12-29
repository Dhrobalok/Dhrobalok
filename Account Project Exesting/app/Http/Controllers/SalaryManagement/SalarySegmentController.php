<?php

namespace App\Http\Controllers\SalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalarySegmentType;
use App\Models\SalarySegment;
use App\Models\Grade;
use App\Models\EmployeePayScale;
use App\Models\Employee;
use App\Models\SegmentWiseSalaryDistribution;
use App\Models\PayScaleDetails;
/**
 * This controller helps us to maintain employee salary distribution in field/segment wise.
 *
 * This is just a sub part of salary management
 */
class SalarySegmentController extends Controller
{

    public function index()
    {
        /**
     * This function is used for rendering all types of salary segments stored in the database.
     * @param Required no parameters.
     * @return view object contains list of salary segments/field name.
     */
        $segments = SalarySegment :: all();
        return view('backend.admin.employee_salary.payscale.segments.index',['segments' => $segments]);
    }
    public function create()
    {
          /**
     * This function is used for starting the saving process of a salary segment.
     * @param Required no parameters
     * @return Return a view object that describe a salary segment info related form.
     */
        $segment_types = SalarySegmentType :: all();
        return view('backend.admin.employee_salary.payscale.segments.create',['types' => $segment_types]);
    }
    public function store(Request $request)
    {
         /**
     * This function is used for  saving newly created salary segment.
     * @param Required three parameters called segment name,type id & segment percentage.
     * @return void; Redirect to the index page of  salary segments.
     */
        $request -> validate([
            'name' => ['required']
        ]);

        $name = $request -> name;
        $type_id = $request -> type_id;
        $is_percentage = $request -> is_percentage;

        $newSalarySegment = new SalarySegment();
        $newSalarySegment -> name = $name;
        $newSalarySegment -> is_percentage = $is_percentage;
        $newSalarySegment -> type_id = $type_id;
        $newSalarySegment -> save();
        return redirect()->route('admin.salary-segment.index')->with('message','New segment added successfully!!');
    }
    public function edit($segment_id)
    {
        /**
         * This function is used for rendering the edit page of a salary segment.
         * @param Required only one parameter called segment id.
         * @return view page describes a form contains info about a salary segment info.
         */
        $segment = SalarySegment :: find($segment_id);
        $segment_types = SalarySegmentType :: all();
        return view('backend.admin.employee_salary.payscale.segments.edit',['types' => $segment_types,'segment' => $segment]);
    }
    public function update(Request $request,$segment_id)
    {
          /**
     * This function is used for  update a specific salary segment info.
     * @param Required four parameters called segment name,type id  & segment percentage.
     * @return void; Redirect to the index page of salary segments page with success message.
     */
        $request -> validate([
            'name' => ['required']
        ]);

        $name = $request -> name;
        $type_id = $request -> type_id;
        $is_percentage = $request -> is_percentage;

        $segment = SalarySegment :: find($segment_id);
        $segment -> name = $name;
        $segment -> is_percentage = $is_percentage;
        $segment -> type_id = $type_id;
        $segment -> save();
        return redirect()->route('admin.salary-segment.index')->with('message','Segment record updated successfully!!');
    }
    public function delete(Request $request)
    {
         /**
     * This function is used for  deleting a specific salary segment.
     * @param Required one  parameter called segment id.
     * @return void.
     */
        $segment = SalarySegment :: find($request -> segment_id);
        $segment -> delete();
    }

    public function segment_wise_distribution()
    {
        /**
         * This function is used to render all employees pay scale info.
         * @param Required no parameters.
         * @return view object contains a list of payscale info which are currently in active status.
         */
       $employees = EmployeePayScale :: where('status',1)
                         ->get();
        return view('backend.admin.employee_salary.payscale.segments.segment_wise_distribution',['employees' => $employees]);
    }

    public function assign_segment_wise_amount($employee_id)
    {
       //return $employee_id;
        /**
         * This function is used to assign segment wise amount of a specific employee. [Example : Rakib hasan : health fee : 1000,rent fee : 200 etc.]
         * @param Required only one paramater called employee id.
         * @return view object contains different salary related info about an employee.
         */
        $segments = SalarySegment :: all();
        $employee = Employee :: find($employee_id);
        $basic=EmployeePayScale::where('employee_id',$employee_id)->first();
        $employee_basic = $employee -> payscale;
        $basic_loan = $employee -> has_basic_loan;
        $home_loan = $employee -> has_home_loan;
        $basic_loan_amount = $basic_loan ? $basic_loan -> monthly_deduction : 0;
        $home_loan_amount = $home_loan ? $home_loan -> monthly_deduction : 0;
       // $salary = $basic -> payscale_detail;
       $salary=PayScaleDetails::find($basic->payscale_details_id);
       //return $salary->salary_amount;
        return view('backend.admin.employee_salary.payscale.segments.segment_wise_amount_assign',['employee' => $employee,'segments' => $segments,'salary' => $salary->salary_amount,
        'basic_loan_amount' => $basic_loan_amount,'home_loan_amount' => $home_loan_amount]);

    }

    public function save_segment_wise_amount(Request $request)
    {
       // return $request;
        /**
         * This function is the operational part of assign_segment_wise_amount() function mentioned in the above.
         * This function saved all info about segment wise distribution for an employee in the database.
         * @param Required three parameters called employee id,list of segment ids[1,2,3 etc.], list of segment amounts[2000,300,300 etc.]
         * @return void.
         */
        $employee_id = $request -> employee_id;
        $segment_ids = $request -> ids;
        $segment_amounts = $request -> amounts;

        SegmentWiseSalaryDistribution :: where('employee_id',$employee_id)
                                         ->update(['status' => 0]);

        for($i = 0; $i < count($segment_ids);$i = $i + 1)
        {
            $newSegmentWiseEntry = new SegmentWiseSalaryDistribution();
            $newSegmentWiseEntry -> employee_id = $employee_id;
            $newSegmentWiseEntry -> salary_segment_id = $segment_ids[$i];
            $newSegmentWiseEntry -> amount = ceil($segment_amounts[$i]);
            $newSegmentWiseEntry -> status = 1;
            $newSegmentWiseEntry -> save();

        }

        for($i = 4; $i <= 8; $i++)
        {
            $newSegmentWiseEntry = new SegmentWiseSalaryDistribution();
            $newSegmentWiseEntry -> employee_id = $employee_id;
            $newSegmentWiseEntry -> salary_segment_id = $i;
            $newSegmentWiseEntry -> amount = 0;
            $newSegmentWiseEntry -> status = 1;
            $newSegmentWiseEntry -> save();
        }
    }

    public function copy_payscale(Request $request)
    {
        /**
         * This function copy the payscale and another info which created for one employee applied for all simillar type of employee.
         * This function saved all info about segment wise distribution for an employee in the database.
         * @param Required a list of parameters called employee id,list of segment ids[1,2,3 etc.], list of segment amounts[2000,300,300 etc.], rent percentage, provident fund percentage, grade id,payscale id.
         * @return void.
         */
        $segment_ids = $request -> ids;
        $segment_amounts = $request -> amounts;
        $rent_per = $request -> percent;
        $grade_id = $request -> grade_id;
        $payscale_id = $request -> payscale_id;
        $employee_id = $request -> employee_id;

         $payscaleWiseemployees = EmployeePayScale :: where('grade_id',$grade_id)
                       ->where('payscale_id',$payscale_id)
                       ->where('status',1)
                       ->where('employee_id','!=',$employee_id)
                       ->get();

        foreach($payscaleWiseemployees as $employee)
        {
            $employee_id = $employee -> employee_id;
            SegmentWiseSalaryDistribution :: where('employee_id',$employee_id)
            ->update(['status' => 0]);
            $base_salary = $employee -> payscale_detail -> salary_amount;
            $segment_amounts[0] = ($base_salary * $rent_per[0]) / 100.00;


            for($i = 0; $i < count($segment_ids);$i = $i + 1)
            {
              $newSegmentWiseEntry = new SegmentWiseSalaryDistribution();
              $newSegmentWiseEntry -> employee_id = $employee_id;
              $newSegmentWiseEntry -> salary_segment_id = $segment_ids[$i];
              $newSegmentWiseEntry -> amount = ceil($segment_amounts[$i]);
              $newSegmentWiseEntry -> status = 1;
              $newSegmentWiseEntry -> save();

            }
            for($i = 4; $i <=8 ; $i++)
            {
                $newSegmentWiseEntry = new SegmentWiseSalaryDistribution();
                $newSegmentWiseEntry -> employee_id = $employee_id;
                $newSegmentWiseEntry -> salary_segment_id = $i;
                $newSegmentWiseEntry -> amount = 0;
                $newSegmentWiseEntry -> status = 1;
                $newSegmentWiseEntry -> save();
            }
        }

    }
}
