<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                'dob' => '2000-01-01',
                'gender' => 'Other',
                'phone' => '0000000000'
            ]);
        }
    }
}