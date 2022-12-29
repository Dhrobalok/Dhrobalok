<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChartOfAccount;
use App\Models\VoucherMaster;
use App\Models\VoucherDetails;
use App\Models\Approve;
use App\Models\Approvers;
use App\Models\Logger;
use Auth;
use App\Rules\SelectCorrectAccount;
use App\Http\Controllers\Helper\HelperController;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\ChequeBookPage;
use App\Models\CompanySettings;
use App\Models\Employee;
/**
 * This controller handles transfer voucher related operations such as voucher creation, deletion, editing etc.
 * 
 */
class TransferVoucherController extends Controller
{
    public function index()
    {
         /**
         * This function is the entry point for transfer vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of transfer vouchers. A list of transfer vouchers must be supplied in the view page.
         */
        $vouchers = VoucherMaster :: where('type',HelperController :: TFV)->get();
        return view('backend.admin.vouchers.transfer_vouchers.index',['vouchers' => $vouchers]);
    }
    public function create()
    {
         /**
         * This function is used to intialize saving process of a transfer voucher.
         * @param Required no parameters.
         * @return A view object contains a form used  for getting information about a transfer voucher.
         * 
         * 
         */
        $company_details = CompanySettings :: find(1);
        $logged_employee = Employee :: where('user_id',Auth :: user() -> id) -> first();
        $employees = Employee :: all();
        return view('backend.admin.vouchers.transfer_vouchers.create',['logged_employee' => $logged_employee,'company_details' => $company_details,'employees' => $employees]);
    }

    public function store(Request $request)
    {
        /**
         * This function is used for saving newly created transfer voucher.
         * This function also generate a log for newly created voucher.
         * @param voucher date
         * @param posted by
         * @param chart of accounts ids(Which is used in voucher details table)
         * @param a list of particulars[Example : [Purchase a car,Cash Recieve from XYZ company] for 1st and 2nd transaction respectively]
         * @param a list of amounts[Example : [2000,3000] for 1st and 2nd transaction respectively]
         * @return Return a success message with voucher no  in string format.
         */
        $request->validate([
            'voucher_date' => ['required']
        ]);
        $helper = new HelperController;
        $transfer_voucher = new VoucherMaster;
        $cnt = VoucherMaster :: count() + 1;
        $approvers =  Approvers :: where('voucher_type_id',HelperController :: TFV)->get();
        $transfer_from = $request -> transfer_from;
        $transfer_to = $request -> transfer_to;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $submitted_by = $request-> submitted_by;
        $transfer_method = $request -> transfer_method;
        $cheque_number = $request -> cheque_number;
        $voucher_no = $helper -> generate_voucher_no('TFV',HelperController :: TFV,''.$cnt);
        $transfer_voucher -> type = HelperController :: TFV;
        $transfer_voucher -> voucher_no = $voucher_no;
        $transfer_voucher -> date = $voucher_date;
        $transfer_voucher -> posted_by = $posted_by;
        $transfer_voucher -> submitted_by = $submitted_by;
        $transfer_voucher -> status = isset($approvers) ? HelperController :: Posted : HelperController :: Approved;
        $transfer_voucher -> transaction_method_id = $transfer_method;
        $transfer_voucher -> transaction_coa_account = NULL;
        $transfer_voucher -> cheque_no = $cheque_number;
        $transfer_voucher -> save();
        
       
        
        // Saving Transfer voucher details

        for($i = 0; $i < count($transfer_to); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $transfer_voucher -> id;
            $voucher_details -> coa_id = $transfer_from[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = 0;
            $voucher_details -> credit_amount = $amounts[$i];
            $voucher_details -> save();
            
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $transfer_voucher -> id;
            $voucher_details -> coa_id = $transfer_to[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> save();
        }
        
        //Add voucher Log for newly created voucher
          $helper -> addVoucherLog($transfer_voucher -> id,'Voucher initiated');
        //Saving the voucher in the approve for approval
        if(isset($approvers))
        {
            foreach($approvers as $approver)
            {
                $voucher_approve = new Approve;
                $voucher_approve -> voucher_master_id = $transfer_voucher -> id;
                $voucher_approve -> approver_id = $approver -> approver_id;
                $voucher_approve -> approve_order = $approver -> approve_order;
                $voucher_approve -> status = 0;
                $voucher_approve -> save();
            }
        }
        else
        {
           $helper -> addVoucherLog($transfer_voucher -> id,'Voucher automatically approved');
        }
        
        return 'Voucher successfully saved with voucher no :'.$voucher_no;
    }

    public function view($Id)
    {
        /**
         * This function is used for rendering of a specific transfer voucher.
         * @param Required only one parameter called transfer voucher id.
         * @return A view object contains info about an specific transfer voucher.
         * 
         * 
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = $voucherMaster -> voucher_details;
        $logs = $voucherMaster -> voucher_logs;
        
        return view('backend.admin.vouchers.transfer_vouchers.view',['voucher' => $voucherMaster,'details'=> $details,'logs' => $logs]);
    }
    public function edit($Id)
    {
        /**
         * This function is used to edit a transfer voucher.
         * @param Required one parameter called Id(Voucher id)
         * @return view object contains info about an transfer voucher.
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = VoucherDetails :: where('voucher_master_id',$Id)
                    ->orderBy('id','ASC')
                    ->get();
        
        $employees = Employee :: all();
        $accounts = ChartOfAccount :: all();
        $company_details = CompanySettings :: find(1);
        $debit_accounts = array();
        $credit_accounts = array();
        $descriptions = array();
        $amounts = array();
        $cnt = 0;

        foreach($details as $voucher_detail)
        {
            $cnt++;
            if($cnt % 2)
             $debit_accounts[] = $voucher_detail -> coa_id;
            else
            {
                $credit_accounts[] = $voucher_detail -> coa_id;
                $amounts[] = $voucher_detail -> debit_amount;
                $descriptions[] = $voucher_detail -> description;
            }
            
        }
        return view('backend.admin.vouchers.transfer_vouchers.edit',['voucher' => $voucherMaster,'employees' => $employees,'company_details' => $company_details,'accounts' => $accounts,
                    'debit_accounts' => $debit_accounts,'credit_accounts' => $credit_accounts,
                    'descriptions' => $descriptions,'amounts' => $amounts]);
    }

    public function update(Request $request,$voucher_id)
    {
        /**
         * This function is used to update/delete a transation of a transfer voucher.
         * @param Required one parameter called transaction id.
         * @return json encoded request.
         */
        $request->validate([
            'voucher_date' => ['required']
        ]);
        $helper = new HelperController;
        $transfer_voucher = VoucherMaster :: find($voucher_id);
        $transfer_from = $request -> transfer_from;
        $transfer_to = $request -> transfer_to;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $submitted_by = $request-> submitted_by;
        $transfer_method = $request -> transfer_method;
        $cheque_number = $request -> cheque_number;
        $transfer_voucher -> date = $voucher_date;
        $transfer_voucher -> posted_by = $posted_by;
        $transfer_voucher -> submitted_by = $submitted_by;
        $transfer_voucher -> transaction_method_id = $transfer_method;
        $transfer_voucher -> transaction_coa_account = NULL;
        $transfer_voucher -> cheque_no = $cheque_number;
        $transfer_voucher -> save();

          //Remove the previous records and insert latest one
          $helper -> removeVoucherPreviousDetails($transfer_voucher -> id);
        // Saving Transfer voucher details

        for($i = 0; $i < count($transfer_to); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $transfer_voucher -> id;
            $voucher_details -> coa_id = $transfer_from[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = 0;
            $voucher_details -> credit_amount = $amounts[$i];
            $voucher_details -> save();
            
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $transfer_voucher -> id;
            $voucher_details -> coa_id = $transfer_to[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> save();
        }
        
         $helper -> addVoucherLog($transfer_voucher -> id,'Voucher modification');
        
        return 'Voucher successfully update';
    }
    public function delete(Request $request)
    {
          /**
         * This function job is simple. This helps us just to delete a specific transfer voucher.
         * @param Required just one parameter called voucher id.
         * @return void.
         */
        VoucherMaster :: where('id',$request -> id)->delete();
    }
}
