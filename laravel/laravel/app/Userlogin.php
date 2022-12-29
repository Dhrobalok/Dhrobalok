<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlogin extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email','password','blood','mobile','session','roll','image',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;


    
}
