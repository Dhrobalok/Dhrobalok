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
ob_get_clean();

class StudeninfomController extends Controller
{
    public function attendence()
    {
    	$user=DB::table('course')->distinct()->select('session')->get();

    	return view('/studentattendence')->with('use',$user);
    }
  
     public function atteninser(Request $re)
    {

      $session=$re->session;
      $id=$re->t_id;
    

      $user=DB::table('student')
      ->where('session',$session)
      ->get();
      $q=\DB::select("select*from course where session='$session'");
      $p=\DB::select("select distinct semester from course where session='$session'");
      $l=\DB::select("select*from coursealocate2 where tid='$id'");
      $o=\DB::select("select tid from coursealocate2 where tid='$id'");
 
      return view('/attendence')->with('use',$user)->with('c',$q)->with('d',$p)->with('m',$l)->with('b',$o);

    }


     public function attend(Request $re)
    {


      
    	$data=array();
      $roll=$re->student_roll;
    	$course=$re->course;
    	$date=$re->date;
      $semester=$re->semester;
     //return $semester;
       $r=count($roll);
   
    
    	
    	$results = DB::select('select * from studentattend where date="'.$date.'" AND course="' . $course . '"');

     if($results)
        {
                Session::flash("alert");
               return Redirect('/attend');

	
        }
    
      else{
        $m=0;
        $r=0;


                 foreach ($re->student_roll as $id)
                 {

	
	                         $data[]=[
		                 "student_roll"=>$id,
		                 "attendence"=>$re->attendence[$id],
		                 "course"=>$re->course,
		                 "t_id"=>$re->t_id,
                      "semester"=>$re->semester,
		                  "date"=>date("d-m-y")
                  
	                                ];


                   }
                      DB::table('studentattend')->insert($data);
                      Session::flash("success");
                      return Redirect::to('/attend');


              }
                

           }



    public function getSignOut() 
       {
    
              Session::flush();

              return view("welcome");
  
        }


     public function classmark1()
        {


          return view('classperform');

          
        }

        public function classmark(Request $re)
        {
           $data=array();
           $data['roll']=$re->roll;
       
           $data['course']=$re->course;
        
     
           $results = DB::select('select * from classtest where roll="' . $data["roll"] . '" AND course="' . $data["course"] .'"');

         
            session::flash("success");

            return view('getclassmark')->with('user',$results);
             
         }

      public function attend1()
      {

         return view('attendmark');
      }
      
       public function attendmark(Request $re)
      {

        $roll=$re->roll;
        $course=$re->course;

       $u=DB::table('attendence')
        
        ->where('student_roll','=',$roll)
        ->where('course','=',$course)
        ->where('attendence','=','present')
        ->get();
        $t=count($u);


       $v=DB::table('attendence')->select('attendence')->count('attendence');
        
        return view('attendmark2',compact('t','v'));

   
        
      }


      public function userlogin()
      {

         return view('auth.login');

      }

      public function loginuser(Request $re)
      {



          $email=$re->email;

          $password=$re->password;
          $r=\DB::select("select email from userverification where email='$email'");
         
 
      if($r)
      {
          

         $q=\DB::select("select*from student where email='$email' AND password='$password'");
           $r=\DB::select("select* from student");
          $c=count($r);
        
         if($q)
         {
         
         $l=\DB::select("select*from signature");
         
         $z=\DB::select("select distinct session,semester from improveaprove");
          $k=count($q);
          $f=count($z);
          $x=\DB::select("select*from advisenotice");
          return view('studentdashboard')->with('b',$c)
          ->with('v',$k)->with('n',$l)->with('y',$z)->with('e',$f)->with('z',$x);
         }
         else
         {
           session::flash('alert');
           return view('auth.login');
         }

       }

       else
       {

    

         
          Mail::to($email)->send(new loginverifyEmail);
          Session::flash("success4");
          return view("auth.login");
          //Session::flash("success");


       }

      }

           public function userreg()
      {
         return view('auth.register');

      }

       public function reg(Request $re)
      {
       $em=$re->email;

       /*
       $p=Mail::to($em)->send(new userVerificationEmail);
       */
      
      // Session::flash("success");
        //return back();
      
        $app=new Userlogin();
        $app->name=$re->input('name');
        $app->email=$re->input('email');
        $app->password=$re->password;

        $app->blood=$re->input('blood');
        $app->mobile=$re->input('mobile');
        $app->session=$re->input('session');
        
         if ($re->hasFile('image')) {
         $file=$re->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/pic/', $filename);
         $app->image=$filename;
       }

          $app->roll=$re->input('roll');

         $q=\DB::select("SELECT email,roll FROM `users` WHERE email='$em'");

        
         
         
          if ($q) {
                       session::flash('danger');
                       return view('Auth.register');
                   
                      }
           else
           {
               $q=$app->save();

                session::flash("success");
                return view('Auth.register');

             
           }
           

        
      }


      public function attendedit(Request $re)
      {

    
        $roll=$re->roll;
        $q=\DB::select("select*from studentattend where student_roll='$roll'");
       // return $q;
       
        return view('attendenceedit')->with('s',$q);



      }

        public function updateattend(Request $re)
      {

            $id=$re->id;
            $roll=$re->student_roll;
            $course=$re->course;
            $attend=$re->attendence;
            $date=$re->date;
         
       

    $q=\DB::update("update studentattend set attendence='$attend' where id='$id' AND student_roll='$roll' AND course ='$course'");
    //return $q;

    if($q)
    {
     Session::flash("success");
       return back();
    }
    else
    {
        Session::flash("alert");
       return back();

    }



      }

      public function seeattendmark()
      {

        return view('seeattendmark');
      }

      public function see(Request $re)
      {

        $d=date('Y-m-d');


        $roll=$re->roll;
        $course=$re->course;
        $q=\DB::select("select student_roll from attendence where student_roll='$roll' AND course='$course' AND attendence='present'");
        $p=\DB::select("select distinct date from attendence where course='$course'");


        $y=\DB::select("select*from users  where roll='$roll'");

          $r=count($q);
          $s=count($p);
         
          return view('seeattenmark')->with('u',$r)->with('v',$s)->with('w',$y);

        
      }

               
 }