<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class ProvidentFundLoan extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'loan_amount', 'date', 'status'];

    public function employee()
    {
        return $this -> belongsTo(Employee :: class);
    }

}
