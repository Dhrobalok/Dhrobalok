<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkMaster extends Model
{
    use HasFactory;
    protected $fillable = ['agreement_id','total_amount','total_pay'];
}
