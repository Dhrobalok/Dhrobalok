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

        // $module=[
        //     'superadmin',
        //     'admin',
        //     'user',



        // ];

        // Product::create($request->all());
    //    $permissions = [
    //        'account-list',
    //        'account-create',
    //        'account-edit',
    //        'account-delete',
    //        'budget-list',
    //        'budget-create',
    //        'budget-edit',
    //        'budget-delete',
    //        'payroll-list',
    //        'payroll-create',
    //        'payroll-edit',
    //        'payroll-delete',
    //        'pension-list',
    //        'pension-create',
    //        'pension-edit',
    //        'pension-delete',
    //        'providentfund-list',
    //        'providentfund-create',
    //        'providentfund-edit',
    //        'providentfund-delete',
    //        'housebuildingloan-list',
    //        'housebuildingloan-create',
    //        'housebuildingloan-edit',
    //        'housebuildingloan-delete'
    //     ];
        $permissions = [
            'view',
            'add',
            'edit',
            'delete',
        ];

        $modules = DB::table('modules')->get();        

        foreach ($modules as $module) {
            foreach($permissions as $permission) {      
                Permission::create(['name' => $module->id . $permission, 'module_id' => $module->id]);
            }
        }
    }
}