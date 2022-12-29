<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $modules=
    //     [
    //       'super admin',
    //       'admin',
    //       'user',

    //     ];
    //     foreach ($modules as $module) {
    //         Role::create(['name'=>$module]);
    //    }

        // Role::create(['name'=>$module]);
  
        $permissions = [
            'view',
            'add',
            'edit',
            'delete',
        ];
          

        // $modules = DB::table('modules')->get();        

        
            foreach($permissions as $permission)
             {      
                Permission::create(['name' => $permission]);
            }
        
    }
}