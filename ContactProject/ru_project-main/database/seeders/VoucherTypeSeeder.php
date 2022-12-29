<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voucher_types')->insert([
            'description' => 'Debit Voucher',
            'code' => 'DV',
        ]);
        DB::table('voucher_types')->insert([
            'description' => 'Expenditure',
            'code' => 'EXV',
        ]);
        DB::table('voucher_types')->insert([
            'description' => 'Transfer Voucher',
            'code' => 'TRV',
        ]);
        DB::table('voucher_types')->insert([
            'description' => 'Credit Voucher',
            'code' => 'CV',
        ]);
    }
}
