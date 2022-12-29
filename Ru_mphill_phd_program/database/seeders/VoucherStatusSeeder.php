<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_status')->insert([
            'id' => 0,
            'name' => 'Rejected',
        ]);
        DB::table('voucher_status')->insert([
            'id' => 1,
            'name' => 'Posted',
        ]);
        DB::table('voucher_status')->insert([
            'id' => 2,
            'name' => 'Approved',
        ]);
        DB::table('voucher_status')->insert([
            'id' => 3,
            'name' => 'Generated',
        ]);
    }
}
