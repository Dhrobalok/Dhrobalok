<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classalocate extends Model
{
    protected $table = 'coursealocate2';

    protected $fillable = [
        'course','tid','semester','session',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}
