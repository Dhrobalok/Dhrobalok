<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vedio;
use Str;

class VedioController extends Controller
{

    public function index()
    {
        return view('backend.admin.aprove.vedioUpload');
    }

    public function VedioSave(Request $request)
    {





             if($request->link!=null)
             {

                    $vedio=new Vedio;
                    $vedio->name=$request->name;
                    $vedio->vedio=$request ->link;
                    $vedio->duration=$request->duration;
                    $vedio->save();

             }

             else
             {
                    $this->validate($request, [
                             'vedio' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
                                        ]);

                    $vedio=new Vedio;
                    $vedio->name=$request->name;
                    $vedio_file=$request -> file('vedio');

                    if($vedio_file)
                    {
                    $image_name = Str :: random(20);
                    $extension = strtolower($vedio_file -> getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $extension;
                    $upload_path = 'images/';
                    $image_url = $upload_path.$image_full_name;
                    $vedio_file -> move($upload_path,$image_full_name);
                    $profile_photo_path1 = $image_url;
                    }
                    $vedio->vedio=$profile_photo_path1;
                    $vedio->duration=$request->duration;
                    $vedio->save();

             }


            return redirect('Advertise');

    }

    public function AdvertiseList()
    {
        $allVedio=Vedio::get();
        return view('backend.admin.aprove.vedioList',['vedioFile'=>$allVedio]);
    }

    public function DeleteVedio($id)
    {
        Vedio::where('id',$id)->delete();
        return redirect('Advertise');
    }

    public function EditVedio($id)
    {
        $vedio=Vedio::where('id',$id)->first();
        return view('backend.admin.aprove.editVedio',['vedio'=>$vedio]);
    }

    public function UpdateVedio(Request $request,$id)
    {

        if($request->name)
        {

            Vedio::where('id', $id)
            ->update([
            'name' => $request->name
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

            Vedio::where('id', $id)
            ->update([
            'vedio' => $profile_photo_path1
                ]);

        }

        return redirect('Advertise');
    }
    //
}
