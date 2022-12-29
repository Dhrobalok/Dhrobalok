<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostCenterType;
use App\Models\ChartOfAccount;

class CostCenter extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','code','type_id'];
    
    public function type()
    {
        return $this -> belongsTo(CostCenterType :: class,'type_id');
    }
    public function getCostAccounts()
    {
        return $this -> hasMany(ChartOfAccount :: class,'cost_center_id');
    }
}
