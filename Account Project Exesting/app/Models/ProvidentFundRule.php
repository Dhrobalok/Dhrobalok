<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFundRule extends Model
{
    use HasFactory;
    protected $fillable = ['payscale_id','grade_id','min_rate_percentage','max_rate_percentage'];
}
