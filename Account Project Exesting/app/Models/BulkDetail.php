<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkDetail extends Model
{
    use HasFactory;
    protected $fillable = ['agreement_id','quantity','quantity_sign','total_pay'];
}
