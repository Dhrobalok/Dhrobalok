<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoucherMaster;
use App\Models\User;
use App\Models\Approve;
use App\Models\Logger;
use App\Models\AdvanceVoucher;
use App\Models\AdvanceVouchersDetail;
use Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

use App\Http\Controllers\Helper\HelperController;
use App\Models\AdvanceAprove;
use App\Models\AdvanceDecline;

/**
 * This controller provide the functionalities which are help us to render approvable vouchers for a specific user, voucher approve confirmation, voucher backward/reject confirmation etc.
 */
class ApproveController extends Controller
{
    public function index()
    {


        /**
         * This function is used to render all the vouchers which will may be approved by currently logged in user. Let's discuss it more clearly, suppose you are in the approval panel, now it is your turn to approve those vouchers which are selected for you,
         * this function supplies these vouchers list for you.
         * @param Required no parameters.
         * @return view object contains a list of vouchers.
         */
        $UserId = Auth :: user() -> id;
        $selected_vouchers = array();

        $items = Approve :: where('approver_id',$UserId)
                                      ->where('status',0)
                                      ->orderBy('id','asc')
                                      ->get();

        foreach($items as $item)
        {

             $previous_item = Approve :: find(($item -> id) - 1);
             if(is_null($previous_item))
             {
                $selected_vouchers[] = intval($item -> voucher_master_id);
             }
             else if($item -> voucher_master_id == $previous_item -> voucher_master_id)
             {
                 if($previous_item -> status == 1)
                $selected_vouchers[] = intval($item -> voucher_master_id);
             }
             else if($item -> voucher_master_id != $previous_item -> voucher_master_id)
                 $selected_vouchers[] = intval($item -> voucher_master_id);
        }

        $vouchers = VoucherMaster :: whereIn('id',$selected_vouchers)
                    ->get();

        $advancevoucher= DB::table('advance_vouchers')->distinct()->get(['budget_id']);

        //$advancevoucher=AdvanceVoucher::where('status',7)->get();
        $advancevouchers=AdvanceVoucher::where('status',7)->first();
        if( $advancevouchers)
        {
            return view('backend.admin.approve.index',['vouchers' => $vouchers,'advancceid'=>$advancevoucher])->with('status', $advancevouchers->status);
        }
        else
        {
            return view('backend.admin.approve.index',['vouchers' => $vouchers,'advancceid'=>$advancevoucher])->with('status',0);
        }



    }

    public function backward_voucher($voucher_id)
    {

        /**
         * This function is used to render a voucher rejection page.
         * @param Required only one parameter called voucher id.
         * @return view object contains a voucher info and rejection link.
         *
         */

        $advance_detail=AdvanceVoucher::where('id',$voucher_id)->first();
        $voucherMaster = VoucherMaster :: find($voucher_id);
        $details = $voucherMaster -> voucher_details;
        $voucher_logs = $voucherMaster -> voucher_logs;
        if($advance_detail)
        {

        $advance_budget=AdvanceVouchersDetail::where('budget_id',$advance_detail->budget_id)->get();

        return view('backend.admin.approve.backward_confirm',['voucher' => $voucherMaster,'details' => $details,'logs' => $voucher_logs])->with('status',$advance_detail->status)->with('advance',$advance_detail)->with('advangebudget',$advance_budget);


        }
        else
        {
            return view('backend.admin.approve.backward_confirm',['voucher' => $voucherMaster,'details' => $details,'logs' => $voucher_logs])->with('status',0);
        }

    }

    public function declineConfirm(Request $request,$voucher_id)
    {

        /**
         * This function save the commit when a user confirm a voucher to be rejected to the database and make voucher status to be rejected.
         * @param It accepts two parameter called commit which is provided by user and voucher id.
         * @return void. Redirect to the index page with a message.
         */

        $helper = new HelperController();
        $advance_detail=AdvanceVoucher::where('id',$voucher_id)->first();


        // return $advance_detail->status;


        $voucher_master = VoucherMaster :: find($voucher_id);
        $user_id = Auth :: user() -> id;
        $declined = Approve :: where('voucher_master_id',$voucher_master -> id)
                    ->where('approver_id',$user_id)
                    ->first();
        $previous_approver = Approve :: where('voucher_master_id',$voucher_master -> id)
                             ->where('approve_order',$declined -> approve_order - 1)
                             ->first();


        if(!isset($previous_approver))
        {
            $voucher_master -> status = HelperController :: Rejected;
            $voucher_master -> save();
            $helper -> markChequeAsActive($voucher_master -> cheque_no,$voucher_master -> id);
        }
        else
        {
            $voucher_master -> status = HelperController :: Proccessing;
            $voucher_master -> save();
            $previous_approver -> status = 0;
            $previous_approver -> save();
        }
        $comment = $request -> comment;
        $helper -> addVoucherLog($voucher_id,$comment);
    }

    public function approve_voucher($voucher_id)
    {
        //return $voucher_id;
        /**
         * This function is used to render a voucher approval page.
         * @param Required only one parameter called voucher id.
         * @return view object contains a voucher info and approval link.
         */
        //$advance_detail= AdvanceVoucher::find($voucher_id);
        $advance_detail=AdvanceVoucher::where('budget_id',$voucher_id)->first();
        $advance_details=AdvanceVouchersDetail::where('budget_id',$voucher_id)->first();



        $advance_budget=AdvanceVouchersDetail::where('budget_id',$voucher_id)->get();
         $advance_budget_c=AdvanceVouchersDetail::where('budget_id',$voucher_id)->first();

        if(  $advance_budget_c)
        {


            return view('backend.admin.vouchers.advance voucher.approve')->with('status',$advance_details->status)->with('advance',$advance_details)->with('advangebudget',$advance_budget)->with('id',$voucher_id);

        }
        else
        {
            $voucherMaster = VoucherMaster :: find($voucher_id);
            $details = $voucherMaster -> voucher_details;
            $voucher_logs = $voucherMaster -> voucher_logs;

            return view('backend.admin.approve.approve_confirm',['voucher' => $voucherMaster,'details' => $details,'logs' => $voucher_logs])->with('status',0);
        }




    }

    public function  advance_decline_voucher($voucher_id)
    {


        //return $voucher_id;
        /**
         * This function is used to render a voucher approval page.
         * @param Required only one parameter called voucher id.
         * @return view object contains a voucher info and approval link.
         */
        //$advance_detail= AdvanceVoucher::find($voucher_id);
        $advance_detail=AdvanceVoucher::where('budget_id',$voucher_id)->first();
        $advance_details=AdvanceVouchersDetail::where('budget_id',$voucher_id)->first();



        $advance_budget=AdvanceVouchersDetail::where('budget_id',$voucher_id)->get();

        if( $advance_budget)
        {


            return view('backend.admin.vouchers.advance voucher.decline')->with('status',$advance_details->status)->with('advance',$advance_details)->with('advangebudget',$advance_budget)->with('id',$voucher_id);

        }
        else
        {
            $voucherMaster = VoucherMaster :: find($voucher_id);
            $details = $voucherMaster -> voucher_details;
            $voucher_logs = $voucherMaster -> voucher_logs;

            return view('backend.admin.approve.approve_confirm',['voucher' => $voucherMaster,'details' => $details,'logs' => $voucher_logs])->with('status',0);
        }



    }


    public function approveConfirm(Request $request,$voucher_id)
    {

        /**
         * This function save the commit when a user confirm a voucher to be approved to the database and make voucher status to be processing.
         * @param It accepts two parameter called commit which is provided by user and voucher id.
         * @return void. Redirect to the index page with a message.
         */
        $helper = new HelperController();
        $voucherId = $voucher_id;
        $user_id = Auth :: user() -> id;
        $approve = Approve :: where('voucher_master_id',$voucherId)
                              ->where('approver_id',$user_id)
                              ->first();
        $approve -> status = 1;
        $approve -> save();

        $remaining_approvals = Approve :: where('voucher_master_id',$voucherId)
                               ->where('status',0)
                               ->count();


        $voucher_master = VoucherMaster :: find($voucherId);

        //Check the voucher totally approved
        if($remaining_approvals == 0)
        {
            $voucher_master -> status = HelperController :: Approved;
            $voucher_master -> save();
            $helper -> markChequeAsUsed($voucher_master -> cheque_no,$voucher_master -> id);
        }
        else
        {
            $voucher_master -> status = HelperController :: Proccessing;
            $voucher_master -> save();
        }

        $comment = $request -> comment;
        $helper -> addVoucherLog($voucher_id,$comment);
    }


    public function AdvanceApprove($voucher_id)
    {

       $i=0;
       $confirm=AdvanceVoucher::where('budget_id',$voucher_id)->first();
       $aprove= new AdvanceAprove;
       $aprove->budget_id=$confirm->budget_id;
       $aprove->status=$confirm->status;

       $aprove->aprove_status="Aproved";
       $budgetvalue=AdvanceVouchersDetail::where('budget_id',$confirm->budget_id)->pluck('cost');
       foreach($budgetvalue as $value)
        {
              $i=$i+$value;
        }
       // return $i;
        $aprove->total_cost=$i;

      $if=$aprove=$aprove->save();
      if($if)
      {
        AdvanceVoucher::where('budget_id',$confirm->budget_id)->delete();
        return Redirect::back()->withErrors(['msg' => 'successfully insert !']);

      }
      else
      {
       // AdvanceVoucher::where('budget_id',$confirm->budget_id)->delete();
       return Redirect::back();

      }


    }
    public function DeclineComment(Request $request,$voucher_id)
    {
      
      $decline=new AdvanceDecline;
      $decline->voucher_id=$voucher_id;
      $decline->comment=$request->comment;
      $decline->save();
      return Redirect::back();

    }

}
