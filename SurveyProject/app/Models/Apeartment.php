<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apeartment extends Model
{
    use HasFactory;
    protected $fillable = ['size','price','lat','lag','onwer_id'];
}
