<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'name' => 'Account',
        ]);
        DB::table('modules')->insert([
            'name' => 'Budget',
        ]);
        DB::table('modules')->insert([
            'name' => 'Payroll',
        ]);
        DB::table('modules')->insert([
            'name' => 'Pension',
        ]);
        DB::table('modules')->insert([
            'name' => 'Provident Fund',
        ]);
        DB::table('modules')->insert([
            'name' => 'House Building Loan',
        ]);
    }
}
