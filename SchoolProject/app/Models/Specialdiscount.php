<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialdiscount extends Model
{
    use HasFactory;
    protected $fillable=['course_id'];

    public function discount_name()
    {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
