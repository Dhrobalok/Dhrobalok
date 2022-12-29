<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetLevel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BudgetCost;
use App\Models\Employee;
use App\Models\AdvanceBudget;
use App\Models\AdvanceVoucher;
use App\Models\AdvanceVouchersDetail;
use Illuminate\Support\Facades\Redirect;
use App\Models\ChartOfAccount;
use DB;

/**
 * This controller is for the budgets allocated to projects.
 */

class BudgetController extends Controller
{
    public function index()
    {
        /**
        * This function is used for showing/rendering all budgets currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of budgets.
        */

        $budgets = Budget::all();
        $levels = BudgetLevel::all();
        return view('backend.admin.budget.index', compact('budgets', 'levels'));
    }

    public function voucher_not_upload()
    {
          $voucher_not_upload=[];

        $advance_voucher=Budget::where('status',7)->get();

        foreach( $advance_voucher as $value)
        {
           $advance_budget_id=AdvanceVoucher::where('budget_id', $value->id)->first();
            if(!$advance_budget_id)
            {

              $budget_level_id= Budget::where('id',$value->id)->first();
              $employee_email=Employee::where('user_id',$budget_level_id->level_id)->first();
              $voucher_not_upload[$budget_level_id->id]=$employee_email->name;


            }

        }


        return view('backend.admin.vouchers.advance voucher.voucher_not_upload')->with('key',$voucher_not_upload);

    }
 


    public function advancebudget_index()
    {
       // return "advance budge";
        /**
        * This function is used for showing/rendering all budgets currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of budgets.
        */
        $budege_id= Budget::where('status',7)->get();


        foreach($budege_id as $value)
        {

            $budget_cost = new BudgetCost([
                'cost' =>$value->cost,
                'budget_id' =>$value->id,

                'status' => 7
                 ]);
                $budget_cost->save();

        }
        $budgets = Budget::all();
        $levels = BudgetLevel::all();
        return view('backend.admin.Advance Budget.index', compact('budgets', 'levels'));
    }

    public function advancebudget_create()
    {
       // return "advance budge";
        /**
        * This function is used for showing/rendering all budgets currently stored in the database.
        * @param Required no parameters
        * @return Return a view object with a list of budgets.
        */


      //  $budgets = Budget::all();
      $employee=Employee::all();
      $occasion_expense=ChartOfAccount::where('id',44)->get();
      //$chart_of_account =ChartOfAccount::get();
      
     // return $occasion_expense->id;


     // return BudgetLevel::find($budgets->level_id);
     // $levels = BudgetLevel::all();
      return view('backend.admin.Advance Budget.create')->with('employe',$employee)->with('occasion',$occasion_expense);
    }

    public function advancebudget_store(Request $request)
    {
        $level_number =  $request->input('level_id', []);
        $name =  $request->input('name', []);
        $amount =  $request->input('cost', []);
        $startday =  $request->input('start_date', []);
        $endday =  $request->input('end_date', []);
        $budgettype =  $request->input('budget_type', []);

        foreach( $level_number as $index=>$value)
            {

              
              // $chartAccount->save();
               $chart=ChartOfAccount::where('id',48)->first();


              $this->validate($request,
                [
                'name' => 'required',
                ]);

       $budget = new Budget([
       
       'name' => $name[$index],
       'level_id' => $level_number[$index],
       'start_date' => $startday[$index],
       'end_date' => $endday[$index],
       'cost' => $amount[$index],
       'status' => 7
             ]);
                  
       $budget->save();
       
      // $chart_of_account->save();

       $employe=Employee::where('user_id',$level_number[$index])->first();

       $if= DB::table('budget_levels')->insert(
       array(

              'name'   =>  $employe->name
       )
   );

   }
   $budgets=Budget::all();



       /**
       * This function is used for showing/rendering all budgets currently stored in the database.
       * @param Required no parameters
       * @return Return a view object with a list of budgets.
       */


      // $budgets = Budget::all();

      // return BudgetLevel::find($budgets->level_id);
       $levels = BudgetLevel::all();
       return redirect()->route('advancebudget.index')->with('success','Budget created successfully');
       return view('backend.admin.Advance Budget.create', compact('budgets', 'levels'));
    }

    public function advancevoucher()
    {

        $level_id=Budget::where('status',7)->get();
        $chartall=ChartOfAccount::all();
 
 
 
        //$employee_name= Employee::where('id',$level_id->level_id)->first();
        return view('backend.admin.vouchers.advance voucher.index',compact('chartall'))->with('level_id', $level_id);
 
    }

    public function advancevoucher_store(Request $request)
    {
       
        //return $request;
        $advancevoucher=new AdvanceVoucher;
        $advancevoucher->budget_id=$request->budget_id;
        $advancevoucher->level_id=$request->id;
        $advancevoucher->status=$request->status;
        $advancevoucher->voucher_date=$request->voucher_date;
        $advancevoucher->save();
 
 
        $cost_number =  $request->input('cost', []);
        $budget_name=  $request->input('name', []);
        $description =  $request->input('description', []);
 
        foreach( $cost_number as $index=>$budget_details)
        {
 
         $this->validate($request,
         [
         'name' => 'required',
         ]);
 
         $advance_voucher = new AdvanceVouchersDetail([
             'budget_name' =>$budget_name[ $index],
             'budget_id'   => $request->budget_id,
 
             'cost' =>  $cost_number[$index],
             'description'=> $description[$index]
 
 
                   ]);
          $f=$advance_voucher->save();
 
        }
 
        if($f)
         {
             return Redirect::back()->withErrors(['msg' => 'successfully insert !']);
         }
         else
         {
 
             return Redirect::back()->withErrors(['msg' => 'Data not insert !']);
         }
 
      //  return redirect()->route('advancevoucher.store')->with('success','Vocucher created successfully');
 
 



    }


    public function create()
    {
        /**
        * This function is used for starting the saving process of a new budget.
        * @param Required no parameters
        * @return Return a view object that has a form to enter all information of the new budget.
        */
        $levels = BudgetLevel::all();
        return view('backend.admin.budget.create', compact('levels'));
    }

    public function store(Request $request)
    {
         /**
        * This function is used for storing newly created budgets.
        * @param Required all fields for budget table in database.
        * @return Return NULL; But redirect to the index page of budget section.
        */

        $this->validate($request, [
            'name' => 'required',
        ]);

        $budget = new Budget([
            'name' => $request->get('name'),
            'level_id' => $request->get('level_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'cost' => $request->get('cost'),
            'status' => $request->get('status')
        ]);
        $budget->save();
        $budget_cost = new BudgetCost([
            'cost' => $request->cost,
            'budget_id' => $budget->id,
            'status' => 1
        ]);
        $budget_cost->save();

        return redirect()->route('budgets.index')->with('success','Budget created successfully');

    }


    public function edit($id)
    {
        /**
        * This function is used for editing a specific budget
        * @param Required one parameter called id(budget id)
        * @return Return a view object that contains info about a specific budget.
        */

        $budget = Budget::find($id);
        $levels = BudgetLevel::all();
        return view('backend.admin.budget.edit', compact('budget', 'levels'));
    }

    public function modify($id){
        /**
        * This function is used for making a modification to the money allocated to a budget.
        * @param Required one  parameter called id(budget id).
        * @return Return a view object that contains the cost info of a specific budget.
        */
        $budget = Budget::find($id);
        return view('backend.admin.budget.modify', compact('budget'));

    }
    public function change(Request $request, $id){

        /**
        * This function is used for modifying the money allocated to a specific budget.
        * @param Required the modified budget amount(cost), and the id for the specific budget entry.
        * @return Return Nothing; But redirect to budget index page.
        */

        $budget = Budget::find($id);
        if($request->modification_type == "add")
            $budget->cost += $request->cost;
        else
            $budget->cost -= $request->cost;
        $budget->status = 2;
        $budget_cost = new BudgetCost([
            'cost' => $request->cost,
            'budget_id' => $id,
            'status' => 1
        ]);
        $budget->save();
        $budget_cost->save();

        return redirect()->route('budgets.index')->with('success','Budget updated successfully');
    }

    public function update(Request $request, $id)
    {
        /**
        * This function is used for updating a specific budget.
        * @param Required all fields for budget table in database, and the id for the specific budget entry.
        * @return Return Nothing; But redirect to budget index page.
        */

        $this->validate($request, [
            'cost' => 'required',
        ]);

        $budget = Budget::find($id);
        //Check if the cost is revised
        If($request->cost != $budget->cost)
        {
            $budget_costs = BudgetCost::where('budget_id', $id)->get();
            foreach($budget_costs as $bcost)
            {
                $bcost->status = 0;
                $bcost->save();
            }
            $budget_cost = new BudgetCost([
                'cost' => $request->cost,
                'budget_id' => $id,
                'status' => 1
            ]);
            $budget_cost->save();
        }
        $budget->name = $request->get('name');
        $budget->level_id = $request->get('level_id');
        $budget->start_date = $request->get('start_date');
        $budget->end_date = $request->get('end_date');
        $budget->cost = $request->get('cost');
        $budget->status = 2;
        $budget->save();

        return redirect()->route('budgets.index')->with('success','Budget updated successfully');

    }

    public function destroy($id)
    {
        /**
        * This function is used for deleting a specific budget.
        * @param Required one  parameter called id(budget id).
        * @return Return Nothing, but redirects to budget index page.
        */
       $budget = Budget :: find($id);
       $budget -> delete();
       return redirect()->back()->with('message','Budget Removed Successfully!!');
    }
}
