<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survetotal;
use App\Models\Item;
use App\Models\User;
use App\Models\question;
use App\Models\Surve;
use App\Models\Teacher;
use App\Models\Copyitm;
use App\Exports\AdminExport;
use Session;
use App\Exports\IndividualExport;
use Str;
use Excel;
use Hash;
use DB;
use App\Models\Copyquestion;
use App\Exports\TeacherExport;
use App\Models\Location;

//CopyQuestion TeacherExport
use App\Imports\StudentImport;

class AdminController extends Controller
{
    public function index()
    {
        $totaluser_id=Survetotal::select('item_id')->distinct()->get();

        if( $totaluser_id !='[]')
          {
            foreach($totaluser_id as $key=>$value)
              {
               // $totaluser_id=Item::select('id')->where('user_id',$userId->user_id)->get();

                    $totalSurvey=Survetotal::where('item_id',$value->item_id)->get();
                    $surveNumber=count($totalSurvey);
                    $iteamid[$value->item_id]=$surveNumber;


                }

           }

          else
              {
                 $iteamid[]=0;

               }




         $iteamnamne=Survetotal::select('item_id')->distinct()->get();

        if($iteamnamne!='[]')
                {
                    foreach($iteamnamne as $item)
                    {
                         $name=Item::where('id',$item->item_id)->first();
                         if($name)
                               {
                               $data[]=Str::limit($name->keyword,30);

                               }

                       }

                }

         else
             {
              $data[]=0;
             }




           foreach($iteamid as $value)
              {
                $itemnumber[]=$value;
              }



           return view('backend.Dashboard.AdminDashboard',compact('data','itemnumber'));
    }


    public function ApproveUser()
    {

          $alluser=User::where('status','!=',2)->get();
          Session::put('tasks_url',request()->fullUrl());
          return view('backend.Dashboard.ApproveUser',['user'=>$alluser]);
    }

    public function userApprove($id)
    {
        User::where('id', $id)
       ->update([
           'status' => 1
        ]);

        return redirect()->back()->with('approve','successfull');
    }

    public function userDelete($id)
    {

        User::where('id', $id)
       ->update([
           'status' => 0
        ]);

        return redirect()->back()->with('delete','successfull');
    }

    public function AllSurvey()
    {
        return view('backend.admin.allSurve');
    }

    public function ViewSurvey($id)
    {


        $question=question::where('iteam_id',$id)

        ->get();


        $user_id=Surve::select('user_id')->where('item_id',$id)


       ->distinct()
       ->get();

       $item=Item::where('id',$id)->first();

     Session::put('tasks_url',request()->fullUrl());

       return view('backend.admin.viewSurve',['questionName'=>$question,'userId'=>$user_id,'name'=>$item,'iteam_id'=>$id]);


    }

    public function SurveyPrint($id)
    {

        return Excel::download(new AdminExport($id), 'Survey.xlsx');


    }

    public function UserCreate()
    {
        return view('backend.admin.adduser');
    }

    public function UserStore(Request $request)
    {


        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email'
            ]
        );



        $user=new User;
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->status=1;
        $hashedPassword = Hash::make($request->password);

        $user->password=$hashedPassword;
        $userImage=$request->image;

        if($userImage)
        {
          $image_name = Str :: random(20);
          $extension = strtolower($userImage -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'images/';
          $image_url = $upload_path.$image_full_name;
          $userImage -> move($upload_path,$image_full_name);
          $profile_photo_path1 = $image_url;
        }

        $user->image=$profile_photo_path1;
        $user->save();
        return redirect()->back()->with('msg','New user added');
    }

    // public function IndividualView($id)
    // {
    //     return $id;

    // }

    public function IndividualPrint($id)
    {

        return Excel::download(new IndividualExport($id), 'Survey.xlsx');

    }

    public function IndividualDelete($id)
    {
        DB::table('survetotals')

        ->where('servey_id', $id)
        ->delete();

        DB::table('surves')

        ->where('surve_id', $id)
        ->delete();





        return redirect()->back()->with('delete','Survey Delete Successfully !');

    }

    public function SurveyDelete($id)
    {

        DB::table('items')
        ->where('id', $id)
        ->delete();

        DB::table('questions')
        ->where('iteam_id', $id)
        ->delete();

        DB::table('survetotals')

        ->where('item_id', $id)
        ->delete();

        DB::table('surves')

        ->where('item_id', $id)
        ->delete();

        DB::table('copyitms')

        ->where('item_id', $id)
        ->delete();

        return redirect()->back()->with('delete','Survey Delete Successfully !');


    }

    public function TeacherList()
    {
        return view('backend.admin.TeacherList');
    }

    public function TeacherSave(Request $request)
    {
        $Allteacher=$request->input('name', []);

        foreach( $Allteacher as $index=>$value)
        {
              $teacher=new Teacher;
              $teacher->name=$request->name[$index];
              $teacher->save();
        }

        return response()->json(['success'=>true]);
    }

    public function StudentList()
    {
        return view('backend.admin.StudentList');
    }

    public function upload()
    {
        return view('backend.admin.upload');
    }



    public function StudentSave(Request $request)
    {

        Excel::import(new StudentImport, $request->file('student'));
        return redirect()->route('stduentList');
    }

    public function DelateStudent($id)
    {

        DB::table('students')
        ->where('id', $id)
        ->delete();
      return redirect()->back()->with('delete','delete');
    }

    public function csvdownload()
    {
        $file= public_path(). "/company_pic/students.csv";

        return response()->download($file);
    }

    public function DelateTeacher($id)
    {

        DB::table('teachers')
        ->where('id', $id)
        ->delete();
      return redirect()->back()->with('delete','delete');

    }


    public function TeacherUpdate(Request $request)
    {

       $allTeacher=Teacher::where('id',$request->id)->first();
       $html=view('backend.admin.teacherupdate',compact('allTeacher'))->render();
       return response()->json(['html'=>$html, 'success'=>true]);
    }


    public function UpdateTeacher(Request $request)
    {

        Teacher::where('id', $request->id)
       ->update([
           'name' => $request->name
        ]);

        return redirect()->back()->with('approve','successfull');

    }


    public function SurveyAllocation($id)
    {
        return view('backend.admin.suvery_allocation',['id'=>$id]);

    }

    public function AllocationSurvey(Request $request)
    {


          $copyItem=new Copyitm;
          $copyItem->user_id=$request->id;
          $copyItem->item_id=$request->itemid;
          $copyItem->save();
          $allquestion=question::where('iteam_id',$request->itemid)->get();

          foreach($allquestion as $qestion)
          {

                $questionStore=new Copyquestion;
                $questionStore->id=$qestion->id;
                $questionStore->name=$qestion->name;
                $questionStore->type=$qestion->type;
                $questionStore->item_id=$qestion->iteam_id;
                $questionStore->user_id=$request->id;
                $questionStore->save();

          }


        //   Copyquestion
          return redirect(session::get('tasks_url'))->with('Update','bcbcc');


    }

    public function EditSurvey($id)
    {

        return view('backend.admin.Edit_survey',['id'=>$id]);


    }

    public function questioncopyView($id)
    {

        $user_id=Session::get('user_id');
        $allquestion=Copyquestion::where('item_id',$id)
        ->where('user_id',$user_id)
        ->get();

        $title=Item::where('id',$id)

        ->first();

        // return view('backend.Servay.viewQuestion',['questionall'=>$allquestion,'titlename'=>$title,'iteam_id'=>$id]);

        return view('backend.Servay.CopyviewQuestion',['questionall'=>$allquestion,'titlename'=>$title,'iteam_id'=>$id]);

    }


    public function questioncopyCreate(Request $request)
    {


        $user_id=Session::get('user_id');
        // $itemID=Copyitm::where('id',$request->iteam_id)->where('user_id',$user_id)->first();

        $questionall=$request->input('type', []);
        $checkboxQ=$request->input('name', []);


        // $id=[];

        $questionall=$request->input('type', []);
        $checkboxQ=$request->input('name', []);


        // $id=[];
        foreach( $questionall as $index=>$value)
        {
            if($request->type[$index]==5)
                 {



                    $question = new question([
                        'user_id' =>  $request->user_id,
                        'type' => $request->type[$index],
                        'name'=>$request->question[$index],
                        'iteam_id' =>  $request->iteam_id,


                                     ]);

                    $question->save();





                   $id[]=$question->id;




                 //$question =  explode(",", $request->question);

                // for ($i=0; $i <count($id); $i++)
                //  {


                        $choises = $request->name[$index];

                        $choiseArr =  explode(",", $choises);




                        for ($j=0; $j < count($choiseArr); $j++)
                        {
                            $name = trim($choiseArr[$j], " ");

                            $checkboxQ=new Checkboxe;
                            $checkboxQ->q_id=$question->id;
                            $checkboxQ->name= $name;
                            $checkboxQ->save();


                        }




                // }




              }

                 else
                 {

                    $question = new question([
                        'user_id' =>  $request->user_id,
                        'type' => $request->type[$index],
                        'name'=>$request->question[$index],
                        'iteam_id' =>  $request->iteam_id,


                                     ]);

                    $question->save();
                   $id[]=$question->id;

                 }





        }

         $Allquestion=question::where('user_id',$user_id)
        ->where('iteam_id',$request->iteam_id)
        ->get();
        foreach($Allquestion as $allqestion)
        {
            $copyquestion=new Copyquestion;
            $copyquestion->id=$allqestion->id;
            $copyquestion->name=$allqestion->name;
            $copyquestion->item_id=$allqestion->iteam_id;
            $copyquestion->user_id=$user_id;
            $copyquestion->type=$allqestion->type;
            $copyquestion->save();

        }

         $questions=Copyquestion::whereIn('id',$id)->get();
         $itemId=$request->iteam_id;

        // return redirect()->back();
        $html=view('backend.Servay.copydatarow',compact('questions','itemId'))->render();
        return response()->json(['msg'=>$request->item_id,'html'=>$html, 'success'=>true]);


    }

    public function UpdateSurvey(Request $request)
    {
       $checkitem=Copyitm::where('item_id',$request->item)
        ->where('user_id',$request->id)
        ->first();
       if($checkitem)
       {
         Copyitm::where('user_id',$request->id)
         ->update([
            'user_id' => $request->tostdent
         ]);

         return redirect(session::get('tasks_url'))->with('Update','bcbcc');
       }

       else
       {
         return redirect()->back()->with('msg','You can not Allocate this survey!');
       }


    }

    public function Teacher_Student()
    {
        $alluser=User::where('status',1)->get();
         return view('backend.Dashboard.TeacherStudent',['user'=>$alluser]);
    }

    public function TeacherSurveyPrint($id)
    {
        //  return view('backend.admin.TeacherSurvey',['id'=>$id]);

         return Excel::download(new TeacherExport($id), 'Survey.xlsx');
    }

    public function LocationView(Request $request)
    {

            $map=Location::where('survey_no',$request->id)->first();

            // Session::put('tasks_url',request()->fullUrl());
            return view('backend.Servay.locationView',compact('map'));


        //    $html=view('backend.Servay.locationView',compact('map'))->render();
        //   return response()->json(['html'=>$html, 'success'=>true]);
    }


}
