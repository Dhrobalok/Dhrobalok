<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\PayScaleDetails;
use App\Models\ProvidentFundRule;
class PayScale extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this -> belongsTo(Grade :: class);
    }
    public function details()
    {
        return $this -> hasMany(PayScaleDetails :: class);
    }
    public function getProvidentRule()
    {
        return $this -> hasOne(ProvidentFundRule :: class,'payscale_id','id');
    }
}
