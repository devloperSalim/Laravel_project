<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'specialty' => null,
        ]);

        // Manager
        User::create([
            'name' => 'Karim Manager',
            'email' => 'manager@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'manager',
            'specialty' => null,
        ]);

        // Technician - Plomberie
        User::create([
            'name' => 'Youssef Technicien',
            'email' => 'youssef@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'technician',
            'specialty' => 'plomberie',
        ]);

        // Technician - Électricité
        User::create([
            'name' => 'Amine Technicien',
            'email' => 'amine@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'technician',
            'specialty' => 'électricité',
        ]);

        // Client
        User::create([
            'name' => 'Ahmed Client',
            'email' => 'ahmed@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'client',
            'specialty' => null,
        ]);

        // Client
        User::create([
            'name' => 'Salma Client',
            'email' => 'salma@fieldservice.test',
            'password' => Hash::make('password123'),
            'role' => 'client',
            'specialty' => null,
        ]);
    }
}
