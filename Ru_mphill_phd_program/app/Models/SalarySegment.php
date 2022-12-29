<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalarySegmenType;
class SalarySegment extends Model
{
    use HasFactory;

    public function type()
    {
        return $this -> belongsTo(SalarySegmentType :: class);
    }
}
