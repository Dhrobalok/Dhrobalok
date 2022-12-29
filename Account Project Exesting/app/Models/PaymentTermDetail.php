<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTermDetail extends Model
{
    use HasFactory;
    protected $fillable = ['payment_terms_id','due_type','amount','number_of_days','option'];
}
