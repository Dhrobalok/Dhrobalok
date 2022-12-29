<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerContactsAddress;
use App\Models\CustomerBankAccounts;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone_number','mobile_number','email_address','street','city','state','zip_code','country','account_receivable',
    'account_payable','tax_id','tin_id','bin_id','website','note','photo_url'];

    public function contact_addresses()
    {
        return $this -> hasMany(CustomerContactsAddress :: class,'customer_id');
    }

    public function bank_accounts()
    {
        return $this -> hasMany(CustomerBankAccounts :: class,'customer_id');
    }
}
