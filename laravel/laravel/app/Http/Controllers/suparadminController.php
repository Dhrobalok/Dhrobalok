<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use DB;
use Mail;

use App\Mail\suparadminMail;
use Session;
use App\Suparadmin;
use App\Classalocate;
use App\Mail\TeacherMessageMail;
 ob_get_clean();


class suparadminController extends Controller
{
    
    public function suparadmin()
    {
    	return view('suparadmin.suparadminlogin');
    }
    public function suparemail()
    {
        return view("suparadmin.emailverify");
    }

    public function login(Request $re)
    {
        $email=$re->email;
        $password=$re->password;
        $q=\DB::select("select email from semailverify where email='$email'");
        if ($q) 
        {
             $q=\DB::select("select*from suparadmin2 where email='$email' AND password='$password'");
             if ($q) 
             {
                 
                 $q=\DB::select("select*from teacher");
                $p=\DB::select("select*from student");
                $u=count($q);
                $v=count($p);

         $o=\DB::select('select distinct session from studentimprove');
        $a=count($o);
        $i=\DB::select("SELECT distinct `session`, `semester`, `examname` FROM `studentimprove`");
        $w=\DB::select("SELECT distinct `session`, `semester`, `examname` FROM `failsubject`");
         $x =count($w);

        $r=\DB::select("select distinct session,semester from result");
         $t=count($r);
         $j=\DB::select("select distinct session,semester from examregistration");
          $d=count($j);

        return view("suparadmin.dashboard")->with('q4',$u)->with('q2',$v)->with('j',$i)->with('m',$a)->with('c',$r)->with('n',$t)->with('l',$d)->with('u',$j)->with('d',$w)->with('r',$x);
              
             }
             else
             {
                session::flash('alert');
                return back();
             }
        }
        else
        {

         Mail::to($email)->send(new suparadminMail);
         session::flash('ss');
         return back(); 
        }
        


    }

         public function adminregistration()
    {
       
         return view("suparadmin.adminregistration"); 

    }


         public function adminregistration2(Request $re)
    {
       $email=$re->email;
      $q=\DB::select("select email from suparadmin2 where email='$email'");
      $c=count($q);
      if ($c)
       {
       	session::flash("alert");
       	return view("suparadmin.suparadminlogin");
      	
        }



    }

    public function emailverify(Request $re)
    {
    	   $email=$re->email;
           $data=array();
           $data['email']=$re->email;
           $q=DB::table('semailverify')->insert($data);
    	 
    	   if($q) 
    	   {
    	   	 session::flash('ss1');
             return view("suparadmin.suparadminlogin"); 
    	   }
    	   else
    	   {
    	   	 session::flash('alert2');
    	   	 return view("suparadmin.suparadminlogin");
    	   }
       
       

    }

    public function teachershow()
    {
         $q=\DB::select("select*from teacher");
           return view('suparadmin.teachershow2')->with('r',$q);


    }

        public function studentshow()
    {


           $q=\DB::select("select*from student");
           return view('suparadmin.studentshow')->with('r',$q);


    }

            public function seestudent(Request $re)
    {

    	  $ss=$re->session;
    	   $p=\DB::select("select*from student");
         
           $q=\DB::select("select*from student where session='$ss' ");

            return view('suparadmin.studentshow2')->with('v',$q)->with('r',$p);

    }

            public function seeresult()
    {
            $p=\DB::select("select distinct session from student");
            return view('suparadmin.seeresult')->with('r',$p);


    }

       public function studentresult(Request $re)

    {


    	    $se=$re->session;
    	    $s=$re->semester;

            $c=\DB::select("select distinct course from course where session='$se' AND semester='$s'");
            $a=count($c);
            
            $t=\DB::select("select distinct course from result where session='$se' AND semester='$s'");
              $b=count($t);
            $p=\DB::select("select*from result where session='$se' AND semester='$s'");
             $q=\DB::select("select*from student");
              $v=\DB::select("select*from result where session='$se' AND semester='$s'");
            return view('suparadmin.seeresult2')->with('re',$p)->with('r',$q)->with('o',$v)->with('g',$a)->with('i',$b);


    }

    public function sig(Request $re)
    {
      
         $session=$re->session;
         $smester=$re->semester;

      $q=\DB::select("select*from signature where session='$session' AND semester ='$smester'");

      if (!$q) 
      {
          # code...
  
     
    	$app=new Suparadmin();
       $app->session=$re->input('session');
       $app->semester=$re->input('semester');
      
      
     if ($re->hasFile('image')) {
         $file=$re->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/pic/', $filename);
         $app->image=$filename;
       }
        
       
        $app->save();

           $q=\DB::select("select*from student");
        return view("suparadmin.seeresult3")->with('y',$q);

      }
      else
      {
         Session::flash('alert');
          $q=\DB::select("select*from student");
        return view("suparadmin.seeresult3")->with('y',$q);
      }

    }
    public function coursealocate()
    {
        $t=\DB::select("select * from teacher");
        $c=\DB::select("select * from course");
        return view('suparadmin.coursealocate')->with('v',$t)->with('o',$c);
    }

        public function coursealocate2(Request $re)
    {
         
                  
         $semester=$re->course;
         $c=count($semester);

        
      for($i=0;$i<$c;$i++) 
      {
      
            
        $data = [

                 
                 'course' => $re->course[$i],
                 'tid'=>$re->tid[$i],
                 
                 'session'=>0,
                 'semester'=>0,
                 

               ];
               Classalocate::create($data);            
            $q=\DB::select('select distinct session,semester from course where course="' . $re->course[$i] . '"');


          foreach ($q as  $v)
                {
                       
    \DB::update('UPDATE `coursealocate2` SET session="'. $v->session .'",semester="'. $v->semester .'" WHERE  course="' . $re->course[$i] . '"');
                        
            }        

         }
         return back();
     

    }       


    public function improve()
    {
         $b=\DB::select("select distinct session from student");
           
        

        return view('suparadmin.improve')->with('r',$b);
    }         
      

    public function improve2(Request $re)
    { 
          
            $se=$re->session;
            $s=$re->semester;
            $p=\DB::select("select distinct session,semester,course,examname from studentimprove where session='$se' AND semester='$s'");
             $q=\DB::select("select*from student");
              $v=\DB::select("select*from studentimprove where session='$se' AND semester='$s'");
              $f=\DB::select("select*from failsubject where session='$se' AND semester='$s'");
              $h=\DB::select("select distinct roll from studentimprove where session='$se' AND semester='$s'");
              $c=count($h);

              $r=\DB::select("select*from teacher");
            return view('suparadmin.improveconfarm')->with('re',$p)->with('r',$q)->with('o',$v)->with('n',$r)->with('j',$c)->with('g',$f);
    }  




       public function adminaprove()
    {
         $b=\DB::select("select*from admin");
           
        

        return view('suparadmin.adminapprove')->with('r',$b);
    }        

    
       public function saprove(Request $re)
    
    {



        $em=$re->email;
        $data=array();
        $data['email']=$re->email;
        DB::table('suparadminapprove')->insert($data);
        Mail::to($em)->send(new TeacherMessageMail);
        
        return back();
    }  

           public function sadelete(Request $re)
    
    {



        $em=$re->email;

        DB::table('admin')
        ->where('email',$em)
        ->delete();
    
        
        return back();
    }  


    public function suparLogout()
    {

      Session::flush();
        return redirect('/');
    }



}
