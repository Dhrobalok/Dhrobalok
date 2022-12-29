<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceVoucher extends Model
{
    use HasFactory;
    protected $fillable = ['budget_id','level_id','status','voucher_date'];

}
