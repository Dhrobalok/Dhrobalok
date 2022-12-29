<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Approvers;
class VoucherType extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'code'];
    public function getApprovers()
    {
        return $this -> hasMany(Approvers :: class,'voucher_type_id');
    }
}
