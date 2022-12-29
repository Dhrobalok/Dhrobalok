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
use App\Models\Trainer;
use App\Models\Schedule;
use App\Models\Coursecategore;
use App\Models\Courseenroll;
use App\Models\Batch;
use Alert;

class SchedulController extends Controller
{
    public function SchedulAdd()
    {
        return view('backend.admin.schedul');
    }

    public function trainerAdd()
    {
        return view('backend.admin.Trainer');
    }

    public function SaveTrainer(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email'
            ]
        );

        $trainer=new User;
        $trainer->name=$request->name;
        $trainer->email=$request->email;
        $trainer->p_no=$request->mobile;

        $image=$request -> file('file');

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

        $trainer->image=$profile_photo_path1;
        $trainer->status=3;
        $trainer->save();
        return redirect()->back();
    }


    public function trainerEdit($id)
    {
        $alltrainer=User::find($id);
        return response()->json([
            'status' =>200,
            'trainer' =>$alltrainer,
        ]);
    }

    public function trainerUpdate(Request $request)
    {



        $image=$request -> file('file');

        if($image)
        {
        $image_name = Str :: random(20);
        $extension = strtolower($image -> getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $extension;
        $upload_path = 'images/';
        $image_url = $upload_path.$image_full_name;
        $image -> move($upload_path,$image_full_name);
        $profile_photo_path1 = $image_url;

        User::where('id', $request->id)
        ->update([
        'image' => $profile_photo_path1
        ]);

        }

        User::where('id', $request->id)
        ->update([
        'name' => $request->name,
        'email' => $request->email,
        'p_no' => $request->mobile,

        ]);

        toast('Trainer Updated Successfully!','success','animated','toastMixin');
        return redirect()->back();

    }

    public function trainerDelete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        DB::table('schedules')->where('trainer_id', $id)->delete();
        return redirect()->back();
    }

    public function CourseEdit($id)
    {

       $allcourse=Course::find($id);
       $Paymentcourse=Payment::where('course_id',$id)->first();
        return view('backend.admin.courseEdit',compact('allcourse','Paymentcourse'));

    }

    public function updatecourse(Request $request)
    {

                 

                    $this->validate($request, [

                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=600,max_height=340',
                    ]);

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

                    Course::where('id', $request->id)
                    ->update([
                    'image' => $profile_photo_path1
                    ]);

                    }

                    Course::where('id', $request->id)
                    ->update([
                    'name' => $request->course,
                    'description' => $request->description,
                    'fees' => $request->fees,
                    'duration' => $request->duration,
                    'category_id'=>$request->category_id,
                    'learning_site'=>$request->learning_site,
                    'feature'=>$request->feature,
                    ]);

                    Payment::where('course_id', $request->id)
                    ->update([

                        'fullpayment'=>$request->fullpayment,
                        'installment'=>$request->installment,
                        'installment_amount'=>$request->installment_amount,
                        's_date'=>$request->s_date,
                        'e_date'=>$request->e_date,

                    ]);


                    toast('Course Updated!','success','animated','toastMixin');
                    return redirect(session::get('tasks_url'))->with('Update','bcbcc');


    }

    public function saveSchedul(Request $request)
    {

            $schedulcheck=Schedule::where('course_id', $request->course)
            ->where('batch',$request->bnumber)
            ->first();

            $batch=Batch::where('course_id', $request->course)
            ->where('batch_number',$request->bnumber)
            ->get();

            $batchtime=Batch::where('course_id', $request->course)
            ->where('batch_number',$request->bnumber)
            ->first();

            if($schedulcheck)
            {
                return redirect()->back()->with('msg','Another Schedule is Alocated in this time');
            }
            else
            {
                $schedule=new Schedule;

                $schedule->course_id=$request->course;
                $schedule->batch=$request->bnumber;
                $schedule->trainer_id=$request->trainer_id;
                $schedule->save();


            }



                $allday=$batchtime->day;








         $course=Course::where('id',$request->course)->first();
         $Trainer=User::where('id',$request->trainer_id)->where('status',3)->first();





         $details = [
            'title' => 'Mail from rajIT School',
            'course_name'=>$course->name,
            'schedule' =>'Your class schedule day' .$allday,
            'duration'=>'Your class duration time' .$batchtime->time,

            ];

        \Mail::to($Trainer->email)->send(new \App\Mail\Trainermail($details));

        // $student=Courseenroll::where('course',$request->course)
        // ->where('active',1)
        // ->get();

        // foreach($student as $studentid)
        // {
        //     $user=User::find($studentid->user_id);
        //     if($user)
        //     {

        //      \Mail::to($user->email)->send(new \App\Mail\Trainermail($details));

        //     }

        // }

         return redirect()->back();



    }

    public function ScheduleEdit($id)
    {

        $allschedule=Schedule::find($id);

        return response()->json([
            'status' =>200,
            'schedules' => $allschedule,
        ]);

    }

    public function ScheduleUpdate(Request $request)

    {

        Schedule::where('id', $request->id)
        ->update([
        'day' => $request->day,
        'duration' => $request->duration,
        'course_id' => $request->course,
        'trainer_id' => $request->trainer_id,
        ]);

        return redirect()->back();


    }


    public function CourseCategory()
    {
        $allcategory=Coursecategore::get();
        return view('backend.admin.Coursecategory',['coursecategory'=>$allcategory]);
    }

    public function CategoryUpload(Request $request)
    {
        $coursecategory=new Coursecategore;
        $coursecategory->name=$request->name;

        $coursecategory->save();
        return redirect()->back();

    }

    public function Deletecategory($id)
    {
        DB::table('coursecategores')->where('id',$id)->Delete();
        return redirect()->back();
    }

    public function Editcategory($id)
    {

        $allcategory=Coursecategore::find($id);

        return response()->json([
            'status' =>200,
            'categores' => $allcategory,
        ]);

    }

    public function updatecategory(Request $request)
    {
        Coursecategore::where('id', $request->id)
        ->update([
        'name' => $request->name,

        ]);

        return redirect()->back();
    }

    public function ActiveCourse($id)
    {

       Course::where('id',$id)
       ->update([
         'active'=>1,
       ]);

       Payment::where('course_id',$id)
       ->update([
         'active'=>1,
       ]);

       return redirect()->back();

    }
    //
}
