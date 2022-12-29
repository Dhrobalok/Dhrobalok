<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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

class LoginController extends Controller
{


    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;


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
                    session()->put('user_id',$id);
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
                    $id=Auth::user()->id;
                    session()->put('email', $email->name);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$id);

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

                    $id=Auth::user()->id;
                    session()->put('email', $email->name);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$id);

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




}
