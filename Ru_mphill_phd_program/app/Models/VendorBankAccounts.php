<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;
class VendorBankAccounts extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id','bank_id','account_number'];

    public function bankinfo()
    {
        return $this -> belongsTo(Bank :: class,'bank_id');
    }
}
