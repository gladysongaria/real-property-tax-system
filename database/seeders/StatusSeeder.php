<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'status_name' => 'Active',
            ],
            [
               'status_name' => 'Inactive',
            ],
            [
               'status_name' => 'Out of Town',
            ],
            [
               'status_name' => 'Deceased',
            ],
        ]);
    }
}
