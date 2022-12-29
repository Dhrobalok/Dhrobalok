<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Grade;
use App\Models\PayScale;

class GratuityUser extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','retd_date','gratuity_date','grade_id', 'payscale_id', 'payscale_detail_id', 'last_basic_pay','status'];

    public function getEmployee()
    {
        return $this -> belongsTo(Employee :: class,'employee_id');
    }
    public function getGrade()
    {
        return $this -> belongsTo(Grade :: class,'grade_id');
    }
    public function getPayScale()
    {
        return $this -> belongsTo(PayScale :: class,'payscale_id');
    }
}
