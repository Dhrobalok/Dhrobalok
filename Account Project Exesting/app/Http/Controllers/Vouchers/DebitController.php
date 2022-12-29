<?php

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChartOfAccount;
use App\Models\VoucherMaster;
use App\Models\VoucherDetails;
use App\Models\Approvers;
use App\Models\Approve;
use App\Http\Controllers\Helper\HelperController;
use App\Rules\SelectCorrectAccount;
use App\Models\Logger;
use App\Models\Employee;
use App\Models\Bank;
use App\Models\CompanySettings;
use App\Models\Vendor;
use App\Models\ChequeBook;
use Auth;
/**
 * This controller handles debit voucher related operations such as voucher creation, deletion, editing etc.
 *
 */
class DebitController extends Controller
{
    public function index()
    {
       // return "ffhfff";
        /**
         * This function is the entry point for debit vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of debit vouchers. A list of debit vouchers must be supplied in the view page.
         */
       $vouchers = VoucherMaster :: where('type',HelperController :: DV) -> get();
        return view('backend.admin.vouchers.debit_vouchers.index',['vouchers' => $vouchers]);
    }

    public function create()
    {
        /**
         * This function is used to get the form for saving a debit voucher.
         * @param Required no parameters.
         * @return A view object contains a form used for getting information about a debit voucher.
         *
         *
         */
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $vendors  = Vendor :: all();
        $company_details = CompanySettings :: find(1);
        $logged_employee = Employee :: where('user_id',Auth :: user() -> id) -> first();
        return view('backend.admin.vouchers.debit_vouchers.create',['employees' => $employees,'logged_employee' => $logged_employee,'banks' => $banks,'company_details' => $company_details,'vendors' => $vendors]);
    }

    public function store(Request $request)
    {
        
        return $request;
         /**
         * This function is used for saving newly created debit voucher.
         * This function also generate a log for newly created voucher.
         * @param voucher date
         * @param posted by
         * @param chart of accounts ids(Which is used in voucher details table)
         * @param a list of particulars[Example : [Purchase a car,Cash Recieve from XYZ company] for 1st and 2nd transaction respectively]
         * @param a list of amounts[Example : [2000,3000] for 1st and 2nd transaction respectively]
         * @return Return a success message with voucher no  in string format.
         */
        $request -> validate([
            'date' => ['required'],
            'voucherno' => ['required']
        ]);

        // $helper = new HelperController;
        $debit_voucher = new VoucherMaster;
        // $cnt = VoucherMaster :: count() + 1;
        // $approvers =  Approvers :: where('voucher_type_id',HelperController :: DV)->get();
        $coa_ids = $request ->chart;
        $descriptions = $request -> description;
        $amounts = $request -> amount;
        $voucher_date = $request ->date;
        $debit_voucher -> type=4;
        // $voucher_no = $helper -> generate_voucher_no('DV',HelperController :: DV,''.$cnt);

        // $debit_voucher -> type = HelperController :: DV;
        $debit_voucher -> voucher_no = $request->voucherno;
        $debit_voucher -> date = $voucher_date;
        // $debit_voucher -> vendor_id = $request -> voucher_for;
        // $debit_voucher -> posted_by = $request -> posted_by;
        // $debit_voucher -> submitted_by = $request -> submitted_by;
        // $debit_voucher -> status = isset($approvers) ? HelperController :: Posted : HelperController :: Approved;
        // $debit_voucher -> transaction_method_id = $request -> paid_by;
        $debit_voucher -> cheque_no = $request -> checkno;
        $debit_voucher -> status=0;
        // $debit_voucher -> transaction_coa_account = $request -> select_credit_account;
        $debit_voucher -> save();

        //Saving debit voucher details

        //Saving the credit account entry
        $voucher_details = new VoucherDetails;
        $voucher_details -> voucher_master_id = $debit_voucher -> id;
        $voucher_details -> coa_id = $request -> select_credit_account;
        $voucher_details -> description = 'To Cash';
        $voucher_details -> debit_amount = 0;
        $voucher_details -> credit_amount = array_sum($amounts);
        $voucher_details -> save();

        for($i = 0; $i < count($coa_ids); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $debit_voucher -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> save();
        }

        //Add a log for newly created voucher
         $helper -> addVoucherLog($debit_voucher -> id,'Voucher initiated');

        if(isset($approvers))
        {
            foreach($approvers as $approver)
            {
                $voucher_approve = new Approve;
                $voucher_approve -> voucher_master_id = $debit_voucher -> id;
                $voucher_approve -> approver_id = $approver -> approver_id;
                $voucher_approve -> approve_order = $approver -> approve_order;
                $voucher_approve -> status = 0;
                $voucher_approve -> save();
            }
        }
        else
        {
            $helper -> addVoucherLog($debit_voucher -> id,'Voucher Automatically Approved');
        }

        //Mark the cheque page if any cheque is used for that voucher
        if($request -> cheque_number)
        {
            $helper -> markChequeAsLocked($request -> cheque_number,$debit_voucher -> id);
        }
        return 'Voucher successfully saved with voucher no : '.$voucher_no;
    }

    public function view($Id)
    {
       // return "debit voucher view part";
        /**
         * This function is used for rendering of a specific debit voucher.
         * @param Required only one parameter called debit voucher id.
         * @return A view object contains info about an specific debit voucher.
         *
         *
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $logs = $voucherMaster->voucher_logs;
        $details = $voucherMaster -> voucher_details;

        return view('backend.admin.vouchers.debit_vouchers.view',['voucher' => $voucherMaster,'details' => $details,'logs' => $logs]);
    }
    public function edit($Id)
    {
        /**
         * This function is used to edit a debit voucher.
         * @param Required one parameter called Id(Voucher id)
         * @return view object contains info about a debit voucher.
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $voucher_details = $voucherMaster -> voucher_details;
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $vendors  = Vendor :: all();
        $accounts = ChartOfAccount :: all();
        $used_bank_id = 0;
        if($voucherMaster -> transaction_method_id == 2)
        {
             $used_bank_id = ChequeBook :: find($voucherMaster -> cheque -> cheque_book_id) -> bank_id;
        }
        $company_details = CompanySettings :: find(1);
        return view('backend.admin.vouchers.debit_vouchers.edit',['voucher' => $voucherMaster,'details' => $voucher_details,'employees' => $employees,'banks' => $banks,'company_details' => $company_details,'vendors' => $vendors,'used_bank_id' => $used_bank_id,'accounts' => $accounts]);
    }

    public function update(Request $request,$voucher_id)
    {
        /**
         * This function is used to update of a debit voucher.
         * @param Required parameters called voucher id.
         * @return success message.
         */

         $request -> validate([
             'voucher_date' => ['required']
         ]);

         $helper = new HelperController;
         $coa_ids = $request -> coa_ids;
         $descriptions = $request -> descriptions;
         $amounts = $request -> amounts;
         $voucher_date = $request -> voucher_date;

         $debit_voucher = VoucherMaster :: find($voucher_id);
         $debit_voucher -> date = $voucher_date;
         $debit_voucher -> vendor_id = $request -> voucher_for;
         $debit_voucher -> posted_by = $request -> posted_by;
         $debit_voucher -> submitted_by = $request -> submitted_by;
         $debit_voucher -> transaction_method_id = $request -> paid_by;
         if($request -> paid_by == 2)
         $debit_voucher -> cheque_no = $request -> cheque_number;

         $debit_voucher -> transaction_coa_account = $request -> select_credit_account;
         $debit_voucher -> save();

         //Checking if the payment method is changed,if yes, then release the cheque and mark it as active
         if($request -> paid_by == 1)
         {
            $helper -> markChequeAsActive($debit_voucher -> cheque_no,$debit_voucher -> id);
            $debit_voucher -> cheque_no = NULL;
         }
         else
         {
             //If current cheque number and previous cheque number is different, then current & previous cheque are marked as locked and active respectively.
             if($request -> cheque_number != $debit_voucher -> cheque_no)
             {
                 $helper -> marChequeAsLocked($request -> cheque_number,$debit_voucher -> id);
                 $helper -> markChequeAsActive($debit_voucher -> cheque_no,$debit_voucher -> id);
             }
         }

        //Remove the previous records and insert latest one
        $helper -> removeVoucherPreviousDetails($debit_voucher -> id);

        //Saving the credit account entry
        $voucher_details = new VoucherDetails;
        $voucher_details -> voucher_master_id = $debit_voucher -> id;
        $voucher_details -> coa_id = $request -> select_credit_account;
        $voucher_details -> description = 'To Cash';
        $voucher_details -> debit_amount = 0;
        $voucher_details -> credit_amount = array_sum($amounts);
        $voucher_details -> save();

        for($i = 0; $i < count($coa_ids); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $debit_voucher -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> save();
        }

        //Record the log into the logger table
         $helper -> addVoucherLog($debit_voucher -> id,'Voucher modification');

        return 'Voucher updated successfully';
    }
    public function delete(Request $request)
    {
        /**
         * This function deletes a specific debit voucher.
         * @param Required just one parameter called voucher id.
         * @return void.
         */
        VoucherMaster :: where('id',$request -> id)->delete();
    }
}
