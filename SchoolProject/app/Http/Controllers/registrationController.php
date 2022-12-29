<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;
use Session;
use Carbon\Carbon;
use Mail;
use App\Models\Courseenroll;
use App\Models\Course;
use App\Models\Promocode;
use App\Models\Usertime;
use App\Models\Batch;
use App\Models\Payment;
use Spatie\Permission\Models\Role;

class registrationController extends Controller
{

    public function index()
    {
       return view('backend.UserAuth.registration');
    }

    public function SaveUser(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email'
            ]
        );

        $carbon=Carbon::now()->format('Y-m-d');

        $ldate=Course::where('id',$request->course_id)->first();



         if($request->criteria=="promocode")
         {

            $promo=Promocode::where('course_id',$request->course_id)
            ->where('code',$request->promocode)
            ->first();

            if($promo && $promo->from<=$carbon && $promo->to>=$carbon)
            {


                    $d=Carbon::now();
                    $year=$d->year;
                    $user=new User;
                    $user->name=$request->name;

                    $user->p_no=$request->mobile;


                    $user->email=$request->email;
                    $hashedPassword = Hash::make($request->password);
                    $user->password=$hashedPassword;


                    $user->year=$year;
                    $user->status=1;
                    $user->save();

                    $user->assignRole('user');

                    $course_amount=Course::where('id',$request->course_id)->first();
                    $Promocode=Promocode::where('course_id',$request->course_id)->first();
                    $amount=($course_amount->fees*$Promocode->discount)/100;
                    $total_amount=$course_amount->fees-$amount;

                    $Courseenroll=new Courseenroll;
                    $Courseenroll->user_id=$user->id;
                    $Courseenroll->amount=$total_amount;

                    $Courseenroll->course=$request->course_id;
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
                        $usertime->course_id=$request->course_id;
                        $usertime->user_id=$user->id;
                        $usertime->batch=$batchN->batch_number;
                        $usertime->active=0;
                        $usertime->save();

                     }


                    // $Courseenroll->day=$request->day;
                    // $Courseenroll->time=$request->time;

                    return redirect()->action([registrationController :: class,'registerlogin'], ['email'=>$request->email,'password'=>$request->password]);








            }

            if(!$promo)
            {
                return redirect()->back()->with('alarm2','This promocode not match with our code or expaire date');

            }

         }





         else
         {


                $d=Carbon::now();
                $year=$d->year;
                $user=new User;
                $user->name=$request->name;

                $user->p_no=$request->mobile;


                $user->email=$request->email;
                $hashedPassword = Hash::make($request->password);
                $user->password=$hashedPassword;


                $user->year=$year;
                $user->status=1;
                $user->save();


                $user->assignRole('user');

                $course_amount=Course::where('id',$request->course_id)->first();

                $Courseenroll=new Courseenroll;
                $Courseenroll->user_id=$user->id;

                $Courseenroll->course=$request->course_id;
                $Courseenroll->batch=$request->batch;


                if($request->criteria=="installment")
                {
                    $course_amount=Payment::where('course_id',$request->course_id)->first();
                    $Courseenroll->criteria=$request->criteria;
                    $Courseenroll->amount=$course_amount->installment_amount;

                }

                elseif($request->criteria=="fullpayment")
                {
                    $course_amount=Payment::where('course_id',$request->course_id)->first();
                    $Courseenroll->criteria=$request->criteria;
                    $Courseenroll->amount=$course_amount->fullpayment;
                }

                else
                {
                    $Courseenroll->criteria=$request->criteria;
                    $Courseenroll->amount=$course_amount->fees;
                }


                $Courseenroll->day=null;
                $Courseenroll->time=null;
                $Courseenroll->active=0;
                $Courseenroll->save();

                $time=$request->time;

                foreach($time as $index=>$alltime)
                {
                   $usertime=new Usertime;
                   $batchN=Batch::where('time',$request->time[$index])->first();
                   $usertime->time=$request->time[$index];
                   $usertime->day=$request->day[$index];
                   $usertime->course_id=$request->course_id;
                   $usertime->user_id=$user->id;
                   $usertime->batch=$batchN->batch_number;
                   $usertime->active=0;
                   $usertime->save();

                }



               return redirect()->action([registrationController :: class,'registerlogin'],['email'=>$request->email,'password'=>$request->password]);


            }









    }

    public function UserLogin()
    {
        return view('backend.UserAuth.login');
    }

    public function LoginUser(Request $request)
    {

        $email=User::where('email',$request->email)->first();
        if($email)
        {
              if($email->status==1)
              {
                if(Hash::check($request->password, $email->password))
                {

                    session()->put('email', $email->name);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$email->id);
                    $dt = Carbon::parse($email->created_at);
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



                    return view('backend.Dashboard.Dashboard',compact('year','number'));
                  }

                else
                  {
                      return redirect()->back()->with('msg','Email or Password Incorrect !');
                  }


              }

              if($email->status==2)
              {



                if(Hash::check($request->password, $email->password))
                {

                    session()->put('email', $email->name);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$email->id);

                    $user_id=Session::get('user_id');
                    $dt = Carbon::parse($email->created_at);
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

                else
                  {
                      return redirect()->back()->with('msg','Email or Password Incorrect !');
                  }

              }

            //   else
            //   {
            //     return redirect()->back()->with('msg','You have no permission for login !');

            //   }







               if($email->status==4)
              {



                if(Hash::check($request->password, $email->password))
                {

                    session()->put('email', $email->name);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$email->id);

                    $user_id=Session::get('user_id');
                    $dt = Carbon::parse($email->created_at);
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

                else
                  {
                      return redirect()->back()->with('msg','Email or Password Incorrect !');
                  }

              }

              else
              {
                return redirect()->back()->with('msg','You have no permission for login !');

              }




        }

        else
        {
            return redirect()->back()->with('msg','Email or Password Incorrect !');

        }


    }







    public function registerlogin($email,$password)
    {
        $email=User::where('email',$email)->first();
        if($email)
        {

            if($email->status==1)
            {
              if(Hash::check($password, $email->password))
              {

                  session()->put('email', $email->name);
                  session()->put('name',  $email->name);
                  session()->put('user_id',$email->id);
                  $dt = Carbon::parse($email->created_at);
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



                  return view('backend.Dashboard.Dashboard',compact('year','number'));
                }

              else
                {
                    return redirect()->back()->with('msg','Email or Password Incorrect !');
                }


            }

        }


    }

    public function paymentpage($enrollid)
    {



         $alluser=Courseenroll::where('id',$enrollid)->first();
        return view('backend.Dashboard.paymentDetails',['userid'=>$alluser]);

    }

    public function paymentpageUser($id)
    {


        $alluser=Courseenroll::where('id',$id)->first();
        return view('backend.Dashboard.paymentUser',['userid'=>$alluser]);

    }

    public function Profile()
    {
        $user_id=Session::get('user_id');
        $user=User::find($user_id);
        $courseenroll=Courseenroll::where('user_id',$user_id)->get();
        return view('backend.Dashboard.userProfile',['user'=>$user,'enroll'=>$courseenroll]);
    }
    //
}
