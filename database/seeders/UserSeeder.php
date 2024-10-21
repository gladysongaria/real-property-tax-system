<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Juan',
                'first_name' => 'Dela Cruz',
                'user_role' => 'Super_Admin',
                'username' => 'superadmin',
                'office' => 'Admin Office',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'last_name' => 'John',
                'first_name' => 'Doe',
                'user_role' => 'Admin',
                'username' => 'admin',
                'office' => 'Admin Office',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'last_name' => 'Jane',
                'first_name' => 'Doe',
                'user_role' => 'Member',
                'username' => 'member',
                'office' => 'Member Office',
                'email' => 'member@gmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
