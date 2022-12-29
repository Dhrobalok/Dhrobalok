<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model 
{
    protected $table = 'adminapprov';
    protected $fillable = [
        'name', 'email','password','image','t_id',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}
