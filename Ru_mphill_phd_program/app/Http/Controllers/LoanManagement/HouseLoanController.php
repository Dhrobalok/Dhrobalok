<?php

namespace App\Http\Controllers\LoanManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HouseBuildingLoan;
use App\Models\LoanInterest;
use App\Models\Employee;
use App\Models\LoanApprovers;
use App\Models\LoanApprove;
use App\Models\LoanSetting;
use App\Models\AccountSetup;
use App\Models\VoucherMaster;
use MathPHP\Finance;
use App\Models\TrackLoanPayment;
use App\Models\Ledger;
use App\Models\CashBook;
use Auth;
use App\Http\Controllers\Helper\HelperController;
/**
 * This controller handles all types of operations about House Building Loan such as new loan creation,loan approve etc.
 *  
 */
class HouseLoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       /**
        * This is the entry point in house building loan.This function is used for rendering list of house building loans.
        *@param Required no parameters.
        *@return view object contains a list of house building loan.
        */ 
        $loans = HouseBuildingLoan :: all();
        return view('backend.admin.loans.index',['loans' => $loans]);

    }
    public function save(Request $request)
    {
       /**
        * This function is used for saving newly applied house building loan.
        *@param Employee id
        *@param Loan amount
        *@param Total payable amount
        *@param Interest rate
        *@param Number of years
        *@param EMI amount
        *@param Loan reference number
        *@return Loan save success message in string format.
        */
         $employee = Employee :: where('user_id',Auth :: user() -> id)->first();
         if($employee -> hasLoan)
         {
             return 'One loan already pending/running';
         }
         else
         {
            $NewLoan = new HouseBuildingLoan();
            $NewLoan -> employee_id = $employee -> id;
            $NewLoan -> base_amount = $request -> P;
            $NewLoan -> total_amount = $request -> payable_amount;
            $NewLoan -> interest_rate = $request -> R;
            $NewLoan -> tenure_year = $request -> N;
            $NewLoan -> emi_amount = $request -> EMI;
            $NewLoan -> loan_ref_no = $request -> ref_no;
            $NewLoan -> status = 1; // status 1 for pending
            $NewLoan -> save();
            
            //use the current interest rate for that new created loan
            $NewLoanInterest = new LoanInterest();
            $NewLoanInterest -> loan_id = $NewLoan -> id;
            $NewLoanInterest -> interest_rate = $request -> R;
            $NewLoanInterest -> emi_amount = $request -> EMI;
            $NewLoanInterest -> status = 1; //Here status 1 means that interest are in active
            $NewLoanInterest -> save();
            return 'Loan form submitted successfully';
         }
         
    }

    public function edit($loan_id)
    {
        /**
         * This function is used for editing a house building loan such as interest rate,loan amount etc.
         * @param Required only one parameter called loan id.
         * @return view object. Loan info & Employee info must be passed in the view page.
         */
        $loan_info =  HouseBuildingLoan :: find($loan_id);
        $employee = Employee :: where('user_id',Auth :: user() -> id)->first();
        return view('backend.admin.loans.edit',['loan' => $loan_info,'employee' => $employee]);
    }
    public function update(Request $request)
    {
        /**
         * This function is used for saving currently updated house building loan.
         *@param Loan amount
         *@param Total payable amount
         *@param Interest rate
         *@param Number of years
         *@param EMI amount
         *@param Loan ID
         * @return a success message in string format.
         */
            $Loan = HouseBuildingLoan :: find($request -> loan_id);
            $Loan -> base_amount = $request -> P;
            $Loan -> total_amount = $request -> payable_amount;
            $Loan -> interest_rate = $request -> R;
            $Loan -> tenure_year = $request -> N;
            $Loan -> emi_amount = $request -> EMI;
            $Loan -> status = 3; // status 1 for pending
            $Loan -> save();

            $Interest = LoanInterest :: where('loan_id',$Loan -> id)
                                     ->where('status',1)
                                     ->first();
            $Interest -> emi_amount = ceil($request -> EMI);
            $Interest -> save();
            
            $approvers = LoanApprovers :: where('status',1) -> get();

            foreach($approvers as $approver)
            {
                 $loan_approve = new LoanApprove();
                 $loan_approve -> loan_id = $Loan -> id;
                 $loan_approve -> user_id = $approver -> user_id;
                 $loan_approve -> approve_order = $approver -> order;
                 $loan_approve -> status = 0; // Approver does  not approve the loan
                 $loan_approve -> save();
            }
           

            return 'Loan form updated successfully';
    }

    public function update_interest_rate(Request $request)
    {
        /**
         * This function is used for updating interest rate of a list of loans.
         * @param array of loans id
         * @param new interest rate
         * @return void.
         */
        $loan_ids = $request -> loan_ids;
        $rate = $request -> new_rate;

        foreach($loan_ids as $id)
        {
            $loan = HouseBuildingLoan :: find($id);
            $P = $loan -> base_amount;
            $N = $loan -> tenure_year;
            $interest = $rate / 1200.00;
            $term = $N * 12;
            $top = pow((1 + $interest), $term);
            $bottom = $top - 1;
            $ratio = $top / $bottom;
            $EMI = $P * $interest * $ratio;
            $Total = $EMI * $term;
            $loan -> interest_rate = $rate;
            $loan -> total_amount = ceil($Total);
            $loan -> emi_amount = ceil($EMI);
            $loan -> save();

            $previous_interest = LoanInterest :: where('loan_id',$loan -> id)
                                 ->where('status',1)
                                 ->first();
            
            $previous_interest -> status = 0;
            $previous_interest -> save();
           

            $newInterest = new LoanInterest();
            $newInterest -> loan_id = $loan -> id;
            $newInterest -> interest_rate = $rate;
            $newInterest -> emi_amount = ceil($EMI);
            $newInterest -> status = 1; //mark newly created interest as active
            $newInterest -> save();
        }
    
    }

    public function set_approvers()
    {
        /**
         * This function is used for rendering currently active approval panel for house building loan.
         * @param Required no parameters.
         * @return a view object[A list of approvers must be passed in the view page].
         */
        $approvers = LoanApprovers :: where('status',1)->get();
        return view('backend.admin.loans.approver_setup',['approvers' => $approvers]);
    }
    public function save_approvers(Request $request)
    {
        /**
         * This function is used for saving updated approval panel for house building loan.
         * @param a list of approvers[Mainly their user id]
         * @param a list of positive integers describe their approval order.
         * @return void
         */
        $approvers = $request -> approvers;
        $serial = $request -> approve_serial;

        LoanApprovers :: where('status',1)->update(['status' => 0]);

        for($i = 0; $i < count($approvers) ; $i = $i + 1)
        {
            $approver_new = new LoanApprovers();
            $approver_new -> user_id = $approvers[$i];
            $approver_new -> order = $serial[$i];
            $approver_new -> status = 1;
            $approver_new -> save();
        }
    }

    public function pending_loans()
    {
        /**
         * This function is used for rendering all the pending house building loans.
         * @param Required no parameters.
         * @return view object[A list of pending loans must be passed into the view page].
         */
        $loans = HouseBuildingLoan :: all();
        return view('backend.admin.loans.pending_loans',['loans' => $loans]);
    }
    public function approve_loan($loan_id)
    {
        /**
         * This function is used for rendering a specific loan for approval process.
         * @param Required only one parameter called loan id.
         * @return view object[Loan info & approver info must be passed into the view page].
         */
        $loan_info =  HouseBuildingLoan :: find($loan_id);
        $employee = $loan_info -> employee_info;
       return view('backend.admin.loans.approve',['loan' => $loan_info,'employee' => $employee]);
    }
    public function approve_confirm(Request $request)
    {
        /**
         * This function is used for approve confirmation for a specific loan.
         * @param Required two parameters called user id and loan id.
         * @return confirmation message in string format.
         */
        $user_id = $request -> user_id;
        $loan_id = $request -> loan_id;
        $loan_approve = LoanApprove :: where('loan_id',$loan_id)
                         ->where('user_id',$user_id)
                         ->first();
        $loan_approve -> status = 1;
        $loan_approve -> save();

        $is_fully_approved = LoanApprove :: where('loan_id',$loan_id)
                             ->where('status',0)
                             ->count();
        if($is_fully_approved == null)
        {
            $loan =  HouseBuildingLoan :: find($loan_id);
            $loan -> status = 2;
            $loan -> save();
        }
        return 'Loan Successfully Approved';
    }

    public function loan_account_setup()
    {
        /**
         * This function is special one for house building loan module. This is used for setting up the chart of account for house building loan.[Principal amount & interest account set up]
         * @param Required no parameters.
         * @return view object.
         */
        return view('backend.admin.account_setup.index');
    }
    public function save_loan_account(Request $request)
    {
         /**
         * This function is the operational part for loan_account_setup() method. This function get the principal amount,interest rate & loan id from the accountant and saved account number for a specific loan.
         *  
         * @param Required three parameters called loan id, principal amount & interest rate.
         * @return void.
         */
        $loan_id = $request -> loan_id;
        $principal_account = $request -> principal_account;
        $interest_account = $request -> interest_account;

        $newLoanAccountSetting = new LoanSetting();
        $newLoanAccountSetting -> loan_id = $loan_id;
        $newLoanAccountSetting -> principal_coa_id = $principal_account;
        $newLoanAccountSetting -> interest_coa_id = $interest_account;
        $newLoanAccountSetting -> save();
    }

    public function delete_loan(Request $request)
    {
        /**
         * This function performs a simple job. Just get the loan id from the user and delete that loan from system.
         * @param Required only one parameter called loan id.
         * @return void.
         */
        $loan_id = $request -> loan_id;
        $loan = HouseBuildingLoan :: find($loan_id);
        $loan -> delete();
    }

    public function waitingToComplete()
    {
        $loans =  HouseBuildingLoan :: where('status',2) -> get();
        return view('backend.admin.loans.waiting_to_complete',['loans' => $loans]);
    }
    public function processLoan($loan_id)
    {
        $loan = HouseBuildingLoan :: find($loan_id);
        $settings = AccountSetup :: find(1) -> house_build_loans_accounts;
        $accounts = explode(",",$settings);
       return view('backend.admin.loans.process_loan',['loan' => $loan,'accounts' => $accounts]);
    }
    public function completeLoanProcess(Request $request)
    {
       $loan_id = $request -> loan_id;
       $loan = HouseBuildingLoan :: find($loan_id);
       $loan -> status =  4;
       $loan -> save();
       $months = intval($loan -> tenure_year) * 12;
       $rate = floatval($loan -> interest_rate) / 1200.00;
       $p_value = $loan -> base_amount;
       $principal_amount = $p_value;
       $emi = $loan -> emi_amount;
       $accounts = explode(",",AccountSetup :: find(1) -> house_build_loans_accounts);
       $helper = new HelperController();

       //Save the monthly installment record in the database
       for($month = 1; $month <= $months; $month++)
       {
          $entry = array();
          $interest   = (-1.00) * Finance::ipmt($rate, $month, $months, $p_value,0);
          $principal_repay = (-1.00) * Finance::ppmt($rate, $month, $months, $p_value,0);
          $entry['pay_date'] = date('y/m/d');
          $entry['month_no'] = $month;
          $entry['pm_begin'] = round($principal_amount,0);
          $entry['emi'] = $emi;
          $entry['interest'] = round($interest,0);
          $entry['repayment'] = round($principal_repay,0);
          $principal_amount -= $principal_repay;
          $entry['close_balance'] = round($principal_amount,0);
          $entry['loan_id'] = $loan -> id;
          $entry['employee_id'] = $loan -> employee_id;
          $entry['status'] = 0;
          TrackLoanPayment :: create($entry);
       }

      
       //Save info in the ledger
       $helper -> saveInLedgerWithoutVoucher($accounts[3],$loan -> base_amount,1);
       $helper -> saveInLedgerWithoutVoucher($accounts[0],$loan -> base_amount,0);
       $helper -> saveInLedgerWithoutVoucher($accounts[1],$loan -> total_amount - $loan -> base_amount,1);
       $helper -> saveInLedgerWithoutVoucher($accounts[2],$loan -> total_amount - $loan -> base_amount,0);

       //Save record in the CashBook
        CashBook :: create([
            'transaction_date' => date('y/m/d'),
            'coa_id' => $accounts[3],
            'cash_amount' => $loan -> base_amount,
            'bank_amount' => 0,
            'entry_position' => 'Credit'
        ]);
    }
}
