<?php

namespace App\Http\Controllers;

use App\Models\ProvidentFundContribution;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeePFContributionRate;
/**
 * This controller is for creating, updating, deleting and viewing provident fund contributions.
 */

class ProvidentFundContributionController extends Controller
{

    public function index()
    {
        /**
      * This function is used for showing/rendering all provident fund contributions currently stored in the database.
      * @param Required no parameters
      * @return Return a view object with a list of provident fund contributions.
      */
       $users = ProvidentFundContribution::all();
        return view('backend.admin.pf_contribution.index', compact('users'));
    }

    public function updatePFContributionRate(Request $request)
    {
       // return $request;
        $user_id = $request -> user_id;
        $employee = Employee :: where('user_id',$user_id)->first();
        $employee_id = $employee -> id;
        $pf_rate = $request -> pf_contribution_rate;
        $contributed_amount = $request -> self_contribution;
       return $employee_pf_contribution = EmployeePFContributionRate :: where('employee_id',$employee_id) -> first();

        $employee_pf_contribution -> update([
            'pf_contribution_rate' => $pf_rate,
            'contributed_amount' => $contributed_amount
        ]);
    }

    public function create()
    {
         /**
        * This function is used for starting the saving process of a provident fund contribution.
        * @param Required no parameters
        * @return Return a view object that describe a provident fund info form.
        */
        $employees = Employee::all();
        return view('backend.admin.pf_contribution.create', compact('employees'));
    }

    public function store(Request $request)
    {
       //  return $request;
        /**
      * This function is used for saving newly created provident fund contributions.
      * @param Required the fields of pf_contributions table in database.
      * Note that if there is a user_id parameter, then the contribution is from an employee's dashboard, in which case the user id is used to find employee id.
      * @return Return NULL; But redirect to the index page of project label section.
      */
        $year = $request->year;
        $month = $request->month;
        $employee_id = $request->employee_id;


        if($request->user_id != null) //If the request is sent by an employee
        {
            $employee = Employee::where('user_id', $request->user_id)->get()->first();
            $employee_id = $employee->id;
        }
        $is_auto = 0;
        if($request->is_auto == 1)
            $is_auto = 1;
        $pf_contribution = new ProvidentFundContribution([
            'employee_id' => $employee_id,
            'date' => $request->date,
            'pf_amount' => $request->pf_amount,
            'year' => $year,
            'month' => $month,
            'is_auto' => $is_auto,
        ]);
        $pf_contribution->save();
        return redirect()->route('admin.pf-contribution.index');
    }


    public function view($id)
    {
        /**
        * This function is used for viewing a provident fund contribution.
        * @param Required one parameter called id(provident fund entry id)
        * @return Return a view object that contains info about a specific contribution.
        */
        $employees = Employee::all();
        $user = ProvidentFundContribution::find($id);
        return view('backend.admin.pf_contribution.view', compact('user', 'employees'));

    }

    public function edit($id)
    {
        /**
        * This function is used for editing a specific provident fund contribution.
        * @param Required one parameter called id(provident fund entry id)
        * @return Return a view object that contains editable info about a specific provident fund contribution.
        */
        $employees = Employee::all();
        $user = ProvidentFundContribution::find($id);
        return view('backend.admin.pf_contribution.edit', compact('user', 'employees'));
    }

    public function update(Request $request, $id)
    {
        /**
        * This function is used for updating a provident fund contribution.
        * @param Required all fields for pf_contributions table in database, and the id for the specific provident fund entry.
        * @return Return Nothing; But redirect to provident fund contribution index page.
        */

        $is_auto = 0;
        if($request->is_auto == 1)
            $is_auto = 1;
        $pf_contribution = ProvidentFundContribution::find($id);
        $pf_contribution->employee_id = $request->employee_id;
        $pf_contribution->date = $request->date;
        $pf_contribution->pf_amount = $request->pf_amount;
        $pf_contribution->year = $request->year;
        $pf_contribution->month = $request->month;
        $pf_contribution->is_auto = $is_auto;
        $pf_contribution->save();
        return redirect()->route('admin.pf-contribution.index');
    }

    public function delete(Request $request)
    {
        /**
        * This function is used for deleting a specific provident fund contribution entry.
        * @param Required one  parameter called id(provident fund entry id).
        * @return Return Nothing.
        */
        ProvidentFundContribution :: where('id',$request -> id)->delete();
    }
}
