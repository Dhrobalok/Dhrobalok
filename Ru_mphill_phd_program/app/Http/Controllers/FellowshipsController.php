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
    
    public function fellowshipstor(Request $request)
    {
        $student_course=Employee::where('roll',$request->roll)->first();
        if($student_course->course == 'Mphill')
        {
            $totalmonth_mphill=Fellowship::where('roll',$request->roll)
            ->where('course','Mphill')
       
           ->get()->count('month');

           $totalmonth_phd=Fellowship::where('roll',$request->roll)
            ->where('course','Mphill')
       
           ->get()->count('month');
        $totalamaount=Budgetmaster::where('accountid',$request->account)->first();
        //$expireamount=$totalamaount->amount<$request->rate;
        if($totalmonth_mphill==24 || $totalamaount->amount<$request->rate ||  $totalmonth_phd==12)
        {
             return redirect()->back()->with('danger', 'Fellowship time up Or Insufficent balane in account');
        }
        else
        {
        $fellow=new Fellowship;
        $fellow->name=$request->name;
        $fellow->roll=$request->roll;
        $fellow->session=$request->session;
        $fellow->course=$request->course;
        $fellow->rate=$request->rate;
        $fellow->account=$request->account;
        $fellow->month=$request->month;
        $fellow->year=$request->year;
        $image1 = $request -> file('section_officer');
        $image2 = $request -> file('secretary');
        $image3 = $request -> file('director');
        if($image1)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image1 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image1 -> move($upload_path,$image_full_name);
            $fellow -> section_officer = $image_url;

        }

        if($image2)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image2 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image2 -> move($upload_path,$image_full_name);
            $fellow -> secretary = $image_url;

        }

        if($image3)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image3 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image3 -> move($upload_path,$image_full_name);
            $fellow -> director = $image_url;

        }
        $fellow->save();
        $masterbudget=Budgetmaster::where('accountid',$request->account)->first();
        $totalbalance=$masterbudget->amount-$request->rate;

        // DB::table('rubudgets') 
        // ->where('account_id',$request->account)
       
        // ->update([ 'amount' => $totalbalance]);


        DB::table('budgetmasters') 
        ->where('accountid',$request->account)
       
        ->update([ 'amount' => $totalbalance]);

        return redirect()->back()->with('success', 'Data Insert !');
       }

     

        }

        else
        {
            $totalmonth=Fellowship::where('roll',$request->roll)
            ->where('course','Phd')
       
        ->get()->count('month');
        $totalamaount=Budgetmaster::where('accountid',$request->account)->first();
        // $expireamount=$totalamaount->amount<$request->rate;
        if($totalmonth==36 || $totalamaount->amount<$request->rate)
        {
             return redirect()->back()->with('danger', 'Fellowship time up Or Insufficent balane in account');
        }
        else
        {
        $fellow=new Fellowship;
        $fellow->name=$request->name;
        $fellow->roll=$request->roll;
        $fellow->session=$request->session;
        $fellow->course=$request->course;
        $fellow->rate=$request->rate;
        $fellow->account=$request->account;
        $fellow->month=$request->month;
        $fellow->year=$request->year;
        $image1 = $request -> file('section_officer');
        $image2 = $request -> file('secretary');
        $image3 = $request -> file('director');
        if($image1)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image1 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image1 -> move($upload_path,$image_full_name);
            $fellow -> section_officer = $image_url;

        }

        if($image2)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image2 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image2 -> move($upload_path,$image_full_name);
            $fellow -> secretary = $image_url;

        }

        if($image3)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image3 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image3 -> move($upload_path,$image_full_name);
            $fellow -> director = $image_url;

        }
        $fellow->save();
        $masterbudget=Budgetmaster::where('accountid',$request->account)->first();
        $totalbalance=$masterbudget->amount-$request->rate;

        // DB::table('rubudgets') 
        // ->where('account_id',$request->account)
       
        // ->update([ 'amount' => $totalbalance]);


        DB::table('budgetmasters') 
        ->where('accountid',$request->account)
       
        ->update([ 'amount' => $totalbalance]);

        return redirect()->back()->with('success', 'Data Insert !');
       }
        }
        
    }
    public function adminlogin(Request $request)
    {
        $password=User::where('email',$request->email)->first();
       // return $password->student_id;
        //$match=Hash::check($password,$request->password);
        if(Hash::check($request->password, $password->password) )
        {
            session()->put('rollno', $password->student_id);
            session()->put('authmail', $request->email);
           return redirect()->route('admin.index');
        }
        else
        {
            return redirect()->back();
        }
       

    }

    public function payslip_stor(Request $request)
    {
        $newpay=new Payslip;
        $newpay->name=$request->name;
        $newpay->roll=$request->roll;    
        $newpay->session=$request->session;
        $newpay->course=$request->course;
        $newpay->admission_fee=$request->admission_fee;
        $newpay->tution_fee=$request->tution_fee;
        $newpay->registration_fee=$request->registration_fee;
        $newpay->library_fee=$request->library_fee;
        $newpay->laboratory_fee=$request->laboratory_fee;
        $newpay->seat_rate=$request->seat_rate;
        $newpay->course_work_fee=$request->course_work_fee;
        $newpay->course_t_fee=$request->course_t_fee;
        $newpay->others=$request->others;
        $newpay->migration_fee=$request->migration_fee;
        $newpay->save();
        return redirect()->back();
    }

    public function teacher_index()
    {
        $teachers=Teacher::all();
        return view('backend.admin.FellowshipTeacher.index',['teacher'=>$teachers]);
    }

    public function teacher_create()
    {
        return view('backend.admin.FellowshipTeacher.create');
    }
    public function teacher_store(Request $request)
    {
        $teacher=new Teacher;
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->designation=$request->designation;
        $image = $request -> file('image');
        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $teacher->image = $image_url;
        }
        $teacher->save();
        return redirect()->back();
    }

    public function teacher_alocation()
    {
        $user=User::where('status',1)->get();
        $teachers=Teacher::all();
        return view('backend.admin.FellowshipTeacher.teacheralocation',['teacher'=>$teachers,'user'=>$user]);
    }
    public function teacher_alocate($teacher_id)
    {
        //return $teacher_id;
        $user=User::where('status',1)->get();
        //$teachers=Teacher::all();
        return view('backend.admin.FellowshipTeacher.teacheralocate',['teacher_id'=>$teacher_id,'user'=>$user]); 
      
    }
    public function alocate_confirm(Request $request)
    {
        // return $request;
    //    DB::table('teacheralocates')->where('teacher_id',$request->teacherid)->delete();
      $studentid =  $request->input('studentid', []);
      // $agreement_name =  $request->input('teacher', []);
       foreach($studentid as $index=>$value)
            {

                // $match=Teacheralocate::where('student_id',$studentid[$index])
                // ->where('teacher_id',$request->teacherid)
                // ->first();

                // if(!$match)
                // {
                //  // echo"sdda   ";
                    $agreement = new Teacheralocate([
                        'student_id' =>  $studentid[$index],
                        'teacher_id' =>  $request->teacherid,
                        
                 
                                                 ]);
                 
                         $agreement->save();

                // }

                // else
                // {
                //     DB::table('teacheralocates')->where('teacher_id',$request->teacherid)
                //     ->where('student_id',$studentid[$index])
                //     ->delete();
                // }

      



              }
         return redirect()->back();      

    }
}
