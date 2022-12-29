<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use Str;
use DB;

class Profile extends Controller
{
    public function ViewProfile()
    {
        $user_id=Session::get('user_id');
        $userDetails=User::where('studentId',$user_id)->first();

        return view('backend.Servay.Profile',['userdetails'=>$userDetails]);
       // return response()->json(['html'=>$html, 'success'=>true]);
    }

    public function ProfileUpdate()
    {

        $user_id=Session::get('user_id');
        $userDetails=User::where('studentId',$user_id)->first();
        // return view('backend.Servay.Profile_update',compact('userDetails'));
         $html=view('backend.Servay.Profile_update',compact('userDetails'))->render();
        return response()->json(['html'=>$html, 'success'=>true]);

    }

    public function UpdateProfile(Request $request)
    {

        $user_id=Session::get('user_id');
        $password=User::where('studentId',$user_id)->first();

        if($password->password!=$request->password)
        {

            $hashedPassword = Hash::make($request->password);
            DB::table('users')
            ->where('studentId',$user_id)
            ->update([


               'password'=>$hashedPassword


              ]);

        }


                 DB::table('users')
                 ->where('studentId',$user_id)
                 ->update([

                    'firstname' => $request->firstname,
                    'lastname'=> $request->lastname



                   ]);



           return redirect()->back();

    }
}
