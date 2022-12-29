<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use Hash;

class EmailController extends Controller
{
    public function index()
    {
        return view("backend.Mail.emailForm");
    }

    public function sendMail(Request $request)
    {

        $details = [
            'title' => 'Mail from rajIT School',
            'body' => 'Please click on the link for update password'
        ];

        \Mail::to($request->email)->send(new \App\Mail\Usermail($details));

       return redirect()->back()->with('msg','Reset password link is sent');


    }

    public function updatepassword()
    {
        return view('backend.Mail.resetPassword');
    }

    public function Password_update(Request $request)
    {
        $email=User::where('email',$request->email)->get();
        if($email !='[]')
        {

             $hashedPassword = Hash::make($request->password);
             User::where('email', $request->email)
             ->update([
                 'password' => $hashedPassword
              ]);

              return redirect()->back()->with('msg','Password Update successfully');

        }
        else
        {
            return "invalid";

        }

    }

}
