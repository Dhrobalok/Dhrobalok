<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChartOfAccount;
class VoucherDetails extends Model
{
    use HasFactory;

    protected $fillable = ['voucher_master_id', 'coa_id', 'description', 'debit_amount', 'credit_amount'];

    public function voucher_masters()
    {
        return $this->belongsTo(VoucherMaster::class);
    }

    public function chart_of_account()
    {
        return $this->belongsTo(ChartOfAccount :: class,'coa_id','id');
    }

    public function coaInfo()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'coa_id');
    }
}
