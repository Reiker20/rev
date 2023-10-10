<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'Admin123@gmail.com',
            'email_verified_at' => now(),
            'password' => 'asekebananya123',
            'remember_token' => Str::random(10), 
            'is_admin' => 1,
        ]);
    }
}
