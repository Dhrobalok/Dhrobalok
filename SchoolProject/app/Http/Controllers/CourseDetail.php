<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Coursecontent;
use App\Models\Courseenroll;
use App\Models\User;
use Str;
use Response;
use DB;
use Session;
use App\Models\Schedule;
use Illuminate\Support\Facades\Redirect;
use App\Models\Batch;
use App\Models\Header;
use App\Models\Description;
use App\Models\Exam;
use Carbon\Carbon;

use App\Imports\resultsImport;
use Excel;
use App\Models\Examresult;
use Config;
use App\Models\Mail;
use App\Models\Messagehead;
use App\Models\Promocode;
use App\Models\Specialdiscount;
use App\Models\Discount;
use App\Models\Payment;
use App\Models\Usertime;
use App\Models\Seminarentre;
use App\Models\Upcomingcourse;
use Alert;

use Auth;

class CourseDetail extends Controller
{
    public function index($id)
    {

        $allcourse=Course::find($id);
        return view('backend.Dashboard.CourseDetails',['course'=>$allcourse]);

    }

    public function content()
    {
        return view('backend.admin.CourseContent');
    }

    public function contentSave(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,mp4,pdf|'
        ]);

        $content=new Coursecontent;
        $content->name=$request->course_id;
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
        $content->file=$profile_photo_path1;
        $content->link=$request->link;
        $content->type=$request->file('file')->getClientOriginalExtension();
        $content->save();


        if($content)
        {
            toast('CourseContent Added Successfully!','success','animated','toastMixin');
            return redirect()->back();
        }

        else
        {
            toast('CourseContent Not Added!','danger','animated','toastMixin');
            return redirect()->back();

        }



    }

    public function fileDownload($id)
    {
           $file=Coursecontent::where('id',$id)->first();
           $filepath = public_path($file->file);

           return Response::download($filepath);



    }

    public function ContentEdit($id)
    {


        $allschedule=Coursecontent::find($id);

        return response()->json([
            'status' =>200,
            'content' => $allschedule,
        ]);
    }


    public function ContentUpdate(Request $request)
    {

        $request->validate([
            'file' => '|mimes:png,jpg,jpeg,mp4,pdf|'
        ]);

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

            Coursecontent::where('id', $request->id)
            ->update
            ([
                'file' => $profile_photo_path1
            ]);

        }

        Coursecontent::where('id', $request->id)
        ->update
        ([
                'name' => $request->course_id,
                'link' => $request->link,

        ]);



        return redirect()->back();
    }


    public function ContentDelete($id)
    {

        DB::table('coursecontents')->where('id',$id)->delete();
        return redirect()->back();

    }

    public function CourseEnroll()
    {
        $userid=Session::get('user_id');
        $enroll=Courseenroll::where('user_id',$userid)->get();
        return view('backend.Dashboard.EnrollCourse',['enroll'=>$enroll]);

    }

    public function CourseCreate(Request $request)
    {




        // $ldate=Course::where('id',$request->course)->first();
        $carbon=Carbon::now()->format('Y-m-d');

        $batchday=Batch::where('course_id',$request->course)
        ->where('time',$request->time)
        ->where('day',$request->day)
        ->first();

        // $batchtime=Batch::where('course_id',$request->course_id)
        // ->where('batch_number',$request->bnumber)
        // ->first();



        $carbon=Carbon::now()->format('Y-m-d');


        if($request->criteria && $request->promocode)
        {

            return redirect()->back()->with('alarm','Please choose criteria or promocode');
        }



          if($request->promocode)
               {


                    $promo=Promocode::where('course_id',$request->course)
                    ->where('code',$request->promocode)
                    ->first();

                if($promo && $promo->from<=$carbon && $promo->to>=$carbon)
                    {


                        $user_id=Auth::user()->id;
                        $course_amount=Course::where('id',$request->course)->first();
                        $Promocode=Promocode::where('course_id',$request->course)->first();
                        $amount=($course_amount->fees*$Promocode->discount)/100;
                        $total_amount=$course_amount->fees-$amount;

                        $Courseenroll=new Courseenroll;
                        $Courseenroll->user_id=$user_id;
                        $Courseenroll->amount=$total_amount;

                        $Courseenroll->course=$request->course;
                        $Courseenroll->batch=null;
                        $Courseenroll->time=null;
                        $Courseenroll->day=null;
                        if($request->criteria)
                        {
                            $Courseenroll->criteria=$request->criteria;

                        }
                        else
                        {
                            $Courseenroll->criteria=$request->promocode;

                        }


                        $Courseenroll->active=0;
                        $Courseenroll->save();

                         $time=$request->time;

                         foreach($time as $index=>$alltime)
                         {
                            $usertime=new Usertime;
                            $batchN=Batch::where('time',$request->time[$index])->first();
                            $usertime->time=$request->time[$index];
                            $usertime->day=$request->day[$index];
                            $usertime->course_id=$request->course;
                            $usertime->user_id=$user_id;
                            $usertime->batch=$batchN->batch_number;
                            $usertime->active=0;
                            $usertime->save();

                         }
                            return redirect()->action([registrationController :: class,'paymentpageUser'], ['id' => $Courseenroll->id]);



                    }

                    else
                    {
                        return redirect()->back()->with('alarm2','This promocode not match with our code or expaire date');
                    }

        }

        else
        {


                $user_id=Session::get('user_id');
                $course_amount=Course::where('id',$request->course)->first();
                $Courseenroll=new Courseenroll;
                $Courseenroll->user_id=$user_id;

                $Courseenroll->course=$request->course;


                if($request->criteria=="installment")
                {
                        $time=Carbon::now()->format('m-d-y');
                        $course_amount=Payment::where('course_id',$request->course)->first();
                        $course_fees=Course::where('id',$request->course)->first();
                        // $Courseenroll->criteria=$request->criteria;
                        // $Courseenroll->amount=$course_amount->installment_amount;

                        // $course_amount=Payment::where('course_id',$data['course_id'])->first();

                        if($course_amount->s_date!=null)
                        {

                            if($course_amount->s_date>=$time && $time<=$course_amount->e_date)
                            {
                                $Courseenroll->criteria=$request->criteria;
                                $Courseenroll->amount=$course_fees->fees-$course_amount->installment_amount;

                            }
                            else
                            {
                                $Courseenroll->criteria=$request->criteria;
                                $Courseenroll->amount=$course_fees->fees;

                            }

                        }

                        else
                        {
                                $Courseenroll->criteria=$request->criteria;
                                $Courseenroll->amount=$course_fees->fees;

                        }



                }


                elseif($request->criteria=="fullpayment")
                {
                    $course_amount=Payment::where('course_id',$request->course)->first();
                    $coursefee=Course::where('id',$request->course)->first();
                    $Courseenroll->criteria=$request->criteria;
                    $Courseenroll->amount= $coursefee->fees-$course_amount->fullpayment;
                }

                else
                {
                    $Courseenroll->criteria=$request->criteria;
                    $Courseenroll->amount=$course_amount->fees;
                }


                $Courseenroll->day=null;
                $Courseenroll->time=null;

                if($request->criteria)
                {
                    $Courseenroll->criteria=$request->criteria;

                }

                else
                {
                    $Courseenroll->criteria=$request->promocode;
                }

                $Courseenroll->active=0;
                $Courseenroll->save();

                $time=$request->time;

                // $Courseenroll->day=$request->day;
                // $Courseenroll->time=$request->time;
                $Courseenroll->batch=0;
                $Courseenroll->active=0;

                $Courseenroll->save();

                 $time=$request->time;

                     foreach($time as $index=>$alltime)
                     {
                        $usertime=new Usertime;
                        $batchN=Batch::where('time',$request->time[$index])->first();
                        $usertime->time=$request->time[$index];
                        $usertime->day=$request->day[$index];
                        $usertime->course_id=$request->course;
                        $usertime->user_id=$user_id;
                        $usertime->batch=$batchN->batch_number;
                        $usertime->active=0;
                        $usertime->save();

                     }

                return redirect()->action([registrationController :: class,'paymentpageUser'], ['id' => $Courseenroll->id]);



        }



    }


    public function TrainerRemainder($id)
    {


              $user=User::find($id);
              $allschedule=Schedule::where('trainer_id',$id)->get();

             foreach($allschedule as $index=>$schedule)
             {

                  $alldays=Batch::where('course_id',$schedule->course_id)
                  ->where('batch_number',$schedule->batch)
                  ->pluck('day');

                  $alltime=Batch::where('course_id',$schedule->course_id)
                  ->where('batch_number',$schedule->batch)
                  ->pluck('time');

                  $details = [
                    'title' => 'Mail from rajIT School',
                    'schedule' =>'Your class schedule day' .$alldays,
                    'duration'=>'Your class duration time' .$alltime,

                    ];

                 \Mail::to($user->email)->send(new \App\Mail\RemainderMail($details));



                    // $daysall[]=$schedule->day;
                    // $durationall[]=$schedule->duration;


             }



            //  $alldays=json_encode($daysall);
            //  $allduration=json_encode($durationall);



            // $courseid=Schedule::select('course_id')->where('trainer_id',$id)->distinct()->get();
            // foreach($courseid as $c_id)
            // {
            //      $student=Courseenroll::where('course',$c_id->course_id)
            //     ->where('active',1)
            //     ->get();

            //     foreach($student as $studentid)
            //     {
            //         $user=User::find($studentid->user_id);
            //         if($user)
            //         {

            //          \Mail::to($user->email)->send(new \App\Mail\RemainderMail($details));

            //         }

            //     }

            // }

            return redirect()->back();
        //   return Redirect::to('Trainer/back')->with('remainder','remainder message');




    }

    public function TrainerBack()
    {

        $alluser=User::select('year')->where('status',1)->distinct()->get();

                    if($alluser!='[]')
                    {
                        foreach($alluser as $key=>$user)
                        {
                            $year[$key]=$user->year;

                            $alluser=User::where('year',$user->year)
                            ->where('status',1)
                            ->get();
                            $number[$key]=count($alluser);


                        }

                    }

                    else
                    {

                            $year[]=0;
                            $number[]=0;



                    }
          return view('backend.Dashboard.AdminDashboard',compact('year','number'));

    }




    public function AllStudent()
    {
        return view('backend.Dashboard.AllStudent');
    }

    public function ActiveStudent($id)
    {
        User::where('id', $id)
        ->update([
            'status'=>1,
        ]);

        return redirect()->back();


    }

    public function InactiveStudent($id)
    {
        User::where('id', $id)
        ->update([
            'status'=>0,
        ]);

        return redirect()->back();

    }

    public function ViewStudent($id)
    {
        $user=User::find($id);

        $allcourse=Courseenroll::where('user_id',$id)->get();

        $html=view('backend.admin.studentPayment',compact('allcourse','id'))->render();

        return response()->json(['html'=>$html, 'success'=>true]);
        // foreach($allcourse as $course)
        // {
        //     $name=Course::where('id',$course->course)->first();

        //     $courseall[]=$name->name;
        //     $fee[]=$name->fees;

        //     if($course->active==1)
        //     {
        //         $status[]="Pay";
        //     }

        //     else
        //     {
        //         $status[]="Due";
        //     }
        // }



        //     $response=array(
        //         'status'=>1,
        //         'users'=>$user,
        //         'courseall'=>$courseall,
        //         'status'=>$status,

        //     );



        //      return response()->json($response, 200);
    }



    public function AddBatch()
    {
       $batchinfo=Batch::select('course_id')
       ->where('active',1)
       ->distinct()->get();


       return view('backend.admin.coursebatch',['batchinfo'=>$batchinfo]);
    }

    public function BatchSave(Request $request)
    {

        $days =  $request->input('day', []);



        foreach($days as $index=>$alldays)
        {

            $schedulcheck=Batch::where('day', $request->day[$index])
            ->Where('time',$request->time)

            ->first();

            if($schedulcheck)
            {
                return redirect()->back()->with('msg','Another Batch is Alocated in this time');
            }

        }


               $alldays=implode("-",$days);

                $schedule=new Batch;
                $schedule->day=$alldays;
                $schedule->course_id=$request->course_id;
                $schedule->time=$request->time;
                $schedule->batch_number=$request->batch_number;
                $schedule->s_date=$request->s_date;
                $schedule->l_date=$request->l_date;
                $schedule->seat=$request->seat;
                $schedule->active=1;
                $schedule->save();

                return redirect()->back();

    }

    public function EnrollId($id)
    {



       $batch_n=Batch::select('batch_number','time','day')->where('course_id',$id)
       ->where('active',1)
       ->distinct()->get();

        $response=array(
            'status'=>1,
            'batch'=>$batch_n,

        );



         return response()->json($response,200);

    }

    public function BatchId($id)
    {
         $day=Batch::where('batch_number',$id)->pluck('day');
         $batch=Batch::where('batch_number',$id)->pluck('time');
        $response=array(
            'status'=>1,
            'day'=>$day,
            'time'=>$batch,


        );

         return response()->json($response, 200);
    }


    public function BatchDelete(Request $request)
    {

        DB::table('schedules')->where('course_id', $request->c_id)
        ->where('batch',$request->id)
        ->delete();

        DB::table('batches')->where('course_id', $request->c_id)
        ->where('batch_number',$request->id)
        ->update([
            'active' => 0
         ]);


        return response()->json();
    }


    public function expenditure()
    {
        return view('backend.admin.expenditure');
    }

    public function HeaderSave(Request $request)
    {

        $header=new Header;
        $header->name=$request->name;
        $header->save();
        return redirect()->back();
    }

    public function DescriptionSave(Request $request)
    {
       $description=new Description;
       $description->name=$request->name;
       $description->date=$request->date;
       $description->description=$request->description;
       $description->amount=$request->amount;

       $description->save();
       return redirect()->back();

    }

    public function ExamManagent()
    {
        return view('backend.admin.exammanagement');
    }

    public function ExamAdd(Request $request)
    {
        $exam=new Exam;
        $exam->course_id=$request->course;
        $exam->batch=$request->bnumber;
        $exam->e_name=$request->e_name;
        $exam->date=$request->e_date;
        $exam->t_mark=$request->t_mark;
        $exam->time=$request->time;
        $exam->save();
        return redirect()->back();
    }

    public function csvDownload()
    {


        $file= public_path(). "/company_pic/examresults.csv";

        return response()->download($file);


    }

    public function fileupload(Request $request)
    {



        $success=Excel::import(new resultsImport, $request->file('file'));
        if( $success)
        {
            Exam::where('course_id',$request->course)
            ->where('batch',$request->bnumber)
            ->update(
                [
                    'active'=>1,
                ]
                );

                // Mail Send after publish result

                $allresult=Examresult::where('course_id',$request->course)
                ->where('batch',$request->bnumber)

                ->get();

                $total_mark=Exam::where('course_id',$request->course)
                ->where('batch',$request->bnumber)
                ->first();


                $coursename=Course::where('id',$request->course)->first();
                $isetposition=Examresult::max('mark');

                foreach($allresult as $result)
                {
                    $msg=Mail::find(1);
                     $user=User::find($result->s_id);

                     $msg=str_replace("&Coursename",$coursename->name, $msg->messagebody);
                     $msg = str_replace("&highmark",$isetposition, $msg);
                     $msg = str_replace("&youmark",$result->mark,$msg);

                    // $details = [

                    //     'body' => $courseName,

                    //     'Hight Mark'=> $isetposition,
                    //     'mark' => $result->mark,


                    //  ];




                   \Mail::to($user->email)->send(new \App\Mail\resultmail($msg));


                }

                // Mail Send to each student after publish result

        }
        return redirect()->back();

    }

    public function Viewresult($id)
    {

        $exam=Exam::find($id);
        $c_id=$exam->course_id;
        $b_id=$exam->batch;

        $isetposition=Examresult::max('mark');



        $allresult=Examresult::where('course_id',$c_id)
        ->where('batch',$b_id)
        ->get();

        $html=view('backend.admin.viewresult',compact('allresult','id','isetposition'))->render();
        return response()->json(['html'=>$html, 'success'=>true]);
    }

    public function downlodresult($id)
    {
        $isetposition=Examresult::max('mark');

        $exam=Exam::find($id);
        $c_id=$exam->course_id;
        $b_id=$exam->batch;


        $allresult=Examresult::where('course_id',$c_id)
        ->where('batch',$b_id)
        ->get();

        $pdf = new \Mpdf\Mpdf();
        $content=view('backend.admin.downloadresult',compact('allresult','id','isetposition'));

        $pdf -> WriteHtml($content);
        $pdf -> output('Student Result.pdf','D');



    }



    public function MessageBody()
    {
       return view('backend.admin.mailBody');
    }

    public function MessageSave(Request $request)
    {
        $message=new Mail;
        $message->messagebody=$request->message;
        $message->save();

        Session::put('tasks_url',request()->fullUrl());
        return redirect()->back();

    }

    public function MessageHead(Request $request)
    {
         $head=new Messagehead;
         $head->head=$request->head;
         $head->save();
         return redirect()->back();

    }

    public function Editmessage($id)
    {
       $mail=Mail::where('id',$id)->first();

       return view('backend.admin.editmessage',['mail'=>$mail]);

    }


    public function UpdateMessage(Request $request)
    {

        DB::table('mails')->where('id', $request->id)

        ->update([
            'messagebody' => $request->message,
         ]);


        return redirect()->route('Message.body');

    }


    public function CourseDiscount()
    {
        return view('backend.admin.courseDiscount');
    }

    public  function DiscountSave(Request $request)
    {

        $coursediscount=new Specialdiscount;
        $coursediscount->course_id=$request->course_id;
        $coursediscount->discount=$request->discount;

        $coursediscount->save();
        return redirect()->back();


    }

    public function DiscounSet(Request $request)
    {

            $discountA=Specialdiscount::where('course_id',$request->c_id)->first();

            $discountCon=Discount::where('course_id',$request->c_id)
            ->where('user_id',$request->id)
            ->first();

            // $specialdiscountCon=Discount::where('course_id',$request->c_id)
            // ->where('user_id',$request->id)
            // ->where('s_active',1)
            // ->sum();

            $userAmountUpdate=Courseenroll::where('course',$request->c_id)
            ->where('user_id',$request->id)
           ->first();

            if($discountCon)
            {
                Discount::where('course_id',$request->c_id)
                ->where('user_id',$request->id)
                ->update([

                    'discount'=>$discountA->discount,
                    'active'=>1,

                ]);

                // $totaldiscount=$specialdiscountCon->special+$discountA->discount;

                $updateAmount=($userAmountUpdate->amount*$discountA->discount)/100;

                $totalUpdateAmount=$userAmountUpdate->amount-$updateAmount;

                Courseenroll::where('course',$request->c_id)
                ->where('user_id',$request->id)
                ->update([

                    'amount'=>$totalUpdateAmount,
                ]);



            }

            else
            {
                $discount=new Discount;
                $discount->user_id=$request->id;
                $discount->course_id=$request->c_id;
                $discount->discount=$discountA->discount;

                $discount->active=1;
                $discount->save();

                //Update amount of user courseenroll after set discount

                $updateAmount=($userAmountUpdate->amount*$discountA->discount)/100;

                $totalUpdateAmount=$userAmountUpdate->amount-$updateAmount;

                Courseenroll::where('course',$request->c_id)
                ->where('user_id',$request->id)
                ->update([

                    'amount'=>$totalUpdateAmount,
                ]);

            }



         return response()->json(['success'=>"Successfully Set"]);
    }

    public function EditDiscount($id)
    {
         $specialdiscount=Specialdiscount::where('id',$id)->first();
         $html=view('backend.admin.discountEdit',compact('specialdiscount'))->render();
         return response()->json(['html'=>$html,'status'=>true]);
    }

    public function DiscountUpdate(Request $request)
    {
        Specialdiscount::where('id',$request->id)
        ->update([
             'discount'=>$request->discount,

        ]);

        return redirect()->back();

    }

    public function DeleteDiscount($id)
    {
          Specialdiscount::where('id',$id)

          ->delete();
          return redirect()->back();

    }


    public function OrderSummer(Request $request)
    {


                if($request->id=="fullpayment")
                {

                    $coursefee=Course::where('id',$request->c_id)->first();
                    $payment=Payment::where('course_id',$request->c_id)->first();
                    $status="Fullpayment";
                    $description="<span style=color:red;>"."You have to pay this amount at a time."."</span>";
                    $value= $coursefee->fees-$payment->fullpayment;
                    return response()->json(['status'=>$status,'description'=>$description,'value'=>$value]);



                }

                else if($request->id=="installment")
                {
                    $course=Course::where('id',$request->c_id)->first();

                    $time=Carbon::now()->format('m-d-y');
                    $payment=Payment::where('course_id',$request->c_id)->first();

                    if($payment->s_date!=null)

                         {
                            if($payment->s_date>=$time && $time<=$payment->e_date)
                            {
                                $status="Installment";
                                $description="<span style=color:red;>"."Your installment period"."&nbsp;".$payment->installment."&nbsp;". "Months". "</span>"."\n"."\n". "You have to pay this amount for each moth of installment period.";
                                $value=round(($course->fees-$payment->installment_amount)/$payment->installment);
                                return response()->json(['status'=>$status, 'description'=>$description, 'value'=>$value]);

                            }

                            else
                            {
                                $status="Installment";
                                $description="<span style=color:red;>"."Your installment period"."&nbsp;".$payment->installment."&nbsp;". "Months". "</span>"."\n"."\n". "You have to pay this amount for each moth of installment period.";
                                $value=$course->fees/$payment->installment;
                                return response()->json(['status'=>$status, 'description'=>$description, 'value'=>$value]);

                            }


                         }

                         else
                         {
                            $status="Installment";
                            $description="<span style=color:red;>"."Your installment period"."&nbsp;".$payment->installment."&nbsp;". "Months". "</span>"."\n"."\n". "You have to pay this amount for each moth of installment period.";
                            $value=$course->fees/$payment->installment;
                            return response()->json(['status'=>$status, 'description'=>$description, 'value'=>$value]);


                         }



                }

                else if($request->id=="regularpayment")
                {

                    $payment=Course::where('id',$request->c_id)->first();
                    $status="RegularPayment";
                    $description="<span style=color:red;>"."You have to pay this amount at a time"."</span>";
                    $value=$payment->fees;
                    return response()->json(['status'=>$status, 'description'=>$description, 'value'=>$value]);

                }

                else
                {

                    $payment=Promocode::where('course_id',$request->c_id)->first();
                    $promocode=Course::where('id',$request->c_id)->first();
                    $status="Promocode";
                    $description="<span style=color:red;>"."You get"."&nbsp;".$payment->discount."% discount for this course"."</span>"."\n"."You have to pay this amount at a time";
                    $total=round(($promocode->fees*$payment->discount)/100);
                    $value=$promocode->fees-$total;
                    return response()->json(['status'=>$status, 'description'=>$description, 'value'=>$value]);

                }

    }


    public function BatchAssign(Request $request)
    {

       $alltime=Usertime::where('user_id',$request->id)

        ->get();

        $html=view('backend.admin.Assignbatch',compact('alltime'))->render();
        return response()->json(['html'=>$html,'status'=>true]);

    }

    public function BatchConfirm(Request $request)
    {


           Usertime::where('id',$request->id)
          ->update([

            'active'=>1,
          ]);

          $timeuser=Usertime::where('id',$request->id)->first();

          Usertime::where('user_id',$timeuser->user_id)
          ->where('course_id',$timeuser->course_id)
          ->where('active',0)

          ->delete();





        Courseenroll::where('user_id',$timeuser->user_id)
        ->where('course',$timeuser->course_id)
       ->update([

           'time'=>$timeuser->time,
           'day'=>$timeuser->day,
           'batch'=>$timeuser->batch,


       ]);




       return response()->json(['status'=>true]);
    }

    public function specialDiscount(Request $request)
    {

        $user_id=$request->id;
        $c_id=$request->c_id;
        $html=view('backend.admin.specialDiscount',compact('user_id','c_id'))->render();
        return response()->json(['html'=>$html,'status'=>true]);
    }


    public function specialDiscountSave(Request $request)
    {


        $discountA=Discount::where('course_id',$request->c_id)
         ->where('user_id',$request->user_id)
        ->first();



        if($discountA)
        {

            Discount::where('course_id',$request->c_id)
            ->where('user_id',$request->user_id)
            ->update([

                'special'=>$request->special,

            ]);


            $details = [

                'description' =>'New special discount waiting for approval',


                ];

                $superadmin=User::where('status',4)->first();

             \Mail::to($superadmin->email)->send(new \App\Mail\Superadmin($details));


        }

        else
        {
            $discount=new Discount;
            $discount->user_id=$request->user_id;
            $discount->course_id=$request->c_id;
            $discount->special=$request->special;

            $discount->save();

            $details = [

                'description' =>'New special discount waiting for approval',


                ];

            $superadmin=User::where('status',4)->first();

            \Mail::to($superadmin->email)->send(new \App\Mail\Superadmin($details));

        }




        return redirect()->back();
    }

    public function DiscountApprove()
    {
       $alldiscount=Discount::get();
       return view('backend.admin.approvediscount',compact('alldiscount'));
    }

    public function Approve(Request $request)
    {

        $discountCon=Discount::where('id',$request->val)

       ->first();

           $userAmountUpdate=Courseenroll::where('course',$discountCon->course_id)
           ->where('user_id',$discountCon->user_id)
          ->first();

        if($request->id==1)
        {

            Discount::where('id',$request->val)
            ->update([

                'active'=>1,
            ]);

        }

        else
        {

            Discount::where('id',$request->val)
            ->update([

                's_active'=>1,
            ]);



            //update Amount  of user
            $updateAmount=($userAmountUpdate->amount*$discountCon->special)/100;

            $totalUpdateAmount=$userAmountUpdate->amount-$updateAmount;

            Courseenroll::where('course',$discountCon->course_id)
            ->where('user_id',$discountCon->user_id)
            ->update([

                'amount'=>$totalUpdateAmount,
            ]);



        }


        return response()->json(['status'=>true]);

    }

    public function ApproveCancel(Request $request)
    {

        if($request->id==1)
        {

            Discount::where('id',$request->val)
            ->update([

                'active'=>0,
            ]);

        }

        else
        {

            Discount::where('id',$request->val)
            ->update([

                's_active'=>0,
            ]);

        }


        return response()->json(['status'=>true]);

    }


    public function EditSpecial(Request $request)
    {
        $id=$request->id;
        $val=$request->val;
        $special=Discount::where('id',$request->val)
        ->first();

       $html=view('backend.admin.Editspecial',compact('val','special'))->render();
       return response()->json(['html'=>$html,'status'=>true]);

    }

    public function updateSpecial(Request $request)
    {
        Discount::where('id',$request->id)
        ->update([

            'special'=>$request->special,
        ]);

       return redirect()->back();
    }



    public function Courseactive($id)
    {


         Courseenroll::where('id',$id)

         ->update([

            'active'=>1,
         ]);


         return redirect()->back();


    }

    public function Courseinactive($id)
    {

        Courseenroll::where('id',$id)

        ->update([

           'active'=>0,
        ]);


        return redirect()->back();

    }

    public function editAssignbatch(Request $request)
    {

        $userid=$request->c_id;
        $course_id=$request->id;
        $batchall=Batch::select('day','time')->where('course_id',$request->id)
        ->where('active',1)
        ->get();

        // $html=view('backend.admin.updateBatchassign',compact('batchall','userid','course_id'))->render();

        // $data = [$batchall,$userid, $course_id];
        // return response()->json([$batchall, $userid,$course_id]);
        // return response()->json($data);
         return response()->json([

            'html'=>$batchall,
            'userid'=>$request->c_id,
            'course_id'=>$request->id,


            ]);

    }

    public function updateAssignbatch(Request $request)
    {


        if($request->day!=null)
        {
            $day=$request->day;
            $alldays=implode(",",$day);

            Courseenroll::where('user_id',$request->userid)
            ->where('course',$request->courseid)
            ->update([
               'day'=>$alldays,

            ]);

            Usertime::where('user_id',$request->userid)
            ->where('course_id',$request->courseid)
            ->update([
               'day'=>$alldays,

            ]);


        }
        elseif($request->chooseday!=null)
        {
            $day=$request->chooseday;
             Courseenroll::where('user_id',$request->userid)
            ->where('course',$request->courseid)
            ->update([
               'day'=>$day,

            ]);


            Usertime::where('user_id',$request->userid)
            ->where('course_id',$request->courseid)
            ->update([
               'day'=>$day,

            ]);


        }



        elseif($request->entertime!=null)
        {


            Courseenroll::where('user_id',$request->userid)
            ->where('course',$request->courseid)
            ->update([
               'time'=>$request->entertime,

            ]);

            Usertime::where('user_id',$request->userid)
            ->where('course_id',$request->courseid)
            ->update([
               'time'=>$request->entertime,

            ]);


        }
        elseif($request->choosetime!=null)
        {

             Courseenroll::where('user_id',$request->userid)
            ->where('course',$request->courseid)
            ->update([
               'time'=>$request->choosetime,

            ]);


            Usertime::where('user_id',$request->userid)
            ->where('course_id',$request->courseid)
            ->update([
               'time'=>$request->choosetime,

            ]);


        }



         return redirect()->back();



    }

    public function EditBatch(Request $request)
    {
        $html=Batch::select('id','course_id','batch_number','day','time','s_date','l_date','seat')
        ->where('course_id',$request->c_id)
        ->where('batch_number',$request->id)
        ->first();

        return response()->json(['html'=>$html,'status'=>true]);


    }

    public function UpdateBatch(Request $request)
    {

        Batch::where('id',$request->id)
        ->update([
            'batch_number'=>$request->batch_number,
            'day'=>$request->day,
            'time'=>$request->time,
            's_date'=>$request->s_date,
            'l_date'=>$request->l_date,
            'seat'=>$request->seat,

        ]);

        return redirect()->back();

    }


    public function ActiveBatch(Request $request)
    {

      Batch::where('course_id',$request->c_id)
      ->where('batch_number',$request->id)
      ->update([

           'active'=>1
      ]);

      return response()->json();

    }

    public function FindCourse()
    {
        $online=Course::where('learning_site',1)->get();
        $offline=Course::where('learning_site',2)->get();
        return view('backend.Dashboard.findCourse',compact('online','offline'));
    }

    public function FindSeminar()
    {
        return view('backend.Dashboard.findSeminar');
    }

    public function Seminaradd($id)
    {
        $html=view('backend.Dashboard.seminarEntry',compact('id'))->render();
        return response()->json(['html'=>$html,'status'=>true]);
    }

    public function SeminarSave(Request $request)
    {

        $seminarentre=new Seminarentre;
        $seminarentre->name=$request->name;
        $seminarentre->course_id=$request->id;
        $seminarentre->email=$request->email;
        $seminarentre->mobile=$request->mobile;
        $seminarentre->save();

        $coursename=Upcomingcourse::where('id',$request->id)->first();

        $details = [

            'CourseName' =>$coursename->name,
            'Time' => 'Seminar Time' .$coursename->time,
            'date' => 'Seminar Date' .$coursename->date,


         ];



      \Mail::to($request->email)->send(new \App\Mail\SeminarMail($details));
        toast('Seminar Joined Successfully!','success','animated','toastMixin');





        return response()->json(['status'=>true,'message' => 'Seminar Successfully']);


    }

    public function SeminarAll()
    {
          $allseminar=Seminarentre::get();
          return view('backend.admin.AttendSeminar',compact('allseminar'));
    }

    public function UserSeminar($id)
    {
        DB::table('seminarentres')->where('id',$id)->delete();
        // Seminarentre::where('id',$id)->delete();

        toast('Seminar Deleted Successfully!','warning','animated','toastMixin');

        return redirect()->back();
    }
}
