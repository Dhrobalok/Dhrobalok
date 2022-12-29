<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSetup extends Model
{
    use HasFactory;
    protected $fillable = ['salary_accounts','provident_fund_accounts','pension_accounts','house_build_loans_accounts','gratuity_accounts'];
}
