<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccountCategory;

class ChartOfAccount extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','general_code', 'company_code', 'category_id', 'cost_center_id'];
    
    public function get_children()
    {
        return $this -> hasMany('App\Models\ChartOfAccount','parent_id','id');
    }
    public function account_category()
    {
        return $this -> belongsTo(AccountCategory :: class,'category_id');
    }

}
