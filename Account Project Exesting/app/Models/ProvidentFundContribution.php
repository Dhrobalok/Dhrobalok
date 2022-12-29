<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFundContribution extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'month', 'year', 'pf_amount', 'date', 'is_auto'];
}
