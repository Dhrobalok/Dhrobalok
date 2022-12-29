<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetAllocation extends Model
{
    use HasFactory;
    protected $fillable = ['coa_id','max_usable_amount','remaining_amount','status','year','allocation_type'];

    public function account()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'coa_id');
    }
}
