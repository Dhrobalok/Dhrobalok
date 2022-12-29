<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Hash;
use Str;
use Mapper;
use App\Models\Project;
use App\Models\Payslip;
use Session;
use App\Models\Employee;
use App\Models\User;
use App\Models\Companee;

class RuConstructionUser extends Controller
{

    public function index(Request $request)
    {


          $location=Str::lower($request->location);


          //Mapper::map($request->lat, $request->lng);

         $projectinfo=Project::orWhere('city', $request->city)

        ->orWhere('locationName',$request->location)
        ->orWhereBetween('size',[$request->minsize,$request->maxsize])
        ->orWhereBetween('price',[$request->minprice,$request->maxprice])
         ->orWhere('type','ongoing')
         ->orWhere('type','upcoming')
         ->get();
         if($projectinfo)
         {
           return view('backend.admin.userdashboard.searchcontent',['projectinfo'=>$projectinfo,'size'=>$request->size]);

         }






    }
    public function StoreContact(Request $request)
    {

       $adminEmail=User::where('status',2)->first();
      //  $employee=Project::where('id',$request->id)->first();
       $userEmail=Employee::where('id',$request->id)->first();


        $emails = [$adminEmail->email, $userEmail->email];

          $details =
          [
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'size' =>$request->size,
            'body' => 'This Coustomar is interest for booking this'.$userEmail->company_type,

          ];



        \Mail::to($emails)->send(new \App\Mail\userMail($details));


         return view('backend.admin.userdashboard.dashboarduser');


    }

    public function uploadproject()
    {
      return view('backend.admin.uploadproject.create');
    }
    public function projectsaze(Request $request)
    {

      $project=new Project;
      $project->name=$request->name;
      $project->type=$request->type;
      $location=Str::lower($request->locationName);
      $project->locationName=$location;
      $project->employeeid=$request->employeeid;
      $project->price=$request->price;
      $project->size=$request->size;
      $project->lat=$request->lat;
      $project->lng=$request->lng;
      $project->city=$request->city;
      $project->area=$request->area;
      $project->numbuilding=$request->numbuilding;
      $project->height=$request->height;
      $project->numberflat=$request->numberflat;
      $project->numparking=$request->numparking;
      $project->lift=$request->lift;
      $project->substation=$request->substation;
      $project->generator=$request->generator;
      $project->fEscape=$request->fEscape;
      $project->stair=$request->stair;
      $project->communityhall=$request->communityhall;
      $project->prayerhall=$request->prayerhall;
      $project->gym=$request->gym;
      $project->description=$request->description;


      $image = $request -> file('image');

      $image2 = $request -> file('image2');
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

      if($image2)
      {
        $image_name = Str :: random(20);
        $extension = strtolower($image2 -> getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $extension;
        $upload_path = 'images/';
        $image_url = $upload_path.$image_full_name;
        $image2 -> move($upload_path,$image_full_name);
        $profile_photo_path2 = $image_url;

      }
      $project->image=$profile_photo_path1;
      $project->image2=$profile_photo_path2;
      $project->save();



      return redirect()->back()->with('msg','project save');



    }

    public function payslip(Request $request)
    {
      // return $request;
      $payslip=new Payslip;
      $image = $request -> file('payslip');
      $profile_photo_path1='';
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
      $payslip->employee_id=$request->employee_id;
      $payslip->payslip= $profile_photo_path1;
      $payslip->status=0;
      $payslip->save();
      $email=Session::get('emailname');
      $emailid=Session::get('emailname');
      $userId=Employee::where('email',$emailid)->first();
      $employee=Employee::where('id',$userId->id)->first();
      return view('frontend.profile',['employee' => $employee]);

    }
    public function yearly_renew()
    {
      $payslip=Payslip::where('status',0)->get();
      return view('backend.admin.aprove.yearly_renew',['payslips'=>$payslip]);
    }
    public function payaprove($userid)
    {
      Payslip::where('id', $userid)
       ->update([
           'status' => 1
        ]);

        return redirect()->back();

    }

    public function deletepay($userid)
    {
      DB::table('payslips')->where('id',$userid)->delete();
      return redirect()->back();
    }
    public function searchproperty($userid)
    {

      $all=Project::where('id',$userid)->first();
      return view('backend.admin.userdashboard.projectview',['projectall'=> $all]);

    }

}
