<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\PayScale;
use App\Models\Employee;

class PensionUser extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'retd_date', 'pension_start_date', 'status', 'total_service_year', 'grade_id', 'payscale_id', 'payscale_detail_id', 'last_basic_pay', 'percentage_basic_pay', 'basic_pension_amount', 'health_fee'];

    public function getGrade()
    {
        return $this -> belongsTo(Grade :: class,'grade_id');
    }
    public function getPayScale()
    {
        return $this -> belongsTo(PayScale :: class,'payscale_id');
    }
    public function getEmployee()
    {
        return $this -> belongsTo(Employee :: class,'employee_id');
    }
}
