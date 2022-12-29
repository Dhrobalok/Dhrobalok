<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePFContributionRate extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','pf_contribution_rate','contributed_amount'];
}
