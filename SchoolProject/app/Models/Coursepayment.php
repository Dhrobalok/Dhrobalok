<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursepayment extends Model
{
    use HasFactory;

    public function username()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function CourseName()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
