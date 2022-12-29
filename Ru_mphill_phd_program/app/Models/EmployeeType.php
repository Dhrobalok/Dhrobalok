<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class EmployeeType extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this -> hasMany(Employee :: class,'user_id','id');
    }
}
