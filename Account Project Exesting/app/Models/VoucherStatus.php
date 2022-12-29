<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherStatus extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    protected $table = 'voucher_status';
}
