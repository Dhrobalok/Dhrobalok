<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suparadmin extends Model
{
    protected $table = 'signature';

    protected $fillable = [
           'session', 'semester', 'image', 
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

