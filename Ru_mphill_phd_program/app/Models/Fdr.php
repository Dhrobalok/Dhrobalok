<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdr extends Model
{
    use HasFactory;
    protected $fillable = [
        'year', 'fdr_amount', 'fdr_number', 'creat_date', 'bank_name', 'expire_date', 'last_expire', 'beaking_date', 'interest_rate',
    ];
}
