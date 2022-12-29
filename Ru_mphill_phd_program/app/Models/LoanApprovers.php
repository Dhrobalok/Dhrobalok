<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LoanApprovers extends Model
{
    use HasFactory;
    
    public function user_info()
    {
        return $this -> belongsTo(User :: class,'user_id','id');
    }
}
