<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'dbuid','salaryID','fullNameNew','Designation','emaill','mobile_no','office_address','SRINDEX','dept_code','dept_name'
    ];
}

