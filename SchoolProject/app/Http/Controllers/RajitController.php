<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;
use Str;
use Session;
use DB;
use App\Models\Payment;
use Validator;
use Alert;


class RajitController extends Controller
{
    public function Landingpage()
    {

        $onlineCourse=Course::where('learning_site',1)

        ->get();

        $offlineCourse=Course::where('learning_site',2)

        ->get();

        $featureCourse=Course::where('feature',1)

        ->get();
        return view('backend.Dashboard.landingPage',['featurecourse'=>$featureCourse,'onlinecourse'=>$onlineCourse,'offlinecourse'=>$offlineCourse]);
    }

    public function Communicate()
    {
        return view('backend.Dashboard.communication');
    }

    public function dashboard()
    {

        $alluser=User::select('year')->where('status',1)->distinct()->get();
        foreach($alluser as $key=>$user)
        {
            $year[$key]=$user->year;

            $alluser=User::where('year',$user->year)
            ->where('status',1)
            ->get();
            $number[$key]=count($alluser);

        }
        return view('backend.Dashboard.Dashboard',compact('year','number'));
    }

    public function Admindashboard()
    {

        $alluser=User::select('year')->where('status',1)->distinct()->get();
        foreach($alluser as $key=>$user)
        {
            $year[$key]=$user->year;

            $alluser=User::where('year',$user->year)
            ->where('status',1)
            ->get();
            $number[$key]=count($alluser);


        }

        return view('backend.Dashboard.AdminDashboard',compact('year','number'));
    }

    public function Addcourse()
    {
        Session::put('tasks_url',request()->fullUrl());
        return view('backend.admin.AllCourse');
    }

    public function coursesave()
    {
        $html=view('backend.admin.addCourse')->render();
        return response()->json(['html'=>$html, 'success'=>true]);
    }

    public function courseadd(Request $request)
    {


        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=600,max_height=600',
         ]);

   

            $course=new Course;
            $course->name=$request->course;
            $course->description=$request->description;
            $course->fees=$request->fees;
            $course->duration=$request->duration;
            $course->category_id=$request->category_id;
            $course->active=1;
            $image=$request -> file('image');

            if($image)
            {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $profile_photo_path1 = $image_url;
            }
            $course->image=$profile_photo_path1;
            $course->learning_site=$request->learning_site;
            $course->feature=$request->feature;
            $course->save();
            $payment=new Payment;
            $payment->course_id=$course->id;
            $payment->fullpayment=$request->fullpayment;
            $payment->installment=$request->installment;
            $payment->installment_amount=$request->installment_amount;
            $payment->s_date=$request->s_date;
            $payment->e_date=$request->e_date;

            $payment->save();



          toast('Course Added Successfully!','success','animated','toastMixin');
          return redirect()->back()->with('alrt', 'Please add batch of the Course');

    }


    public function courseEdit($id)
    {
        $course=Course::where('id',$id)->first();

        return view('backend.admin.EditCourse',compact('course'));

    }




    public function DeleteCourse($id)
    {
        Course::where('id',$id)
        ->update
        ([
            'active'=>0,
        ]);
        Payment::where('course_id',$id)
        ->update
        ([
            'active'=>0,
        ]);

        return redirect(session::get('tasks_url'))->with('Update','bcbcc');
    }



    public function payment()
    {
        Session::put('tasks_url',request()->fullUrl());
        return view('backend.admin.CoursePayment');

    }


    public function CoursePayment(Request $request)
    {
        $payment=new Payment;
        $payment->course_id=$request->course_id;
        $payment->fullpayment=$request->fullpayment;
        $payment->installment=$request->installment;
        $payment->special=$request->special;
        $payment->save();

        toast('Course Payment Added Successfully!','success','animated','toastMixin');

        return redirect(session::get('tasks_url'))->with('Update','bcbcc');

    }

    public function UpdatePayment(Request $request)
    {
        $id=$request->id;

        $html=view('backend.admin.EditCoursePay',compact('id'))->render();
        return response()->json(['html'=>$html, 'success'=>true]);


    }

    public function CoursePaymentUpdate(Request $request)
    {

        Payment::where('id', $request->id)
        ->update([
        'fullpayment' => $request->fullpayment,

        'installment' => $request->installment,
        'special' => $request->special,
        ]);

        return redirect()->back();

    }

    public function DeletePayment($id)
    {

        DB::table('payments')->where('id', $id)->delete();
        return redirect()->back();

    }

    public function DeleteSchedule($id)
    {
        DB::table('schedules')->where('id', $id)->delete();
        return redirect()->back();

    }

    public function CategoryFind($id)
    {


      $details=Course::select('name','id')->where('category_id',$id)
      ->where('active',1)
      ->get();
            $response=array(
                'status'=>1,
                'course'=>$details,

            );


            // return response()->json(['status' => true, 'data' => $response]);
             return response()->json($response, 200);
    }


}
