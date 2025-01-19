<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classifications')->insert([
            [
                'classification_name' => 'Residential Building',
            ],
            [
               'classification_name' => 'Riceland with Irrigation',
            ],
                                              [
               'classification_name' => 'Commercial Building',
            ],
                                              [
               'classification_name' => 'Barangay Clinic',
            ],
                                              [
               'classification_name' => 'Fruit Land',
            ],
                                              [
               'classification_name' => 'Rootcrop Land',
            ],
                                              [
               'classification_name' => 'Residential Lot',
            ],
                                              [
               'classification_name' => 'Vegetable Land',
            ],
                                              [
               'classification_name' => 'Pinetree Land',
            ],
                                                [
               'classification_name' => 'Barangay Hall',
            ],
                                                  [
               'classification_name' => 'Cogon Land',
            ],
                                                 [
               'classification_name' => 'Agricultural Land',
            ],
                                                   [
               'classification_name' => 'Industrial ',
            ],
                                                  [
               'classification_name' => 'Commercial Lot',
            ], 
                                                    [
               'classification_name' => 'Industrial',
            ], 
                                                    [
               'classification_name' => 'Special',
            ], 
                                                    [
               'classification_name' => 'Rootcrop/Vegetable Land',
            ], 
                                                    [
               'classification_name' => 'Rootcrop/Residential Lot',
            ], 
                                                     [
               'classification_name' => 'Religious',
            ], 
                                                     [
               'classification_name' => 'Educational',
            ],
                                                       [
               'classification_name' => 'Government',
            ],
                                                       [
               'classification_name' => 'Coffee Land',
            ],
                                                      [
               'classification_name' => 'Riceland with Irrigation/Cogon Land',
            ],
                                                      [
               'classification_name' => 'Riceland/ Cogon Land',
            ],                              
                                                         [
               'classification_name' => 'Machinery',
            ], 
                                     
        ]);
    }
}
