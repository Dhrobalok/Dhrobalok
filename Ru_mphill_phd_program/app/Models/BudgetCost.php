<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetCost extends Model
{
    use HasFactory;
    protected $fillable = ['budget_id', 'cost', 'status'];

}
