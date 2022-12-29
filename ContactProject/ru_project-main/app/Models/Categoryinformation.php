<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoryinformation extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','officename','officeno','cell_no','email'];
}
