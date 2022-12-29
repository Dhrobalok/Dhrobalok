<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;
use Str;
use Session;
use DB;
use App\Models\Payment;
use App\Models\Coursecontent;
use Response;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Mailsetting;
use App\Models\Courseenroll;
use App\Models\Coursepayment;
use App\Models\Company_Settings;
use Auth;
use Alert;

class UserController extends Controller
{

    public function index($id)
    {


         $userid=Session::get('user_id');


        $allcourse=Coursecontent::where('name',$id)

        ->get();
        return view('backend.Dashboard.Content',['courseall'=> $allcourse]);

    }

    public function content()
    {
        return view('backend.admin.CourseContent');
    }


    public function fileDownload($id)
    {
           $file=Coursecontent::where('id',$id)->first();
           $filepath = public_path($file->file);

           return Response::download($filepath);



    }

    public function Allpermission()
    {
        return view('backend.admin.AllPermission');
    }

    public function Assignpermission(Request $request)
    {


         $allrole=$request->role_id;
         foreach($allrole as $index=>$roles)
         {

            $role=Role::find($request->role_id[$index]);
            if(isset($request->permission[$request->role_id[$index]]))
            {
                $role->syncPermissions($request->permission[$request->role_id[$index]]);

            }


         }

        return redirect()->back();

    }

    public function AssignRole()
    {
        $all=User::get();
        $allrole=Role::get();
        return view('backend.admin.userAssignrole',['alluser'=>$all,'roleall'=>$allrole]);

    }

    public function UpdateRole(Request $request)
    {
        $userall=User::find($request->id);
        $roles=$userall->getRoleNames();



        return response()->json(['html'=>$userall,'role'=>$roles,'success'=>true]);

    }

    public function UpdateUserRole(Request $request)
    {



        $user=User::find($request->id);
        DB::table('model_has_roles')->where('model_id',$request->id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->back();
    }

    public function Addrole()
    {

        return response()->json(['success'=>true]);

    }

    public function Createrole(Request $request)
    {

        $role=new Role;
        $role->name=$request->name;
        $role->save();
        return redirect()->back();
    }


    public function EmailSetting()
    {
        return view('backend.admin.MailSetting');
    }

    public function EmailSettingSave(Request $request)
    {

        DB::table('mailsettings')->delete();
        $mailsetting=new Mailsetting;
        $mailsetting->mail_transport=$request->mail_transport;
        $mailsetting->mail_host=$request->mail_host;
        $mailsetting->mail_port=$request->mail_port;
        $mailsetting->mail_username=$request->mail_username;
        $mailsetting->mail_pass=$request->mail_pass;
        $mailsetting->mail_encrypt=$request->mail_encrypt;
        $mailsetting->mail_form=$request->mail_form;
        $mailsetting->save();
        return redirect()->back();
    }


    public function EmailConfig()
    {
        $mailsetting=Mailsetting::get();
        return view('backend.admin.configmail',['mailsetting'=>$mailsetting]);
    }

    public function ConfigDelete($id)
    {
        Mailsetting::where('id',$id)
        ->delete();

        return redirect()->back();
    }

    public function CourseDetails()
    {

        $allcourse=Course::where('active',1)->get();
        return view('backend.Dashboard.userCourseDetails',['allcourse'=>$allcourse]);
    }

    public function userCourseDetails($id)
    {
        $coursefirst=Course::where('id',$id)->first();
        return view('backend.Dashboard.userEnrollCourseDetails',['coursedetails'=>$coursefirst]);


    }

    public function PaymentDownload($id)
    {
        $userPayment=Courseenroll::find($id);




        $allpayment=Coursepayment::where('user_id',$userPayment->user_id)
        ->where('course_id',$userPayment->course)
        ->where('active',1)
        ->get();

        $pdf = new \Mpdf\Mpdf();
        $content=view('backend.admin.PaymentDownload',compact('allpayment'));

        $pdf -> WriteHtml($content);
        $pdf -> output('Student Payment.pdf','D');

    }


    public function companySettings()
    {
        return view('backend.admin.Compnay');
    }

    public function companySave(Request $request)
    {

        DB::table('company_settings')->delete();
        $companysetting=new Company_settings;

        $companysetting->name=$request->name;
        $companysetting->address=$request->address;
        $image=$request -> file('image');

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $profile_photo_path1 = $image_url;


      }

      $companysetting->image=$profile_photo_path1;
      $companysetting->email=$request->email;
      $companysetting->mobile=$request->mobile;
      $companysetting->location=$request->location;

      $companysetting->save();

      return redirect()->back();

    }

    public function user()
    {
        return view('backend.admin.userAdd');
    }

    public function usersave(Request $request)
    {


        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $image=$request -> file('image');

           if($image)
           {
             $image_name = Str :: random(20);
             $extension = strtolower($image -> getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $extension;
             $upload_path = 'images/';
             $image_url = $upload_path.$image_full_name;
             $image -> move($upload_path,$image_full_name);
             $profile_photo_path1 = $image_url;
           }

        $user->image=$profile_photo_path1;
        $user->status=2;
        $user->save();

        toast('User Saved!','success','animated','toastMixin');
        return redirect()->back();
    }

    public function userDelete($id)
    {
       User::where('id',$id)->delete();
       toast('User Deleted!','success','animated','toastMixin');
        return redirect()->back();
    }

    public function AddCourse()
    {
        return view('backend.admin.addcourse');
    }

}
