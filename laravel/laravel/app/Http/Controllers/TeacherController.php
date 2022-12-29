<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Session;
use Mail;
use DB;
use App\Teacher;
use App\Adminapprov;
use App\Mail\teacherEmail;
use App\Mail\approvEmail;
use App\Mail\TeacherMail;
use Illuminate\Support\Facades\Hash;
 ob_get_clean();
class TeacherController extends Controller
{
    public function login()
    {
    	return view("teacherlogin");
    }

       public function tlogin(Request $re)
    {
        $data=array();
        $email=$re->email;

      $data['email']=$re->email;
       
      $data['password']=$re->password;

      $q=\DB::select("select email from teacherverification where email='$email'");

        if ($q) 
        {
          # code...
      
     
      $results = DB::select('select * from teacher where email="' . $data["email"] . '" AND password="' . $data["password"] .'"');

     if(!$results)
          {
                 Session::flash("success");
               return back();
  
          }
     

   
     else
          {
             $r=count($results);

          $q=\DB::select("select distinct session from improveaprove");
          $e=count($q);
          $o=\DB::select("select distinct session,semester from improveaprove");
          
          $m=\DB::select("select t_id from teacher where email='$email'");
           foreach ($m as $key => $value) 
           {

         $t=\DB::select('select distinct session,semester,course from improveteacher where t_id = "'. $value->t_id .'"');
           
           
           $s=count($t);
         
        
           $n=\DB::select('SELECT * FROM teacher where t_id ="'.$value->t_id.'" ');
           $i=\DB::select('SELECT * FROM coursealocate2 where tid ="'.$value->t_id.'" ');
         
             $g=\DB::select('select * from advisenotice');

               $h=\DB::select("select guarddate from examguard where name='$email'");
             
           }
   
          
        
           
          return view('/teacherdasboard')->with('r',$r)->with('f',$e)->with('a',$o)->with('j',$n)->with('z',$g)->with('k',$h)->with('p',$t)->with('d',$s)->with('m',$i);
                    

                 
          }

        }

        else
        {

          Mail::to($email)->send(new TeacherMail);
          Session::flash("alert");
          return back();
        }
       
      
       
        
    }


     public function reg()
    {
    	return view("teacherreg");
    }

    
        

    public function reginsert(Request $re)
    {
      
      
       $app=new Adminapprov();
       $app->name=$re->input('name');
       $app->email=$re->input('email');
       $app->password=$re->input('password');
        if ($re->hasFile('image')) {
         $file=$re->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/pic/', $filename);
         $app->image=$filename;
       }
        $app->t_id=$re->input('t_id');
        $app->save();
        session::flash("success");
        return back();

      
       }
                     

      

    public function resetpass()
    {
    	return view("teacherreset");
    }

     public function resetpass2(Request $re)
    {
    	$mail=$re->email;


    	Mail::to($mail)->send(new teacherEmail());
    	Session::flash("success");
    	return back();
    }


     public function resetpass3()
    {
    	return view("teacherresetpass");
    }


     public function profile()
    {
      return view("teacherprofile");
    }


     public function notice()
    {
      return view("notice");
    }

     public function not(Request $re)
    {
      $data=array();
      $data['comment']=$re->comment;
      $data['date']=$re->date;
      DB::table('comment')->insert($data);
      return back();
    }

  
  public function verifyemail()
  {
    return view('teacher.emailverify');
  }

    public function verifyemail2(Request $re)
  {
    $email=$re->email;
    $data=array();
    $data['email']=$re->email;
    DB::table('teacherverification')->insert($data);
    session::flash('success2');
    return view('teacherlogin');
  }


  public function seatplan()
  {
    $q=\DB::select("select* from teacher");
    return view('seatplan')->with('r',$q);
  }


  public function guard(Request $re)
  {
     $data=array();
     $data['name']=$re->name;
     $data['guarddate']=$re->date;
     DB::table('examguard')->insert($data);
     session::flash('success');
     return back();

  if (!$q) 
  {
     session::flash('alert');
  return back();
  }


  }

    public function examnotice()
  {

    return view('examnotice');
  }

      public function examnotice2(Request $re)
  {

    

  $data=array();
  $data['session']=$re->session;
  $data['semester']=$re->semester;
  $data['title']=$re->title;
  $data['examdate']=$re->examdate;
  $q=DB::table('advisenotice')->insert($data);
  session::flash('success');
  return back();

  if (!$q) 
  {
     session::flash('alert');
  return back();
  }

  }

     
}
