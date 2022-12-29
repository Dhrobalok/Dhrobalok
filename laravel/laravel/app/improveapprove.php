<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class improveapprove extends Model
{
    protected $table = 'improveaprove';

    protected $fillable = [
        'session', 'roll', 'semester','course','examname','image',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}

