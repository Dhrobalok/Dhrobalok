<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\BillUser;
use App\Models\VoucherMaster;
use App\Models\VoucherDetails;
use App\Models\Approvers;
use App\Models\Approve;
use App\Models\Logger;
use App\Http\Controllers\Helper\HelperController;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BillUserActivate;
/**
 * This controller helps us to maintain Online bill user with their billing management.
 */
class OnlineBillUserController extends Controller
{

    public function index()
    {
        /**
         * This function is used to show/view all online bill users stored in the database.
         * N.B: Online bill user just a third party. They are worked for a organization and take their payment from organization.
         * Online bill user just registration in that system and authority approve that user and make their payment.
         * @param Required no parameters.
         * @return view object contains list of online users.
         * 
         */
        $billUsers = BillUser :: all();
        return view('backend.admin.online_bills.index',['bill_users' => $billUsers]);
    }
    public function view($id)
    {
        /**
         * This function is used to render/view a specific online bill user.
         * @param Required only one parameter called online bill user id.
         * @return view object contains specific online bill user whole info.
        */
        $billUser = BillUser :: find($id);
        return view('backend.admin.online_bills.view',['bill_user' => $billUser]);
    }
    // public function view_voucher($Id)
    // {
    //     $voucherMaster = VoucherMaster :: find($Id);
    //     $details = $voucherMaster -> voucher_details;
    //     $logs = $voucherMaster -> voucher_logs;
    //     $debits = array();
    //     $credits = array();

    //     foreach($details as $detail)
    //     {
    //         if($detail -> credit_amount == 0)
    //          $debits[] = $detail;
    //         else
    //          $credits[] = $detail;
    //     }
    //     return view('backend.admin.vouchers.bill_vouchers.view',['voucher' => $voucherMaster,'debits' => $debits,'credits' => $credits,'logs' => $logs]);
    // }
    public function online_bill_registration()
    {
        /**
         * This function just render the registration form and show in the frontend so that online bill user able to register.
         * @param Required no parameter.
         * @return view object contains a registration form for online bill user registration.
         */
        return view('frontend.online_bill_user_registration');
    }

    public function bill_user_save(Request $request)
    {
        /**
         * This function is used to save newly created online bill user into the database.
         * @param Required a list of parameter called bill user name,email,mobile_no,password and address.
         * @return Redirect to the registration page with a success message.
         */
        $request -> validate([

        'name' => ['required'],
        'email' => ['required','email','unique:users'],
        'mobile_no' => ['required','min:11','max:11'],
        'password' => ['required','same:confirm_password'],
        'address' => ['required']
        ]);

        $name = $request -> name;
        $email = $request -> email;
        $mobile_no = $request -> mobile_no;
        $password = $request -> password;
        $address = $request -> address;

        $user = new User();
        $user -> name = $name;
        $user -> email = $email;
        $user -> password = Hash :: make($password);
        $user -> is_bill_user = 1;
        $user -> save();

        $bill_user = new BillUser();
        $bill_user -> user_id = $user -> id;
        $bill_user -> contact_no = $mobile_no;
        $bill_user -> address = $address;
        $bill_user -> status = 0;
        $bill_user -> save();

        return redirect() -> back() -> with('message','Welcome, your registration process complete');
       
    }

    public function bill_user_profile()
    {
        /**
         * This function used to render currently logged in bill user profile.
         * @param Required no parameter.
         * @return view object contains bill user profile.
         */
        $user = User :: find(Auth :: user() -> id);
        return view('frontend.bill_generate',['user' => $user]);
    }

    public function approve_bill_user(Request $request)
    {
        /**
         * This function used to authorize a bill user.
         * After successfully approved that user, this function send an email to the bill user for confirmation.
         * @param Required only one paramter called bill user id.
         * @return void.
         */
        $Id = $request -> Id;
        $billUser = BillUser :: find($Id);
        $billUser -> status = 1;
        $billUser -> save();
        Mail :: to('aniscseru6125@gmail.com')->send(new BillUserActivate($billUser -> user_info));
    }

    public function save_bill_voucher(Request $request)
    {
        /**
         * This function used to save a bill voucher which sent from the frontend.
         * @param Required four parameters called voucher date, description,amount.[N.B. descriptions and amount is in a array]
         * @return void.
         */
        $date = $request -> date;
        $descriptions = $request -> descriptions;
        $amounts = $request -> amounts;
        $bill_voucher = new VoucherMaster();
        $bill_voucher -> type = 6;
        $bill_voucher -> voucher_no = $this -> get_voucher_no(6);
        $bill_voucher -> date = $date;
        $bill_voucher -> voucher_by = Auth :: user() -> name;
        $bill_voucher -> submitted_by = 'N/A';
        $bill_voucher -> status = HelperController :: Pending;
        $bill_voucher -> transaction_method_id = HelperController :: NotApplicable;
        $bill_voucher -> transaction_coa_account = NULL;
        $bill_voucher -> cheque_no = NULL;
        $bill_voucher -> save();

        //save the voucher detail

        for($i = 0; $i < count($amounts); $i++)
        {
            
            //Transaction for payee account
            $voucher_details = new VoucherDetails();
            $voucher_details -> voucher_master_id = $bill_voucher -> id;
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> credit_amount = $amounts[$i];
            $voucher_details -> debit_amount = 0;
            $voucher_details -> save();
            
            //Transaction for reciever account
            $voucher_details = new VoucherDetails();
            $voucher_details -> voucher_master_id = $bill_voucher -> id;
            $voucher_details -> description = $descriptions[$i];
            $voucher_details -> credit_amount = 0;
            $voucher_details -> debit_amount = $amounts[$i];
            $voucher_details -> save();
        }
    }

    public function get_voucher_no($voucher_type)
    {
        /**
         * This function just take the voucher type and return voucher no for that type of voucher.
         * @param Required only one parameter called voucher type.
         * @return integer that indicates bill voucher number.
         */
       $cnt =  VoucherMaster :: where('type',$voucher_type)->count() + 1;
       return 'BV-'.$cnt;
    }

    public function bill_vouchers()
    {
        /**
         * This function used to render a list of bill vouchers stored in the database.
         * @param Required no parameters.
         * @return view object contains a list of bill vouchers.
         */
        $vouchers = VoucherMaster :: where('type',6) -> get();
        return view('backend.admin.vouchers.bill_vouchers.index',['vouchers' => $vouchers]);
    }

    public function edit_voucher($Id)
    {
        /**
         * This function is used to show info about a specific bill voucher so that authority can edit that voucher if needed.
         * @param Required only one parameter called voucher id.
         * @return view object contains a specific bill voucher info.
         */
        $voucherMaster = VoucherMaster :: find($Id);
        $details = $voucherMaster -> voucher_details;
        $logs = $voucherMaster -> voucher_logs;
        return view('backend.admin.vouchers.bill_vouchers.edit',['voucher' => $voucherMaster,'details' => $details,'logs' => $logs]);
    }

    public function update(Request $request)
    {
        /**
         * This function do the backend job. It just take updated bill voucher and updated with the database.
         * @param Required five paramters called voucher id,posted by,transaction method, chart of account and transaction chart of account.
         * @return void.
         */
        $Id = $request -> id;
        $posted_by = $request -> posted_by;
        $transaction_coa = $request -> transaction_coa;
        $coa = $request -> coa;
        $transaction_method = $request -> transaction_method;

        $approve_details = Approvers :: where('voucher_type_id',HelperController :: BV)->first();
        $approve_details = $approve_details -> approvers;


        $voucher_master = VoucherMaster :: find($Id);
        $voucher_master -> submitted_by = $posted_by;
        $voucher_master -> transaction_coa_account = $transaction_coa;
        $voucher_master -> transaction_method_id = $transaction_method;
        $voucher_master -> status = HelperController :: Posted;
        $voucher_master -> save();

        $details = VoucherDetails :: where('voucher_master_id',$Id)->get();

        foreach($details as $detail)
        {
            if($detail -> debit_amount == 0)
             $detail -> coa_id = $transaction_coa;
            else
              $detail -> coa_id = $coa;
            $detail -> save();
        }

        // Transfer the voucher into the approve table for starting approval process

        $voucher_log = new Logger;
        $voucher_log->user_id = Auth :: user() -> id;
        $voucher_log->voucher_master_id = $voucher_master -> id;
        $voucher_log->comment = 'Voucher Initiated';
        $voucher_log -> status = HelperController :: Posted;
        $voucher_log -> save();
        //Saving the voucher in the approve for approval
        if($approve_details != 'N/A')
        {
            $voucher_approve = new Approve;
            $voucher_approve -> voucher_master_id = $voucher_master->id;
            $voucher_approve -> approvers = $approve_details;
            $voucher_approve -> passed_steps = 0;
            $voucher_approve -> save();
        }
        else
        {
            $voucher_log = new Logger;
            $voucher_log->user_id = Auth :: user() -> id;
            $voucher_log->voucher_master_id = $voucher_master -> id;
            $voucher_log->comment = 'Voucher Approved Automatically';
            $voucher_log -> status = HelperController :: Approved;
            $voucher_log -> save();
        }

    }
}
