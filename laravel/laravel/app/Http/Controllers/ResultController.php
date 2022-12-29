<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Attend;
use App\Userlogin;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Mail\userVerificationEmail;
use App\Mail\loginverifyEmail;
use \PDF;
 ob_get_clean();

class ResultController extends Controller
{
         public function seeresult()
   {

    $q=\DB::select("select distinct session from course");
  
    return view("student proparty.seeresult")->with('r',$q);

   }



       public function resultsee(Request $re)
   {

   	 
      
      
      $session=$re->session;
      $roll=$re->roll;
      $semester=$re->semester;
      //return $roll;
       $t=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
     if ($t) 
   {
      $p=\DB::select("select*from student where roll ='$roll'");
      $d=\DB::select("select*from result where roll ='$roll' AND semester='$semester'");

      $q=\DB::select("select*from result where roll='$roll' AND semester='$semester'");
      $o=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
        $u=\DB::select("select distinct semester from result where roll='$roll' AND semester='$semester'");
      //$pdf = PDF::loadView('student proparty.resultsee')->with('r',$q)->with('w',$p)->with('x',$o);
      //return $pdf->download('resultsee.pdf');
       Session::flash('ss');
      return view('student proparty.resultsee')->with('r',$q)->with('w',$p)->with('x',$o)->with('f',$d)->with('z',$u);
     }

       else
       {
        session::flash("alert");
        return back();
       }

  
      

   }

   public function resultdownload(Request $re)
   {

       $roll=$re->roll;
       $semester=$re->semester;
       $session=$re->session;
        $t=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
   
      $p=\DB::select("select*from student where roll ='$roll'");
     // $d=\DB::select("select*from result where roll ='$roll' AND semester='$semester'");

      $q=\DB::select("select*from result where roll='$roll' AND semester='$semester'");
      $o=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
       $d=\DB::select("select*from result where roll ='$roll' AND semester='$semester'");
        $x=\DB::select("select distinct semester from result where roll='$roll' AND semester='$semester'");
       //return view('student proparty.download')->with('r',$q)->with('w',$p)->with('x',$o)->with('f',$d)->with('z',$x);

       $data= [
        'f'=>$d, 
         'w'=>$p,
        'x'=>$o,
        'r'=>$q,
        'z'=>$x,];

      $pdf = PDF::loadView('student proparty.download',$data);
      
      return $pdf->download('download.pdf');
      /*setPaper('a4','portrait')*/
     
      
      
   }

   public function updateresult()
   {
    return view('teacher.updateresult');
   }

      public function resultupdate(Request $re)
   {



       $session=$re->session;
       $semester=$re->semester;
       $tid=$re->tid;
 
        

       $q=\DB::select("SELECT course from `improveteacher`WHERE t_id='$tid'");

    
      foreach ($q as $value) 
      {
        
    
   
     $p=\DB::select('SELECT * from `improveaprove`WHERE  course="'. $value->course .'"');
      
   }
    

      return view('teacher.resultupdate')->with('f',$p);
   }


   public function resultupdate2(Request $re)
   {

        $session=$re->session;
       $semester=$re->semester;
       $roll=$re->roll;
       $course=$re->course;
       $q=DB::table('result')
       ->where('session',$session)
       ->where('semester',$semester)
       ->where('roll',$roll)
       ->where('course',$course)
       ->get();

       return view('teacher.resultupdate3')->with('y',$q);


   }

   public function resultupdate3(Request $re)
   {


        $session=$re->session;
       $semester=$re->semester;
       $roll=$re->roll;
       $course=$re->course;
       $mark=$re->mark;
       $q=DB::table('result')
       ->where('session',$session)
       ->where('semester',$semester)
       ->where('roll',$roll)
       ->where('course',$course)
       ->update(['mark' => $mark]);

       if (!$q) 
       {
         session::flash('alert');
         return back();
       }
      
   $p=\DB::select('SELECT * from `improveaprove`WHERE  course="'. $course .'"');


       return view('teacher.resultupdate')->with('f',$p);
  
   


   }
}
