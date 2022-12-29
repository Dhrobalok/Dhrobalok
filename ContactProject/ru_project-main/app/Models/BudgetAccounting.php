<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetAccounting extends Model
{
    use HasFactory;
    protected $fillable = ['budget_id', 'coa_id', 'start_date', 'end_date', 'cost', 'status', 'spend'];

}
