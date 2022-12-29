<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceVouchersDetail extends Model
{
    use HasFactory;
    protected $fillable = ['budget_name','budget_id','cost','description'];

}
