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
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
         

        $email=Session()->get('authmail');
        $id = User:: Where('email',$email)->first();
        $UserId=$id->student_id;
        $selected_vouchers = array();

         $items = Approve :: where('approver_id',$UserId)
                                      ->where('status',0)
                                      ->orderBy('id','asc')
                                      ->get();
      






        foreach($items as $item)
        {

             $previous_item = Approve :: find(($item -> id)-1);
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
        



             /*
                $details =
                [
                'greeting' => 'Hello ',
                'body' => 'You donot submit your voucher ! please submit voucher !',

                'actionText' => 'click on for approve',
                'actionURL' =>url('/voucher'),

               ];

               Mail::to($employee_email->email)->send(new \App\Mail\userMail($details,$id));

              // dd("Email is Sent.");
              */
             
              

              

             // session()->put('ad_voucher',$j);

          





        return view('backend.admin.dashboard',['voucher_pendings' => $voucher_pendings]);
    }


}
