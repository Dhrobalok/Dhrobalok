<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
/**
 * This controller helps us to maintain employees department related information.
 * Here we just save or modify employees department.
 * This is just a sub part of emplopyee management
 */
class EmployeeDepartmentController extends Controller
{
   
    public function index()
    {
         /**
     * This function is used for showing/rendering all departments currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of departments.
     */
       $departments = Department :: all();
       return view('backend.admin.employee_management.employee_department.index',['departments' => $departments]);
    }
    public function create()
    {
         /**
     * This function is used for starting the saving process of a department.
     * @param Required no parameters
     * @return Return a view object that describe a departmental info related form.
     */
        return view('backend.admin.employee_management.employee_department.create');
    }
    public function store(Request $request)
    {
           /**
     * This function is used for  saving newly created department.
     * @param Required one parameter called name(department name)
     * @return Return NULL; But redirect to the index page of  employee's department section.
     */
       $request -> validate([
           'name' => ['required'],
           'description' => ['required']
       ]);

       $department = new Department();
       $department -> name = $request -> name;
       $department -> description = $request -> description;
       $department -> save();
       return redirect()->route('admin.employees.department.index')->with('success-message','Employee department saved successfully!!');
    }
    public function edit($department_id)
    {
        /**
     * This function is used for  viewing a specific department
     * @param Required one parameter called department id
     * @return Return a view object that contains info about a specific department.
     */
       $department = Department :: find($department_id);
       return view('backend.admin.employee_management.employee_department.edit',['department' => $department]);
    }
    public function update(Request $request,$department_id)
    {
         /**
     * This function is used for  update a specific department.
     * @param Required two  parameters called department name and department id respectively.
     * @return Return Nothing; But redirect to department index page.
     */
        $request -> validate([
            'name' => ['required'],
            'description' => ['required']
        ]);
 
        $department = Department :: find($department_id);
        $department -> name = $request -> name;
        $department -> description = $request -> description;
        $department -> save();
        return redirect()->route('admin.employees.department.index')->with('success-message','Department updated successfully!!');
    }
    public function delete(Request $request)
    {
         /**
     * This function is used for  delete a specific department.
     * @param Required one  parameter called department id.
     * @return Return Nothing;
     */
       $department_id = $request -> department_id;
       $department = Department :: find($department_id);
       $department -> delete();
    }
}
