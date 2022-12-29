<?php
namespace App\Http\Controllers;

use App\Models\SalarySegment;
use App\Models\Festival;
use App\Models\Fdr;
use App\Models\CompanySettings;
use App\Models\BudgetAccounting;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\PFRecord;
use App\Models\ProvidentFundContribution;

use Session;
use DateTime;

use App\Models\FestivalBonus;
use DB;
use App\Models\SegmentWiseSalaryDistribution;
use App\Models\PFFdr;
use App\Models\Bank;



use Illuminate\Http\Request;

class FdrController extends Controller
{
     public function fdr()
     {
        $t=Fdr::pluck('expire_date');
        $now = Carbon::now();
        $diff = strtotime($now) - strtotime($t);
       //return abs(round($diff / 86400));

       // return $t->diff($now);
        return view('backend.admin.FDR_Management.fdr_creat');
     }


    public function fdrcreate(Request $request)
    {


        $budac = new Fdr;
        $budac->year=$request->year;
        $budac->fdr_amount= $request->fdr_amount;
        $budac->interest_rate=$request->interest_rate;
        $budac->fdr_number=$request->fdr_number;
        $budac->creat_date=$request->creat_date;
        $budac->bank_name=$request->bank_name;
        $budac->expire_date=$request->expire_date;
        $budac->last_expire=$request->last_expire;
        $budac->breaking_date=$request->breaking_date;
        $f= $budac->save();
        if($f)
        {
            return Redirect::back()->withErrors(['msg' => 'successfully insert !']);
        }
        else
        {

            return Redirect::back()->withErrors(['msg' => 'Data not insert !']);
        }




    }

     public function viewfdr()

        {

           return view('backend.admin.FDR_Management.view_fdr');

        }


    public function fdrprint()
    {
           $r=Fdr::all();
           $company = CompanySettings :: find(1);

           $pdf = new \Mpdf\Mpdf();

             $content=view('backend.admin.FDR_Management.fdr_download',['company'=>$company,'fdr'=>$r]);

           $pdf -> WriteHtml($content);
           $pdf -> output('fdr total.pdf','D');

    }

   public function fdrsearch(Request $request)
   {
    //$id= $request->id;
    //$r=Fdr::paginate(2);

     $users = DB::table('fdrs')
                      ->where('fdr_number',$request->fdr_number)
                    ->get();

     //session()->put('num',$id);

      return view('backend.admin.FDR.view_fdr')->with('fdr',$users);


   }

   public function fdr_datasource(Request $request)
   {

    $query = Fdr::orderBy('id','DESC');

    $columns = array(
        0 => 'id',
        1 =>'bank_name',
        2 => 'fdr_number',
        3 => 'fdr_amount',
        4 => 'creat_date',
        5 =>'interest_rate',
        6 =>'fdr_braeak'

    );


    $totalData = $query->count();
    $limit = $request->input('length') > 0 ? $request->input('length') : 10;
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if(empty($request->input('search.value')))
    {
         $totalFiltered = $query->count();
         $records = $query->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
    }
    else
    {
        $search = $request->input('search.value');
         $query->where(function ($query) use ($search){
            $query ->orWhere('fdr_number','like',"%{$search}%")
            ->orWhere('fdr_amount','like',"%{$search}%");

         });

        $totalFiltered = $query->count();
        $records =   $query->offset($start)
                        ->limit($limit)
                        ->orderBy($order, $dir)
                        ->get();

   }

   $data = array();

   if($records){

    foreach($records as $r)
    {



        $nestedData['id'] = $r->id;
        $nestedData['bank_name'] = $r->bank_name;
        $nestedData['fdr_amount'] = $r->fdr_amount;
        $nestedData['fdr_number'] = $r->fdr_number;
        $nestedData['creat_date'] = $r->creat_date;
        $nestedData['interest_rate'] =($r->interest_rate / 100) * $r->fdr_amount;

        $nestedData['fdr_braeak'] =$create_at_difference=Carbon::createFromTimestamp(strtotime($r->expire_date))->diff(\Carbon\Carbon::now())->days."days left";



        $data[] = $nestedData;
    }
}

$json_data = array(
    "draw"          => intval($request->input('draw')),
    "recordsTotal"  => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"          => $data
);

echo json_encode($json_data);




}

public function pffdr()
{
   // return "pfdr";
    return view('backend.admin.pf_contribution.p_fdr');
}
public function store(Request $request)
{
   // return $request;
    $banks = Bank :: all();

     if($request->month==1)
     {
         
       $allmonth=PFRecord::where('year',$request->year)
        ->sum('p_f_amount');
        $month=1;
        return view('backend.admin.pf_contribution.pf_view',['allmonthvalue'=>$allmonth,'year'=>$request->year,'month'=>$month,'bank'=>$banks]);

     }
     else
     {
         
        $monthwise=DB::table('p_f_records')
        ->where('year',$request->year)

        ->where('month',$request->month)
        ->sum('p_f_amount');
        return view('backend.admin.pf_contribution.pf_view',['allmonthvalue'=>$monthwise,'year'=>$request->year,'month'=>$request->month,'bank'=>$banks]);

     }
     
  
   
}
public function pffdrcreate(Request $request)
{
   // return $request;

  //  PFFdr::

    $fdr_create=new PFFdr;
    $fdr_create->start_date=$request->start_date;
    $fdr_create->end_date=$request->end_date;
    $fdr_create->fdr_amount=$request->fdr_amount;
    $fdr_create->status=0;
    $fdr_create->month=$request->month;
    $fdr_create->year=$request->year;
    $fdr_create->fdr_no=$request->fdr_number;
    $fdr_create->bank_name=$request->bankname;
    $fdr_create->brance_name=$request->brance;

    $fdr_create->save();
    
    return redirect() -> route('pfdr.index');
              


}

public function pffdrindex()
{
   $pfdr=PFFdr::get();
    return view('backend.admin.pf_contribution.p_index',['confirm'=>$pfdr]);
}

public function adjust($fdr_no)
{
   // return $fdr_no;
     $pf=PFFdr::where('fdr_no',$fdr_no)->first();
   // $date = "2016-04-22";
     $createdAt = Carbon::parse($pf->start_date);
     
   // return $pf->start_date->event_start_date;
     // $datework = Carbon::createFromFormat('y/m/d',$pf->start_date);
      $now = Carbon::now();
      $testdate = $createdAt->diffInYears($now);

    $startday = Carbon::createFromDate($pf->start_date);
    $endday = $pf->end_date;
    $date_duration = $startday->diffInYears($endday);
    if($testdate!=$date_duration)
    {
        return redirect() -> route('pfdr.index');
    }
    else
    {
       // return "setup";
        $allpf=ProvidentFundContribution::where('month',$pf->month)
        ->where('year',$pf->year)
        ->get();
        foreach($allpf as $allpfs)
        {
          
                 $totalinterest=$date_duration*5;
                 $interest_value_pf=($totalinterest/100)*$pf->fdr_amount;
                 $interest_value=($allpfs->pf_amount*$interest_value_pf)/$pf->fdr_amount;
                 $pfrecord=PFRecord::where('employee_id',$allpfs->employee_id)
                 ->where('month',$pf->month)
                 ->where('year',$pf->year)
                 ->update(['interest_value'=>$interest_value]);

                 $pfrecord=PFFdr::where('month',$pf->month)
                 
                 ->where('year',$pf->year)
                 ->update(['status'=>1]);
               
    
        }
      //  session()->put('key',1);
        
        return Redirect::back();

    }

   


}

public function pffdrprint($fdr_no)
{
   $record=PFFdr::where('fdr_no',$fdr_no)->first();
   $recordall=PFRecord::where('month',$record->month)
   ->where('year',$record->year)
   ->get();
   $company = CompanySettings :: find(1);

           $pdf = new \Mpdf\Mpdf();

             $content=view('backend.admin.pf_contribution.p_fdrprint',['company'=>$company,'fdr'=>$recordall,'fdr_no'=>$fdr_no,'bankname'=>$record->bank_name,'fdr_amount'=>$record->fdr_amount,'enddate'=>$record->end_date,'month'=>$record->month,'year'=>$record->year]);

           $pdf -> WriteHtml($content);
           $pdf -> output('ProvedentFund.pdf','D');

}



}
