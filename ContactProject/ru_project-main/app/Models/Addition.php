<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    use HasFactory;
    protected $fillable = ['officeid','salary_id','SRINDEX','designat','from','to','mobile','email','adress'];
}
