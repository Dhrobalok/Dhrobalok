<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Coursecontent;
use App\Models\Courseenroll;
use App\Models\User;
use Str;
use Response;
use DB;
use Session;
use App\Models\Schedule;
use Illuminate\Support\Facades\Redirect;
use App\Models\Batch;

class Coursepayment extends Controller
{

    public function index($id)
    {
       $coursedetails=Course::where('id',$id)->first();
       return view('backend.Dashboard.coursejoin',['coursedetails'=>$coursedetails]);

    }

    public function findcourse(Request $request)
    {

      
        $allday=Batch::where('course_id',$request->c_id)
        ->where('batch_number',$request->id)
       
        ->pluck('day');

        $alltime=Batch::where('course_id',$request->c_id)
        ->where('batch_number',$request->id)
       
        ->first();



        $response=array(
            'status'=>1,
            'day'=>$allday,
             'time'=>$alltime->time,

        );


        // return response()->json(['status' => true, 'data' => $response]);
         return response()->json($response, 200);


    }

}
