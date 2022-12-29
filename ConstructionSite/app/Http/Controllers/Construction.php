<?php

namespace App\Http\Controllers;

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
use App\Models\Brick;
use App\Models\Land;
use App\Models\Vedio;

class Construction extends Controller
{

  public function landIndex()
  {
    return view('backend.admin.uploadproject.landupload.create');

  }

  public function landSave(Request $request)
  {
      //return $request;
      $land=new Land;
      $land->area=$request->area;
      $land->size=$request->size;
      $land->price=$request->price;
      $land->city=$request->city;
      $land->address=$request->address;
      $land->employeeid=$request->employeeid;
      $land->lat=$request->lat;
      $land->lng=$request->lng;
      $land->description=$request->description;

      $landpic = $request -> file('landpic');
      $profile_photo_path1='';
      if($landpic)
      {
        $image_name = Str :: random(20);
        $extension = strtolower($landpic -> getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $extension;
        $upload_path = 'images/';
        $image_url = $upload_path.$image_full_name;
        $landpic -> move($upload_path,$image_full_name);
        $profile_photo_path1 = $image_url;
      }
      $land->landpic=$profile_photo_path1;
      $land->save();


    return redirect()->back()->with('msg','project save');
  }


  public function Landfound(Request $request)
  {

    $land=Land::orWhere('city',$request->city)
    ->orWhere('address',$request->location)
    ->orWhereBetween('size',[$request->minsize,$request->maxsize])
    ->orWhereBetween('price',[$request->minprice,$request->maxprice])
    ->get();
    if($land)
    {
      return view('backend.admin.uploadproject.landupload.landview',['landall'=>$land]);

    }
    else
    {
      return view('backend.admin.uploadproject.landupload.landview');
    }


  }

  public function Landkview($landid)
  {
    $allland=Land::where('id',$landid)->first();
    return view('backend.admin.uploadproject.landupload.landcontent',['landall'=>$allland]);

  }

  public function plotIndex()
  {
    return "plot";

  }

  public function ploatlocation(Request $request)
  {
    $brick=Land::select('address')->where('city',$request->addreess)
   ->distinct()->get();

    $response=array(
      'status'=>1,
      'adress'=>$brick,

             );
    return response()->json($response, 200);

  }
  public function brickIndex()
  {
    return view('backend.admin.uploadproject.brickipload.create');

  }

  public function bricksave(Request $request)
  {

    $brick=new Brick;

    $brick->brickname=$request->brickname;
    $brick->bricksize=$request->bricksize;
    $brick->category=$request->category;
    $brick->employee_id=$request->employeeid;
    $brick->price=$request->price;
    $brick->city=$request->city;
    $brick->address=$request->address;
    $brick->lat=$request->lat;
    $brick->lng=$request->lng;
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
    $brick->image=$profile_photo_path1;

    $brick->description=$request->description;

    $brick->save();


    return redirect()->back()->with('msg','project save');

  }

  public function adressfind(Request $request)
  {


    $brick=Brick::select('address')->where('city',$request->addreess)
   ->distinct()->get();

    $response=array(
      'status'=>1,
      'adress'=>$brick,

             );
    return response()->json($response, 200);

  }

  public function aptlocation(Request $request)
  {

    $brick=Project::select('locationName')->where('city',$request->addreess)
   ->distinct()->get();

    $response=array(
      'status'=>1,
      'adress'=>$brick,

             );
    return response()->json($response, 200);

  }

  public function brickdashboard()
  {
    $allvedio=Vedio::get();
    foreach($allvedio as $video)
    {
       $vedioall[]=$video->vedio;
    }
    return view('backend.admin.uploadproject.brickipload.dashboard',compact('vedioall'));
  }

  public function brickLocation(Request $request)
  {


       $allbrick=Brick::select('*')
      ->orWhere('city',$request->city)
     ->orWhere('address',$request->adress)
     ->orWhereBetween('bricksize',[$request->minsize,$request->maxsize])
     ->orWhereBetween('price',[$request->minprice,$request->maxprice])


     ->get();
     return view('backend.admin.uploadproject.brickipload.brickView',['brickall'=>$allbrick]);

  }
  public function brickview($brickid)
  {
     $brickinfom=Brick::where('id',$brickid)->first();
     return view('backend.admin.uploadproject.brickipload.brickviewcontent',['projectall'=>$brickinfom]);

  }
  public function cementIndex()
  {
    return "cement";

  }
  public function steelIndex()
  {
    return "steel";

  }
  public function tilesIndex()
  {
    return "tiles";

  }
  public function doorIndex()
  {
    return "door";

  }
  public function sanitaryIndex()
  {
    return "sanitary";

  }

  public function feetingsIndex()
  {
    return "feeting";

  }
  public function hardwareIndex()
  {
    return "hardware";

  }
  public function architectIndex()
  {
    return "architect";

  }
  public function interiorIndex()
  {
    return "interior";

  }

  public function electricIndex()
  {
    return "electric";

  }
  public function paintIndex()
  {
    return "paint";

  }

}
