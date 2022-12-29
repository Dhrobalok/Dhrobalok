<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use HasFactory;

    protected $fillable = [
        'module_id',
    ];

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
}
