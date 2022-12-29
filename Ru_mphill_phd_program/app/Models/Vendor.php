<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendorContactsAddress;
use App\Models\VendorBankAccounts;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone_number','mobile_number','email_address','street','city','state','zip_code','country','account_receivable',
    'account_payable','tax_id','tin_id','bin_id','website','note','photo_url'];

    public function contact_addresses()
    {
        return $this -> hasMany(VendorContactsAddress :: class,'vendor_id');
    }

    public function bank_accounts()
    {
        return $this -> hasMany(VendorBankAccounts :: class,'vendor_id');
    }
}
