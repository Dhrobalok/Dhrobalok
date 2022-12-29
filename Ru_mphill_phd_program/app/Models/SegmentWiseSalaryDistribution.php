<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\SalarySegment;
class SegmentWiseSalaryDistribution extends Model
{
    use HasFactory;

    public function employee_info()
    {
        return $this -> belongsTo(Employee :: class,'employee_id','id');
    }
    public function segment()
    {
        return $this -> belongsTo(SalarySegment :: class,'salary_segment_id','id');
    }
}
