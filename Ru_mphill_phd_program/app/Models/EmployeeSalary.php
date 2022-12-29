<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\SalaryGenerate;
class EmployeeSalary extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this -> belongsTo(Employee :: class);
    }
    
    public function generate_info()
    {
        return $this -> belongsTo(SalaryGenerate :: class,'salary_generate_id');
    }
    public function details()
    {
        return $this -> hasMany(EmployeeSalaryDetails :: class,'employee_salary_id');
    }
}
