<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BMIResultProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('BMI_Result_Products')->insert([
            [
                'bmi_result_id' => 1,
                'product_id' => 1,
            ],
            [
                'bmi_result_id' => 1,
                'product_id' => 4,
            ],
            [
                'bmi_result_id' => 1,
                'product_id' => 7,
            ],
            [
                'bmi_result_id' => 2,
                'product_id' => 14,
            ],
            [
                'bmi_result_id' => 2,
                'product_id' => 16,
            ],
            [
                'bmi_result_id' => 2,
                'product_id' => 19,
            ],
            [
                'bmi_result_id' => 3,
                'product_id' => 21,
            ],
            [
                'bmi_result_id' => 3,
                'product_id' => 23,
            ],
            [
                'bmi_result_id' => 3,
                'product_id' => 25,
            ],
        ]);
    }
}
