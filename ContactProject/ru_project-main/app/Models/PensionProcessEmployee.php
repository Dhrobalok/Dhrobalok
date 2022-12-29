<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PensionUser;

class PensionProcessEmployee extends Model
{
    use HasFactory;

    protected $fillable = ['pension_user_id', 'pension_process_id', 'pension_basic_pay', 'basic_pension_amount', 'health_fee','bonus','total_amount','status'];
    
    public function getPensionUser()
    {
        return $this -> belongsTo(PensionUser :: class,'pension_user_id');
    }
}
