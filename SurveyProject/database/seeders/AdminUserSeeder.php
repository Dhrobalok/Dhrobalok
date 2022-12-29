<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'DR.Md.Ariful',
            'lastname'  => 'Haque',
            'email' => 'Ariful@ru.ac.bd',
            'password' => bcrypt('123456'),
            'status'   => 2
        ]);

    }
}
