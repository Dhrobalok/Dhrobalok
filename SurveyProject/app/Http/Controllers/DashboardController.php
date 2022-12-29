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
use App\Models\Role;
use App\Models\Model_has_role;
use App\Models\Role_has_permission;
use App\Models\Categoryinformation;
use App\Models\Compane;


class DashboardController extends Controller
{
    public function index()
    {









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

        // return $request;

    //    return $users = User::role('admin')->get();

        DB::table('model_has_roles')->where('model_id',$request->employeeid)->delete();
        $permissionid =  $request->input('permission', []);


        foreach($permissionid as $index=>$value)
        {



                    $agreement = new Model_has_role([
                        'role_id' =>  $permissionid[$index],
                        'model_id' => $request->employeeid,
                        'model_type' =>'App\Models\User',


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
        $validated = $request->validate([
            'cell_no' => 'required|digits:11',

            ]);
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

    public function assignrole($userid)
    {
        $role=Role::get();
        return view('backend.admin.roles.showrole',['roles'=>$role,'usersid'=>$userid]);

    }

    public function assignpermission($userid)
    {
        // return $userid;
        $permesion=Permission::get();
        return view('backend.admin.roles.permission',['permissions'=>$permesion,'userids'=>$userid]);

    }
    public function permissionstore(Request $request)
    {
        DB::table('role_has_permissions')->where('role_id',$request->employeeid)->delete();
        $permissionid =  $request->input('permission', []);


        foreach($permissionid as $index=>$value)
        {



                    $agreement = new Role_has_permission([
                        'permission_id' =>  $permissionid[$index],
                        'role_id' => $request->employeeid,



                                     ]);

                       $agreement->save();




        }

        return redirect()->back();

    }


  public function aboutcompany($companyid)
  {
     $companydetails=Compane::where('id',$companyid)->first();
     return view('backend.admin.AboutCompany.aboutcompany',['companyinform'=>$companydetails]);
  }


}
