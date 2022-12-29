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
use App\Models\Cement;
use App\Models\Vedio;

class CementController extends Controller
{
    public function index()
    {

        return view('backend.admin.uploadproject.cementupload.dashboard');
    }

    public function CementLocation(Request $request)

    {

        $cement=Cement::orWhere('city',$request->city)
        ->orWhere('locationName',$request->adress)
        ->orWhereBetween('price',[$request->minprice,$request->maxprice])
        ->orWhereBetween('quantity',[$request->minquantity,$request->maxquantity])
        ->get();
    if($cement)
    {
      return view('backend.admin.uploadproject.cementupload.cementview',['landall'=>$cement]);

    }
    else
    {
      return view('backend.admin.uploadproject.landupload.landview');
    }


    }

    public function create()
   {
      return view('backend.admin.uploadproject.cementupload.create');

   }

   public function savecement(Request $request)
   {
     $cement=new Cement;
     $cement->cementname=$request->cementname;
     $cement->employee_id=$request->employeeid;
     $cement->quantity=$request->quantity;
     $cement->price=$request->price;
     $cement->city=$request->city;
     $cement->locationName=$request->locationName;
     $cement->lat=$request->lat;
     $cement->lng=$request->lng;
     $cement->description=$request->description;

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
     $cement->image=$profile_photo_path1;
     $cement->save();
     return redirect()->back()->with('msg','project save');

   }

   public function CementAdress(Request $request)
   {

    $brick=Cement::select('locationName')->where('city',$request->addreess)
   ->distinct()->get();

    $response=array(
      'status'=>1,
      'adress'=>$brick,

             );
    return response()->json($response, 200);
   }

   public function CementView($cementid)
   {

    $brickinfom=Cement::where('id',$cementid)->first();
    return view('backend.admin.uploadproject.cementupload.cementcontent',['cementall'=>$brickinfom]);

   }
}
