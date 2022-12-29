<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;
use App\Models\BankInput;
use App\Models\BankInputDetails;
use App\Models\VoucherMaster;
use App\Models\VoucherDetails;
use App\Models\Approve;
use App\Models\Approvers;
use App\Models\Logger;
use App\Models\Ledger;

use Illuminate\Support\Facades\Log;
use Auth;
use App\Rules\SelectCorrectAccount;
use App\Http\Controllers\Helper\HelperController;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\ChequeBookPage;
use App\Models\ReconciliationReport;
use App\Models\CompanySettings;

/**
 * This controller is for reconciliation between bank and software accounting entries. 
 */

class ReconciliationReportController extends Controller
{
    /**
     * This function is used to render the query page for bank and software entries within a specific time.
     * @param Required no parameters.
     * @return view object contains query page of reconciliation report.
     */
    public function query(){
        return view('backend.admin.reconciliation.query');
    }

    public function fetch(Request $request){
        /**
        * This function is used to fetch bank and software entries within a specific time.
        * Both banks and software entries are put into a custom array with only the necessary fields.
        * @param Required parameters coa id(financial account id), start date, end date.
        * @return view object takes the custom array and the required parameters, and shows the bank and software entries.
        */

        $coa_id = $request->transaction_coa_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $query_coa = ChartOfAccount::find($coa_id);
        $ledger_entries = Ledger::where('transaction_coa_id', $coa_id)
                        ->whereBetween('voucher_date', [$start_date, $end_date])
                        ->orderBy('voucher_date', 'asc')
                        ->get();
        $bank_master_entries = BankInput::where('transaction_coa_account', $coa_id)->get();
        
        $bank_entries = BankInputDetails::where('voucher_master_id', $bank_master_entries[0]->id)
                        ->whereBetween('entry_date', [$start_date, $end_date])->get();

        for($i = 0; $i < count($bank_master_entries); $i++)
        {
            $merge = BankInputDetails::where('voucher_master_id', $bank_master_entries[$i]->id)->whereBetween('entry_date', [$start_date, $end_date])->get();
            $bank_entries = $bank_entries->merge($merge);
        }
        $data = array();
        foreach($bank_entries as $bank_entry)
        {
            $type = 'bank';
            foreach($ledger_entries as $ledger_entry){
                if($ledger_entry->coa_id == $bank_entry->coa_id
                && $ledger_entry->debit_amount == $bank_entry->debit_amount 
                && $ledger_entry->credit_amount == $bank_entry->credit_amount
                && $ledger_entry->voucher_date.'.000000' == $bank_entry->entry_date)
                {
                    $ledger_entries = $ledger_entries->reject($ledger_entry);
                    $type = 'reconciliated';
                    break;
                }
            }
            $coa = ChartOfAccount::find($bank_entry->coa_id)->name;
            $data[] = [
                'debit' => $bank_entry->debit_amount,
                'credit' => $bank_entry->credit_amount,
                'type' => $type,
                'coa' => $coa,
                'date' => $bank_entry->entry_date,
                'id' => $bank_entry->id,
            ];
        }
        foreach($ledger_entries as $ledger_entry)
        {
            $coa = ChartOfAccount::find($ledger_entry->coa_id)->name;
            $data[] = [
                'debit' => $ledger_entry->debit_amount,
                'credit' => $ledger_entry->credit_amount,
                'type' => 'ledger',
                'coa' => $coa,
                'date' => $ledger_entry->voucher_date,
                'id' => $ledger_entry->id,
            ];
        }
        return view('backend.admin.reconciliation.fetch', compact('data', 'query_coa', 'start_date', 'end_date'));
    }

    public function reconciliate(Request $request){
        /**
        * This function is for reconciliating bank and software entries.
        * If there is an entry of bank that does not match with software, the entry is duplicated on the software, and vice versa.
        * @param Required two parameters, the id of the entry and the type(2 for bank, 1 for ledger).
        * @return message notifying successful reconciliation.
        */
        $type = $request->type;
        if($type == 2) //bank has entry but ledger does not
        {
            $bid = BankInputDetails::find($request->id);
            $bi = BankInput::find($bid->voucher_master_id);
            $voucher_master = new VoucherMaster([
                'type' => $bi->type,
                'voucher_no' => $bi->voucher_no,
                'date' => $bid->entry_date,
                'voucher_by' => $bi->voucher_by,
                'submitted_by' => $bi->submitted_by,
                'status' => 3,
                'transaction_method_id' => $bi->transaction_method_id,
                'transaction_coa_account' => $bi->transaction_coa_account,
                'cheque_no' => $bi->cheque_no
            ]);
            $voucher_master->save();
            $voucher_details = new VoucherDetails([
                'voucher_master_id' => $voucher_master->id,
                'coa_id' => $bid->coa_id,
                'description' => $bid->description,
                'debit_amount' => $bid->debit_amount,
                'credit_amount' => $bid->credit_amount
            ]);
            $voucher_details->save();
            //Add to Ledger;
            $ledger = new Ledger;
           $ledger -> voucher_master_id = $voucher_master->id;
           $ledger -> voucher_detail_id = $voucher_details -> id;
           $ledger -> transaction_coa_id = $voucher_master -> transaction_coa_account;
           $ledger -> cost_center_id = ChartOfAccount :: find($voucher_details -> coa_id) -> cost_center_id;
           $ledger -> coa_id = $voucher_details -> coa_id;
           $ledger -> debit_amount = $voucher_details -> debit_amount;
           $ledger -> credit_amount = $voucher_details -> credit_amount;
           $ledger -> status = HelperController :: Open;
           $ledger -> voucher_date = $voucher_master -> date;
           $ledger -> generation_date = now();
           $ledger -> save();
        }
        elseif($type == 1){ //ledger has entry but bank does not
            $ledger = Ledger::find($request->id);
            $voucher_master = VoucherMaster::find($ledger->voucher_master_id);
            $bi = new BankInput([
                'type' => $voucher_master->type,
                'voucher_no' => $voucher_master->voucher_no,
                'date' => $voucher_master->date,
                'voucher_by' => $voucher_master->voucher_by,
                'submitted_by' => $voucher_master->submitted_by,
                'status' => $voucher_master->status, //$voucher_master->status,
                'transaction_method_id' => $voucher_master->transaction_method_id,
                'transaction_coa_account' => $voucher_master->transaction_coa_account,
                'cheque_no' => $voucher_master->cheque_no
            ]);
            $bi->save();
            $voucher_details = VoucherDetails::find($ledger->voucher_detail_id);
            $bid = new BankInputDetails([
                'voucher_master_id' => $bi->id,
                'coa_id' => $voucher_details->coa_id,
                'description' => $voucher_details->description,
                'debit_amount' => $voucher_details->debit_amount,
                'credit_amount' => $voucher_details->credit_amount,
                'entry_date' => $voucher_master->date,
            ]);
            $bid->save();
        }
        return 'Record Successfully saved with voucher no :';

    }

    public function bankReconciliate()
    {
        return view('backend.admin.reconciliation.bank.index');
    }
    public function saveReconciliationRecord(Request $request)
    {
       $year = $request -> year;
       $month = $request -> month;
       $bank_ending_balance = $request -> bank_ending_balance;
       $cashbook_current_balance = $request -> cashbook_current_balance;
       $descriptions_bank_additions = $request -> additions_bank;
       $addition_amounts_bank = $request -> addition_amounts_bank;
       $descriptions_bank_deductions = $request -> deductions_bank;
       $deduction_amounts_bank = $request -> deduction_amounts_bank;
       $descriptions_cashbook_additions = $request -> additions_cashbook;
       $addition_amounts_cashbook = $request -> addition_amounts_cashbook;
       $descriptions_cashbook_deductions = $request -> deductions_cashbook;
       $deduction_amounts_cashbook = $request -> deduction_amounts_cashbook;
       
    if($request -> ajax())
    {
       //Store the bank statement adjustment entries
       ReconciliationReport :: create([
            
             'year' => $year,
             'month' => $month,
             'description' => 'Cash balance as per bank statement',
             'amount' => $bank_ending_balance,
             'category' => 'bank',
             'type' => 'add'
       ]);
       
       if(isset($descriptions_bank_additions))
       {
          for($i = 0; $i < count($descriptions_bank_additions); $i++)
          {
            ReconciliationReport :: create([
                'year' => $year,
                'month' => $month,
                'description' => $descriptions_bank_additions[$i],
                'amount' => $addition_amounts_bank[$i],
                'category' => 'bank',
                'type' => 'add'
            ]);
          }
       }
       if(isset($descriptions_bank_deductions))
       {
         for($i = 0; $i < count($descriptions_bank_deductions); $i++)
         {
            ReconciliationReport :: create([
                'year' => $year,
                'month' => $month,
                'description' => $descriptions_bank_deductions[$i],
                'amount' => $deduction_amounts_bank[$i],
                'category' => 'bank',
                'type' => 'deduct'
            ]);
         }
       }

       ReconciliationReport :: create([
          'year' => $year,
          'month' => $month,
          'description' => 'Adjusted cash balance',
          'amount' => $request -> adj_balance_bank,
          'category' => 'bank',
          'type' => 'none'
       ]);

        //Store the cashbook adjustment entries
        ReconciliationReport :: create([
            
            'year' => $year,
            'month' => $month,
            'description' => 'Cash balance as per cashbook',
            'amount' => $cashbook_current_balance,
            'category' => 'cashbook',
            'type' => 'add'
      ]);
      
      if(isset($descriptions_cashbook_additions))
      {
        for($i = 0; $i < count($descriptions_cashbook_additions); $i++)
        {
            ReconciliationReport :: create([
                'year' => $year,
                'month' => $month,
                'description' => $descriptions_cashbook_additions[$i],
                'amount' => $addition_amounts_cashbook[$i],
                'category' => 'cashbook',
                'type' => 'add'
            ]);
        }
      }
      if(isset($descriptions_cashbook_deductions))
      {
        for($i = 0; $i < count($descriptions_cashbook_deductions); $i++)
        {
            ReconciliationReport :: create([
                'year' => $year,
                'month' => $month,
                'description' => $descriptions_cashbook_deductions[$i],
                'amount' => $deduction_amounts_cashbook[$i],
                'category' => 'cashbook',
                'type' => 'deduct'
            ]);
        }
      }
      ReconciliationReport :: create([
         'year' => $year,
         'month' => $month,
         'description' => 'Adjusted cash balance',
         'amount' =>$request -> adj_balance_cashbook,
         'category' => 'cashbook',
         'type' => 'none'
      ]);
    }
    else
    {
        //Download preview as pdf
        $company = CompanySettings :: find(1);
        $content = view('backend.admin.reports.reconciliation.preview_pdf',['company' => $company,'bank_addition_descriptions' => $descriptions_bank_additions,
                        'bank_add_amounts' => $addition_amounts_bank,'bank_end_balance' => $bank_ending_balance,'bank_deduction_descriptions' => $descriptions_bank_deductions,
                        'bank_deduct_amounts' => $deduction_amounts_bank,'adjust_bank' => $request -> adj_balance_bank,'cashbook_end_balance' => $cashbook_current_balance,
                        'cashbook_addition_descriptions' => $descriptions_cashbook_additions,'cashbook_add_amounts' => $addition_amounts_cashbook,'cashbook_deduction_descriptions' => $descriptions_cashbook_deductions,
                        'cashbook_deduct_amounts' => $deduction_amounts_cashbook,'adjust_cashbook' => $request -> adj_balance_cashbook,'year' => $year,'month' => $month,'is_preview' => 1]);
        
        $pdf = new \Mpdf\Mpdf();
        $pdf -> WriteHtml($content);
        $pdf -> output('Bank-reconciliation-report.pdf','D');
    }
  }
}