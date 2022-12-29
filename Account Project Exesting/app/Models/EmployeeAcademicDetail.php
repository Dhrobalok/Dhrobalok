<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAcademicDetail extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','certificate_title','group','board','passing_year','institute_name','gpa'];
}
