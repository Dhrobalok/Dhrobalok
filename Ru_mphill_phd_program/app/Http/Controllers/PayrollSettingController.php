<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PayScale;
use App\Models\ProvidentFundRule;
use App\Models\CompanySettings;
use App\Models\AccountSetup;
use Str;
class PayrollSettingController extends Controller
{
      public function index()
      {
          $pay_scales = PayScale :: all();
          $provident_rules = ProvidentFundRule :: all();
          $data = $this -> populateData();
          $company_info = CompanySettings :: find(1);
          return view('backend.admin.payroll-settings.index',['pay_scales' => $pay_scales,'provident_rules' => $provident_rules
                  ,'company_info' => $company_info,'salary_accounts' => $data[0],'pf_accounts' => $data[1],'loan_accounts' => $data[2],
                   'pension_accounts' => $data[3],'gratuity_accounts' => $data[4]]);
      }

      public function updateSettings(Request $request)
      {
         $payscales = $request -> payscales;
         $grades = $request -> grades;
         $min_rates = $request -> min_rates;
         $max_rates = $request -> max_rates;
         $company_name  = $request -> company_name;
         $company_address = $request -> company_address;
         $fiscal_year_day = $request -> day;
         $fiscal_year_month = $request -> month;
         $salary_debit_account = $request -> salary_debit_account;
         $salary_credit_account = $request -> salary_credit_account;
         $pf_contribution_ac = $request -> pf_contribution_ac;
         $pf_payable_ac = $request -> pf_payable_ac;
         $pf_contribution_bank_ac = $request -> pf_contribution_bank_ac;
         $pf_contribution_op_ac = $request -> pf_contribution_op_ac;
         $loan_given_ac = $request -> loan_given_ac;
         $interest_rec_ac = $request -> interest_rec_ac;
         $interest_income = $request -> interest_income;
         $loan_process_account = $request -> loan_process_account;
         $pension_cash_ac = $request -> pension_cash_ac;
         $pension_expense_ac = $request -> pension_expense_ac;
         $pension_liability_ac = $request -> pension_liability_ac;
         $gratuity_expense_ac = $request -> gratuity_expense_ac;
         $gratuity_payable_ac = $request -> gratuity_payable_ac;
         $gratuity_bank_ac = $request -> gratuity_bank_ac;
         $gratuity_op_bank_ac = $request -> gratuity_op_bank_ac;
         
         //Making the saved data as a string
         $salary_accounts = ''.$salary_debit_account.','.$salary_credit_account;
         $pf_accounts = ''.$pf_contribution_ac.','.$pf_payable_ac.','.$pf_contribution_bank_ac.','.$pf_contribution_op_ac;
         $loan_accounts = ''.$loan_given_ac.','.$interest_rec_ac.','.$interest_income.','.$loan_process_account;
         $pension_accounts = ''.$pension_cash_ac.','.$pension_expense_ac.','.$pension_liability_ac;
         $gratuity_accounts = ''.$gratuity_expense_ac.','.$gratuity_payable_ac.','.$gratuity_bank_ac.','.$gratuity_op_bank_ac;
         //Update the company identity & fiscal year info
          $company = CompanySettings :: find(1);
         $logo_url = $company -> company_logo;
         $image = $request -> file('company_logo');
         if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'company_logo/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $logo_url = $image_url;
            
        }
        
         $company -> update([
            'company_name' => $company_name,
            'company_address' => $company_address,
            'month' => $fiscal_year_month,
            'company_logo' => $logo_url,
            'day' => $fiscal_year_day
         ]);
         
         //Update the provident fund table with new data
         $previous_records = ProvidentFundRule :: all();
        
         //Remove all previous data and update with new one.
         foreach($previous_records as $record)
           $record -> delete();
       
         for($i = 0; $i < count($max_rates); $i++)
         {
             ProvidentFundRule :: create([
                'payscale_id' => $payscales[$i],
                'grade_id' => $grades[$i],
                'min_rate_percentage' => $min_rates[$i],
                'max_rate_percentage' => $max_rates[$i]
             ]);
         }

         //Updating the payroll related accounts settings
        
         $accountSetup = AccountSetup :: find(1);
         $accountSetup -> update([
             'salary_accounts' => $salary_accounts,
             'provident_fund_accounts' => $pf_accounts,
             'house_build_loans_accounts' => $loan_accounts,
             'pension_accounts' => $pension_accounts,
             'gratuity_accounts' => $gratuity_accounts
         ]);

      }
      public function populateData()
      {
         $accountSetup  = AccountSetup :: find(1);
         $salary_accounts = explode(",",$accountSetup -> salary_accounts);
         $pf_accounts = explode(",",$accountSetup -> provident_fund_accounts);
         $loan_accounts = explode(",",$accountSetup -> house_build_loans_accounts);
         $pension_accounts = explode(",",$accountSetup -> pension_accounts);
         $gratuity_accounts = explode(",",$accountSetup -> gratuity_accounts);
         return array($salary_accounts,$pf_accounts,$loan_accounts,$pension_accounts,$gratuity_accounts);
      }
}
