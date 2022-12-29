<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GtcPayment extends Model
{
    use HasFactory;
    protected $fillable = ['gtc_id','total_pay'];
}
