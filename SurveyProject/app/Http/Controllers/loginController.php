<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Str;
use Session;
use App\Models\Survetotal;
use App\Models\Item;
use App\Models\Student;


use App\Models\User;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $email=User::where('email',$request->email)->first();
        if($email)
        {
              if($email->status==1)
              {
                if(Hash::check($request->password, $email->password))
                {

                    session()->put('email', $email->firstname);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$email->studentId);

                    $user_id=Session::get('user_id');
                    $totaluser_id=Survetotal::select('item_id')->where('user_id',$user_id)->distinct()->get();

                     if( $totaluser_id !='[]')
                       {
                         foreach($totaluser_id as $key=>$value)
                           {
                            // $totaluser_id=Item::select('id')->where('user_id',$userId->user_id)->get();

                                 $totalSurvey=Survetotal::where('item_id',$value->item_id)
                                 ->where('user_id',$user_id)
                                 ->get();
                                 $surveNumber=count($totalSurvey);
                                 $iteamid[$value->item_id]=$surveNumber;


                             }

                        }

                       else
                           {
                              $iteamid[]=0;

                            }




                      $iteamnamne=Survetotal::select('item_id')->where('user_id',$user_id)->distinct()->get();

                     if($iteamnamne!='[]')
                             {
                                 foreach($iteamnamne as $item)
                                 {
                                      $name=Item::where('id',$item->item_id)->first();
                                      if($name)
                                            {
                                            $data[]=Str::limit($name->name,30);

                                            }

                                    }

                             }

                      else
                          {
                           $data[]=0;
                          }




                        foreach($iteamid as $value)
                           {
                             $itemnumber[]=$value;
                           }



                        return view('backend.Dashboard.Dashboard',compact('data','itemnumber'));
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

                    session()->put('email', $email->firstname);
                    session()->put('name',  $email->name);
                    session()->put('user_id',$email->studentId);

                    $user_id=Session::get('user_id');
                    $totaluser_id=Survetotal::select('item_id')->distinct()->get();

                     if( $totaluser_id !='[]')
                       {
                         foreach($totaluser_id as $key=>$value)
                           {
                            // $totaluser_id=Item::select('id')->where('user_id',$userId->user_id)->get();

                                 $totalSurvey=Survetotal::where('item_id',$value->item_id)->get();
                                 $surveNumber=count($totalSurvey);
                                 $iteamid[$value->item_id]=$surveNumber;


                             }

                        }

                       else
                           {
                              $iteamid[]=0;

                            }




                      $iteamnamne=Survetotal::select('item_id')->distinct()->get();

                     if($iteamnamne!='[]')
                             {
                                 foreach($iteamnamne as $item)
                                 {
                                      $name=Item::where('id',$item->item_id)->first();
                                      if($name)
                                            {
                                            $data[]=Str::limit($name->keyword,30);

                                            }

                                    }

                             }

                      else
                          {
                           $data[]=0;
                          }




                        foreach($iteamid as $value)
                           {
                             $itemnumber[]=$value;
                           }



                        return view('backend.Dashboard.AdminDashboard',compact('data','itemnumber'));
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

    public function Registration()
    {
        return view('backend.UserAuth.registration');
    }

    public function UserSave(Request $request)
    {



        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email'
            ]
        );



        $studentid=Student::where('studentid',$request->studentId)->first();

        if($studentid)
        {
            $user=new User;
            $user->firstname=$request->firstname;
            $user->lastname=$request->lastname;
            $user->email=$request->email;
            $hashedPassword = Hash::make($request->password);

            $user->password=$hashedPassword;
            $user->supervisor=$request->supervisor;

            $user->studentId=$request->studentId;
            $user->batch=$request->batch;
            $user->major_subject=$request->major_subject;
            $user->status=0;
            $user->save();
            return redirect()->back()->with('msg','New user added');

        }

        else
        {

            return redirect()->back()->with('message','Your student id is not register');

        }









    }

    public function Userlogin()
    {
        return view('backend.UserAuth.login');
    }



    public function Landingpage()
    {
        $totaluser_id=Survetotal::select('item_id')->distinct()->get();

        if( $totaluser_id !='[]')
        {
            foreach($totaluser_id as $key=>$value)
            {
                // $totaluser_id=Item::select('id')->where('user_id',$userId->user_id)->get();

                //     foreach($totaluser_id as $key=>$value)
                //     {
                    $totalSurvey=Survetotal::where('item_id',$value->item_id)->get();
                    $surveNumber=count($totalSurvey);
                    $iteamid[$value->item_id]=$surveNumber;

                    // }

            }

        }



        else
        {
            $iteamid[]=0;

        }



        $iteamnamne=Survetotal::select('item_id')->distinct()->get();

         if($iteamnamne!='[]')
                 {
                     foreach($iteamnamne as $item)
                     {
                          $name=Item::where('id',$item->item_id)->first();
                          if($name)
                                {
                                 $data[]=Str::limit($name->keyword,50);

                                }

                        }

                 }

          else
              {
               $data[]=0;
              }




          foreach($iteamid as $value)
          {
            $itemnumber[]=$value;
          }



          return view('backend.Servay.landingPage',compact('data','itemnumber'));

    }


    public function Activities()
    {
        return view('backend.LandingPage.Activities');
    }

    public function location()
    {
        return view('backend.Servay.Location');

            // $userIp = $request->ip();
            // $locationData = \Location::get('https://'.$request->ip());
            // dd($locationData);

    }

    public function locationSave(Request $request)
    {
        return $request;

    }

}
