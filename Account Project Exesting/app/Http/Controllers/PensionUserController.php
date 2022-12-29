<?php

namespace App\Http\Controllers;

use App\Models\PensionUser;
use App\Models\Grade;
use App\Models\Employee;
use App\Models\Payscale;
use App\Models\PayscaleDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * This controller is for pension creating, editing, viewing and deleting. This is for pending pensions.
 */
class PensionUserController extends Controller
{

    public function index()
    {
        /**
        * This function is used for showing/rendering all pending pensions currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of pensions.
        */
        $users = PensionUser::all();
        return view('backend.admin.pension_user.index', compact('users'));
    }

    public function create()
    {
        /**
        * This function is used for starting the saving process of a pension.
        * @param Required no parameters
        * @return Return a view object that show a pension info related form.
        */
        $grades = Grade::all();
        $employees = Employee::all();
        return view('backend.admin.pension_user.create', compact('grades', 'employees'));
    }

    public function store(Request $request)
    {
        /**
        * This function is used for saving newly created pending pensions.
        * @param Required all fields for database table pension_users.
        * @return Return NULL; But redirect to the index page of pending pension section.
        */
        $pension_user = new PensionUser([
            'employee_id' => $request->employee_id,
            'retd_date' => $request->retd_date,
            'pension_start_date' => $request->pension_start_date,
            'status' => 0,
            'total_service_year' => $request->total_service_year,
            'grade_id' => $request->grade_id,
            'payscale_id' => $request->pay_scale_id,
            'payscale_detail_id' => $request->pay_scale_detail_id,
            'last_basic_pay' => $request->last_basic_pay,
            'percentage_basic_pay' => $request->percentage_basic_pay,
            'basic_pension_amount' => $request->basic_pension_amount,
            'health_fee' => $request->health_fee
        ]);
        $pension_user->save();
        return redirect()->route('admin.pension-users.index') -> with('message','New Employee Added Successfully');
    }

    public function view($id)
    {
        /**
        * This function is used for viewing a specific pension entry
        * @param Required one parameter called id(pension entry id)
        * @return Return a view object that contains info about the pension entry.
        */
        $user = PensionUser::find($id);
       
        return view('backend.admin.pension_user.view', compact('user'));
    }

    public function edit($id)
    {
        /**
        * This function is used for editing a specific pension entry
        * @param Required one parameter called id(pension entry id)
        * @return Return a view object that contains editable information for the pension entry.
        */
        $user = PensionUser::find($id);
        return view('backend.admin.pension_user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        /**
         * This function is used for updating a specific pension entry.
         * @param Required all fields for the pension_user table in database, and the id of the entry.
         * @return Return Nothing; But redirect to pending pension index page.
        */
        $pension_user = PensionUser::find($id);
        $pension_user->retd_date = $request->retd_date;
        $pension_user->pension_start_date = $request->pension_start_date;
        $pension_user->total_service_year = $request->total_service_year;
        $pension_user->last_basic_pay = $request->last_basic_pay;
        $pension_user->basic_pension_amount = $request->basic_pension_amount;
        $pension_user->health_fee = $request->health_fee;
        $pension_user->save();
        return redirect()->route('admin.pension-users.index')->with('message','Record updated successfully');
    }

    public function delete_pension(Request $request)
    {
        /**
        * This function is used for deleting a specific pension.
        * @param Required one  parameter called id.
        * @return Return Nothing;
        */
        PensionUser :: where('id',$request -> id)->delete();
    }

    public function approvePensionUser(Request $request)
    {
        $pension_user_id = $request -> pension_user_id;
        $pension_user = PensionUser :: find($pension_user_id);
        $pension_user -> status = 1;
        $pension_user -> save();
        $message = 'New pension receiver approved successfully';
        return $message;
    }
    public function pendingApprovalUsers()
    {
        $users = PensionUser :: where('status',0) -> get();
        return view('backend.admin.pension_user.approval-pending',['users' => $users]);
    }
}
