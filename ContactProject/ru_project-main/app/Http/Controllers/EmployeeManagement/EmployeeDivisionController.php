<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeDivision;

class EmployeeDivisionController extends Controller
{
    public function index()
    {
       $divisions = EmployeeDivision :: all();
       return view('backend.admin.employee_management.employee_divisions.index',['divisions' => $divisions]);
    }
    public function create()
    {
        return view('backend.admin.employee_management.employee_divisions.create');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $name  = $request -> name;
        $description = $request -> description;
        EmployeeDivision :: create([
            'name' => $name,
            'description' => $description
        ]);
        return redirect() -> route('admin.employees.division.index')->with('success-message','New division saved successfully');
    }
    public function edit($division_id)
    {
       $division = EmployeeDivision :: find($division_id);
       return view('backend.admin.employee_management.employee_divisions.edit',['division' => $division]);
    }
    public function update(Request $request,$division_id)
    {
       $request -> validate([
           'name' => ['required'],
           'description' => ['required']
       ]);
       
       $name = $request -> name;
       $description = $request -> description;
       $division = EmployeeDivision :: find($division_id);
       $division -> update([
           'name' => $name,
           'description' => $description
       ]);
       return redirect() -> route('admin.employees.division.index')->with('success-message','Division info updated successfully');
    }
    public function delete(Request $request)
    {
        $division = EmployeeDivision :: find($request -> division_id);
        $division -> delete();
    }
}
