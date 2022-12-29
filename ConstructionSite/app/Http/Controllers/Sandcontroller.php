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
use App\Models\Sand;

class Sandcontroller extends Controller
{
    public function sandIndex()
    {
        return view('backend.admin.uploadproject.sandupload.uploadsand');
    }

    public function sandsave(Request $request)
    {
        $sand=new Sand;

        $sand->category=$request->category;
        $sand->employee_id=$request->employeeid;

        $sand->city=$request->city;
        $sand->address=$request->address;
        $sand->lat=$request->lat;
        $sand->lng=$request->lng;

        $sand_image=$request -> file('image');

        if($sand_image)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($sand_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $sand_image -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $sand->image=$profile_photo_path1;
        $sand->description=$request->description;
        $sand->save();
        return redirect()->back()->with('msg','project save');
    }

    public function search()
    {
        return view('backend.admin.uploadproject.sandupload.search');
    }


    public function adressfind(Request $request)
    {
        $brick=Sand::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);

    }

    public function Sandlocation(Request $request)
    {
        $sand=Sand::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)

        ->get();
        return view('backend.admin.uploadproject.sandupload.seesand',['allsand'=>$sand]);

    }

    public function Sandview($stellid)
    {

        $Sandcontent=Sand::where('id',$stellid)->first();

       return view('backend.admin.uploadproject.sandupload.sandcontent',['allsand'=>$Sandcontent]);
    }
}
