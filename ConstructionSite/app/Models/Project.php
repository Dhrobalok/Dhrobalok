<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'lat', 'lng','image','size','price','image2','type','employeeid','locationName','city',
        'area','numbuilding','height','numberflat','numparking','lift','substation','generator','fEscape','stair'
        ,'communityhall','prayerhall','gym','description'

    ];

}
