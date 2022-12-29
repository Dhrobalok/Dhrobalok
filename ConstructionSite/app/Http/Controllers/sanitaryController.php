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
use App\Models\Sanitar;

use Illuminate\Http\Request;

class sanitaryController extends Controller
{

    public function sanitaryIndex()
    {
        return view('backend.admin.uploadproject.uploadsanitary.upload');
    }

    public function sanitarysave(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'category' => 'required',
            'item' => 'required',
            'city' => 'required',
            'address' => 'required',

        ], [
            'price.required' => 'Price is required',
            'category.required' => 'category is required',
            'city.required' => 'City is required',
            'address.required' => 'Location Name is required',
            'item.required' => 'Size is required',

        ]);

        $Sanitary=new Sanitar;
        $Sanitary->category=$request->category;
        $Sanitary->employee_id=$request->employeeid;
        $Sanitary->productitem=$request->item;
        $Sanitary->price=$request->price;
        $Sanitary->city=$request->city;
        $Sanitary->address=$request->address;
        $Sanitary->lat=$request->lat;
        $Sanitary->lng=$request->lng;

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
        $Sanitary->image=$profile_photo_path1;
        $Sanitary->description=$request->description;
        $Sanitary->save();
        return redirect()->back()->with('msg','project save');


    }

    public function SantarySearch()
    {
        return view('backend.admin.uploadproject.uploadsanitary.search');
    }

    public function adressfind(Request $request)
    {

        $brick=Sanitar::select('address')->where('city',$request->addreess)
        ->distinct()->get();

         $response=array(
           'status'=>1,
           'adress'=>$brick,

                  );
         return response()->json($response, 200);


    }

    public function locationfind(Request $request)
    {


        $Sanitary=Sanitar::orWhere('city',$request->city)
        ->orWhere('address',$request->adress)
        ->orWhere('productitem',$request->productitem)
        ->orWhereBetween('price',[$request->minprice,$request->maxprice])
        ->get();
        return view('backend.admin.uploadproject.uploadsanitary.seesanitary',['allsanitary'=>$Sanitary]);


    }

    public function Sanitaryview($sanitaryid)
    {
        $sanitarycontent=Sanitar::where('id',$sanitaryid)->first();

        return view('backend.admin.uploadproject.uploadsanitary.sanitarycontent',['allsanitary'=>$sanitarycontent]);
    }

}
