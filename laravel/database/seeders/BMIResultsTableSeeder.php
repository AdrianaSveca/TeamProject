<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BMIResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('BMI_Results')->insert([
            [
                'name' => 'Underweight',
                'min_score' => 0,
                'max_score' => 18,
                'advice' => 'A bulk is in order. Lets help you gain weight.'
            ],
            [
                'name' => 'Healthy',
                'min_score' => 18.1,
                'max_score' => 25,
                'advice' => 'You are Healthy. Lets help you maintain this.'
            ],
            [
                'name' => 'Overweight',
                'min_score' => 25.1,
                'max_score' => 60,
                'advice' => 'A cut is in order. Lets help you lose weight.'
            ]
        ]);
    }
}
