<?php

namespace Database\Seeders;

use App\Models\ServiceRequest;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    public function run(): void
    {
        ServiceRequest::create([
            'client_id' => 5,
            'service_category_id' => 1,
            'title' => 'Fuite d’eau dans la cuisine',
            'description' => 'Il y a une fuite d’eau sous l’évier de la cuisine.',
            'address' => 'Hay Essalam',
            'city' => 'El Jadida',
            'priority' => 'high',
            'status' => 'pending',
            'preferred_date' => now()->addDays(2),
        ]);

        ServiceRequest::create([
            'client_id' => 6,
            'service_category_id' => 2,
            'title' => 'Problème électrique',
            'description' => 'Les prises électriques de la chambre ne fonctionnent pas.',
            'address' => 'Centre Ville',
            'city' => 'El Jadida',
            'priority' => 'medium',
            'status' => 'pending',
            'preferred_date' => now()->addDays(3),
        ]);

        ServiceRequest::create([
            'client_id' => 5,
            'service_category_id' => 3,
            'title' => 'Panne de chauffage',
            'description' => 'Le système de chauffage ne fonctionne plus.',
            'address' => 'Hay Al Matar',
            'city' => 'El Jadida',
            'priority' => 'urgent',
            'status' => 'pending',
            'preferred_date' => now()->addDay(),
        ]);
    }
}
