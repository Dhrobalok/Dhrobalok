<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentApprov extends Model
{
    protected $table = 'student';

    protected $fillable = [
       'name', 'email','password','blood','mobile','session','roll','image',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

