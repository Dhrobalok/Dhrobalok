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
use App\Models\Fiting;


class FettingsController extends Controller
{
    public function index()
    {
        return view('backend.admin.uploadproject.feetingupload.create');

    }

    public function FeetingSearch()
    {
        return view('backend.admin.uploadproject.feetingupload.search');
    }

    public function adressfind(Request $request)
    {
        $brick=Fiting::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);
    }

    public function feetingsave(Request $request)

    {

        $Feeting=new Fiting;
        $Feeting->category=$request->category;
        $Feeting->employee_id=$request->employeeid;
        $Feeting->productitem=$request->item;
        $Feeting->price=$request->price;
        $Feeting->city=$request->city;
        $Feeting->address=$request->address;
        $Feeting->lat=$request->lat;
        $Feeting->lng=$request->lng;

        $brick_image=$request -> file('image');

        if($brick_image)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($brick_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $brick_image -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $Feeting->image=$profile_photo_path1;
        $Feeting->description=$request->description;
        $Feeting->save();
        return redirect()->back()->with('msg','project save');


    }


    public function locationfind(Request $request)
    {

        $feeting=Fiting::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)
        ->orWhere('productitem',$request->productitem)
        ->orWhere('price',$request->price)
        ->get();
     return view('backend.admin.uploadproject.feetingupload.seefeeting',['allfeeting'=>$feeting]);


    }

    public function Feetingview($stellid)
    {
        $feetingcontent=Fiting::where('id',$stellid)->first();
        return view('backend.admin.uploadproject.feetingupload.feetingcontent',['allfeeting'=>$feetingcontent]);




    }


}
