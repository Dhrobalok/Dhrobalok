<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInputDetails extends Model
{
    use HasFactory;

    protected $fillable = ['voucher_master_id', 'coa_id', 'description', 'debit_amount', 'credit_amount', 'entry_date'];

    public function bank_input_masters()
    {
        return $this->belongsTo(BankInput::class);
    }
    public function chart_of_account()
    {
        return $this->belongsTo(ChartOfAccount :: class,'coa_id','id');
    }
    
}
