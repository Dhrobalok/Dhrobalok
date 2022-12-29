<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\PayScale;
use App\Models\PayScaleDetails;
use App\Models\Employee;
class EmployeePayScale extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this -> belongsTo(Grade :: class);
    }
    public function payscale()
    {
        return $this -> belongsTo(PayScale :: class);
    }
    public function payscale_detail()
    {
        return $this -> belongsTo(PayScaleDetails :: class,'payscale_details_id','id');
    }
    public function employee()
    {
        return $this -> belongsTo(Employee :: class);
    }
    public function getProvidentRule()
    {
        return $this -> hasOne(ProvidentFundRule :: class,'payscale_id');
    }
}
