<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Role as RoleInterface;
use Spatie\Permission\Models\Role as RoleModel;
use Illuminate\Database\Eloquent\Model;

class Role extends RoleModel implements RoleInterface
{
    use HasFactory;
}
