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
use App\Models\Tile;

use Illuminate\Http\Request;

class TilesController extends Controller
{

    public function TilesSearch()
    {

        return view('backend.admin.uploadproject.tilesupload.search');
    }
    public function adressfind(Request $request)
    {

        $brick=Tile::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);

    }

    public function tilesIndex()
    {

        return view('backend.admin.uploadproject.tilesupload.tileupload');

    }

    public function tileSave(Request $request)
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

        $steel=new Tile;
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
          $landpic -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }
        $steel->image=$profile_photo_path1;

        $steel->description=$request->description;
        $steel->save();
        return redirect()->back()->with('msg','project save');


    }

    public function locationfind(Request $request)
    {

       return $tiles=Tile::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)
        ->orWhereBetween('size',[$request->minsize,$request->maxsize])
        ->orWhereBetween('price',[$request->minprice,$request->maxprice])
        ->get();
        return view('backend.admin.uploadproject.tilesupload.seetile',['alltiles'=>$tiles]);

    }

    public function tileslview($stellid)
    {
        $tilescontent=Tile::where('id',$stellid)->first();
        return view('backend.admin.uploadproject.tilesupload.tilescontent',['alltiles'=>$tilescontent]);

    }
    //
}
