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
use App\fsubject;
 ob_get_clean();

class ImproveController extends Controller
{

	public function improve(Request $re)
   {

       $roll=$re->roll;
       $semester=$re->semester;
       $session=$re->session;
          $e=\DB::select("select semester from result where semester='$semester'");

            $d=\DB::select("select date from signature where session ='$session' AND semester='$semester'");
            if (!$e) 
            {
              Session::flash('aa');
              return back();
            
            }

     
            foreach ($d as $key => $value) 
            {
              $date=date_create("$value->date");
              
            }

        
          date_add($date,date_interval_create_from_date_string("7 days"));
          $u= date_format($date,"Y-m-d");
          $a=strtotime($u);
          $f=date('Y/m/d');
           $b=strtotime($f);
         
            
              if ($b<$a) 
              {
                    
        $t=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
   
      $p=\DB::select("select*from student where roll ='$roll'");
     // $d=\DB::select("select*from result where roll ='$roll' AND semester='$semester'");

      $q=\DB::select("select*from result where roll='$roll' AND semester='$semester' ");
      $o=\DB::select("select distinct image from signature where session='$session' AND semester='$semester'");
       $d=\DB::select("select*from result where roll ='$roll' AND semester='$semester'");
        $x=\DB::select("select distinct semester from result where roll='$roll' AND semester='$semester'");
        return view('student proparty.improveconfarm')->with('r',$q)->with('w',$p)->with('x',$o)->with('f',$d)->with('z',$x);

              }
              else
              {
                 $q=\DB::select("select distinct session from course");
                 Session::flash('ss');
                return view("student proparty.improvement")->with('r',$q);
               
               
              }
  

     
      
      
      
   }

   public function improve2(Request $re)
   {
       
      $mark=$re->course;
       $mark1=$re->fcourse;
         $roll=$re->roll;
          $semester=$re->semester;
          $session=$re->session;
 
   
   if ($mark1) 
   {

    

        $c=count($re->fcourse);
       
        for($i=0;$i<$c;$i++) 
      {

        $data = [

                 'course' => $re->fcourse[$i],
                 'session' => $re->session,
                 'roll' => $re->roll,
                 'semester' => $re->semester,
                  'examname' => $re->examname,
                 


               ];


                $q=fsubject::create($data);

  
          //$p=\DB::select("select* from studentimprove where roll='$roll' AND semester='$semester'");
                if (!$q) 
                {
                  session::flash('alert');
                  return back();
                }

             
            
      }

        

     
   }


        $d=\DB::select("select date from signature where session ='$session' AND semester='$semester'");

     
            foreach ($d as $key => $value) 
            {
              $date=date_create("$value->date");
              
            }

         
          date_add($date,date_interval_create_from_date_string("7 days"));
          $u= date_format($date,"Y");
       
          
           $b=date('Y');
         
          if ($u!=$b) 
          {

            Session::flash('ra');
            return back();
            
          }

         
          
          
        if ($mark) 
        {
          # code...
       
              
          $c=$re->course;
          


        $c=count($re->course);

     //return $c;
          
      

      for($i=0;$i<$c;$i++) 
      {

        $data = [

                 'course' => $re->course[$i],
                 'session' => $re->session,
                 'roll' => $re->roll,
                 'semester' => $re->semester,
                  'examname' => $re->examname,
               


               ];

       
       



          $q=\DB::select("select course from studentimprove where roll='$roll' AND semester='$semester'");

          
        $y=count($q);
        //return $i;

        if ($y==2) 
        {
        
          session::flash('alert2');
            return back();

            

        }
        else
        {
               improve::create($data);
        }


      }
 

     return back();  
  
}
   
    return back(); 

}


public function cofarmimprove(Request $re)
{

  

       
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

         request()->image->move(public_path('uploads/pic'), $imageName);

         $course2=$re->course2;

      if ($course2)
       {


        $c=count($re->course2);


      for($i=0;$i<$c;$i++) 
      {

        $data = [

                 'session' => $re->session,
                 'roll' => $re->roll,
                 'semester' => $re->semester,
                 'course' => $re->course2[$i],
                  'examname' => $re->examname,
                   'image' => $imageName,

               ];
         improveapprove::create($data);

         
      }

    }


        $v=count($re->course);

      
      for($i=0;$i<$v;$i++) 
      {

        $data = [

                 'session' => $re->session,
                 'roll' => $re->roll,
                 'semester' => $re->semester,
                 'course' => $re->course[$i],
                  'examname' => $re->examname,
                   'image' => $imageName,

               ];
         improveapprove::create($data);


        // $q=\DB::select('select  tid from coursealocate');
       //return $q;
      

            
      }

      

      
      $q=\DB::select("SELECT DISTINCT session FROM `result`");

      return view("suparadmin.improve")->with('r',$q);
   
       

}


public function ImproveTeacher(Request $re)
{


  
    $x=\DB::select("select distinct session from studentimprove");
    // $p=\DB::select("select distinct session,semester,course,examname from studentimprove where session='$se' AND semester='$s'");
       // $q=\DB::select("select*from student");
              //$v=\DB::select("select*from studentimprove where session='$se' AND semester='$s'");
              //$h=\DB::select("select distinct roll from studentimprove where session='$se' AND semester='$s'");
                // $a=\DB::select("select distinct roll from failsubject where session='$se' AND semester='$s'");

                 //$f=\DB::select("select course from failsubject where session='$se' AND semester='$s'");
               // $u=count($a);
              //$c=count($h)+$u;
              //return $c;

             // $r=\DB::select("select*from teacher");
        return view('suparadmin.improvecourseteacher2')->with('r',$x);
 



/*

    $p=\DB::select("select distinct session,semester,course,examname from studentimprove where session='$se' AND semester='$s'");
             $q=\DB::select("select*from student");
              $v=\DB::select("select*from studentimprove where session='$se' AND semester='$s'");
              $h=\DB::select("select distinct roll from studentimprove where session='$se' AND semester='$s'");
                 $f=\DB::select("select course from failsubject where session='$se' AND semester='$s'");
              $c=count($h);

              $r=\DB::select("select*from teacher");
        return view('suparadmin.improvecourseteacher')->with('re',$p)->with('r',$q)->with('o',$v)->with('n',$r)->with('j',$c)->with('g',$f);
        */


}

public function improves(Request $re)
{

  $se=$re->session;
  $s=$re->semester;
    $x=\DB::select("select distinct session from studentimprove");
     $p=\DB::select("select distinct session,semester,course,examname from studentimprove where session='$se' AND semester='$s'");
        $q=\DB::select("select*from student");
              $v=\DB::select("select distinct course,session,roll,semester,examname from studentimprove where session='$se' AND semester='$s'");
              $h=\DB::select("select distinct roll from studentimprove where session='$se' AND semester='$s'");
                 $a=\DB::select("select distinct roll from failsubject where session='$se' AND semester='$s'");

                 $f=\DB::select("select distinct course from failsubject where session='$se' AND semester='$s'");
                $u=count($a);
              $c=count($h)+$u;
           

              $r=\DB::select("select*from teacher");
        return view('suparadmin.improvecourseteacher')->with('re',$p)->with('t',$q)->with('o',$v)->with('n',$r)->with('j',$c)->with('g',$f)->with('r',$x);


}

public function improveteacher2(Request $re)
{

  $data=array();
  $data['session']=$re->session;
  $data['semester']=$re->semester;
  $data['course']=$re->course;
  $data['t_id']=$re->name;
  DB::table('improveteacher')->insert($data);
  return back();

}

        
	
    
}
