<?php

namespace App\Http\Controllers;
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
use App\Models\Door;

use Illuminate\Http\Request;

class Doorcontroller extends Controller
{

    public function DoorSearch()
    {

        return view('backend.admin.uploadproject.doorupload.search');
    }
    public function adressfind(Request $request)
    {

        $brick=Door::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);

    }

    public function doorIndex()
    {

        return view('backend.admin.uploadproject.doorupload.doorupload');

    }

    public function doorsave(Request $request)
    {

        $validatedData = $request->validate([
            'price' => 'required',
            'category' => 'required',
            'size' => 'required',
            'city' => 'required',
            'address' => 'required',

        ], [
            'price.required' => 'Price is required',
            'category.required' => 'category is required',
            'city.required' => 'City is required',
            'address.required' => 'Location Name is required',
            'size.required' => 'Size is required',

        ]);

        $steel=new Door;
        $steel->category=$request->category;
        $steel->employee_id=$request->employeeid;
        $steel->size=$request->size;
        $steel->price=$request->price;
        $steel->city=$request->city;
        $steel->address=$request->address;
        $steel->lat=$request->lat;
        $steel->lng=$request->lng;

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
        $steel->image=$profile_photo_path1;
        $steel->description=$request->description;
        $steel->save();
        return redirect()->back()->with('msg','project save');


    }

    public function locationfind(Request $request)
    {

        $doors=Door::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)
        ->orWhereBetween('size',[$request->minsize,$request->maxsize])
        ->orWhereBetween('price',[$request->minprice,$request->maxprice])
        ->get();
        return view('backend.admin.uploadproject.doorupload.seedoor',['alldoor'=>$doors]);

    }

    public function doorview($stellid)
    {

        $doorcontent=Door::where('id',$stellid)->first();
        return view('backend.admin.uploadproject.doorupload.doorcontent',['alldoor'=>$doorcontent]);

    }
    //
}
