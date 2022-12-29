<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundtransfer extends Model
{
    use HasFactory;
    protected $fillable = ['from_id','to_id','amount','description'];
}
