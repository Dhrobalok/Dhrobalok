<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tax;
class ProductTaxes extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','tax_id'];

    public function taxinfo()
    {
        return $this -> belongsTo(Tax :: class,'tax_id');
    }
}
