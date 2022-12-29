<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surve extends Model
{
    use HasFactory;
    protected $fillable = ['q_id','value','item_id','user_id','surve_id'];
}
