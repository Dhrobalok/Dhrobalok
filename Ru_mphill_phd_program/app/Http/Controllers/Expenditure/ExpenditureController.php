<?php

namespace App\Http\Controllers\Expenditure;

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
 * This controller handles expenditure voucher related operations such as voucher creation, deletion, editing etc.
 * 
 */
class ExpenditureController extends Controller
{
    public function index()
    {
        /**
         * This function is the entry point for expenditure vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of expenditure vouchers. A list of expenditure vouchers must be supplied in the view page.
         */
        $vouchers = VoucherMaster :: where('type',HelperController :: EXV) -> get();
        return view('backend.admin.vouchers.expenditure_vouchers.index',['vouchers' => $vouchers]);
    }

    public function create()
    {
         /**
         * This function is used to intialize saving process of an expenditure voucher.
         * @param Required no parameters.
         * @return A view object contains a form used  for getting information about an expenditure voucher.
         * 
         * 
         */
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $vendors  = Vendor :: all();
        $company_details = CompanySettings :: find(1);
        $logged_employee = Employee :: where('user_id',Auth :: user() -> id) -> first();
        return view('backend.admin.vouchers.expenditure_vouchers.create',['employees' => $employees,'logged_employee' => $logged_employee,'banks' => $banks,'company_details' => $company_details,'vendors' => $vendors]);
    }
    
    public function store(Request $request)
    {
        /**
         * This function is used for saving newly created expenditure voucher.
         * This function also generate a log for newly created voucher.
         * @param voucher date
         * @param posted by
         * @param chart of accounts ids(Which is used in voucher details table)
         * @param a list of particulars[Example : [Purchase a car,Cash Recieve from XYZ company] for 1st and 2nd transaction respectively]
         * @param a list of amounts[Example : [2000,3000] for 1st and 2nd transaction respectively]
         * @return Return a success message with voucher no  in string format.
         */
        $request -> validate([
            'voucher_date' => ['required']
        ]);

        $helper = new HelperController;
        $expenditure = new VoucherMaster;
        $cnt = VoucherMaster :: count() + 1;
        $approvers =  Approvers :: where('voucher_type_id',HelperController :: EXV)->get();
        $coa_ids = $request -> coa_ids;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $voucher_no = $helper -> generate_voucher_no('EXV',HelperController :: EXV,''.$cnt);
        $expenditure -> type = HelperController :: EXV;
        $expenditure -> voucher_no = $voucher_no;
        $expenditure -> date = $voucher_date;
        $expenditure -> posted_by  = $posted_by;
        $expenditure -> submitted_by = $request -> submitted_by;
        $expenditure -> vendor_id = $request -> vendor_id;
        $expenditure -> status = isset($approvers) ? HelperController :: Posted : HelperController :: Approved;
        $expenditure -> transaction_method_id = $request -> paid_by;
        $expenditure -> cheque_no = $request -> cheque_number;
        $expenditure -> transaction_coa_account = $request -> debit_account;
        $expenditure -> save();
        
        //Saving expenditure voucher details
         //Saving the credit account entry
         $voucher_details = new VoucherDetails;
         $voucher_details -> voucher_master_id = $expenditure -> id;
         $voucher_details -> coa_id = $request -> debit_account;
         $voucher_details -> description = 'Expense';
         $voucher_details -> debit_amount = 0;
         $voucher_details -> credit_amount = array_sum($amounts);
         $voucher_details -> save();

        for($i = 0; $i < count($coa_ids); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $expenditure -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> save();
        }

       //Add voucher log for newly created voucher
       $helper -> addVoucherLog($expenditure -> id,'Voucher initiated');

       if(isset($approvers))
       {
           foreach($approvers as $approver)
           {
               $voucher_approve = new Approve;
               $voucher_approve -> voucher_master_id = $expenditure -> id;
               $voucher_approve -> approver_id = $approver -> approver_id;
               $voucher_approve -> approve_order = $approver -> approve_order;
               $voucher_approve -> status = 0;
               $voucher_approve -> save();
           }
       }
        else
        {
            $helper -> addVoucherLog($expenditure -> id,'Voucher automatically approved');
        }
        //Mark the cheque page if any cheque is used for that voucher
        if($request -> cheque_number)
        {
            $helper -> markChequeAsLocked($request -> cheque_number,$expenditure -> id);
        }
        return 'Record Successfully saved with voucher no : '.$voucher_no;
    }
    public function view($Id)
    {
         /**
         * This function is used for rendering of an specific expenditure voucher.
         * @param Required only one parameter called expenditure voucher id.
         * @return A view object contains info about an specific expenditure voucher.
         * 
         * 
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $logs = $voucherMaster->voucher_logs;
        $details = $voucherMaster -> voucher_details;
        return view('backend.admin.vouchers.expenditure_vouchers.view',['voucher' => $voucherMaster,'details' => $details,'logs' => $logs]);
    }
    public function edit($voucher_id)
    {
         /**
         * This function is used to intialize editing  process of an expenditure voucher.
         * @param Required only one parameter called expenditure voucher id.
         * @return A view object contains a form used  for getting updated information about an expenditure voucher.
         * 
         * 
         */
        $voucherMaster = VoucherMaster :: find($voucher_id);
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $vendors  = Vendor :: all();
        $company_details = CompanySettings :: find(1);
        $accounts = ChartOfAccount :: all();
        $used_bank_id = 0;
        if($voucherMaster -> transaction_method_id == 2)
        {
             $used_bank_id = ChequeBook :: find($voucherMaster -> cheque -> cheque_book_id) -> bank_id;
        }
        return view('backend.admin.vouchers.expenditure_vouchers.edit',['voucher' => $voucherMaster,'employees' => $employees,'company_details' => $company_details,'vendors' => $vendors,'banks' => $banks,
          'used_bank_id' => $used_bank_id,'accounts' => $accounts]);
    }
    public function update(Request $request,$voucher_id)
    {
        /**
         * This function is used for updating a  entry of an expenditure voucher
         * Here we use an awesome inline table content editor plugin called tabledit. For more details about tabledit, please visit at :https://markcell.github.io/jquery-tabledit/#documentation 
         * @param Required four parameters called voucher id,description and amount respectively.
         * @return request object in json encoded format.
         * 
         */

                
        $request -> validate([
            'voucher_date' => ['required']
        ]);

        $helper = new HelperController;
        $coa_ids = $request -> coa_ids;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
       
        $expenditure_voucher = VoucherMaster :: find($voucher_id);
        $expenditure_voucher -> date = $voucher_date;
        $expenditure_voucher -> vendor_id = $request -> voucher_for;
        $expenditure_voucher -> posted_by = $request -> posted_by;
        $expenditure_voucher -> submitted_by = $request -> submitted_by;
        $expenditure_voucher -> transaction_method_id = $request -> paid_by;
        if($request -> paid_by == 2)
        $expenditure_voucher -> cheque_no = $request -> cheque_number;

        $expenditure_voucher -> transaction_coa_account = $request -> debit_account;
        $expenditure_voucher -> save();
        
        //Checking if the payment method is changed,if yes, then release the cheque and mark it as active
        if($request -> paid_by == 1)
        {
           $helper -> markChequeAsActive($expenditure_voucher -> cheque_no,$expenditure_voucher -> id);
           $expenditure_voucher -> cheque_no = NULL;
        }
        else
        {
            //If current cheque number and previous cheque number is different, then current & previous cheque are marked as locked and active respectively.
            if($request -> cheque_number != $expenditure_voucher -> cheque_no)
            {
                $helper -> marChequeAsLocked($request -> cheque_number,$expenditure_voucher -> id);
                $helper -> markChequeAsActive($expenditure_voucher -> cheque_no,$expenditure_voucher -> id);
            }
        }
       
       //Remove the previous records and insert latest one
       $helper -> removeVoucherPreviousDetails($expenditure_voucher -> id);

       //Saving the credit account entry
       $voucher_details = new VoucherDetails;
       $voucher_details -> voucher_master_id = $expenditure_voucher -> id;
       $voucher_details -> coa_id = $request -> debit_account;
       $voucher_details -> description = 'Expenses';
       $voucher_details -> debit_amount = 0;
       $voucher_details -> credit_amount = array_sum($amounts);
       $voucher_details -> save();

       for($i = 0; $i < count($coa_ids); $i = $i + 1)
       {
           $voucher_details = new VoucherDetails;
           $voucher_details -> voucher_master_id = $expenditure_voucher -> id;
           $voucher_details -> coa_id = $coa_ids[$i];
           $voucher_details -> description = $descriptions[$i];
           $voucher_details -> debit_amount = $amounts[$i];
           $voucher_details -> credit_amount = 0;
           $voucher_details -> save();
       }

       //Record the log into the logger table
        $helper -> addVoucherLog($expenditure_voucher -> id,'Voucher modification');
      
       return 'Voucher updated successfully';
    }
    public function delete(Request $request)
    {
        /**
         * This function job is simple. This helps us just to delete a record from the database.
         * @param Required just one parameter called voucher id.
         * @return Return Nothing.
         */
        VoucherMaster :: where('id',$request -> id)->delete();
    }
}
