<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Permission as PermissionInterface;
use Spatie\Permission\Models\Permission as PermissionModel;
use Illuminate\Database\Eloquent\Model;

class Permission extends PermissionModel implements PermissionInterface
{
    use HasFactory;

    
}