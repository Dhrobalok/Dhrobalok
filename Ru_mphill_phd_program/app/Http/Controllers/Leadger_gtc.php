<?php

namespace App\Http\Controllers;
use App\Models\CompanySettings;
use App\Models\GtcLeadger;
use App\Models\GtcPayment;
use App\Models\BulkComission;
use DB;

use Illuminate\Http\Request;

class Leadger_gtc extends Controller
{

    public function index()
    {
      // $gtc_leadegre=GtcLeadger::leftJoin('gtc_payments', 'gtc_leadgers.id', '=', 'gtc_payments.gtc_id')

      // ->distinct()
      //  ->get();
       $gtc_leadegre=GtcLeadger::all();
        foreach($gtc_leadegre as $gtc_amount)
        {
            if($gtc_amount->currency==1)
            {

                $dollar=DB::table('gtc_leadgers')
                ->where('currency',$gtc_amount->currency)
                ->sum('amount');

            }
            else
            {

                $bdt=DB::table('gtc_leadgers')
                ->where('currency',2)
                ->sum('amount');

            }


        }


        return view('backend.admin.GtcLeadger.index',['gtc_leadger'=> $gtc_leadegre,'dollar'=> $dollar,'bdt'=>$bdt]);

    }

    public function create()
    {
        return view('backend.admin.GtcLeadger.gtc_create');
    }


    public function store(Request $request)
    {
       // return $request;
        $title =  $request->input('title', []);
        $amount= $request->input('amount', []);
        $currence=  $request->input('currency', []);


        foreach( $amount as $index=>$value)
            {

              $this->validate($request,
                [
                'title' => 'required',
                ]);

       $agreement = new GtcLeadger([
       'title' => $title[$index],
       'amount' =>  $amount[$index],
       'currency' =>  $currence[$index],
       'total'    =>0,

                                ]);

        $agreement->save();



              }


          return redirect()->route('gtc.index');

    }

    public function gtc_report()
    {
        return view('backend.admin.GtcLeadger.gtc_report');
    }

    public function download(Request $request)
    {

      $company = CompanySettings :: find(1);
      $gtc_leadegre=GtcLeadger::where('created_at','>=',$request->from_year)
      ->where('created_at','<=',$request->to_year)
      ->get();
      $gtc_leadegre2=GtcLeadger::where('created_at','>=',$request->from_year)
      ->where('created_at','<=',$request->to_year)
      ->first();

      if(!$gtc_leadegre2)
      {
          
          $dollar=0;
          $bdt=0;

          $pdf = new \Mpdf\Mpdf();

          $content=view('backend.admin.GtcLeadger.gtc_download',['company'=>$company,'gtc_leadger'=> $gtc_leadegre,'dollar'=> $dollar,'bdt'=>$bdt]);
          $pdf -> WriteHtml($content);
          $pdf -> output('GTC_Agreement.pdf','D');
        
      }

      else
      {
          

    
      foreach($gtc_leadegre as $gtc_amount)
      {
          if($gtc_amount->currency==1)
          {

              $dollar=DB::table('gtc_leadgers')
              ->where('currency',$gtc_amount->currency)
              ->sum('amount');

          }
          else
          {

              $bdt=DB::table('gtc_leadgers')
              ->where('currency',2)
              ->sum('amount');

          }


      }

      $pdf = new \Mpdf\Mpdf();

      $content=view('backend.admin.GtcLeadger.gtc_download',['company'=>$company,'gtc_leadger'=> $gtc_leadegre,'dollar'=> $dollar,'bdt'=>$bdt]);
      $pdf -> WriteHtml($content);
      $pdf -> output('GTC_Agreement.pdf','D');

    }


    }


    public function payment(Request $request)
    {

        $gtc_leadegre=GtcLeadger::where('id',$request->gtc_id)->first();
        $gtc_pay=GtcPayment::where('gtc_id',$request->gtc_id)->first();
        if(!$gtc_pay)
        {
            $payment=new GtcPayment;
            $payment->gtc_id=$request->gtc_id;
            $payment->total_pay=$request->amount;
            $payment->save();

        }

        else
        {
           $gtc=GtcPayment::where('gtc_id',$request->gtc_id)->first();

            if($gtc_leadegre->amount == $gtc_leadegre->total)
            {
                return redirect()->route('gtc.index');

            }
            else
            {
                $payment=new GtcPayment;
                $payment->gtc_id=$request->gtc_id;
                $payment->total_pay=$request->amount;
                $payment->save();

                 $pay=DB::table('gtc_payments')
                ->where('gtc_id',$request->gtc_id)
                ->sum('total_pay');

                $affected=DB::table('gtc_leadgers')
                ->where('id',$request->gtc_id)
               ->update(['total' =>  $pay]);

            }

        }


        return redirect()->route('gtc.index');

    }

    public function bulk_invoice()
    {
       return view('backend.admin.GtcLeadger.invoice');
    }

    public function bulk_invoice_download(Request $request)
    {
       // return $request;
       $company=BulkComission::where('created_at','>=',$request->from_year)
        ->where('created_at','<=',$request->to_year)
        ->get();
        $pdf = new \Mpdf\Mpdf();
        $content=view('backend.admin.bulk_orders.bulk_invoice',['company'=>$company]);   
        $pdf -> WriteHtml($content);
        $pdf -> output('invoice_form.pdf','D');
    }


}
