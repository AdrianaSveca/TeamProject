<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create demo users only if they do not already exist, so seeding is safe to run multiple times.
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                // Password is random in the factory by default; here we set a simple known password.
                'password' => Hash::make('password123'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'team16@16.com'],
            [
                'name' => 'Team 16',
                'password' => Hash::make('123456789'),
            ]
        );


        $this->call([
            AdminSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            DemoDataSeeder::class,
            BMIResultsTableSeeder::class,
            BMIResultProductsTableSeeder::class,
        ]);
    }
}
