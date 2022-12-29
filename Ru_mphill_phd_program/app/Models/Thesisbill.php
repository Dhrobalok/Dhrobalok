<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesisbill extends Model
{
    use HasFactory;
    protected $fillable = ['name','designation','adress','course','session','student_id','title','principal_money','cosupervisor_money','supervisor_money','submission_date','e_s',
'c_examcomite','taka','teacher_name','section_officer','accountid','secretary','director'
];
}
