<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkOrder extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','vender_id','agreement_name','quantity','quantity_size','each_ton','quantity_sign','adjust','net_bill'];
}
