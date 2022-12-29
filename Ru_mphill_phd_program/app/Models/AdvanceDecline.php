<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceDecline extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_id','comment'];
}
