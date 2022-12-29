<?php

namespace App\Http\Controllers\SalaryManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
/**
 * This controller helps us to maintain employees grade related information.
 * Here we just save or modify or delete a grade.
 * This is just a sub part of salary management
 */
class GradeController extends Controller
{
    public function index()
    {
             /**
     * This function is used for showing/rendering all grades currently stored in the database.
     * @param Required no parameters
     * @return Return a view object with a list of grades.
     */
        $grades = Grade :: all();
        return view('backend.admin.employee_salary.payscale.grades.index',['grades' => $grades]);
    }
    public function edit($grade_id)
    {
          /**
     * This function is used for  viewing a specific grade info
     * @param Required one parameter called grade id
     * @return Return a view object that contains info about a specific grade.
     */
        $grade = Grade :: find($grade_id);
        return view('backend.admin.employee_salary.payscale.grades.edit',['grade' => $grade]);
    }
    public function create()
    {
         /**
     * This function is used for starting the saving process of a grade.
     * @param Required no parameters
     * @return Return a view object that describe a grade info related form.
     */
        return view('backend.admin.employee_salary.payscale.grades.create');
    }
    public function store(Request $request)
    {
           /**
     * This function is used for  saving newly created grade.
     * @param Required three parameters called grade name,description & active from.
     * @return void; Redirect to the index page of  employee's grade section.
     */
        $request -> validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $name = $request -> name;
        $description = $request -> description;
        $active_from = date('Y-m-d');
        $newGrade = new Grade();
        $newGrade -> name = $name;
        $newGrade -> description = $description;
        $newGrade -> active_from = $active_from;
        $newGrade -> status = 1;
        $newGrade -> save();
       
        return redirect()->route('admin.salary-management.grade.index')->with('success-message','Grade Saved Successfully');
    }
    
    public function update(Request $request,$grade_id)
    {
          /**
     * This function is used for  update a specific department.
     * @param Required four parameters called grade name,description & active from and grade id.
     * @return void; Redirect to the index page of  employee's grade section.
     */
        $request -> validate([
            'name' => ['required'],
            'description' => ['required']
        ]);
        
        $name = $request -> name;
        $description = $request -> description;
        $active_from = date('Y-m-d');
        $grade = Grade :: find($grade_id);
        $grade -> name = $name;
        $grade -> description = $description;
        $grade -> active_from = $active_from;
        $grade -> status = 1;
        $grade -> save();
        return redirect()->route('admin.salary-management.grade.index')->with('success-message','Grade Updated Successfully');
    }

    public function delete(Request $request)
    {
          /**
     * This function is used for  delete a specific grade.
     * @param Required one  parameter called grade id.
     * @return void.
     */
        $grade = Grade :: find($request -> grade_id);
        $grade -> delete();

    }
}
