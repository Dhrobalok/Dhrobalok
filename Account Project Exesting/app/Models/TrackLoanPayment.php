<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackLoanPayment extends Model
{
    use HasFactory;
    protected $fillable = ['loan_id','employee_id','month_no','pm_begin',
    'emi','interest','repayment','close_balance','status','pay_date','emi'];
}
