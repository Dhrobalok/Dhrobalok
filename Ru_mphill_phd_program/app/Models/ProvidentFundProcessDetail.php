<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class ProvidentFundProcessDetail extends Model
{
    use HasFactory;
    

    public function employee_info()
    {
        return $this -> belongsTo(Employee :: class,'employee_id','id');
    }
}
