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
use App\Models\Customer;
use App\Models\Employee;
use App\Models\CompanySettings;
use App\Models\Bank;
use App\Models\ChequeBook;
use Session;
use App\Models\Vendor;
use Auth;
/**
 * This controller handles credit voucher related operations such as voucher creation, deletion, editing etc.
 * 
 */
class CreditController extends Controller
{
    public function index()
    {
        /**
         * This function is the entry point for credit vouchers.
         * @param Required no parameters.
         * @return A view object contains a list of credit vouchers. A list of credit vouchers must be supplied in the view page.
         */
        $vouchers = VoucherMaster :: where('type',HelperController :: CV) -> get();
        return view('backend.admin.vouchers.credit_vouchers.index',['vouchers' => $vouchers]);
    }

    public function create()
    {
         /**
         * This function is used to get the form for saving a credit voucher.
         * @param Required no parameters.
         * @return A view object contains a form used for getting information about a credit voucher.
         * 
         * 
         */
        $id=Session::get('rollno');
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $vendors  = Vendor :: all();
        //$company_details = CompanySettings :: find(1);
        $logged_employee = Employee :: where('roll', $id) -> first();
       // $customers  = Customer :: all();
        return view('backend.admin.vouchers.credit_vouchers.create',['logged_employee' => $logged_employee,'banks' => $banks,'employees'=>$employees]);
    }
    
    public function store(Request $request)
    {
       // return $request;
        /**
         * This function is used for saving newly created credit voucher.
         * This function also generate a log for newly created voucher.
         * @param voucher date
         * @param posted by
         * @param chart of accounts ids(Which is used in voucher details table)
         * @param a list of particulars[Example : [Purchase a car,Cash Recieve from XYZ company] for 1st and 2nd transaction respectively]
         * @param a list of amounts[Example : [2000,3000] for 1st and 2nd transaction respectively]
         * @return Return a success message with voucher no  in string format.
         */
        $request -> validate([
            'voucher_date' => ['required'],
            'debit_account' => ['required'],
        ]);

        $helper = new HelperController;
        $credit_voucher = new VoucherMaster;
        $cnt = VoucherMaster :: count() + 1;
        $approvers =  Approvers :: where('voucher_type_id',HelperController :: CV)->get();
        $coa_ids = $request -> coa_ids;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
        $posted_by = $request -> posted_by;
        $voucher_no = $helper -> generate_voucher_no('CV',HelperController :: CV,''.$cnt);
        $credit_voucher -> type = HelperController :: CV;
        $credit_voucher -> voucher_no = $voucher_no;
        $credit_voucher -> date = $voucher_date;
        $credit_voucher -> posted_by = $posted_by;
        $credit_voucher -> customer_id = $request -> customer_id;
        $credit_voucher -> submitted_by = $request -> submitted_by;
        $credit_voucher -> status = isset($approvers) ? HelperController :: Posted : HelperController :: Approved;
        $credit_voucher -> transaction_method_id = $request -> paid_by;
        $credit_voucher -> cheque_no = $request -> cheque_number;
        $credit_voucher -> transaction_coa_account = $request -> debit_account;
        $credit_voucher -> save();
        
        //Saving credit voucher details
        //Saving the details for Cash in account
        $voucher_details = new VoucherDetails;
        $voucher_details -> voucher_master_id = $credit_voucher -> id;
        $voucher_details -> coa_id = $request -> debit_account;
        $voucher_details -> description = 'Sales Products';
        $voucher_details -> credit_amount = 0;
        $voucher_details -> debit_amount = array_sum($amounts);
        $voucher_details -> save();

        //Saving materials or products or assets goes on account details

        for($i = 0; $i < count($coa_ids); $i = $i + 1)
        {
            $voucher_details = new VoucherDetails;
            $voucher_details -> voucher_master_id = $credit_voucher -> id;
            $voucher_details -> coa_id = $coa_ids[$i];
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> credit_amount = $amounts[$i];
            $voucher_details -> debit_amount = 0;
            $voucher_details -> save();
        }
        
        //Add log for newly created voucher
         $helper -> addVoucherLog($credit_voucher -> id,'Voucher initiated');
        if(isset($approvers))
        {
            foreach($approvers as $approver)
            {
                $voucher_approve = new Approve;
                $voucher_approve -> voucher_master_id = $credit_voucher -> id;
                $voucher_approve -> approver_id = $approver -> approver_id;
                $voucher_approve -> approve_order = $approver -> approve_order;
                $voucher_approve -> status = 0;
                $voucher_approve -> save();
            }
        }
        else
        {
            $helper -> addVoucherLog($credit_voucher -> id,'Voucher automatically approved');
        }
         //Mark the cheque page if any cheque is used for that voucher
        //  if($request -> cheque_number)
        //  {
        //      $helper -> markChequeAsLocked($request -> cheque_number,$credit_voucher -> id);
        //  }
        return 'Record Successfully saved with voucher no : '.$voucher_no;
    }
    public function view($Id)
    {
        /**
         * This function is used for rendering of a specific credit voucher.
         * @param Required only one parameter called credit voucher id.
         * @return A view object contains info about an specific credit voucher.
         * 
         * 
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $logs = $voucherMaster->voucher_logs;
        $details = $voucherMaster -> voucher_details;
        return view('backend.admin.vouchers.credit_vouchers.view',['voucher' => $voucherMaster,'details' => $details,'logs' => $logs]);
    }
    public function edit($Id)
    {
        /**
         * This function is used to edit a credit voucher.
         * @param Required one parameter called Id(Voucher id)
         * @return view object contains info about a credit voucher.
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = $voucherMaster -> voucher_details;
        $employees  = Employee :: all();
        $banks = Bank :: all();
        $company_details = CompanySettings :: find(1);
        $customers  = Customer :: all();
        $accounts = ChartOfAccount :: all();
        $used_bank_id = 0;
        if($voucherMaster -> transaction_method_id == 2)
        {
             $used_bank_id = ChequeBook :: find($voucherMaster -> cheque -> cheque_book_id) -> bank_id;
        }
        return view('backend.admin.vouchers.credit_vouchers.edit',['voucher' => $voucherMaster,'details' => $details,'customers' => $customers,'employees' => $employees,'banks' => $banks,'company_details' => $company_details,'accounts' => $accounts,'used_bank_id' => $used_bank_id]);
    }


    public function update(Request $request,$voucher_id)
    {
        /**
         * This function is used to update/delete a transation of a credit voucher.
         * @param Required parameters called transaction id.
         * @return json encoded request.
         */
        $request -> validate([
            'voucher_date' => ['required']
        ]);

        $helper = new HelperController;
        $coa_ids = $request -> coa_ids;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $voucher_date = $request -> voucher_date;
       
        $credit_voucher = VoucherMaster :: find($voucher_id);
        $credit_voucher -> date = $voucher_date;
        $credit_voucher -> vendor_id = $request -> voucher_for;
        $credit_voucher -> posted_by = $request -> posted_by;
        $credit_voucher -> submitted_by = $request -> submitted_by;
        $credit_voucher -> transaction_method_id = $request -> paid_by;
        if($request -> paid_by == 2)
        $credit_voucher -> cheque_no = $request -> cheque_number;

        $credit_voucher -> transaction_coa_account = $request -> debit_account;
        $credit_voucher -> save();
        
        //Checking if the payment method is changed,if yes, then release the cheque and mark it as active
        if($request -> paid_by == 1)
        {
           $helper -> markChequeAsActive($credit_voucher -> cheque_no,$credit_voucher -> id);
           $credit_voucher -> cheque_no = NULL;
        }
        else
        {
            //If current cheque number and previous cheque number is different, then current & previous cheque are marked as locked and active respectively.
            if($request -> cheque_number != $credit_voucher -> cheque_no)
            {
                $helper -> marChequeAsLocked($request -> cheque_number,$credit_voucher -> id);
                $helper -> markChequeAsActive($credit_voucher -> cheque_no,$credit_voucher -> id);
            }
        }
       
       //Remove the previous records and insert latest one
       $helper -> removeVoucherPreviousDetails($credit_voucher -> id);

       //Saving the credit account entry
       $voucher_details = new VoucherDetails;
       $voucher_details -> voucher_master_id = $credit_voucher -> id;
       $voucher_details -> coa_id = $request -> debit_account;
       $voucher_details -> description = 'Sales products';
       $voucher_details -> debit_amount = array_sum($amounts);
       $voucher_details -> credit_amount = 0;
       $voucher_details -> save();

       for($i = 0; $i < count($coa_ids); $i = $i + 1)
       {
           $voucher_details = new VoucherDetails;
           $voucher_details -> voucher_master_id = $credit_voucher -> id;
           $voucher_details -> coa_id = $coa_ids[$i];
           $voucher_details -> description = $descriptions[$i];
           $voucher_details -> debit_amount = 0;
           $voucher_details -> credit_amount = $amounts[$i];
           $voucher_details -> save();
       }

       //Record the log into the logger table
        $helper -> addVoucherLog($credit_voucher -> id,'Voucher modification');
      
       return 'Voucher updated successfully';
    }
    public function delete(Request $request)
    {
         /**
         * This function deletes a specific credit voucher.
         * @param Required just one parameter called voucher id.
         * @return void.
         */
        VoucherMaster :: where('id',$request -> id)->delete();
    }
}
