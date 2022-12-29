<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Approve extends Model
{
    use HasFactory;

    public function getApproverInfo()
    {
        return $this -> belongsTo(User :: class,'approver_id');
    }
}
