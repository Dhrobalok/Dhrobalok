<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_methods')->insert([
            'id' => 0,
            'name' => 'N/A',
        ]);
        DB::table('transaction_methods')->insert([
            'id' => 1,
            'name' => 'Cash',
        ]);
        DB::table('transaction_methods')->insert([
            'id' => 2,
            'name' => 'Bank',
        ]);
    }
}
