<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use App\Models\Hardwar;

class HardwareController extends Controller
{
    //

    public function Index()
    {
        return view('backend.admin.uploadproject.Hardware.upload');

    }

    public function SaveHardware(Request $request)
    {
        $hardware=new Hardwar;
        $hardware->category=$request->category;
        $hardware->employee_id=$request->employeeid;
        $hardware->productitem=$request->item;
        $hardware->price=$request->price;
        $hardware->address=$request->address;
        $hardware->city=$request->city;
        $hardware->lat=$request->lat;
        $hardware->lng=$request->lng;
        $hardware->description=$request->description;
        $hardware_image=$request -> file('image');

        if($hardware_image)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($hardware_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $hardware_image -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $hardware->image=$profile_photo_path1;
        $hardware->save();
        return redirect()->back()->with('msg','project save');


    }

    public function ProductIteam($item)
    {
        $allhardware=Hardwar::where('productitem',$item)->get();
        return view('backend.admin.uploadproject.Hardware.hardwareproduct',['hardwareall'=>$allhardware]);

    }

    public function Productview($itemid)
    {
        $hardwarecontent=Hardwar::where('id',$itemid)->first();
        return view('backend.admin.uploadproject.Hardware.hartdwarecontent',['contentHard'=>$hardwarecontent]);

    }


}
