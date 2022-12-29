<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetLevel;

/**
 * This controller is for the budget project labels. 
 * The budget labels are simply used to keep track of which projects the budgets are for.
 */
class BudgetLevelController extends Controller
{
    public function index()
    {
      /**
      * This function is used for showing/rendering all budget project labels currently stored in the database.
      * @param Required no parameters
      * @return Return a view object with a list of budget project labels.
      */

       $levels = BudgetLevel :: all();
       return view('backend.admin.budget_levels.index', compact('levels'));
    }



    public function create()
    {
      /**
     * This function is used for starting the saving process of a budget project label.
     * @param Required no parameters
     * @return Return a view object that describe a budget project label info related form.
     */
      return view('backend.admin.budget_levels.create');
    }

    public function store(Request $request)
    {
       /**
      * This function is used for saving newly created budget project labels.
      * @param Required one parameter called name
      * @return Return NULL; But redirect to the index page of project label section.
      */
        $request -> validate([
            'name' => ['required','unique:budget_levels']
        ]);

       $level = new BudgetLevel();
       $level -> name = $request->name;
       $level -> save();

       return redirect() -> back() -> with('message','Information Saved Successfully!!');
    }

    public function edit($id)
    {
       /**
     * This function is used for editing a specific project label
     * @param Required one parameter called id
     * @return Return a view object that contains info about a specific budget project label.
     */
       $level = BudgetLevel :: find($id);
       return view('backend.admin.budget_levels.edit',['level' => $level]);
    }
    public function update(Request $request,$id)
    {
       /**
     * This function is used for updating a specific project label.
     * @param Required two  parameters called project name and project id respectively.
     * @return Return Nothing; But redirect to budget project label index page.
     */
       $level = BudgetLevel :: find($id);
       $level -> name = $request -> name;
       $level -> save();
       return redirect()->back()->with('message','Name Updated Successfully!!');
    }
    public function destroy($id)
    {
       /**
     * This function is used for deleting a specific project label.
     * @param Required one  parameter called id(label id).
     * @return Return Nothing, but redirects to project label index page.
     */
       $level = BudgetLevel :: find($id);
       $level -> delete();
       return redirect()->back()->with('message','Project Label Removed Successfully!!');
    }
}