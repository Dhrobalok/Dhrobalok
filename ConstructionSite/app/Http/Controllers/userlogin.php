<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Employee;
use Session;
use Hash;

class userlogin extends Controller
{
    public function loginuser(Request $request)
        {

            $password=User::where('email',$request->email)->first();


            if($password)
            {
                if(Hash::check($request->password, $password->password) && $password->status==1)
                {


                    $email=$request->email;
                    $employeeid=User::where('email',$email)->first();
                    $companystatus=Employee::where('employee_id',$employeeid->id)->first();

                    session()->put('emailname', $email);
                    session()->put('status', $password->status);
                    session()->put('employeeid', $employeeid->id);

                    if($companystatus)
                    {
                        session()->put('companystatus',  $companystatus->company_type);
                        session()->put('id', $companystatus->id);

                    }
                    else

                    {
                        session()->put('companystatus', null);
                        session()->put('id', null);

                    }




                    $emailid=Session::get('emailname');
                    $userId=Employee::where('email',$emailid)->first();
                    if($userId)
                    {
                        $employee=Employee::where('id',$userId->id)->first();

                    }

                   else
                   {
                    $employee=0;
                   }

                    return view('frontend.profile',['employee' => $employee]);
                    //return view("frontend.profile");
                   // return redirect()->route('dashboard');

                }

                else
                {


                return redirect()->back()->with('message','You have no permission for login !');
                }




            }

            else
            {
                return redirect()->back()->with('message','You have no permission for login !');

            }


        }


        public function editProfile($id)
        {
            $user=User::where('id',$id)->first();
           return view('frontend.editProfile',['user'=>$user]);
        }

        public function upadteProfile(Request $request)
        {

            if($request->password)
            {
                $password= Hash::make($request->password);
                User::where('id',$request->id)
                ->update([

                    'password'=>$password,
                ]);
            }

            else if($request->image)
            {

                $image = $request -> file('image');

                if($image)
                {
                $image_name = Str :: random(20);
                $extension = strtolower($image -> getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $extension;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_full_name;
                $landpic -> move($upload_path,$image_full_name);
                $profile_photo_path1 = $image_url;
                }

                User::where('id',$request->id)
                ->update([

                    'image'=> $profile_photo_path1,
                ]);


                Employee::where('employee_id',$request->id)
                ->update([

                    'employee_photo'=> $profile_photo_path1,
                ]);

            }



            else
            {


                Employee::where('employee_id',$request->id)
                ->update([

                    'company_type'=> $request->company,
                    'name'=> $request->name,
                    'mobile_no'=> $request->mobile,

                ]);


                User::where('id',$request->id)
                ->update([


                    'name'=> $request->name,


                ]);


            }




            $emailid=Session::get('emailname');
            $userId=Employee::where('email',$emailid)->first();
            $employee=Employee::where('employee_id',$request->id)->first();
            return view('frontend.profile',['employee' => $employee]);


        }
}

