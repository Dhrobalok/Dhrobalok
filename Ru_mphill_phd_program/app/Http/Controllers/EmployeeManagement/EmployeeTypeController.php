<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeType;
/**
 * This controller helps us to maintain employees type/class related information.
 * Here we just save or modify employees type/class.
 * This is just a sub part of emplopyee management
 */
class EmployeeTypeController extends Controller
{
    public function index()
    {
              /**
     * This function is used for showing/rendering all types currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of employees types.
     */
       $types = EmployeeType :: all();
       return view('backend.admin.employee_management.employee_types.index',['types' => $types]);
    }
    public function create()
    {
         /**
     * This function is used for starting the saving process of a employee type.
     * @param Required no parameters
     * @return Return a view object that describe a type info related form.
     */
        return view('backend.admin.employee_management.employee_types.create');
    }
    public function store(Request $request)
    {
         /**
     * This function is used for saving newly created employee name.
     * @param Required one parameter called name(type name)
     * @return Return Nothing; But redirect to the index page of  employee's type section.
     */
       $request -> validate([
           'name' => ['required']
       ]);

       $employeeType = new EmployeeType();
       $employeeType -> name = $request -> name;
       $employeeType -> save();
       return redirect()->route('admin.employee-management.employee-type.index')->with('message','Employee type saved successfully!!');
    }
    public function view($type_id)
    {
         /**
     * This function is used for  viewing a specific employee type
     * @param Required one parameter called type id
     * @return Return a view object that contains info about a specific employee type.
     */
       $employee_type = EmployeeType :: find($type_id);
       return view('backend.admin.employee_management.employee_types.view',['employee_type' => $employee_type]);
    }
    public function update(Request $request,$type_id)
    {
         /**
     * This function is used for  update a specific employee type.
     * @param Required two  parameters called type name and type id respectively.
     * @return Return Nothing; But redirect to employee's type index page.
     */
        $request -> validate([
            'name' => ['required']
        ]);
 
        $employeeType = EmployeeType :: find($type_id);
        $employeeType -> name = $request -> name;
        $employeeType -> save();
        return redirect()->route('admin.employee-management.employee-type.index')->with('message','Employee type updated successfully!!');
    }
    public function delete(Request $request)
    {
        /**
     * This function is used for  delete a specific employee type.
     * @param Required one  parameter called type id.
     * @return Return Nothing;
     */
       $type_id = $request -> Id;
       $type = EmployeeType :: find($type_id);
       $type -> delete();
    }
}
