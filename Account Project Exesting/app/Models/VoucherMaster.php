<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoucherStatus;
use App\Models\Logger;
use App\Models\Approve;
use App\Models\TransactionMethods;
use App\Models\Employee;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\ChequeBookPage;
use App\Models\ChartOfAccount;
use App\Models\VoucherType;
class VoucherMaster extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'voucher_no', 'date','vendor_id','customer_id','posted_by', 'submitted_by', 'status', 'transaction_coa_account', 'transaction_method_id', 'cheque_no'];
   
    public function transaction_account()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'transaction_coa_account');
    }
    public function voucher_details()
    {
        return $this->hasMany(VoucherDetails::class);
    }
    public function voucher_logs()
    {
        return $this -> hasMany(Logger :: class,'voucher_master_id')->orderBy('id','desc');
    }
  

    public function transaction_method()
    {
       return $this -> belongsTo(TransactionMethods :: class);
    }
    public function submitted_by_info()
    {
        return $this -> belongsTo(Employee :: class,'submitted_by');
    }
    public function posted_by_info()
    {
        return $this -> belongsTo(Employee :: class,'posted_by');
    }
    public function vendor()
    {
        return $this -> belongsTo(Vendor :: class,'vendor_id');
    }
    public function customer()
    {
        return $this -> belongsTo(Customer :: class,'customer_id');
    }
    public function cheque()
    {
        return $this -> belongsTo(ChequeBookPage :: class,'cheque_no');
    }
    public function voucher_type()
    {
        return $this -> belongsTo(VoucherType :: class,'type');
    }
    public function getApprovers()
    {
        return $this -> hasMany(Approve :: class,'voucher_master_id');
    }
}
