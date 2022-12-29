<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Hash;

class resetpassword extends Controller
{
    //AdminshowLinkRequestForm
    public function AdminshowLinkRequestForm()
    {

        return view('backend.admin.password.adminemail');
    }
    public function showLinkRequestForm()
    {

        return view('backend.admin.password.email');
    }
    public function mail(Request $request)
    {

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to($request)->send(new \App\Mail\resetpassword($details));

       return redirect()->back()->withErrors(['msg' => 'Reset password link is sent']);
    }

    public function adminmail(Request $request)
    {

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to($request)->send(new \App\Mail\adminMail($details));

       return redirect()->back()->withErrors(['msg' => 'Reset password link is sent']);
    }

    public function passwordreset()
    {

        return view('backend.admin.password.update');
    }

    public function adminpasswordreset()
    {

        return view('backend.admin.password.adminpassupdate');
    }

    public function userpasswordreset()
    {

        return view('backend.admin.password.userpassword');
    }

    public function passwordupdate(Request $request)
    {
        //  return $request->email;

        $paswword=$request->password;
        $userpassword = Hash::make($paswword);

        User::where('email',$request->email)
        ->update(['password'=>$userpassword]);

       return redirect()->route('login');
    }

    public function adminpasswordupdate(Request $request)
    {


        $paswword=$request->password;
        $userpassword = Hash::make($paswword);

        User::where('email',$request->email)
        ->update(['password'=>$userpassword]);

       return redirect()->route('Admin.login');
    }

    public function userpasswordupdate(Request $request)
    {


        $paswword=$request->password;
        $userpassword = Hash::make($paswword);

        User::where('email',$request->email)
        ->update(['password'=>$userpassword]);

       return redirect()->route('login');
    }
}
