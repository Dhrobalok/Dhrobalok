<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChartOfAccount;
class CashBook extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_date','voucher_id','coa_id','cash_amount','bank_amount','entry_position'];

    public function coaInfo()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'coa_id');
    }
}
