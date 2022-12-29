<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GratuityUser;
use App\Models\GratuityProcess;
use App\Models\PayscaleDetails;
use Auth;

/**
 * This controller is only for generating and viewing generated gratuities.
 */

class GratuityProcessController extends Controller
{
    public function index(){
        /**
        * This function is used for fetching all generated gratuities.
        * @param Required no parameters
        * @return Return a view object with a list of gratuities        
        */
        $gratuity_processes = GratuityProcess::all();
        return view('backend.admin.gratuity_process.index', compact('gratuity_processes'));
    }
    public function generate_preview($id){
        /**
        * This function is used for viewing the pending gratuity just before generating.
        * Note that the payscale detail id and payscale detail index shown to the user when creating payscales, are different.
        * So the payscale detail index is derived by counting the payscale details of the payscale. 
        * @param Required one parameter called id(gratuity id)
        * @return Return a view object with all details of the gratuity entry        
        */
        $user = GratuityUser::find($id);
        $payscale_details = PayscaleDetails::where('pay_scale_id', $user->payscale_id)->get();
        $payscale_detail_index = 0;
        foreach($payscale_details as $paydet)
        {
            $payscale_detail_index++;
            if($paydet->id == $user->payscale_detail_id)
                break;
        }
        return view('backend.admin.gratuity_process.generation_preview', compact('user', 'payscale_detail_index'));
    }
    public function generate(Request $request, $id){
        /**
        * This function is used for generating gratuities.
        * @param Required gratuity entry id, year and month selected during generation  
        * @return Return NULL; But redirect to the index page of gratuity generation section.     
        */
        $user = GratuityUser::find($id);
        
        $gratuity_process = new GratuityProcess([
            'gratuity_user_id' => $user->id,
            'employee_id' => $user->employee_id,
            'last_basic_pay' => $user->last_basic_pay,
            'percentage_basic_pay'=> $user->percentage_basic_pay,
            'mandatory_pf_per_tk' => $user->mandatory_pf_per_tk,
            'total_amount' => $user->total_amount,
            'year' => $request->year,
            'month' => $request->month,
        ]);
        $gratuity_process->save();

        $user->status = 1;
        $user->save();
        
        return redirect()->route('admin.gratuity-process.index');
    }
    public function view($id)
    {
        /**
        * This function is used for viewing a specific generated gratuity.
        * Note that the payscale detail id and payscale detail index shown to the user are different.
        * So the payscale detail index is derived by counting the payscale details of the payscale. 
        * @param Required one parameter called id(gratuity entry id)
        * @return Return a view object that contains info about the gratuity entry.
        */
        $gratuity_process = GratuityProcess::find($id);
        $user = GratuityUser::find($gratuity_process->gratuity_user_id);
        $payscale_details = PayscaleDetails::where('pay_scale_id', $user->payscale_id)->get();
        $payscale_detail_index = 0;
        foreach($payscale_details as $paydet)
        {
            $payscale_detail_index++;
            if($paydet->id == $user->payscale_detail_id)
                break;
        }
        return view('backend.admin.gratuity_process.view', compact('gratuity_process', 'user', 'payscale_detail_index'));
    }
    public function download(Request $request, $id){

    }
}
