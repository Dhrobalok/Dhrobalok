<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BankInputDetails;
class BankInput extends Model
{
    use HasFactory;
    
    protected $fillable = ['type', 'voucher_no', 'date', 'voucher_by', 'submitted_by', 'status', 'transaction_coa_account', 'transaction_method_id', 'cheque_no'];

    public function bank_input_details()
    {
        return $this->hasMany(BankInputDetails::class);
    }
}
