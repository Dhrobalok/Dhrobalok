<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Str;
use App\Models\Bank;
use App\Models\ChartOfAccount;
use App\Models\Customer;
use App\Models\CustomerContactsAddress;
use App\Models\CustomerBankAccounts;

class CustomerController extends Controller
{
    public function index()
    {
        $customers  = Customer :: all();
        return view('backend.admin.sales.customers.index',['customers' => $customers]);
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
        return view('backend.admin.sales.customers.create',['countries'=> $countries,'accounts' => $accounts]);
    }
    public function store(Request $request)
    {

        // return $request;
        $customer_name = $request -> customer_name;
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
        $customer_photo = $request -> file('customer_photo');
        $customer_photo_url = NULL;

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



        if($customer_photo)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($customer_photo -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'customer_photos/';
            $image_url = $upload_path.$image_full_name;
            $customer_photo -> move($upload_path,$image_full_name);
            $customer_photo_url = $image_url;
        }

        $customer = Customer :: create([
            'name' => $customer_name,
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
            'photo_url' => $customer_photo_url
        ]);

    if($contacts_names)
    {
           for($i = 0; $i < count($contacts_names); $i++)
        {
            CustomerContactsAddress :: create([

                 'customer_id' => $customer -> id,
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
            CustomerBankAccounts :: create([
                'customer_id' => $customer -> id,
                'bank_id' => $banks_ids[$i],
                'account_number' => $account_number[$i]
            ]);
        }
    }
        return redirect() -> route('admin.sales.customers.index')->with('success-message','New customer added successfully');
}

    public function view($customer_id)
    {
        $customer = Customer :: find($customer_id);
       return view('backend.admin.sales.customers.view',['customer' => $customer]);
    }

    public function edit($customer_id)
    {
        $customer = Customer :: find($customer_id);
        $countries_unsorted = countries();
        $countries = array();
        foreach($countries_unsorted as $country)
        {
            $countries[] = $country['name'];
        }
        sort($countries,SORT_NATURAL);
        $accounts = ChartOfAccount :: all();
        $banks = Bank :: all();
        return view('backend.admin.sales.customers.edit',['customer' => $customer,'countries' => $countries,'accounts' => $accounts,'banks' => $banks]);
    }

    public function update(Request $request, $customer_id)
    {
        $customer = Customer :: find($customer_id);
        $customer_name = $request -> customer_name;
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
        $customer_photo = $request -> file('customer_photo');
        $customer_photo_url = $customer -> photo_url;

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


        if($customer_photo)
        {
            if($customer_photo_url)
              File :: delete(public_path().'/'.$customer_photo_url);
            $image_name = Str :: random(20);
            $extension = strtolower($customer_photo -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'customer_photos/';
            $image_url = $upload_path.$image_full_name;
            $customer_photo -> move($upload_path,$image_full_name);
            $customer_photo_url = $image_url;
        }

        $customer -> update([
            'name' => $customer_name,
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
            'photo_url' => $customer_photo_url
        ]);

        foreach($customer -> contact_addresses as $contact_address)
            $contact_address -> delete();

        foreach($customer -> bank_accounts as $bank_account)
          $bank_account -> delete();


    if($contacts_names)
    {
        for($i = 0; $i < count($contacts_names); $i++)
        {

            CustomerContactsAddress :: create([

                 'customer_id' => $customer -> id,
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
            CustomerBankAccounts :: create([
                'customer_id' => $customer -> id,
                'bank_id' => $banks_ids[$i],
                'account_number' => $account_number[$i]
            ]);
        }
    }
        return redirect() -> route('admin.sales.customers.index')->with('success-message','Customer info updated successfully');
    }

    public function delete(Request $request)
    {
       $customer = Customer :: find($request -> customerId);
       if($customer -> photo_url)
         File ::  delete(public_path().'/'.$customer -> photo_url);

       $message = 'Customer named '.$customer -> name .' deleted successfully';
       $customer -> delete();

       return $message;
    }

    public function save_contacts(Request $request)
    {
         return view('backend.admin.sales.customers.partial-view',['request' => $request]);
    }

    public function add_bank_account()
    {
        $banks = Bank :: all();
        return view('backend.admin.sales.customers.add-bank-account',['banks' => $banks]);
    }
}
