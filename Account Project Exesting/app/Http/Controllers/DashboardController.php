<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approve;
use App\Models\VoucherMaster;
use Auth;
use App\Models\Fdr;
use App\Models\Budget;
use App\Models\AdvanceVoucher;

use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;

use App\Models\BudgetCost;
use  Session;
use App\Http\Controllers\Helper\HelperController;
use App\Models\Employee;
use DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use App\Models\PFFdr;

class DashboardController extends Controller
{
    public function index()
    {


        $e=Fdr::all();
        $pfder=PFFdr::all();



             $fdr_num=[];
             $pfdr_num=[];
             $i=0;
             $j=0;

             foreach ($e as $ex_date)
             {



             $create_at_difference=\Carbon\Carbon::createFromTimestamp(strtotime($ex_date->expire_date))->diff(\Carbon\Carbon::now())->days;

              if($create_at_difference>10)
              {


                $fdr_num[$ex_date->fdr_number]=$create_at_difference;
               $i++;



              }
              session()->put('rr',$i);


            }

            /*provedent fund fdr */

            foreach($pfder as $pf)
            {

              
             $pcreate_at_difference=\Carbon\Carbon::createFromTimestamp(strtotime( $pf->end_date))->diff(\Carbon\Carbon::now())->days;

             if($pcreate_at_difference<10)
             {


              $pfdr_num[$pf->fdr_no]=$pcreate_at_difference;
               $j++;



             }
             session()->put('pf',$j);


            }
            /*provedent fund fdr */


        $UserId = Auth :: user() -> id;
        $selected_vouchers = array();

        $items = Approve :: where('approver_id',$UserId)
                                      ->where('status',0)
                                      ->orderBy('id','asc')
                                      ->get();
       // $total_AdvanceVouche=AdvanceVoucher::get();
        $total_AdvanceVouche= DB::table('advance_vouchers')->distinct()->get(['budget_id']);






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
        $voucher_pendings = count($selected_vouchers);
        $total_voucher=count($total_AdvanceVouche);



        // Advance Budget Calculate
          $advance_voucher=Budget::where('status',7)->get();

          foreach( $advance_voucher as $value)
          {


              $advance_budget_id=AdvanceVoucher::where('budget_id', $value->id)->first();
              if(!$advance_budget_id)
              {

                $budget_level_id= Budget::where('id',$value->id)->first();
                $employee_email=Employee::where('user_id',$budget_level_id->level_id)->first();
                $j++;
                $id=$budget_level_id->id;
             /* return $employee_email->email;*/




                $details =
                [
                'greeting' => 'Hello ',
                'body' => 'You donot submit your voucher ! please submit voucher !',

                'actionText' => 'click on for approve',
                'actionURL' =>url('/voucher'),

               ];

               Mail::to($employee_email->email)->send(new \App\Mail\userMail($details,$id));

              // dd("Email is Sent.");
              
             
              

              }

              session()->put('ad_voucher',$j);

          }





        return view('backend.admin.dashboard',['voucher_pendings' => $voucher_pendings,'total'=>$total_voucher])->with('key',$fdr_num)->with('pkey',$pfdr_num);
    }


}
