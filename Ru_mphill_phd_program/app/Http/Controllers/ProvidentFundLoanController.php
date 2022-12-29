<?php

namespace App\Http\Controllers;

use App\Models\ProvidentFundLoan;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvidentFundLoanApprover;
use App\Models\ProvidentLoanApprove;
class ProvidentFundLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = ProvidentFundLoan::all();
        return view('backend.admin.pf_loan.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('backend.admin.pf_loan.create', compact('employees'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee_id = $request->employee_id;
        $employee = Employee::find($employee_id);
        if($request->user_id != null) //If the request is sent by an employee
        {
            $employee = Employee::where('user_id', $request->user_id)->get()->first();
            $employee_id = $employee->id;
        }
        $pf_loan = new ProvidentFundLoan([
            'employee_id' => $employee -> id,
            'date' => $request->date,
            'loan_amount' => $request->loan_amount,
            'status' => 1,
        ]);
        $pf_loan->save();
        return redirect()->route('admin.pf-loan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProvidentFundLoan  $providentFundLoan
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $employees = Employee::all();
        $user = ProvidentFundLoan::find($id);
        return view('backend.admin.pf_loan.view', compact('user', 'employees'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProvidentFundLoan  $providentFundLoan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = ProvidentFundLoan::find($id);
        return view('backend.admin.pf_loan.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProvidentFundLoan  $providentFundLoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pf_loan = ProvidentFundLoan::find($id);
        $pf_loan->employee_id = $request->employee_id;
        $pf_loan->date = $request->date;
        $pf_loan->loan_amount = $request->loan_amount;
        // $pf_loan->year = $request->year;
        // $pf_loan->month = $request->month;
        $pf_loan->save();

        //checking if the loan is in the provident approve table, if not then insert it in that table
        $loan = ProvidentLoanApprove :: where('loan_id',$id)->first();
        if($loan == null)
        {
            $approvers = ProvidentFundLoanApprover :: where('status',1) -> get();

            foreach($approvers as $approver)
            {
                 $loan_approve = new ProvidentLoanApprove();
                 $loan_approve -> loan_id = $id;
                 $loan_approve -> user_id = $approver -> user_id;
                 $loan_approve -> approve_order = $approver -> order;
                 $loan_approve -> status = 0; // Approver does  not approve the loan
                 $loan_approve -> save();
            }
        }

        return redirect()->route('admin.pf-loan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProvidentFundLoan  $providentFundLoan
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        ProvidentFundLoan :: where('id',$request -> id)->delete();
    }

    public function approval_panel_config()
    {
        /**
         * This function used to configure approval panel for provident fund loan.
         * @param Required no parameters.
         * @return view object contains a list of approvers.
         */
        $approvers = ProvidentFundLoanApprover :: where('status',1)->get();
        return view('backend.admin.pf_loan.approver_panel_setup',['approvers' => $approvers]);
    }

    public function approval_panel_save(Request $request)
    {
        /**
         * This function is used to update newly configured approval panel.
         * @param Required two parameters called  a list of approvers and their order.
         * @return void.
         * 
         */
       $approvers = $request -> approvers;
       $ordering = $request -> approve_serial;

       ProvidentFundLoanApprover :: where('status',1)->update(['status' => 0]);
       
       for($i = 0; $i < count($approvers); $i++)
       {
           $approver_record = new ProvidentFundLoanApprover();
           $approver_record -> user_id = $approvers[$i];
           $approver_record -> order = $ordering[$i];
           $approver_record -> status = 1;
           $approver_record -> save();
       }
    }

    public function pending_loans()
    {
        /**
         * This function used to render/view all provident fund pending loans.
         * @param Required no parameters. 
         * @return view object contains a list of pending loans.
         */
        $loans = ProvidentFundLoan :: all();
        return view('backend.admin.pf_loan.pending_loans',['loans' => $loans]);
    }

    public function approve_loan($loan_id)
    {
        /**
         * This function used to render/view a specific loan so that authority can approve that loan.
         * It returns a page that contains the approval link.
         * @param Required only one parameter called loan id.
         * @return view object that contains info about a specific provident fund loan.
         */
        $loan_info =  ProvidentFundLoan :: find($loan_id);
        $employee = $loan_info -> employee;
       return view('backend.admin.pf_loan.approve',['loan' => $loan_info,'employee' => $employee]);
    }
    public function approve_confirm(Request $request)
    {
        /**
         * This function is used to approve confirmation of a specific loan.
         * @param Required only two parameters called user id and loan id.
         * @return approve success message in string format.
         */
        $user_id = $request -> user_id;
        $loan_id = $request -> loan_id;
        $loan_approve = ProvidentLoanApprove :: where('loan_id',$loan_id)
                         ->where('user_id',$user_id)
                         ->first();
        $loan_approve -> status = 1;
        $loan_approve -> save();

        $is_fully_approved = ProvidentLoanApprove :: where('loan_id',$loan_id)
                             ->where('status',0)
                             ->count();
        if($is_fully_approved == 0)
        {
            $loan =  ProvidentFundLoan :: find($loan_id);
            $loan -> status = 2;
            $loan -> save();
        }
        return 'Loan Successfully Approved';
    }
   
}
