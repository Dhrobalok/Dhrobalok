<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
/**
 * This controller helps us to maintain employees designation related information.
 * Here we just save or modify employees designation.
 * This is just a sub part of emplopyee management
 */
class EmployeeDesignationController extends Controller
{
    public function index()
    {
            /**
     * This function is used for showing/rendering all designations currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of designations.
     */
       $designations = Designation :: all();
       return view('backend.admin.employee_management.employee_designation.index',['designations' => $designations]);
    }
    public function create()
    {
         /**
     * This function is used for starting the saving process of a designation.
     * @param Required no parameters
     * @return Return a view object that describe a designation info related form.
     */
        return view('backend.admin.employee_management.employee_designation.create');
    }
    public function store(Request $request)
    {
        
           /**
     * This function is used for saving newly created designation.
     * @param Required one parameter called name(designation name)
     * @return Return Nothing; But redirect to the index page of  employee's designation section.
     */
       $request -> validate([
           'name' => ['required']
       ]);

       $designation = new Designation();
       $designation -> name = $request -> name;
       $designation -> save();
       return redirect()->route('admin.employee-management.employee-designation.index')->with('success-message','Employee Designation saved successfully!!');
    }
    public function edit($designation_id)
    {
         /**
     * This function is used for  viewing a specific designation
     * @param Required one parameter called designation id
     * @return Return a view object that contains info about a specific designation.
     */
       $designation = Designation :: find($designation_id);
       return view('backend.admin.employee_management.employee_designation.edit',['designation' => $designation]);
    }
    public function update(Request $request,$designation_id)
    {
         /**
     * This function is used for  update a specific designation.
     * @param Required two  parameters called designation name and designation id respectively.
     * @return Return Nothing; But redirect to designation index page.
     */
        $request -> validate([
            'name' => ['required']
        ]);
 
        $designation = Designation :: find($designation_id);
        $designation -> name = $request -> name;
        $designation -> save();
        return redirect()->route('admin.employee-management.employee-designation.index')->with('success-message','Employee Designation updated successfully!!');
    }
    public function delete(Request $request)
    {
         /**
     * This function is used for  delete a specific designation.
     * @param Required one  parameter called designation id.
     * @return Return Nothing;
     */
       $designation_id = $request -> designation_id;
       $designation = Designation :: find($designation_id);
       $designation -> delete();
    }
}
