<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Categor;
use App\Models\Categoryinformation;
use DB;
use GuzzleHttp\Client;
use App\Models\Profile;
use App\Models\Addition;
use App\Models\Department;
use App\Models\Designation;
use Redirect;
use App\Models\Facult;
use Storage;
use App\Exports\StudentExport;
use Excel;
use Session;

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
        
        $information=Categor::where('id',$categoryid)->first();
        return view('backend.admin.category.edit',['allinformation'=>$information]);
    }

    public function update(Request $request,$categoryid)
    {

        // Categoryinformation::where('id', $categoryid)
        // ->update([
        //     'officename' => $request->officename,
        //     'officeno' =>$request->officeno,
           
        //     'cell_no' =>$request->cellnum,
        //     'email' => $request->email,
        //  ]);

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
        // DB::table('categoryinformations')->where('id', $categoryid)->delete();
        DB::table('categors')->where('id', $categoryid)->delete();
        return redirect()->back(); 
        
    }

      //teachers,officers,stuffs

    public function Additionalindex()
    {
        
          return view('backend.admin.additional_responsibity.index');
    }
    public function profilefind(Request $request)
    {
        
         
        
        $sortprofile=Profile::where('dept_code',$request->profile_id)->get();
        $sortdesignation=Designation::where('office_id',$request->profile_id)->get();
        
        
        $response=array(
            'status'=>1,
            'sortprofile'=>$sortprofile,
           
        );

        return response()->json($response, 200);

        // return view('backend.admin.additional_responsibity.create',['sortprofiles'=>$request->profile_id]);
       
    }

    public function profilesave(Request $request)
    {
        
             
        if($request->to==null)
        {
           
            $add=new Addition;
            $add->officeid=$request->newoffice;
            $add->salary_id=$request->salary_id;
            $add->designat=$request->degination;
            $add->from=$request->from;
            $add->to="null";
            $add->SRINDEX=1;
            $add->mobile=$request->mobile;
            $add->email=$request->email;
            $add->adress=$request->adress;
            
            $add->save();
            return redirect()->back();
           
        }
        else
        {
            $add=new Addition;
            $add->officeid=$request->newoffice;
            $add->salary_id=$request->salary_id;
            $add->designat=$request->degination;
            $add->from=$request->from;
            $add->to=$request->to;
            $add->SRINDEX=1;
            $add->mobile=$request->mobile;
            $add->email=$request->email;
            $add->adress=$request->adress;
            
            $add->save();
            return redirect()->back();

        }
       
       
   
        
    }

    public function profilesalaryid(Request $request)
    {
        
        $profile=Profile::where('salaryID',$request->profile_id)->first();
       
        $response=array(
            'status'=>1,
            'sortprofile'=>$request->profile_id,
            'mobile'=>$profile->mobile_no,
            'email'=>$profile->emaill,
            'adress'=>$profile->office_address
        );

        return response()->json($response, 200);
      
       // return array('profile_id' => $request->profile_id,'mobile'=>$profile->mobile_no,'email'=>$profile->emaill,'adress'=>$profile->office_address);

    }

    public function timeextend($aditionid)
    {
        
          return view('backend.admin.additional_responsibity.timeextend',['sortprofiles'=>$aditionid]);
    }

    public function extendsave(Request $request)
    {
        DB::table('additions')->where('id', $request->id)->update(array('to' => $request->change));
        return redirect()->route('indexadd');

    }

    public function categoryinform()
    {
        $allcategor=Categoryinformation::get();
        return view('backend.admin.category.categoryinformation',['categoryinform'=>$allcategor]);

    }

    public function editaddtion($aditionid)
    
    {
        $information=Addition::where('id',$aditionid)->first();
        return view('backend.admin.additional_responsibity.edit',['allinformation'=>$information]);

    }


    public function updateaddition(Request $request,$categoryid)
    {

        Addition::where('id', $categoryid)
        ->update([
            'designat' => $request->officename,
            'SRINDEX' => $request->SRINDEX,
             'email' => $request->email,
            'mobile' => $request->mobile,
            
          
         ]);

   

         return redirect()->route('indexadd');

    }

    public function designation(Request $request)
    {
       
         $officeid =  $request->input('officename', []);

        if($officeid)
        {
             foreach($officeid as $index=>$value)
            {



                    $agreement = new Designation([
                        'name' =>  $request->designation,
                        'office_id' => $request->officename[$index],
                        'type'=>$request->type,


                                     ]);

                       $agreement->save();




              }

        }

        else
        {

            $agreement = new Designation([
                'name' =>  $request->designation,
                'office_id' =>0,
                'type'=>$request->type,


                             ]);

               $agreement->save();

        }




        return redirect()->back();


    }

    public function newoffice(Request $request)
    {
           
           $departcode=Department::where('office_code',$request->deptCodeOffice)->first();
           if(!$departcode)
           {
            $department=new Department;
            $department->office_code=$request->deptCodeOffice;
            $department->dept_name=$request->deptName;
            $department->unit_name=$request->unitname;
            $department->SRINDEX=$request->serialindex;
            
            $department->save();

           }
           
           return redirect()->back();

    }

    public function designationindex()
    {
        
        
        return view('backend.admin.additional_responsibity.designation');

    }

    public function officeindex()
    {
        
        return view('backend.admin.additional_responsibity.newoffice');

    }

    


    public function newaddition()
    {
        
        return view('backend.admin.additional_responsibity.newresponsibility');

    }

    public function newadditionSave(Request $request)
    {
       
        $profile_check=Profile::where('salaryID',$request->salaryID)->first();
        if($profile_check)
        {
            return redirect()->back()->with('message1','This Profile Already Taken !');
        } 
        else
        {
            $profile=new Profile;
            $profile->dbuid=$request->dbuid;
            $profile->salaryID=$request->salaryID;
            $profile->fullNameNew=$request->fullNameNew;
            $profile->Designation=$request->Designation;
            $profile->SRINDEX=1000;
            $profile->dept_code=$request->dept_code;
            $profile->dept_name=$request->dept_name;
            $profile->emaill=$request->email;
            $profile->mobile_no=$request->mobile_no;
            $profile->office_address=$request->office_address;
            $profile->officeSRINDEX=$request->officeSRINDEX;
            $profile->job_status=1;
            $profile->save();
            return redirect()->back()->with('message','New Responbility Added !');
    
            

        }   
       

           



    }


   
    public function datasyn()
    {
       
        
       $departments=Department::all();
      foreach($departments as $department)
      {

      $client = new Client();
       
        $res = $client->request('GET','http://profile.ru.ac.bd/ru_profile/public/app/api/1234/teachers/'.$department->office_code.'/get');
     
        
        $data = json_decode($res->getBody()->getContents(),true);
      

         $res2 = $client->request('GET','http://profile.ru.ac.bd/ru_profile/public/app/api/1234/officers/'.$department->office_code.'/get');
        
         $data2 = json_decode($res2->getBody()->getContents(),true);

         
         $res3 = $client->request('GET','http://profile.ru.ac.bd/ru_profile/public/app/api/1234/stuffs/'.$department->office_code.'/get');
        
         $data3 = json_decode($res3->getBody()->getContents(),true);
        
        
        foreach ($data as $key=>$sku)
         {  
          
           if($key=='teachers')
           {
               
               foreach($sku as $k=>$v )
               {
                   
                   $profile=new Profile;
                   $profile->dbuid=$sku[$k]['dbuid'];
                   $profile->salaryID=$sku[$k]['salaryID'];
                                      
                   $profile->fullNameNew=$sku[$k]['fullNameNew'];//$sku[$k]['fullNameNew'];//$sku[$k]['fullNameNew'];
                   $profile->Designation=$sku[$k]['Designation'];
                   $profile->SRINDEX=$sku[$k]['SRINDEX'];
                   $profile->dept_code=$sku[$k]['dept_code'];
                   $profile->dept_name=$sku[$k]['dept_name'];
                   $mobile = str_replace(".", ",", $sku[$k]['mobile_no']);
                   $mobile = preg_replace('/[^A-Za-z0-9\-]/', '', $sku[$k]['mobile_no']);
                   $profile->mobile_no=$mobile;
                   $profile->officeSRINDEX=$sku[$k]['officeSRINDEX'];
                   $profile->job_status=1;
                   $profile->emaill=$sku[$k]['email'];
                   $profile->office_address=$sku[$k]['office_address'];
                  
                   
                 
                      
                   $name=Profile::where('salaryID',$profile->salaryID)->first();
                   if(!$name)
                   {
                      
                  

                

                   $profile->save();
                   
               }
                 
            } 
                  
                

               

        }

    }


        



        foreach ( $data2 as $key=>$sku)
        {
         
    
              if($key=='officers')
              {
                 
                  foreach($sku as $k=>$v )
                {
                      $profile=new Profile;
                      $profile->dbuid=$sku[$k]['dbuid'];
                      $profile->salaryID=$sku[$k]['salaryID'];

                      $profile->fullNameNew=$sku[$k]['fullNameNew'];
                      $profile->Designation=$sku[$k]['Designation'];
                      $profile->SRINDEX=$sku[$k]['SRINDEX'];
                      $profile->dept_code=$sku[$k]['dept_code'];
                      $profile->dept_name=$sku[$k]['dept_name'];
                      $profile->emaill=$sku[$k]['email'];
                      $mobile = preg_replace('/[a-z]/', '', $sku[$k]['mobile_no']);
                      $profile->mobile_no=$mobile;
                      $profile->officeSRINDEX=$sku[$k]['officeSRINDEX'];
                      $profile->job_status=1;
                      $profile->office_address=$sku[$k]['office_address'];
                     // $profile->save();
   
                      $name=Profile::where('salaryID',$profile->salaryID)->first();
                      if(!$name)
                    {
                         
                     
   
   
                      $profile->save();
                      
                     }
                    
                } 
                     
                   
   
                  
   
         }
   
   



     

       }



       foreach ( $data3 as $key=>$sku)
        {
         
    
              if($key=='stuffs')
              {
                 
                  foreach($sku as $k=>$v )
                {
                      $profile=new Profile;
                      $profile->dbuid=$sku[$k]['dbuid'];
                      $profile->salaryID=$sku[$k]['salaryID'];

                      $profile->fullNameNew=$sku[$k]['fullNameNew'];
                      $profile->Designation=$sku[$k]['Designation'];
                      $profile->SRINDEX=$sku[$k]['SRINDEX'];
                      $profile->dept_code=$sku[$k]['dept_code'];
                      $profile->dept_name=$sku[$k]['dept_name'];
                      $profile->emaill=$sku[$k]['email'];
                      $mobile = preg_replace('/[a-z]/', '', $sku[$k]['mobile_no']);
                      $profile->mobile_no=$mobile;
                      $profile->office_address=$sku[$k]['office_address'];
                      $profile->officeSRINDEX=$sku[$k]['officeSRINDEX'];
                      $profile->job_status=1;
                     // $profile->save();
   
                      $name=Profile::where('salaryID',$profile->salaryID)->first();
                      if(!$name)
                    {
                         
                     
   
   
                      $profile->save();
                      
                     }
                    
                } 
                     
                   
   
                  
   
         }
   
   



     

       }






        

           

      }

        

          
      return redirect()->back();

    }

    public function deleteaddtion($delteid)
    {
        DB::table('additions')->where('id', $delteid)->delete();
        return redirect()->back();

    }

    public function deletedesignation($delteid)
    {
        DB::table('designations')->where('id', $delteid)->delete();
        return redirect()->back();

    }
    public function Officedelete($id)
    {
        
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->back();

    }

    public function categorydelete($id)
    {
        
       
        DB::table('categoryinformations')->where('id', $id)->delete();
        return redirect()->back();

    }

    public function designationFind(Request $request)

    {
       
       
         $details=Designation::where('office_id',$request->disignation_id)->get();
         
         if($details!='[]')
         {
            
            $response=array(
                'status'=>1,
                'sortprofile'=>$details,
               
            );
    
            return response()->json($response, 200);
             
         }

         else
         {
            
           $all=Designation::get();
           $response=array(
            'status'=>1,
            'sortprofile'=>$all,
           
                    );

             return response()->json($response, 200);

         }

    }

    public function officeidFind(Request $request)
    {
        $deprt=Department::where('dept_name',$request->officeid)->first();
        $response=array(
            'status'=>1,
            'officeid'=>$deprt->office_code,
           
        );
       
        return response()->json($response, 200);
    }

public function officeedit($id)
{
    $departmets=Department::where('id',$id)->first();
    return view('backend.admin.additional_responsibity.editNewoffice',['department'=>$departmets]);

}

public function update_office(Request $request,$officeid)
{
    
    Department::where('id', $officeid)
    ->update([
        'dept_name' => $request->name,
        'unit_name' => $request->unit,
        'office_code' => $request->code,
        'SRINDEX' => $request->index,
      
     ]);
     return Redirect::to('newoffice');
     //return redirect('newoffice');
    
}
    public function officeshow($officename)
{
    $department_information=Department::where('unit_name',$officename)->get();
    return view('backend.admin.category.showcontact',['department_information'=>$department_information,'name'=>$officename]);
    

}

public function showoffice($officcode)
{
    $profile_information=Profile::where('dept_code',$officcode)
    ->where('job_status',1)
    ->orderBy('officeSRINDEX','asc')
    ->get();
     Session::put('tasks_url',request()->fullUrl());
    $department_name=Department::where('office_code',$officcode)->first();
    return view('backend.admin.category.profileinform',['profileinform'=>$profile_information,'officeid'=>$officcode,'deptname'=>$department_name->dept_name]);

}


public function editoffice(Request $request)

{
    
    if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
                
    			$data = array(
    				'Designation'	=>	$request->Designation,
    				'SRINDEX'		=>	$request->SRINDEX,
    				'office_address' =>	$request->office_address,
                    'emaill'		=>	$request->emaill,
                    'mobile_no'		=>	$request->mobile_no,
                    'job_status'	=>	$request->job_status,
    			);
    			DB::table('profiles')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('profiles')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
        }
    // $particular_inform=Profile::where('salaryID',$salaryid)->first();
    // return view('backend.admin.category.contactedit',['information'=> $particular_inform]);

}


public function update_profile(Request $request,$salaryid)
{
    
    Profile::where('salaryID', $salaryid)
    ->update([
        'Designation' => $request->Designation,
        'SRINDEX' => $request->SRINDEX,
        'office_address' => $request->office_address,
      
      
     ]);
    return redirect()->back();
   

}

public function transferoffice()
{
   
    return view('backend.admin.category.transferoffice');
}

public function transfersave(Request $request)
{
    $depat=Department::where('office_code',$request->newoffice)->first();
    Profile::where('salaryID', $request->name)
    ->update([
          'dept_name'=>$depat->dept_name,
          'dept_code'=>$request->dept_code,
      
      
     ]);
    return redirect()->back();

}

public function officefind(Request $request)
{
    $details=Profile::select('dept_name')->where('salaryID',$request->office_id)->first();
    $response=array(
        'status'=>1,
        'department'=>$details->dept_name,
       
    );
   
    return response()->json($response, 200);
}

public function csvfile()
{
    return view('backend.admin.category.csvUpload');
}

public function csvsave(Request $request)
{
    
    $file_handle = fopen($request->csv, 'r');
    while (!feof($file_handle)) {
        $line_of_text[]= fgetcsv($file_handle);
    }
    fclose($file_handle);
    //return $line_of_text;

    $totalRow=count($line_of_text);



    foreach($line_of_text as $key=>$value)
    {
     
        if($key==0){
            continue;
        }
        
        if($totalRow-1==$key){
            break;
        }
        
        $profileinform=Profile::where('salaryID',$value[2])->first();
        if($profileinform)
        {
            Profile::where('salaryID',$value[2])
            ->update([
                'Designation'=>$value[4],
                'emaill'=>$value[5],
                'mobile_no'=>$value[6],
                'office_address'=>$value[7],
                'SRINDEX'=>$value[8],
                'officeSRINDEX'=>$value[9],
                'job_status'=>$value[10],
                'dept_code'=>$value[11],
                'dept_name'=>$value[12],
            
            
           ]);
        }

        else
        {
            // return $value[11];
            $value13=date('y-m-d', strtotime($value[13]));
            $value14=date('y-m-d', strtotime($value[14]));
            DB::table('profiles')->insert([
                'dbuid'=>$value[1],
                'salaryID'=>$value[2],
                'fullNameNew'=>$value[3],
                'Designation'=>$value[4],
                'emaill'=>$value[5],
                'mobile_no'=>$value[6],
                'office_address'=>$value[7],
                'SRINDEX'=>$value[8],
                'officeSRINDEX'=>$value[9],
                'job_status'=>$value[10],
                'dept_code'=>$value[11],
                'dept_name'=>$value[12],
                'created_at'=>$value13,
                'updated_at'=>$value14,
                
            ]);

        }
        

        
    }
   

        
    // Excel::import(new ProfileImport,$request->csv);
      return redirect()->back();
} 

public function csvdownload()
{
    
    $file= public_path(). "/company_pic/profiles.csv";   

    return response()->download($file);
}
    
    
    
    public function download_office($office_id)
{
        return Excel::download(new StudentExport($office_id), 'profiles.xlsx');
   
   
}

public function view_inactiove($office_id)
{
     
    $all_inactive=Profile::where('dept_code',$office_id)
   ->where('job_status',0)
   ->get();

   $department_name=Department::where('office_code',$office_id)->first();
   return view('backend.admin.category.inactive_view',['officeid'=>$office_id,'profileinform'=>$all_inactive,'deptname'=>$department_name->dept_name]) ;
}


public function index()
    {
        $posts = Profile::orderBy('id','ASC')->get();

        return view('backend.admin.category.profileinform',compact('posts'));
    }

    public function updatedrag(Request $request)
    {
       
        $posts = Profile::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id)
                 {

                    
                    
                    Profile::where('id', $order['id'])
                    ->update([
                        // 'dbuid' => $order['position'],
                        'officeSRINDEX' =>  $order['position']
                     ]);

                   
                 }
            }
        }
        
        return response('Update Successfully.', 200);
    }


    public function updatedata(Request $request)
    {

        
         if($request->name=="designation")
         {
            Profile::where('id', $request->pk)
            ->update([
                  'Designation'=>$request->value,
                  ]);
            return redirect()->back();

         }
         elseif($request->name=="index")
         {
            Profile::where('id', $request->pk)
            ->update([
                  'officeSRINDEX'=>$request->value,
                  ]);
            return redirect()->back();


         }

         elseif($request->name=="adress")
         {

            Profile::where('id', $request->pk)
            ->update([
                  'office_address'=>$request->value,
                  ]);
            return redirect()->back();

         }

         elseif($request->name=="email")
         {

            Profile::where('id', $request->pk)
            ->update([
                  'emaill'=>$request->value,
                  ]);
            return redirect()->back();
            

         }

         elseif($request->name=="mobile")
         {
            Profile::where('id', $request->pk)
            ->update([
                  'mobile_no'=>$request->value,
                  ]);
            return redirect()->back();

         }

         else
         {
            Profile::where('id', $request->pk)
            ->update([
                  'job_status'=>$request->value,
                  ]);
            return redirect()->back();

         }
        

    }
    
     public function delete_office($office_id)
    {
        DB::table('profiles')->where('id', $office_id)->delete();
        return redirect()->back();
    }
    
    
    public function newfacultsAdd()
{

    return view('backend.admin.category.facultyadd');

}

public function facultydelete($id)
{

    DB::table('facults')->where('id', $id)->delete();
    return redirect()->back();

}

public function facultyedit($id)
{
    $departmets=Facult::where('id',$id)->first();
    return view('backend.admin.category.editfaculty',['faculty'=>$departmets]);
}

public function update_faculty(Request $request,$id)
{

    Facult::where('id',$id)
    ->update([
          'faculty_name'=>$request->faculty_name,
          'office_code'=>$request->office_code,


     ]);
    return redirect()->back();

}


public function facultsSave(Request $request)
{

    $facul=Facult::where('office_code',$request->office_code)->first();
    if(!$facul)
    {
        $faculty=new Facult;
        $faculty->faculty_name=$request->faculty_name;
        $faculty->office_code=$request->office_code;
        $faculty->depts=$request->depts;
        $faculty->save();
        return redirect()->back();
    }



}
    
    
public function Profileedit($id)
{
    $profileinfo=Profile::where('id',$id)->first();
    return view('backend.admin.additional_responsibity.editprofile',['profiledesignation'=>$profileinfo]);

}
    
    
    public function updatePdesignation(Request $request,$id)
{
    
    Profile::where('id',$id)
    ->update([
              'fullNameNew'=>$request->fullNameNew,
              'Designation'=>$request->officename,
             'officeSRINDEX'=>$request->officeSRINDEX,
             'office_address'=>$request->office_address,
            'emaill'=>$request->emaill,
            'mobile_no'=>$request->mobile_no,
            'job_status'=>$request->job_status



     ]);
    return redirect(session::get('tasks_url'));

}
    
    public function TypeFind(Request $request)
{

    $details=Designation::select('name')->where('type',$request->officeid)->get();
    $response=array(
        'status'=>1,
        'department'=>$details,

    );

    return response()->json($response, 200);
}


   //categorydelete deleteoffice return array('teacher_name' => $teacher->name,'teacher_designation' =>$teacher->designation);updateaddition
}
