<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registraion extends Model
{
    protected $table = 'examregistration';

    protected $fillable = [
                'examname',
                    'name',
                    'dob',
                    'fn',
                    'mn',
                    'halname',
                    'roll',
                    'regno',
                    'session',
                    'semester',
                    'title',
                    'code',
                    'vname',
                    'post',
                    'mobile',
                    'upozila',
                    'district',
                    'image',
                    'acknowledge',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

