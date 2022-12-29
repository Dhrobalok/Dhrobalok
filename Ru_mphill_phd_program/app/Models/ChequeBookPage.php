<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChequeBook;
class ChequeBookPage extends Model
{
    use HasFactory;
    
    public function getChequeBookInfo()
    {
        return $this -> belongsTo(ChequeBook :: class,'cheque_book_id');
    }
}
