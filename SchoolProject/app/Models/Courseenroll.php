<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courseenroll extends Model
{
    use HasFactory;

    public function course_id()
    {
        return $this->hasOne('App\Models\Course','id','course');
    }

    public function s_name()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function payment_m()
    {
        return $this->hasOne('App\Models\Payment','id','course');
    }

    public function discount()
    {
        return $this->hasOne('App\Models\Discount','id','course');
    }
}
