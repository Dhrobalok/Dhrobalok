<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSection;

class EmployeeSectionController extends Controller
{
    public function index()
    {
       $sections = EmployeeSection :: all();
       return view('backend.admin.employee_management.employee_sections.index',['sections' => $sections]);
    }
    public function create()
    {
        return view('backend.admin.employee_management.employee_sections.create');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $name  = $request -> name;
        $description = $request -> description;
        EmployeeSection :: create([
            'name' => $name,
            'description' => $description
        ]);
        return redirect() -> route('admin.employees.section.index')->with('success-message','New section saved successfully');
    }
    public function edit($section_id)
    {
       $section = EmployeeSection :: find($section_id);
       return view('backend.admin.employee_management.employee_sections.edit',['section' => $section]);
    }
    public function update(Request $request,$section_id)
    {
       $request -> validate([
           'name' => ['required'],
           'description' => ['required']
       ]);
       
       $name = $request -> name;
       $description = $request -> description;
       $section = EmployeeSection :: find($section_id);
       $section -> update([
           'name' => $name,
           'description' => $description
       ]);
       return redirect() -> route('admin.employees.section.index')->with('success-message','Section info updated successfully');
    }
    public function delete(Request $request)
    {
        $section = EmployeeSection :: find($request -> section_id);
        $section -> delete();
    }
}
