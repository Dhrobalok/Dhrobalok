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
use App\Models\Electric;

class electricController extends Controller
{
    public function index()
    {
        return view('backend.admin.uploadproject.Electronic.upload');
    }

    public function SaveElectric(Request $request)
    {

        $electric=new Electric;
        $electric->employee_id=$request->employeeid;
        $electric->category=$request->category;
        $electric->iteam=$request->item;
        $electric->address=$request->address;
        $electric->price=$request->price;

        $electric->city=$request->city;
        $electric->lat=$request->lat;
        $electric->lng=$request->lng;

        $electric_image=$request->image;
        if($electric_image)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($electric_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $electric_image -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $electric->image=$profile_photo_path1;
        $electric->description=$request->description;
        $electric->save();
        return redirect()->back()->with('msg','project save');

    }

    public function seeElectric($electricid)
    {
       $electriccontent=Electric::where('iteam',$electricid)->get();
       return view('backend.admin.uploadproject.Electronic.seeproduct',['electric'=> $electriccontent]);


    }

    public function ElectricProduct($electricid)
    {

        $content=Electric::where('id',$electricid)->first();
        return view('backend.admin.uploadproject.Electronic.Electricproduct',['electricproduct'=>$content,'iteam'=>$content->iteam]);

    }

}
