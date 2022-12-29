<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'roll', 'session', 'course'];//'admission_fee','tution_fee','registration_fee','library_fee','laboratory_fee','migration_fee','seat_rate','course_work_fee','course_t_fee','others'];
}
