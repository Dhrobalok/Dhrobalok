<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalarySegment;
use App\Models\FestivalBonus;

class Festival extends Model
{
    use HasFactory;

    public function segment()
    {
        return $this -> belongsTo(SalarySegment :: class);
    }
    public function getRelatedBonusEntries()
    {
        return $this -> hasMany(FestivalBonus :: class,'festival_id');
    }
}
