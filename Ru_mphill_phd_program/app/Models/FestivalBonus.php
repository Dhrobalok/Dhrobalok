<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Festival;
class FestivalBonus extends Model
{
    use HasFactory;
    protected $fillable = ['festival_id','employee_id','bonus_percentage','status'];
    public function getFestival()
    {
        return $this -> belongsTo(Festival :: class,'festival_id');
    }
}
