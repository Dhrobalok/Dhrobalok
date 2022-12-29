<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tnotice extends Model
{
    protected $table = 'studentnotice';

    protected $fillable = [
        'title','image',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

