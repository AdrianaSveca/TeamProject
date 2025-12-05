<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('Categories')->insert([
            [
                'category_name' => 'Supplements',
                'category_description' => 'Protein Powders, Creatine and Other Fitness Supplements.'
            ],
            [
                'category_name' => 'Nutrition',
                'category_description' => 'Vitamins and Minerals'
            ],
            [
                'category_name' => 'Fitness Accessories',
                'category_description' => 'Items That Aid in Your Fitness Journey'
            ],
            [
                'category_name' => 'Fitness Equipment',
                'category_description' => 'Tools That Level Up Your Workouts'
            ],
            [
                'category_name' => 'Other',
                'category_description' => 'Miscellaneous Wellness Products'
            ],
        ]);
        
    }
}
