<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Products')->insert([
            [
                'product_name' => 'Whey Protein Isolate',
                'product_description' => 'High-quality protein supplement',
                'product_price' => 39.99,
                'product_image' => 'products/Whey_Protein_Isolate.png',
                'category_id' => 1,
            ],
            [
                'product_name' => 'Creatine Monohydrate 500g',
                'product_description' => 'Pure micronized creatine',
                'product_price' => 24.99,
                'product_image' => 'products/Creatine_Monohydrate.png',
                'category_id' => 1,
            ],
            [
                'product_name' => 'Omega-3 Fish Oil Capsules',
                'product_description' => 'Heart health & anti-inflammation',
                'product_price' => 15.99,
                'product_image' => 'products/Omega_3_Fish_Oil_Capsules.png',
                'category_id' => 1,
            ],
            [
                'product_name' => 'Pre-Workout Energy Blast',
                'product_description' => 'Enhances focus and performance',
                'product_price' => 19.99,
                'product_image' => 'products/Pre_Workout_Energy_Blast.png',
                'category_id' => 1,
            ],
            [
                'product_name' => 'Vitamin D3 5000IU',
                'product_description' => 'Immune and bone health support',
                'product_price' => 12.99,
                'product_image' => 'products/Vitamin_D3_5000IU.png',
                'category_id' => 1,
            ],
            [
                'product_name' => 'Organic Almond Butter',
                'product_description' => 'High-protein natural spread',
                'product_price' => 10.99,
                'product_image' => 'products/Organic_Almond_Butter.png',
                'category_id' => 2,
            ],
            [
                'product_name' => 'High-Protein Granola Mix',
                'product_description' => 'Breakfast fuel with added fibre',
                'product_price' => 8.99,
                'product_image' => 'products/High_Protein_Granola_Mix.png',
                'category_id' => 2,
            ],
            [
                'product_name' => 'Meal Replacement Shake Pack',
                'product_description' => 'Balanced macronutrient formula',
                'product_price' => 29.99,
                'product_image' => 'products/Meal_Replacement_Shake_Pack.png',
                'category_id' => 2,
            ],
            [
                'product_name' => 'Electrolyte Hydration Mix',
                'product_description' => 'Restores essential minerals',
                'product_price' => 14.99,
                'product_image' => 'products/Electrolyte_Hydration_Mix.png',
                'category_id' => 2,
            ],
            [
                'product_name' => 'Vegan Protein Bars (Box of 12)',
                'product_description' => 'Plant-based energy snack',
                'product_price' => 22.99,
                'product_image' => 'products/Vegan_Protein_Bars_Box_of_12.png',
                'category_id' => 2,
            ],
            [
                'product_name' => 'Resistance Band Set (5 Levels)',
                'product_description' => 'Ideal for mobility & strength',
                'product_price' => 18.99,
                'product_image' => 'products/Resistance_Band_Set_5_Levels.png',
                'category_id' => 3,
            ],
            [
                'product_name' => 'Wrist Wraps (Pair)',
                'product_description' => 'Provides wrist support during lifts',
                'product_price' => 12.99,
                'product_image' => 'products/Wrist_Wraps_Pair.png',
                'category_id' => 3,
            ],
            [
                'product_name' => 'Foam Roller 45cm',
                'product_description' => 'Helps with recovery & mobility',
                'product_price' => 16.99,
                'product_image' => 'products/Foam_Roller_45cm.png',
                'category_id' => 3,
            ],
            [
                'product_name' => 'Skipping Rope (Adjustable)',
                'product_description' => 'Cardio endurance training',
                'product_price' => 9.99,
                'product_image' => 'products/Skipping_Rope_Adjustable.png',
                'category_id' => 3,
            ],
            [
                'product_name' => 'Gym Grip Gloves',
                'product_description' => 'Comfort & grip for weight training',
                'product_price' => 14.99,
                'product_image' => 'products/Gym_Grip_Gloves.png',
                'category_id' => 3,
            ],
            [
                'product_name' => 'Adjustable Dumbbell Set (20kg)',
                'product_description' => 'Multi-purpose strength equipment',
                'product_price' => 89.99,
                'product_image' => 'products/Adjustable_Dumbbell_Set_20kg.png',
                'category_id' => 4,
            ],
            [
                'product_name' => 'Kettlebell 12kg',
                'product_description' => 'Perfect for HIIT & strength',
                'product_price' => 34.99,
                'product_image' => 'products/Kettlebell_12kg.png',
                'category_id' => 4,
            ],
            [
                'product_name' => 'Pull-Up Bar (Doorway Mounted)',
                'product_description' => 'Upper-body training',
                'product_price' => 29.99,
                'product_image' => 'products/Pull_Up_Bar_Doorway_Mounted.png',
                'category_id' => 4,
            ],
            [
                'product_name' => 'Yoga Mat (10mm Thick)',
                'product_description' => 'High comfort and cushioning',
                'product_price' => 19.99,
                'product_image' => 'products/Yoga_Mat_10mm_Thick.png',
                'category_id' => 4,
            ],
            [
                'product_name' => 'Adjustable Bench Press',
                'product_description' => 'Full-body workout bench',
                'product_price' => 119.99,
                'product_image' => 'products/Adjustable_Bench_Press.png',
                'category_id' => 4,
            ],
            [
                'product_name' => 'Sports Water Bottle 1L',
                'product_description' => 'Durable BPA-free bottle',
                'product_price' => 6.99,
                'product_image' => 'products/Sports_Water_Bottle.png',
                'category_id' => 5,
            ],
            [
                'product_name' => 'Gym Towel (Microfibre)',
                'product_description' => 'Sweat-absorbent quick-dry design',
                'product_price' => 7.99,
                'product_image' => 'products/Gym_Towel.png',
                'category_id' => 5,
            ],
            [
                'product_name' => 'Health Journal Notebook',
                'product_description' => 'Track workouts & wellness goals',
                'product_price' => 11.99,
                'product_image' => 'products/Health_Journal_Notebook.png',
                'category_id' => 5,
            ],
            [
                'product_name' => 'Aromatherapy Essential Oils Set',
                'product_description' => 'Stress-relief wellness pack',
                'product_price' => 14.99,
                'product_image' => 'products/Aromatherapy_Essential_Oils_Set.png',
                'category_id' => 5,
            ],
            [
                'product_name' => 'Reusable Meal Prep Containers (Set of 10)',
                'product_description' => 'Food storage for meal planning',
                'product_price' => 17.99,
                'product_image' => 'products/Reusable_Meal_Prep_Containers.png',
                'category_id' => 5,
            ],
        ]);
    }
}
