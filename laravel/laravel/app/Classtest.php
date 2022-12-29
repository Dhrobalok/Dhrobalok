<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classtest extends Model
{
    protected $table = 'coursemark2';

    protected $fillable = [
        'roll','session','course','credit','mark','ct1','ct2','ct3','ca','besttwo','semester',
    ];

    protected $primaryKey = 'id';
    public $timestamps = false;
}
