<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursecontent extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function course_content()
    {
        return $this->hasOne('App\Models\Course','id','name');
    }


}
