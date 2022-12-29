<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Categor;
use App\Models\Categoryinformation;
use DB;

class Categoryupdate extends Controller
{
    //
    public function view($categoryid)
    {
        //return $categoryid;
       $information=Categoryinformation::where('category_id',$categoryid)->first();
     
        return view('backend.admin.category.view',['allinformation'=>$information]);
    
    }

    public function edit($categoryid)
    {
        $information=Categoryinformation::where('category_id',$categoryid)->first();
        return view('backend.admin.category.edit',['allinformation'=>$information]);
    }

    public function update(Request $request,$categoryid)
    {

        Categoryinformation::where('id', $categoryid)
        ->update([
            'officename' => $request->officename,
            'officeno' =>$request->officeno,
           
            'cell_no' =>$request->cellnum,
            'email' => $request->email,
         ]);

         Categor::where('id', $request->category_id)
         ->update([
             'category_name' => $request->type,
            
            
          ]);

          return redirect()->back(); 
    }

    public function delete($categoryid)
    {
        //return $categoryid;
        // $categorydelete=Categoryinformation::where('id', $categoryid)->first();
        DB::table('categoryinformations')->where('id', $categoryid)->delete();
        DB::table('categors')->where('id', $categoryid)->delete();
        return redirect()->back(); 
        
    }
}
