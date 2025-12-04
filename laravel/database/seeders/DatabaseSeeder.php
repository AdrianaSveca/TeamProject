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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('users')->insert([
            'name' => 'Team 16',
            'email' => 'team16@16.com',
            'password' => Hash::make('123456789'),
        ]);


        $this->call([
            AdminSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            BMIResultsTableSeeder::class,
            BMIResultProductsTableSeeder::class,
        ]);
    }
}
