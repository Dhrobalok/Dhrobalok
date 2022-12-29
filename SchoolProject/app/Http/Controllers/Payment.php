<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Coursecontent;
use App\Models\Courseenroll;
use App\Models\User;
use Str;
use Response;
use DB;
use Session;
use App\Models\Schedule;
use Illuminate\Support\Facades\Redirect;
use App\Models\Batch;
use App\Models\Header;
use App\Models\Description;
use Carbon\Carbon;
use Mail;
use View;
use App\Models\Coursepayment;
use App\Models\Promocode;


class Payment extends Controller
{

    public function index()
    {
        $batchinfo=Batch::select('course_id')
        ->where('active',1)
        ->distinct()->get();

        return view('backend.admin.paymentall',['batchinfo'=>$batchinfo]);
    }

    public function promoAdd()
    {
        return view('backend.admin.promocode');
    }

    public function Sendsms(Request $request)
    {
        $b_id=$request->id;
        $course_id=$request->c_id;
        $sms=view('backend.admin.sms',compact('b_id','course_id'))->render();
        return response()->json(['html'=>$sms, 'success'=>true]);
    }

    public function smspost(Request $request)
    {

        if($request->name==1)
        {

            $allstudent=Courseenroll::select('user_id')->where('batch',$request->b_id)
            ->where('course',$request->c_id)
            // ->where('active',1)
            ->distinct()
            ->get();

            foreach($allstudent as $student)
            {
                $user=User::where('id',$student->user_id)->first();
                $details = [
                    'title' => 'Mail from rajIT School',
                    'body' => $request->description,
                ];

                \Mail::to($user->email)->send(new \App\Mail\batchmail($details));

            }

        }

        else
        {
            $alltrainer=Schedule::select('trainer_id')->where('batch',$request->b_id)
            ->where('course_id',$request->c_id)

            ->distinct()
            ->get();

            foreach($alltrainer as $trainer)
            {
                $user=User::find($trainer->trainer_id);
                $details = [
                    'title' => 'Mail from rajIT School',
                    'body' => $request->description,
                ];

                \Mail::to($user->email)->send(new \App\Mail\batchmail($details));

            }
        }


       return redirect()->back();
    }


    public function PaymentConfirm(Request $request)
    {

        $course=Courseenroll::find($request->id);
        $user=User::where('id',$course->user_id)->first();
        $day=Carbon::now();
        $trx_id=$day->year.$request->id."bk1";

        $coursepayment=new Coursepayment;
        $coursepayment->user_id=$course->user_id;
        $coursepayment->course_id=$course->course;
        $coursepayment->batch=$course->batch;
        $coursepayment->tran_id=$trx_id;
        $coursepayment->amount=$request->amount;

        $coursepayment->save();
        $post_data = array();
        $multi_card_names = '';
        // if ($payment->payment_method == 'bKash') {
        //     $multi_card_names = 'bkash';
        // }

        // if ($payment->payment_method == 'DBBL_MB') {
        //     $multi_card_names = 'dbblmobilebanking';
        // }

        // if ($payment->payment_method == 'Cards') {
        //     $multi_card_names = 'brac_visa,dbbl_visa,city_visa,ebl_visa,sbl_visa,brac_master,dbbl_master,city_master,ebl_master,sbl_master,dbbl_nexus';
        // }
        //live api
        $post_data['app_id'] ='orlabs';
        $post_data['app_password'] ='orlabs2019';

        //sandbox api
        //$post_data['store_id'] = "testbox";
        //$post_data['store_passwd'] = "qwerty";

        $post_data['total_amount'] = $request->amount;

        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $trx_id;




        $post_data['success_url'] = url()->route('additional-rsl-payment-success');
        $post_data['fail_url'] = url()->route('additional-rsl-payment-error');
        $post_data['cancel_url'] = url()->route('additional-rsl-payment-cancel');

        # CUSTOMER INFORMATION
        $post_data['cus_name'] =  $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_phone'] = $user->p_no;
        $post_data['cus_city'] = 'Rajshahi';
        $post_data['cus_address'] = 'Bangladesh';
        $post_data['multi_card_name'] = '';

        //live url
        $direct_api_url = "https://securegw.rslpay.com/api/v1";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, true); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);

       // return $content;
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            return redirect()->back()->with('red', 'FAILED TO CONNECT WITH RSLPay API');
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        if (isset($sslcz['PaymentGateWayUrl']) && $sslcz['PaymentGateWayUrl'] != "") {
            header("Location: " . $sslcz['PaymentGateWayUrl']);
            exit;
        } else {
            return redirect()->back()->with('red', 'JSON Data parsing error!');
        }

    }

    public function Success()
    {

        $payment=Coursepayment::where('tran_id', $request->tran_id)->first();

        if($request->total_amount==$payment->amount)
        {



            // $payment->active = 1;

            Courseenroll::where('course',$payment->course_id)
            // ->where('batch',$payment->batch)
            ->where('user_id',$payment->user_id)

            ->update(
            [
                'active'=>1,

            ]
            );

            $payment->details = json_encode($request->all());
            $payment->update();
            $val_id = urlencode($request->val_id);

            //live api
            $post_data['app_id'] = "rajclg";
            $post_data['app_password'] = "rajclg2019";
            $post_data['val_id'] = $val_id;
            //sandbox api
            //$store_id=urlencode("testbox");
            //$store_passwd=urlencode("qwerty");

            $requested_url = "https://securegw.rslpay.com/api/v1/payment/validation";

            //$requested_url = "https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json";

            $handle = curl_init();
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handle, CURLOPT_URL, $requested_url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($handle);

            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            if ($code == 200 && !(curl_errno($handle))) {
                $payment->validation = $result;

                Coursepayment::where('tran_id',$request->tran_id)

                ->update(
                [
                    'validation'=>$result,

                ]
                );

            }


            $courseenroll=Coursepayment::where('tran_id',$request->tran_id)->first();


            return view('backend.Dashboard.paymentSuccess',['courseenroll'=>$courseenroll])->with('red','Your payment successfully Done');


            // $event_Member = EventMember::where('id', $payment->event_member_id)->first();

            // $member = Member::where('id', $event_Member->member_id)->first();

        }

        else
        {
            $courseenroll=Coursepayment::where('tran_id',$request->tran_id)->first();

            return view('backend.Dashboard.paymentSuccess',['courseenroll'=>$courseenroll])->with('error','You Send Insufficient Balance');

        }



        //  success sms to mobile


    }

    public function Error(Request $request)
    {


        $payment=Coursepayment::where('tran_id', $request->tran_id)->first();
        $payment->active = 0;


        Courseenroll::where('course',$payment->course_id)
        // ->where('batch',$payment->batch)
        ->where('user_id',$payment->user_id)

        ->update(
        [
            'active'=>0,

        ]
        );


        $payment->details = json_encode($request->all());
        $payment->update();
        $val_id = urlencode($request->val_id);

        //live api
        $post_data['app_id'] = "rajclg";
        $post_data['app_password'] =  "rajclg2019";
        $post_data['val_id'] = $val_id;
        //sandbox api
        //$store_id=urlencode("testbox");
        //$store_passwd=urlencode("qwerty");

        $requested_url = "https://securegw.rslpay.com/api/v1/payment/validation";


        $handle = curl_init();
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($handle);


        $error_message = "";
        # PARSE THE JSON RESPONSE
        $strParse = json_decode($result, true);

       /* if (isset($strParse['error_message']) && $strParse['error_message'] != "") {
            $error_message = " ".$strParse['error_message'];
            $payment->message = $error_message;
            $payment->save();
        }*/

        $courseenroll=Coursepayment::where('tran_id',$request->tran_id)->first();
        return view('backend.Dashboard.paymentSuccess',['courseenroll'=>$courseenroll])->with('red', 'Your Payment Has Been Cancelled');

    }

    public function Cancel(Request $request)
    {
            $payment = Coursepayment::where('tran_id', $request->tran_id)->first();
            $error_message="";
            if(isset($request->error_message))
            {
                $error_message=$request->error_message;
            }
            $error_message='Your Payment Has Been Cancelled';
            $payment->active = 0;
            // $payment->payment_method = 'RSLPay';
            $payment->details = json_encode($request->all());
            $payment->update();

            Courseenroll::where('course',$payment->course_id)
            // ->where('batch',$payment->batch)
            ->where('user_id',$payment->user_id)

            ->update(
            [
                'active'=>0,

            ]
            );

                $courseenroll=Coursepayment::where('tran_id',$request->tran_id)->first();
                return view('backend.Dashboard.paymentSuccess',['courseenroll'=>$courseenroll])->with('red', 'Your Payment Has Been Cancelled');
       // return View::make('FrontEnd.pages.event.rslpay.payment_message')->with('red', 'Your Payment Has Been Cancelled')->with('error_message', $error_message);
    }


    public function PaymentView(Request $request)
    {
         $allbatch=Courseenroll::where('course',$request->c_id)
         ->where('batch',$request->id)
         ->get();

        $html=view('backend.admin.paymentView',compact('allbatch'))->render();
        return response()->json(['html'=>$html, 'success'=>true]);
    }

    public function Promosave(Request $request)
    {
        $promocode=new Promocode;
        $promocode->course_id=$request->course_id;
        $promocode->code=$request->code;
        $promocode->discount=$request->discount;
        $promocode->from=$request->from;
        $promocode->to=$request->to;

        $promocode->save();

        return redirect()->back();


    }

    public function PromoEdit(Request $request)
    {

         $allpromo=Promocode::find($request->id);
         $html=view('backend.admin.promoedit',compact('allpromo'))->render();
         return response()->json(['html'=>$html, 'success'=>true]);

    }

    public function Promoupdate(Request $request)
    {
        Promocode::where('id',$request->id)
        ->update([

            'code'=>$request->code,
            'discount'=>$request->discount,
            'from'=>$request->from,
            'to'=>$request->to,

        ]);

      return redirect()->back();
    }


    // Payment From landing page

    public function PaymentSave(Request $request)
    {
        $course=Courseenroll::find($request->id);
        $user=User::where('id',$course->user_id)->first();
        $day=Carbon::now();
        $trx_id=$day->year.$request->id."bk1";

        $coursepayment=new Coursepayment;
        $coursepayment->user_id=$course->user_id;
        $coursepayment->course_id=$course->course;
        $coursepayment->batch=$course->batch;
        $coursepayment->tran_id=$trx_id;
        $coursepayment->amount=$request->amount;

        $coursepayment->save();
        $post_data = array();
        $multi_card_names = '';
        // if ($payment->payment_method == 'bKash') {
        //     $multi_card_names = 'bkash';
        // }

        // if ($payment->payment_method == 'DBBL_MB') {
        //     $multi_card_names = 'dbblmobilebanking';
        // }

        // if ($payment->payment_method == 'Cards') {
        //     $multi_card_names = 'brac_visa,dbbl_visa,city_visa,ebl_visa,sbl_visa,brac_master,dbbl_master,city_master,ebl_master,sbl_master,dbbl_nexus';
        // }
        //live api
        $post_data['app_id'] ='orlabs';
        $post_data['app_password'] ='orlabs2019';

        //sandbox api
        //$post_data['store_id'] = "testbox";
        //$post_data['store_passwd'] = "qwerty";

        $post_data['total_amount'] = $request->amount;

        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $trx_id;




        $post_data['success_url'] = url()->route('additional-rsl-payment-success');
        $post_data['fail_url'] = url()->route('additional-rsl-payment-error');
        $post_data['cancel_url'] = url()->route('additional-rsl-payment-cancel');

        # CUSTOMER INFORMATION
        $post_data['cus_name'] =  $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_phone'] = $user->p_no;
        $post_data['cus_city'] = 'Rajshahi';
        $post_data['cus_address'] = 'Bangladesh';
        $post_data['multi_card_name'] = '';

        //live url
        $direct_api_url = "https://securegw.rslpay.com/api/v1";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, true); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);

       // return $content;
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            return redirect()->back()->with('red', 'FAILED TO CONNECT WITH RSLPay API');
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);
        if (isset($sslcz['PaymentGateWayUrl']) && $sslcz['PaymentGateWayUrl'] != "") {
            header("Location: " . $sslcz['PaymentGateWayUrl']);
            exit;
        } else {
            return redirect()->back()->with('red', 'JSON Data parsing error!');
        }


    }


    //
}
