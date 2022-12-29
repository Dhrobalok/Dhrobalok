<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approve;
use App\Models\VoucherMaster;
use Auth;
use App\Models\Fdr;
use App\Models\Budget;
use App\Models\AdvanceVoucher;

use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;

use App\Models\BudgetCost;
use  Session;
use App\Http\Controllers\Helper\HelperController;
use App\Models\Employee;
use DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use App\Models\PFFdr;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Categor;
use App\Models\Categoryinformation;


class DashboardController extends Controller
{
    public function index()
    {
         

        // $email=Session()->get('authmail');
        // $id = User:: Where('email',$email)->first();
        // $UserId=$id->student_id;
        // $selected_vouchers = array();

        //  $items = Approve :: where('approver_id',$UserId)
        //                               ->where('status',0)
        //                               ->orderBy('id','asc')
        //                               ->get();
      






        // foreach($items as $item)
        // {

        //      $previous_item = Approve :: find(($item -> id)-1);
        //      if(is_null($previous_item))
        //      {
        //         $selected_vouchers[] = intval($item -> voucher_master_id);
        //      }
        //      else if($item -> voucher_master_id == $previous_item -> voucher_master_id)
        //      {
        //          if($previous_item -> status == 1)
        //         $selected_vouchers[] = intval($item -> voucher_master_id);
        //      }
        //      else if($item -> voucher_master_id != $previous_item -> voucher_master_id)
        //          $selected_vouchers[] = intval($item -> voucher_master_id);
        // }
        // $voucher_pendings = count($selected_vouchers);
        



             /*
                $details =
                [
                'greeting' => 'Hello ',
                'body' => 'You donot submit your voucher ! please submit voucher !',

                'actionText' => 'click on for approve',
                'actionURL' =>url('/voucher'),

               ];

               Mail::to($employee_email->email)->send(new \App\Mail\userMail($details,$id));

              // dd("Email is Sent.");
              */
             
              

              

             // session()->put('ad_voucher',$j);

          



            //  $allcategory=Categor::all();

        return view('backend.admin.dashboard');
    }

    public function setting_role()
    {
        $alluser=User::where('status',1)->get();
        // $allmodule=Module::all();
        return view('backend.admin.roles.create',['alluser'=>$alluser]);
    }

    public function role_store(Request $request)
    {
        
       
        
        DB::table('permissions')->where('employee_id',$request->employeeid)->delete();
        $permissionid =  $request->input('permission', []);
       
 
        foreach($permissionid as $index=>$value)
        {

            
           
                    $agreement = new Permission([
                        'permission_Id' =>  $permissionid[$index],
                        'employee_id' => $request->employeeid,
            
         
                                     ]);
         
                       $agreement->save();

                
               
      
        }
        
        return redirect()->back();  
          
        
    }
    public function category()
    {
       
        $allcategory=Categor::all();
        return view('backend.admin.category.index',['categoryall'=>$allcategory]);
    }

    public function category_craete()
    {
        return view('backend.admin.category.create');
    }
    public function categorystore(Request $request)
    {

        $categoryname =  $request->input('name', []);
        foreach($categoryname as $index=>$value)
        {
           

               $agreement = new  Categor([
               'category_name' =>  $categoryname[$index],
               
   

                            ]);

              $agreement->save();


          
        

          }

          return redirect()->back();   
          
    }
    public function categoryadd($categoryid)
    {
        //return $categoryid;
         // $allcategory=Categor::where('id',$categoryid)->first();
        return view('backend.admin.category.addcategory',['category'=>$categoryid]);
    }

    public function categoryinformation(Request $request)
    {
        // $validated = $request->validate([
        //     'cell_no' => 'required|digits:11',
           
        //     ]);
        $categogy=new Categoryinformation;
        $categogy->category_id=$request->category_id;
        $categogy->officename=$request->officename;
        $categogy->officeno=$request->officeno;
        $categogy->cell_no=$request->cell_no;
        $categogy->email=$request->email;
        $categogy->save();
        return redirect()->back();   

        
    }
    public function permission($userid)
    {
        $allmodule=Module::all();
        return view('backend.admin.roles.showrole',['allmodule'=>$allmodule,'iduser'=>$userid]);
       
    }
    public function studentaprove()
    {
        $alluser=User::where('status','!=',2)
        ->get();
        return view('backend.admin.aprove.index',['alluser'=>$alluser]);
    }

    public function useraprove($userid)
    {
        User::where('id', $userid)
       ->update([
           'status' => 1
        ]);

        return redirect()->back();  

    }
    public function userdelete($userid)
    {
        // return "delete";
        DB::table('users')->where('id',$userid)->delete();
        return redirect()->back();  

    }
  
        
    



}
