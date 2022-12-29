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
            $email=User::where('email',$request->email)->first();

            if($email)
            {
               
                $password=User::where('email',$request->email)->first();
            
           
           
            if(Hash::check($request->password, $password->password) && $password->status==1)
            {
               
              
                $email=$request->email;
                $employeeid=User::where('email',$email)->first();
                
                session()->put('emailname',$request->email);
                session()->put('rollno', $password->status);
                session()->put('employeeid', $employeeid->id);
                //Session::get('emailname');
                $emailid=Session::get('emailname');
                $userId=Employee::where('email',$emailid)->first();
                $employee=Employee::where('id',$userId->id)->first();
                return view('backend.admin.dashboard');
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
}



