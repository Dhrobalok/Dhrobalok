<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    public function coursename()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
