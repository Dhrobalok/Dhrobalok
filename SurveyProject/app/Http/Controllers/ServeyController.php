<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Copyitm;
use App\Models\question;
use App\Models\Surve;
use App\Models\Survetotal;
use App\Models\Checkboxe;
use Session;
use DB;
use Str;
use App\Exports\Survey;
use App\Exports\Report;
use Excel;
use App\Models\File;
use Response;
use Illuminate\Support\Collection;
use App\Models\Copyquestion;
use App\Models\Location;

class ServeyController extends Controller
{
    public function Index()
    {
        return view('backend.Servay.index');
    }


    public function createSurvey()
    {
        return view('backend.Servay.create');
    }

    public function SaveQuestion(Request $request)
    {

        $user_id=Session::get('user_id');
        $itemID=Item::where('id',$request->iteam_id)->where('user_id',$user_id)->first();
        if(!$itemID)
        {
            $itemID=Copyitm::where('item_id',$request->iteam_id)->where('user_id',$user_id)->first();

            if(!$itemID)
            {
                $newitem=new Copyitm;
               $newitem->item_id=$request->iteam_id;
               $newitem->user_id=$user_id;
               $newitem->save();

            }



        }



        // $questiontype=$request->input('type', []);


        $questionall=$request->input('type', []);
        $checkboxQ=$request->input('name', []);


        // $id=[];
        foreach( $questionall as $index=>$value)
        {
            if($request->type[$index]==5 || $request->type[$index]==6)
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

         $questions=question::whereIn('id',$id)->get();
         $itemId=$request->iteam_id;

        // return redirect()->back();
        $html=view('backend.Servay.datarow',compact('questions','itemId'))->render();
        return response()->json(['msg'=>$request->item_id,'html'=>$html, 'success'=>true]);


    }

    public function SaveIteam(Request $request)
    {

        $item=new Item;
        $item->name=$request->name;
        $item->keyword=$request->keyword;
        $item->user_id=$request->user_id;
        $item->save();
        return redirect()->back()->with('msg','New user added');

    }

    public function Viewquestion($id)
    {


        $user_id=Session::get('user_id');
        $allquestion=question::where('iteam_id',$id)
        ->where('user_id',$user_id)
        ->get();

        $title=Item::where('id',$id)

        ->first();


        return view('backend.Servay.viewQuestion',['questionall'=>$allquestion,'titlename'=>$title,'iteam_id'=>$id]);

    }

    public function SaveSurvey(Request $request)
    {



         $i=0;
         $k=0;
         $j=0;

         $user_id=Session::get('user_id');
         $sampleID=$user_id.$request->iteam_id.$request->surve_id;

         $location=new Location;
         $location->item_id=$request->iteam_id;
         $location->user_id=$user_id;
         $location->survey_no=$sampleID;
         $location->lat=$request->lat;
         $location->lng=$request->long;
         $location->save();



        //  $SurveId=Surve::where('surve_id',$sampleID)->first();
        //  if(!$SurveId)
        //  {
            $user_id=Session::get('user_id');



            $questionall=$request->input('q_id', []);
            //$Check=Surve::whereIn('q_id',$request->q_id);

            foreach( $questionall as $index=>$value)
            {


                $Check=Surve::where('q_id',$request->q_id[$index])
                 ->where('surve_id',$sampleID)
                 ->first();

                if(!$Check)

                 {


                     $type=question::where('id',$request->q_id[$index])->first();


                    if($type->type==2)
                    {


                                             if(isset($request->file[$i]))
                                             {



                                                $image=$request->file[$i];
                                                $image_name = Str :: random(20);
                                                $extension = strtolower( $image -> getClientOriginalExtension());
                                                $image_full_name = $image_name . '.' . $extension;
                                                $upload_path = 'images/';
                                                $image_url = $upload_path.$image_full_name;
                                                $image -> move($upload_path,$image_full_name);
                                                $profile_photo_path1 = $image_url;

                                                $question = new Surve;
                                                $question->user_id=$user_id;
                                                $question->item_id=$request->iteam_id;

                                                 $question->value=$profile_photo_path1;

                                                 $question->q_id=$request->q_id[$index];
                                                $question->surve_id=$sampleID;

                                                $question->save();



                                             }

                                             $i++;


                                            //  if(isset($request->image[$k]))
                                            //  {

                                            //     $image=$request->image[$k];
                                            //     $image_name = Str :: random(20);
                                            //     $extension = strtolower( $image -> getClientOriginalExtension());
                                            //     $image_full_name = $image_name . '.' . $extension;
                                            //     $upload_path = 'images/';
                                            //     $image_url = $upload_path.$image_full_name;
                                            //     $image -> move($upload_path,$image_full_name);
                                            //     $profile_photo_path1 = $image_url;

                                            //     $question = new Surve;
                                            //     $question->user_id=$user_id;
                                            //     $question->item_id=$request->iteam_id;

                                            //      $question->value=$profile_photo_path1;

                                            //      $question->q_id=$request->q_id[$index];
                                            //     $question->surve_id=$request->surve_id;

                                            //     $question->save();

                                            //     $k++;


                                            //  }














                     }









                    else
                    {
                        $question = new Surve([
                            'user_id' =>  $user_id,
                            'item_id' =>  $request->iteam_id,

                            'value' => $request->Q_value[$j],

                            'q_id'=>$request->q_id[$index],
                            'surve_id'=>$sampleID,


                                         ]);

                        $question->save();
                        $j++;

                    }






                 }


                else
                {


                   // return $Check->q_id;

                    $questionCheck=question::where('id', $Check->q_id)

                    ->first();

                     if($questionCheck->type!=2)
                     {
                        $j++;


                     }




                }








            }


           $checkSurvey=Survetotal::where('servey_id',$sampleID)
           ->where('user_id',$user_id)
           ->where('item_id',$request->iteam_id)
           ->first();
           if(!$checkSurvey)
           {
            $totalsurve=new Survetotal;
            $totalsurve->user_id=$user_id;
            $totalsurve->item_id=$request->iteam_id;
            $totalsurve->servey_id=$sampleID;
            $totalsurve->save();

           }

           return redirect()->route('create.survey')->with('success','Survey Saved Successfully !');










    }



    public function editForm(Request $request)
    {
        $user_id=Session::get('user_id');
        $item=Item::where('id',$request->item_id)
        ->where('user_id',$user_id)
        ->first();
        $html=view('backend.Servay.editItem',compact('item'))->render();
        return response()->json(['msg'=>$request->item_id,'html'=>$html, 'success'=>true]);

    }


    public function deleteSurvey($id)
    {
        $check=DB::table('copyitms')->where('item_id', $id)->first();
        if($check)
        {
           // DB::table('items')->where('id', $id)->delete();
            DB::table('copyitms')->where('item_id', $id)->delete();
            DB::table('surves')->where('item_id', $id)->delete();
            DB::table('survetotals')->where('item_id', $id)->delete();
           // DB::table('questions')->where('iteam_id', $id)->delete();

        }
        else
        {
            DB::table('items')->where('id', $id)->delete();
           // DB::table('copyitms')->where('item_id', $id)->delete();
            DB::table('surves')->where('item_id', $id)->delete();
            DB::table('survetotals')->where('item_id', $id)->delete();
            DB::table('questions')->where('iteam_id', $id)->delete();

        }

        return redirect()->back()->with('delete','Survey Saved Successfully !');

    }

    public function surveyIndex()
    {

        $user_id=Session::get('user_id');
        $totaluser_id=Survetotal::select('item_id')->where('user_id',$user_id)->distinct()->get();

        if($totaluser_id !='[]')

        {
            foreach($totaluser_id as $key=>$value)
            {
              // $totaluser_id=Item::select('id')->where('user_id',$userId->user_id)->get();

                // foreach($totaluser_id as $key=>$value)
                // {
                    $totalSurvey=Survetotal::where('item_id',$value->item_id)
                    ->where('user_id',$user_id)
                    ->get();
                    $surveNumber=count($totalSurvey);
                    $iteamid[$value->item_id]=$surveNumber;


                // }

            }

        }

        else
        {
            $iteamid[]=0;

        }



        $iteamnamne=Survetotal::select('item_id')->where('user_id',$user_id)->distinct()->get();

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



        return view('backend.Dashboard.Dashboard',compact('data','itemnumber'));
    }

    public function SurveyPrint ($id)
    {

        $user_id=Session::get('user_id');
          $question=question::where('iteam_id',$id)
            ->where('user_id',$user_id)
            ->get();

           $surve=Surve::where('item_id',$id)
            ->where('user_id',$user_id)
            ->get();


            $surveid=Surve::select('surve_id')->where('item_id',$id)
            ->where('user_id',$user_id)
            ->get();


            // // $content = view('backend.Servay.demo',['employees' => $question,'survey' =>  $surve,'surveid'=> $surveid]);
            // // $employees_list = new \Mpdf\Mpdf();
            // // $employees_list -> WriteHtml($content);
            // $employees_list -> output('employee-list.pdf','I');
        return Excel::download(new Survey($id), 'Survey.xlsx');

        //return $id;

    }


    public function SurveyView($id)
    {


        $user_id=Session::get('user_id');

        $question_s=Item::where('id',$id)
        ->where('user_id',$user_id)
        ->first();
        if($question_s)
        {

            $question=question::where('iteam_id',$id)
            ->where('user_id',$user_id)
            ->get();


        }
        else
        {



            $question=Copyquestion::where('item_id',$id)
            ->where('user_id',$user_id)
            ->get();

        }





         $surveid=Surve::select('surve_id')->where('item_id',$id)
        ->where('user_id',$user_id)
        ->orderBy('surve_id','desc')
        ->distinct()
        ->get();

        $item=Item::where('id',$id)->first();

         Session::put('tasks_url',request()->fullUrl());

        return view('backend.Servay.view',['questionName'=>$question,'surveid'=>$surveid,'name'=>$item,'id'=>$id]);

    }


    public function SurveyEdit($id)
    {
          $user_id=Session::get('user_id');
          $ids=$id;
          $surveValue=Surve::where('surve_id',$id)
          ->where('user_id',$user_id)
          ->get();
          return view('backend.Servay.Survey_edit',['surve_value'=> $surveValue,'id'=>$ids]);

     // render html;
        // $id=$request->id;

        // $surve_value=Surve::where('surve_id',$request->id)->get();
        // $html=view('backend.Servay.Survey_edit',compact('surve_value','id'))->render();
        // return response()->json(['html'=>$html, 'success'=>true]);
    }


    public function UpdateSurvey(Request $request)
    {


        $i=0;
        $j=0;



        $questionall=$request->input('q_id', []);

        foreach($questionall as $index=>$value)
        {
            $type=question::where('id',$request->q_id[$index])

            ->first();

            if($type->type==2)
            {

                if(isset($request->file[$i]))
                {

                        $image=$request->file[$i];
                        $image_name = Str :: random(20);
                        $extension = strtolower( $image -> getClientOriginalExtension());
                        $image_full_name = $image_name . '.' . $extension;
                        $upload_path = 'images/';
                        $image_url = $upload_path.$image_full_name;
                        $image -> move($upload_path,$image_full_name);
                        $profile_photo_path1 = $image_url;


                    DB::table('surves')
                    ->where('q_id',$request->q_id[$index])
                    ->where('surve_id', $request->survey_id)
                    ->update([
                        'value' => $profile_photo_path1
                    ]);

                }

                $i++;





        }


            else
            {


                DB::table('surves')
                ->where('q_id',$request->q_id[$index])
                ->where('surve_id', $request->survey_id)
                ->update([
                    'value' => $request->value[$j]
                ]);

              $j++;

            }


        }



        return redirect(session::get('tasks_url'))->with('Update','bcbcc');


    }


    public function QuestionDelete(Request $request)
    {

        DB::table('checkboxes')->where('q_id', $request->id)->delete();
        DB::table('surves')->where('q_id', $request->id)->delete();
        DB::table('survetotals')->where('item_id', $request->id)->delete();
        DB::table('questions')->where('id', $request->id)->delete();
        return redirect()->back()->with('delete','Survey Saved Successfully !');

    }

    public function UpdateIteam(Request $request)
    {
        return $request->item_name;
    }


    public function UpdateTtile(Request $request)
    {

           Item::where('id', $request->pk)
           ->update([
                 'name'=>$request->value,
                 ]);
           return redirect()->back()->with('update','update title');


    }

    public function UpdateInformation(Request $request)
    {
        Surve::where('id', $request->pk)
        ->update([
              'value'=>$request->value,
              ]);
        return redirect()->back();

    }

    public function QuestionCheck()
    {
        return view('backend.Dashboard.checkbox');

    }

    public function questionbox(Request $request)
    {
       // return $request;
       // return $question =  explode(",", $request->question);

        for ($i=0; $i <count($request->question); $i++) {
            // $name = trim($request->name[$i], " ");
            $choises = $request->name[$i];
            $choiseArr =  explode(",", $choises);
            for ($j=0; $j < count($choiseArr); $j++) {
                $name = trim($choiseArr[$j], " ");
                $checkboxQ=new Checkboxe;
                $checkboxQ->id=5;
                $checkboxQ->name= $name;
                $checkboxQ->save();
            }
        }

       return $request->all();
        //  $checkbox=collect([$request->name ?: ' ']);
         //return $var=explode(',',$request->name);
        // $collection =collect([
        //     [ 'product' => $request->checkbox],

        // ]);
        // return addcslashes("r");
        $newStr = '';


        for ($i=0; $i < count($arr); $i++) {
            $name = trim($arr[$i], " ");
            $checkboxQ=new Checkboxe;
            $checkboxQ->type=5;
            $checkboxQ->name= $name;
            $checkboxQ->save();
        }
        return;

        return explode(',', $newStr);
        return $newStr;
        foreach($arr as $ar){
            return $arr;
            $toSingleArr = str_replace("\\r\\", '.', $arr);
        }
        return $toSingleArr;
        exit();
        return str_replace("\\r\\", '.', $request->name);
        $str = addslashes("'r'");
        // return str_replace("'",'',$str);
        // $STR=new str;
        $name=str_replace(str_replace("'",'',$str),'',$request->name);
        // $rowremove=;
        $delimiters = ['.', ' ', '?',','];
        //$str = 'foo! bar? baz.';
       $newStr = str_replace($delimiters, $delimiters[0],  $name); // 'foo. bar. baz.'

        $arr = explode($delimiters[0], $newStr);
        return $questionArray = array_filter($arr);

      foreach($questionArray as $index=>$value)
      {

             //echo

            //   $checkboxQ=new Checkboxe;
            //  $checkboxQ->type=5;
            //  $checkboxQ->name=$request->name;
            // $checkboxQ->save();




      }




    }



    public function IndividualPrint($id)
    {
        return Excel::download(new Report($id), 'Survey.xlsx');


    }

    public function IndividualDelete($id)
    {

        //$questionall=DB::table('surves')->where('surve_id', $id)->get();



       // DB::table('checkboxes')->where('q_id', $allquestion->id)->delete();


       $user_id=Session::get('user_id');

        DB::table('survetotals')
        ->where('user_id', $user_id)
        ->where('servey_id', $id)
        ->delete();

        DB::table('surves')
        ->where('user_id', $user_id)
        ->where('surve_id', $id)
        ->delete();





        return redirect()->back()->with('delete','Survey Delete Successfully !');

    }


    public function FileDownload($id)
    {


         $file=Surve::where('id',$id)->first();
           $filepath = public_path($file->value);

           return Response::download($filepath);




    }

    public function ViewProfile()
    {
        return "rashed";
    }

    public function LocationBack()
    {

         return redirect(session::get('tasks_url'))->with('Update','bcbcc');

    }

}
