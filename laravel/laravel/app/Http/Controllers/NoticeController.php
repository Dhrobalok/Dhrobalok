<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tnotice;
use DB;
ob_get_clean();
use \PDF;
//use Spatie\PdfToText\Pdf;



class NoticeController extends Controller
{
    public function notice(Request $re)
    {
 
          
               
    	       $app=new tnotice();
              $app->title=$re->input('title');
    
        if ($re->hasFile('image'))
         {
         $file=$re->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/file/', $filename);
         $app->image=$filename;
         

                 
      
       }
   

         $app->save();
       

       //$app->title=$re->input('image');



           
       return back();
    }

    public function notice2(Request $re)
    {
       $id=$re->id;
       $id2=$re->id2;  
       for ($i=0; $i <$id2 ; $i++)
       { 
        $data=array();
        $data['email']=$re->title;
    
  
        $id=$re->id;

        DB::table('studentnotice')
        ->insert($data)
        ->where('id',$id[$i]);
      
    }

     return back();
      

    }


    public function studentnotice()
    {

      $q=\DB::select("select*from studentnotice");

      return view('student proparty.notice')->with('p',$q);
    }

       public function snotice(Request $re)
    {

      $id=$re->id;

      $q=\DB::select("select image from studentnotice where id='$id'");
  
 
  
        //return view('student proparty.seenotice')->with('w',$q);
        $pdf = PDF::loadView('student proparty.seenotice',[
     
         'w'=>$q
      

      ]);
      
      return $pdf->stream('download.pdf');
      

    }
}
