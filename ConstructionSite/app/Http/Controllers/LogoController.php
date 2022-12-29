<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Str;

class LogoController extends Controller
{
    public function index()
    {
        return view("backend.admin.aprove.logoAd");
    }

    public function LogoAdvertise(Request $request)
    {
        $logo=new Logo;
        $logo->company_name=$request->name;
        $logo->link=$request->link;

        $brick_image=$request -> file('logo');

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
    $logo->logo=$profile_photo_path1;
    $logo->save();
     return redirect()->route('Logolist');


    }

    public function nonRegister(Request $request )
    {

          $logo=new Logo;
          $logo->company_id=$request->Company;
          $logo->save();
          return response()->json(['success'=>true]);
    }

    public function Logolist()
    {
        return view('backend.admin.aprove.LogoIndex');
    }

    public function DeleteVedio($id)
    {
        Logo::where('id',$id)->delete();
        return redirect()->route('Logolist');
    }

    public function EditVedio($id)
    {
        $vedio=Logo::where('id',$id)->first();
        return view('backend.admin.aprove.editLogo',['vedio'=>$vedio]);
    }

    public function UpdateVedio(Request $request,$id)
    {

        if($request->name)
        {

            Logo::where('id', $id)
            ->update([
            'company_name' => $request->name
                ]);

        }
        if($request->vedio)
        {
            $vedio_file=$request -> file('vedio');
            $image_name = Str :: random(20);
            $extension = strtolower($vedio_file -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $vedio_file -> move($upload_path,$image_full_name);
            $profile_photo_path1 = $image_url;

            Logo::where('id', $id)
            ->update([
            'logo' => $profile_photo_path1
                ]);

        }

        return redirect()->route('Logolist');
    }

}
