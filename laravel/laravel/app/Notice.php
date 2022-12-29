<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'file';
    protected $fillable = [
        'id', 'title','file','date',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}