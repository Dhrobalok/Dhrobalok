<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Models\SalaryGenerate;
use App\Models\Employee;
use App\Models\EmployeeType;
use NumberToWords\NumberToWords;
use App\Models\VoucherMaster;

use App\Models\Ledger;
use App\Models\Department;


use App\Models\CostCenter;
use App\Models\ChartOfAccount;
use App\Models\Budget;
use App\Models\BudgetAccounting;

use App\Models\BudgetAllocation;
use App\Models\AccountCategory;
use App\Http\Controllers\Helper\HelperController;
use App\Models\CashBook;
use App\Models\BulkOrder;
use App\Models\CostCenterType;
use App\Models\ReconciliationReport;
use Excel;
use DB;
use Str;
use App\Models\Rubudget;
use App\Models\User;
use App\Models\Budgetmaster;
use App\Models\Fundtransfer;
use App\Models\Teacher;
use Carbon\Carbon;
use App\Models\Teacheralocate;
use App\Models\Thesisbill;
use App\Models\Fellowship;
use App\Models\Rupaybill;

class Ruaccount extends Controller
{
    public function budget_index()
    {
        $ChartOfAccount=ChartOfAccount::all();
        return view('backend.admin.RuBudget.definebudget',['ChartOfAccount'=>$ChartOfAccount]);
    }
    public function budget_store(Request $request)
    {
       // return $request;
        $accountid =  $request->input('account', []);
        $amount =  $request->input('amount', []);
        $change =  $request->input('change', []);
        foreach($accountid as $index=>$value)
        {
            if($amount[$index]==0)
            {
                
                $agreement = new Rubudget([
                    'account_id' =>  $accountid[$index],
                     'amount'    =>  0,
                    'change' =>     $change[$index],


                           ]);

                  $agreement->save();

                //   $masterc=new Budgetmaster;
                //   $masterc->accountid=$accountid[$index];
          
                //   $masterc->amount=0;
                //   $masterc->save();
                //   $totalmaster=Budgetmaster::where('accountid',$accountid[$index])->sum('amount');
                //   $mastertotal=$totalmaster+0;
                //   DB::table('budgetmasters') 
                //   ->where('accountid',$accountid[$index])
          
                //   ->update([ 'amount' => $mastertotal]);
             }
            
            
            else
            {
                $agreement = new Rubudget([
                    'account_id' =>  $accountid[$index],
                     'amount'    =>  $amount[$index],
                    'change' =>     $change[$index],


                       ]);

                  $agreement->save();
                  $master=Budgetmaster::where('accountid',$accountid[$index])->first();
         
                  if(!$master)
                {
                    
                    $masterc=new Budgetmaster;
                    $masterc->accountid=$accountid[$index];
            
                    $masterc->amount=$amount[$index];
                     $masterc->save();
                 }
                 else
                 {
                     
                  $totalmaster=Budgetmaster::where('accountid',$accountid[$index])->get()->sum('amount');
                   $mastertotal=$totalmaster+$amount[$index];
                   DB::table('budgetmasters') 
                   ->where('accountid',$accountid[$index])
          
                    ->update([ 'amount' => $mastertotal]);

                  }
                    


              }

        

          }
        return redirect()->back();
        
    }

    public function transfer_index()
    {
        $ChartOfAccount=ChartOfAccount::all();
        return view('backend.admin.RuBudget.transferfund',['ChartOfAccount'=>$ChartOfAccount]);
    }
    public function fund_create(Request $request)
    {
       //return $request->toid;
       $totalamount=Rubudget::where('account_id',$request->fromid)->get()->sum('amount');
       $totalamount1=Budgetmaster::where('accountid',$request->fromid)->get()->sum('amount');
       $totalamount2=Budgetmaster::where('accountid',$request->toid)->get()->sum('amount');
       $totaltransfer=Fundtransfer::where('from_id',$request->fromid)->get()->sum('amount');
       $requestamount=$totaltransfer+$request->amount;
       if( $request->amount>$totalamount || $totalamount<=0 ||$totalamount1<=0 )
       {
          // return "fsdfsd";
           return redirect()->back()->with('msg','You have not enough money for transfer');
       }
       else
       {
          // return "not allow";
           $restamount=$totalamount1-$request->amount;
           $reciveamounnt=$totalamount2+$request->amount;
           //return $restamount;
           //return $reciveamounnt;
        //Rubudget::where('account_id',$request->fromid)->delete();
        $transfer=new Fundtransfer;
        $transfer->from_id=$request->fromid;
        $transfer->to_id=$request->toid;
        $transfer->amount=$request->amount;
        $transfer->description=$request->description;
        $transfer->save();
        $master=new Budgetmaster;
        $bmaster1=Budgetmaster::where('accountid',$request->fromid)->first();
        $bmaster2=Budgetmaster::where('accountid',$request->toid)->first();
         if(!$bmaster2 )
         {
            
             
                  $master->accountid=$request->toid;
                  $master->amount= $reciveamounnt;
                  $master->save();

                  DB::table('budgetmasters') 
                  ->where('accountid',$request->fromid)
                 
                  ->update([ 'amount' => $restamount]);


                  DB::table('rubudgets') 
                   ->where('account_id',$request->fromid)
                 
                   ->update([ 'amount' => $restamount]);

                  DB::table('rubudgets') 
                  ->where('account_id',$request->toid)
                 
                  ->update([ 'amount' => $reciveamounnt]);
                  return redirect()->back();
         }
         else
            {
              //return $restamount;
              //return $reciveamounnt;
            
            DB::table('budgetmasters') 
               ->where('accountid',$request->fromid)
          
               ->update([ 'amount' => $restamount]);


           DB::table('rubudgets') 
                  ->where('account_id',$request->fromid)
                 
                  ->update([ 'amount' => $restamount]);


           DB::table('budgetmasters') 

              ->where('accountid',$request->toid)
          
              ->update([ 'amount' => $reciveamounnt]);


           
           DB::table('rubudgets') 
           ->where('account_id',$request->toid)
          
           ->update([ 'amount' => $reciveamounnt]);
     
        
            return redirect()->back();
            }
               
  
       
  
    }

   }

   public function thesis_bill()
   {
       $alluse=User::where('status',1)->get();
       return view('backend.admin.ThesisBill.create',['user'=>$alluse]);
   }


   public function teacher_find(Request $request)
   {
       //return $request;
     $teacher=Teacheralocate::where('student_id',$request->student_id)->first();
     $teacher=Teacher::where('id',$teacher->teacher_id)->first();
     return array('teacher_name' => $teacher->name,'teacher_designation' =>$teacher->designation);
    // return $teacher;
        //$request->student_id;
   } 
   public function thesisbill_create(Request $request)
   {
       //return $request;
    $thesisbill=new Thesisbill;
    $thesisbill->name=$request->name;
    $thesisbill->designation=$request->designation;
    $thesisbill->adress=$request->adress;
    $thesisbill->course=$request->course;
    $thesisbill->student_id=$request->student_id;
    $thesisbill->session=$request->session;
    $thesisbill->title=$request->title;
    $thesisbill->accountid=$request->accountid;
    $thesisbill->principal_money=$request->principal_money;
    $thesisbill->cosupervisor_money=$request->cosupervisor_money;
    $thesisbill->supervisor_money=$request->supervisor_money;
    $thesisbill->submission_date=$request->submission_date;
    $totalexpemse=$thesisbill->principal_money+$thesisbill->cosupervisor_money+$thesisbill->supervisor_money;
    $thesisbill->taka=$request->taka;
    $thesisbill->teacher_name=$request->teacher_name;
    $image1 = $request -> file('e_s');
    $image2 = $request -> file('c_examcomite');
    $image3 = $request -> file('section_officer');
    $image4= $request -> file('secretary');
    $image5= $request -> file('director');
    if($image1)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image1 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image1 -> move($upload_path,$image_full_name);
            $thesisbill->e_s = $image_url;
        }
        if($image2)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image2 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image2 -> move($upload_path,$image_full_name);
            $thesisbill->c_examcomite = $image_url;
        }
        if($image3)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image3 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image3 -> move($upload_path,$image_full_name);
            $thesisbill->section_officer = $image_url;
        }
        if($image4)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image4 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image4 -> move($upload_path,$image_full_name);
            $thesisbill->secretary = $image_url;
        }

        if($image5)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image5 -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image5 -> move($upload_path,$image_full_name);
            $thesisbill->director = $image_url;
        }
        $masterbudget=Budgetmaster::where('accountid',$request->accountid)->first();
        $totalbalance=$masterbudget->amount-$totalexpemse;

        DB::table('budgetmasters') 
        ->where('accountid',$request->accountid)
       
        ->update([ 'amount' => $totalbalance]);
        $thesisbill->save();
        return redirect()->back()->with('msg','Successfully inser !');
   }

   public function fellowship_index()
   {
        $fellow=DB::table('fellowships')->select('roll')->distinct()->get();
       // User::where('student_id',$fellowship)->get();
        return view('backend.admin.Felloship.index',['allfellow'=>$fellow]);
   }

   public function fellowship_report($student_id)
   {
       
     $fellowship=Fellowship::where('roll',$student_id)->first();
     $month=Fellowship::select('month','year','roll')
     ->where('roll',$fellowship->roll)
     ->orderBy('id','desc')
     ->take(1)
     ->get();

    
    
    

     $lastmonth=Fellowship::where('roll',$fellowship->roll)
     ->orderBy('id','desc')
     ->take(1)
     ->first();

     $totalexpence=Fellowship::select('*')->get()->sum('rate');
    // return $lastmonth->created_at;
     

     $num1=count($month);

     $fellowships=Fellowship::where('roll',$student_id)->get();
     $num2=count($fellowships);

    $previoustaken=$num2-$num1;
    $content =view('backend.admin.Felloship.fellowreport',['fellow'=>$fellowship,'previous'=>$previoustaken,'num'=>$num1,'expencetotal'=>$totalexpence])->with('last',$lastmonth);
    $pdf = new \Mpdf\Mpdf();
    $pdf -> WriteHtml($content);
    $pdf -> output('FellowshipRepot.pdf','D');
        // return $fellowship=Fellowship::where('id',$student_id)->get();
    //    return view('backend.admin.Felloship.',['allfellow'=>$fellowship]);
   }

   public function fellowship_bill($student_id)
   {
      
       
    $fellowships=Thesisbill::where('student_id',$student_id)->orderBy('id','desc')->first();
//     $num2=count($fellowships);

//    $previoustaken=$num2-$num1;  
     $content =view('backend.admin.Felloship.thesisbill',['fellow'=>$fellowships]);
     $pdf = new \Mpdf\Mpdf();
      $pdf -> WriteHtml($content);
      $pdf -> output('FellowshipReport.pdf','D');
       
   }

   public function paybill_create()
   {   $alluser=User::where('status',1)->get();
       return view('backend.admin.pay_bill.create',['userall'=>$alluser]);
   }

   public function paybill_store(Request $request)
   {
    $studentid =  $request->input('studentid', []);
    $month =  $request->input('month', []);
    $year =  $request->input('year', []);
    $amount =  $request->input('amount', []);
    $paystate =  $request->input('paystate', []);
    $shipnum =  $request->input('shipnum', []);
    foreach($studentid as $index=>$value)
     {
        $agreement = new Rupaybill([
            'studentid' =>  $studentid[$index],
             'amount'    => $amount[$index],
             'month' =>     $month[$index],
             'year' =>      $year[$index],
             'paystate' =>  $paystate[$index],
             'shipnum' =>   $shipnum[$index],


                   ]);
                   $agreement->save();

     }
    
     return redirect()->back()->with('msg','Data insert !');

   }

   public function paybill_download($student_id)
   {
          //return $student_id;
        $fellowships=Rupaybill::where('studentid',$student_id)->get();
   
         $content =view('backend.admin.pay_bill.paybillreport',['fellow'=>$fellowships]);
         $pdf = new \Mpdf\Mpdf();
          $pdf -> WriteHtml($content);
          $pdf -> output('FellowshipReport.pdf','I');
   }
}
