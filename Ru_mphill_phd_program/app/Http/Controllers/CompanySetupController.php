<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySettings;
use Str;
class CompanySetupController extends Controller
{
    public function store_profile(Request $request)
    {
         $company_name = $request -> company_name;
         $company_address = $request -> company_address;
         $image = $request -> file('logo');
         $opening_date = $request -> opening_date;
         $fiscal_year_close = $request -> fiscal_year;
         $logo_url = '';

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
        
        CompanySettings :: create([
            'company_name' => $company_name,
            'company_address' => $company_address,
            'opening_date' => $opening_date,
            'fiscal_year_close' => $fiscal_year_close,
            'company_logo' => $logo_url
        ]);

        return array('success' => 'Congratulations, company information saved');
    }
}
