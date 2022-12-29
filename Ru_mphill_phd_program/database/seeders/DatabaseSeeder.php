<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ModuleTableSeeder::class,
            PermissionTableSeeder::class,
            VoucherStatusSeeder::class,
            VoucherTypeSeeder::class,
            TransactionMethodSeeder::class,
        ]);
    }
}
