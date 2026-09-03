<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin MedLink',
            'email' => 'admin@medlink.com',
            'password' => Hash::make('Admin12345'),
            'role' => 'admin',
        ]);
    }
}