<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChequeBookPage;
use App\Models\Bank;
use App\Http\Controllers\ChequeBookStatus;
class ChequeBook extends Model
{
    use HasFactory;

    public function cheque_pages()
    {
        return $this -> hasMany(ChequeBookPage :: class);
    }

    public function bank()
    {
        return $this -> belongsTo(Bank :: class,'bank_id','id');
    }
    public function account()
    {
        return $this -> belongsTo(ChartOfAccount :: class,'account_no','id');
    }
    public function get_cheque_no()
    {
        return $this->hasMany(ChequeBookPage :: class)
                   ->where('status',ChequeBookStatus :: Active)
                   ->orderBy('id','ASC')
                   ->limit(1);
    }
}
