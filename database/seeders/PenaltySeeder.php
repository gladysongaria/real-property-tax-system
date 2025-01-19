<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenaltySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penalties')->insert([
            [
                'term' => 1973,
                'jan' => 12,
                'feb' => 12,
                'mar' => 12,
                'apr' => 12,
                'may' => 12,
                'jun' => 12,
                'jul' => 12,
                'aug' => 12,
                'sept' => 12,
                'oct' => 12,
                'nov' => 12,
                'dec' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'term' => 2023,
                'jan' => 26,
                'feb' => 28,
                'mar' => 30,
                'apr' => 32,
                'may' => 34,
                'jun' => 36,
                'jul' => 38,
                'aug' => 40,
                'sept' => 42,
                'oct' => 44,
                'nov' => 46,
                'dec' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
