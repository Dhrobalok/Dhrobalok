<?php

namespace App\Http\Controllers;
use Mail;
use DB;
use Session;
use App\Teacher;
use App\Mail\approvEmail;
use Illuminate\Http\Request;
use App\Mail\TeacherMessageMail;

 ob_get_clean();

class ApprovController extends Controller
{
       public function edit($id)
    {
      $users=DB::table('adminapprov')
      ->where('id',$id)
      ->first();
    return view('/teacheredit')->with('re',$users);
      
    }


         public function delet($id)
    {
      $users=DB::table('adminapprov')
      ->where('id',$id)
      ->delete();
      Session::flash("delet");
    return back();

      
    }

      public function approve(Request $re,$id)
    {


      $t=$re->t_id;
      $email=$re->email;
 
      $data=array();
     
      $data['name']=$re->name;
      $data['email']=$re->email;
      $data['password']=$re->password;
       $data['image']=$re->image;
      $data['t_id']=$re->t_id;
    

        

         $query=\DB::select("select t_id from teacher where t_id ='$t'");

       //int $rt=$query;
       //return($rt);
      if ($query) 
       {

        //return("rrr");

       Session::flash('alert');
       return back();
    
       }


       elseif ($t!=$query) 
       {
         # code...
         DB::table('teacher')->insert($data);

     
       

         $q=\DB::select("select * from adminapprov");

        


        

           

          Mail::to($email)->send(new TeacherMessageMail);
          Session::flash("success4");
         Session::flash('success');
         return back();

         }

     
       
       }
      
     
        //return("www");
       //$app->save();
        



    
      
    
    public function update(Request $re)
    {
      $email=$re->email;
      $password=$re->password;
      $u=DB::table('teacher')
      ->where('email',$email)
      ->first();
      if (!$u) {
                session::flash('alert');
                return back();
               }

             else
               {
                DB::table('teacher')
                ->where('email', $email)
                ->update(['password' => $password]);
                 Session::flash("update");
                 return back();

     }

    }
}
