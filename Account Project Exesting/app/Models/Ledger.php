<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChartOfAccount;
use App\Models\VoucherDetails;
use App\Models\VoucherMaster;
use App\Models\CostCenter;

class Ledger extends Model
{
    use HasFactory;

    public function coa_info()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'coa_id','id');
    }

    public function voucher_detail()
    {
       return $this -> belongsTo(VoucherDetails :: class);
    }
    
    public function voucher()
    {
        return $this -> belongsTo(VoucherMaster :: class,'voucher_master_id');
    }
    public function getCostCenterInfo()
    {
        return $this -> belongsTo(CostCenter :: class,'cost_center_id');
    }
}
