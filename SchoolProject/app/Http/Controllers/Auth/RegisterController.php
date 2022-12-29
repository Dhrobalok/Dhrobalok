<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;

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

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $data)
    {

        $this->validate(
            $data,
            [
                'email' => 'required|email|unique:users,email'
            ]
        );

        $carbon=Carbon::now()->format('Y-m-d');

        $ldate=Course::where('id',$data->course_id)->first();



         if($data->criteria=="promocode")
         {

            $promo=Promocode::where('course_id',$data->course_id)
            ->where('code',$data->promocode)
            ->first();

            if($promo && $promo->from<=$carbon && $promo->to>=$carbon)
            {


                    $d=Carbon::now();
                    $year=$d->year;

                     $user=new User;
                     $user->name=$data->name;

                     $user->p_no=$data->mobile;


                     $user->email=$data->email;
                     $hashedPassword = Hash::make($data->password);
                     $user->password=$hashedPassword;


                     $user->year=$year;
                     $user->status=1;
                     $user->save();


                    //         $user=User::create([
                    //          'name' => $data->name,
                    //          'email' =>$data->email,
                    //          'password' => Hash::make($data->password),
                    //          'p_no'=>$data->mobile,
                    //          'year'=>$year,
                    //          'status'=>1,
                    // ]);


                    $course_amount=Course::where('id',$data->course_id)->first();
                    $Promocode=Promocode::where('course_id',$data->course_id)->first();
                    $amount=($course_amount->fees*$Promocode->discount)/100;
                    $total_amount=$course_amount->fees-$amount;

                    $Courseenroll=new Courseenroll;
                    $Courseenroll->user_id=$user->id;
                    $Courseenroll->amount=$total_amount;

                    $Courseenroll->course=$data->course_id;
                    $Courseenroll->batch=null;
                    $Courseenroll->time=null;
                    $Courseenroll->day=null;
                    if($data->criteria)
                    {
                        $Courseenroll->criteria=$data->criteria;

                    }
                    else
                    {
                        $Courseenroll->criteria=$data->promocode;

                    }


                    $Courseenroll->active=0;
                    $Courseenroll->save();

                     $time=$data->time;

                     foreach($time as $index=>$alltime)
                     {
                        $usertime=new Usertime;
                        $batchN=Batch::where('time',$data->time[$index])->first();
                        $usertime->time=$data->time[$index];
                        $usertime->day=$data->day[$index];
                        $usertime->course_id=$data->course_id;
                        $usertime->user_id=$user->id;
                        $usertime->batch=$batchN->batch_number;
                        $usertime->active=0;
                        $usertime->save();

                     }






                    //  $user=new User;
                    //  $user->name=$data->name;

                    //  $user->p_no=$data->mobile;


                    //  $user->email=$data->email;
                    //  $hashedPassword = Hash::make($data->password);
                    //  $user->password=$hashedPassword;


                    //  $user->year=$year;
                    //  $user->status=1;
                    //  $user->save();

                    // $Courseenroll->day=$request->day;
                    // $Courseenroll->time=$request->time;


                    return redirect()->action([RegisterController :: class,'registerlogin'],['email'=>$data->email,'password'=>$data->password]);



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
                $user->name=$data->name;

                $user->p_no=$data->mobile;


                $user->email=$data->email;
                $hashedPassword = Hash::make($data->password);
                $user->password=$hashedPassword;


                $user->year=$year;
                $user->status=1;
                $user->save();

                // return User::create([
                //     'name' => $data->name,
                //     'email' =>$data->email,
                //     'password' => Hash::make($data->password),
                //     'p_no'=>$data->mobile,
                //     'year'=>$year,
                //     'status'=>1,
                // ]);




                $course_amount=Course::where('id',$data->course_id)->first();

                $Courseenroll=new Courseenroll;
                $Courseenroll->user_id=$user->id;

                $Courseenroll->course=$data->course_id;
                $Courseenroll->batch=null;


                if($data->criteria=="installment")
                {
                    $course_fees=Course::where('id',$data->course_id)->first();
                    $time=Carbon::now()->format('m-d-y');
                    $course_amount=Payment::where('course_id',$data->course_id)->first();

                    if($course_amount->s_date!=null)
                       {
                            if($course_amount->s_date>=$time && $time<=$course_amount->e_date)
                            {
                                $Courseenroll->criteria=$data->criteria;
                                $Courseenroll->amount=$course_fees->fees-$course_amount->installment_amount;

                            }
                            else
                            {
                                $Courseenroll->criteria=$data->criteria;
                                $Courseenroll->amount=$course_fees->fees-$course_amount->installment_amount;

                            }


                       }

                       else

                       {
                        $Courseenroll->criteria=$data->criteria;
                        $Courseenroll->amount=$course_fees->fees-$course_amount->installment_amount;

                       }


                }

                elseif($data->criteria=="fullpayment")
                {
                    $course_fees=Course::where('id',$data->course_id)->first();
                    $course_amount=Payment::where('course_id',$data->course_id)->first();
                    $Courseenroll->criteria=$data->criteria;
                    $Courseenroll->amount=$course_fees->fees-$course_amount->fullpayment;
                }

                else
                {
                    $Courseenroll->criteria=$data->criteria;
                    $Courseenroll->amount=$course_amount->fees;
                }


                $Courseenroll->day=null;
                $Courseenroll->time=null;
                $Courseenroll->active=0;
                $Courseenroll->save();

                $time=$data->time;

                foreach($time as $index=>$alltime)
                {
                   $usertime=new Usertime;
                   $batchN=Batch::where('time',$data->time[$index])->first();
                   $usertime->time=$data->time[$index];
                   $usertime->day=$data->day[$index];
                   $usertime->course_id=$data->course_id;
                   $usertime->user_id=$user->id;
                   $usertime->batch=$batchN->batch_number;
                   $usertime->active=0;
                   $usertime->save();

                }


        //         return User::create([
        //             'name' => $data->name,
        //             'email' =>$data->email,
        //             'password' => Hash::make($data->password),
        //             'p_no'=>$data->mobile,
        //             'year'=>$year,
        //             'status'=>1,
        //    ]);

               return redirect()->action([RegisterController :: class,'registerlogin'],['email'=>$data->email,'password'=>$data->password]);


            }








        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
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


}
