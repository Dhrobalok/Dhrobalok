<?php


namespace App\Http\Controllers\ChartOfAccounts;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChartOfAccount;
use App\Models\CostCenter;
use App\Models\Permission;
use App\Models\Module;
use App\Models\AccountCategory;
use DB;


class AccountsController extends Controller
{
    /**
    * Accounts controller helps us to create/delete/edit an account in chart of account. It also helps us to assign a cost center to a specific chart of account.
    */
 
    public function index()
    {
        /**
         * This is the entry point for chart of accounts menu. This function helps you to render all chart of accounts stored in the database.
         * @param This function require no parameters
         * @return This function return a view object carrying two parameters called categories and accounts(the accounts are divided into categories)
         */
         
         $accounts = ChartOfAccount :: all();
        return view('backend.admin.chart_of_accounts.index',compact('accounts'));
    }


    public function create()
    {
        /**
         * This function is used for creating a new financial account.
         * @param This function require no parameters
         * @return This function return a view object carrying two parameters called categories and options(the options are all cost centers)
         */
        $categories = AccountCategory :: all();
        $options = CostCenter::get();
        return view('backend.admin.chart_of_accounts.create', compact('categories', 'options'));
    }


    public function store(Request $request)
    {
        /**
         * This function is used for storing a new financial account in database.
         * @param Required function require all fields necessary for a financial account.
         * @return Return NULL; But redirect to the index page of chart of accounts. 
         */
        $this->validate($request, [
            'name' => 'required',
            'general_code' => 'required',
            'description' => 'required'
        ]);
        
        ChartOfAccount :: create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'company_code' => $request->get('company_code'),
            'general_code' => $request->get('general_code'),
            'category_id' => $request->get('category')
        ]);
        
        return redirect()->route('accounts.index')->with('success-message','Account created successfully');
    }
    
    public function edit($id)
    {
        /**
        * This function is used for editing a specific financial account
        * @param Required one parameter id(account id)
        * @return Return a view object to edit info about the specific account.
        */
        $account = ChartOfAccount::find($id);
        $categories = AccountCategory :: all();
        $cost_centers = CostCenter::get();
        return view('backend.admin.chart_of_accounts.edit', compact('account','categories', 'cost_centers'));
    }

    public function update(Request $request, $id)
    {
        /**
        * This function is used for  update a specific financial account.
        * @param Required all fields on the database table of chart of accounts.
        * @return Return Nothing; But redirect to chart of accounts index page.
        */
        $this->validate($request, [
            'name' => 'required',
            'general_code' => 'required',
            'description' => 'required'
        ]);

        $account = ChartOfAccount::find($id);
        $account->name = $request->get('name');
        $account->description = $request->get('description');
        $account->category_id = $request->get('category');
        $account->company_code = $request->get('company_code');
        $account->general_code = $request->get('general_code');
        $account->save();

        return redirect()->route('accounts.index')->with('success-message','Account updated successfully');
    }
        
    public function destroy($id)
    {
        /**
        * This function is used to delete a specific financial account.
        * @param Required id of the specific account.
        * @return Return Nothing; But redirect to chart of accounts index page.
        */

        $account = ChartOfAccount :: find($id);
        $account -> delete();
        return redirect()->route('accounts.index')
                        ->with('success-message','Account deleted successfully');
    }
}