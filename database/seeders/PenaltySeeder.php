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
                'term' => 1991,
                'jan' => 24,
                'feb' => 24,
                'mar' => 24,
                'apr' => 24,
                'may' => 24,
                'jun' => 24,
                'jul' => 24,
                'aug' => 24,
                'sept' => 24,
                'oct' => 24,
                'nov' => 24,
                'dec' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'term' => 2022,
                'jan' => 72,
                'feb' => 72,
                'mar' => 72,
                'apr' => 72,
                'may' => 72,
                'jun' => 72,
                'jul' => 72,
                'aug' => 72,
                'sept' => 72,
                'oct' => 72,
                'nov' => 72,
                'dec' => 72,
                'created_at' => now(),
                'updated_at' => now(),
            ],

              [
                'term' => 2023,
                'jan' => 50,
                'feb' => 52,
                'mar' => 54,
                'apr' => 56,
                'may' => 58,
                'jun' => 60,
                'jul' => 62,
                'aug' => 64,
                'sept' => 66,
                'oct' => 68,
                'nov' => 70,
                'dec' => 72,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'term' => 2024,
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
              [
                'term' => 2025,
                'jan' => 10,
                'feb' => 10,
                'mar' => 10,
                'apr' => 8,
                'may' => 10,
                'jun' => 12,
                'jul' => 14,
                'aug' => 16,
                'sept' => 18,
                'oct' => 20,
                'nov' => 22,
                'dec' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
