<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GratuityProcess extends Model
{
    use HasFactory;
    protected $fillable = ['gratuity_user_id', 'employee_id', 'last_basic_pay', 'percentage_basic_pay', 'mandatory_pf_per_tk', 'total_amount', 'month', 'year'];
}
