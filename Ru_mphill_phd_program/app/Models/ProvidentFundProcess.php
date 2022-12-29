<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvidentFundProcess extends Model
{
    use HasFactory;
    protected $fillable = ['process_date', 'process_by', 'e_rate', 'c_rate', 'year','month'];
}
