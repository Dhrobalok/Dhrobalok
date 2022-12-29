<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compane extends Model
{
    use HasFactory;
    protected $fillable = [
        'employe_id','name','logo'
    ];
}
