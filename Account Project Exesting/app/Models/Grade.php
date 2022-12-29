<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PayScale;
class Grade extends Model
{
    use HasFactory;

    public function payscales()
    {
        return $this -> hasMany(PayScale :: class);
    }
}
