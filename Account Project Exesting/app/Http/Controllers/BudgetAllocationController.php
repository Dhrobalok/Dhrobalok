<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetAllocation;
class BudgetAllocationController extends Controller
{
    public function budgetStatus()
    {
       $entries = $entries = BudgetAllocation :: where('year',date('Y'))->get();
       return view('backend.admin.budget.current_state_of_budget',['entries' => $entries]);
    }
    public function defineBudget()
    {
        $entries = BudgetAllocation :: where('year',date('Y'))->get();
        return view('backend.admin.budget.define_budget',['entries' => $entries]);
    }
    
    public function allocationUpdate(Request $request)
    {
       $ids = $request -> entry_ids;
       $coa_ids = $request -> coa_ids;
       $max_usable_amount = $request -> max_usable_amount;
       $budget_type = $request -> budget_type;

       if(is_null($ids))
       {
            for($i = 0; $i < count($coa_ids); $i++)
            {
                BudgetAllocation :: create([
                    'coa_id' => $coa_ids[$i],
                    'max_usable_amount' => $max_usable_amount[$i],
                    'remaining_amount' => $max_usable_amount[$i],
                    'allocation_type' => $budget_type[$i],
                    'status' => 0,
                    'year' => date('Y')
                ]);
            }
          
            return 'Records updated successfully';
       }
       else
       {
          for($i = 0; $i < count($coa_ids); $i++)
          {
              $budget_allocation =  BudgetAllocation :: find($ids[$i]);
               $budget_allocation ->  update([
                'coa_id' => $coa_ids[$i],
                'max_usable_amount' => $max_usable_amount[$i],
                'allocation_type' => $budget_type[$i],
                'status' => 0
              ]);
          }

          return 'Record updated successfully';
       }
    }
}
