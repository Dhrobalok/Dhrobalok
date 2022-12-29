<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interior;
use Str;

class InteriorController extends Controller
{

    public function Index()
    {

       return view('backend.admin.uploadproject.Interior.search');

    }

  public function search(Request $request)
  {


     $Interior=Interior::orWhere('city',$request->city)
    ->orWhere('address',$request->adress)
    ->get();
   return view('backend.admin.uploadproject.Interior.seeInterior',['allArchetect'=>$Interior]);
  }

  public function adressfind(Request $request)
  {
    $brick=Interior::select('address')->where('city',$request->addreess)
    ->distinct()->get();



     $response=array(
       'status'=>1,
       'adress'=>$brick,

              );
     return response()->json($response, 200);
  }

  public function uploadProject()
  {
       return view('backend.admin.uploadproject.Interior.create');
  }


  public function ProjectSave(Request $request)
  {

       $architect=new Interior;
       $architect->employee_id=$request->employeeid;
       $architect->architect_name=$request->architect_name;
       $architect->iab_member=$request->iabmember;
       $architect->designation=$request->designation;
       $architect->institute=$request->institution;
       $architect->city=$request->city;
       $architect->address=$request->address;
       $architect->lat=$request->lat;
       $architect->lng=$request->lng;


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

    $architect->image=$profile_photo_path1;
    $architect->save();
    return redirect()->back()->with('msg','project save');

  }

  public function view($id)
  {
    $Interiorinfom=Interior::where('id',$id)->first();
    return view('backend.admin.uploadproject.Interior.InteriorContent',['projectall'=>$Interiorinfom]);
    //  return view('backend.admin.uploadproject.Architect.ArchitectContent',['projectall'=>$Architetinfom]);
  }



    //
}
