<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    public function discount_course()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }

    public function discount_user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
