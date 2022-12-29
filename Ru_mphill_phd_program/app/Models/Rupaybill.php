<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rupaybill extends Model
{
    use HasFactory;
    protected $fillable = ['studentid','amount','month','year','paystate','shipnum'];
}
