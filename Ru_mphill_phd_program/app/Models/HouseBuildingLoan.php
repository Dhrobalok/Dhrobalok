<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HouseBuildingLoanDetails;
use App\Models\Employee;
use App\Models\LoanApprove;
use Auth;
class HouseBuildingLoan extends Model
{
    use HasFactory;

    public function details()
    {
        return $this -> hasMany(HouseBuildingLoanDetails :: class,'loan_id','id');
    }
    public function employee_info()
    {
        return $this -> belongsTo(Employee :: class,'employee_id','id');
    }
    public function approves()
    {
        return $this -> hasMany(LoanApprove :: class,'loan_id','id')
                        ->where('status',1);
    }
    public function current_approver()
    {
        return $this -> hasOne(LoanApprove :: class,'id','loan_id')
                      ->where('user_id',Auth :: user() -> id);
    }
    
    
}
