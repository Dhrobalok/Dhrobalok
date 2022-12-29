<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSignature extends Model
{
    protected $table = 'coursesignature';

    protected $fillable = [
        'course','image',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

