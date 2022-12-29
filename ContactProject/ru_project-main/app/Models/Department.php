<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Department extends Model
{
    use HasFactory;
    protected $fillable = ['office_code','dept_name','unit_name','SRINDEX'];

    
    
}
