<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertime extends Model
{
    use HasFactory;

    public function usertime_id()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
