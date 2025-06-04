<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'أحمد',
            'last_name' => 'محمد',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0791234567',
            'role' => 'admin',
            'preferred_area' => 'وسط البلد',
            'status' => 'active',
        ]);

        User::create([
            'first_name' => 'فاطمة',
            'last_name' => 'علي',
            'email' => 'fatima@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0789876543',
            'role' => 'user',
            'preferred_area' => 'الجبيهة',
            'status' => 'active',
        ]);
    }
}