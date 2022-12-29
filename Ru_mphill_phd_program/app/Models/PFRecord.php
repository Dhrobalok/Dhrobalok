<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class PFRecord extends Model

{

    use HasFactory;

    protected $fillable = ['employee_id','p_f_amount','interest_value','month','year'];

}

