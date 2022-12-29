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
use App\improve;
use App\improveapprove;
use App\registraion;
 ob_get_clean();



class StudentRegistrationController extends Controller
{
    public function registration(Request $re)
    {
         

         $session=$re->session;
         $semester=$re->semester;

         $course=$re->code;
         $q=\DB::select("select course from course where session='$session' AND semester='$semester'");

         $a=count($q);
    
         $b=count($course);
      
         if ($a!=$b) 
         {
          Session::flash('ra');
          return view("student proparty.examregistration");
         }
         
      

        

    	    $imageName = time().'.'.request()->image->getClientOriginalExtension();

         request()->image->move(public_path('uploads/pic'), $imageName);
                        
       $session=$re->session;
       $roll=$re->roll;

       $semester=$re->semester;
       $course=$re->code;
      
       $c=count($course);


       for ($i=0; $i <$c ; $i++)
        { 
      
        $q=\DB::select('select student_roll from studentattend where student_roll="' . $re->roll . '" AND course="' . $re->code[$i] . ' "  AND attendence="present"');
        $p=\DB::select('select distinct date from studentattend where course="' . $re->code[$i] .'"');
        //return $p;


        
               $r=count($q);


               $s=count($p);

          
          if ($r==0 || $s==0) 
          {
         
             DB::table('examregistration')->where('roll',$roll)->delete();
         
            session::flash('alert');
             return back();
          }
     
          $m=round((100*$r)/$s);

           //return $m;

          if ($m<60)
           {
            return "shaon";
            return  $re->code[$i];
            DB::table('examregistration')->where('roll',$roll)->delete();
         
           	session::flash('alert');
          	 return back();
          }
          else
          {

	
          	  $data = [

                    'examname'=>$re->examname,
                    'name'=>$re->name,
                    'dob'=>$re->dob,
                    'fn'=>$re->fn,
                    'mn'=>$re->mn,
                    'halname'=>$re->halname,
                    'roll'=>$re->roll,
                    'regno'=>$re->regno,
                    'session'=>$re->session,
                    'semester'=>$re->semester,
             
                    'code'=>$re->code[$i],
                    'vname'=>$re->vname,
                    'post'=>$re->post,
                    'mobile'=>$re->mobile,
                    'upozila'=>$re->upozila,
                    'district'=>$re->district,
                    'image'=>$imageName,
                    'acknowledge'=>$re->acknowledge,
                 

               ];



               registraion::create($data);


               
          


             
      }
        

      }
        
   return back();
    }
}
