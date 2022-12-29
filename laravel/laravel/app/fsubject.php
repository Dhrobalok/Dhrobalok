<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fsubject extends Model
{
    protected $table = 'failsubject';

    protected $fillable = [
        'session','roll','semester','course','examname',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

