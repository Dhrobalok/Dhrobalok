<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examresult extends Model
{
    use HasFactory;
    protected $fillable=['course_id','batch','s_id','mark'];

    public function student_name()
    {
        return $this->hasOne('App\Models\User','id','s_id');
    }

    public function course_name()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
