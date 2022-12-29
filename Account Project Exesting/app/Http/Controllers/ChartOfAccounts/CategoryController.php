<?php


namespace App\Http\Controllers\ChartOfAccounts;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChartOfAccount;
use App\Models\Permission;
use App\Models\Module;
use App\Models\AccountCategory;
use DB;


class CategoryController extends Controller
{
    /**
    * Category controller helps us to create/delete/edit a category in chart of account.
    */
   
    public function index()
    {
        $accountCatgories = AccountCategory :: all();
        return view('backend.admin.chart_of_accounts.category.index',['accountCategories' => $accountCatgories]);
    }
    public function create()
    {
        /**
         * This function is used for creating a new financial account category.
         * @param This function require no parameters
         * @return This function return a view object with the form for a new category creation.
         */
        return view('backend.admin.chart_of_accounts.category.create');
    }


    /**
         * This function is used for storing a new category for financial account in database.
         * @param Required function require all fields necessary for a financial account category.
         * @return Return NULL; But redirect to the index page of chart of accounts. 
         */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        AccountCategory :: create([
            'category_name' => $request-> category_name,
            'category_type' => $request-> category_type,
        ]);
       

        return redirect()->route('category.index')->with('success-message','Category created successfully');
    }
    
    public function edit($id)
    {
        /**
        * This function is used for editing a specific category of financial account
        * @param Required one parameter called id(the category id)
        * @return Return a view object that contains info about the category financial account.
        */
        $account_category = AccountCategory::find($id);
        return view('backend.admin.chart_of_accounts.category.edit',['account_category' => $account_category]); 
    }

    public function update(Request $request, $id)
    {
        /**
        * This function is used for  update a specific financial account category.
        * @param Required all fields on the database table of chart of accounts except for cost center, also the id of the category.
        * @return Return Nothing; But redirect to chart of accounts index page.
        */
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $account_category = AccountCategory :: find($id);
        $account_category -> update([
            'category_name' => $request -> category_name,
            'category_type' => $request -> category_type
        ]);
        return redirect()->route('category.index')->with('success-message','Category updated successfully');
    }

    public function destroy($id)
    {
        /**
        * This function is used to delete a specific category of financial account.
        * @param Required id of the specific category.
        * @return Return Nothing; But redirect to chart of accounts index page.
        */

        $account_category = AccountCategory :: find($id);
        $account_category -> delete();
        return redirect()->route('category.index')
                        ->with('success-message','Category deleted successfully');
    }
}