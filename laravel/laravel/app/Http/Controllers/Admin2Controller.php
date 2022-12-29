<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use Mail;
use App\Mail\sendEmail;
use DB;
use App\StudentApprov;
use App\Mail\TeacherMessageMail;
 ob_get_clean();

class Admin2Controller extends Controller
{
      public function adminlogin()
    {
       return view("adminlogin");

    }
    public function logout()
    {
       //Session::flash();

       return view("adminlogin");

    }

     public function adminreg()
    {
       return view("adminreg");

    }

     public function adminregdata(Request $re)
    {
  

       
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        

         request()->image->move(public_path('uploads/pic'), $imageName);


        
      //$data['id']=$re->id;
       $data['name']=$re->name;
       $data['email']=$re->email;
       $data['password']=$re->password;
     
        $data['image']=$imageName;


        DB::table('admin')->insert($data);
        return Redirect::to('/adminreg');
 

    }


     public function adminlgdata(Request $re)
    {
      $em=$re->email;
      $data=array();
      $data['email']=$re->email;
       $data['password']=$re->password;
       
  
  
        $p=\DB::select("select email from suparadminapprove where email='$em'");

     if ($p) 
     {
  
      $results = DB::select('select * from admin where email="' . $data["email"] . '" AND password="' . $data["password"] .'"');

     if(!$results)
        {
               Session::flash("success");
               return back();
	
        }
    
     else
        {
          
        //  View::share('key', $w);
          $q1=\DB::select('SELECT roll FROM users');
          $q2=count($q1);

          $q3=\DB::select('SELECT t_id FROM adminapprov');
           $q4=count($q3);

     	return view('/admindasboard',compact('q2','q4'));
        }

      }
      else
      {
         Session::flash("success3");
          return back();

      }
   }


   public function resetpass()
   {
       return view('reset');

   }

     public function resetmail(Request $data)
   {
       
       $email=$data->email;
       Mail::to($email)->send(new sendEmail);
       Session::flash("success");
        return back();
   }



   public function resetpass2()
   {
       return view('resetpass');

   }

    public function update(Request $re)
    {
      $email=$re->email;
      $password=$re->password;
      $u=DB::table('admin')
      ->where('email',$email)
      ->first();
       if (!$u) {
                session::flash('alert');
                return back();
               }
       else
              {
    	
    	
    	       DB::table('admin')
            ->where('email', $email)
            ->update(['password' => $password]);
            session::flash('success2');
            return view("adminlogin");

              }

      }



   public function teacherapprove()
   {
       $users = DB::table('adminapprov')->get();

        return view("teacherapprove")->with('ras',$users);


   }



   public function studentapprove()
   {
       $users = DB::table('users')->get();

        return view("studentapprove")->with('ras',$users);


   }


      public function edit($id)
    {
      $users=DB::table('users')
      ->where('id',$id)
      ->first();
    return view('/studentedit')->with('re',$users);
      
    }


      public function approve(Request $re,$id)
    {

        $email=$re->email;
      //$query=\DB::select("select id from student where id='$id'");
      //return($query);
      $r=$re->input('roll');
        
       $app=new StudentApprov();
       $app->name=$re->input('name');
        $app->email=$re->input('email');
        $app->password=$re->password;
        $app->blood=$re->input('blood');
        $app->mobile=$re->input('mobile');
        $app->session=$re->input('session');
        $app->roll=$re->input('roll');
          $app->image=$re->input('image');
       $query=\DB::select("select roll from student where roll ='$app->roll'");
       //int $rt=$query;
       //return($rt);
      if ($query) 
       {

        //return("rrr");

       Session::flash('alert');
       return back();
    
       }


       elseif ($r!=$query) 
       {
         # code...
       
     
        //return("www");
       $app->save();

      Mail::to($email)->send(new TeacherMessageMail);
     
       Session::flash('success');
       return back();
        }

      //Mail::to($email)->send(new approvEmail);
 

    
      
    }



         public function delet($id)
    {


      $users=DB::table('users')
      ->where('id',$id)
      ->delete();
      Session::flash("delet");
    return back();

     
      
    }





}
