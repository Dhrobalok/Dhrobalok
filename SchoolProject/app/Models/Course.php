<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['category_id'];
    public function category_name()
    {
        return $this->hasOne('App\Models\Coursecategore','id','category_id');
    }


    public function payment_c()
    {
        return $this->hasOne('App\Models\Payment','course_id','id');
    }



}
