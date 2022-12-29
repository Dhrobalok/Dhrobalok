<?php

namespace App\Http\Controllers\LoanManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanType;
/**
 * This controller helps us to maintain loan types related information.
 * Here we just save or modify or delete a loan type.
 *
 */
class LoanTypesController extends Controller
{
    public function index()
    {
         /**
     * This function is used for showing/rendering all types of loan currently stored in the database.
     * @param Required no parameters
     * @return Return view object with a list of types of loan[A list of loan types must be passed into the view page].
     */   
        $types = LoanType :: all();
        return view('backend.admin.loans.types.index',['types' => $types]);
    }
    public function create()
    {
        /**
     * This function is used for starting the saving process of a type of loan.
     * @param Required no parameters
     * @return Return a view object that describes a type of loan related info form.
     */
        return view('backend.admin.loans.types.create');
    }
    public function store(Request $request)
    {
        
           /**
     * This function is used for  saving newly created type of loan.
     * @param Required two parameters called loan type name & interest rate.
     * @return Return void; Redirect to the index page of  types of loan section.
     */
        $request -> validate([
            'name' => ['required'],
            'interest_rate' => ['required']
        ]);

        $name = $request -> name;
        $interest_rate = $request -> interest_rate;

        $newtype = new LoanType();
        $newtype -> name = $name;
        $newtype -> interest_rate = $interest_rate;
        $newtype -> status = 1;
        $newtype -> save();

        return redirect() -> route('admin.loan.types.index')->with('message','Loan type added successfully!!');
    }
    public function edit($type_id)
    {
        /** 
         * This function is used for rendering the edit page of a type of loan.
         * @param Required only one parameter called type id.
         * @return view page describes a form contains info about a type of loan.
         */
        $type = LoanType :: find($type_id);
        return view('backend.admin.loans.types.edit',['type' => $type]);
    }
    public function update(Request $request,$type_id)
    {
        /**
     * This function is used for  update a specific type of loan info.
     * @param Required two  parameters called loan type name and interest rate.
     * @return Return void; Redirect to types of loan index page.
     */
        $request -> validate([
            'name' => ['required'],
            'interest_rate' => ['required']
        ]);

        $name = $request -> name;
        $interest_rate = $request -> interest_rate;
        $status = $request -> status;

        $type = LoanType :: find($type_id);
        $type -> name = $name;
        $type -> interest_rate = $interest_rate;
        $type -> status = $status;
        $type -> save();

        return redirect() -> route('admin.loan.types.index')->with('message','Loan type updated successfully!!');
    }
    public function delete(Request $request)
    {
        /**
         * This function do a simple task, just take the loan type id and delete that type form our system.
         * @param Required only one parameter called loan type id.
         * @return void.
         */
       $type = LoanType :: find($request -> type_id);
       $type -> delete();
    }
}
