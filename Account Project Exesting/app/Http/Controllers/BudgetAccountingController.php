<?php

namespace App\Http\Controllers;

use App\Models\BudgetAccounting;
use App\Models\Budget;
use App\Models\ChartOfAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

/**
 * This controller is for the section of budgets allocated to specific accounts. Multiple accounts can be allocated money from a single budget.
 */
class BudgetAccountingController extends Controller
{
    public function index()
    {
        /**
        * This function is used for showing/rendering all accounts' budgets currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of account budgets.
        */

        $budgets = Budget::all();
        $coas = ChartOfAccount::all();
        $budget_accountings = BudgetAccounting::all();
        return view('backend.admin.budget_accounting.index', compact('budgets', 'coas', 'budget_accountings'));
    }

    public function create()
    {
        /**
        * This function is used for starting the saving process of a new accounts budget.
        * @param Required no parameters
        * @return Return a view object that has a form to enter all information of the new accounts budget.
        */

        $budgets = Budget::all();
        $coas = ChartOfAccount::all();
        return view('backend.admin.budget_accounting.create', compact('budgets', 'coas'));

    }

    public function store(Request $request)
    {
         /**
        * This function is used for storing newly created account budget.
        * Note that the same account cannot have multiple entries for one budget within the same timeframe.
        * That is, one budget cannot be allocated in overlapping time to the same account. Example: Budget1 allocates money to Account1 for July 1- December 31. It cannot create a new entry for Account1 and Budget1 for any date between July 1 and December 31.
        * @param Required all fields for budget_accounting table in database.
        * @return Return NULL; But redirect to the index page of budget accounts section.
        */

        $this->validate($request, [
            'cost' => 'required',
        ]);

        $budac = new BudgetAccounting([
            'budget_id' => $request->get('budget_id'),
            'coa_id' => $request->get('coa_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'cost' => $request->get('cost'),
            'status' => $request->get('status'),
            'spend' => 0
        ]);
        $budget = Budget::find($budac->budget_id);
        $accounts_budget = BudgetAccounting::where('budget_id', $budget->id)->where('status','!=',0)->get();
        $allocated = 0;
        $doesoverlap = false;
        $start_date = date('Y-m-d 00:00:00', strtotime($budac->start_date));
        $end_date = date('Y-m-d 00:00:00', strtotime($budac->end_date));
        foreach($accounts_budget as $budacprev)
        {
            $allocated += $budacprev->cost;
            if(($budacprev->start_date <= $start_date) && ($start_date <= $budacprev->end_date))
            {
                $doesoverlap = true;
            }
            elseif($budacprev->start_date <= $end_date && $end_date <= $budacprev->end_date)
            {
                $doesoverlap = true;
            }
        }
        $errors = array();
        if($doesoverlap)
        {
            $errors[] = "Account budget overlaps previous account budget timeline";
        }
        if(($budac->cost + $allocated) > $budget->cost)
            $errors[] = 'Cost exceeds actual budget';
        if($errors)
            return back()->withErrors($errors);

        $budac->save();

        return redirect()->route('budget-accountings.index')->with('success','Budget Accounting created successfully');

    }

    public function edit($id)
    {
        /**
        * This function is used for editing a specific account budget.
        * @param Required one parameter called id(budget account id)
        * @return Return a view object that contains info about a specific account budget.
        */

        $budac = BudgetAccounting::find($id);
        $budgets = Budget::all();
        $coas = ChartOfAccount::all();
        return view('backend.admin.budget_accounting.edit', compact('budgets', 'coas', 'budac'));
    }
    public function modify($id)
    {
        /**
        * This function is used for starting modification to the money allocated to an accounts budget.
        * @param Required one  parameter called id(budget account id).
        * @return Return a view object that contains the editable cost info of a specific account budget.
        */

        $budac = BudgetAccounting::find($id);
        return view('backend.admin.budget_accounting.modify', compact('budac'));
    }
    public function change(Request $request, $id)
    {
        /**
        * This function is used for modifying the money allocated to a specific account budget.
        * A new entry is created, the previous account budget is rendered inactive.
        * @param Required the modified account budget amount(cost), and the id for the specific account budget entry.
        * @return Return Nothing; But redirect to accounts budget index page.
        */

        $budac = BudgetAccounting::find($id);
        $new_budac = new BudgetAccounting([
                'budget_id' => $budac->budget_id,
                'coa_id' => $budac->coa_id,
                'start_date' => $budac->start_date,
                'end_date' => $budac->end_date,
                'cost' => $request->cost,
                'status' => 1,
                'spend' => $budac->spend
            ]);
        $new_budac->save();
        $budac->status = 0;
        $budac->save();
        return redirect()->route('budget-accountings.index')->with('success','Budget Accounting updated successfully');

    }

    public function update(Request $request, $id)
    {
        /**
        * This function is used for updating a specific accounts budget.
        * @param Required all fields for budget_accounting table in database, and the id for the specific accounts budget entry.
        * @return Return Nothing; But redirect to accounts budget index page.
        */

        $this->validate($request, [
            'cost' => 'required',
        ]);

        $budac = BudgetAccounting::find($id);
        $budac->budget_id = $request->get('budget_id');
        $budac->coa_id = $request->get('coa_id');
        $budac->start_date = $request->get('start_date');
        $budac->end_date = $request->get('end_date');
        $budac->cost = $request->get('cost');
        $budac->status = $request->get('status');


        $budget = Budget::find($budac->budget_id);
        //getting all account entry for the same budget that are in active status
        $accounts_budget = BudgetAccounting::where('budget_id', $budget->id)->where('status','!=',0)->get();
        $accounts_budget = $accounts_budget->except($budac->id);
        $allocated = 0;
        //checking for overlap in same budget and same chart of account and date conflict
        $doesoverlap = false;
        $start_date = date('Y-m-d 00:00:00', strtotime($budac->start_date));
        $end_date = date('Y-m-d 00:00:00', strtotime($budac->end_date));
        foreach($accounts_budget as $budacprev)
        {
            $allocated += $budacprev->cost;
            if(($budacprev->start_date <= $start_date) && ($start_date <= $budacprev->end_date))
            {
                $doesoverlap = true;
            }
            elseif($budacprev->start_date <= $end_date && $end_date <= $budacprev->end_date)
            {
                $doesoverlap = true;
            }
        }
        $errors = array();
        if($doesoverlap)
        {
            $errors[] = "Account budget overlaps previous account budget timeline". strval($budget->cost).strval($start_date).strval($end_date);
        }
        if(($budac->cost + $allocated) > $budget->cost)
            $errors[] = 'Cost exceeds actual budget';
        if($errors)
            return back()->withErrors($errors);

        $budac->save();

        return redirect()->route('budget-accountings.index')->with('success','Budget Accounting updated successfully');

    }

    public function destroy($id)
    {
         /**
        * This function is used for deleting a specific accounts budget.
        * @param Required one  parameter called id(account's budget id).
        * @return Return Nothing, but redirects to accounts budget index page.
        */
       $budac = BudgetAccounting :: find($id);
       $budac -> delete();
       return redirect()->back()->with('message','Budget Accounting Removed Successfully!!');

    }
}
