<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkComission extends Model
{
    use HasFactory;
    protected $fillable = ['agreement_id','commission','vat','incometax'];
}

