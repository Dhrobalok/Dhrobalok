<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable=['course_id'];

    public function course_name()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
