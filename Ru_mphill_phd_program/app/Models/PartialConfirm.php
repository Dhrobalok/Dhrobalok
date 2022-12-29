<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartialConfirm extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount','agree_id'
    ];
}
