<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\Bank;
use App\Models\ChartOfAccount;
use App\Models\Vendor;
use App\Models\VendorContactsAddress;
use App\Models\VendorBankAccounts;

class VendorController extends Controller
{
    public function index()
    {
        $vendors  = Vendor :: all();
        return view('backend.admin.sales.vendors.index',['vendors' => $vendors]);
    }
    public function create()
    {
        $countries_unsorted = countries();
        $countries = array();
        foreach($countries_unsorted as $country)
        {
            $countries[] = $country['name'];
        }
        sort($countries,SORT_NATURAL);
        $accounts = ChartOfAccount :: all();
        return view('backend.admin.sales.vendors.create',['countries'=> $countries,'accounts' => $accounts]);
    }
    public function store(Request $request)
    {
        $vendor_name = $request -> vendor_name;
        $street_name = $request -> street_name;
        $phone_number = $request -> phone_number;
        $city = $request -> city;
        $state = $request -> state;
        $zip_code = $request -> zip_code;
        $mobile_number = $request -> mobile_number;
        $country = $request -> country;
        $email_address = $request -> email_address;
        $tax_id = $request -> tax_id;
        $tin_id= $request -> tin_id;
        $bin_id = $request -> bin_id;
        $website_name = $request -> website;
        $account_receivable = $request-> account_receivable;
        $account_payable = $request -> account_payable;
        $internal_notes = $request -> internal_notes;
        $vendor_photo = $request -> file('vendor_photo');
        $vendor_photo_url = NULL;

        $contacts_names = $request -> contacts_names;
        $contacts_job_position = $request -> contacts_job_position;
        $contacts_email = $request -> contacts_email;
        $contacts_mobile_number = $request -> contacts_mobile_number;
        $contacts_phone_number = $request -> contacts_phone_number;
        $contacts_street = $request -> contacts_street;
        $contacts_state = $request -> contacts_state;
        $çontacts_zip_code = $request -> çontacts_zip_code;
        $çontacts_city = $request -> çontacts_city;
        $çontacts_country = $request -> çontacts_country;
        $çontacts_internal_notes = $request -> çontacts_internal_notes;
        $types = $request -> types;

        $banks_ids = $request -> bank_ids;
        $account_number = $request -> account_number;



        if($vendor_photo)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($vendor_photo -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'vendor_photos/';
            $image_url = $upload_path.$image_full_name;
            $vendor_photo -> move($upload_path,$image_full_name);
            $vendor_photo_url = $image_url;
        }

        $vendor = Vendor :: create([
            'name' => $vendor_name,
            'phone_number' => $phone_number,
            'mobile_number' => $mobile_number,
            'email_address' => $email_address,
            'street' => $street_name,
            'city' => $city,
            'state' => $state,
            'zip_code' => $zip_code,
            'country' => $country,
            'account_receivable' => $account_receivable,
            'account_payable' => $account_payable,
            'tax_id' => $tax_id,
            'tin_id' => $tin_id,
            'bin_id' => $bin_id,
            'website' => $website_name,
            'note' => $internal_notes,
            'photo_url' => $vendor_photo_url
        ]);

        if($contacts_names)
        {
            for($i = 0; $i < count($contacts_names); $i++)
           {
             VendorContactsAddress :: create([

                 'vendor_id' => $vendor -> id,
                 'name' =>  $contacts_names[$i],
                 'job_position' => $contacts_job_position[$i],
                 'phone_number' => $contacts_phone_number[$i],
                 'mobile_number' => $contacts_mobile_number[$i],
                 'email_address' => $contacts_email[$i],
                 'street' => $contacts_street[$i],
                 'city' => $çontacts_city[$i],
                 'state' => $contacts_state[$i],
                 'zip_code' => $çontacts_zip_code[$i],
                 'country' => $çontacts_country[$i],
                 'internal_notes' => $çontacts_internal_notes[$i],
                 'contacts_type' => $types[$i]

             ]);
           }
        }

       if($banks_ids)
       {
          for($i = 0; $i < count($banks_ids); $i++)
           {
             VendorBankAccounts :: create([
                'vendor_id' => $vendor -> id,
                'bank_id' => $banks_ids[$i],
                'account_number' => $account_number[$i]
             ]);
           }
       }

        return redirect() -> route('admin.sales.vendors.index')->with('success-message','New vendor added successfully');
    }

    public function view($vendor_id)
    {
        $vendor = Vendor :: find($vendor_id);
       return view('backend.admin.sales.vendors.view',['vendor' => $vendor]);
    }

    public function edit($vendor_id)
    {
        $vendor = Vendor :: find($vendor_id);
        $countries_unsorted = countries();
        $countries = array();
        foreach($countries_unsorted as $country)
        {
            $countries[] = $country['name'];
        }
        sort($countries,SORT_NATURAL);
        $accounts = ChartOfAccount :: all();
        $banks = Bank :: all();
        return view('backend.admin.sales.vendors.edit',['vendor' => $vendor,'countries' => $countries,'accounts' => $accounts,'banks' => $banks]);
    }

    public function update(Request $request, $vendor_id)
    {
        $vendor = Vendor :: find($vendor_id);
        $vendor_name = $request -> vendor_name;
        $street_name = $request -> street_name;
        $phone_number = $request -> phone_number;
        $city = $request -> city;
        $state = $request -> state;
        $zip_code = $request -> zip_code;
        $mobile_number = $request -> mobile_number;
        $country = $request -> country;
        $email_address = $request -> email_address;
        $tax_id = $request -> tax_id;
        $tin_id= $request -> tin_id;
        $bin_id = $request -> bin_id;
        $website_name = $request -> website;
        $account_receivable = $request-> account_receivable;
        $account_payable = $request -> account_payable;
        $internal_notes = $request -> internal_notes;
        $vendor_photo = $request -> file('vendor_photo');
        $vendor_photo_url = $vendor -> photo_url;

        $contacts_names = $request -> contacts_names;
        $contacts_job_position = $request -> contacts_job_position;
        $contacts_email = $request -> contacts_email;
        $contacts_mobile_number = $request -> contacts_mobile_number;
        $contacts_phone_number = $request -> contacts_phone_number;
        $contacts_street = $request -> contacts_street;
        $contacts_state = $request -> contacts_state;
        $çontacts_zip_code = $request -> çontacts_zip_code;
        $çontacts_city = $request -> çontacts_city;
        $çontacts_country = $request -> çontacts_country;
        $çontacts_internal_notes = $request -> çontacts_internal_notes;
        $types = $request -> types;

        $banks_ids = $request -> bank_ids;
        $account_number = $request -> account_number;


        if($vendor_photo)
        {
            if($vendor_photo_url)
              File :: delete(public_path().'/'.$vendor_photo_url);
            $image_name = Str :: random(20);
            $extension = strtolower($vendor_photo -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'vendor_photos/';
            $image_url = $upload_path.$image_full_name;
            $vendor_photo -> move($upload_path,$image_full_name);
            $vendor_photo_url = $image_url;
        }

        $vendor -> update([
            'name' => $vendor_name,
            'phone_number' => $phone_number,
            'mobile_number' => $mobile_number,
            'email_address' => $email_address,
            'street' => $street_name,
            'city' => $city,
            'state' => $state,
            'zip_code' => $zip_code,
            'country' => $country,
            'account_receivable' => $account_receivable,
            'account_payable' => $account_payable,
            'tax_id' => $tax_id,
            'tin_id' => $tin_id,
            'bin_id' => $bin_id,
            'website' => $website_name,
            'note' => $internal_notes,
            'photo_url' => $vendor_photo_url
        ]);

        foreach($vendor -> contact_addresses as $contact_address)
            $contact_address -> delete();

        foreach($vendor -> bank_accounts as $bank_account)
          $bank_account -> delete();


    if($contacts_names)
    {
         for($i = 0; $i < count($contacts_names); $i++)
        {

            VendorContactsAddress :: create([

                 'vendor_id' => $vendor -> id,
                 'name' =>  $contacts_names[$i],
                 'job_position' => $contacts_job_position[$i],
                 'phone_number' => $contacts_phone_number[$i],
                 'mobile_number' => $contacts_mobile_number[$i],
                 'email_address' => $contacts_email[$i],
                 'street' => $contacts_street[$i],
                 'city' => $çontacts_city[$i],
                 'state' => $contacts_state[$i],
                 'zip_code' => $çontacts_zip_code[$i],
                 'country' => $çontacts_country[$i],
                 'internal_notes' => $çontacts_internal_notes[$i],
                 'contacts_type' => $types[$i]

            ]);
        }
    }

    if($banks_ids)
    {
        for($i = 0; $i < count($banks_ids); $i++)
        {
            VendorBankAccounts :: create([
                'vendor_id' => $vendor -> id,
                'bank_id' => $banks_ids[$i],
                'account_number' => $account_number[$i]
            ]);
        }
    }
        return redirect() -> route('admin.sales.vendors.index')->with('success-message','Vendor info updated successfully');
 }

    public function delete(Request $request)
    {
       $vendor = Vendor :: find($request -> vendorId);
       if($vendor -> photo_url)
         File ::  delete(public_path().'/'.$vendor -> photo_url);

       $message = 'Vendor named '.$vendor -> name .' deleted successfully';
       $vendor -> delete();

       return $message;
    }

    public function save_contacts(Request $request)
    {
         return view('backend.admin.sales.vendors.partial-view',['request' => $request]);
    }

    public function add_bank_account()
    {
        $banks = Bank :: all();
        return view('backend.admin.sales.vendors.add-bank-account',['banks' => $banks]);
    }
}
