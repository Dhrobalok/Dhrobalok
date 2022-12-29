<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySettings extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','company_address','company_logo','opening_date','fiscal_year_close'];
}
