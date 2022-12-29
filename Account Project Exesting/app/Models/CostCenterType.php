<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostCenter;

class CostCenterType extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function getCostCenters()
    {
        return $this -> hasMany(CostCenter :: class,'type_id');
    }
}
