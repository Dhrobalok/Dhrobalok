<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Architect;
use Str;

class ArchitectController extends Controller
{

    public function Index()
    {
        return view('backend.admin.uploadproject.Architect.search');

    }

  public function search(Request $request)
  {

     $Architect=Architect::orWhere('city',$request->city)
    ->orWhere('address',$request->adress)
    ->get();
    return view('backend.admin.uploadproject.Architect.seeArchitect',['allArchetect'=>$Architect]);
  }

  public function adressfind(Request $request)
  {
    $brick=Architect::select('address')->where('city',$request->addreess)
    ->distinct()->get();

    $brick=Architect::select('address')->where('city',$request->addreess)
    ->distinct()->get();

     $response=array(
       'status'=>1,
       'adress'=>$brick,

              );
     return response()->json($response, 200);
  }

  public function uploadProject()
  {
       return view('backend.admin.uploadproject.Architect.create');
  }


  public function ProjectSave(Request $request)
  {
       $architect=new Architect;
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
    $Architetinfom=Architect::where('id',$id)->first();
     return view('backend.admin.uploadproject.Architect.ArchitectContent',['projectall'=>$Architetinfom]);
  }



    //
}
