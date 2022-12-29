<?php

namespace App\Http\Controllers\CostCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostCenter;
use App\Models\CostCenterType;
use App\Models\ChartOfAccount;
/**
 * Cost center controller helps us to create/delete/edit a cost center. It also helps us to assign a cost center to a specific chart of account.
 * To know about on cost center, please visit at : https://rb.gy/p46pet
 */
class CostCenterController extends Controller
{
    public function index()
    {
        /**
         * This is the entry point for cost center menu. This function helps you to rendering all cost centers stored in the database.
         * In the view page, we use a javascript plugin called treetable. For more queries about treetable plugin, please visit at : http://ludo.cubicphuse.nl/jquery-treetable/
         * @param This function require no parameters
         * @return This function return a view object carrying two parameters called items and options(which are used for the select options)
         */
        $cost_centers = CostCenter :: all();
        return view('backend.admin.cost-center.index',['cost_centers' => $cost_centers]); 
    }

    public function create()
    {
         /**
         * This function is used for creating a new cost center.
         * This function require three parameters, two are required and another one optional.
         * @param Required parameters are cost code and description.
         * @param Optional parameter is parent id
         * @return array of options in json format
         */
        $types = CostCenterType :: all();
        return view('backend.admin.cost-center.create',['types' => $types]);
    }
    
    public function store(Request $request)
    {
       $request -> validate([
          'name' => ['required'],
          'description' => ['required'],
          'code' => ['required']
       ]);

       $name = $request -> name;
       $description = $request -> description;
       $type_id = $request -> type_id;
       $code = $request -> code;

       CostCenter :: create([
          'name' => $name,
          'type_id' => $type_id,
          'description' => $description,
          'code' => $code
       ]);

       return redirect() -> route('cost-center-index')->with('message','New Cost Center added successfully');
    }

    public function edit($id)
    {
        /**
         * This function is used to edit/modify a cost center.
         * @param Require cost center id
         * @return Array of contents contains parent cost center code, cost center info,description,id and a list of cost centers
         */
       $cost_center = CostCenter :: find($id);
       $types = CostCenterType :: all();
       return view('backend.admin.cost-center.edit',['cost_center' => $cost_center,'types' => $types]);
    }

    public function update(Request $request, $id)
     {
         /**
          * This is used for saving the updated data for a specific cost center.
          *@param Require cost center id,description and code.
          *@return Returns tree view of cost centers in json format.
          */
          $request -> validate([
            'name' => ['required'],
            'description' => ['required'],
            'code' => ['required']
         ]);
        
         $name = $request -> name;
         $description = $request -> description;
         $type_id = $request -> type_id;
         $code = $request -> code;
         $cost_account_ids = $request -> cost_account_ids;
         $cost_center = CostCenter :: find($id);
  
         $cost_center -> update([
            'name' => $name,
            'type_id' => $type_id,
            'description' => $description,
            'code' => $code
         ]);
         $this -> removePreviousCostAccounts($cost_center);
         $this -> updateCostAccounts($cost_account_ids,$id);
  
         return redirect() -> route('cost-center-index')->with('message','Cost Center updated successfully');
         
     }

     public function view($id)
     {
         /**
          * This function is used for rendering a specific cost center
          *@param Require just cost center id for rendering.viewing the cost center.
          *@return Return full information of that specific cost center.
          */
        $cost_center = CostCenter :: find($id);
        return view('backend.admin.cost-center.view',['cost_center' => $cost_center]);
     }
    

   function delete(Request $request)
   {
       /**
          * This function is used for removing/deleting a node from the tree view.
          *@param Required cost center id
          *@return Return void.
          */
       $Id = $request -> cost_center_id;
       CostCenter :: find($Id)->delete();
       return 'Cost Center deleted successfully';
   }
   public function addNewCostAccount(Request $request)
   {
       $account = ChartOfAccount :: find($request -> account_id);
       return view('backend.admin.partial_pages.add_new_cost_account',['account' => $account]);
   }
   public function removePreviousCostAccounts(CostCenter $cost_center)
   {
       $accounts = $cost_center -> getCostAccounts;

       foreach($accounts as $account)
       {
           $account -> cost_center_id = NULL;
           $account -> save();
       }
   }
   public function updateCostAccounts($account_ids,$cost_center_id)
   {
       if(is_null($account_ids))
         return;
       foreach($account_ids as $account_id)
       {
           $account = ChartOfAccount :: find($account_id);
           $account -> cost_center_id = $cost_center_id;
           $account -> save();
       }
   }
}