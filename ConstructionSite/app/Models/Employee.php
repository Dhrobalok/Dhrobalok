<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeType;
use App\Models\User;
use App\Models\SegmentWiseSalaryDistribution;
use App\Models\EmployeeSalary;
use App\Models\FestivalBonus;
use App\Models\Grade;
use App\Models\ProvidentFundLoan;
use App\Models\ProvidentFundContribution;
use App\Models\HouseBuildingLoan;
use App\Models\TrackLoanPayment;
use App\Models\EmployeePFContributionRate;
use App\Models\EmployeeContactAddress;
use App\Models\EmployeeEmergencyContact;
use App\Models\EmployeeAcademicDetail;
use App\Models\EmployeePreviousWorkingExperienceDetail;
use App\Models\Bank;
use App\Models\EmploeyeeDivision;
use App\Models\EmploeyeeSection;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['email','name','description','address','mobile_no','employee_photo','payslip','company_type','employee_id'
                        ];

    public function department()
    {
        return $this -> belongsTo(Department :: class,'department_id');
    }
    public function designation()
    {
        return $this -> belongsTo(Designation :: class);
    }
    public function type()
    {
        return $this -> belongsTo(EmployeeType :: class);
    }

    public function user_info()
    {
        return $this -> belongsTo(User :: class,'roll');
    }

    public function has_basic_loan()
    {
        return $this -> hasOne(Loan :: class)
                     ->where('loan_type_id',1)
                     ->where('status',1);

    }
    public function has_home_loan()
    {
        return $this -> hasOne(HouseBuildingLoan :: class,'employee_id')
                     ->where('status',4);


    }
    public function getMonthlyEMI()
    {
        return $this -> hasOne(TrackLoanPayment :: class,'employee_id')
                        ->orderBy('id','asc')
                        ->where('status',0);
    }
    public function payScale()
    {
        return $this -> hasOne(EmployeePayScale :: class)
                     ->where('status',1);
    }
    public function segment_wise_amount()
    {
        return $this -> hasMany(SegmentWiseSalaryDistribution :: class,'employee_id','id')
                        ->where('status',1)
                        ->orderBy('salary_segment_id');

    }
    public function payslips()
    {
        return $this -> hasMany(EmployeeSalary :: class,'employee_id')
                     ->orderBy('id','desc');
    }
    public function hasBonus()
    {
        return $this -> hasOne(FestivalBonus :: class)
                      ->where('status',1);
    }
    public function hasLoan()
    {
        return $this -> hasOne(HouseBuildingLoan :: class)
                        ->where('status','!=',0);
    }
    public function all_provident_loans()
    {
        return $this -> hasMany(ProvidentFundLoan :: class)
                      ->orderBy('date','desc');
    }

    public function provident_contribution()
    {
        return $this -> hasMany(ProvidentFundContribution :: class)
                     ->orderBy('id','desc');

    }
    public function getEmployeePFAmount()
    {
        return $this -> hasOne(EmployeePFContributionRate :: class,'employee_id');
    }
    public function previousPFContributions()
    {
        return $this -> hasMany(ProvidentFundContribution :: class,'employee_id')
                        ->orderBy('date','desc');
    }
    public function getAddress()
    {
        return $this -> hasMany(EmployeeContactAddress :: class,'employee_id');
    }
    public function getEmergencyContact()
    {
        return $this -> hasOne(EmployeeEmergencyContact :: class,'employee_id');
    }
    public function getAcademicRecords()
    {
        return $this -> hasMany(EmployeeAcademicDetail :: class,'employee_id');
    }
    public function getPreviousWorkingExperiences()
    {
        return $this -> hasMany(EmployeePreviousWorkingExperienceDetail :: class,'employee_id');
    }
    public function getBankName()
    {
        return $this -> belongsTo(Bank :: class,'bank_id');
    }
    public function getDivisionName()
    {
        return $this -> belongsTo(EmployeeDivision :: class,'division_id');
    }
    public function getSectionName()
    {
        return $this -> belongsTo(EmployeeSection :: class,'section_id');
    }
}
