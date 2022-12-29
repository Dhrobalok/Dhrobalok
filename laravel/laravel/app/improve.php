<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class improve extends Model
{
    protected $table = 'studentimprove';

    protected $fillable = [
        'session','roll','semester','course','examname',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

