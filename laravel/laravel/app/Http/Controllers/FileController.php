<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;
use App\Notice;
use App\File;
use DB;
use Session;
 ob_get_clean();
class FileController extends Controller
{
    public function file()
    {
    	return view('/ClassRoutine');
    }

     public function routineupload(Request $re)
    {


     
       $app=new Notice();
       $app->title=$re->input('title');
    

       if ($re->hasFile('file')) {
         $file=$re->file('file');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/file/', $filename);
         $app->file=$filename;
       }
      
      
      
         
         $query= $app->save();;
        if($query)
        {
         Session::flash('success');
         return back();
        }

        else 
        {
       	 Session::flash("alert");
       	 return back();
        }  

    }

    public function read()
    {

    	$q=\DB::select("select*from file");
    	//return $q;
    	return view('/readpdf')->with('r',$q);
    }


    public function download($id)
    {
        $q=\DB::select("select file from file where id='$id'");

        $file_path = public_path('/files/'.$q);
         return response()->download($file_path);
       
        //return Storage::download($q->file);
    
       // $q=\DB::select("select file from file where id='$id'");

       /* if ($q) 
        {

              
             $file="'/uploads/file/.$q'";
             return Response::download($file);

                 // return response('/')->make(view('/download')->with('r',$q));
        	    
               // return view('download')->with('r',$q);

        }
    	**/

    }



    public function edit()
    {

        return view('texteditor');
    }



    public function text(Request $re)
    {

        $date=array();
        $data['title']=$re->title;
        $data['text']=$re->text;
        $q=DB::table('advisenotice')->insert($data);

        //$q=\DB::insert('INSERT INTO `advisenotice` (`id`, `title`, `text`, `date`) VALUES (NULL, '$re', '$re', CURRENT_TIMESTAMP)');
        return back();

    }

    public function textread($id)
    {
        

        $q=\DB::select("select text from advisenotice where id='$id'");
        return view ('textread')->with('r',$q);
    } 



    public function allnotice()
    {
        $p=\DB::select("select * FROM `advisenotice`");
        $q=\DB::select("SELECT * FROM `file`");

        return view('AllNotice')->with('r',$p)->with('s',$q);
    }

      public function deletnotice($id)
    {


        $q=\DB::delete("DELETE FROM `advisenotice` WHERE id='$id'");
        $p=\DB::delete("DELETE FROM `file` WHERE id='$id'");
       Session::flash('alert');
          return back();
      
    }

}
