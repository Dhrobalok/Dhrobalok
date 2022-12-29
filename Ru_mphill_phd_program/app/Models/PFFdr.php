<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class PFFdr extends Model

{

    use HasFactory;

    protected $fillable = ['start_date','end_date','month','year','status','fdr_amount','fdr_no','bank_name','brance_name'];

}

