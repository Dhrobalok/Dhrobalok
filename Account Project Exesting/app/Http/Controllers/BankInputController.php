<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ChartOfAccount;
use App\Models\BankInput;
use App\Models\BankInputDetails;
use App\Models\Approve;
use App\Models\Approvers;
use App\Models\Logger;
use Auth;
use App\Rules\SelectCorrectAccount;
use App\Http\Controllers\Helper\HelperController;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\ChequeBookPage;

/**
 * This controller handles all bank input voucher related operations such as creation, deletion, editing etc.
 * 
 */
class BankInputController extends Controller
{
    public function index()
    {
        /**
         * This function is the entry point for bank input vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of bank input vouchers. A list of bank inputs must be supplied in the view page.
         */
        $bank_inputs = BankInput::all();
        return view('backend.admin.bank_input.index',['vouchers' => $bank_inputs]);
    }
    public function create_bank_input()
    {
        /**
         * This function is used to get the form for saving a bank input voucher.
         * @param Required no parameters.
         * @return A view object contains a form used for getting information about a bank input voucher.
         * 
         * 
         */
        return view('backend.admin.bank_input.create');
    }
    public function get_accounts(Request $request)
    {
        /**
         * This function helps us to find out all accounts from the database. It works on the basis of searchTerm keyword which is provided from the user.
         * For account searching process, we use an js plugin called select2. For more details about select2, please visit at :
         * https://select2.org/.
         * @param Required only the search Term(Which describes chart of account code no.)
         * @return array of chart of accounsts in json encoded format, which is used in select2 plugin data.
         */
        $searchTerm = $request -> searchTerm;
        $options;
        if(!isset($request -> searchTerm))
         $options = ChartOfAccount :: all();
        else
        {
            $options = ChartOfAccount :: where('description','like','%'.$searchTerm.'%')
                                       ->Orwhere('general_code','like','%'.$searchTerm.'%')
                                       ->Orwhere('name','like','%'.$searchTerm.'%')
                                       ->Orwhere('company_code','like','%'.$searchTerm.'%')
                                       ->get();
        }
        $data = array();
        foreach($options as $option)
        {
            $data[] = array('id' => $option -> id,'text' => $option -> name.'('.$option -> general_code.')');
        }
        return json_encode($data);
    }
    public function get_coa_info(Request $request)
    {
        /**
         * This function simply produces financial account details, after getting the account id.
         * @param Required one parameter called id.
         * @return an array containing account code & name.
         */
        $transfer_to = $request -> transfer_to;
        $TransferToDetails = ChartOfAccount :: find($transfer_to);
        return array('transfer_to' => $TransferToDetails);
    }

    public function save_bank_input(Request $request)
    {
        /**
         * This function is used for saving newly created bank input voucher.
         * @param voucher date
         * @param posted by
         * @param chart of accounts ids(Which is used in bank input details table)
         * @param a list of particulars[Example : [Purchase a car,Cash Recieve from XYZ company] for 1st and 2nd transaction respectively]
         * @param a list of amounts[Example : [2000,3000] for 1st and 2nd transaction respectively]
         * @return Return a success message with voucher no  in string format.
        */
        $request->validate([
            'voucher_date' => ['required']
        ]);
        $helper = new HelperController;
        $bank_input = new BankInput;
        $coa_ids = $request -> coa_ids;
        $types = $request -> types;
        $dates = $request -> dates;
        $count = BankInput::all()->last()->id + 1;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $voucher_no = 'BK-'.$count;
        $bank_input -> type = HelperController :: JV;
        $bank_input -> voucher_no = $voucher_no;
        $bank_input -> date = $voucher_date;
        $bank_input -> voucher_by = 'anis';
        $bank_input -> submitted_by = $posted_by;
        $bank_input -> status = HelperController :: Posted;
        $bank_input -> transaction_method_id = HelperController :: NotApplicable;
        $bank_input -> transaction_coa_account = $request->bank_account;
        $bank_input -> save();
    
        
        //Saving Transfer voucher details

        for($i = 0; $i < count($descriptions); $i = $i + 1)
        {
            $bank_input_details = new BankInputDetails;
            $bank_input_details -> voucher_master_id = $bank_input -> id;
            $bank_input_details -> coa_id = $coa_ids[0];
            $bank_input_details -> entry_date = $dates[$i];
            $bank_input_details -> description = $descriptions[$i];
            $bank_input_details -> debit_amount = $types[$i] == 'Debit' ? $amounts[$i] : 0;
            $bank_input_details -> credit_amount = $types[$i] == 'Credit' ? $amounts[$i] : 0;
            $bank_input_details -> save();
        }
        
        return 'Record Successfully saved with voucher no :'.$voucher_no;
    }

    public function view($Id)
    {
         /**
         * This function is used for rendering of a specific bank input voucher.
         * @param Required only one parameter: bank input voucher id.
         * @return A view object contains info about a specific bank input voucher.
         * 
         * 
         */
        $voucherMaster = BankInput :: find($Id);
        $details = BankInputDetails::where('voucher_master_id', $voucherMaster->id)->get();
        return view('backend.admin.bank_input.view',['voucher' => $voucherMaster,'details' => $details]);
    }
    public function edit($Id)
    {
        /**
         * This function is used to edit a bank input voucher.
         * @param Required one parameter called Id(bank input id)
         * @return view object contains info about a bank input voucher.
         */
        $voucherMaster = BankInput :: find($Id);
        // $details = $voucherMaster -> bank_input_details;
        $details = BankInputDetails::where('voucher_master_id', $voucherMaster->id)->get();
        //$logs = $voucherMaster -> voucher_logs;
        $coas = ChartOfAccount::all();
        return view('backend.admin.bank_input.edit',['voucher' => $voucherMaster,'details' => $details, 'coas' => $coas]);
    }

    public function update_bank_input(Request $request)
    {
        /**
         * This function is used to update/delete a transation of a bank input.
         * @param Required parameters called transaction id.
         * @return json encoded request.
         */
        if($request -> ajax())
        {
            $ids = explode(',',$request -> id);
           if($request -> action == 'delete')
               BankInputDetails :: whereIn('id',$ids)->delete();
           else
           {
               $transfer_from = BankInputDetails :: find($ids[0]);
               $transfer_to = BankInputDetails :: find($ids[1]);
               $transfer_from -> debit_amount = $request -> amount;
               $transfer_to -> credit_amount = $request -> amount;
               $transfer_from -> description = $request -> description;
               $transfer_to -> description = $request -> description;
               $transfer_from -> save();
               $transfer_to -> save(); 
           }

           return json_encode($request);
        }
    }

    public function add_new_transaction(Request $request)
    {
         /**
         * This function is used for adding a new entry of a bank input voucher
         * @param Required four parameters called bank input id, account id, particulars and amount.
         * @return success message in string format.
         */
        $voucher_details = new BankInputDetails;
        $voucher_details -> voucher_master_id = $request -> id;
        $voucher_details -> coa_id = $request -> coa_id;
        $voucher_details -> description = $request -> particular_debit;
        $voucher_details -> debit_amount = $request -> debit_amount;
        $voucher_details -> credit_amount = 0;
        $voucher_details -> save();
        
        $voucher_details = new BankInputDetails;
        $voucher_details -> voucher_master_id = $request -> id;
        $voucher_details -> coa_id = $request -> coa_id;
        $voucher_details -> description = $request -> particular_credit;
        $voucher_details -> debit_amount = 0;
        $voucher_details -> credit_amount = $request -> credit_amount;
        $voucher_details -> save();
        return 'New Transaction saved successfully Saved';
    }
    
    public function update_bank_input_master(Request $request)
    {
        /**
         * This function is used for updating bank input voucher.
         * @param Required all parameters(except cheque number) in voucher_master table, like voucher id, posted by and voucher date,particulars,transaction method.
         * 
         * @param Optional parameters called cheque number, as well as voucher_details information.
         * @return Voucher update success message in string format
         */
        $id = $request -> id;
        $bank_account = $request -> bank_account;
        $transfer_method = $request -> transfer_method;
        $posted_by = $request -> posted_by;
        $voucher_date = $request -> voucher_date;
        $cheque_number = $request -> cheque_number;
        $descriptions = $request -> descriptions;
        $entry_dates = $request -> entry_dates;
        $types = $request -> types;
        $coa_ids = $request -> coa_ids;
        $amounts = $request -> amounts;

        $bank_input = BankInput :: find($id);
        $bank_input -> transaction_method_id = 0;
        $bank_input -> transaction_coa_account = $bank_account;
        $bank_input -> submitted_by = $posted_by;
        $bank_input -> date = $voucher_date;
        $bank_input -> cheque_no = $cheque_number;
        $bank_input -> save();

        BankInputDetails :: where('voucher_master_id',$id)->delete();

        for($i = 0; $i < count($descriptions); $i = $i + 1)
        {
            $bank_input_details = new BankInputDetails;
            $bank_input_details -> voucher_master_id = $bank_input -> id;
            $bank_input_details -> coa_id = $coa_ids[$i];
            $bank_input_details -> description = $descriptions[$i];
            $bank_input_details -> entry_date = $entry_dates[$i];
            $bank_input_details -> debit_amount = $types[$i] == 'Debit' ? $amounts[$i] : 0;
            $bank_input_details -> credit_amount = $types[$i] == 'Credit' ? $amounts[$i] : 0;
            $bank_input_details -> save();
        }
        return 'Voucher Updated Successfully!!!';
    }

    public function delete(Request $request)
    {
         /**
         * This function deletes a specific bank input voucher.
         * @param Required just one parameter called id(bank input voucher id).
         * @return void.
         */
        BankInput :: where('id',$request -> id)->delete();
    }
}
