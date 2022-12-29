<?php

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\Controller;
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
use App\Models\Employee;
use App\Models\CompanySettings;

/**
 * This controller handles journal voucher related operations such as voucher creation, deletion, editing etc.
 * 
 */
class JournalVoucherController extends Controller
{
    public function index()
    {
         /**
         * This function is the entry point for journal vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of journal vouchers. A list of journal vouchers must be supplied in the view page.
         */
        $vouchers = VoucherMaster :: where('type',HelperController :: JV)->get();
        return view('backend.admin.vouchers.journal_vouchers.index',['vouchers' => $vouchers]);
    }
    public function create()
    {
         /**
         * This function is used to intialize saving process of a journal voucher.
         * @param Required no parameters.
         * @return A view object contains a form used  for getting information about a journal voucher.
         * 
         * 
         */
        $employees  = Employee :: all();
        $logged_employee = Employee :: where('user_id',Auth :: user() -> id) -> first();
        $company_details = CompanySettings :: find(1);
        return view('backend.admin.vouchers.journal_vouchers.create',['employees' => $employees,'logged_employee' => $logged_employee,'company_details' => $company_details]);
    }

    public function store(Request $request)
    {
        /**
         * This function is used for saving newly created journal voucher.
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
        $journal_voucher = new VoucherMaster;
        $coa_ids = $request -> coa_ids;
        $types = $request -> types;
        $cnt = VoucherMaster :: count() + 1;
        $approvers =  Approvers :: where('voucher_type_id',HelperController :: JV)->get();
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $submitted_by = $request -> submitted_by;
        $voucher_no = $helper -> generate_voucher_no('JV',HelperController :: JV,''.$cnt);
        $journal_voucher -> type = HelperController :: JV;
        $journal_voucher -> voucher_no = $voucher_no;
        $journal_voucher -> date = $voucher_date;
        $journal_voucher -> posted_by = $posted_by;
        $journal_voucher -> submitted_by = $submitted_by;
        $journal_voucher -> status = isset($approvers) ? HelperController :: Posted : HelperController :: Approved;
        $journal_voucher -> transaction_method_id = HelperController :: NotApplicable;
        $journal_voucher -> transaction_coa_account = NULL;
        $journal_voucher -> save();
    
        
        //Saving Transfer voucher details

        for($i = 0; $i < count($descriptions); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $journal_voucher -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $types[$i] == 'Debit' ? $amounts[$i] : 0;
            $voucher_details -> credit_amount = $types[$i] == 'Credit' ? $amounts[$i] : 0;
            $voucher_details -> save();
        }
        //Add log for newly created voucher
         $helper -> addVoucherLog($journal_voucher -> id,'Voucher initiated');
        //Saving the voucher in the approve for approval
        if(isset($approvers))
        {
            foreach($approvers as $approver)
            {
                $voucher_approve = new Approve;
                $voucher_approve -> voucher_master_id = $journal_voucher -> id;
                $voucher_approve -> approver_id = $approver -> approver_id;
                $voucher_approve -> approve_order = $approver -> approve_order;
                $voucher_approve -> status = 0;
                $voucher_approve -> save();
            }
        }
        else
        {
           $helper -> addVoucherLog($journal_voucher -> id,'Voucher approved automatically');
        }
        return 'Voucher successfully saved with voucher no '.$voucher_no;
    }

    public function view($Id)
    {
         /**
         * This function is used for rendering of a specific journal voucher.
         * @param Required only one parameter called journal voucher id.
         * @return A view object contains info about an specific journal voucher.
         * 
         * 
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = $voucherMaster -> voucher_details;
        $logs = $voucherMaster -> voucher_logs;
        return view('backend.admin.vouchers.journal_vouchers.view',['voucher' => $voucherMaster,'details' => $details,'logs' => $logs]);
    }
    public function edit($Id)
    {
        /**
         * This function is used to edit a journal voucher.
         * @param Required one parameter called Id(Voucher id)
         * @return view object contains info about an journal voucher.
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = $voucherMaster -> voucher_details;
        $employees = Employee :: all();
        $company_details = CompanySettings :: find(1);
        $accounts = ChartOfAccount :: all();
        return view('backend.admin.vouchers.journal_vouchers.edit',['voucher' => $voucherMaster,'employees' => $employees,'company_details' => $company_details,
                    'accounts' => $accounts]);
    }

    public function update(Request $request,$voucher_id)
    {
         /**
         * This function no more in use. There are some problems we fetch during using that function.
         */
        
        $request->validate([
            'voucher_date' => ['required']
        ]);
        $helper = new HelperController;
        $journal_voucher = VoucherMaster :: find($voucher_id);
        $coa_ids = $request -> coa_ids;
        $types = $request -> types;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $submitted_by = $request -> submitted_by;
        $journal_voucher -> date = $voucher_date;
        $journal_voucher -> posted_by = $posted_by;
        $journal_voucher -> submitted_by = $submitted_by;
        $journal_voucher -> save();
    
        //Remove the previous records
        $helper -> removeVoucherPreviousDetails($journal_voucher -> id);
        //Saving Transfer voucher details

        for($i = 0; $i < count($descriptions); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $journal_voucher -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $types[$i] == 'Debit' ? $amounts[$i] : 0;
            $voucher_details -> credit_amount = $types[$i] == 'Credit' ? $amounts[$i] : 0;
            $voucher_details -> save();
        }
        
         $helper -> addVoucherLog($journal_voucher -> id,'Voucher modification');

         return 'Voucher updated successfully';
    }
    
    public function delete(Request $request)
    {
         /**
         * This function job is simple. This helps us just to delete a specific journal voucher.
         * @param Required just one parameter called voucher id.
         * @return void.
         */
        VoucherMaster :: where('id',$request -> id)->delete();
    }
}
