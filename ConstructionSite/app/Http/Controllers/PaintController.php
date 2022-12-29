<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Hash;
use Str;
use Mapper;
use App\Models\Paint;

class PaintController extends Controller
{
    public function paintIndex()
    {
        return view('backend.admin.uploadproject.Paint.upload');

    }

    public function paintSave(Request $request)
    {

        $paint=new Paint;
        $paint->employee_id=$request->employeeid;
        $paint->address=$request->address;
        $paint->city=$request->city;
        $paint->lat=$request->lat;
        $paint->lng=$request->lng;
        $paint->price=$request->price;
        $paint->description=$request->description;
        $paint_image=$request->image;
        if($paint_image)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($paint_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $paint_image -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $paint->image=$profile_photo_path1;
        $paint->save();

        return redirect()->back()->with('msg','project save');
    }

    public function search()
    {
        return view('backend.admin.uploadproject.Paint.search');

    }

    public function adressfind(Request $request)
    {
        $brick=Paint::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);

    }

    public function Paintlocation(Request $request)
    {

        $paint=Paint::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)

        ->get();
        return view('backend.admin.uploadproject.Paint.seepaint',['allpainet'=>$paint]);

    }

    public function PaintSee($paintid)
    {
        $contentpaint=Paint::where('id',$paintid)->first();
        return view('backend.admin.uploadproject.Paint.paintproduct',['paintcontent'=> $contentpaint]);
    }



}
