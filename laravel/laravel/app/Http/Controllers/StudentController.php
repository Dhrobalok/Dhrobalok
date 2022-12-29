<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Session;
use SUM;
use Mail;
use App\Mail\StudentEmail;
use DB;
use App\StudentApprov;
use Nexmo\Laravel\Facade\Nexmo;

 ob_get_clean();

class StudentController extends Controller
{
   public function attendence()
   {
   	return view('student proparty.attendencemark');
   } 


   public function seeattendence(Request $re)
   {
   	 $d=date('Y-m-d');


        $roll=$re->roll;

        $course=$re->course;
        $q=\DB::select("select student_roll from studentattend where student_roll='$roll' AND course='$course' AND attendence='present'");
        $p=\DB::select("select distinct date from studentattend where course='$course'");

         $o=\DB::select("select semester from studentattend where student_roll='$roll' AND course='$course' AND attendence='present'");


        $y=\DB::select("select image from student where roll='$roll'");
        //return $y;
 

        $r=count($q);
        $s=count($p);
      

         
        return view('student proparty.attendencemark2')->with('u',$r)->with('v',$s)->with('w',$y);
   	 
   } 


   public function emailverify(Request $re)
   {
       $email=$re->email;
       Mail::to($email)->send(new StudentEmail);
       Session::flash("success");
        return back();



   }

   public function verifyemail()
   {

     return view('student proparty.updatepassword');
   }

     public function updatepassword(Request $re)
    {
      $email=$re->email;
      $password=$re->password;
      $u=DB::table('student')
      ->where('email',$email)
      ->first();
       if (!$u) {
                session::flash('alert');
                return back();
               }
       else
              {
      
      
             DB::table('users')
            ->where('email', $email)
            ->update(['password' => $password]);
            session::flash('success2');
            return view("auth.login");

              }

      }


   public function sms(Request $re)
   {

      Nexmo::message()->send([
    'to'   => '88' . $re->mobile,
    'from' => '16105552344',
    'text' => 'Hello raju i AM Rashed How Are you Partner This message is send from our project .'

]);
  return back();

   }


   public function sm()
   {


  return view('student proparty.sms send');

   }

      public function logverify()
   {
     return view('student proparty.confirmverifyemail');

   }


      public function verify(Request $re)
   {

    
       $em=$re->email;
       $data=array();
       $data['email']=$re->email;
       DB::table('userverification')->insert($data);
       $r=\DB::select("select email from student where email='$em'");
       if($r)
       {

        Session::flash("success3");
        return view('auth.login');
       }


   }


   public function examregistr()
   {
    
    return view("student proparty.examregistration");
   }





      public function addexamregistration(Request $re)
   {
        



   }

     public function improvement()
   {
      $q=\DB::select("select distinct session from course");
    return view("student proparty.improvement")->with('r',$q);
   }

public function studentlogout()
{
        //Auth::logout();
        Session::flush();
        return redirect('/');
}


}
