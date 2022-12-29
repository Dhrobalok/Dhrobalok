<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    protected $table = 'attendence';

    protected $fillable = [
        'student_roll','attendence','course','t_id'
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}


