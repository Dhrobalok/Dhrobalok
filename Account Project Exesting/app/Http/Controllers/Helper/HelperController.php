<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherMaster;
use App\Models\Approve;
use App\Http\Controllers\ChequeBookStatus;
use App\Models\ChequeBookPage;
use App\Models\Logger;
use App\Models\ProvidentFundRule;
use App\Models\CashBook;
use App\Models\VoucherDetails;
use App\Models\Ledger;
use Auth;
/**
 * This controller contains different types of flags about voucher and transaction related.
 * It has only one member function that generate voucher number for a voucher.
 */
class HelperController extends Controller
{

    public const Rejected = 0; /** Voucher rejected status */
    public const Posted = 1; /** Voucher posted status */
    public const Approved  = 2; /** Voucher approved status */
    public const Generated = 3; /** Voucher generated status */
    public const  Pending = 5; /** This status used in loan process */
    public const Proccessing = 4;/** This status used in loan process */
    public const CV = 1; /** CV for credit voucher */
    public const EXV = 2; /** EXV for expenditure voucher */
    public const TFV = 3;/** TFV for transfer voucher */
    public const DV = 4;/** DV for debit voucher */
    public const JV = 5;/** JV for journal voucher */
    public const BV = 6;/** BV for bill voucher */
    public const NotApplicable = 0; /** This is used for transactional status */
    public const Cash = 1;/** This is used for transactional status */
    public const Bank = 2;/** This is used for transactional status */
    public const Open = 1;/** This is used for ledger status */
    public const Closed = 0;/** This is used for ledger status */
    public function generate_voucher_no($voucher_code,$voucher_type,$cnt)
    {
        /**
         * This function just generate voucher no for us.
         * @param Required three parameters called voucher code,voucher type and counter respectively.
         * @return voucher number in string format.
         */
       if($voucher_type == 1)
        $voucher_code = 'CV';
       else if($voucher_type == 2)
        $voucher_code = 'EXV';
       else if($voucher_type == 3)
        $voucher_code = 'TFV';
       else if($voucher_type == 4)
       $voucher_code = 'DV';
       else if($voucher_type == 5)
       $voucher_code = 'JV';
       else $voucher_code = 'BV';
       return $voucher_code.'-'.date('Y').'/'.str_pad($cnt,4,'0',STR_PAD_LEFT);
    }

    public function markChequeAsLocked($cheque_id,$voucher_id)
    {
       if(is_null($cheque_id))
         return;
       $cheque = ChequeBookPage :: find($cheque_id);
       $cheque -> status = ChequeBookStatus :: Locked;
       $cheque -> voucher_master_id = $voucher_id;
       $cheque -> save();
    }
    public function markChequeAsUsed($cheque_id,$voucher_id)
    {
        if(is_null($cheque_id))
         return;
        $cheque = ChequeBookPage :: find($cheque_id);
        $cheque -> status = ChequeBookStatus :: Used;
        $cheque -> voucher_master_id = $voucher_id;
        $cheque -> save();
    }
    public function markChequeAsActive($cheque_id,$voucher_id)
    {
        if(is_null($cheque_id))
         return;
        $cheque = ChequeBookPage :: find($cheque_id);
        $cheque -> status = ChequeBookStatus :: Active;
        $cheque -> voucher_master_id = NULL;
        $cheque -> save();
    }

    public function removeVoucherPreviousDetails($voucher_id)
    {
        $voucher = VoucherMaster :: find($voucher_id);
        $details = $voucher -> voucher_details;

        foreach($details as $detail)
          $detail -> delete();
    }

    public function addVoucherLog($voucher_id,$message = null)
    {
        $logger = new Logger;
        $logger -> user_id = Auth :: user() -> id;
        $logger -> voucher_master_id = $voucher_id;
        $logger -> comment = $message;
        $logger -> status = self :: Posted;
        $logger -> save();
    }
    public function saveEntryInCashBook($voucher_id)
    {
       $voucher = VoucherMaster :: find($voucher_id);
       if($voucher -> type == 1)
       {
          $voucher_entries = VoucherDetails :: where('voucher_master_id',$voucher_id)
                             ->where('credit_amount','!=',0)
                             ->get();
          if($voucher -> transaction_method_id == 1)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'cash_amount' => $voucher_entries[$i] -> credit_amount,
                     'entry_position' => 'Debit'
                 ]);
              }
          }
          if($voucher -> transaction_method_id == 2)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'bank_amount' => $voucher_entries[$i] -> credit_amount,
                     'entry_position' => 'Debit'
                 ]);
              }
          }
       }
       else if($voucher -> type == 2)
       {

         $voucher_entries = VoucherDetails :: where('voucher_master_id',$voucher_id)
                             ->where('debit_amount','!=',0)
                             ->get();
          if($voucher -> transaction_method_id == 1)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'cash_amount' => $voucher_entries[$i] -> credit_amount,
                     'entry_position' => 'Credit'
                 ]);
              }
          }
          if($voucher -> transaction_method_id == 2)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'bank_amount' => $voucher_entries[$i] -> credit_amount,
                     'entry_position' => 'Credit'
                 ]);
              }
          }
       }
       else if($voucher -> type == 3)
       {
           $transfer_from = VoucherDetails :: where('voucher_master_id',$voucher_id)
                            ->where('credit_amount','!=',0)
                            ->get();
           $transfer_to = VoucherDetails :: where('voucher_master_id',$voucher_id)
                           ->where('debit_amount','!=',0)
                           ->get();
            if($voucher -> transaction_method_id == 1)
            {

                for($i = 0; $i < count($transfer_to); $i++)
                 {
                    CashBook :: create([
                        'transaction_date' => $voucher_date,
                        'coa_id' => $transfer_from[$i] -> coa_id,
                        'cash_amount' => $transfer_from[$i] -> credit_amount,
                        'entry_position' => 'Debit'
                    ]);
                    CashBook :: create([
                        'transaction_date' => $voucher_date,
                        'coa_id' => $transfer_to[$i] -> coa_id,
                        'cash_amount' => $transfer_to[$i] -> debit_amount,
                        'entry_position' => 'Credit'
                    ]);
                }
            }
            else
            {
                for($i = 0; $i < count($transfer_to); $i++)
                {
                    CashBook :: create([
                     'transaction_date' => $voucher_date,
                     'coa_id' => $transfer_from[$i]->coa_id,
                     'bank_amount' => $transfer_from[$i] ->credit_amount,
                     'entry_position' => 'Debit'
                    ]);
                    CashBook :: create([
                     'transaction_date' => $voucher_date,
                     'coa_id' => $transfer_to[$i] -> coa_id,
                     'cash_amount' => $transfer_to[$i] -> debit_amount,
                     'entry_position' => 'Credit'
                    ]);
                }
            }
       }
       else if($voucher -> type == 4)
       {
            $voucher_entries = VoucherDetails :: where('voucher_master_id',$voucher_id)
                             ->where('debit_amount','!=',0)
                             ->get();
          if($voucher -> transaction_method_id == 1)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'cash_amount' => $voucher_entries[$i] -> debit_amount,
                     'entry_position' => 'Credit'
                 ]);
              }
          }
          if($voucher -> transaction_method_id == 2)
          {
              for($i = 0; $i < count($voucher_entries); $i++)
              {
                 CashBook :: create([
                     'transaction_date' => $voucher -> date,
                     'coa_id' => $voucher_entries[$i]-> coa_id,
                     'bank_amount' => $voucher_entries[$i] -> debit_amount,
                     'entry_position' => 'Credit'
                 ]);
              }
          }
       }
    }

    public function saveInLedgerWithoutVoucher($coa_id,$amount,$type)
    {
        $ledger = new Ledger();
        $ledger -> insert([
            'coa_id' => $coa_id,
            'debit_amount' => $type == 1 ? $amount : 0,
            'credit_amount' => $type == 0 ? $amount : 0,
            'voucher_date' => date('y/m/d'),
            'generation_date' => date('y/m/d'),
            'status' => 1
        ]);
    }
    public function saveInCashBookWithoutVoucher($coa_id,$amount,$type,$isCash = 1)
    {
        CashBook :: create([
            'coa_id' => $coa_id,
            'transaction_date' => date('y/m/d'),
            'cash_amount' => $isCash == 1 ? $amount : 0,
            'bank_amount' => $isCash == 0 ? $amount : 0,
            'entry_position' => $type == 1 ? 'Debit' : 'Credit'
        ]);
    }
}
