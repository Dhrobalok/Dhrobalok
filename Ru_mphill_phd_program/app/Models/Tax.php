<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChartOfAccount;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = ['tax_name','tax_scope','tax_computation_type','amount','label_on_invoice','is_including_price','receivable_account','payable_account','status'];
     
}
