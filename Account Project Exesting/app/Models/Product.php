<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductTaxes;
use App\Models\ChartOfAccount;
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name','product_type','price','cost','account_receivable','account_payable',
    'internal_reference','bar_code','product_image'];

    public function taxes()
    {
        return $this -> hasMany(ProductTaxes :: class,'product_id');
    }
    public function income_account()
    {
       return $this -> belongsTo(ChartOfAccount :: class,'account_receivable');
    }
    public function expense_account()
    {
       return $this -> belongsTo(ChartOfAccount :: class,'account_payable');
    }
}
