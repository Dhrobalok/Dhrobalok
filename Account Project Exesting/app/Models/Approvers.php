<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Approvers extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_type_id','approver_id','approve_order'];
    
    public function getInfo()
    {
        return $this -> belongsTo(User :: class,'approver_id');
    }
}
