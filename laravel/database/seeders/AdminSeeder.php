<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


/**
 * Seeder to create default admin users.
 * In this seeder we create the admin users.
 */
class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Check if admin exists to avoid duplicates
        if (!User::where('email', 'admin@wellth.com')->exists()) {
            User::create([
                'name' => 'Main Admin',
                'email' => 'admin@wellth.com',
                'password' => Hash::make('password123'),
                'role' => 'admin', // This unlocks the Admin Dashboard
                'dob' => '2006-10-11',
                'gender' => 'Other',
                'phone' => '0000000000'
            ]);
        }

        if (!User::where('email', 'admin2@wellth.com')->exists()) {
            User::create([
                'name' => 'Second Admin',
                'email' => 'admin2@wellth.com',
                'password' => Hash::make('password1234'), // Or a different password
                'role' => 'admin',
            ]);
        }

    }
}