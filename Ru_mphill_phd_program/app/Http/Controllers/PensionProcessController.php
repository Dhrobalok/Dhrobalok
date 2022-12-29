<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PensionProcess;
use App\Models\PensionUser;
use App\Models\PayscaleDetails;
use App\Models\PensionProcessEmployee;
use App\Models\CompanySettings;
use NumberToWords\NumberToWords;
use App\Models\User;
use Auth;

/**
 * This controller is only for generating and viewing generated pension.
 */
class PensionProcessController extends Controller
{
    public function index(){
        /**
        * This function is used for fetching all generated pensions.
        * @param Required no parameters
        * @return Return a view object with a list of pensions        
        */
        $generated_pensions = PensionProcess:: orderBy('process_date','desc') -> get();
        return view('backend.admin.pension_process.index', compact('generated_pensions'));
    }

    public function generate(){
         /**
        * This function is used for generating pensions.
        * @param Required pension entry id, year and month selected during generation  
        * @return Return NULL; But redirect to the index page of pension generation section.     
        */
        $company = CompanySettings :: find(1);
        $users = PensionUser  :: where('status',1) -> get();
        return view('backend.admin.pension_process.generate',['company' => $company,'users' => $users]);
    }

    public function generateConfirm(Request $request)
    {
         $operation_mode = $request -> mode;
         $month = $request -> month;
         $year = $request -> year;
         $company = CompanySettings :: find(1);
         $bonus = $request -> bonus;

         $current_employee = User :: find(Auth :: user() -> id) -> employeeInfo;
         $users = PensionUser :: orderBy('id','asc')
                       ->where('status',1)
                       ->get();
         $basic_pension_total = $users -> sum('basic_pension_amount');
         $health_allowance_total = $users -> sum('health_fee');
         $bonus_total = array_sum($bonus);
         $grand_total = $basic_pension_total
         + $health_allowance_total
         + $bonus_total;

         if($request -> ajax())
         {
            $pension_process = new PensionProcess([
                'process_date' => now(),
                'process_by' => $current_employee -> id,
                'total_amount' => $grand_total,
                'year' => $year,
                'month' => $month,
            ]);
            $pension_process -> save();

            for($i = 0; $i < count($users); $i++)
            {
                PensionProcessEmployee :: create([
                   'pension_user_id' => $users[$i] -> id,
                   'pension_process_id' => $pension_process -> id,
                   'basic_pension_amount' => $users[$i] -> basic_pension_amount,
                   'pension_basic_pay' => $users[$i] -> last_basic_pay,
                   'health_fee' => $users[$i] -> health_fee,
                   'bonus' => $bonus[$i],
                   'total_amount' => $users[$i] -> basic_pension_amount + $users[$i] -> health_fee + $bonus[$i],
                   'status' => 0
                ]);
            }

            return 'Pension sheet generated successfully';
         }
         else
         {
            
             $Inwords = new NumberToWords();
             $Inwords = $Inwords->getNumberTransformer('en');
             $Inwords = $Inwords->toWords($grand_total);
             $message = 'Pre-generated';
             $content = view('backend.admin.reports.pension.pension_generate_preview_pdf',['company' => $company,'users' => $users,'bonus' => $bonus,
                              'month' => $month,'year' => $year,'Inwords' => $Inwords,'basic_pension_total' => $basic_pension_total,
                                'health_allowance_total' => $health_allowance_total,'bonus_total' => $bonus_total,'message' => $message]);
             $pdf = new \Mpdf\Mpdf();
             $pdf -> WriteHtml($content);
             $pdf -> output('pension-sheet-'.$month.'-'.$year.'.pdf','D');
         }
    }
    public function view($id)
    {
        /**
        * This function is used for viewing a specific generated pension.
        * Note that the payscale detail id and payscale detail index shown to the user are different.
        * So the payscale detail index is derived by counting the payscale details of the payscale. 
        * @param Required one parameter called id(pension entry id)
        * @return Return a view object that contains info about the pension entry.
        */
        $pension_process = PensionProcess :: find($id);
        $company = CompanySettings :: find(1);
        return view('backend.admin.pension_process.view', compact('pension_process','company'));
    }
    public function download($id){
        
        $company = CompanySettings :: find(1);
        $pension_process  = PensionProcess :: find($id);
        $month = $pension_process -> month;
        $year = $pension_process -> year;
        $grand_total = $pension_process -> sum('total_amount');
        $Inwords = new NumberToWords();
        $Inwords = $Inwords->getNumberTransformer('en');
        $Inwords = $Inwords->toWords($grand_total);
        $content = view('backend.admin.reports.pension.pension_generate_final_pdf',['company' => $company,'Inwords' => $Inwords,'pension_process' => $pension_process]);
        $pdf = new \Mpdf\Mpdf();
        $pdf -> WriteHtml($content);
        $pdf -> output('pension-sheet-'.$month.'-'.$year.'.pdf','D');
    }
    public function markAsPaid(Request $request)
    {
       $process_detail = PensionProcessEmployee :: find($request -> detail_id);
       $process_detail -> status = 1;
       $process_detail -> save();
       return;
    }
}
