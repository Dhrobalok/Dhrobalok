<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,HasRoles;
    protected $fillable=['name','email','password','p_no','year','status'];

    public function category_name()
    {
        return $this->hasOne('App\Models\Coursecategore','id','category');
    }

    public function course_id()
    {
        return $this->hasOne('App\Models\Course','id','course');
    }

    public function payment_m()
    {
        return $this->hasOne('App\Models\Payment','id','course');
    }

    // public function role_id()
    // {
    //     return $this->hasOne('Spatie\Permission\Models\Model_Has_Role','model_id','id');
    // }



}
