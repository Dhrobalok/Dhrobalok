<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Agreement;
use App\Models\BulkOrder;
use App\Models\BulkDetail;
use App\Models\BulkMaster;
use App\Models\PartialConfirm;
use App\Models\CompanySettings;
use App\Models\PartialMaster;
use App\Models\BulkComission;
//use App\Models\BulkOrder;
use Session;
use DB;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PartialPayment extends Controller
{
    public function index()
    {

         $agreement=Agreement::leftJoin('partial_masters', 'agreements.id', '=', 'partial_masters.agree_id')
        
       ->distinct()
      
        ->get();

        return view('backend.admin.partial_payment.index',['agreements'=>$agreement]);

    }

    public function store(Request $request)
    {
        //return $request;
        $customer =  $request->input('customer_id', []);
        $vendor =  $request->input('vender_id', []);
        $agreement_name =  $request->input('agreement_name', []);
        $amount =  $request->input('amount', []);


        foreach($amount as $index=>$value)
            {

              $this->validate($request,
                [
                'customer_id' => 'required',
                ]);

       $agreement = new Agreement([
       'customer_id' => $customer[$index],
       'vender_id' =>  $vendor[$index],
       'agreement_name' =>  $agreement_name[$index],
       'amount' => $amount[$index],
       'rest_amount' => 0

                                ]);

        $agreement->save();



              }

   return redirect()->route('admin.partial.index')->with('success','Agreement successful');

   // return redirect()->back()->with('message','Agreement Saved Successfully!!');


   }
   public function create()
   {
    $customer= Customer::all();
    $vendor= Vendor::all();
    return view('backend.admin.partial_payment.create',['customers'=>$customer,'vendors'=>$vendor]);

   }

   public function partial_payment(Request $request)
   {
     // return $request;

       $total_partial[]=0;
       $agreement=Agreement::where('id',$request->agreement)->first();
       $total_c=PartialConfirm::where('agree_id',$request->agreement)->get();
      // $total_value=PartialMaster::where('agree_id',$request->agreement)->first();
       if(!$total_c)
       {

         $p=new PartialConfirm;
         $p->amount=$request->amount;
         $p->agree_id=$request->agreement_id;
         $p->save();
         return redirect()->route('admin.partial.index');
        }

       else
       {

        $p=new PartialConfirm;
        $p_master=new PartialMaster;

        $p->amount=$request->amount;
        $p->agree_id=$request->agreement_id;


        $p->save();
        $agreement=Agreement::where('id',$request->agreement_id)->first();
        $partial_c=DB::table('partial_confirms')

                    ->where('agree_id',$request->agreement_id)
                    ->sum('amount');

        $affected = DB::table('partial_masters')
              ->where('agree_id', $request->agreement_id)
              ->update(['total' => $partial_c]);


            $p_master->agree_id=$request->agreement_id;

            $p_master->total=$partial_c;
            $p_master->save();
        }


        return redirect()->route('admin.partial.index');


   }

   public function partial_download($agreemnt_id)
   {
    $agreement=Agreement::leftJoin('partial_confirms', 'agreements.id', '=', 'partial_confirms.agree_id')
    ->orderBy('partial_confirms.amount')
    ->where('partial_confirms.agree_id',$agreemnt_id)
    ->get();

     $total=PartialMaster::where('agree_id',$agreemnt_id)->first();

      $company = CompanySettings :: find(1);

      $pdf = new \Mpdf\Mpdf();

      $content=view('backend.admin.partial_payment.partial_download',['company'=>$company,'bulk'=>$agreement,'total'=>$total->total]);

       $pdf -> WriteHtml($content);
       $pdf -> output('partial_Agreement.pdf','D');


   }


   public function bulk_index()
   {

      // return ""
     $new=BulkDetail::all();
      if($new)
      {
        
         // return "shahon";
        $agreement=BulkOrder::leftJoin('bulk_masters', 'bulk_orders.id', '=', 'bulk_masters.agreement_id')
        ->orderBy('bulk_orders.id')
        ->distinct()
        ->get();

       return view('backend.admin.bulk_orders.bulk_index',['bulk'=>$agreement]);

      }
      else
      {
        
         // return "rashed";
        $agreemnt=BulkOrder::leftJoin('bulk_masters', 'bulk_orders.id', '=', 'bulk_masters.agreement_id')
        ->orderBy('bulk_orders.id')
        ->select('bulk_orders.*')
        ->distinct()
        ->get();

      return view('backend.admin.bulk_orders.bulk_index',['bulk'=>$agreemnt]);


      }

   }

   public function bulk_create()
   {
    
       $customer= Customer::all();
       $vendor= Vendor::all();
       return view('backend.admin.bulk_orders.payment_bulk',['customers'=>$customer,'vendors'=>$vendor]);
   }

   public function bulk_store(Request $request)
   {

    $customer =  $request->input('customer_id', []);
    $vendor =  $request->input('vender_id', []);
    $agreement_name =  $request->input('agreement_name', []);

    $quantity =  $request->input('quantity', []);
    $quantity_size =  $request->input('quantity_size', []);
    $each_ton =  $request->input('each_ton', []);
    $quantity_sign =  $request->input('quantity_sign', []);

    foreach($quantity as $index=>$value)
        {

          $this->validate($request,
            [
            'customer_id' => 'required',
            ]);

   $agreement = new BulkOrder([
   'customer_id' => $customer[$index],
   'vender_id' =>  $vendor[$index],
   'agreement_name' =>  $agreement_name[$index],
   'quantity' => $quantity[$index],
   'quantity_size' => $quantity_size[$index],
   'each_ton' => $each_ton[$index],
   'quantity_sign' => $quantity_sign[$index],
   'adjust'        =>0,
   'net_bill'        =>0,


                            ]);

    $agreement->save();



          }


      return redirect()->route('bulk.index');
   }

   public function bulk_payment(Request $request )
   {
     // return $request;
      $bulk=new BulkDetail;
      $sign=BulkOrder::where('id',$request->agreement_id)->first();
      $bulkmaster=BulkMaster::where('agreement_id',$request->agreement_id)->first();
      if($sign->adjust==1)
      {
        return redirect()->route('bulk.index');
      }
      $total_a=BulkMaster::where('agreement_id',$request->agreement_id)->first();
      $total_pay=DB::table('bulk_details')

      ->where('agreement_id',$request->agreement_id)
      ->sum('total_pay');
      /*
      Here check value if value  null return then the scope will bw execute.

      */
      if(!$total_a)
      {



          $bulk->agreement_id=$request->agreement_id;
          $bulk->quantity=$request->quantity;
          $bulk->quantity_sign=$sign->quantity_sign;
          if( $sign->quantity_sign == 1)
              {
                 $amount=$request->quantity * $sign->each_ton;
                 $total_quentity=$sign->quantity* $sign->each_ton;

               }
         else
              {
                  if($sign->quantity_size>=5 && $sign->quantity_size<80)
                   {

                    $amount=$request->quantity * $sign->each_ton;
                    $total_quentity=$sign->quantity * $sign->each_ton;

                   }
                   else
                   {
                       $amount=0;
                       $total_quentity=0;
                   }


               }

      $bulk->total_pay=$amount;
      $bulk->save();
      $bulkmaster=new BulkMaster;
      $bulkmaster->agreement_id=$request->agreement_id;
      $bulkmaster->total_amount=$total_quentity;
      $bulkmaster->total_pay=$amount;
      $bulkmaster->save();
      $total_pay=DB::table('bulk_details')

      ->where('agreement_id',$request->agreement_id)
      ->sum('total_pay');


      $affected = DB::table('bulk_masters')
      ->where('agreement_id', $request->agreement_id)
      ->update(['total_pay' => $total_pay]);
        return redirect()->route('bulk.index');
      }




    if( $total_a->total_amount!=$total_pay && $total_a->total_amount>$total_pay)
    {
      $bulk->agreement_id=$request->agreement_id;
      $bulk->quantity=$request->quantity;
      $bulk->quantity_sign=$sign->quantity_sign;
      if( $sign->quantity_sign==1)
      {
        $amount=$request->quantity * 100;
        $total_quentity=$sign->quantity*100;

      }
      else
      {
          if($sign->quantity_size>=5 && $sign->quantity_size<80)
        {

          $amount=$request->quantity * $sign->each_ton;
          $total_quentity=$sign->quantity * $sign->each_ton;

        }
        else
        {
            $amount=0;
            $total_quentity=0;
        }

      }

      $bulk->total_pay=$amount;
      $bulk->save();
      $bulkmaster=new BulkMaster;
      $bulkmaster->agreement_id=$request->agreement_id;
      $bulkmaster->total_amount=$total_quentity;
      $bulkmaster->total_pay=$amount;
      $bulkmaster->save();
      $total_pay=DB::table('bulk_details')

      ->where('agreement_id',$request->agreement_id)
      ->sum('total_pay');


      $affected = DB::table('bulk_masters')
      ->where('agreement_id', $request->agreement_id)
      ->update(['total_pay' => $total_pay]);

      session()->put('status',0);

      return redirect()->route('bulk.index')->with('success','Agreement successful');
    }

    else
    {
        session()->put('status',1);
        return redirect()->route('bulk.index');
    }



   }

   public function bulk_download()
   {
    
    $agreement=BulkOrder::Join('bulk_comissions','bulk_orders.id', '=', 'bulk_comissions.agreement_id')
    ->orderBy('bulk_comissions.id')
   ->distinct()
   ->get();
   // $total=BulkMaster::where('agreement_id',$agreemnt_id)->first();
    $company = CompanySettings :: find(1);

    $pdf = new \Mpdf\Mpdf();

    $content=view('backend.admin.bulk_orders.bulk_download',['company'=>$company,'bulk'=>$agreement]);

    $pdf -> WriteHtml($content);
    $pdf -> output('Vat_Tax_Commission.pdf','D');

   }

   public function bulk_adjustment($agreemnt_id)
   {

      $bulk_adjust=BulkMaster::where('agreement_id',$agreemnt_id)->first();

      $commission = (3/100)*$bulk_adjust->total_pay;
      $vat=(15/100)* $commission;
      $income_tax=(10/100)*$commission;

      $stone_size=BulkOrder::where('id',$agreemnt_id)->first();
      if($stone_size->quantity_size>=5 && $stone_size->quantity_size<80)
       {

           $loading_charge= $stone_size->quantity*60;

       }
       else
       {
        $loading_charge= $stone_size->quantity*80;

       }

       $net_bill=($bulk_adjust->total_pay+$vat+$income_tax+$loading_charge)-$commission;

       $affected = DB::table('bulk_orders')
       ->where('id',$agreemnt_id)
       ->update(['adjust' => 1]);


       $affected = DB::table('bulk_orders')
       ->where('id',$agreemnt_id)
       ->update(['net_bill' => $net_bill]);

       $bulk_commision=new BulkComission;
       $bulk_commision->agreement_id=$agreemnt_id;
       $bulk_commision->commission=$commission;
       $bulk_commision->vat=$vat;
       $bulk_commision->incometax=$income_tax;
       $bulk_commision->save();

       $adjust_date=BulkComission::where('agreement_id',$agreemnt_id)->first();



       $affected = DB::table('bulk_orders')
       ->where('id',$agreemnt_id)
       ->update(['updated_at' => $adjust_date->created_at]);


       session()->put('id',  $agreemnt_id);
       return redirect()->route('bulk.index');

   }

   public function daily_report(Request $request)
   {
    // return $request->to_year;
     
     $total_quentity=0;
     $total_amount=0;
     //return $request->from_year;
    $agreement=BulkOrder::join('bulk_comissions','bulk_orders.id', '=', 'bulk_comissions.agreement_id')
   ->where('bulk_comissions.created_at','>=',$request->from_year)
   ->where('bulk_comissions.created_at','<=', $request->to_year)
   ->orderBy('bulk_comissions.id')
   ->get();



      //$total=BulkMaster::where('agreement_id',$agreemnt_id)->first();
    $company = CompanySettings :: find(1);

    $pdf = new \Mpdf\Mpdf();

    $content=view('backend.admin.bulk_orders.daily_report',['company'=>$company,'bulk'=>$agreement]);

    $pdf -> WriteHtml($content);
    $pdf -> output('Stone_Agreement.pdf','D');

   }

   public function bulk_duration()
   {
     return view('backend.admin.bulk_orders.report_duration');
   }

  

}
