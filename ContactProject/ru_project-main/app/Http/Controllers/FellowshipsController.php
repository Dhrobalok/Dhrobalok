<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeType;
use App\Models\Designation;
use App\Models\Department;
use App\Models\User;
use App\Models\Payslip;
use App\Models\Employee;
use App\Models\Teacher;
use App\Models\Teacheralocate;

use Str;
use Auth;
use App\Models\EmployeeSalary;
use App\Models\EmployeePFContributionRate;
use App\Models\EmployeeContactAddress;
use App\Models\EmployeeEmergencyContact;
use App\Models\EmployeeAcademicDetail;
use App\Models\EmployeePreviousWorkingExperienceDetail;
use App\Models\CompanySettings;
use App\Models\EmployeeDivision;
use App\Models\EmployeeSection;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use App\Models\Fellowship;
use App\Models\ChartOfAccount;
use App\Models\Budgetmaster;
use App\Models\Rubudget;
use DB;




class FellowshipsController extends Controller
{
    
   
    public function adminlogin(Request $request)
    {
        $password=User::where('email',$request->email)->first();
      
        if(Hash::check($request->password, $password->password) &&  $password->status==2)
        {
            session()->put('status', $password->status);
            session()->put('rollno', $password->status);
            session()->put('emailname',$request->email);
            return redirect()->route('admin.index');
        }
        else
        {
            return redirect()->back()->with('message','You have no permission for login !');
        }
       

    }

   
}
