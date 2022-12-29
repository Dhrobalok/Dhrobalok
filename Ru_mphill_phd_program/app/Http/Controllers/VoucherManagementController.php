<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helper\HelperController;
use App\Models\VoucherMaster;
use App\Models\VoucherDetails;
use NumberToWords\NumberToWords;
use App\Models\VoucherType;
use App\Models\Logger;
use App\Models\BudgetAccounting;
use App\Models\AdvanceVouchersGeneret;
use App\Models\AdvanceAprove;
use Auth;
use App\Models\AdvanceVouchersDetail;
use App\Models\Ledger;
use App\Models\Fdr;
use App\Models\ChartOfAccount;
use App\Models\CompanySettings;
use App\Models\Budget;
use App\Models\Employee;
use Carbon\Carbon;
use App\Models\AdvanceDecline;
use App\Models\CashBook;
use DB;

use Illuminate\Support\Facades\Log;
use Str;
/**
 * This controller helps us to maintain some voucher related operations such as rendering approved vouchers,rejected vouchers etc.
 */


class VoucherManagementController extends Controller
{
    public function approved_vouchers()
    {
       //return "debit approve part";
        /**
         * This function used to render all approved vouchers.
         * @param Required no parameters.
         * @return view object contains a list of approved vouchers.
         *
         */
       // $advanc_status=AdvanceAprove::where('status',7)->first();

    //     $advanceaprove=AdvanceAprove::where('status',7)->get();
    //    if($advanceaprove)
    //    {

    //       $vouchers = VoucherMaster :: where('status',HelperController :: Approved)->get();
    //       return view('backend.admin.voucher_management.approved_vouchers',['vouchers' => $vouchers])->with('status',7)->with('aprove',$advanceaprove);

    //    }
      
          $vouchers = VoucherMaster :: where('status',HelperController :: Approved)->get();
          return view('backend.admin.voucher_management.approved_vouchers',['vouchers' => $vouchers])->with('status',0);
       


    }

    public function rejected_vouchers()
    {

         /**
         * This function used to render all rejected vouchers.
         * @param Required no parameters.
         * @return view object contains a list of rejected vouchers.
         */
        $advance_decline=AdvanceDecline::pluck('voucher_id');
        if($advance_decline)
        {
            $status=7;
        }


        $vouchers = VoucherMaster :: where('status',HelperController :: Rejected)->get();
        return view('backend.admin.voucher_management.backwarded_vouchers',['vouchers' => $vouchers,'decline'=>$advance_decline])->with('title',$status);
    }
    public function generated_vouchers()
    {

    //    $generet_voucher= DB::table('advance_vouchers_generets')->distinct()->get(['budget_id']);
    //    if($generet_voucher)
    //    {
    //        $status=7;
    //    }

       // return $ff=AdvanceVouchersGeneret::pluck('budget_id);
         /**
         * This function used to render all generated vouchers.
         * @param Required no parameters.
         * @return view object contains a list of generated vouchers.
         */
       $vouchers = VoucherMaster :: where('status',HelperController :: Generated)->get();
       return view('backend.admin.voucher_management.generate_vouchers',['vouchers' => $vouchers]);
    }

    public function generate_vouchers()
    {
        // return "bddgb";
        // $advance=AdvanceAprove::all();
        // foreach($advance as $index)
        // {
        //    $generet=new AdvanceVouchersGeneret;
        //    $generet->budget_id=$index->budget_id;
        //    $generet->generated_status="Genereted";
        //    $genereted=$generet->save();

           
        //    $advance_generate=AdvanceVouchersGeneret::where('budget_id',$index->budget_id)->first();
        //    $advace_details=AdvanceVouchersDetail::where('budget_id',$index->budget_id)->get();
        //    $details_date=AdvanceVouchersDetail::where('budget_id',$index->budget_id)->first();

        //    $total_cost=DB::table('advance_vouchers_details')
        //      ->where('budget_id',$index->budget_id)
        //      ->sum('cost');
        //    foreach($advace_details as $value)
        //    {
              
        //       $account=Budget::where('id',$value->budget_id)->first();
             
        //        $cash=new CashBook;
              
        //        $cash->transaction_date=$value->created_at;
        //        $cash->coa_id=$account->name;
        //        $cash->cash_amount=$value->cost;
        //        $cash->bank_amount=0;
        //        $cash->entry_position="Credit";
        //        $cash->save();
                       
              
        //    }

        //   $leadger_confirm=Budget::where('id',$index->budget_id)->first();
        
        //    $leadger=new Ledger;
        //    $leadger->voucher_master_id=0;
        //    $leadger->voucher_detail_id=0;
        //    $leadger->transaction_coa_id=0;
        //    $leadger->cost_center_id=0;
        //    $leadger->coa_id=$leadger_confirm->name;
        //    $leadger->debit_amount=0;
        //    $leadger->credit_amount=$total_cost;
        //    $leadger->voucher_date=$details_date->created_at;
        //    $leadger->generation_date=$advance_generate->created_at;
        //    $leadger->status=7;
        //    $leadger->save();

        //    AdvanceAprove::where('budget_id',$index->budget_id)->delete();



        //   }     

        /**
         * This function used to generate vouchers which are already approved.
         * @param Required no parameters.
         * @return void.
         */
       $helper = new HelperController;
       $vouchers = VoucherMaster :: where('status',HelperController :: Approved)->get();
       $generation_date = Carbon::now();
       foreach($vouchers as $voucher)
       {
           $voucher -> status = HelperController :: Generated;
           $voucher -> save();
           if($voucher -> type != 5)
           {
              $this -> saveInLedger($voucher,$generation_date);
              $helper -> saveEntryInCashBook($voucher -> id);
           }
           $helper -> addVoucherLog($voucher -> id,'Transfer from accepted status to generated status');
       }

       return 'Total '.count($vouchers).' vouchers generated successfully';
    }

    public function saveInLedger(VoucherMaster $voucher,$generation_date)
    {
        /**
         * This function is a helper function of generate_vouchers() function.
         * This function saves the voucher details into the ledger table.
         * This also subtracts the credit amount from the appropriate budget in budget_accounting table.
         * @param VoucherMaster type instance.
         * @param generation date.
         * @return void.
         */
       $voucher_master_id = $voucher -> id;
       $transaction_coa_id = $voucher -> transaction_coa_account;

       foreach($voucher -> voucher_details as $detail)
       {
           $ledger = new Ledger;
           $ledger -> voucher_master_id = $voucher_master_id;
           $ledger -> voucher_detail_id = $detail -> id;
           $ledger -> transaction_coa_id = $transaction_coa_id;
           $ledger -> cost_center_id = ChartOfAccount :: find($detail -> coa_id) -> cost_center_id;
           $ledger -> coa_id = $detail -> coa_id;
           $ledger -> debit_amount = $detail -> debit_amount;
           $ledger -> credit_amount = $detail -> credit_amount;
           $ledger -> status = HelperController :: Open;
           $ledger -> voucher_date = $voucher -> date;
           $ledger -> generation_date = $generation_date;
           $ledger -> save();
           Log::info('working!!');
           //Subtract from budget
        //    if($detail -> credit_amount != 0)
        //    {
        //        //Check if budget exists for this time and account
        //        $date = $voucher -> date;
        //        $budacs = BudgetAccounting::where('coa_id', $detail->coa_id)->get();
        //        $selected_budac = $budacs[0];
        //         foreach($budacs as $budac)
        //         {
        //             if($budac->start_date <= $date && $date <= $budac->end_date)
        //             {
        //                 $selected_budac = $budac;
        //             }

        //         }
        //         $selected_budac -> spend += $detail -> credit_amount;
        //         $selected_budac -> save();
        //    }
       }
    }

    public function download($voucher_id)
    {
        // return $voucher_id;
        $debit=0;
        $credit=0;
        /**here check first value of database if first value will be credit or devit then it return
        perticular field
        */
          $voucher=VoucherDetails::select('id','debit_amount','credit_amount')->where('voucher_master_id',$voucher_id )->first();
          $credit=$voucher->credit_amount;
          $debit=$voucher->debit_amount;
        /**
         * This function take voucher id and generate voucher document for download in pdf format.
         * @param voucher id.
         * @return downloadable voucher in pdf format.
         */
         $voucher = VoucherMaster :: find($voucher_id);

        $voucher_type_no=VoucherMaster :: where('voucher_no',$voucher->voucher_no)->first();

        $voucher_t =VoucherType :: where ('id',$voucher_type_no->type)->first();
    
       


        $company = CompanySettings :: find(1);
        if($debit)
        {


            $total_amount = $voucher -> voucher_details->sum('debit_amount');
        }
        else
        {


            $total_amount = $voucher -> voucher_details->sum('credit_amount');
        }


        $amount_as_string = explode(".",strval($total_amount));
        $integer_part = $amount_as_string[0];
        $decimal_part = isset($amount_as_string[1]) ? $amount_as_string[1] : "0";
        $InWords = new NumberToWords();
        $InWords = $InWords->getNumberTransformer('en');
        $integer_part = $InWords -> toWords(intval($integer_part));
        $decimal_part = $InWords -> toWords(intval($decimal_part));
        $InWords =  Str :: title($integer_part." Taka And ".$decimal_part." Paisa Only");

        $pdf = new \Mpdf\Mpdf();
        $content =view('backend.admin.voucher_download.download_voucher',['voucher' => $voucher,'company' => $company,'Inwords' => $InWords,'total_amount' => $total_amount,'voucher_name'=>$voucher_t->id])->with('debit',$debit)->with('credit',$credit);
        $pdf -> WriteHtml($content);
        $pdf -> output('voucher-'.$voucher -> voucher_no.'-.pdf','D');
    }

    public function download_cheque_book($voucher_id)
    {
         /**
         * This function take voucher id and generate voucher document for download in pdf format.
         * @param voucher id.
         * @return downloadable cheque page in pdf format.
         */
        $cheque = new \Mpdf\Mpdf([
            'default_font_size' => 12
          ]);
          $voucher = VoucherMaster :: find($voucher_id);
          $voucherDetails = $voucher -> voucher_details;
          $total_amount = $voucherDetails -> sum('debit_amount');
          $payee_account = VoucherDetails :: where('coa_id','!=',$voucher -> transaction_coa_account)
                           ->where('voucher_master_id',$voucher_id)
                           ->first();
          $account = ChartOfAccount :: find($payee_account -> coa_id);
          $InWords = new NumberToWords();
          $InWords = $InWords->getNumberTransformer('en');
          $InWords = $InWords -> toWords($total_amount);
          $pagecount = $cheque->SetSourceFile(storage_path('cheque.pdf'));
          $tplIdx = $cheque->ImportPage(1);
          $cheque->UseTemplate($tplIdx);
          $cheque->WriteText(25,30,'Agrani Bank');
          $cheque ->WriteText(45,57,$account -> name.'');
          $cheque -> WriteText(140,29,$voucher -> cheque_no);
          $cheque -> WriteText(145,38,$voucher -> date);
          $cheque -> WriteText(170,67,$total_amount .'');
          $cheque ->WriteText(56,71,$InWords.' taka only');
          $cheque ->WriteText(56,87,$account -> name .'');
          $cheque->output('cheque-page'.'.pdf',\Mpdf\Output\Destination::INLINE);
        // $voucherMaster = VoucherMaster :: find($voucher_id);
        // $voucherDetails = $voucherMaster -> voucher_details;
        // if($voucherMaster -> voucher_approvers != null)
        // $approvers = explode(',',$voucherMaster -> voucher_approvers->approvers);
        // else $approvers = '';
        // $total_amount = $voucherDetails -> sum('debit_amount');
        // $InWords = new NumberToWords();
        // $InWords = $InWords->getNumberTransformer('en');
        // $InWords = $InWords -> toWords($total_amount);
        // $voucher = new \Mpdf\Mpdf();
        // $content = view('backend.admin.voucher_download.download_cheque_book',['voucher' => $voucherMaster,'details' => $voucherDetails,'total' => $total_amount,'InWords' => $InWords,'approvers' => $approvers]);
        // $voucher -> WriteHtml($content);
        // $voucher -> output();
    }

    public function debit_voucher_download($voucher_id)
    {
         /**
         * This function take voucher id and generate voucher document for download in pdf format.
         * @param voucher id.
         * @return downloadable debit voucher in pdf format.
         */
        $voucherMaster = VoucherMaster :: find($voucher_id);
        $voucherDetails = $voucherMaster -> voucher_details;
        $approvers = explode(',',$voucherMaster -> voucher_approvers->approvers);
        $total_amount = $voucherDetails -> sum('debit_amount');
        $InWords = new NumberToWords();
        $InWords = $InWords->getNumberTransformer('en');
        $InWords = $InWords -> toWords($total_amount);
        $voucher = new \Mpdf\Mpdf();
        $content = view('backend.admin.voucher_download.debit_voucher',['voucher' => $voucherMaster,'details' => $voucherDetails,'total' => $total_amount,'InWords' => $InWords,'approvers' => $approvers]);
        $voucher -> WriteHtml($content);
        $voucher -> output('debit-voucher'.$voucherMaster -> voucher_no.'.pdf','D');

    }

    public function view($voucher_id)
    {
       // return "debit voucher view part";
        $voucherMaster = VoucherMaster :: find($voucher_id);
        $details = $voucherMaster -> voucher_details;
        $voucher_logs = $voucherMaster -> voucher_logs;
        return view('backend.admin.voucher_management.view',['voucher' => $voucherMaster,'details' => $details,'logs' => $voucher_logs]);
    }

    public function advance_download($voucher_id)
    {
        $i=0;
        $voucher_details=AdvanceVouchersDetail::where('budget_id',$voucher_id)->get();
        $voucher_no=AdvanceVouchersDetail::where('budget_id',$voucher_id)->first();
        $budgetvalue=AdvanceVouchersDetail::where('budget_id',$voucher_id)->pluck('cost');
        $budget_id=Budget::where('id',$voucher_id)->first();
        $name=Employee::where('id',$budget_id->level_id)->first();

        foreach($budgetvalue as $value)
         {
               $i=$i+$value;
         }
         $total_cost=$i;
        $company = CompanySettings :: find(1);

        $pdf = new \Mpdf\Mpdf();

        $content=view('backend.admin.vouchers.advance voucher.advance_download',['company'=>$company,'details'=> $voucher_details,'e_name'=>$name->name])->with('total',$total_cost)->with('no',$voucher_no);

        $pdf -> WriteHtml($content);
        $pdf -> output('Advance_Voucher.pdf','D');
     // return $voucher_id;
    }

    public function advance_view($voucher_id)
    {

     $advance_voucher_details=AdvanceVouchersDetail::where('budget_id',$voucher_id)->get();
     $budget_details=Budget::where('id',$voucher_id)->first();
     $generet=AdvanceVouchersGeneret::where('budget_id',$voucher_id)->first();

     return view('backend.admin.vouchers.advance voucher.advance_view',['details'=>$advance_voucher_details,'budgetdetails'=> $budget_details])->with('generet', $generet);


    }
}
