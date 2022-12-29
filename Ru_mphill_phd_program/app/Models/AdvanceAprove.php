<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceAprove extends Model
{
    use HasFactory;
    protected $fillable = ['budget_id','total_cost','status','aprovce_status'];
}
