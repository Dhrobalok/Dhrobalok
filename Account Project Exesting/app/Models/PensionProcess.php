<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\PensionProcessEmployee;

class PensionProcess extends Model
{
    use HasFactory;
    protected $fillable = ['process_date', 'total_amount', 'process_by', 'pension_date', 'year', 'month'];

    public function getEmployee()
    {
        return $this -> belongsTo(Employee :: class,'process_by');
    }
    public function processDetails()
    {
        return $this -> hasMany(PensionProcessEmployee :: class,'pension_process_id');
    }
}
